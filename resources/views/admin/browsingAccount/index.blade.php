@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Account Management</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Home
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Account Management</li>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Class</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($browsings as $B=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($B, $browsings->currentPage()) }}</th>
                    <td>{{$value['email']}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['phone']}}</td>

                    @foreach($classes as $val)
                    @if($val['id'] == $value['id_class'])
                    <td>{{ $val['name'] }}</td>
                    <td>{{ $val['price']}}</td>
                    @endif
                    @endforeach
                    <td>
                        <a href="{{ route('admin.browsings.store', ['id' => $value['id']]) }}" onclick="return confirm('Are you sure want to add member?')"><i class="fa fa-user-plus"></i></a>
                        <a href="{{ route('admin.browsings.edit', ['id' => $value['id']]) }}"><i class="fa">&#xf044;</i></a>
                        <a href="{{ route('admin.browsings.remove', ['id' => $value['id']]) }}" onclick="return confirm('Do you want to delete this Member Account ?')"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(Auth::user()->is_admin != 1)
    <div class="form-group">
        <div class="col-sm-12">
            <button  class="btn btn-success"><a style="color: white;" href="{{ url('/admin/browsing-account/addMember')}}">Create Member</a></button>
        </div>
    </div>
    @endif
    @if(Auth::user()->is_admin == 1)
    <div class="table-responsive">
        <div class="row" style="display: inline">
            <div class="form-group">
                <div class="col-md-6">
                    <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/browsing-account/addMember')}}">Create Member</a></button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/browsing-account/addAdmin')}}">Create Admin</a></button>
                </div>
            </div>
        </div>
        <span>List Admin</span>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $k=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($k, $user->currentPage()) }}</th>
                    <td>{{$value['email']}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['phone']}}</td>
                    <td>{{$value['address']}}</td>
                    <td>
                        <a href="{{ route('admin.browsings.edit', ['id' => $value['id']]) }}"><i class="fa fa-pencil fa-2x"></i></a>
                        <a href="{{ route('admin.browsings.remove', ['id' => $value['id']]) }}" onclick="return confirm('Do you want to delete this Account ?')"><i class="fa fa-trash fa-2x"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    You are on page {{$browsings->currentPage()}}
    <a style="font-size: 20px;margin-right: 20px;" href="{{$browsings->previousPageUrl()}}" id="previousPagebtn">
    </a> <a style="font-size: 20px;" href="{{$browsings->nextPageUrl()}}" id="nextPagebtn">>
    </a>
</div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection