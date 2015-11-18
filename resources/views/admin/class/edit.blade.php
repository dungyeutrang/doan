@extends('layouts/main_layout') @section('css') @parent
<link href="{{asset('backend/theme/css/plugins/iCheck/custom.css')}}"
	rel="stylesheet">
<link href="{{asset('backend/css/common/select2.min.css')}}"
	rel="stylesheet">
@endsection
<!-- section top -->
@section('top') @parent
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{{$edit?trans('admin/class_edit.edit_class'):trans('admin/class_edit.add_class')}}</h2>
		<ol class="breadcrumb">
			<li><a href="{{route('admin.home.index')}}">{{trans('admin/class_edit.home')}}</a>
			</li>
			<li><a href="{{route('admin.class.index')}}">{{trans('admin/class_edit.class')}}</a>
			</li>
			<li class="active"><strong>{{$edit?trans('admin/class_edit.edit'):trans('admin/class_edit.add')}}</strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
@endsection
<!-- end section top -->
@section('content')
<div class="row ibox float-e-margins">
	<div class="ibox-title">
		<h5>{{$edit?trans('admin/class_edit.edit_info_class'):trans('admin/class_edit.add_info_class')}}</h5>
	</div>
	<div class="ibox-content">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li> @endforeach
			</ul>
		</div>
		@endif {!! Form::open(array('url'
		=>route('admin.class.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post'))
		!!}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">{{trans('admin/class_edit.name')}}</label>
			<div class="col-sm-10">{!!
				Form::text('name',$class->name,array('class'=>'form-control','placeholder'=>trans('admin/class_edit.name')))
				!!}</div>
		</div>
		<div class="form-group">
			<label for="teacher_manage_id" class="col-sm-2 control-label">{{trans('admin/class_edit.teacher_manager')}}</label>
			<div class="col-sm-5">
				<select class="form-control" name="teacher_manage_id"
					id="teacher_manage_id"> @foreach($teachers as $teacher)
					@if(!$teacher->id==$class->teacher_manage_id)
					<option value="{{$teacher->id}}">{{$teacher->name}}</option> @else
					<option selected="selected" value="{{$teacher->id}}">{{$teacher->name}}</option>
					@endif @endforeach
				</select>
			</div>
			<div class="col-sm-5">
				<button onclick="showProfile()" type="button" class="btn btn-primary form-control"
					id="view-profile">View Profile</button>
			</div>
		</div>
		<div class="form-group">
			<label for="priod" class="col-sm-2 control-label">{{trans('admin/class_edit.priod')}}</label>
			<div class="col-sm-10">
				<select id="priod_id" name="priod_id" class="form-control">
					@foreach($priods as $priod) @if($priod->id==$class->priod_id)
					<option selected="selected" value="{{$priod->id}}">{{$priod->name."
						(".date_format(date_create($priod->date_begin),"m/Y")."-".date_format(date_create($priod->date_end),"m/Y").")"}}</option>
					@else
					<option selected="selected" value="{{$priod->id}}">{{$priod->name."
						(".date_format(date_create($priod->date_begin),"m/Y")."-".date_format(date_create($priod->date_end),"m/Y").")"}}</option>
					@endif @endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">{{trans('admin/class_edit.save')}}</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection 
<!--  modal profile  -->
<div class="modal fade" id="modal-profile">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">{{trans('admin/teachersubject_edit.profile')}}</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin/teachersubject_edit.close')}}</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@section('script') @parent
<script>
var urlProfile ="{{route('admin.teachersubject.getteacher')}}";
</script>
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/select2.min.js')}}"></script>
<script src="{{asset('backend/js/class/edit.js')}}"></script>
<script src="{{asset('backend/js/common/bootstrap.min.js')}}"></script>
@endsection
