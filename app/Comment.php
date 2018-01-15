<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['text'];

    protected $hidden = [
        'image_id', 'user_id'
    ];
}