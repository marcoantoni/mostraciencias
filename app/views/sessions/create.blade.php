@extends('layout')

	@section('titulo')
		Login
	@stop
	
	@section('conteudo')
		{{ Form::open(['method' => 'post', 'route' => 'login.store']) }}
		<div>
			{{ Form::label('email', 'E-mail: ') }}
			{{ Form::email('email') }}
		</div>
		<div>
			{{ Form::label('senha', 'Senha: ') }}
			{{ Form::password('senha') }}
		</div>
		<div>
			{{ Form::submit('Logar') }}
		</div>
		{{ Form::close() }}
	@stop
	
