<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    public function getDestinationPath(){
        return "uploads/posts/$this->id";
    }

    public function getImagePath($key = ''){
        return "/{$this->getDestinationPath()}/$key}_{$this->file_name}";
    }

    public function saveImage($file){
        if(!$this->id) $this->save();
        if(!empty($file)){
            $this->file_name = $file->getClientOriginalName();
            $this->resizeImage($file);
        }
        return $this;
    }

    private function resizeImage($file){
        if(!is_dir(public_path($this->getDestinationPath()))){
            File::makeDirectory(public_path($this->getDestinationPath()), 0777, true, true);
        }
        \Image::make($file)
            ->save("{$this->getDestinationPath()}/{$file->getClientOriginalName()}");
        \Image::make($file)
            ->fit(670, 320)
            ->save("{$this->getDestinationPath()}/thumb_{$file->getClientOriginalName()}");
    }

    function hasImage(){
        return !!$this->file_name;
    }

}
