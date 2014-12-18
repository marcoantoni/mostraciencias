<?php

class NoticiaController extends BaseController {

	public function __construct() {
		$noticia = new Noticia();
	}

	public function index(){
		$noticias = Noticia::get();
		return View::make('noticia.index', compact('noticias'));
	}
	public function create(){
		return View::make('noticia.create');
	}
	
	public function store(){
		$noticia = new Noticia();
		$noticia->titulo = Input::get('titulo');
		$noticia->texto = Input::get('texto');
		$noticia->status = Input::get('status');;
	
		$noticia->id_edicao = 1;
	
		//$noticia->id_usuario = Auth::id();
	
		$noticia->save();
		//return Redirect::route('noticia.index');
	}
	
	public function show($id)
	{
		//$user = User::find($id);
		//return View::make('users.show')->with('user', $user);
	}


	public function edit($id)
	{
		$noticia = Noticia::find($id);
		//return View::make('noticia.edit')->with('noticias', $noticia);
		return View::make('noticia.edit', compact('noticia'));
	}

	public function update($id)
	{
		$noticia = new Noticia();
		$noticia = Noticia::find($id);
		$noticia->titulo = Input::get('titulo');
		$noticia->texto = Input::get('texto');
		$noticia->status = Input::get('status');;
	
		$noticia->id_edicao = 1;
	
		//$noticia->id_usuario = Auth::id();
	
		$noticia->save();
		
		return Redirect::route('noticias.index');
	}


	public function destroy($id)
	{
		$noticia = Noticia::find($id);
        $noticia->delete();

		return Redirect::route('noticias.index');
	}

}
