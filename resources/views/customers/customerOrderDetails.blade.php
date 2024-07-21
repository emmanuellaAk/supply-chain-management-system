<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <x-head />
</head>
<body>
    <x-topbar />
    <x-sidebar />
    <div class="content">
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Order Summary
                </h2>

                <form action="{{ route('filter') }}" method="GET" class="flex justify-center items-center gap-3">
                    <label for="status" class="font-semibold">STATUS</label>
                    <select name="order_status" id="status" class="intro-x login__input form-control p-3 h-11">
                        <option value="" class="">Select</option>
                        <option value="pending">Pending</option>
                        <option value="received">Received</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <button class="btn btn-primary py-2 px-2">Search</button>
                </form>
            </div>
            <div class="p-5" id="example">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">Customer Name</th>
                                    <th class="whitespace-nowrap">Total Cost</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                    <th class="text-center whitespace-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>${{ number_format($order->total_cost, 2) }}</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center {{ $order->status == 'pending' || $order->status == 'cancelled' ? 'text-red-500' : 'text-success' }}">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                                {{ ucfirst($order->status) }}
                                            </div>
                                        </td>
                                        <td class="flex justify-center items-center gap-5">
                                            <a class="btn btn-primary py-1 px-2" href="{{ route('orderreceived', ['orderId' => $order->id, 'status' => 'received']) }}">Received</a>
                                            <a class="btn btn-primary py-1 px-2" href="{{ route('orderdeclined', ['orderId' => $order->id, 'status' => 'cancelled']) }}">Cancelled</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $orders->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-script />
</body>
</html>
