<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserActionController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        //
    }

    public function statistical()
    {
        //
    }

    public function createLog($id)
    {
        $res = $this->userService->createLog($id);

        return $res;
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
