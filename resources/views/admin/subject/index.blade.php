@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">subject</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
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
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{session('success')}}
        </div>
        @endif
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/subject/add')}}">Add subject</a></button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">icons</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subject as $k=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($k, $subject->currentPage()) }}</th>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['description']}}</td>
                    <td><i class="{{$value['image']}}"></td>
                    <td><img src="{{$value['avatar']}}" width="100" /></td>
                    <td>
                        <a href="{{ route('admin.subject.edit', ['id' => $value['id']]) }}"><i style="font-size:24px" class="fa">&#xf044;</i></a>
                        @if($value['status'] == 1)
                            <a href="{{ route('admin.subject.lock', ['id' => $value['id']]) }}" onclick="return confirm('Do you want to unlock this Member Account ?')"><i class="fa fa-unlock-alt"></i></a>
                        @else
                            <a href="{{ route('admin.subject.lock', ['id' => $value['id']]) }}" onclick="return confirm('Do you want to lock this Member Account ?')"><i class="fa fa-lock"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        You are on page {{$subject->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$subject->previousPageUrl()}}" id="previousPagebtn">
            <</a> <a style="font-size: 20px;" href="{{$subject->nextPageUrl()}}" id="nextPagebtn">>
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