@extends('layouts.app')

@section('content')
    <a
        href="{{ route('products.index') }}"
        class="text-dark d-inline-block mb-4"
    >< Go back</a>

    <h1>Edit a product</h1>

    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
        @csrf
        @method('PUT')

        @component('products.components.form')
            @slot('product', $product)
        @endcomponent

        <button
            type="submit"
            class="btn btn-dark"
        >Update</button>
    </form>
@endsection
