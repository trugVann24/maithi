<x-app-layout>
    <div class="sm:px-6 lg:px-8">
        <div class="rounded-md bg-white p-4">
            <div class="flex items-center justify-between">
                <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Danh sách thương hiệu', 'url' => route('admin.brands.index')],
                    ['title' => 'Sửa thương hiệu', 'url' => route('admin.brands.create')],
                ]" />
                <div class="py-2">
                    <p class="text-xs font-medium text-gray-600">Bên dưới đây là chức năng sửa thương hiệu </p>
                    <p class="text-xs font-medium text-gray-600"><span class="text-red-500">(*)</span> bắt buộc phải nhập
                    </p>
                </div>
            </div>
        </div>
        <div class="py-4">
            <form method="POST" action="{{ route('admin.brands.update', $brands->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 mt-2 rounded-md bg-white p-4">
                        <div class="">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label-required for="name" :value="__('Tên thương hiệu')" />
                                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                                  value="{{ $brands->name }}" autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label-required for="slug" :value="__('Slug')" />
                                    <x-text-input id="slug" class="mt-1 block w-full" type="text" name="slug"
                                                  value="{{ $brands->slug }}" autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div>
                                <x-input-label-required for="description" :value="__('Mô tả')" />
                                <textarea id="description"
                                          class="min-h-60 mt-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                          type="text" name="description" autofocus>{{ $brands->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 rounded-md bg-white p-4">
                        <div class="mx-auto">
                            <x-input-label-required for="status" :value="__('Trạng thái hiển thị')" />
                            <label for="status" class="mt-2 inline-flex items-center">
                                <input id="status" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       name="status" {{ $brands->status == 1 ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('hiển thị') }}</span>
                            </label>
                        </div>
                        <div class="mt-2">
                            <x-input-label-required for="status" :value="__('Hình ảnh hiện tại')" />
                            <div class="mt-1 h-52 w-full overflow-hidden rounded-lg px-4">
                                <img src="{{ asset('image/brands/' . $brands->image) }}" alt="Hình ảnh"
                                     class="h-full w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <x-primary-button class="ms-3">
                        {{ __('Cập nhật thương hiệu') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
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
