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
        <h2>Manage Student Learning</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Student Learning</strong>
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
        <h5>List Detail</h5> 
        <form class="form-inline pull-right">            
            <div class="form-group">
                <button onclick="addMultiClass()" type="button" class="btn btn-success">Add class</button>
            </div>
        </form>
    </div>
    <div class="ibox-content">        
        <table
            class="table table-bordered table-hover dataTables-studentlearning dataTable dtr-inline">
            <thead>
                <tr>
                    <td>Check All</td>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Status</th>
                    <th>Current Class</th>
                    <th>Action</th>
                    <th>Score</th>
                    <th>Summary</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($students as $student)
                <tr>
                    <td><input studentId="{{$student->id}}" type="checkbox" class="check_add_student_class"/></td>
                    <td>{{++$i +$id}}</td>
                    <td>{{$student->name}}</td> 
                    <td>{{$student->status?"Learning":"Stop"}}</td>
                    <td>{{$student->is_new?"Chưa có":$student->getClassCurrent($student->id)->classModel->name}}</td>                    
                    <td>
                        @if($student->is_new)
                        <button type="button" studentId="{{$student->id}}" onclick="addNewClass(this)" class="btn btn-info">Add Class</button>
                        @else 
                        <button type="button"  onclick="addNewClass(this)" studentId="{{$student->id}}" class="btn btn-primary">Update Class</button>
                        @endif
                    </td>
                    <td><a class="btn btn-warning" href="{{route('admin.score.index',['student_id'=>$student->id])}}">Score</a></td>
                    <td>
                        @if($student->is_new)
                        <button onclick="alert('Bạn phải thêm lớp cho học sinh này trước !')" class="btn btn-default">Summary</button>
                        @else
                        <a href="{{route('admin.summary.index',['student_id'=>$student->id])}}" class="btn btn-info">Summary</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $students->render() !!}
@endsection

<div id="modal-add-one" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new Class</h4>
            </div>
            <div class="modal-body">
                <form>
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <select id="priod_id_one" class="form-control">
                            @foreach($priods as $priod)
                            <option  value="{{$priod->id}}">{{$priod->name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">                        
                        <select id="select-class-one" class="form-control">              
                            @foreach($firstClassPriods as $class)
                            <option  value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach          
                        </select>
                    </div>                  
                </form>             
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-select-one" class="btn btn-primary">Select</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="modal-add-multi" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add class for multi student</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <select id="priod_id_multi" class="form-control">
                            @foreach($priods as $priod)
                            <option  value="{{$priod->id}}">{{$priod->name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">                        
                        <select id="select-class-multi" class="form-control">              
                            @foreach($firstClassPriods as $class)
                            <option  value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach          
                        </select>
                    </div>                  
                </form>             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-select-multi">Select</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('script')
@parent
<!-- Data Tables -->
<script>
    var urlChangePriod = "{{route('admin.studentlearning.changePriod')}}";
    var urlAddClass = "{{route('admin.studentlearning.addClass')}}";
    var urlAddMultiClass = "{{route('admin.studentlearning.addMultiClass')}}";
</script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/studentlearning/index.js')}}"></script>
@endsection
