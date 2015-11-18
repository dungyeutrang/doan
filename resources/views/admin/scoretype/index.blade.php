@extends('layouts/main_layout')
@section('css')
@parent
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
@endsection 
@section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>Manage Score Type</h5>
        <a href="{{route('admin.scoretype.edit')}}" class="btn btn-primary pull-right">Add Score Type</a>
    </div>
    <div class="ibox-content">
        <table
            class="table table-bordered table-hover dataTables-scoretype dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($scoreTypes as $scoreType)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$scoreType->name}}</td>
                    <td><a href="{{route('admin.scoretype.edit',['id'=>$scoreType->id])}}"
                           class="btn btn-info">Edit</a></td>
                    <td><a onclick="confirmDelete(this)" url="{{route('admin.scoretype.delete',['id'=>$scoreType->id])}}"
                           class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $scoreTypes->render() !!} 
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
<script src="{{asset('backend/js/scoretype/index.js')}}"></script>
@endsection
