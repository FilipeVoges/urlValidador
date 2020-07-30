<?php

namespace App\Http\Controllers;

use App\Module\Validador\Endpoint;
use Illuminate\Support\Facades\Validator;
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
     * @param string|null $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function init(string $message = null) {
        $user = session('user');

        $dados = [
            'endpoints' => $user->endpoints,
            'message' => $message
        ];

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
            $endpoint->user = $user;
            $endpoint->endpoint = $this->request->input('endpoint');

            if($endpoint->save()) {
                return $this->init('URL successfully registered');
            }

            return $this->register(['An error has occurred']);
        }catch (\Exception $e) {
            return $this->register([$e->getMessage()]);
        }
    }
}
