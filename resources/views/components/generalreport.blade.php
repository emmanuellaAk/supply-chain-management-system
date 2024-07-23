<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Report</title>
    <!-- Include your styles and scripts here -->
</head>
<body>
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                General Report
            </h2>

        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                    {{-- title="33% Higher than last month"> 33% <i data-lucide="chevron-up" --}}
                                    class="w-4 h-4 ml-0.5"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#"><div class="text-xl font-medium leading-8 mt-6">About Us</div></a>

                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <h2>{{App\Models\Inventory::count()}}</h2>
                        <div class="text-xl font-medium leading-8 mt-6">TOTAL PRODUCTS</div>
                        <div class="text-xl font-medium mt-2"></div>
                        <div class="text-base text-slate-500 mt-1">products left</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <h2>{{App\Models\Order::where('status', 'pending')->count()}}</h2>
                        <div class="text-2xl font-medium leading-8 mt-6">PENDING ORDERS</div>
                        <div class="text-base text-slate-500 mt-1">check on pending</div>
                    </div>
                </div>
            </div>
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
                        <a href="#" class="text-2xl font-medium leading-8 mt-6">TECHNICAL SUPPORT</a>
                        <div class="text-base text-slate-500 mt-1">Report a problem</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
