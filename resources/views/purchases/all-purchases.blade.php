<!DOCTYPE html>
<html lang="en" class="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<x-head />
<x-topbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">
                Purchases
            </h2>


            <form action="{{ route('filter') }}" method="GET" class="flex justify-center items-center gap-3">
                <label for="purchase" class="font-semibold">STATUS</label>
                <select name="order_status" id=""
                    class="intro-x login__input form-control p-3 h-11">

                    <option value="" class="">Select</option>
                    <option value="pending">Pending</option>
                    <option value="received">Received</option>
                    <option value="declined">Declined</option>

                </select>
                <button class="btn btn-primary py-2 px-2">Search</button>
            </form>
        </div>
        <div class="p-5" id="example">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Product</th>
                                <th class="whitespace-nowrap">Quantity</th>
                                <th class="text-center whitespace-nowrap">ORDER STATUS</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->id }}</td>
                                    <td>{{ App\Models\Inventory::find($purchase->product_id)->product_name }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td class="w-40">
                                        <div
                                            class="flex items-center justify-center {{ $purchase->order_status == 'pending' || $purchase->order_status == 'declined' ? 'text-red-500' : 'text-success' }} ">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                            {{ $purchase->order_status }}
                                        </div>
                                    </td>
                                    <td class="flex justify-center items-center gap-5 ">
                                        <a class="btn btn-primary py-1 px-2 "
                                            href="{{ route('received', $purchase->id) }}">Received</a>
                                        <a class="btn btn-primary py-1 px-2 "
                                            href="{{ route('declined', $purchase->id) }}">Purchase Declined</a>
                                    </td>

                                    {{-- <div class="flex mt-4 lg:mt-0">

                                            <a href="{{ route('all.purchases', $product->id) }}"
                                                class="btn btn-primary py-1 px-2 mr-2">Edit
                                            </a>

                                            <form action="{{ route('delete-supplier', $supplier->id) }}" method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}

                                    {{-- <button type="submit"
                                                    class="btn btn-primary py-1 px-2 mr-2">Delete</button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{ $purchases->links() }}
                </div>
            </div>
            <div class="source-code hidden">
                <button data-target="#copy-striped-rows-table" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i
                        data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                <div class="overflow-y-auto mt-3 rounded-md">
                    <pre class="source-preview" id="copy-striped-rows-table"> <code class="html"> HTMLOpenTagdiv class=&quot;overflow-x-auto&quot;HTMLCloseTag HTMLOpenTagtable class=&quot;table table-striped&quot;HTMLCloseTag HTMLOpenTagtheadHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagth class=&quot;whitespace-nowrap&quot;HTMLCloseTag#HTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;whitespace-nowrap&quot;HTMLCloseTagFirst NameHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;whitespace-nowrap&quot;HTMLCloseTagLast NameHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;whitespace-nowrap&quot;HTMLCloseTagUsernameHTMLOpenTag/thHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTag/theadHTMLCloseTag HTMLOpenTagtbodyHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtdHTMLCloseTag1HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagAngelinaHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagJolieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTag@angelinajolieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtdHTMLCloseTag2HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagBradHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagPittHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTag@bradpittHTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtdHTMLCloseTag3HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagCharlieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTagHunnamHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtdHTMLCloseTag@charliehunnamHTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTag/tbodyHTMLCloseTag HTMLOpenTag/tableHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                </div>
            </div>
        </div>
    </div>
</div>

<x-script />
