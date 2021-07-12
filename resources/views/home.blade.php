@extends('layouts.app')
<!-- наследование файла app.blade.php из layouts для добавления нужного контента в различные директивы-->

@section('title-block')

Home
@endsection

@section('content')<!-- добавление контента в директиву yield content из app.blade.php - название директивы-->
	<h1>Home page</h1>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ipsa cum tempore corrupti, veniam non explicabo necessitatibus omnis distinctio minima velit, unde quod nobis dolores placeat. Quisquam debitis deserunt aspernatur!
	</p>
	@endsection

	@section('aside')
	@parent
	<!-- parent подключение всего содержимого боковой панели aside.blade.php -->
	<p>add text</p>
	<!-- добавление текста в боковую панель на главной странице -->
	@endsection