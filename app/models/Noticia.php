<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Noticia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'noticias';
<<<<<<< HEAD
	public $errors;
    public $rules = [
			'titulo' => 'required',
			'texto'	 => 'required'
		];

	public function scopeBuscar($query) {
        return $query
        ->Leftjoin('arquivos', 'arquivos.id', '=' , 'noticias.id_arquivo')
        ->select('noticias.id', 'noticias.titulo', 'noticias.texto', 'noticias.status', 'arquivos.filename', 'arquivos.descricao', 'arquivos.ehImagem')
        ->get();
    }

	public function isValid(){

		$validation = Validator::make($this->attributes, $this->rules);

		if($validation->passes()) 
			return true;

		$this->errors = $validation->messages();
		
		return false;
	}
=======
	
	public function scopeBuscar($query)
        {
            return $query
            ->Leftjoin('arquivos', 'arquivos.id', '=' , 'noticias.id_arquivo')
            ->select('noticias.id', 'noticias.titulo', 'noticias.texto', 'noticias.status', 'arquivos.filename', 'arquivos.descricao', 'arquivos.ehImagem')
            ->get();
        }
	
>>>>>>> f0561a0693fb8b111417b3d254148301fe403155
}
