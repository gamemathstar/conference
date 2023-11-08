<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Accounting ABUZ</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">

    <!-- main css for template -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>

<!-- ===============>> Preloader start here <<================= -->
<div class="preloader">
    <img src="/assets/images/logo/preloader.gif" alt="Uevent">
</div>
<!-- ===============>> Preloader end here <<================= -->
@include('commons.master.header')

@yield("content")
@include('commons.master.footer')
<!-- vendor plugins -->
<script src="{{asset("assets/js/jquery-3.6.0.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/js/all.min.js")}}"></script>
<script src="{{asset("assets/js/swiper-bundle.min.js")}}"></script>
<script src="{{asset("assets/js/aos.js")}}"></script>
<script src="{{asset("assets/js/countdown.min.js")}}"></script>
<script src="{{asset("assets/js/lightcase.js")}}"></script>
<script src="{{asset("assets/js/purecounter_vanilla.js")}}"></script>
<script src="{{asset("assets/js/custom.js")}}"></script>

<style>
    .list-bg-none li{
        height: 48px;
        font-size: 12px;
    }

    .list-bg-none li a{
        height: 48px;
        font-size: 12px;
    }
</style>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
