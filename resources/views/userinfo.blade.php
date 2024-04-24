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
                <form method="POST" action="{{ route('edit-profile', $user->id) }}">
                    @csrf

                    <label for="name">Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="name"
                        placeholder="name" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="company_name" class="m-2">Company Name</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        name="company_name" placeholder="company name" value="{{ old('company_name', $user->company_name) }}">
                    @error('company_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="mobile_number">Email</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" name="mobile_number"
                        placeholder="" {{ old('mobile_number', $user->email) }}>
                    @error('mobile_number')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>

                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        name="mobile_number" placeholder="Enter mobile_number"
                       value="{{ old('mobile_number', $user->mobile_number) }}">
                    @error('mobile_number')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <br>




                    <button class="btn btn-primary mt-5">Edit</button>
            </div>
        </div>

    </div>
</div>
<x-script />
