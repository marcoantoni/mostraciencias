<?php

class NoticiaController extends BaseController {

	public function __construct() {
		$noticia = new Noticia();
	
	}

	public function index(){
	
		$noticias = Noticia::Buscar();
		//$queries = DB::getQueryLog(); 
		//return end($queries);
		return View::make('noticia.index', compact('noticias'));
	}
	public function create(){
		return View::make('noticia.create');
	}
	
	public function store(){
		$noticia = new Noticia();
		$noticia->titulo = Input::get('titulo');
		$noticia->texto = Input::get('texto');
		$noticia->status = Input::get('status');
	
		$noticia->id_edicao = 1;
	
		if(Input::hasFile('arquivo')){
			$file = Input::file('arquivo'); 
			$destinationPath = '/home/marco/dev/mostraciencias/public/uploads/'; 
			$filename = $file->getClientOriginalName(); 
			$extension = Input::file('arquivo')->getClientOriginalExtension();
			$newfilename = time() . '.' . $extension;
			Input::file('arquivo')->move($destinationPath, $newfilename);	
			
			$arquivo = new Arquivo();
			$arquivo->filename = $newfilename;
			$arquivo->descricao = Input::get('alt');
			$arquivo->id_edicao = 1;
			
			$extensoes = array('gif', 'jpeg', 'jpg', 'png'); // extensoes permitidas 
			if (in_array($extension, $extensoes)) 
				$arquivo->ehImagem = 1;
			else
				$arquivo->ehImagem = 0;

			$arquivo->exibir_galeria = Input::get('exibir_galeria');
			$arquivo->save();
			$noticia->id_arquivo = DB::table('arquivos')->max('id');
		}
	
		//$noticia->id_usuario = Auth::id();
	
		$noticia->save();
		return View::make('sucesso');
	}
	
	public function show($id)
	{
		//$user = User::find($id);
		//return View::make('users.show')->with('user', $user);
	}


	public function edit($id)
	{
		$noticia = Noticia::find($id);
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
