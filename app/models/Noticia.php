<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Noticia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'noticias';
	
	public function scopeBuscar($query)
        {
            return $query
            ->Leftjoin('arquivos', 'arquivos.id', '=' , 'noticias.id_arquivo')
            ->select('noticias.id', 'noticias.titulo', 'noticias.texto', 'noticias.status', 'arquivos.filename', 'arquivos.descricao', 'arquivos.ehImagem')
            ->get();
        }
	
}
