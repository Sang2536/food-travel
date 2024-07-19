<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class AccountService {
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
                            <a href="#" type="button" data-url="' . route('account.destroy', ['account' => $row->acc_id]) . '" data-modal-target="destroy-user-modal" data-modal-toggle="destroy-user-modal" class="destroy-user font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
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