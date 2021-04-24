@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Question Management</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           Home
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Question Management</li>
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
                <button class="btn btn-success"><a style="color: white;" href="{{ url('/admin/question/add')}}">Add question</a></button>
            </div>
        </div>
        <label class="col-sm-12">Select Subject</label>
        <select name="id_subject" id="subject" class="form-control form-control-line">
            <option value="">----</option>
            @foreach($subject as $value)
            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
            @endforeach
        </select>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Question</th>
                        <th scope="col">Answer A</th>
                        <th scope="col">Answer B</th>
                        <th scope="col">Answer C</th>
                        <th scope="col">Answer D</th>
                        <th scope="col">Answer True</th>
                        <th scope="col">Level</th> 
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question as $k=>$val)
                    <tr>
                        <td>{{ Helper::stt($k, $question->currentPage()) }}</td>
                        @foreach($ans as $v)
                            @if($val['id'] == $v['id_question'])
                                <td>{{$v['question']}}</td>
                                <td>{{$v['answers_A']}}</td>
                                <td>{{$v['answers_B']}}</td>
                                <td>{{$v['answers_C']}}</td>
                                <td>{{$v['answers_D']}}</td>
                            @endif
                        @endforeach
                        <td>{{$val['true_ans']}}</td>
                        @if($val['level'] == 1)
                            <td>Dễ</td>
                        @elseif($val['level'] == 2)
                            <td>Trung Bình</td>
                        @else
                            <td>Khó</td>
                        @endif
                        @foreach($subject as $value)
                            @if($val['id_subject'] == $value['id'])
                            <td>{{ $value['name'] }}</td>
                            @endif
                        @endforeach
                        <td>
                            <a href="{{ route('admin.question.edit', ['id' => $val['id']]) }}"><i style="font-size:24px" class="fa">&#xf044;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            You are on page {{$question->currentPage()}}
            <a style="font-size: 20px;margin-right: 20px;" href="{{$question->previousPageUrl()}}" id="previousPagebtn">
                <</a> <a style="font-size: 20px;" href="{{$question->nextPageUrl()}}" id="nextPagebtn">>
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
        $("#subject").change(function() {
            $(".table").hide();
            var id = $(this).val();
            if (id == "") {
                $(".table").hide();
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: 'question/ajax',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_subject: id
                    },
                    success: function(data) {
                        if(data != ""){
                            $(".table").show();
                            location.reload();
                        }else{
                            $(".table").hide();
                        }
                    }
                })
            }

        })
        
    })
</script>
@endsection