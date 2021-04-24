@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Classes</h4>
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
        @foreach($ans as $val)
        <div class="form-group">
            <label class="col-md-12">Question</label>
            <div class="col-md-12">
                <input type="text" value="{{$val['question']}}" name="question" placeholder="Please enter service " class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Answer A</label>
            <div class="col-md-12">
                <input type="text" value="{{$val['answers_A']}}" name="answers_A" placeholder="Please enter detail " class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Answer B</label>
            <div class="col-md-12">
                <input type="text" value="{{$val['answers_B']}}" name="answers_B" placeholder="Please enter detail " class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Answer C</label>
            <div class="col-md-12">
                <input type="text" value="{{$val['answers_C']}}" name="answers_C" placeholder="Please enter detail " class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Answer D</label>
            <div class="col-md-12">
                <input type="text" value="{{$val['answers_D']}}" name="answers_D" placeholder="Please enter detail " class="form-control form-control-line">
            </div>
        </div>
        @endforeach
        <label class="col-sm-12">Select Subject</label>
        <div class="col-sm-12">
            <select name="subject" class="form-control form-control-line">
                @foreach($subject as $value)
                <option value="{{ $value['id'] }}" <?php echo $question->id_subject == $value['id'] ? 'selected' : ''; ?>>{{ $value['name'] }}</option>
                @endforeach
            </select>
        </div>
        <label class="col-sm-12">Select Answer True</label>
        <div class="col-sm-12">
            <select value="" name="true_ans" class="form-control form-control-line">
                @if($question->true_ans == "A")
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                @endif
                @if($question->true_ans == "B")
                <option value="B">B</option>
                <option value="A">A</option>
                <option value="C">C</option>
                <option value="D">D</option>
                @endif
                @if($question->true_ans == "C")
                <option value="C">C</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="D">D</option>
                @endif
                @if($question->true_ans == "D")
                <option value="D">D</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                @endif
            </select>
        </div>
        <label class="col-sm-12">Select Level</label>
        <div class="col-sm-12">
            <select name="level" class="form-control form-control-line">
                @if($question->level == 1)
                <option value="1">Dễ</option>
                <option value="2">Trung Bình</option>
                <option value="3">Khó</option>
                @endif
                @if($question->level == 2)
                <option value="2">Trung Bình</option>
                <option value="1">Dễ</option>
                <option value="3">Khó</option>
                @endif
                @if($question->level == 3)
                <option value="3">Khó</option>
                <option value="1">Dễ</option>
                <option value="2">Trung Bình</option>
                @endif
            </select>
        </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success">Update Question</button>
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