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
 * @since 2020-07-30
 */
class EndpointController extends Controller
{
    public function init() {
        $user = session('user');

        dd($user->endpoints);
    }
}
