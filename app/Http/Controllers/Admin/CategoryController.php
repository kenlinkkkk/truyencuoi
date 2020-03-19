<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CategoryEloquentRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryEloquentRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        $data = compact('categories');

        return view('admin.category.index', $data);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit($id_category)
    {
        $category = $this->categoryRepository->find($id_category);

        $data = compact('category');

        return view('admin.category.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');

        if ($data['short_tag'] == null) {
            $data['short_tag'] = sluggify($data['name'], '-', 255);
        }

        $data['status'] = 1;

        $result = $this->categoryRepository->create($data);

        if ($result) {
            $request->session()->flash('success', 'Thêm thành công');
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect(route('admin.category.index'));
    }

    public function update(Request $request, $id_category)
    {
        $data = $request->except('_token');

        $result = $this->categoryRepository->update($id_category, $data);

        if ($result) {
            $request->session()->flash('success', 'Thành công');
            return redirect(route('admin.category.index'));
        } else {
            $request->session()->flash('error', 'Thất bại');
            return redirect()->back();
        }
    }

    public function delete(Request $request, $id_category)
    {
        $result = $this->categoryRepository->delete($id_category);

        if ($result) {
            $request->session()->flash('success', 'Thêm thành công');
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect()->back();
    }
}
