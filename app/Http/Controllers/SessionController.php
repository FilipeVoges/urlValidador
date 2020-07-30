<?php

namespace App\Http\Controllers;

/**
 * \SessionController
 *
 * @author Filipe Voges <filipe@emsventura.com.br>
 * @since 2020-07-28
 * @version Dispositivo Médico V0.1
 */
class SessionController extends Controller
{
    public function check(string $key) : bool {
        return $this->request->session()->has($key);
    }
}
