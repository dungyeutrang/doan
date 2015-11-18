@extends('layouts/main_layout')
@section('css')
@parent
<link href="{{asset('backend/theme/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$edit?"Edit Summary":"Add Summary"}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>
            <li>
                <a href="{{route('admin.summary.index',['student_learning_id'=>$student_learning_id])}}">Summary</a>
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
        <h5>{{$edit?"Edit Info Summary":"Add Info Summary"}}</h5>
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
        {!! Form::open(array('url' =>route('admin.summary.edit',['student_learning_id'=>$student_learning_id,'id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <input type="hidden" name="student_learning_class_id" value="{{$student_learning_id}}">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Conduct</label>
            <div class="col-sm-10">
                <select class="form-control" name="conduct_id" id="conduct_id">
                    @foreach($conducts as $conduct)
                    @if($summary->conduct_id==$conduct->id)
                    <option selected="selected" value="{{$conduct->id}}">{{$conduct->name}}</option>
                    @else                     
                    <option  value="{{$conduct->id}}">{{$conduct->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Ranking Academic</label>
            <div class="col-sm-10">
                <select class="form-control" name="ranking_academic_id" id="ranking_academic_id">
                    @foreach($rankingAcademics as $rankingAcademic)
                    @if($rankingAcademic->id==$summary->ranking_academic_id)
                    <option selected="selected" value="{{$rankingAcademic->id}}">{{$rankingAcademic->name}}</option>
                    @else                     
                    <option  value="{{$rankingAcademic->id}}">{{$rankingAcademic->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Score Average</label>
            <div class="col-sm-10">
                {!! Form::text('score_average',$summary->score_average,array('class'=>'form-control','placeholder'=>"Score average")) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                {!! Form::textarea('comment',$summary->comment,array('class'=>'form-control','placeholder'=>"Comment")) !!}
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
@endsection
