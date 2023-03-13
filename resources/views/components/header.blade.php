<div class="d-flex mb-4">
    <a class="fs-1 text-decoration-none me-5 @if($active === 'clients') text-dark @else text-secondary @endif"
        href="{{ route('clients.index') }}">
        🚀 Clients
    </a>
    <a class="fs-1 text-decoration-none me-5 @if($active === 'products') text-dark @else text-secondary @endif"
       href="{{ route('products.index') }}">
        📦 Products
    </a>
</div>
