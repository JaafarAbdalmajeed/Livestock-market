<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UploadFile extends Model
{
    use HasFactory;

    public function uploadImage(Request $request, $disk  ,$folder)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image'); // uploaded file object
        $path = $file->store("uploads/$folder/", [
            'disk' => "$disk"
        ]); // in laravel file system //.env disk local -> in storage -> app (local disk)//create folder uploads in app folder
        return $path;
    }
}
