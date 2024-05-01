<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Customers
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <a href="/inventory-form" class="btn btn-primary shadow-md mr-2">Add New Product</a> --}}
            <div class="dropdown-menu w-40">
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <form method="GET" action="/customersPage">
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
                        {{-- <th class="text-center whitespace-nowrap">DELIVERY TYPE</th> --}}
                        {{-- <th class="text-center whitespace-nowrap">ORDER STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="intro-x">
                            <td class="w-40">{{$customer->customer_name }}</td>
                            <td class="text-center">{{ $customer->location }}</td>
                            {{-- <td class="w-40">
                                <div
                                    class="flex items-center justify-center {{ $customer->order_status == 'pending' || $customers->order_status == 'canceled' ? 'text-red-500' : 'text-success' }} ">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                    {{ $customer->order_status }}
                                </div>
                            </td>
                            <td class="flex justify-center items-center gap-5 ">
                                <a class="btn btn-primary py-1 px-2 "
                                    href="{{ route('received', $customer->id) }}">Delivered</a>
                                <a class="btn btn-primary py-1 px-2 "
                                    href="{{ route('canceled', $customer->id) }}">Canceled</a>
                            </td> --}}
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
