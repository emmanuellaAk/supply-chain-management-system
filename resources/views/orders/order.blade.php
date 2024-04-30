<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <a href="/inventory-form" class="btn btn-primary shadow-md mr-2">Add New Product</a> --}}
            <div class="dropdown-menu w-40">
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <form method="GET" action="/orders">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">CUSTOMER NAME</th>
                        <th class="text-center whitespace-nowrap">LOCATION</th>
                        <th class="text-center whitespace-nowrap">DELIVERY TYPE</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="intro-x">
                            <td class="w-40">{{ $order->id }}</td>
                            <td class="text-center">{{ $product->customer_name }}</td>
                            <td class="text-center">{{ $product->location }}</td>
                            <td class="text-center">{{ $product->delivery_type }}</td>
                            <td class="text-center">{{ $product->order_status}}
                            </td>
                            <td class="text-center">{{ ($product->cost_price - $product->selling_price) * $product->quantity }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center ">
                                    <a class="flex  mr-3" href="{{ route('edit', $product->id) }}" target="_self">Order Info</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $products->links() }} --}}
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- BEGIN: Delete Confirmation Modal -->
        {{-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- END: Delete Confirmation Modal -->
    </div>
    <x-script />
