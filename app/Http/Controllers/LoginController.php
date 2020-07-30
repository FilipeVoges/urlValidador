<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Module\Login\User;

/**
 * Class LoginController
 * @package App\Http\Controllers
 *
 * @author Filipe Voges
 * @version 0.1
 * @since 2020-07-29
 */
class LoginController extends Controller
{
    /**
     * @access public
     * @param array $erros
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(array $erros = []) {
        return view('user.login', ['errors' => $erros]);
    }

    /**
     * @access public
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function autenticar() {
        $validator = Validator::make($this->request->post(), [
            'login' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $errors = $validator->messages()->all();

        if(!empty($errors)) {
            return $this->login($errors);
        }
        // Há maneiras melhores de fazer isso
        $user = User::where('email', $this->request->input('login'))->first();

        if(!$user) {
            return $this->login(['User not found']);
        }
        // Usar JWT para senha seria uma melhor Opção mesmo
        if($user->password != md5($this->request->input('password'))) {
            return $this->login(['Wrong password']);
        }

        session(['user' => $user->toArray()]);

        return redirect('');
    }

    public function logout() {
        session()->forget('user');
        return redirect('');
    }
}
