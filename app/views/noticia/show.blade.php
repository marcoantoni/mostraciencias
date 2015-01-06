@extends('layout')

	@section('titulo')
		Noticia - {{ $noticia->titulo }} - Mostra de ciências
	@stop
	
	@section('conteudo')
		@if ($noticia->status == 1)
			<h1>{{ $noticia->titulo }}</h1>
			@if ($noticia->ehImagem == 1)
				<img src="http://127.0.0.1:8000/uploads/{{ $noticia->filename }}" class="img-responsive" alt="{{ $noticia->descricao }}" style="width: 140px; height: 140px; float: left; padding: 5px;">
			@endif
		@endif

	@stop
	
