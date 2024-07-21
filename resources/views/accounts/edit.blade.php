<div class="w-full">
    {!! Form::open(['url' => route('account.update', ['account' => $account->acc_id]), 'method' => 'PUT', 'files' => true, 'id' => 'account-update-form', 'class' => 'mx-8 space-y-4 md:space-y-6']) !!}
        @csrf
        <div class="flex w-full grid gap-4 grid-cols-2 my-2">
            <div class="mx-2">
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ $account->email }}" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" readonly>
                </div>
                <div class="mb-4">
                    <label for="display_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Display name</label>
                    <input type="text" name="display_name" id="display_name" value="{{ $account->display_name }}" placeholder="Display name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ $account->phone }}" placeholder="Phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="mb-4">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" name="address" id="address" value="{{ $account->address }}" placeholder="Address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="mb-4">
                    <label for="short_descr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short description</label>
                    <textarea name="short_descr" id="short_descr" placeholder="Short description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">{{ $account->descr }}</textarea>
                </div>
            </div>
            <div class="mx-2">
                <div class="mb-4">
                    <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*" onchange="uploadImg(event)" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-100 mb-4">
                    <img id="prview_img" class="w-64 h-64 object-fill rounded-full bg-gradient-to-r from-gray-200 to-gray-300" src="{{ url($account->avatar_url) }}" alt="{{ $account->display_name }}">
                </div>
            </div>
        </div>
        <div class="w-full">
            <button type="submit" id="btn-account-update" class="py-2 px-4 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update account</button>
        </div>
    {!! Form::close() !!}
</div>

@push('script')
    <script type="text/javascript">
        //  Show Preview Img
        var uploadImg = function (event) {
            var prviewImg = document.getElementById('prview_img');
            prviewImg.src = URL.createObjectURL(event.target.files[0]);
            prviewImg.onload = function() {
                URL.revokeObjectURL(prviewImg.src);
                prviewImg.classList.remove('hidden');
            }
        };
    </script>
@endpush
