<?php

if (! function_exists('store_image')) {
    function store_image($data,$folder,$name)
    {
        $dir="public/".$folder;
        $file = $data->file($name);
        $newName = uniqid()."_".$file->getClientOriginalExtension();
        $data->file($name)->storeAs($dir,$newName);
        return $folder."/".$newName;
    }
}
