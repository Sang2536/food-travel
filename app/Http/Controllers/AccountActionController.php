<?php

namespace App\Http\Controllers;

use App\Services\AccountService;

class AccountActionController extends Controller
{
    public function __construct(protected AccountService $accountService)
    {
        //
    }

    public function createLog($id)
    {
        $res = $this->accountService->createLog($id);

        return $res;
    }

    public function clearLog($id)
    {
        $res = $this->accountService->clearLog($id);

        return $res;
    }

    public function settings($id)
    {
        $res = $this->accountService->settings($id);

        return $res;
    }
}
