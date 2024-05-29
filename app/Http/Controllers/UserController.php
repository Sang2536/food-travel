<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view(
            'users/index',
            ['users' => $users]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/create');
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
    public function show(string $uid)
    {
        $userLogin = (object) [
            'uid' => 'UID11111111',
            'roles' => [
                'name' => 'admin',
                'permission' => [],
            ]
        ];
        $user = User::where('uid', $uid)->first();

        return view(
            'users/show',
            [
                'user' => $user,
                'userLogin' => $userLogin,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uid)
    {
        return view('users/edit');
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
    public function destroy(string $uid)
    {
        //
    }
}
