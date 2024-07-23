<x-head />
<x-topbar />
<x-sidebar/>
<div class="content">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">
             Customer Order Summary
            </h2>
        </div>
        <div class="p-5" id="example">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Product Id</th>
                                <th class="whitespace-nowrap">Product Name</th>
                                <th class="whitespace-nowrap">Product Price</th>
                                <th class="whitespace-nowrap">Total Cost</th>
                                <th class="text-center whitespace-nowrap">Created At</th>
                                <th class="text-center whitespace-nowrap">Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($order->items) > 0)
                            @foreach ($order->items as $order)
                                <tr>
                                  <td>{{$order->product_id}}</td>
                                  <td>{{$order->product_name}}</td>
                                  <td>{{$order->price}}</td>
                                  <td>{{$order->total_cost}}</td>
                                  <td>{{$order->created_at}}</td>
                                  <td>{{$order->updated_at}}</td>
                                </tr>
                            @endforeach
                            @else
                            no items available
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<x-script />
