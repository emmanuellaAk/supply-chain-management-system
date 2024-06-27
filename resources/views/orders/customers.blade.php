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
        <div class="p-5" id="example">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-center">#</th>
                                <th class="whitespace-nowrap text-center">Full Name</th>
                                <th class="whitespace-nowrap text-center">Company Name</th>
                                <th class="whitespace-nowrap text-center">Mobile Number</th>
                                <th class="whitespace-nowrap text-center">Email</th>
                                <th class="whitespace-nowrap text-center">Location</th>
                                <th class="whitespace-nowrap text-center">More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td class="text-center">{{ $supplier->id }}</td>
                                    <td class="text-center">{{ $supplier->full_name }}</td>
                                    <td class="text-center">{{ $supplier->company_name }}</td>
                                    <td class="text-center">{{ $supplier->mobile_number }}</td>
                                    <td class="text-center">{{ $supplier->email }}</td>
                                    <td class="text-center">{{ $supplier->location }}</td>
                                    <td>
                                        <div class="flex mt-4 lg:mt-0">
                                            <button class="btn btn-primary py-1 px-2 mr-2">Profile</button>
                                            <a href="{{ route('edit.supplier.getmethod', $supplier->id) }}"
                                                class="btn btn-primary py-1 px-2 mr-2">Edit
                                            </a>

                                            <form action="{{ route('delete-supplier', $supplier->id) }}" method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}

                                                <button type="submit"
                                                    class="btn btn-primary py-1 px-2 mr-2">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
</div>

<x-script />