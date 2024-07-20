<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AccountController extends Controller
{
    public function __construct(protected AccountService $accountService)
    {
        //  code
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $accounts = $this->accountService->getAll();

        if ($request->ajax()) {
            return $this->accountService->getDatatables($accounts);
        }

        $accountStatistical = $this->accountService->statistical();

        return view('accounts/index', ['accountStatistical' => $accountStatistical]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::where('acc_id', $id)->first();

        $userLogin = $this->accountService->fakeUserLogin();

        return view(
            'accounts/show',
            [
                'account' => $account,
                'userLogin' => $userLogin,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('accounts/edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = $this->accountService->destroy($id);

        $response = [
            'success' => false
        ];

        if($account) {
            $response = [
                'success' => true,
                'data' => [
                    'id' => $id,
                    'time' => Carbon::now()
                ],
            ];
        }

        return $response;
    }
}
