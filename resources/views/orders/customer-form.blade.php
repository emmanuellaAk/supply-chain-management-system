<!DOCTYPE html>
<html lang="en" class="light">
<x-head/>
<x-topbar/>
<x-sidebar/>
<div class="content">
    <div class="intro-y box h-full">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">
                Customer's Information
            </h1>
        </div>
        <div id="vertical-form" class="p-8 gap-4 mt-12">
            <div class="preview ">
                <form method="POST" action="{{ route('addCustomer') }}" class="flex flex-col justify-start items-end gap-6 w-full">
                    @csrf
                    <span class="grid grid-cols-2 gap-6 justify-start items-center w-full">
                        <span class="flex flex-col gap-3">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="intro-x login__input form-control " name="customer_name"
                                placeholder="Enter customer name">
                            @error('customer_name')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>


                        <span class="flex flex-col gap-3">
                            <label for="location" class="m-2">Location</label>
                            <input type="text" class="intro-x login__input form-control " name="location"
                                placeholder="Enter location">
                            @error('location')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>

                        
                        <span class="flex flex-col gap-3">
                            <label for="location" class="m-2">Password</label>
                            <input type="password" class="intro-x login__input form-control " name="password"
                                placeholder="Password">
                            @error('password')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>

                        
                        <span class="flex flex-col gap-3">
                            <label for="location" class="m-2">Mobile Number</label>
                            <input type="text" class="intro-x login__input form-control " name="mobile_number"
                                placeholder="Enter location">
                            @error('mobile_number')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>

                    <button class="btn btn-primary flex justify-center items-center">Add Customer</button>
                </form>
            </div>
        </div>

    </div>
</div>
    </div>
<x-script />
