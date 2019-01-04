<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap 4-->
    <link href="{{URL::to('bst/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>

@yield('content')

<!-- jquery and bootstrap js -->
<script src="{{URL::to('bst/js/jQuery.js')}}"></script>
<script src="{{URL::to('bst/js/bootstrap.js')}}"></script>
<script src="{{URL::to('bst/js/jQuery.print.js')}}"></script>
<script>
    $(function () {
        $("#btnPrint").on('click', function () {
            $("#forPrint").print({
                globalStyles: true,
                mediaPrint: false,
                stylesheet: null,
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: null,
                doctype: '<!doctype html>'
            });
        });
    })
</script>
</body>
</html>