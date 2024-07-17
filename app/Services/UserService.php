<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class UserService {
    public static function get(string $id): Collection|User
    {
        $user = User::where('uid', $id)->first();
        $key = 'user' . $user->uid;

        Cache::put($key, $user, 120);

        return $user;
    }

    public static function getAll(): Collection|User
    {
        return User::all();
    }

    public function getCacheUser($key)
    {
        if (! Cache::has($key)) {
            return 0;
        }

        return Cache::get($key);
    }

    public static function create(array $data)
    {
        //  code test
    }

    public static function update(array $data, $id)
    {
        //  code
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
            $users = User::whereNot('status', $status)->get();
        else
            $users = User::where('status', $status)->get();

        return $users;
    }

    public static function search()
    {
        //  code
    }

    public static function filter()
    {
        //  code
    }

    public function statistical()
    {
        $users = $this->getAll();

        $dataRes = [
            [
                'title' => 'Number of users',
                'short_description' => '',
                'quantity' => $users->count(),
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
                'title' => 'Active',
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
            $user = User::where('uid', $id);

            $userLogs = $user->first()->logs;

            $logsAdd = [];
            for ($i=0; $i < 10; $i++) {
                $date = fake()->dateTime();
                $item = (object) [
                    'date' => $date->format('Y-m-d\TH:i:s.v\Z'),
                    'action' => fake()->randomElement(['login','logout','change password','insert','update','destroy']),
                    'model' => fake()->randomElement(['','contacts','products','transactions','users']),
                ];

                array_push($logsAdd, $item);
            }

            empty(! $userLogs) ? $logs = [...$userLogs, ...$logsAdd] : $logs = $logsAdd;

            $user->update([
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
            $user = User::where('uid', $id);

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

    public static function getDatatables(Collection|User $users)
    {
        return Datatables::of($users)
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
                            <a href="' . route('user.show', ['uid' => $row->uid]) . '" class="detail-user font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Detail</a>
                            <a href="#" type="button" data-url="' . route('user.destroy', ['uid' => $row->uid]) . '" data-modal-target="destroy-user-modal" data-modal-toggle="destroy-user-modal" class="destroy-user font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
                        </div>
                    ';

                    return $html;
                }
            )
            ->addColumn(
                'position',
                function ($row) {
                    $color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';

                    if ($row->roles['name'] == 'admin')
                        $color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                    else if ($row->roles['name'] == 'tester')
                        $color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';

                    $html = '
                        <div class="items-center py-4">
                            <span class="ml-2 h-1/2 text-xs font-medium me-2 px-2.5 py-0.5 rounded ' . $color . '">' . $row->roles['name'] . '</span>
                        </div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'name',
                function ($row) {
                    $html = '
                        <div class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="' . url($row->avatar_url) . '" alt="' . $row->name . '">
                            <div class="ps-3">
                                <div class="text-base font-semibold">' . $row->name . '</div>
                                <div class="font-normal text-gray-500">' . $row->email . '</div>
                            </div>
                        </div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $statusColor = 'bg-gray-500';
                    $statusText = 'Offline';
                    if ($row->status == 'online') {
                        $statusColor = 'bg-green-500';
                        $statusText = 'Online';
                    }
                    else if ($row->status == 'locked') {
                        $statusColor = 'bg-red-500';
                        $statusText = 'Locked';
                    }

                    $html = '
                        <div class="flex items-center py-4">
                            <div class="h-2.5 w-2.5 rounded-full me-2 ' . $statusColor . '"></div>' . $statusText . '
                        </div'
                    ;

                    return $html;
                }
            )
            ->rawColumns(['checkbox', 'action', 'position', 'name', 'status'])
            ->make(true);
    }
}

