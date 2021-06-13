@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Receipts</h4>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Name Member</th>
                    <th scope="col">Name Course</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($static as $k=>$value)
                <tr>
                    <th scope="row">{{ Helper::stt($k, $static->currentPage()) }}</th>
                    @foreach($user as $val_user)
                        @if($value['id_user'] == $val_user['id'])
                        <td>{{ $val_user['name'] }}</td>
                        @endif
                    @endforeach
                    @foreach($course as $val)
                        @if($value['id_course'] == $val['id'])
                        <td>{{ $val['name'] }}</td>
                        @endif
                    @endforeach
                    <td>{{$value['amount']}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        You are on page {{$static->currentPage()}}
        <a style="font-size: 20px;margin-right: 20px;" href="{{$static->previousPageUrl()}}" id="previousPagebtn"><</a>
        <a style="font-size: 20px;" href="{{$static->nextPageUrl()}}" id="nextPagebtn">></a>
    </div>

    <div style="margin-top:100px;margin-right: 120px; " class="container-fluid col-8">
    <form name='formTextbox' onSubmit="return getValue(event)">
            <div class="form-group">
                <label>Statistic:</label>
                <div class="col-9 d-flex justify-content-between">
                    <select name="" onchange="" id="course">
                        <option value="">-- Select --</option>
                        @foreach($course as $valC)
                            <option value="{{$valC['id']}}">{{$valC['name']}}</option>
                        @endforeach
                    </select>
                    <input type="number" name="year" id="year" class="form-control ml-1" placeholder="Enter year">
                    <button type="submit" class="btn btn-info ml-1">Submit</button>
                </div>
                <small id="emailHelp" class="form-text text-muted">Please enter the year or select the course you want statistics for
                </small>
            </div>
        </form>
        <form name="formRadio">
            <label for="exampleInputPassword1">Statistic select by:</label>
            <div class="col-10 float-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioButton" id="inlineRadio" value="1">
                    <label class="form-check-label" for="inlineRadio3">Top Course</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioButton" id="inlineRadio" value="2">
                    <label class="form-check-label" for="inlineRadio4">Top year</label>
                </div>
            </div>
        </form>
        <h2 id="ketqua" style="display: none;"></h2>

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
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<script>
$(document).ready(function() {
    $('form').submit(function(){
        let flag = true
        let year = document.forms['formTextbox'].year.value
        if (year.toString().length <= 0 || year > new Date().getFullYear().toString() || year.toString().length > 4)
            flag = false
        if(flag){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                method: "POST",
                url: '/admin/ajax_year',
                data:{
                    "_token": "{{ csrf_token() }}",
                    year: year
                },
                success: function(data) {
                    $('#ketqua').text("Total sales in :"+year+" : is : "+data).show();
                }
            })
        }else{
            alert("");
        }
    })
    $('#course').change(function(){
        var check = $(this).val();
        if(check){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "GET",
                url: '/admin/ajax_course/'+check+'',
                success: function(data) {
                    $('#ketqua').text("Total sales of Ademe is : "+data+" $").show();
                }
            })
        }
    })
    $('.form-check-input').click(function(){
        $check = $(this).val();
        if($check == 1){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "GET",
                url: '/admin/ajax_courseTop/course',
                success: function(data) {
                    $('#ketqua').text(data).show();
                }
            })
        }
        if($check == 2){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "GET",
                url: '/admin/ajax_courseTop/year',
                success: function(data) {
                    $('#ketqua').text(data).show();
                }
            })
        }
    })
    
})//document
</script>
@endsection
