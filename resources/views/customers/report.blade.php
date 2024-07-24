<x-head />
<x-fixedtopbar />>
<x-customersidebar/>
<div class="content">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">
              Report a Problem
            </h2>
        </div>
        <div class="p-5">
            <form action="{{route('sendReport')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" id="subject" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter the subject" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Describe the problem" required></textarea>
                </div>

                <div>
                    <label for="attachment" class="block text-sm font-medium text-gray-700">Attachment</label>
                    <input type="file" name="attachment" id="attachment" class="mt-1 block w-full text-gray-900" accept=".jpg,.jpeg,.png,.pdf">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary flex justify-center items-center mt-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

