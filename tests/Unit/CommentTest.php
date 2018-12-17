<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $post = factory(\App\Post::class)->make();
        $post->user()->associate($user);
        $post->save();
        $comment = factory(\App\Comment::class)->make();
        $comment->user()->associate($user);
        $comment->post()->associate($post);
        $this->assertTrue($comment->save());
    }
}
