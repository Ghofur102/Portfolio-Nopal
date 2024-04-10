<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100%;
            background: rgb(234, 234, 234);
            padding: 0;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .lc-block {
            background: #fff;
            border-radius: 2px;
            position: relative;
            padding: 45px 30px 30px;
        }

        .lc-block.toggled {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            z-index: 10;
        }

        .lc-block .form-control {
            text-align: center;
        }



        .lcb-lockscreen {
            position: relative;
        }

        .lcb-lockscreen .form-control {
            padding-right: 35px;
        }

        .lcb-lockscreen .lcbl-btn {
            background-color: #2196F3;
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            color: #fff;
            font-size: 15px;
            height: 27px;
            margin: 4px;
            line-height: 26px;
            border-radius: 2px;
        }

        .login-navigation {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            width: 100%;
            left: 0;
            bottom: -45px;
        }

        .login-navigation>li {
            display: inline-block;
            margin: 0 2px;
            -webkit-transition: all;
            -o-transition: all;
            transition: all;
            -webkit-transition-duration: 150ms;
            transition-duration: 150ms;
            cursor: pointer;
            vertical-align: top;
            color: #fff;
            line-height: 16px;
            min-width: 16px;
            min-height: 16px;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        #footer,
        #footer .f-menu>li>a {
            color: #a2a2a2;
        }

        .login-navigation>li>span {
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .login-navigation>li:not(:hover) {
            font-size: 0;
            border-radius: 100%
        }

        .login-navigation>li:hover {
            border-radius: 10px;
            padding: 0 5px;
            font-size: 8px;
        }

        .login-navigation>li:hover>span {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .zmdi {
            display: inline-block;
            font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .cr-alt label {
            position: relative;
            padding-left: 28px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .c-gray {
            color: #9e9e9e !important;
        }

        .form-control {
            -webkit-transition: all;
            -o-transition: all;
            transition: all;
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
            resize: none;
            box-shadow: 0 0 0 40px transparent !important;
            border-radius: 0;
        }

        .form-control {
            width: 100%;
            height: 35px;
            padding: 6px 12px;
            background-color: #fff;
            border: 1px solid #e8e8e8;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }

        .form-control,
        output {
            font-size: 13px;
            line-height: 1.42857143;
            color: #9e9e9e;
            display: block;
        }

        .lc-block {
            box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
        }

        .lc-block,
        .login-content:after {
            vertical-align: middle;
            display: inline-block;
        }

        .btn:not(.btn-alt) {
            border: 0;
        }

        .btn-primary.active,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #757DE8;
            border-color: #757DE8;
        }

        .btn-primary {
            color: #fff;
            background-color: #3F51B5;
            border-color: #3F51B5;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="d-flex justify-content-center">
        <div class="lc-block col-md-4 col-md-offset-4" >
            @if (session('error'))
                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('update.project', $project->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="title_project"
                        class="form-control @error('title_project') is-invalid @enderror" placeholder="Title Project"
                        value="{{ $project->title_project }}">
                    @error('title_project')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="description_jobdesck" id="" rows="3"
                        class="form-control @error('description_jobdesck')
                   is-invalid
                   @enderror">{{ $project->description_jobdesck }}</textarea>
                    @error('description_jobdesck')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <img class="mb-2" src="{{ asset('storage/'.$project->photo_project) }}" alt="" width="100%" height="100%">
                    <input type="file" name="photo_project" id=""
                        class="form-control @error('photo_project')
                    is-invalid
                    @enderror">
                    @error('photo_project')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    <button type="submit" href=""
                        class="btn btn-block btn-primary btn-float m-t-25">Update</button>
                </div>
            </form>
            <a href="/dashboard?active=project" class="" style="color:#757DE8;"> <b>Back</b> </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
