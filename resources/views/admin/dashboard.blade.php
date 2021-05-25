@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('container-fluid')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales Ratio</h4>
                                <div class="sales ct-charts mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-5">Total income for today</h5>
                                <h3 class="font-light">${{$total}}</h3>
                                <div class="m-t-20 text-center">
                                    <div id="earnings"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">Member And Admin</h4>
                                <h2 class="font-light">{{$allMember}} <span class="font-16 text-success font-medium">member</span></h2>
                                <div class="m-t-30">
                                    <div class="row text-center">
                                        <div class="col-6 border-right">
                                            <h4 class="m-b-0">{{$newMember}}</h4>
                                            <span class="font-14 text-muted">New Member</span>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="m-b-0">{{$allAdmin}}</h4>
                                            <span class="font-14 text-muted">total admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Comments</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <!-- Comment Row -->
                                @foreach($user as $val_user)
                                    @foreach($rate as $val_rate)
                                            @if($val_rate['id_user'] == $val_user['id'])
                                                <div class="d-flex flex-row comment-row m-t-0">
                                                    <div class="p-2">
                                                        <img src="../../admin/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                                    </div>
                                                    <div class="comment-text w-100">
                                                        <h6 class="font-medium">{{$val_user['name']}}</h6>
                                                        <span class="m-b-15 d-block">{{$val_rate['content']}}</span>
                                                        <div class="comment-footer">
                                                            <span class="text-muted float-right">{{$val_rate['updated_at']->format('m-Y')}}</span>
                                                            @foreach($teacher as $val)
                                                                @if($val_rate['id_teacher'] == $val['id'])
                                                                    <span class="label label-success label-rounded">To the instructor: {{$val['name']}}</span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Top 5 lecturers</h4>
                                @foreach($topTeacher as $k=>$val_top)
                                    @foreach($teacher as $val_teacher)
                                        @if($k == 0 && $val_teacher['id'] == $val_top['id_teacher'])
                                            <div class="d-flex align-items-center flex-row m-t-30">
                                            <img src="{{$val_teacher['image']}}" style="width: 50px;height: 50px" alt="">
                                                <div class="m-l-10">
                                                    <h3 class="m-b-0">{{$val_teacher['name']}}</h3>
                                                </div>
                                            </div>
                                            <table class="table no-border mini-table m-t-20">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-muted">Email</td>
                                                        <td class="font-medium">{{$val_teacher['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Phone number</td>
                                                        <td class="font-medium">{{$val_teacher['phone']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Address</td>
                                                        <td class="font-medium">{{$val_teacher['address']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Rate</td>
                                                        <td class="font-medium"><span>
                                                                @for ($i = 1; $i <= 5; ++$i)
                                                                    @if($i <= $val_top['rate'])
                                                                    <i class="fa fa-star"></i>
                                                                    @else
                                                                    <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor 
                                                                </span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <ul class="row list-style-none text-center m-t-30">
                                        @elseif($k == 1 && $val_teacher['id'] == $val_top['id_teacher'])
                                            <li class="col-3">
                                                <img src="{{$val_teacher['image']}}" style="width: 50px;height: 50px" alt="">
                                                <span class="d-block text-muted">{{$val_teacher['name']}}</span>
                                                <h3 class="m-t-5"><span>
                                                                @for ($i = 1; $i <= 5; ++$i)
                                                                    @if($i <= $val_top['rate'])
                                                                    <i style="font-size: 19px;" class="fa fa-star"></i>
                                                                    @else
                                                                    <i style="font-size: 19px;" class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor 
                                                                </span></h3>
                                            </li>
                                        @elseif($k == 2 && $val_teacher['id'] == $val_top['id_teacher'])
                                            <li class="col-3">
                                                <img src="{{$val_teacher['image']}}" style="width: 50px;height: 50px" alt="">
                                                <span class="d-block text-muted">{{$val_teacher['name']}}</span>
                                                <h3 class="m-t-5"><span>
                                                                @for ($i = 1; $i <= 5; ++$i)
                                                                    @if($i <= $val_top['rate'])
                                                                    <i style="font-size: 19px;" class="fa fa-star"></i>
                                                                    @else
                                                                    <i style="font-size: 19px;" class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor 
                                                                </span></h3>
                                            </li>
                                        @elseif($k == 3 && $val_teacher['id'] == $val_top['id_teacher'])
                                            <li class="col-3">
                                                <img src="{{$val_teacher['image']}}" style="width: 50px;height: 50px" alt="">
                                                <span class="d-block text-muted">{{$val_teacher['name']}}</span>
                                                <h3 class="m-t-5"><span>
                                                                @for ($i = 1; $i <= 5; ++$i)
                                                                    @if($i <= $val_top['rate'])
                                                                    <i style="font-size: 19px;" class="fa fa-star"></i>
                                                                    @else
                                                                    <i style="font-size: 19px;" class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor 
                                                                </span></h3>
                                            </li>
                                        @elseif($k == 4 && $val_teacher['id'] == $val_top['id_teacher'])
                                            <li class="col-3">
                                                <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                                <span class="d-block text-muted">{{$val_teacher['name']}}</span>
                                                <h3 class="m-t-5"><span>
                                                                @for ($i = 1; $i <= 5; ++$i)
                                                                    @if($i <= $val_top['rate'])
                                                                    <i style="font-size: 19px;" class="fa fa-star"></i>
                                                                    @else
                                                                    <i style="font-size: 19px;" class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor 
                                                                </span></h3>
                                            </li>
                                        </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection
