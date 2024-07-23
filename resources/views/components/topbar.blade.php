@php
    $user_auth = auth()->user();
    // dd($user_auth)
@endphp

<div
    class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="#" class="-intro-x hidden md:flex">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('dist\images\hexagon-photography-icon-logo-1.png')}}">
            <span class="text-white text-lg ml-3">SCM</span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            {{-- <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol> --}}
        </nav>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            {{-- <span class="text-white text-sm ml-3">WELCOME: {{ auth()->user()->name }}</span> --}}
            {{-- <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                    </div> --}}
            <a class="notification notification--light sm:hidden" href="#"> <i data-lucide="search"
                    class="notification__icon dark:text-slate-500"></i> </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="#" class="flex items-center">
                            <div
                                class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a href="#" class="flex items-center mt-2">
                            <div
                                class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="users"></i> </div>
                            <div class="ml-3">Users & Permissions</div>
                        </a>
                        <a href="#" class="flex items-center mt-2">
                            <div
                                class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                            <div class="ml-3">Transactions Report</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Users</div>
                    <div class="mb-5">
                        <a href="#" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="dist/images/profile-12.jpg">
                            </div>
                            <div class="ml-3">Robert De Niro</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                robertdeniro@left4code.com</div>
                        </a>
                        <a href="#" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="dist/images/profile-8.jpg">
                            </div>
                            <div class="ml-3">Hugh Jackman</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                hughjackman@left4code.com</div>
                        </a>
                        <a href="#" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="dist/images/profile-9.jpg">
                            </div>
                            <div class="ml-3">Angelina Jolie</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                angelinajolie@left4code.com</div>
                        </a>
                        <a href="#" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="dist/images/profile-3.jpg">
                            </div>
                            <div class="ml-3">Kevin Spacey</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                kevinspacey@left4code.com</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Products</div>

                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/profile-3.jpg')}}">
            </div>
            <div class="dropdown-menu w-56">
                <ul
                    class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">Robert De Niro</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>

                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="/" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right"
                                class="w-4 h-4 mr-2"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
