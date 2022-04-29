<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\File as FacadesFile;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
       return view('admin.category.index',compact('category')); 
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
          $file =$request->file('image');
          $filename = time().'.'.$file->getClientOriginalExtension();
          $file->move('uploads/category/',$filename);
          $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with(['status'=>'Category Added Successfully','status_code'=>'success']);
    }

    public function edit($category_id)
    {
    $category = Category::find($category_id);
    return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category =  Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $destination = 'uploads/category/'.$category->image;//deletes the existing and replace
            if(File::exists($destination))
            {
                File::delete($destination);
            }

          $file =$request->file('image');
          $filename = time().'.'.$file->getClientOriginalExtension();
          $file->move('uploads/category/',$filename);
          $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with(['status'=>'Category Updated Successfully','status_code'=>'success']);
    }
    public function delete($category_id)
    {
      $category = Category::find($category_id);
      If($category)
      {
        $destination = 'uploads/category/'.$category->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
      
          $category->delete();
          return redirect('admin/category')->with(['status'=>'Category Deleted Successfully','status_code'=>'success']);
      }
      else
      {
        return redirect('admin/category')->with(['status'=>'No category Id Found','status_code'=>'info']);
      }
    }
}
