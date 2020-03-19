<?php


namespace App\Repositories\Admin;


use App\Models\Post;
use App\Repositories\EloquentRepository;

class PostEloquentRepository extends  EloquentRepository
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return Post::class;
    }
}
