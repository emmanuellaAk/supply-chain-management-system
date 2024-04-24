<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Purchase Order
            </h2>
        </div>
        <form action="{{ route('addPurchaseOrder') }}" method="POST">
            @csrf
            <div id="inline-form" class="p-5">
                <div class="preview">
                    <div class="grid grid-cols-12 gap-2">
                        <select name="product" id=""
                            class="form-control col-span-4">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control col-span-4" name="quantity" placeholder="quantity"
                            aria-label="default input inline 2">
                        {{-- <input type="text" class="form-control col-span-4" name="order_status"
                            placeholder="order status" aria-label="default input inline 3"> --}}
                    </div>
                    <button class="btn btn-primary mt-5">Add Order</button>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
</div>
<x-script />
