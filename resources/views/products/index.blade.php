@extends('app')
@section('title', 'Product')

@section('content')
<div class="w-full py-4">
    @include('products.partials.index_statistical')

    @include('products.partials.index_table')
</div>
@endsection

@push('script')
    <script type="text/javascript">
    </script>
@endpush
