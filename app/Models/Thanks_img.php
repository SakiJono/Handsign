<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanks_img extends Model
{
    use HasFactory;

    protected $table = "thanks_imgs";
    protected $fillable = ["file_name", "file_path", 'file_title',];
}