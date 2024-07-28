<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form method="GET" action="/inventory" class="flex items-center">
                    <div class="w-56 relative text-slate-500 mr-4">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                    <div class="w-56 relative text-slate-500 mr-4">
                        <input type="number" class="form-control w-56 box pr-10" placeholder="Threshold..." name="threshold"
                            value="{{ request('threshold') }}">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Filter</button>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">PRODUCT NAME</th>
                        <th class="text-center whitespace-nowrap">COST PRICE</th>
                        <th class="text-center whitespace-nowrap">SELLING PRICE</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                        <th class="text-center whitespace-nowrap">SUPPLIERS</th>
                        <th class="text-center whitespace-nowrap">PREDICTED PROFIT</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="intro-x">
                            <td class="w-40">{{ $product->product_name }}</td>
                            <td class="text-center">{{ $product->cost_price }}</td>
                            <td class="text-center">{{ $product->selling_price }}</td>
                            <td class="text-center">{{ $product->quantity }}</td>
                            <td class="text-center">{{ App\Models\Supplier::find($product->supplier_id)->full_name }}</td>
                            <td class="text-center">{{ ($product->selling_price - $product->cost_price) * $product->quantity }}</td>
                            <td>
                                <div class="flex justify-center ">
                                    <a class="flex  mr-3" href="{{ route('edit', $product->id) }}"> <i
                                            data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>

                                    <form action="{{ route('delete', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="flex  text-danger" type="submit"
                                            data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
        <!-- END: Data List -->
    </div>
    <x-script />
</div>
