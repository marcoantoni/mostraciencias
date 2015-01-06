<?php

class SessionController extends \BaseController {

	public function index() {
		return View::make('sessions.create');
	}


	public function create() {
		return View::make('sessions.create');
	}


	public function store()
	{
		 // Opção de lembrar do usuário
        $remember = false;
        if(Input::get('remember')) {
            $remember = true;
        }
        
        // Autenticação
        if (Auth::attempt(array(
            'email' => Input::get('email'), 
            'password' => Input::get('senha')
            ), $remember)) {
            return Redirect::to('noticia');
        } else {
        	Session::flash('msg', 'Usuário ou Senha Incorretos');
        	return Redirect::back();
        }

	}

	public function destroy() {
		Auth::logout();
		return Redirect::intended('/')->withErrors("Usuário deslogado!");
	}

}
