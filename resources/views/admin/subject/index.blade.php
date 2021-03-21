@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">browsings</h4>
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
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Stt</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">SDT</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($browsings as $value)
                                    <tr>
                                        <th scope="row">{{ $value['id'] }}</th>
                                        <td>{{$value['email']}}</td>
                                        <td>{{$value['name']}}</td>
                                        <td>{{$value['phone']}}</td>
                                        <td>
                                            <a href="{{ route('admin.browsings.store', ['id' => $value['id']]) }}"onclick="return confirm('Are you sure want to add member?')"><i style="font-size:24px" class="fa">&#xf044;</i></a>
                                            <a href="{{ route('admin.browsings.remove', ['id' => $value['id']]) }}" onclick="return confirm('Do you want to delete this Member Account ?')">
                                            <i style="font-size:24px;margin-right:5px;" class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        You are on page {{$browsings->currentPage()}}
                        <a style="font-size: 20px;margin-right: 20px;" href="{{$browsings->previousPageUrl()}}" id="previousPagebtn"><</a>
                        <a style="font-size: 20px;" href="{{$browsings->nextPageUrl()}}" id="nextPagebtn">></a>
                    </div>
            </div>
@endsection
@section('footer')
<footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
            </footer>
@endsection