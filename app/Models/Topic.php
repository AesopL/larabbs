<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'catergory_id', 'reply_count', 'view_count', 'last_reply_user_id', 'excerpt', 'slug'];

    //一篇文章属于一个分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //一篇文章属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query, $order)
    {
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        //预加载，防止N+1问题
        return $query->with('user', 'category');
    }

    public function scopeRecentReplied($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    //按照创建时间排序
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
