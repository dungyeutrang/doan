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
        <h2>{{$edit?"Edit Award":"Add Award"}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>
            <li>
                <a href="{{route('admin.award.index')}}">Award</a>
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
        <h5>{{$edit?"Edit Info Award":"Add Info Award"}}</h5>        
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
        {!! Form::open(array('url' =>route('admin.award.edit',['id'=>$id]),'class'=>'form-horizontal','method'=>'post')) !!}
        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
                {!! Form::textarea('content',$award->content,array('class'=>'form-control','placeholder'=>'content')) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="priod_id" class="col-sm-2 control-label">Priod</label>
            <div class="col-sm-10">
                <select class="form-control" name="priod_id" id='priod_id'>
                    @foreach($priods as $priod)
                    @if($priod->id != $award->priod_id)                      
                    <option value="{{$priod->id}}">{{$priod->name}} <b>({{date_format(date_create($priod->date_begin),"d/m/Y")."-".date_format(date_create($priod->date_end),'d/m/Y')}})</b></option>
                    @else                                            
                    <option selected="selected" value="{{$priod->id}}">{{$priod->name}}</option>
                    @endif                      
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="student_id" class="col-sm-2 control-label">Student</label>
            <div class="col-sm-5">
                <select class="form-control" name="student_id" id='student_id'>
                    @foreach($students as $student)
                    @if($student->id != $student->id)                      
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @else                                            
                    <option selected="selected" value="{{$student->id}}">{{$student->name}}</option>
                    @endif                      
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">
                <button onclick="showProfile()" type="button"
                        class="btn btn-primary">{{trans('admin/teachersubject_edit.view_profile')}}</button>
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

<!--  modal profile  -->
<div class="modal fade" id="modal-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('script')
@parent
<script>
    var urlProfile = "{{route('admin.student.getstudent')}}";
</script>
<script src="{{asset('backend/js/award/edit.js')}}"></script>
<script src="{{asset('backend/theme/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('backend/js/common/select2.min.js')}}"></script>
@endsection
