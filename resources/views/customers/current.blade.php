<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="flex:1 space-between">
        <h2 class="intro-y text-lg font-medium mt-10">
            Current Customers
        </h2>
        <div class="w-56 relative text-slate-500">
            <form method="GET" action="/customers">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search"
                    value="{{ request('search') }}">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="dropdown-menu w-40">
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                {{-- <div class="w-56 relative text-slate-500">
                    <form method="GET" action="/customers">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div> --}}
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">CUSTOMER NAME</th>
                        <th class="text-center whitespace-nowrap">EMAIL</th>
                        <th class="text-center whitespace-nowrap">MOBILE PHONE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="intro-x">
                            <td class="w-40 text-center">{{ $customer->id }}</td>
                            <td class="w-40 text-center">{{ $customer->name }}</td>
                            <td class="w-40 text-center">{{ $customer->email }}</td>
                            <td class="w-40 text-center">{{ $customer->mobile_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {{ $customers->links() }}
        </div>
