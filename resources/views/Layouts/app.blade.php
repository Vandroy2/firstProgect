<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title-block')</title>
	<!-- yield - указание директории для вставки содержимого в подключаемых файлах "на разных страницах содержимое может быть разным" -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
	<!-- <link rel="stylesheet" href="css/app.css">  -->
	<link rel="stylesheet" href="css/app.css?<?php echo filemtime('css/app.css') ?>"/>
	

</head>
<body>
@include('includes.header')
<!-- подключение header.blade.php из папки includes -->

@if(Request::is('/'))
@include('includes.hero')
<!-- подключение hero.blade.php из папки includes с условием "запрос на главную страниицу" -->
@endif



<div class = "container mt-5">

@include('includes.messages')
<!-- подключение файла вывода сообщений -->

<div class = "row">
<div class = "col-8">@yield('content')</div>
<!-- yield - указание директории для вставки содержимого в подключаемых файлах "на разных страницах содержимое может быть разным" -->
<div class = "col-4">@include('includes.aside')</div>
<!-- подключение боковой панели  aside.blade.php из папки includes  -->
</div>
</div>
@include('includes.footer')
<!-- подключение footer.blade.php из папки includes -->
</body>
</html>

