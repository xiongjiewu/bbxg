<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Service\GoodService;
use App\Service\BuyService;
use Illuminate\Http\Request;
use App\Service\ClassificationService;

class AdminController extends BaseController
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginAction()
    {

    }

    public function home()
    {

    }
}

