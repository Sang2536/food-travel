<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class AccountService {
    public function fakeUserLogin()
    {
        return (object) [
            'uid' => 'UID11111111',
            'roles' => [
                'name' => 'admin',
                'permission' => [],
            ]
        ];
    }

    public function getAll(): Collection|Account
    {
        return Account::all();
    }

    public function get(string $id): Collection|Account
    {
        $account = Account::where('aid', $id)->first();
        $key = 'account' . $account->uid;

        Cache::put($key, $account, 120);

        return $account;
    }

    public function destroy(string $id)
    {
        $user = $this->get($id);

        //  remove user

        return $user;
    }

    public function getStatus(string $status = 'active', bool $isWhereNot = false): Collection
    {
        if ($isWhereNot)
            $users = Account::whereNot('status', $status)->get();
        else
            $users = Account::where('status', $status)->get();

        return $users;
    }

    public function statistical()
    {
        $accounts = $this->getAll();

        $dataRes = [
            [
                'title' => 'Number of accounts',
                'short_description' => '',
                'quantity' => $accounts->count(),
                'style' => 'bg-cyan-200',
                'icon' => '
                    <svg width="70%"  height="70%"  class="text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 21"  fill="currentColor">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                    </svg>
                ',
            ],
            [
                'title' => 'Active or Inactive',
                'short_description' => '',
                'quantity' => $this->getStatus('locked', true)->count(),
                'style' => 'bg-green-200',
                'icon' => '
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="70%"  height="70%"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-shield-check text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M11.998 2l.118 .007l.059 .008l.061 .013l.111 .034a.993 .993 0 0 1 .217 .112l.104 .082l.255 .218a11 11 0 0 0 7.189 2.537l.342 -.01a1 1 0 0 1 1.005 .717a13 13 0 0 1 -9.208 16.25a1 1 0 0 1 -.502 0a13 13 0 0 1 -9.209 -16.25a1 1 0 0 1 1.005 -.717a11 11 0 0 0 7.531 -2.527l.263 -.225l.096 -.075a.993 .993 0 0 1 .217 -.112l.112 -.034a.97 .97 0 0 1 .119 -.021l.115 -.007zm3.71 7.293a1 1 0 0 0 -1.415 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                    </svg>
                ',
            ],
            [
                'title' => 'Locked',
                'short_description' => '',
                'quantity' => $this->getStatus('locked')->count(),
                'style' => 'bg-red-200',
                'icon' => '
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="70%"  height="70%"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-lock text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 2a5 5 0 0 1 5 5v3a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3v-3a5 5 0 0 1 5 -5m0 12a2 2 0 0 0 -1.995 1.85l-.005 .15a2 2 0 1 0 2 -2m0 -10a3 3 0 0 0 -3 3v3h6v-3a3 3 0 0 0 -3 -3" />
                    </svg>
                ',
            ],
        ];

        return $dataRes;
    }

    public function createLog($id): Array
    {
        $res = [
            'success' => true,
            'msg' => 'Create logs is success',
        ];

        try {
            $account = Account::where('acc_id', $id);

            $accountLogs = $account->first()->logs;

            $logsAdd = [];
            for ($i=0; $i < 10; $i++) {
                $date = fake()->dateTime();
                $item = (object) [
                    'date' => $date->format('Y-m-d\TH:i:s.v\Z'),
                    'action' => fake()->randomElement(['login','logout','change password','update profile','purchase','order','returns','pay']),
                ];

                array_push($logsAdd, $item);
            }

            empty(! $accountLogs) ? $logs = [...$accountLogs, ...$logsAdd] : $logs = $logsAdd;

            $account->update([
                'logs' => (object) $logs,
            ]);
        } catch (\Throwable $th) {
            $error = throw $th;

            $res = [
                'success' => false,
                'msg' => 'Error: ' . $error,
            ];
        }

        return $res;
    }

    public function clearLog($id): Array
    {
        $res = [
            'success' => true,
            'msg' => 'Clear logs is success',
        ];

        try {
            $user = Account::where('acc_id', $id);

            $user->update([
                'logs' => null,
            ]);
        } catch (\Throwable $th) {
            $error = throw $th;

            $res = [
                'success' => false,
                'msg' => 'Error: ' . $error,
            ];
        }

        return $res;
    }

    public function getDatatables(Collection|Account $accounts)
    {
        return Datatables::of($accounts)
            ->addColumn(
                'checkbox',
                function () {
                    return '
                        <div class="flex items-center py-4">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    ';
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $html = '
                        <div class="items-center py-4">
                            <a href="' . route('account.show', ['account' => $row->acc_id]) . '" class="detail-user font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Detail</a>
                            <a href="#" type="button" data-url="' . route('account.destroy', ['account' => $row->acc_id]) . '" data-modal-target="destroy-account-modal" data-modal-toggle="destroy-account-modal" class="destroy-account font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
                        </div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'account',
                function ($row) {
                    $html = '
                        <div class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="' . url($row->avatar_url) . '" alt="' . $row->display_name . '">
                            <div class="ps-3">
                                <div class="text-base font-semibold">' . $row->display_name . '</div>
                                <div class="font-normal text-gray-500">' . $row->email . '</div>
                            </div>
                        </div>
                    ';

                    return $html;
                }
            )
            ->addColumn(
                'info',
                function ($row) {
                    $html = '
                        <div class="text-base font-semibold">'. $row->phone . '</div>
                        <div class="font-normal text-gray-500">'. $row->address .'</div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $statusColor = 'bg-gray-500';
                    if ($row->status == 'active')
                        $statusColor = 'bg-green-500';
                    else if ($row->status == 'locked')
                        $statusColor = 'bg-red-500';

                    $html = '
                        <div class="flex items-center py-4">
                            <div class="h-2.5 w-2.5 me-2 rounded-full '. $statusColor .'"></div>'. $row->status .'
                        </div
                    ';

                    return $html;
                }
            )
            ->rawColumns(['checkbox', 'action', 'account', 'info', 'status'])
            ->make(true);
    }
}
