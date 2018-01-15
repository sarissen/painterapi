<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const UPDATED_AT = null;

    protected $hidden = [
        'id'
    ];
}