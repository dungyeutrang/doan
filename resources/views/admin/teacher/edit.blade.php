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
        <h2>{{$edit?trans('admin/teacher_edit.edit_teacher'):trans('admin/teacher_edit.add_teacher')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">{{trans('admin/teacher_edit.home')}}</a>
            </li>
            <li>
                <a href="{{route('admin.teacher.index')}}">{{trans('admin/teacher_edit.teacher')}}</a>
            </li>
            <li class="active">
                <strong>{{$edit?trans('admin/teacher_edit.edit'):trans('admin/teacher_edit.add')}}</strong>
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
        <h5>{{$edit?trans('admin/teacher_edit.edit_info_teacher'):trans('admin/teacher_edit.add_info_teacher')}}</h5>
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
        {!! Form::open(array('url' =>route('admin.teacher.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{trans('admin/teacher_edit.name')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name',$teacher->name,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.name'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="identity_number" class="col-sm-2 control-label">{{trans('admin/teacher_edit.identity_number')}}</label>
            <div class="col-sm-10">
                {!! Form::text('identity_number',$teacher->identity_number,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.identity_number'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="birth day" class="col-sm-2 control-label">{{trans('admin/teacher_edit.birth_day')}}</label>
            <div class="col-sm-10">
                {!! Form::text('birth_day',$teacher->birth_day,array('class'=>'form-control','style'=>'width: 100%;','id'=>'birth_day','placeholder'=>trans('admin/teacher_edit.birth_day'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">{{trans('admin/teacher_edit.address')}}</label>
            <div class="col-sm-10">
                {!! Form::text('address',$teacher->address,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.address'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="native_place" class="col-sm-2 control-label">{{trans('admin/teacher_edit.native_place')}}</label>
            <div class="col-sm-10">
                {!! Form::text('native_place',$teacher->native_place,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.native_place'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">{{trans('admin/teacher_edit.gender')}}</label>
            <div class="col-sm-10">
                @if(is_null($teacher->gender))
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0)!!}
                    {{trans('admin/teacher_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1)!!}
                    {{trans('admin/teacher_edit.female')}}                  
                </label>
                @else
                @if(!$teacher->gender)
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0,true)!!}
                    {{trans('admin/teacher_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1)!!}
                    {{trans('admin/teacher_edit.female')}}
                </label>
                @else
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',0)!!}
                    {{trans('admin/teacher_edit.male')}}
                </label>
                <label class="checkbox-inline"> 
                    {!! Form::radio('gender',1,true)!!}
                    {{trans('admin/teacher_edit.female')}}
                </label>
                @endif
                @endif
            </div>
        </div>      
        <div class="form-group">
            <label for="date_in" class="col-sm-2 control-label">{{trans('admin/teacher_edit.date_in')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_in',$teacher->date_in,array('class'=>'form-control','style'=>'width: 100%;','id'=>'date_in','placeholder'=>trans('admin/teacher_edit.date_in'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <label for="date_out" class="col-sm-2 control-label">{{trans('admin/teacher_edit.date_out')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_out',$teacher->date_out,array('class'=>'form-control','style'=>'width: 100%;','id'=>'date_out','placeholder'=>trans('admin/teacher_edit.date_out'))) !!}
            </div>
        </div>        
        <div class="form-group">
            <label for="favorite" class="col-sm-2 control-label">{{trans('admin/teacher_edit.favorite')}}</label>
            <div class="col-sm-10">
                {!! Form::textarea('favorite',$teacher->favorite,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.favorite'))) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="experience" class="col-sm-2 control-label">{{trans('admin/teacher_edit.experience')}}</label>
            <div class="col-sm-10">
                {!! Form::textarea('experience',$teacher->experience,array('class'=>'form-control','placeholder'=>trans('admin/teacher_edit.experience'))) !!}
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
<script src="{{asset('backend/js/teacher/edit.js')}}"></script>
@endsection
