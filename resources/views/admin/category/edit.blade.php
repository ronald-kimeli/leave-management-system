@extends('layouts.backend')
@section('title', 'Add Category')
@section('content')

<div class="container py-5">
    <div class="card col-md-8 shadow offset-2">
        <div class="card-header">
            <h4>Edit category
                <a href="{{url('admin/category')}}" class="btn btn-danger btn-sm float-end rounded-pill"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update_category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">description</label>
                    <textarea type="text" name="description" id="mysummernote" rows="5" class="form-control">{{ $category->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" value="{{ $category->image }}" class="form-control">
                </div>

                <h6>SEO Tags</h6>
                <div class="form-group mb-3">
                    <label for="">Meta_title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Meta_description</label>
                    <textarea type="text" name="meta_description" rows="5" class="form-control">{{ $category->meta_description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="">Meta_keyword</label>
                    <textarea type="text" name="meta_keyword" rows="5" class="form-control">{{ $category->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar_status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1'  ? 'checked':''}} />
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }} />
                </div>

                <div class="form-group col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection