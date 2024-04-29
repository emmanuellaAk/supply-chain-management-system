<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box h-full">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">
                Supplier's Information
            </h1>
        </div>

        <div id="vertical-form" class="p-8 gap-4">
            <div class="preview ">
                <form method="POST" action="{{ route('add.supplier') }}" class="flex flex-col justify-start items-end gap-6 w-full">
                    <span class="grid grid-cols-2 gap-6 justify-start items-center w-full">
                        <span class="flex flex-col gap-3">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="intro-x login__input form-control " name="company_name"
                                placeholder="Enter company name">
                            @error('company_name')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>


                        <span class="flex flex-col gap-3">
                            <label for="full_name" class="m-2">Full Name</label>
                            <input type="text" class="intro-x login__input form-control " name="full_name"
                                placeholder="Enter supplier's full name">
                            @error('full_name')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>


                        <span class="flex flex-col gap-3">
                            <label for="email">Email</label>
                            <input type="text" class="intro-x login__input form-control " name="email"
                                placeholder="example@email.com">
                            @error('email')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>


                        <span class="flex flex-col gap-3">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="intro-x login__input form-control " name="mobile_number"
                                placeholder="Enter supplier's mobile number">
                            @error('mobile_number')
                                <p class="text-danger text-xs ">{{ $message }}</p>
                            @enderror
                        </span>

                        <span class="flex flex-col gap-3">
                            <label for="location">Location</label>
                            <input type="text" class="intro-x login__input form-control"
                                name="location" placeholder="Enter supplier's mobile number">
                            @error('location')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </span>
                         @csrf
                    </span>
                    <button class="btn btn-primary flex justify-center items-center">Add Supplier</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script />
<!-- END: JS Assets-->
