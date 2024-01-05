<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .fade-in {
        animation: fadeIn 0.3s;
    }

    .fade-out {
        animation: fadeOut 0.3s;
    }
</style>
@props(['name', 'show' => false, 'maxWidth' => '4xl'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-2xl',
        '2xl' => 'sm:max-w-7xl',
    ][$maxWidth];
@endphp

<div id="modal-{{ $name }}" class="fade-in fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
     style="display: none;">
    <div class="fixed inset-0 transform transition-all">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div
        class="{{ $maxWidth }} mb-6 relative top-10 transform
        overflow-hidden rounded-lg
        bg-white
        shadow-xl
        transition-all
        sm:mx-auto sm:w-full">
        {{ $slot }}
    </div>
</div>

<script>
    $(document).ready(function() {
        const modal = $('#modal-{{ $name }}');

        function showModal() {
            modal.removeClass('fade-out').addClass('fade-in');
            modal.show();
        }

        function hideModal() {
            modal.removeClass('fade-in').addClass('fade-out');
            setTimeout(() => {
                modal.hide();
            }, 300);
        }

        if ('{{ $show }}') {
            showModal();
        }

        modal.click(function(event) {
            if (event.target === this) {
                hideModal();
            }
        });

        $(document).keydown(function(event) {
            if (event.key === 'Escape') {
                hideModal();
            }
        });
    });
</script>
