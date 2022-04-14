<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
//    protected $casts = ['category_id'=>'array'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withPivot('created_at');
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
    public function delete()
    {
        $res=parent::delete();
        if($res==true)
        {
            $relations=$this->photos; // here get the relation data
            $relations->delete();// delete Here
        }
    }
}
