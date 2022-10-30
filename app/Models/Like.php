<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    //いいねが既にされているかを確認
    public function like_exist($id, $post_id)
    {
        //Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Like::where('user_id', '=', $id)->where('post_id', '=', $post_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
