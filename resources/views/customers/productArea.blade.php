<x-head />
 <x-topbar />
 <x-sidebar />
 <div class="content">
     <h2 class="intro-y text-lg font-medium mt-10">
         Products for Sale
     </h2>
     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
             <div class="hidden md:block mx-auto text-slate-500"></div>
             <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                 <div class="w-56 relative text-slate-500">
                     <form action="{{ route('viewProducts') }}" method="POST">
                         @csrf
                         <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." name="search" value="{{ request('search') }}">
                     </form>
                 </div>
             </div>
         </div>

         <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
             <form id="productForm" action="{{ route('viewProducts') }}" method="POST">
                 @csrf
                 <table class="table table-report -mt-2">
                     <thead>
                         <tr>
                             <th class="text-center whitespace-nowrap">SELECT PRODUCT</th>
                             <th class="text-center whitespace-nowrap">PRODUCT NAME</th>
                             <th class="text-center whitespace-nowrap">QUANTITY AVAILABLE</th>
                             <th class="text-center whitespace-nowrap">PRICE</th>
                             <th class="text-center whitespace-nowrap">QUANTITY</th>
                             <th class="text-center whitespace-nowrap">ACTIONS</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($products as $product)
                             <tr class="intro-x">
                                 <td class="text-center">
                                     <input type="checkbox" name="selected_products[]" value="{{ $product->id }}" class="">
                                 </td>
                                 <td class="w-40">{{ $product->product_name }}</td>
                                 <td class="text-center">{{ $product->quantity }}</td>
                                 <td class="text-center">{{ $product->selling_price }}</td>
                                 <td class="text-center">
                                     <input type="number" name="quantity[{{ $product->id }}]" class="quantity-input border-2 border-gray-800" min="1" value="1" data-price="{{ $product->selling_price }}">
                                 </td>
                                 <td class="text-center">
                                     <button type="button" class="btn btn-primary add-single-product" data-product-id="{{ $product->id }}">Add Product</button>
                                 </td>
                             </tr>
                         @endforeach
                         @error('quantity')
                             <p class="text-danger text-xs mt-2">{{ $message }}</p>
                         @enderror
                     </tbody>
                 </table>

                 <button type="submit" class="btn btn-primary flex justify-center items-center mt-5" id="add-selected-products">Add Selected Products</button>
             </form>
         </div>
     </div>
     <x-script />
