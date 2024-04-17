<x-head/>
            <form action="{{ route('show.suppliers') }}" method="POST">
                @csrf

                <!-- Introduction -->
                <div class="text-slate-400 dark:text-slate-400 text-center mb-8">
                    A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place
                </div>

                <!-- Form Inputs -->
                <div class="mt-8">
                    <!-- Other Names -->
                    <label for="other_names">Other names</label>
                    <input type="text" class="form-input mt-1 block w-full" name="other_names" id="other_names" placeholder="Other names" required>
                    @error('other_names')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <!-- Last Name -->
                    <label for="last_name" class="block mt-4">Last Name</label>
                    <input type="text" class="form-input mt-1 block w-full" name="last_name" id="last_name" placeholder="Last Name" required>
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <!-- Email -->
                    <label for="email" class="block mt-4">Email</label>
                    <input type="email" class="form-input mt-1 block w-full" name="email" id="email" placeholder="Email" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <!-- Mobile Number -->
                    <label for="mobile_number" class="block mt-4">Mobile Number</label>
                    <input type="tel" class="form-input mt-1 block w-full" name="mobile_number" id="mobile_number" placeholder="Mobile Number" required>
                    @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button class="btn btn-primary py-3 px-4 w-full" type="submit" value="addSupplier">Add Supplier</button>
                </div>
            </form>
        </main>

