<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class UserService {
    public static function create(array $data): bool
    {
        //Xử lý hàm env()

        return true;
    }

    public static function update(array $data, $id): bool
    {
        // Xử lý hàm aFunctionName()

        return true;
    }

    public static function destroy(string $id): bool
    {
        // Xử lý hàm aFunctionName()

        return true;
    }

    public static function get(?string $id = null): Collection|User
    {
        $user = User::all();

        if (! empty($id)) {
            $user = User::where('uid', $id)->first();
        }

        return $user;
    }

    public static function filter(array $data)
    {
        $user = User::all();

        return $user;
    }

    public static function getDatatables(Collection|User $users)
    {
        return Datatables::of($users)
            ->addColumn(
                'checkbox',
                function () {
                    return '
                        <div class="flex items-center px-6 py-4">
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
                        <div class="items-center px-6 py-4">
                            <a href="' . route('user.show', ['uid' => $row->uid]) . '" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Detail</a>
                            <a href="' . route('user.destroy', ['uid' => $row->uid]) . '" class="font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
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
                        <div class="items-center px-6 py-4">
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
                        <div class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
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
                        <div class="flex items-center px-6 py-4">
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

