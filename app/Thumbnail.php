<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $fillable = ['caption', 'url', 'description', 'visible'];
}
