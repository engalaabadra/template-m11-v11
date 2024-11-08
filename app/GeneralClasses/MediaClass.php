<?php
namespace App\GeneralClasses;

use Illuminate\Support\Facades\Storage;

class MediaClass{

    /**
     * Generate a filename for storing media.
     *
     * @param \Illuminate\Http\UploadedFile $media
     * @return array
     */
    protected function typesThumbnail($media): array
    {
        if (empty($media)) return [];
        $filenameWithExtension = $media->getClientOriginalName();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension = $media->getClientOriginalExtension();
        $filenameToStore = "{$filename}_" . time() . ".{$extension}";
        return ['filenameToStore' => $filenameToStore];
    }
    /**
     * Store a single file in a specified folder.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folderName
     * @return string
     */
    protected function storeFileInFolder($file, string $folderName): string
    {
        $resTypesThumbnail=    $this->typesThumbnail($file); 
        // Store the file in the 'uploads' directory with a custom name
        $filePathOriginal =$file->storeAs('uploads/'.$folderName, $resTypesThumbnail['filenameToStore'],'public');
        return str_replace('public/', '', 'storage/'.$filePathOriginal);
    }
    /**
     * Store multiple files in in db.
     * @param array $fileData
     * @param  $modelName
     * @param object $item
     */
    protected function storeMultipleFiles($fileData, $item)
    {
        if ($item->files) {
            // Delete old files and update with new files
            $item->files()->delete();
            $item->files()->createMany($fileData);
        } else {
            // Create new files associated with the item
            $item->files()->createMany($fileData);
        }
    }
    /**
     * Store  file in in db.
     * @param array $fileData
     * @param  $modelName
     * @param object $item
     */
    protected function storeSingleFile($fileData, $modelName, $item)
    {
        if ($item->file) {
            // Update the existing file
            $item->file()->update(['url' => $fileData]);
        } else {
            // Create a new file associated with the item
            $item->file()->create([
                'url' => $fileData,
                'fileable_id' => $item->id,
                'fileable_type' => $modelName
            ]);
        }
    }

    

    protected function storeFile($fileData, string $folderName , object $item , $modelName)
    {
        $urlFile = $this->storeFileInFolder($fileData, $folderName);
        // Update or create image record associated with the item
        $this->storeSingleFile($urlFile, $modelName, $item);

    }

    /**
     * Store multiple files in a specified folder & in db.
     *
     * @param array $files
     * @param string $folderName
     * @param object $item
     * @param $modelName
     * @return array
     */
    protected function storeFiles(array $files, string $folderName , object $item , $modelName): array
    {
        $storedFiles = [];
        foreach ($files as $file) {
            $urlFile = $this->storeFileInFolder($file, $folderName);
            $storedFiles[] = ['url' => $urlFile];
            if (!$urlFile) throw new \Exception('File upload failed');
        }
        $this->storeMultipleFiles($storedFiles, $item);
        return $storedFiles;
    }



    protected function handleSingleFileUpload($fileData, $folderName, $modelName,  $item)
    {
       // Check if an file is uploaded -> will store it in folder, otherwise retain the existing file
       //Update or create file record associated with the item
       return request()->hasFile('file')
                ? $this->storeFiles($fileData,$folderName,$item,$modelName)
                : $item->files;
    }
    
    public function handleMultipleFilesUpload($fileData , $folderName, $modelName, $item){
        //Check if an file is uploaded -> will upload files in folder & update or store files in db
        return request()->hasFile('files')
                ? $this->storeFiles($fileData,$folderName,$item,$modelName)
                : $item->files;
    }  
   
    protected function handleFileDeletion($item)
    {
        $fileItem = $item->file; // Direct relationship instead of query
        if ($fileItem) {
            $filePath = filePath($fileItem->url);
            // Delete file from storage and database if it exists
            if (Storage::exists($filePath)) Storage::delete($filePath);
            $fileItem->delete();
        }
    }

    protected function handleFilesDeletion($item)
    {
        $filesItems = $item->files;
        $deletedCount = 0;
        if(!empty($filesItems)){
            foreach ($filesItems as $fileItem) {
                $filePath = filePath($fileItem->url);
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                    $fileItem->delete();
                    $deletedCount++;
                }
            }
        }
        return $deletedCount;
    }
}
