<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function __construct(protected UserService $userService, protected FileHelper $fileHelper)
    {
        //  code
    }

    public function index(Request $request)
    {
        $users = $this->userService->getAll();

        if ($request->ajax()) {
            return $this->userService->getDatatables($users);
        }

        $userStatistical = $this->userService->statistical();

        return view('users/index')
            ->with(['userStatistical' => $userStatistical]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $userLogin = (object) [
            'uid' => 'UID11111111',
            'roles' => [
                'name' => 'admin',
                'permission' => [],
            ]
        ];

        $user = $this->userService->get($id);

        return view(
            'users/show',
            [
                'user' => $user,
                'userLogin' => $userLogin,
            ]
        );
    }

    public function edit(string $id)
    {
        return view('users/edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pathPhoto = null;
        if (! empty($request->hasFile('avatar'))) {
            $pathPhoto = $this->fileHelper->setImgStorage($request->file('avatar'));
        }

        try {
            $user = $this->userService->get($id);

            $user->update([
                'name' => $request->name,
                'avatar' => $pathPhoto,
            ]);
        } catch (\Throwable $th) {
            $error = throw $th;

            return redirect('error')->with(compact('error'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid)
    {
        $user = $this->userService->destroy($uid);

        $response = [
            'success' => false
        ];

        if($user) {
            $response = [
                'success' => true,
                'data' => [
                    'uid' => $uid,
                    'time' => Carbon::now()
                ],
            ];
        }

        return $response;
    }
}
