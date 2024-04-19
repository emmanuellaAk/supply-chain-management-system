<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">
                Supplier's Information
            </h1>
        </div>

        <div id="vertical-form" class="p-5">
            <div class="preview">
                <form method="POST" action="{{ route('edit.supplier') }}">
                    @csrf

                    <label for="company_name">Company Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="company_name"
                        placeholder="Enter company name" >
                    @error('company_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="full_name" class="m-2">Full Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="full_name"
                        placeholder="Enter supplier's full name" >
                    @error('full_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="email">Email</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="email"
                        placeholder="example@email.com" >
                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="mobile_number"
                        placeholder="Enter supplier's mobile number" >
                    @error('mobile_number')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="location">Location</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="location"
                        placeholder="Enter supplier's mobile number" >
                    @error('location')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-primary mt-5">Add Supplier</button>
            </div>
        </div>

    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script />
<!-- END: JS Assets-->
