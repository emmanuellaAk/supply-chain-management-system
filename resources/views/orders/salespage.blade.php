<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Sales Point
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <a href="/inventory-form" class="btn btn-primary shadow-md mr-2">Add New Product</a> --}}
            <div class="dropdown-menu w-40">
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <form action="{{ route('salesPoint') }}" method="POST">

                        @csrf
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </form>
                </div>

                <form action="{{ route('orderInfo') }}" method="POST">
                    @csrf
                    <select name="customer" id="" class="form-control col-span-4">
                        <option> Select a Customer </option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>

                    @error('customer_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <!-- <select name="delivery_type" class="border-2 border-blue-800">
                        <option>Select an Option</option>
                        <option value="delivery">Delivery</option>
                        <option value="pickup">Pickup</option>
                    </select> -->
                    <!-- @error('delivery_type')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror -->


            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">PRODUCT NAME</th>
                        <th class="text-center whitespace-nowrap">QUANTITY AVAILABLE</th>
                        <th class="text-center whitespace-nowrap">PRICE</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                        {{-- <th class="text-center whitespace-nowrap">DELIVERY TYPE</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="intro-x">
                            <td class="w-40">{{ $product->product_name }}</td>
                            <td class="text-center">{{ $product->quantity }}</td>
                            <td class="text-center">{{ $product->selling_price }}</td>

                            <td class="flex justify-center items-center">
                                <input type="text" name="quantity[{{ $product->id }}]"
                                    class="flex justify-center items-center  border-2 border-gray-800">
                            </td>
                        </tr>
                    @endforeach
                    @error('quantity')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </tbody>
            </table>
            <button class="btn btn-primary flex justify-center items-center">Send Order</button>
            </form>
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
    <x-script />
</div>
