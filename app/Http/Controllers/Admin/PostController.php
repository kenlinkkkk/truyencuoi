<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CategoryEloquentRepository;
use App\Repositories\Admin\PostEloquentRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostEloquentRepository $postRepository, CategoryEloquentRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->edge('category');

        $data = compact('posts');

        return view('admin.post.index', $data);
    }

    public function add()
    {
        $categories = $this->categoryRepository->where('status', 1);

        $data = compact('categories');

        return view('admin.post.add', $data);
    }

    public function edit($id_post)
    {
        $post = $this->postRepository->find($id_post);
        $categories = $this->categoryRepository->getAll();
        $data = compact(
            'post',
            'categories'
        );

        return view('admin.post.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');

        if ($data['short_tag'] == null) {
            $data['short_tag'] = sluggify($data['name'], '-', 255) .'-'. round(microtime(true));
        }

        $data['status'] = 1;

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $filePath = 'uploads/'. $year .'/'. $month .'/'. $day;
        $filePath = str_replace('\\', '/', $filePath);

        if (!file_exists($filePath)) {
            mkdir($filePath, '0777', true);
        }

        if ($request->hasFile('thumbnail_picture')) {
            $picture = $request->thumbnail_picture;
            $thumbnail_name = $picture->getClientOriginalName();
            $picture->move($filePath, $thumbnail_name);

            $data['picture'] = $filePath.'/'.$thumbnail_name;
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
            return redirect(route('admin.post.index'));
        }

        $result = $this->postRepository->create($data);

        if ($result) {
            $request->session()->flash('success', 'Thêm thành công');
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect(route('admin.post.index'));
    }

    public function update(Request $request, $id_post)
    {
        $data = $request->except('_token');

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $filePath = 'uploads/'. $year .'/'. $month .'/'. $day;
        $filePath = str_replace('\\', '/', $filePath);

        if (!file_exists($filePath)) {
            mkdir($filePath, '0777', true);
        }

        if ($request->hasFile('thumbnail_picture')) {
            $picture = $request->thumbnail_picture;
            $thumbnail_name = $picture->getClientOriginalName();
            $picture->move($filePath, $thumbnail_name);

            $data['picture'] = $filePath.'/'.$thumbnail_name;
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
            return redirect(route('admin.post.index'));
        }

        $result = $this->postRepository->update($id_post, $data);

        if ($result) {
            $request->session()->flash('success', 'Thành công');
        } else {
            $request->session()->flash('error', 'Thất bại');
        }

        return redirect(route('admin.post.index'));
    }

    public function delete(Request $request, $id_post)
    {
        $result = $this->postRepository->delete($id_post);

        if ($result) {
            $request->session()->flash('success', 'Thành công');
        } else {
            $request->session()->flash('error', 'Thất bại');
        }

        return redirect()->back();
    }
}
