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
                Current Suppliers
            </h2>
        </div>
        <div class="p-5" id="striped-rows-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Full Name</th>
                                <th class="whitespace-nowrap">Company Name</th>
                                <th class="whitespace-nowrap">Mobile Number</th>
                                <th class="whitespace-nowrap">Email</th>
                                <th class="whitespace-nowrap">Location</th>
                                <th class="whitespace-nowrap">More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->full_name }}</td>
                                <td>{{ $supplier->company_name }}</td>
                                <td>{{ $supplier->mobile_number }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->location }}</td>
                                <td>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button class="btn btn-primary py-1 px-2 mr-2">Profile</button>
                                        <button class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                                        <button class="btn btn-primary py-1 px-2 mr-2">Delete</button>
                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
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
