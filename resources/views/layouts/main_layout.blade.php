<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{trans('admin/common.title')}}</title>
        @section('css')
        @include('layouts.partials.css')
        @show
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.partials.nav_left')
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    @include('layouts.partials.nav_top')                    
                </div>
                @section('top')
                @show
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content">
                            @yield('content')
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="modal-delete" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Warning</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure delete this record ? !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-delete-ok" class="btn btn-primary">OK</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @section('script')
        @include('layouts.partials.script')        
        @show        
    </body>
</html>