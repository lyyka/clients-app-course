@extends('layouts.app')

@section('content')
    <a
        href="{{ route('products.index') }}"
        class="text-dark d-inline-block mb-4"
    >< Go back</a>

    <h1>Create a product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        @component('products.components.form')
            @slot('product', null)
        @endcomponent

        <button
            type="submit"
            class="btn btn-dark"
        >Save</button>
    </form>
@endsection
