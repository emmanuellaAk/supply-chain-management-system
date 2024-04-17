<!DOCTYPE html>
<html lang="en" class="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<x-head/>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
                  <x-navbar/>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <div class="wrapper">
            <div class="wrapper-box">
                <!-- BEGIN: Side Menu -->
                <x-sidebar/>
                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div class="content">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 2xl:col-span-9">
                            <div class="grid grid-cols-12 gap-6">
                                <!-- BEGIN: General Report -->
                                <div class="col-span-12 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            General Report
                                        </h2>
                                        <a href="#" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                                    </div>
                                    <div class="grid grid-cols-12 gap-6 mt-5">
                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                                    <div class="text-base text-slate-500 mt-1">Item Sales</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                                    <div class="text-base text-slate-500 mt-1">New Orders</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                                    <div class="text-base text-slate-500 mt-1">Total Products</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                                    <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: General Report -->
                                <!-- BEGIN: Sales Report -->
                                <div class="col-span-12 lg:col-span-6 mt-8">
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Sales Report
                                        </h2>
                                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                            <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                            <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                                        </div>
                                    </div>
                                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                                        <div class="flex flex-col md:flex-row md:items-center">
                                            <div class="flex">
                                                <div>
                                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">$15,000</div>
                                                    <div class="mt-0.5 text-slate-500">This Month</div>
                                                </div>
                                                <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                                                <div>
                                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                                    <div class="mt-0.5 text-slate-500">Last Month</div>
                                                </div>
                                            </div>
                                            <div class="dropdown md:ml-auto mt-5 md:mt-0">
                                                <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content overflow-y-auto h-32">
                                                        <li><a href="#" class="dropdown-item">PC & Laptop</a></li>
                                                        <li><a href="#" class="dropdown-item">Smartphone</a></li>
                                                        <li><a href="#" class="dropdown-item">Electronic</a></li>
                                                        <li><a href="#" class="dropdown-item">Photography</a></li>
                                                        <li><a href="#" class="dropdown-item">Sport</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="report-chart">
                                            <div class="h-[275px]">
                                                <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Sales Report -->
                                <!-- BEGIN: Weekly Top Seller -->
                                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Weekly Top Seller
                                        </h2>
                                        <a href="#" class="ml-auto text-primary truncate">Show More</a>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="report-pie-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                <span class="truncate">17 - 30 Years old</span> <span class="font-medium ml-auto">62%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                <span class="truncate">31 - 50 Years old</span> <span class="font-medium ml-auto">33%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                <span class="truncate">>= 50 Years old</span> <span class="font-medium ml-auto">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Weekly Top Seller -->
                                <!-- BEGIN: Sales Report -->
                                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Sales Report
                                        </h2>
                                        <a href="#" class="ml-auto text-primary truncate">Show More</a>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="report-donut-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                <span class="truncate">17 - 30 Years old</span> <span class="font-medium ml-auto">62%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                <span class="truncate">31 - 50 Years old</span> <span class="font-medium ml-auto">33%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                <span class="truncate">>= 50 Years old</span> <span class="font-medium ml-auto">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Sales Report -->
                                <!-- BEGIN: Official Store -->
                                <!-- END: Official Store -->
                                <!-- BEGIN: Weekly Best Sellers -->
                                <!-- END: Weekly Best Sellers -->
                                <!-- BEGIN: General Report -->
                                    <x-report/>
                                    <!-- END: General Report -->
                                    <!-- BEGIN: Weekly Top Products -->
                                    <!-- END: Weekly Top Products -->
                                    <!-- BEGIN: Transactions -->
                                    <!-- END: Transactions -->
                                    <!-- BEGIN: Recent Activities -->
                                    <!-- END: Recent Activities -->
                                    <!-- BEGIN: Important Notes -->
                                    <!-- END: Important Notes -->
                                    <!-- BEGIN: Schedules -->
                                    <!-- END: Schedules -->

                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <div data-url="simple-menu-dark-dashboard-overview-1.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div>
        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
        <script src="../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>

<!-- Mirrored from icewall-html.vercel.app/simple-menu-light-dashboard-overview-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Sep 2023 00:57:13 GMT -->
</html>
