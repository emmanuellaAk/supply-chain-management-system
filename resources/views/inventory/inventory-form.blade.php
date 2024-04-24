<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">
               Add Products
            </h1>
        </div>

        <div id="vertical-form" class="p-5">
            <div class="preview">
                <form method="POST" action="{{ route('add.product') }}">
                    @csrf

                    <label for="product_name">Product Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="product_name"
                        placeholder="Enter product name">
                    @error('product_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="cost_price" class="m-2">Cost Price</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="cost_price"
                        placeholder="Enter product's cost price" >
                    @error('cost_price')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="selling_price">Selling Price</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="selling_price"
                        placeholder="Enter product's selling price" >
                    @error('selling_price')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="suppliers">Suppliers</label>
                    <select name="supplier" id="" class="intro-x login__input form-control py-3 px-4 block mt-4">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->full_name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary mt-5">Add Product</button>
            </div>
        </div>

    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script />
<!-- END: JS Assets-->

