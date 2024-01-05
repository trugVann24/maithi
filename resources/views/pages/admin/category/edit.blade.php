<x-app-layout>
    <div class="rounded-md sm:px-6 lg:px-8">
        <div class="rounded-md bg-white p-4">
            <div class="flex items-center justify-between py-2">
                <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Danh sách danh mục', 'url' => route('admin.categories.index')],
                    ['title' => 'Sửa danh mục', 'url' => route('dashboard')],
                ]" />
                <div class="">
                    <p class="text-xs font-medium text-gray-600">Bên dưới đây là chức năng thêm danh mục </p>
                    <p class="text-xs font-medium text-gray-600"><span class="text-red-500">(*)</span> bắt buộc phải nhập
                    </p>
                </div>
            </div>
        </div>

        <div class="p-4 rounded-md bg-white mt-2">
            <form method="POST" action="{{ route('admin.categories.update', $categories->id) }}">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3">
                        <div class="mx-auto rounded-md border p-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label-required for="name" :value="__('Tên danh mục')" />
                                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                                  value="{{ $categories->name }}" autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label-required for="slug" :value="__('Slug')" />
                                    <x-text-input id="slug" class="mt-1 block w-full" type="text" name="slug"
                                                  value="{{ $categories->slug }}" autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="mx-auto rounded-md border px-4 pb-7 pt-4">
                            <x-input-label for="status" :value="__('Trạng thái hiển thị')" />
                            <label for="status" class="mt-2 inline-flex items-center">
                                <input id="status" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       name="status" {{ $categories->status == 1 ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('hiển thị') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <x-primary-button class="ms-3">
                        {{ __('Sửa danh mục') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        @push('script')
            <script>
                $(document).ready(function() {
                    $('#name').on('keyup', function() {
                        var name = $(this).val();
                        var slug = name
                            .replace(/đ/g, 'd')
                            .replace(/Đ/g, 'D')
                            .normalize("NFD")
                            .replace(/[\u0300-\u036f]/g, "")
                            .toLowerCase()
                            .replace(/\s+/g, '-')
                            .replace(/[^\w\-]+/g, '')
                            .replace(/\-\-+/g, '-')
                            .replace(/^-+/, '')
                            .replace(/-+$/, '');
                        $('#slug').val(slug);
                    });
                });
            </script>
        @endpush
</x-app-layout>
