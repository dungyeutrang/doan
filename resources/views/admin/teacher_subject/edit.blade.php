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
        <h2>{{$edit?trans('admin/teachersubject_edit.edit_teachersubject'):trans('admin/teachersubject_edit.add_teachersubject')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}">{{trans('admin/teachersubject_edit.home')}}</a>
            </li>
            <li><a href="{{route('admin.class.index')}}">{{trans('admin/teachersubject_edit.teachersubject')}}</a>
            </li>
            <li class="active"><strong>{{$edit?trans('admin/teachersubject_edit.edit'):trans('admin/teachersubject_edit.add')}}</strong>
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
        <h5>{{$edit?trans('admin/teachersubject_edit.edit_info_teachersubject'):trans('admin/teachersubject_edit.add_info_teachersubject')}}</h5>
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
        =>route('admin.teachersubject.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post'))
        !!}
        <div class="form-group">
            <label for="teacher_id" class="col-sm-2 control-label">{{trans('admin/teachersubject_edit.teacher')}}</label>
            <div class="col-sm-5">
                <select name="teacher_id" class="form-control
                        js-example-basic-multiple"
                        id="teacher_id"> @foreach($teachers as $teacher) @if($teacher->id
                    == $teacherSubject->teacher_id)
                    <option value="{{$teacher->id}}" selected="selected">{{$teacher->name}}</option>
                    @else
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option> @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">
                <button onclick="showProfile()" type="button"
                        class="btn btn-primary">{{trans('admin/teachersubject_edit.view_profile')}}</button>
            </div>
        </div>
        <div class="form-group">
            <label for="priod" class="col-sm-2 control-label">{{trans('admin/teachersubject_edit.subject')}}</label>
            <div class="col-sm-5">
                <select name="subject_id" class="form-control" id="subject_id"> @foreach($subjects as
                    $subject) @if($subject->id == $teacherSubject->subject_id)
                    <option value="{{$subject->id}}" selected="selected">{{$subject->name}}</option>
                    @else
                    <option value="{{$subject->id}}">{{$subject->name}}</option> @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('admin/teachersubject_edit.save')}}</button>
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
@endsection @section('script') @parent
<script>
    var urlProfile = "{{route('admin.teachersubject.getteacher')}}";
</script>
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/select2.min.js')}}"></script>
<script src="{{asset('backend/js/teachersubject/edit.js')}}"></script>
<script src="{{asset('backend/js/common/bootstrap.min.js')}}"></script>
@endsection
