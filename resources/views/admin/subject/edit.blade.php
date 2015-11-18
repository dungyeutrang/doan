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
        <h2>{{$edit?trans('admin/subject_edit.edit_subject'):trans('admin/subject_edit.add_subject')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">{{trans('admin/subject_edit.home')}}</a>
            </li>
            <li>
                <a href="{{route('admin.subject.index')}}">{{trans('admin/subject_edit.subject')}}</a>
            </li>
            <li class="active">
                <strong>{{$edit?trans('admin/subject_edit.edit'):trans('admin/subject_edit.add')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->
@section('content')
<div class="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$edit?trans('admin/subject_edit.edit_info_subject'):trans('admin/subject_edit.add_info_subject')}}</h5>
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
        {!! Form::open(array('url' =>route('admin.subject.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{trans('admin/subject_edit.name')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name',$subject->name,array('class'=>'form-control','placeholder'=>trans('admin/subject_edit.name'))) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('admin/subject_edit.save')}}</button>
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
