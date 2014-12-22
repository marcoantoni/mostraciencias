<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Noticia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'noticias';
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
}
