@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">List Member</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Home
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Member</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container-fluid')
<div class="container-fluid">
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member as $k=>$value)
                    <tr>
                        <th scope="row">{{ Helper::stt($k, $member->currentPage()) }}</th>
                        <td style="color : blue" class="btn" data-toggle="modal" data-target="#{{$value['id']}}">{{$value['name']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['phone']}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>

            You are on page {{$member->currentPage()}}
            <a style="font-size: 20px;margin-right: 20px;" href="{{$member->previousPageUrl()}}" id="previousPagebtn">
                <</a> <a style="font-size: 20px;" href="{{$member->nextPageUrl()}}" id="nextPagebtn">>
            </a>
            @foreach($member as $val)
                <div class="modal fade" id="{{$val['id']}}" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content"style="width: 800px;">
                        <h2 style="text-align: center;">Detail Member</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Name Class</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Bill</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($user_class as $us_class)
                                    <tr>
                                        @foreach($classes as $class)
                                            @if($val['id'] == $us_class['id_user'] && $us_class['id_class'] == $class['id'])
                                                <td>{{$class['name']}}</td>
                                                @foreach($teacher as $teach)
                                                    @if($teach['id'] == $class['id_teacher'])
                                                        <td>{{$teach['name']}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach($subject as $sub)
                                                    @if($sub['id'] == $class['id_subject'])
                                                        <td>{{$sub['name']}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$class['price']}}</td>
                                            @endif    
                                        @endforeach
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <?php $check = false; ?>
                        @foreach($results as $res)
                            @if($res['id_user'] == $val['id'])
                                <?php $check = true; ?>
                            @endif
                        @endforeach
                            @if($check)
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Scores</th>
                                        <th scope="col">Right Answer</th>
                                        <th scope="col">Wrong Answer</th>
                                        <th scope="col">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $res)
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
                            @endif
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="border: 1px solid;">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>


    </div>
</div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection