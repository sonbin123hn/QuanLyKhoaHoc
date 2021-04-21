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
                        <li class="breadcrumb-item active" aria-current="page">Courses Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container-fluid')
<div class="container-fluid">
    <div class="table-responsive">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Notification!</h4>
            {{session('success')}}
        </div>
        @endif
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/course/add')}}">Add course</a></button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Day Start</th>
                    <th scope="col">Day End</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course as $k=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($k, $course->currentPage()) }}</th>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['day_start']}}</td>
                    <td>{{$value['day_end']}}</td>
                    <td>
                        <a href="{{ route('admin.course.edit', ['id' => $value['id']]) }}"><i style="font-size:24px" class="fa">&#xf044;</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        You are on page {{$course->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$course->previousPageUrl()}}" id="previousPagebtn">
            <</a> <a style="font-size: 20px;" href="{{$course->nextPageUrl()}}" id="nextPagebtn">>
        </a>
    </div>

</div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection