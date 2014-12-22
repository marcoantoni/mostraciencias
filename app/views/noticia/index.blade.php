@extends('layout')

@section('titulo')
	Noticias
@stop

@section('conteudo')
	<div class="row">
		@if($noticias->count())
			@foreach ($noticias as $noticia)
				@if ($noticia->status == 1)
					<section class="col-md-4">
						<h2>{{ $noticia->titulo }}</h2>
						@if ($noticia->ehImagem == 1)
							{{ HTML::image('uploads/$noticia->filename', 'a picture', array('class' => 'thumb')) }}
							<img src="/uploads/{{ $noticia->filename }}" class="img-responsive" alt="{{ $noticia->descricao }}" style="width: 140px; height: 140px; float: left; padding: 5px;">
						@endif
						{{ $noticia->texto }}
						<table>
							<tr>
								<td><a href="/noticias/{{ $noticia->id }}/edit" class="btn btn-warning">Editar</a></td> 
								<td>
									{{ Form::open(['route' => ['noticias.destroy', $noticia->id], 'method' => 'delete']) }}
										<input type="submit" class="btn btn-danger" value="Deletar">
									{{ Form::close()}}
								</td>
							</tr>
						</table>
					</section>
				@endif
			@endforeach
		@else
			<h2>Nenhuma noticia.</h2>
		@endif 
	</div>
@stop

