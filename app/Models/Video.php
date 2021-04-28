<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // public static function getMyvideo()
    // {
    //     $todos = self::where('userid', Auth::user()->id)
    //         ->orderBy('id', 'desc')
    //         ->get();
    //     return $todos;
    // }
}
