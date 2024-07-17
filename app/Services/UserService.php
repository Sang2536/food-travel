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

    public static function search()
    {
        //  code
    }

    public static function filter()
    {
        //  code
    }

    public function clearLog($id)
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

