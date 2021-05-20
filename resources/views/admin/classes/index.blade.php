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
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/classes/add')}}">Add classes</a></button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Course</th>
                    <th scope="col">Limit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $k=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($k, $classes->currentPage()) }}</th>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['price']}}</td>
                    <td>{{$value['description']}}</td>
                    @foreach($teacher as $val)
                        @if($val['id'] == $value['id_teacher'])
                        <td>{{ $val['name'] }}</td>
                        @endif
                    @endforeach
                    @foreach($subject as $val)
                        @if($val['id'] == $value['id_subject'])
                        <td>{{ $val['name'] }}</td>
                        @endif
                    @endforeach
                    @foreach($course as $val)
                        @if($val['id'] == $value['id_course'])
                        <td>{{ $val['name'] }}</td>
                        @endif
                    @endforeach
                    <td>{{$value['limit']}}</td>
                    <td>
                        <a href="{{ route('admin.classes.edit', ['id' => $value['id']]) }}"><i style="font-size:24px" class="fa">&#xf044;</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        You are on page {{$classes->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$classes->previousPageUrl()}}" id="previousPagebtn">
            <</a> <a style="font-size: 20px;" href="{{$classes->nextPageUrl()}}" id="nextPagebtn">>
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