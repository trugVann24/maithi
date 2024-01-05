@if (isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0)
<nav class="flex py-2">
    <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
        <li class="inline-flex items-center">
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class=" h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
            </a>
        </li>
        @foreach ($breadcrumbs as $breadcrumb)
        <li>
            @if (!$loop->last)
            <div class="flex items-center">
                <span class="mx-1">/</span>
                <a href="{{ $breadcrumb['url'] }}"
                   class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">{{ $breadcrumb['title'] }}</a>
            </div>
            @else
            <div class="flex items-center">
                <span class="mx-1">/</span>
                <span class="ms-1 text-sm font-medium text-gray-700">{{ $breadcrumb['title'] }}</span>
            </div>
            @endif
        </li>
        @endforeach
    </ol>
</nav>
@endif
