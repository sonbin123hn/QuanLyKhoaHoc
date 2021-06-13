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
    <!-- hien thi thong bao -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        {{session('success')}}
    </div>
    @endif
    <!-- hien thi loi request -->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Exam Date</label>
                    <div class="col-md-12">
                        <input type="date" name="date_begin" placeholder="" class="form-control form-control-line">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Exam Time</label>
                    <div class="col-md-12">
                        <input type="time" name="time_begin" placeholder="" class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Exam Name</label>
                    <div class="col-md-12">
                        <input type="text" name="name" placeholder="Java Middle Test" class="form-control form-control-line">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-md-12">Duration</label>
                    <div class="col-md-12">
                        <input type="number" name="duration" placeholder="90 minutes" class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="col-md-12">Description </label>
                    <div class="col-md-12">
                        <input type="text" name="description" placeholder="This is the middle test of Java" class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="col-sm-12">Select Couse</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" id="course">
                            <option value="">-- Select Course --</option>
                            @foreach($course as $value)
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-3 class">
                <div class="form-group">
                    <label class="col-sm-12">Select Class</label>
                    <div class="col-sm-12">
                        <select name="id_class" class="form-control form-control-line select">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Easy Questions</label>
                            <div class="col-md-12">
                                <input type="number" name="de" placeholder="5" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Normal Questions</label>
                            <div class="col-md-12">
                                <input type="number" name="tb" placeholder="10" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Hard Questions</label>
                            <div class="col-md-12">
                                <input type="number" name="kho" placeholder="5" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success">Add Exam</button>
            </div>
        </div>
    </form>
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
                    url: 'ajax/'+id+'',
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
