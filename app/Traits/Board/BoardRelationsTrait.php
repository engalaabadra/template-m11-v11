<?php

namespace APP\Traits\Board;

use App\Models\File;

trait BoardRelationsTrait{
    
    public function file(){
        return $this->morphOne(File::class, 'fileable');
    }

}
