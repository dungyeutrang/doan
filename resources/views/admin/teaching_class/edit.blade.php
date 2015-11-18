@extends('layouts/main_layout') @section('css') @parent
<link href="{{asset('backend/theme/css/plugins/iCheck/custom.css')}}"
      rel="stylesheet">
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
@section('top') @parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$edit?trans('admin/teachingclass_edit.edit_teachingclass'):trans('admin/teachingclass_edit.add_teachingclass')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}">{{trans('admin/teachingclass_edit.home')}}</a>
            </li>
            <li><a href="{{route('admin.class.index')}}">{{trans('admin/teachingclass_edit.teachingclass')}}</a>
            </li>
            <li class="active"><strong>{{$edit?trans('admin/teachingclass_edit.edit'):trans('admin/teachingclass_edit.add')}}</strong>
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
        <h5>{{$edit?trans('admin/teachingclass_edit.edit_info_teachingclass'):trans('admin/teachingclass_edit.add_info_teachingclass')}}</h5>
    </div>
    <div class="ibox-content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
        @endif {!!
        Form::open(array('url'=>route('admin.teachingclass.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post'))!!}
        <div class="form-group">
            <label for="class_id" class="col-sm-2 control-label">{{trans('admin/teachingclass_edit.class')}}</label>
            <div class="col-sm-10">
                <select name="class_id" class="form-control" id="class_id">
                    @foreach($classes as $class) @if($class->id ==
                    $teachingClass->class_id)
                    <option value="{{$class->id}}" selected="selected">{{$class->name."&nbsp;(".date_format(date_create($class->priod->date_begin),"m/Y")."-".date_format(date_create($class->priod->date_end),"m/Y".")")}}</option>
                    @else
                    <option value="{{$class->id}}">{{$class->name}} &nbsp;<b>({{date_format(date_create($class->priod->date_begin),"m/Y")."-".date_format(date_create($class->priod->date_end),"m/Y")}})</b></option>
                    @endif @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="teacher" class="col-sm-2 control-label">{{trans('admin/teachingclass_edit.teacher')}}</label>
            <div class="col-sm-5">
                <select name="teacher_leaning_subjects_id" class="form-control"
                        id="teacher_leaning_subjects_id"> @foreach($teacherSubjects as
                    $teacherSubject) @if($teacherSubject->id ==
                    $teachingClass->teacher_leaning_subjects_id)
                    <option teacherid="{{$teacherSubject->teacher_id}}" value="{{$teacherSubject->id}}" selected="selected">{{$teacherSubject->teacher->name."
						(".$teacherSubject->subject->name.")"}}</option> @else
                    <option teacherid="{{$teacherSubject->teacher_id}}" value="{{$teacherSubject->id}}" >{{$teacherSubject->teacher->name."
						(".$teacherSubject->subject->name.")"}}</option> @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">
                <button type="button" class="btn btn-primary form-control" onclick="showProfile()">View Profile</button>			
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('admin/teachingclass_edit.save')}}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!--  modal profile  -->
<div class="modal fade" id="modal-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{trans('admin/teachingclass_edit.profile')}}</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin/teachingclass_edit.close')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection @section('script') @parent
<script>
    var urlProfile = "{{route('admin.teachingclass.getteacher')}}";
</script>
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/select2.min.js')}}"></script>
<script src="{{asset('backend/js/teachingclass/edit.js')}}"></script>
<script src="{{asset('backend/js/common/bootstrap.min.js')}}"></script>
@endsection
