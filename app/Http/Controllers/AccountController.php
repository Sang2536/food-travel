<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AccountController extends Controller
{
    public function __construct(protected AccountService $accountService, protected FileHelper $fileHelper)
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
        $account = $this->accountService->get($id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pathPhoto = null;
        if (! empty($request->hasFile('avatar'))) {
            $pathPhoto = $this->fileHelper->setImgStorage($request->file('avatar'), 'accounts');
        }

        try {
            $account = $this->accountService->get($id);

            if ($pathPhoto) {
                $pathPhoto = $pathPhoto;
                $this->fileHelper->deleteFileFromStorage($account->avatar);
            } else {
                $pathPhoto = $account->avatar_url;
            }

            $data = [
                'display_name' => $request->display_name,
                'avatar' => $pathPhoto,
                'address' => $request->address,
                'phone' => $request->phone,
                'descr' => $request->short_descr,
            ];

            $resUpdate = $this->accountService->update($account, $data);
        } catch (\Throwable $th) {
            $error = throw $th;

            return redirect('templates/error', ['error' => $error]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = $this->accountService->destroy($id);

        $response = [
            'success' => false,
            'msg' => 'Destroy failed. Please try again.',
        ];

        if($account) {
            $response = [
                'success' => true,
                'msg' => 'Destroy success.',
                'data' => [
                    'id' => $id,
                    'time' => Carbon::now()
                ],
            ];
        }

        return $response;
    }
}
