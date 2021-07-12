@extends('layouts.app')

@section('title-block')
Contact
@endsection

@section('content')
	<h1>Contact</h1>

	

<form action="{{route('contact-form')}}" method = "post">

@csrf 
<!-- защищенный ключ для безопасности обязателен для указания -->

<!-- =============================================================== -->

<!-- Добавляем скрытый идентификатор пользователя -->

<div class ="form-group">
<label for="user"></label>
<input type = "hidden" name = "user_id" id = "1" class = "form-control">
</div>

<!-- =============================================================== -->


<div class ="form-group">
<label for="name"></label>
<input type = "text" name = "name" placeholder="Введите имя" id = "name" class = "form-control">
</div>

<div class ="form-group">
<label for="name"></label>
<input type = "text" name = "email" placeholder="Введите email" id = "email" class = "form-control">
</div>

<!-- <div class ="form-group">
<label for="name"></label>
<input type = "text" name = "short_content" placeholder="Краткое содержание" id = "short_content" class = "form-control">
</div>   -->



<div class ="form-group">
<label for="message"></label>
<textarea name="message" id="message" placeholder="Текст сообщения" class = "form-control" ></textarea>
</div>
<button type="submit" class="btn btn-success">Отправить</button>

</form>

	@endsection
