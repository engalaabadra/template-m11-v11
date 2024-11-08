<?php

function hasRole($nameRole){
    return auth()->guard('api')->user()->roles->contains('name',$nameRole);
}
