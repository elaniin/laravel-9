<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use InvalidArgumentException;

class PostStatusController extends Controller
{
    /**
     * Display a list of posts by status.
     *
     * @param PostStatus $status
     * @return AnonymousResourceCollection
     * @throws InvalidArgumentException
     */
    public function show(PostStatus $status): AnonymousResourceCollection
    {
        $posts = Post::query()->where('status', $status->value);

        return PostResource::collection($posts->get());
    }
}
