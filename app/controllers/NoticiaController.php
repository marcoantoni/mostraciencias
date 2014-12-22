<?php

class NoticiaController extends BaseController {

	protected $noticia;

	public function __construct() {
		$this->noticia = new Noticia();
	}

	public function index(){	
		$noticias = Noticia::Buscar();
		return View::make('noticia.index', compact('noticias'));
	}

	public function create(){
		return View::make('noticia.create');
	}
	
	public function store(){
		$input = Input::all();

		//$this->noticia->fill($input);

		$this->noticia->titulo = Input::get('titulo');
		$this->noticia->texto = Input::get('texto');
		$this->noticia->status = Input::get('status');
	
		$this->noticia->id_edicao = 1;

		if(!$this->noticia->isValid()){
			return Redirect::back()->withInput()->withErrors($this->noticia->errors);
		}
	
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
			$this->noticia->id_arquivo = DB::table('arquivos')->max('id');
		}
	
		//$noticia->id_usuario = Auth::id();
	
		$this->noticia->save();
		return View::make('sucesso');
	}
	
	public function show($id)
	{
		$noticia = Noticia::find($id);
		return View::make('noticia.show', compact('noticia'));
	}


	public function edit($id)
	{
		$noticia = Noticia::find($id);
		return View::make('noticia.edit', compact('noticia'));
	}

	public function update($id)
	{
	
		$this->noticia = Noticia::find($id);
		$this->noticia->titulo = Input::get('titulo');
		$this->noticia->texto = Input::get('texto');
		$this->noticia->status = Input::get('status');;
	
		$this->noticia->id_edicao = 1;
	
		if(!$this->noticia->isValid()){
			return Redirect::back()->withInput()->withErrors($this->noticia->errors);
		}

		//$noticia->id_usuario = Auth::id();
	
		$this->noticia->save();
		
		return Redirect::route('noticias.index');
	}


	public function destroy($id)
	{
		$noticia = Noticia::find($id);
        $noticia->delete();

		return Redirect::route('noticias.index');
	}

}
