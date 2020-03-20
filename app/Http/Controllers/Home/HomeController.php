<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Admin\CategoryEloquentRepository;
use App\Repositories\Admin\PostEloquentRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(CategoryEloquentRepository $categoryEloquentRepository, PostEloquentRepository $postEloquentRepository)
    {
        $this->postEloquentRepository = $postEloquentRepository;
        $this->categoryEloquentRepository = $categoryEloquentRepository;
    }

    public function index()
    {
        $posts = Post::with('category')->where('status', '=', 1)->get();

        $data = compact(
            'posts'
        );

        return view('index', $data);
    }

    public function listPost($category_tag)
    {
        $category = $this->categoryEloquentRepository->where('short_tag', $category_tag)[0];
        $posts = $this->postEloquentRepository->where('category_id', $category->id);

        $data = compact(
            'category',
            'posts'
        );

        return view('home.list_post', $data);
    }

    public function detailPost($category_tag, $post_tag) {
        $category = $this->categoryEloquentRepository->where('short_tag', $category_tag)[0];
        $post = $this->postEloquentRepository->where('category_id', $category->id)->where('short_tag', '=', $post_tag)[0];

        $data = compact(
            'post',
            'category'
        );

        return view('home.detail_post', $data);
    }
}
