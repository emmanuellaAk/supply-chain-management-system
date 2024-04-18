<!DOCTYPE html>
<html lang="en" class="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Current Suppliers
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">Add New Supplier</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        {{-- @foreach ($supplier as $supplier) --}}
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="#" class="font-medium">Company Name</a>
                        <div class="text-slate-500 text-xs mt-0.5">Supplier's Name</div>
                    </div>
                    <div class="flex mt-4 lg:mt-0">
                        <button class="btn btn-outline-secondary py-1 px-2 mr-2">Profile</button>
                        <button class="btn btn-outline-secondary py-1 px-2 mr-2">Edit</button>
                        <button class="btn btn-outline-secondary py-1 px-2">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<x-script />
