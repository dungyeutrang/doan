@extends('layouts/main_layout')
@section('css')
@parent
<link href="{{asset('backend/theme/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('backend/css/common/kendo.common-material.min.css')}}" />
<link rel="stylesheet" href="{{asset('backend/css/common/kendo.material.min.css')}}" />
@endsection
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$edit?trans('admin/student_edit.edit_student'):trans('admin/student_edit.add_student')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">{{trans('admin/student_edit.home')}}</a>
            </li>
            <li>
                <a href="{{route('admin.student.index')}}">{{trans('admin/student_edit.student')}}</a>
            </li>
            <li class="active">
                <strong>{{$edit?trans('admin/student_edit.edit'):trans('admin/student_edit.add')}}</strong>
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
        <h5>{{$edit?trans('admin/student_edit.edit_info_student'):trans('admin/student_edit.add_info_student')}}</h5>
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
        {!! Form::open(array('url' =>route('admin.student.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{trans('admin/student_edit.name')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name',$student->name,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.name'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="birth day" class="col-sm-2 control-label">{{trans('admin/student_edit.birth_day')}}</label>
            <div class="col-sm-10">
                {!! Form::text('birth_day',$student->birth_day,array('class'=>'form-control','style'=>'width: 100%;','id'=>'birth_day','placeholder'=>trans('admin/student_edit.birth_day'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">{{trans('admin/student_edit.address')}}</label>
            <div class="col-sm-10">
                {!! Form::text('address',$student->address,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.address'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="native_place" class="col-sm-2 control-label">{{trans('admin/student_edit.native_place')}}</label>
            <div class="col-sm-10">
                {!! Form::text('native_place',$student->native_place,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.native_place'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">{{trans('admin/student_edit.gender')}}</label>
            <div class="col-sm-10">
                @if(is_null($student->gender))
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0)!!}
                    {{trans('admin/student_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1)!!}
                    {{trans('admin/student_edit.female')}}                  
                </label>
                @else
                @if(!$student->gender)
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0,true)!!}
                    {{trans('admin/student_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1)!!}
                    {{trans('admin/student_edit.female')}}
                </label>
                @else
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0)!!}
                    {{trans('admin/student_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1,true)!!}
                    {{trans('admin/student_edit.female')}}
                </label>
                @endif
                @endif
            </div>
        </div>
         <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                @if(is_null($student->gender))
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',0)!!}
                    Stop
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',1)!!}
                    Learning
                </label>
                @else
                @if(!$student->gender)
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',0,true)!!}
                    Stop
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',1)!!}
                    Learning
                </label>
                @else
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',0)!!}
                    Stop
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('status',1,true)!!}
                    Learning
                </label>
                @endif
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="ethnic" class="col-sm-2 control-label">{{trans('admin/student_edit.ethnic')}}</label>
            <div class="col-sm-10">
                {!! Form::text('ethnic',$student->ethnic,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.ethnic'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="religion" class="col-sm-2 control-label">{{trans('admin/student_edit.religion')}}</label>
            <div class="col-sm-10">
                {!! Form::text('religion',$student->religion,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.religion'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <label for="date_in" class="col-sm-2 control-label">{{trans('admin/student_edit.date_in')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_in',$student->date_in,array('class'=>'form-control','style'=>'width: 100%;','id'=>'date_in','placeholder'=>trans('admin/student_edit.date_in'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <label for="date_out" class="col-sm-2 control-label">{{trans('admin/student_edit.date_out')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_out',$student->date_out,array('class'=>'form-control','style'=>'width: 100%;','id'=>'date_out','placeholder'=>trans('admin/student_edit.date_out'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <label for="name_father" class="col-sm-2 control-label">{{trans('admin/student_edit.name_father')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name_father',$student->name_father,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.name_father'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="job_father" class="col-sm-2 control-label">{{trans('admin/student_edit.job_father')}}</label>
            <div class="col-sm-10">
                {!! Form::text('job_father',$student->job_father,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.job_father'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="name_mother" class="col-sm-2 control-label">{{trans('admin/student_edit.name_mother')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name_mother',$student->name_mother,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.name_mother'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="job_mother" class="col-sm-2 control-label">{{trans('admin/student_edit.job_mother')}}</label>
            <div class="col-sm-10">
                {!! Form::text('job_mother',$student->job_mother,array('class'=>'form-control','placeholder'=>trans('admin/student_edit.job_mother'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('admin/student_edit.save')}}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>    
</div>
@endsection
@section('script')
@parent
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/kendo.all.min.js')}}"></script>
<script src="{{asset('backend/js/student/edit.js')}}"></script>
@endsection
