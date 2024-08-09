<?php

namespace App\Services;

use App\Models\Brand;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class BrandService {
    public function __construct(protected UserService $userService)
    {
        //  code
    }

    public function get(string $id = null): Collection|Brand
    {
        $brands = Brand::all();
        if ($id) $brands = Brand::where('bid', $id)->first();

        return $brands;
    }

    public function create(): bool
    {
        return true;
    }

    public function update(): bool
    {
        return true;
    }

    public function getDatatables(Collection|Brand $brands)
    {
        return Datatables::of($brands)
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
                            <button type="button" data-url="' . route('brand.show', $row->bid) . '" class="detail_brand font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline" data-modal-target="brand-modal" data-modal-toggle="brand-modal" data-drawer-target="brand-modal" data-drawer-show="brand-modal" aria-controls="brand-modal">Detail</button>
                            <a href="#" type="button" data-url="' . route('brand.edit', $row->bid) . '" data-modal-target="edit_brand-modal" data-modal-toggle="edit-brand-modal" class="edit_brand font-medium px-2 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#" type="button" data-url="' . route('brand.destroy', $row->bid) . '" data-modal-target="destroy_brand-modal" data-modal-toggle="destroy-brand-modal" class="destroy_brand font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
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
                            <img class="w-10 h-10 rounded-full" src="" alt="' . $row->name . '">
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
                'contact',
                function ($row) {
                    $html = '
                        <div class="text-base font-semibold">'. $row->phone . '</div>
                        <div class="font-normal text-gray-500">'. $row->address .'</div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'created_by',
                function ($row) {
                    $html = '';
                    $cateId = $row->created_by['uid'];

                    if ($cateId) {
                        $user = $this->userService->get($cateId);

                        $html = '
                            <div class="items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full bg-gradient-to-r from-gray-200 to-gray-300" src="#" alt="' . $user->name . '">
                                <p>'. $user->name .'</p>
                            </div>
                        ';
                    }

                    return $html;
                }
            )
            ->rawColumns(['checkbox', 'action', 'name', 'contact', 'created_by'])
            ->make(true);
    }

    public function destroy(): bool
    {
        return true;
    }
}
