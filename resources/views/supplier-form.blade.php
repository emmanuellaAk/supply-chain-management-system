<x-head />
<x-topbar/>
<x-sidebar />
<div class="content">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h1 class="font-medium text-base mr-auto">
              Supplier's Information
            </h1>
        </div>
        <div id="vertical-form" class="p-5">
            <div class="preview">
                <div>
                    <label for="vertical-form-1" class="form-label">Email</label>
                    <input id="vertical-form-1" type="text" class="form-control" placeholder="example@gmail.com">
                </div>
                <div class="mt-3">
                    <label for="vertical-form-2" class="form-label">Password</label>
                    <input id="vertical-form-2" type="text" class="form-control" placeholder="secret">
                </div>
                <div class="form-check mt-5">
                    <input id="vertical-form-3" class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label" for="vertical-form-3">Remember me</label>
                </div>
                <button class="btn btn-primary mt-5">Add Supplier</button>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: JS Assets-->
<x-script/>
<!-- END: JS Assets-->
