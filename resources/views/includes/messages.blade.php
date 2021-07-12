@if($errors->any())
<!-- errors - объект с ошибками присутствует по умолчанию в каждом шаблоне-->

	<div class="alert alert-danger">
	
	<ul>
	@foreach($errors->all() as $error) 
	<!-- итерация  объекта errors с получение всех ошибок "функция all" с записью их в  переменную error-->
	<li>{{$error}}</li>
<!-- в переменной error получаем стандартный текст ошибки который задан по умолчанию "его можно менять" и выводим его ненумерованным списком если ошибок несколько -->
	@endforeach
	</ul>
	</div>

	@endif

	@if(session('success'))
	<!-- если ошибок нет выводим значение сессии-->
	<div class="alert alert-success">
	{{session('success')}}
	</div>
	@endif