<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">
                Edit Information
            </h1>
        </div>

        <div id="vertical-form" class="p-5">
            <div class="preview">
                <form method="post" action="{{ route('edit.supplier', $supplier->id) }}">
                    @csrf
                    {{-- @method('PUT') --}}

                    <label for="company_name">Company Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        name="company_name" placeholder="Enter company name"
                        value="{{ old('company_name', $supplier->company_name) }}">
                    @error('company_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="full_name" class="m-2">Full Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        name="full_name" placeholder="Enter supplier's full name"
                        value="{{ old('full_name', $supplier->full_name) }}">
                    @error('full_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="email" class="m-2">Email</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="email"
                        placeholder="Enter supplier's email " value="{{ old('email', $supplier->email) }}">
                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>


                    <label for="mobile_number" class="m-2">Mobile Number</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        name="mobile_number" placeholder="Enter supplier's mobile number "
                        value="{{ old('mobile_number', $supplier->mobile_number) }}">
                    @error('mobile_number')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="location" class="m-2">Location</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="location"
                        placeholder="Enter supplier's location " value="{{ old('location', $supplier->location) }}">
                    @error('location')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary mt-5">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script />
<!-- END: JS Assets-->
</body>

</html>
