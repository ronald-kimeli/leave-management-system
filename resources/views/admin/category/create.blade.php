@extends('layouts.backend')
@section('title', 'Add Category')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">

            <div class="card shadow">
                <div class="card-header">
                    <h4>Add category
                        <a href="{{url('admin/category')}}" class="btn btn-danger float-end">BACK</a>
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
                    <form action="{{url('admin/add/category')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Category Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">description</label>
                            <textarea type="text" name="description" id="mysummernote" rows="5"
                                class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <h6>SEO Tags</h6>
                        <div class="form-group mb-3">
                            <label for="">Meta_title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Meta_description</label>
                            <textarea type="text" name="meta_description" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Meta_keyword</label>
                            <textarea type="text" name="meta_keyword" rows="5" class="form-control"></textarea>
                        </div>

                        <h6>Status Mode</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="">Navbar_status</label>
                                <input type="checkbox" name="navbar_status">
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection