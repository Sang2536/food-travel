<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Http\Request;

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

        return view('accounts/index', ['accounts' => $accounts]);
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

        return view(
            'accounts/show',
            ['account' => $account]
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
        //
    }
}
