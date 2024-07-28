<x-head />
<x-fixedtopbar />
<x-customersidebar />

<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-xl mr-auto">Profile Information</h1>
        </div>

        <div class="p-5">
            <div class="preview">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="intro-y box">
                        <div class="p-5">
                            <div class="flex items-center mb-4">
                                <!-- Avatar Icon -->
                                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center text-white text-4xl">
                                    <i class="fas fa-user"></i> <!-- Font Awesome User Icon -->
                                </div>
                                <div class="ml-4">
                                    <h2 class="font-bold text-xl">{{ $customer->name }}</h2>
                                    <span class="text-sm text-gray-500">{{ $customer->email }}</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <strong class="w-32">Mobile Number:</strong>
                                    <span class="ml-2">{{ $customer->mobile_number }}</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Address:</strong>
                                    <span class="ml-2">{{ $customer->address }}</span>
                                </div>
                                <!-- Additional Info -->
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Date of Birth:</strong>
                                    <span class="ml-2">{{ $customer->date_of_birth }}</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Joined:</strong>
                                    <span class="ml-2">{{ $customer->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('editProfile', $customer->id) }}" class="btn btn-primary mr-2">Edit Profile</a>
                    <a href="{{ route('orderSummary', $customer->id) }}" class="btn btn-secondary">View Order History</a>
                </div>
            </div>
        </div>
    </div>
</div>
