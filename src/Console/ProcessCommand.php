<?php

namespace Nhrrob\Robinpress\Console;

use Exception;
use Illuminate\Console\Command;
use Nhrrob\Robinpress\Facades\Robinpress;
use Nhrrob\Robinpress\Post;
use Nhrrob\Robinpress\Repositories\PostRepository;
use Str;

class ProcessCommand extends Command
{

    protected $signature = "robinpress:process";

    protected $description = "Updates blog posts.";

    public function handle(PostRepository $postRepository)
    {
        if (Robinpress::configNotPublished()) {
            return $this->warn('Please publish the config file by running ' .
                '\'php artisan vendor:publish --tag=robinpress-config\'');
        }

        try {
            $posts = Robinpress::driver()->fetchPosts();
            $this->info('No. of posts: '. count($posts));

            foreach ($posts as $post) {
                $postRepository->save($post);
                $this->info('Post title: '. $post['title']);
            }
            
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
