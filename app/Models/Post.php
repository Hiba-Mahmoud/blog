<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    // protected $table = 'posts';
    public $timestamps = true;
    // protected $primaryKey = 'id';


    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'content', 'status','image','tags', 'category_id','user_id');
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment',);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
