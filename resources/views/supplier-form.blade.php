<x-head />
<x-topbar/>
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
        <form method="POST" action="{{ route('show.suppliers')}}">
            @csrf
        <x-form.input name="Company Name" placeholder="Enter Company Name" value="{{ old('Company Name') }}"/>
        <p>
            
        </p>
        <x-form.input name="Full Name" placeholder="Enter Full Name" value="{{ old('Full Name') }}"/>
        <x-form.input name="Email" placeholder="Enter Email" value="{{ old('Email') }}"/>
        <x-form.input name="Mobile Number" placeholder="Enter Mobile Number" value="{{ old('Mobile Number') }}" />
        <x-form.input name="Location" placeholder="Enter Location" value="{{ old('Location') }}"/>
        <button class="btn btn-primary mt-5">Add Supplier</button>
    </div>
</div>

    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script/>
<!-- END: JS Assets-->
