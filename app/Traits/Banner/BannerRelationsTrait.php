<?php

namespace APP\Traits\Banner;

use App\Models\File;

trait BannerRelationsTrait{
    
    public function file(){
        return $this->morphOne(File::class, 'fileable');
    }

}
