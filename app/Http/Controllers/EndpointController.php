<?php

namespace App\Http\Controllers;

use App\Module\Validador\Endpoint;
use App\Module\Login\User;

/**
 * Class LoginController
 * @package App\Http\Controllers
 *
 * @author Filipe Voges
 * @version 0.1
 * @since 2020-07-30
 */
class EndpointController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function init() {
        $user = session('user');
        $dados = [
            'endpoints' => $user->endpoints()->get(),
        ];

        if(session()->has('message_success')) {
            $dados['message_success'] = session('message_success');
            session()->forget('message_success');
        }
        if(session()->has('message_error')) {
            $dados['message_error'] = session('message_error');
            session()->forget('message_error');
        }
        return view('home', $dados);
    }

    /**
     * @param array $erros
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(array $erros = []) {
        return view('endpoint.register', ['errors' => $erros]);
    }

    public function registration() {
        if(!isUrl($this->request->input('endpoint'))) {
            return $this->register(['the specified Endpoint is not a valid URL']);
        }

        try {
            $endpoint = new Endpoint();

            $user = session('user');
            $endpoint->user_id = $user->id;
            $endpoint->endpoint = $this->request->input('endpoint');

            if($endpoint->save()) {
                session(['message_success' => 'URL successfully registered']);
                return redirect('/');
            }

            return $this->register(['An error has occurred']);
        }catch (\Exception $e) {
            return $this->register([$e->getMessage()]);
        }
    }

    public function delete(int $id) {
        $endpoint = Endpoint::find($id);

        if(!$endpoint) {
            session(['message_error' => 'Endpoint not found']);
            return redirect('/');
        }

        if($endpoint->delete()) {
            session(['message_success' => 'Endpoint has been wiped out of the database']);
        }

        return redirect('/');

    }
}
