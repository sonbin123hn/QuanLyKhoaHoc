@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">classes</h4>
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
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/classes/add')}}">Add classes</a></button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Scores</th>
                    <th scope="col">Right Answer</th>
                    <th scope="col">Wrong Answer</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $res)
                <tr>
                    <td>{{$res['scores']}}</td>
                    <td>{{$res['right_ans']}}</td>
                    <td>{{$res['wrong_ans']}}</td>
                    @if($res['scores'] >= 5)
                    <td>Pass</td>
                    @else
                    <td>Fail</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        You are on page {{$scores->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$scores->previousPageUrl()}}" id="previousPagebtn">
            <</a> <a style="font-size: 20px;" href="{{$scores->nextPageUrl()}}" id="nextPagebtn">>
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