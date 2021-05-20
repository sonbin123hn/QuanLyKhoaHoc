@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Classes Management</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Home
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Classes Management</li>
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
    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Name classes</label>
                    <div class="col-md-12">
                        <input type="text" name="name" value="{{ $classes->name }}" placeholder="Please enter service " class="form-control form-control-line">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Price</label>
                    <div class="col-md-12">
                        <input type="number" name="price" value="{{ $classes->price }}" placeholder="Please enter service " class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Limit classes</label>
                    <div class="col-md-12">
                        <input type="number" name="name" value="{{ $classes->limit }}" placeholder="Please enter service " class="form-control form-control-line">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Description</label>
                    <div class="col-md-12">
                        <input type="text" name="description" value="{{ $classes->description }}" placeholder="Please enter detail " class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label class="col-sm-12">Select Teacher</label>
                    <div class="col-sm-12">
                        <select name="id_teacher" class="form-control form-control-line">
                            @foreach($teacher as $value)
                                @if($value['status'] == 1)
                                    <option value="{{ $value['id'] }}" <?php echo $classes->id_teacher == $value['id'] ? 'selected' : ''; ?>>{{ $value['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="col-sm-12">Select Subject</label>
                    <div class="col-sm-12">
                        <select name="id_subject" class="form-control form-control-line">
                            @foreach($subject as $value)
                                @if($value['status'] == 1)
                                    <option value="{{ $value['id'] }}" <?php echo $classes->id_subject == $value['id'] ? 'selected' : ''; ?>>{{ $value['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="col-sm-12">Select Course</label>
                    <div class="col-sm-12">
                        <select name="id_course" class="form-control form-control-line">
                            @foreach($course as $value)
                            <option value="{{ $value['id'] }}" <?php echo $classes->id_course == $value['id'] ? 'selected' : ''; ?>>{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <label class="col-sm-4">Select Level</label>
        <div class="col-sm-4">
            <select name="level" class="form-control form-control-line">
                @if($classes->level == 1)
                <option value="1">Dễ</option>
                <option value="2">Trung Bình</option>
                <option value="3">Khó</option>
                @endif
                @if($classes->level == 2)
                <option value="2">Trung Bình</option>
                <option value="1">Dễ</option>
                <option value="3">Khó</option>
                @endif
                @if($classes->level == 3)
                <option value="3">Khó</option>
                <option value="1">Dễ</option>
                <option value="2">Trung Bình</option>
                @endif
            </select>
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