@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Courses Management</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           Home
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Courses Management</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container-fluid')
<div class="container-fluid">
    <!-- hien thi thong bao -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        {{session('success')}}
    </div>
    @endif
    <!-- hien thi loi request -->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label class="col-md-12">Name course</label>
            <div class="col-md-12">
                <input type="text" name="name" value="{{ $course->name }}" class="form-control form-control-line">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Day Start</label>
                    <div class="col-md-12">
                        <input type="date" name="day_start" value="{{ $course->day_start }}" class="form-control form-control-line">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Day End</label>
                    <div class="col-md-12">
                        <input type="date" name="day_end" value="{{ $course->day_end }}" class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection