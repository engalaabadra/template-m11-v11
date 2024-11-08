<?php

namespace APP\Traits\File;

trait FileRelationsTrait{
    
    public function fileable()
    {
        return $this->morphTo();
    }

}
