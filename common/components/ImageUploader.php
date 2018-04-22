<?php

namespace common\components;

class ImageUploader
{

    public function uploadImage($model, $folderName)
    {
        $image_name = $model->nazwa . rand(1, 4000) . '.' . $model->obrazek->getExtension();
        $image_path = 'uploads' . '/' . $folderName . '/' . $image_name;
        $model->obrazek->saveAs($image_path);
        $model->obrazek = $image_path;
        return $model;
    }

    public function saveImageToBase($model, $folderName)
    {
        $model = $this->uploadImage($model, $folderName);
        $model->save();
    }


}

