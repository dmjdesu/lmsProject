<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
     // 割り当て許可
    protected $fillable = [
        'name',
        'subject',
        'message', 
        'category_id'
    ];
    /**
     * 
     */
    public function progresses()
    {
        // 学習は複数の進捗を持つ
        return $this->hasMany('App\Progress');
    }
 
    /**
     * 
     */
    public function category()
    {
        // 投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\Category');
    }
}
