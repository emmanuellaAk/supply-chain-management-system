<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <x-head />
    <x-topbar />
    <x-sidebar />
</head>

<body>
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="#" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                            <!-- Adjusted column span for larger width -->
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                {{-- title="33% Higher than last month"> 33% <i data-lucide="chevron-up" --}}
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-xl font-medium leading-8 mt-6">Money</div>
                                    <div class="text-base text-slate-500 mt-1">profit</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                            <!-- Adjusted column span for larger width -->
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                {{-- title="2% Lower than last month"> 2% <i data-lucide="chevron-down" --}}
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-2xl font-medium leading-8 mt-6">TOTAL PRODUCTS</div>
                                    <div class="text-base text-slate-500 mt-1">products Left</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                            <!-- Adjusted column span for larger width -->
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                {{-- title="12% Higher than last month"> 12% <i data-lucide="chevron-up" --}} class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-2xl font-medium leading-8 mt-6">PENDING ORDERS</div>
                                    <div class="text-base text-slate-500 mt-1">check on pending</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                            <!-- Adjusted column span for larger width -->
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                {{-- title="22% Higher than last month"> 22% <i data-lucide="chevron-up" --}} class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-2xl font-medium leading-8 mt-6">TECHNICAL SUPPORT</div>
                                    <div class="text-base text-slate-500 mt-1">Report a problem</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
