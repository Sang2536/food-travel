<?php

namespace App\Services;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryService {
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

    public function get(string $id = null): Collection|ProductCategory
    {
        if ($id == null)
            return ProductCategory::all();
        else
            return ProductCategory::where('pc_id', $id)->first();
    }

    public function destroy(string $id): bool
    {
        return true;
    }

    public function update(Collection|ProductCategory $account, array $data): bool
    {
        return true;
    }

    public function statistical()
    {
        //
    }

    public function getDatatables(Collection|ProductCategory $productCategories)
    {
        return Datatables::of($productCategories)
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
                            <a href="#" type="button" data-url="' . route('product-category.show', $row->pc_id) . '" data-modal-target="detail-product-category-modal" data-modal-toggle="detail-product-category-modal" class="show-product-category font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Destroy</a>
                            <a href="#" type="button" data-url="' . route('product-category.edit', $row->pc_id) . '" data-modal-target="edit-product-category-modal" data-modal-toggle="edit-product-category-modal" class="edit-product-category font-medium px-2 text-yellow-600 dark:text-yellow-500 hover:underline">Destroy</a>
                            <a href="#" type="button" data-url="' . route('product-category.destroy', $row->pc_id) . '" data-modal-target="destroy-product-category-modal" data-modal-toggle="destroy-product-category-modal" class="destroy-product-category font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Destroy</a>
                        </div>
                    ';

                    return $html;
                }
            )
            ->editColumn(
                'category',
                function ($row) {
                    $html = '';

                    if ($row->level == 0)
                        $html .= '<p>'. $row->name .'</p>';
                    else {
                        $parentCategory = $this->get($row->parent_id);

                        $html .= '
                            <p>'. $parentCategory->name .'</p>
                            <span class="ml-2">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-forward">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 11l4 4l-4 4m4 -4h-11a4 4 0 0 1 0 -8h1" />
                                </svg>
                                '. $$row->name .'
                            </span>
                        ';
                    }

                    return $html;
                }
            )
            ->editColumn(
                'level',
                function ($row) {
                    $html = '<span class="mx-2">'. $row->level .'</span>';

                    return $html;
                }
            )
            ->editColumn(
                'keywords',
                function ($row) {
                    $html = '<span class="mx-2">';
                    foreach ($row->keywords as $word) {
                        $html .= '
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">'. $word .'</span>
                        ';
                    }
                    $html .= '</span>';

                    return $html;
                }
            )
            ->editColumn(
                'created_by',
                function ($row) {
                    return '
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            '. $row->created_by .'
                        </span>
                    ';
                }
            )
            ->rawColumns(['checkbox', 'action', 'category', 'level', 'keywords', 'created_by'])
            ->make(true);
    }
}
