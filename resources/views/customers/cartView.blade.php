<x-head />
<x-topbar />
<x-customersidebar/>
<div class="content">
    <h2 class="text-lg font-medium mt-10">Cart</h2>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif --}}

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                        </form>
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity * $item->price }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('createOrder') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-success mt-3">Place Order</button>
    </form>
</div>
