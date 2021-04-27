<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    public $fillable = ['recipient', 'weight', 'phone', 'info', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
