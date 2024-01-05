<style>
    .notification {
        animation: fadeInDown 0.5s ease forwards;
    }

    .fadeOutUp {
        animation: fadeOutUp 0.5s ease forwards;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-1rem);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeOutUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(-1rem);
        }
    }
</style>
@props(['type', 'message'])

<div class="notification absolute left-1/2 top-10 z-[30] -translate-x-1/2 py-2">
    <div class="rounded-md bg-white px-6 py-2 shadow">
        <div class="flex items-center justify-center gap-3">
            <div
                class="{{ $type === 'success' ? 'text-green-500' : '' }} ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div class="">
                <p class="text-sm font-medium">{{ __('Thành công') }}</p>
                <p class="text-xs">{{ $message }}</p>
            </div>
        </div>
    </div>
</div>

