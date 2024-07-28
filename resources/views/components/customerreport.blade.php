<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Report</title>
    <!-- Include your styles and scripts here -->
    <style>
        .report-box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .report-box .box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</head>
<body>
    @php
    $customerId = session('customer_id');
    @endphp
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-xl font-bold truncate mr-5">
                General Report
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-8">
            <!-- Box 1 -->


            <!-- Box 2: Recent Orders -->
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="text-2xl font-medium leading-8 mt-6">RECENT ORDERS</div>
                        <ul class="text-base text-slate-500 mt-1">
                            @foreach(App\Models\Order::where('customer_id', $customerId)->orderBy('created_at', 'desc')->take(5)->get() as $order)
                                <li>Order #{{ $order->id }} - {{ $order->status }} - {{ $order->created_at->format('M d, Y') }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Box 3: Pending Orders -->
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <h2 class="text-2xl font-bold">{{App\Models\Order::where('status', 'pending')->where('customer_id', $customerId)->count() }}</h2>
                        <div class="text-2xl font-medium leading-8 mt-6">PENDING ORDERS</div>
                        <div class="text-base text-slate-500 mt-1">check on pending</div>
                    </div>
                </div>
            </div>

            <!-- Box 4: Technical Support -->
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="user" class="report-box__icon text-success"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                    {{-- title="22% Higher than last month"> 22% <i data-lucide="chevron-up" --}} class="w-4 h-4 ml-0.5"></i>
                                </div>
                            </div>
                        </div>
                        <a href="/report" class="text-2xl font-medium leading-8 mt-6">TECHNICAL SUPPORT</a>
                        <div class="text-base text-slate-500 mt-1">Report a problem</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
