<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    /**
     * 
     */
    public function learn()
    {
        // コメントは1つの投稿に所属する
        return $this->belongsTo('App\Learn');
    }
}
