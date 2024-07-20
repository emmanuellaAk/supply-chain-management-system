<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <x-head />
    <x-topbar />
    <x-customersidebar/>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the customer ID from the session
            @if (session('customer_id'))
                var customerId = "{{ session('customer_id') }}";
                // Store customer ID in local storage
                localStorage.setItem('customer_id', customerId);
            @endif
        });
    </script>
</head>

<body>
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <x-generalreport/>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>


