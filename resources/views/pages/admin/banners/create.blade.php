<x-app-layout>
    <div class="sm:px-6 lg:px-8">
        <div class="rounded-md bg-white p-4">
            <div class="flex items-center justify-between">
                <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Danh sách thương hiệu', 'url' => route('admin.brands.index')],
                    ['title' => 'Thêm thương hiệu', 'url' => route('admin.brands.create')],
                ]"/>
                <div class="py-2">
                    <p class="text-xs font-medium text-gray-600">Bên dưới đây là chức năng thêm thương hiệu </p>
                    <p class="text-xs font-medium text-gray-600"><span class="text-red-500">(*)</span> bắt buộc phải
                        nhập</p>
                </div>
            </div>
        </div>
        <div class="">
            <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 rounded-md bg-white p-4 mt-2">
                        <div class="">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label-required for="title" :value="__('Tiêu đề')"/>
                                    <x-text-input id="title" class="mt-1 block w-full" type="text" name="title"
                                                  :value="old('title')" autofocus autocomplete="username"/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 rounded-md bg-white p-4 mt-2">
                        <div class="mx-auto">
                            <x-input-label-required for="status" :value="__('Trạng thái hiển thị')"/>
                            <label for="status" class="mt-2 inline-flex items-center">
                                <input id="status" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       name="status">
                                <span class="ms-2 text-sm text-gray-600">{{ __('hiển thị') }}</span>
                            </label>
                        </div>
                        <div class="mt-4">
                            <x-input-label-required for="status" :value="__('Hình ảnh')"/>
                            <div class="relative mt-1 flex w-full items-center justify-center">
                                <img id="image-preview" src="" alt="Hình ảnh"
                                     class="absolute hidden h-64 w-full overflow-hidden rounded-lg object-cover bg-white">
                                <label for="dropzone-file"
                                       class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Bấm để tải lên</span></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                            2048mb)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" name="image"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <x-primary-button class="ms-3">
                        {{ __('Thêm thương hiệu') }}
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
                $('#dropzone-file').on('change', function(event) {
                    var file = event.target.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#image-preview').attr('src', e.target.result);
                            $('#image-preview').show();
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
