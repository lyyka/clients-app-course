@extends('layouts.app')

@section('content')
    @component('components.header')
        @slot('active', 'products')
    @endcomponent

    <div class="d-flex justify-content-end">
        <a
        href="{{ route('products.create') }}"
        class="btn btn-info mb-3"
        >Create +</a>
    </div>

    @if($products->count() === 0)
        <p>No products found!</p>
    @else
        <table class="table">
            <thead class="table-light">
                <th>ID#</th>
                <th>Name</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @component('products.components.table_row')
                        @slot('product', $product)
                    @endcomponent
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
