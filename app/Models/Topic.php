<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['
title', 'body', 'user_id', 'catergory_id', 'reply_count', 'view_count', 'last_reply_user_id', 'excerpt', 'slug'];
}
