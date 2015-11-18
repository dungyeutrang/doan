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
        <h2>{{$edit?trans('admin/priod_edit.edit_priod'):trans('admin/priod_edit.add_priod')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">{{trans('admin/priod_edit.home')}}</a>
            </li>
            <li>
                <a href="{{route('admin.priod.index')}}">{{trans('admin/priod_edit.priod')}}</a>
            </li>
            <li class="active">
                <strong>{{$edit?trans('admin/priod_edit.edit'):trans('admin/priod_edit.add')}}</strong>
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
        <h5>{{$edit?trans('admin/priod_edit.edit_info_priod'):trans('admin/priod_edit.add_info_priod')}}</h5>        
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
        {!! Form::open(array('url' =>route('admin.priod.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{trans('admin/priod_edit.name')}}</label>
            <div class="col-sm-10">
                {!! Form::text('name',$priod->name,array('class'=>'form-control','placeholder'=>trans('admin/priod_edit.name'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="date_begin" class="col-sm-2 control-label">{{trans('admin/priod_edit.date_begin')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_begin',$priod->date_begin,array('class'=>'form-control','style'=>'width: 100%;','id'=>'date_begin','placeholder'=>trans('admin/priod_edit.date_begin'))) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="date_end" class="col-sm-2 control-label">{{trans('admin/priod_edit.date_end')}}</label>
            <div class="col-sm-10">
                {!! Form::text('date_end',$priod->date_end,array('class'=>'form-control','id'=>'date_end','style'=>'width: 100%;','placeholder'=>trans('admin/priod_edit.date_end'))) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('admin/priod_edit.save')}}</button>
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
<script src="{{asset('backend/js/priod/edit.js')}}"></script>
@endsection
