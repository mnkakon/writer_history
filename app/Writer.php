<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany('App\Book', 'writer_id');
    }
}
