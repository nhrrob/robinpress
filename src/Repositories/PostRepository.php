<?php

namespace Nhrrob\Robinpress\Repositories;

use Nhrrob\Robinpress\Post;
use Str;
use Arr;

class PostRepository
{
    public function save($post)
    {
        $post = Post::updateOrCreate(
            [
                'identifier' => $post['identifier'],
            ],
            [
                'slug' => Str::slug($post['title']),
                'title' => $post['title'],
                'body' => $post['body'],
                'extra' => $this->extra($post),
            ]
        );

    }

    public function extra($post)
    {
        $extra = (array)json_decode($post['extra'] ?? '[]');

        $attributes = Arr::except($post, ['identifier', 'title', 'body', 'extra']);
        return json_encode(array_merge($extra, $attributes));
    }
}
