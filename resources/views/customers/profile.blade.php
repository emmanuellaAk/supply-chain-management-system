<!-- resources/views/profile.blade.php -->
<x-head />
<x-fixedtopbar />
<x-customersidebar />

<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-bold text-base mr-auto">Profile Information</h1>
        </div>

        <div class="p-5">
            <div class="preview">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="intro-y box">
                        <div class="p-5">
                            <h2 class="text-lg font-medium">Personal Information</h2>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <strong class="w-32">Name:</strong>
                                    <span class="ml-2">{{ $customer->name }}</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Email:</strong>
                                    <span class="ml-2">{{ $customer->email }}</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Mobile Number:</strong>
                                    <span class="ml-2">{{ $customer->mobile_number }}</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <strong class="w-32">Company Name:</strong>
                                    <span class="ml-2">{{ $customer->company_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <!-- Add more sections as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
