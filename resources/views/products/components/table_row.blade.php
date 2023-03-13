@php
    /** @var \App\Models\Product $product */
@endphp

<tr>
    <td>
        {{ $product->getKey() }}
    </td>
    <td>
        {{ $product->name }}
    </td>
    <td class="d-flex justify-content-end">
        <a
            href="{{ route('products.edit', ['product' => $product]) }}"
            type="button"
            class="btn btn-dark me-4 d-inline-block"
        >Edit</a>

        <form method="POST" action="{{ route('products.delete', ['product' => $product]) }}">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="btn btn-danger"
            >Delete</button>
        </form>
    </td>
</tr>
