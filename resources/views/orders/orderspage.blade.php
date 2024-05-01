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
                    <form method="GET" action="{{ route('salesPoint')}}">
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
                        <th class="text-center whitespace-nowrap">PRODUCT NAME</th>
                        <th class="text-center whitespace-nowrap">QUANTITY AVAILABLE</th>
                        <th class="text-center whitespace-nowrap">PRICE</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="POST">
                        @csrf
                        @foreach ($products as $product)
                            <tr class="intro-x">
                                <td class="w-40">{{ $product->product_name }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-center">{{ $product->selling_price }}</td>
                                <td class="flex judtify-center items-center">

                                    <input type="text" name="figures" class="flex justify-center items-center">

                                </td>
                            </tr>
                        @endforeach
                    </form>

                </tbody>
            </table>
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
    <x-script />
