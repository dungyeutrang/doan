@extends('layouts/main_layout')
@section('css')
@parent
<link href="{{asset('backend/theme/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/common/select2.min.css')}}"
      rel="stylesheet">
<style>
    .select2-selection--single{
        border: 1px solid #e5e6e7 !important;
        padding: 5px 12px;
        font-size: 14px;
        height: 38px !important;    
    }  
    .select2-results {
         border: 1px solid #e5e6e7 !important;
    }
    
</style>
@endsection
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$edit?"Edit Score":"Add Score"}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>
            <li>
                <a href="{{route('admin.score.index')}}">Score</a>
            </li>
            <li class="active">
                <strong>{{$edit?"Edit":"Add"}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->

@section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$edit?"Edit Info Score":"Add Info Score"}}</h5>
    </div>
    <div class="ibox-content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::open(array('url' =>route('admin.score.edit',['student_id'=>$studentId,'id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <input type="hidden" value="{{$studentId}}" name="student_id">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Subjects</label>
            <div class="col-sm-10">
                <select class="form-control" name="subject_id" id="subject_id">
                    @foreach($subjects as $subject)
                    @if($subject->id==$score->subject_id)
                    <option value="{{$subject->id}}" selected="selected">{{$subject->name}}</option>
                    @else
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>                         
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Teachers</label>
            <div class="col-sm-10">
                <select class="form-control" name="teacher_id" id="teacher_id">
                    @foreach($teachers as $teacher)
                    @if($teacher->id==$score->teacher_id)
                    <option value="{{$teacher->id}}" selected="selected">{{$teacher->name}}</option>
                    @else
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Priods</label>
            <div class="col-sm-10">
                <select class="form-control" name="priod_id" id="priod_id">
                    @foreach($priods as $priod)
                    @if($priod->id==$score->priod_id)
                    <option value="{{$priod->id}}" selected="selected">{{$priod->name}}</option>
                    @else
                    <option value="{{$priod->id}}">{{$priod->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Score Types</label>
            <div class="col-sm-10">
                <select class="form-control" name="score_type_id" id="score_type_id">
                    @foreach($scoreTypes as $scoreType)
                    @if($scoreType->id==$score->score_type_id)
                    <option value="{{$scoreType->id}}" selected="selected">{{$scoreType->name}}</option>
                    @else
                    <option value="{{$scoreType->id}}">{{$scoreType->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Score</label>
            <div class="col-sm-10">
                {!! Form::text('score',$score->score,array('class'=>'form-control','placeholder'=>"Exampe:8.5")) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>    
</div>
@endsection
@section('script')
@parent
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/select2.min.js')}}"></script>
<script src="{{asset('backend/js/score/edit.js')}}"></script>
@endsection
