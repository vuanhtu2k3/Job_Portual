<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        $data['categories'] = $categories;
        return view('admin.category.list', $data);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);
        if ($validator->passes()) {
            $categories = new Category();
            $categories->name = $request->name;
            $categories->status = $request->status;
            $categories->save();
            Session::flash('success', 'Category created successfully');
            return response()->json([
                'status' => true,
                'message' => 'Category created successfully'
            ]);
        }
    }
    public function edit() {}
    public function update() {}
    public function delete() {}
}
