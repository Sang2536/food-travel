<div class="px-4">
    <p class="my-4 text-2xl font-semibold">UPDATE</p>
    {!! Form::open(['url' => route('user.update', ['uid' => $user->uid]), 'method' => 'PUT', 'files' => true, 'id' => 'user-update-form' ]) !!}
        @csrf
        <div class="my-2">
            <input type="text" name="uid" value="{{ $user->uid }}" id="display-name" placeholder="UID" class="hidden bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        </div>
        <div class="my-2">
            <label for="display-name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Display name</label>
            <input type="text" name="name" value="{{ $user->name }}" id="display-name" placeholder="Your display name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        </div>
        <div class="my-2">
            <label for="avatar" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" onchange="uploadImg(event)" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="mt-2 max-w-48">
                <img id="prview_img" src="#" alt="error" title="" class="mb-2 w-48 h-48 object-fill rounded-full hidden" />
            </div>
        </div>
        <button type="submit" id="btn-user-update" class="my-2 w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update user</button>
    {!! Form::close() !!}
</div>

@push('script')
    <script type="text/javascript">
        //  Show Preview Img
        var uploadImg = function (event) {
            var prviewImg = document.getElementById('prview_img');
            var applyToAvatar = document.getElementById('apply-to-avatar');
            prviewImg.src = URL.createObjectURL(event.target.files[0]);
            prviewImg.onload = function() {
                URL.revokeObjectURL(prviewImg.src);
                prviewImg.classList.remove('hidden');
                applyToAvatar.classList.remove('hidden');
            }
        };
    </script>
@endpush
