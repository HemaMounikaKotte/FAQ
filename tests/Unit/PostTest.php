<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $post = factory(\App\Post::class)->make();
        $post->user()->associate($user);
        $this->assertTrue($post->save());
    }
    public function testComment()
    {
        $post = factory(\App\Post::class)->make();
        $post->save();
        $comment = factory(\App\Comment::class)->make();
        $comment->user()->associate($post);
        $comments = $post->comments();
        $this->assertNotNull($comments);
    }
}

