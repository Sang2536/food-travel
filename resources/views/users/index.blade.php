@extends('app')
@section('title', 'User')

@section('content')
<div class="w-full py-4">
    @include('users.partials.index_statistical', ['userStatistical' => $userStatistical])

    @include('users.partials.index_table')
</div>

<div>
    @include('users.partials.modal_destroy')
</div>
@endsection

@push('script')
@endpush
