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
                        <li class="breadcrumb-item " aria-current="page">Question Management</li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
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


        <label class="col-sm-12">Select Subject</label>
        <div class="col-sm-12">
            <select name="subject" class="form-control form-control-line">
                <option value="">----</option>
                @foreach($subject as $value)
                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="col-md-12">Question</label>
            <div class="col-md-12">
                <input type="text" name="question" placeholder="Who is the handsome ?" class="form-control form-control-line">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Answer A</label>
                            <div class="col-md-12">
                                <input type="text" name="answers_A" placeholder="" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Answer B</label>
                            <div class="col-md-12">
                                <input type="text" name="answers_B" placeholder="" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Answer C</label>
                            <div class="col-md-12">
                                <input type="text" name="answers_C" placeholder="" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-md-12">Answer D</label>
                            <div class="col-md-12">
                                <input type="text" name="answers_D" placeholder="" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <label class="col-sm-12">Select Answer True</label>
                        <div class="col-sm-12">
                            <select name="true_ans" class="form-control form-control-line">
                                <option value="">--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="col-sm-12">Select Level</label>
                        <div class="col-sm-12">
                            <select name="level" class="form-control form-control-line">
                                <option value="">--</option>
                                <option value="1">Dễ</option>
                                <option value="2">Trung Bình</option>
                                <option value="3">Khó</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col-12">
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success">Add Question</button>
            </div>
        </div>
    </div>
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