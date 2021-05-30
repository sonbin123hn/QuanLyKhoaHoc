@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Test Result</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Test Result</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container-fluid')
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="">Course</label>
                    <select class="form-control" name="course" id="course">
                        <option value="">-- Select Course --</option>
                        @foreach($course as $val_co)
                            <option value="{{$val_co['id']}}">{{$val_co['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4 class">
                <div class="form-group">
                    <label for="">Class</label>
                    <select class="form-control select" name="class">
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-4 class">
                <button class="btn btn-success">Seach</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-inverse table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>ID Class</th>
                        <th>ID Exam</th>
                        <th>Exam Date</th>
                        <th>Correct</th>
                        <th>Incorrect</th>
                        <th>Result</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scores as $val_sc)
                    <tr>
                        @foreach($user as $val_us)
                            @if($val_sc['id_user'] == $val_us['id'])
                                <td scope="row">{{$val_us['name']}}</td>
                                <td>{{$val_us['email']}}</td>
                            @endif
                        @endforeach
                        <td>{{$val_sc['id_class']}}</td>
                        <td>{{$val_sc['id_exams']}}</td>
                        @foreach($exams as $val_ex)
                            @if($val_sc['id_exams'] == $val_ex['id'])
                                <td>{{$val_ex['date_begin']}}</td>
                            @endif
                        @endforeach
                        <td>{{$val_sc['right_ans']}}</td>
                        <td>{{$val_sc['wrong_ans']}}</td>
                        <td>{{$val_sc['scores']}}</td>
                            @if($val_sc['scores'] >= 5)
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
</div>
@endsection
@section('footer')
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://www.facebook.com/sonbin1999/">Mai La AE Team</a>.
</footer>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".class").hide();
        var idClass = ""
        $("#course").change(function() {
            var id = $(this).val();
            if (id == "") {
                $(".class").hide();
            } else {
                $(".class").show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "GET",
                    url: 'admin/scores/ajax/'+id+'',
                    success: function(data) {
                        var html = ""
                        var classes = JSON.parse(JSON.stringify(data));
                        var arr = classes['class'];
                            Object.keys(arr).map(function(key,index){
                                html += "<option value='"+arr[key]['id']+"'>"+arr[key]['name']+"</option>";
                            })
                        $(".select").html(html);
                    }
                })
            }
        })
        
    })
</script>
@endsection