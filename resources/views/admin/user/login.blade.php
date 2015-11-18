<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{trans('admin/user_login.title')}}</title>

        <link href="{{asset('backend/theme/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/theme/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

        <link href="{{asset('backend/theme/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('backend/theme/css/style.css')}}" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div>
                    <h1 class="logo-name">{{trans('admin/user_login.logo')}}</h1>
                </div>
                <h3>{{trans('admin/user_login.title')}}</h3>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(array('url' => 'admin/login','method'=>'post','class'=>'m-t','role'=>'form')) !!}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                {!! Form::close() !!}
                <p class="m-t"> <small>{{trans('admin/user_login.copyright')}}</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="{{asset('backend/theme/js/jquery-2.1.1.js')}}"></script>
        <script src="{{asset('backend/theme/js/bootstrap.min.js')}}"></script>

    </body>

</html>