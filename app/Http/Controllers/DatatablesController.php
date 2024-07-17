<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class DatatablesController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getDatatablesAccount()
    {
        //
    }

    public function getDatatablesContact()
    {
        //
    }

    public function getDatatablesProduct()
    {
        //
    }

    public function getDatatablesTransaction()
    {
        //
    }

    public function getDatatablesUser()
    {
        $users = $this->userService->get();

        return $this->userService->getDatatables($users);
    }
}
