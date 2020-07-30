<?php

namespace App\Http\Controllers;

use App\Jobs\RoboDaInterwebs;
/**
* Class LoginController
* @package App\Http\Controllers
*
* @author Filipe Voges
* @version 0.1
* @since 2020-07-30
*/
class QueueController extends Controller
{
    public function run() {
        dispatch(new RoboDaInterwebs);
    }
}
