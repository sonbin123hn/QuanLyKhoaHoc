@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Exams Management</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Home
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Exams Management</li>
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
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/exams/add')}}">Add Exams</a></button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date Begin</th>
                    <th scope="col">Time Begin</th>
                    <th scope="col">Class</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $k=>$value)
                <tr>
                    <td>{{ Helper::stt($k, $exams->currentPage()) }}</td>
                    <td>{{$value['date_begin']}}</td>
                    <td>{{$value['time_begin']}}</td>
                    @foreach($classes as $val)
                        @if($val['id'] == $value['id_class'])
                            <td>{{ $val['name'] }}</td>
                        @endif
                    @endforeach
                @endforeach`
                </tr>
            </tbody>
        </table>
        You are on page {{$exams->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$exams->previousPageUrl()}}" id="previousPagebtn">
            <</a> <a style="font-size: 20px;" href="{{$exams->nextPageUrl()}}" id="nextPagebtn">>
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