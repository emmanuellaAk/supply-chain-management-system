<x-head />
<x-fixedtopbar />
<x-sidebar />
<div class="content">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">
                Technical Support Requests
            </h2>
        </div>
        <div class="p-5" id="example">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Request ID</th>
                                <th class="whitespace-nowrap">Customer</th>
                                <th class="whitespace-nowrap">Subject</th>
                                <th class="whitespace-nowrap">Description</th>
                                <th class="whitespace-nowrap">Attachment</th>
                                <th class="text-center whitespace-nowrap">Status</th>
                                <th class="text-center whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($technicalSupports as $support)

                                <tr>
                                    <td>{{ $support->id }}</td>
                                    <td>{{ $support->customer->name }}</td>
                                    <td>{{ $support->subject }}</td>
                                    <td>
                                        <div class="description">
                                            {{ Str::limit($support->description, 50) }}
                                            @if (strlen($support->description) > 50)
                                                <a href="#" class="read-more"
                                                    onclick="toggleDescription(this, '{{ $support->description }}'); return false;">Read
                                                    more</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if ($support->attachment)
                                            <a href="{{ Storage::url($support->attachment) }}" target="_blank">View
                                                Attachment</a>
                                        @else
                                            No Attachment
                                        @endif
                                    </td>
                                    <td class="w-40">
                                        <div
                                            class="flex items-center justify-center {{ $support->status == 'pending' || $support->status == 'fixed' ? 'text-red-500' : 'text-success' }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                            {{ ucfirst($support->status) }}
                                        </div>
                                    </td>
                                    <td class="flex justify-center items-center gap-5">
                                        <a class="btn btn-primary py-1 px-2"
                                            href="{{ route('changeReportStatus', [$support->id, 'received']) }}">Received</a>
                                        <a class="btn btn-primary py-1 px-2"
                                            href="{{ route('changeReportStatus', [$support->id, 'fixed']) }}">Fixed</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<x-script />

<script>
    function toggleDescription(element, fullDescription) {
        const descriptionDiv = element.parentElement;
        const truncatedText = '{{ Str::limit('', 50) }}';
        const isTruncated = descriptionDiv.innerText.includes(truncatedText);

        if (isTruncated) {
            descriptionDiv.innerHTML = fullDescription +
                '<a href="#" class="read-more" onclick="toggleDescription(this, \'' + fullDescription +
                '\'); return false;">Read less</a>';
        } else {
            descriptionDiv.innerHTML = '{{ Str::limit('', 50) }}' +
                '<a href="#" class="read-more" onclick="toggleDescription(this, \'' + fullDescription +
                '\'); return false;">Read more</a>';
        }
    }
</script>

<style>
    .description {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .read-more {
        color: blue;
        cursor: pointer;
        text-decoration: underline;
    }
</style>
