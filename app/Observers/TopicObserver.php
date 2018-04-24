<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }
    public function saving(Topic $topic)
    {
        //xss过滤
        $topic->body = clean($topic->body, 'user_topic_body');
        //生成话题摘要
        $topic->excerpt = make_excerpt($topic->body);

        if (!$topic->slug) {
            $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
        }
    }
}
