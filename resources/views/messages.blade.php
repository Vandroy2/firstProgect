@extends('layouts.app')
<!-- наследование файла app.blade.php из layouts для добавления нужного контента в различные директивы-->

@section('title-block')
<!-- добавление контента в директиву yield title-block - название директивы-->
All messages
@endsection



@section('content')
	<h1>All messages</h1>
	@foreach($data as $element)
	<!-- итерируем данные из БД записанные в параметр  $data функцией 
	 public function allData из файла ContactController.php-->
<div class = "alert alert-info">
<h3>{{$element->name}}</h3>
<!-- Обращаемся к переменной и выводим нужное поле name из БД в HTML -->
<p>{{$element->email}}</p>
<!-- Обращаемся к переменной и выводим нужное поле email из БД в HTML -->
<!-- <p>{{$element->message}}</p> -->
<p><small>{{$element->created_at}}</small></p>
<a href="{{route('contact-data-one', $element->id)}}"> 
<!-- в ссылке первый параметр - это URL обработчик который мы вызываем.Второй параметр - это динамический id из переменной $element"поле id из БД " -->
<button class="btn btn-warning">More...</button></a>
</div>
	@endforeach
	@endsection