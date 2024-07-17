<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserActionController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function statistical()
    {
        //
    }

    public function clearLog($id)
    {
        $res = $this->userService->clearLog($id);

        return $res;
    }

    public function import()
    {
        //
    }

    public function export() {
        //
    }
}
