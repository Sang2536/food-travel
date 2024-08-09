{{-- Drawer -> opacity when click modal --}}
<div class="relative m-4 w-full bg-blend-overlay max-w-4xl max-h-full start-1/2 top-1/2 transition-transform -translate-x-1/2 -translate-y-1/2">
    <!-- Main content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 id="brand-title-modal" class="text-xl font-medium text-gray-900 dark:text-white">
                {{ $brand->name }} - {{ $brand->bid }}
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-brand-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="pb-4">
            <div class="w-full h-96 no-scrollbar overflow-y-auto bg-gray-200">
                Detail brand
            </div>
        </div>
    </div>
</div>
