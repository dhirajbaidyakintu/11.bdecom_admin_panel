<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables-select.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">



@include('masterLayout.navMenu')
@yield('content')



</div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/custom.min-2.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/datatables-select.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{asset('js/PhotoGallery/photoGallery.js')}}"></script>
<script src="{{asset('js/SiteInfoJs/siteInfo.js')}}"></script>
<script src="{{asset('js/AdminProfileJs/adminProfile.js')}}"></script>
<script src="{{asset('js/SliderJs/slider.js')}}"></script>
<script src="{{asset('js/ProductJs/product.js')}}"></script>
@yield('script')
</body>
</html>
