<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/semantic.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}">

    <style type="text/css">
        html, body{
            min-height: 100%;
        }
        body {
            background: url({{ asset('img/bg.jpg') }}) center center no-repeat transparent;
            background-size: cover;
            background-position: top center;
            position: relative;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
            z-index: 2;
        }
        .overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: rgba(0,0,0,0.1); /*dim the background*/
        }
        .ui.header .content{
            text-shadow: 0px 0px 6px #fff;
        }
    </style>
<script>
    $(document)
    .ready(function() {
        $('.ui.form')
        .form({
            fields: {
                email: {
                    identifier  : 'email',
                    rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please enter your e-mail'
                    },
                    {
                        type   : 'email',
                        prompt : 'Please enter a valid e-mail'
                    }
                    ]
                },
                password: {
                    identifier  : 'password',
                    rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please enter your password'
                    },
                    {
                        type   : 'length[6]',
                        prompt : 'Your password must be at least 6 characters'
                    }
                    ]
                }
            }
        })
        ;
    })
    ;
</script>
</head>
<body>
    <div class="overlay"></div>
    @yield('content')

    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('plugins/jQuery/jquery.form.min.js') }}"></script>
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('semantic/semantic.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function($) {
            $('.message .close')
              .on('click', function() {
                $(this)
                  .closest('.message')
                  .transition('fade')
                ;
              })
            ;
        });
    </script>
</body>
</html>
