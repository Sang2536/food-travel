@extends('app')
@section('title', 'Detail contact')

@section('content')
<div class="w-full">
    <div class="px-6 py-4 my-2">
        <a href="{{ route('contact.index') }}" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Back</a>

        <!-- if not admin and owner -->
        @if ($userLogin->roles['name'] == 'admin')
            <a href="{{ route('contact.edit', ['contact' => $contact->cid]) }}" class="font-medium px-2 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <a href="{{ route('contact.destroy', ['contact' => $contact->cid]) }}" class="font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Delete</a>
        @endif
    </div>
    <div class="flex relative items-center rounded pr-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <div class="absolute">
            <img class="w-64 h-64 object-fill rounded-full z-20" src="https://i.pinimg.com/564x/f9/8d/80/f98d8070d4214bad1d13ede632b82563.jpg" alt="Jese image">
        </div>
        <div class="ml-32 pl-40 py-2 h-64 bg-gray-50 rounded-r-full float-right">
            <div class="flex">
                <div class="text-2xl font-semibold">{{ $contact->display_name }}</div>
                <div class="flex items-center ml-2 h-1/2 px-2 border rounded-full bg-white">
                    @if ($contact->status == 'active')
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> {{ $contact->status }}
                    @elseif ($contact->status == 'inactive')
                        <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div> {{ $contact->status }}
                    @elseif ($contact->status == 'locked')
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> {{ $contact->status }}
                    @endif
                </div>
            </div>
            <div class="text-xl text-gray-500">{{ $contact->email }}</div>
            <hr class="w-10/12 h-1 mx-auto my-4 bg-gray-300 border-0 rounded md:my-10 dark:bg-gray-700">
            <p class="w-auto text-wrap">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum temporibus, amet voluptatibus ipsa consectetur velit officiis soluta ullam numquam? Enim et consequuntur odit expedita iste temporibus amet voluptatibus? Corrupti, porro.
            </p>
        </div>
    </div>

    <div class="mt-8 rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <!-- info tab + logs tab + settings tab -->
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="contact-styled-tab" data-tabs-toggle="#contact-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="contact-profile-tab" data-tabs-target="#contact-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contact-settings-tab" data-tabs-target="#contact-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                </li>
            </ul>
        </div>
        <div id="contact-styled-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contact-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="flex w-full grid gap-4 grid-cols-3">
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        name
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        phone
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        email
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        address
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        source
                    </div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contact-settings" role="tabpanel" aria-labelledby="settings-tab">
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
                        <button type="submit" class="py-2 px-4 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    // alert("hello");
</script>
@endsection
