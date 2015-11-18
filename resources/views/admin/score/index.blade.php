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
        <h2>Manage Score:{{$student->name}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Score</strong>
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
        <h5>List Score</h5>
        <a href="{{route('admin.score.edit',['student_id'=>$studentId])}}" class="btn btn-primary pull-right">Add score</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-score dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Score Type</th>
                    <th>Score</th>
                    <th>Teacher</th>
                    <th>Priod</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>                
                @foreach($scores as $score)
                <tr>
                    <td>{{++$i + $id}}</td>
                    <td>{{$score->subject->name}}</td>
                    <td>{{$score->scoreType->name}}</td>
                    <td>{{$score->score}}</td>
                    <td>{{$score->teacher->name}}</td>
                    <td>{{$score->priod->name}} <b>({{date_format(date_create($score->priod->date_begin),"m/Y")}}-{{date_format(date_create($score->priod->date_end),"m/Y")}})</b></td>
                    <td><a href="{{route('admin.score.edit',['id'=>$score->id])}}"
                           class="btn btn-info">Edit</a></td>
                    <td><a
                            onclick="confirmDelete(this)" url="{{route('admin.score.delete',['id'=>$score->id])}}"
                            class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $scores->render() !!} 
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
<script src="{{asset('backend/js/score/index.js')}}"></script>
@endsection
