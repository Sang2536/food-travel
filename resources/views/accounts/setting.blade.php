<div class="w-full">
    <form class="mx-8 space-y-4 md:space-y-6" action="#">
        <div class="flex w-full grid gap-4 grid-cols-3">
            <div>
                <h2 class="mb-4 text-lg">Profile</h2>
                <div class="flex items-center mb-4">
                    <input id="email-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="email-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show email</label>
                </div>
                <div class="flex items-center mb-4">
                    <input checked id="phone-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="phone-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show phone</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="status-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show status</label>
                </div>
                <div class="flex items-center mb-4">
                    <input checked id="address-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="address-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show address</label>
                </div>
            </div>
            <div>
                <h2 class="mb-4 text-lg">Logs</h2>
                <div class="flex items-center mb-4">
                    <input id="logs-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="logs-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show logs</label>
                </div>
            </div>
            <div>
                <h2 class="mb-4 text-lg">Action</h2>
                <div class="flex items-center mb-4">
                    <input id="update-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="update-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Allow updates</label>
                </div>
                <div class="flex items-center mb-4">
                    <input checked id="destroy-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="destroy-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Allow destroy</label>
                </div>
                <div class="flex items-center mb-4">
                    <input checked id="show-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="show-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Allow show</label>
                </div>
            </div>
        </div>
        <div class="w-full grid gap-4 grid-cols-3">
            <h1 class="mb-4 text-lg">Options</h1>
            <div class="flex items-center mb-4">
                <input id="option1-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="option1-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Option 1</label>
            </div>
            <div class="flex items-center mb-4">
                <input id="option2-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="option2-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Option 2</label>
            </div>
        </div>
        <div class="w-full">
            <button type="submit" class="py-2 px-4 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update account</button>
        </div>
    </form>
</div>

@push('script')
    <script type="text/javascript">
    </script>
@endpush

