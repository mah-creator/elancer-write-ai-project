<?php

namespace App\Listeners;

use App\Events\PostViewed;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class IncrementPostViews
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostViewed $event): void
    {
        $postViews = Session::get('post-views', []);

        if (is_string($postViews)) {
            $postViews = unserialize($postViews);
        }

        if (in_array($event->post->id, $postViews)) {
            return;
        }

        $postViews[] = $event->post->id;
        Session::put('post-views', $postViews);

        $event->post->increment('views');
    }
}
