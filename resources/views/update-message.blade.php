@extends('layouts.app')

@section('title-block')
Update
@endsection

@section('content')
	<h1>Update text</h1>

	
<!-- первый параметр - URL обработчик, второй динамическое id из маршрута -->
<form action="{{route('contact-update-submit', $data->id )}}" method = "post">

@csrf

<div class ="form-group">
<label for="name"></label>
<input type = "text" name = "name" value = {{$data->name}}  placeholder="Введите имя" id = "name" class = "form-control">
</div>

<div class ="form-group">
<label for="name"></label>
<input type = "text" name = "email" value = {{$data->email}} placeholder="Введите email" id = "email" class = "form-control">
</div>

<div class ="form-group">
<label for="message"></label>
<textarea name="message" id="message"  placeholder="Текст сообщения" class = "form-control" >{{$data->message}}</textarea>
</div>
<button type="submit" class="btn btn-success">Update</button>

</form>

	@endsection
