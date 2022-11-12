<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');


    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasOne('App\Models\Post');
    }
}
