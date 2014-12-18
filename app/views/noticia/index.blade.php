@extends('layout')

	@section('titulo')
		Noticias
	@stop
	
	@section('conteudo')
		<div class="row">
			@if($noticias->count())
				@foreach ($noticias as $noticia)
					<section class="col-md-4">
						<h2>{{ $noticia->titulo }}</h2>
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
				@endforeach
			@else
				<h2>Nenhuma noticia.</h2>
			@endif 
		</div>
	@stop
	
