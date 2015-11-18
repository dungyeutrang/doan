@extends('layouts/main_layout') @section('css') @parent
<!-- Data Tables -->
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.bootstrap.css')}}"
    rel="stylesheet">
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.responsive.css')}}"
    rel="stylesheet">
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.tableTools.min.css')}}"
    rel="stylesheet">
<link href="{{asset('backend/css/common/datatable.css')}}"
      rel="stylesheet">

<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Summary of Student {{$student->name}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">{{trans('admin/student_edit.home')}}</a>
            </li>          
            <li class="active">
                <strong>Summary</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->

@endsection @section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>Info Detail</h5>
        @if($existStudentLearning)
        <button type="button" onclick="alert('You have been add summary for class current !')"  class="btn btn-primary pull-right">Add Summary for Class Current</button>                
        @else
        <a href="{{route('admin.summary.edit',['student_learning_id'=>$studentLearning->id])}}" class="btn btn-primary pull-right">Add Summary for Class Current</a>        
        @endif
    </div>
    <div class="ibox-content">      
        <table
            class="table  table-bordered table-hover dataTables-summary dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Priod</th>
                    <th>Class</th>
                    <th>Teacher Manager</th>
                    <th>Conduct</th>
                    <th>Ranking Academic</th>
                    <th>Score Average</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($summaries as $summary)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$summary->studentLearning->priod->name}}</td> 
                    <td>{{$summary->studentLearning->classModel->name}}</td>
                    <td>{{$summary->studentLearning->classModel->teacher->name}}</td>       
                    <td>{{$summary->conduct->name}}</td>                    
                    <td>{{$summary->rankingAcademic->name}}</td>                    
                    <td>{{$summary->score_average}}</td>           
                    <td><a class="btn btn-warning" href="{{route('admin.summary.edit',['student_learning_id'=>$summary->student_learning_class_id,'id'=>$summary->id])}}">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="confirmDelete(this)" url="{{route('admin.summary.delete',['student_id'=>$student->id,'id'=>$summary->id])}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $summaries->render() !!}
@endsection
@section('script')
@parent
<!-- Data Tables -->
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/summary/index.js')}}"></script>
@endsection
