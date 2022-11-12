<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'comments';
    public $timestamps = true;
    // protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    // protected $fillable = array('name', 'email', 'post_id', 'content');
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id');
    }
}
