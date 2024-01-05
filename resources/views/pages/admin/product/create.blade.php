<x-app-layout>
    <div class="sm:px-6 lg:px-8">
        <div class="rounded-md bg-white p-4">
            <div class="flex items-center justify-between py-2">
                <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Danh sách', 'url' => route('admin.products.index')],
                    ['title' => 'Thêm sản phẩm', 'url' => route('admin.products.create')],
                ]"/>
                <div class="">
                    <p class="text-xs font-medium text-gray-600">Bên dưới đây là chức năng thêm danh mục </p>
                    <p class="text-xs font-medium text-gray-600"><span class="text-red-500">(*)</span> bắt buộc phải
                        nhập
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-2 rounded-md bg-white p-4">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3">
                        <div class="mx-auto rounded-md border p-4">
                            <div class="grid grid-cols-2 gap-4 mt-2">
                                <div>
                                    <x-input-label-required for="category_id" :value="__('Danh mục')"/>
                                    <x-select-input id="category_id" class="block mt-1 w-full"
                                                    name="product[category_id]"
                                                    :options="$categories"
                                                    :selected="old('category_id')"
                                                    />
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label-required for="brand_id" :value="__('Thương hiệu')"/>
                                    <x-select-input id="brand_id" class="block mt-1 w-full" name="product[brand_id]"
                                                    :options="$brands"
                                                    :selected="old('brand_id')"
                                                    />
                                    <x-input-error :messages="$errors->get('brand_id')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-2">
                                <div>
                                    <x-input-label-required for="name" :value="__('Tên sản phẩm')"/>
                                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="product[name]"
                                                  :value="old('name')" autofocus autocomplete="username"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label-required for="slug" :value="__('Slug')"/>
                                    <x-text-input id="slug" class="mt-1 block w-full" type="text" name="product[slug]"
                                                  :value="old('slug')" autofocus autocomplete="username"/>
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label-required for="price_default" :value="__('Giá')"/>
                                    <x-text-input id="price_default" class="mt-1 block w-full" type="number"
                                                  name="product[price_default]"
                                                  :value="old('price_default')" autofocus/>
                                    <x-input-error :messages="$errors->get('price_default')" class="mt-2"/>
                                </div>
                            </div>

                        </div>
                        <div class="mt-5">
                            <div class="mx-auto rounded-md border p-4">
                                <div>
                                    <h4 class="text-sm font-medium">Các lựa chọn thuộc tính: </h4>
                                    <div class=" mt-2 flex flex-col gap-2">
                                        @foreach($attributes as $attribute)
                                            <span class="font-medium text-sm">
                                            {{$attribute->name .':'}}
                                        </span>
                                            <div class="flex items-center gap-4">
                                                @foreach($attribute->attributeOptions as $option)
                                                    <label for="{{'options-'. $option->id}}"
                                                           class="inline-flex items-center">
                                                        <input id="{{'options-'. $option->id}}" type="checkbox"
                                                               class="attribute-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                               data-attribute="{{ $attribute->name }}"
                                                               data-option="{{ $option->value }}">
                                                        <span
                                                            class="ms-2 text-sm text-gray-600">{{ __($option->value) }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="result"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-1">
                        <div class="mx-auto rounded-md border px-4 pb-7 pt-4">
                            <x-input-label for="status" :value="__('Trạng thái hiển thị')"/>
                            <label for="status" class="mt-2 inline-flex items-center">
                                <input id="status" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       name="product[status]">
                                <span class="ms-2 text-sm text-gray-600">{{ __('hiển thị') }}</span>
                            </label>
                            <div class="mt-4">
                                <x-input-label-required for="status" :value="__('Hình ảnh')"/>
                                <div class="relative mt-1 flex w-full items-center justify-center">
                                    <img id="image-preview" src="" alt="Hình ảnh"
                                         class="absolute hidden h-64 w-full overflow-hidden rounded-lg object-cover bg-white">
                                    <label for="dropzone-file"
                                           class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                            <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400"
                                                 aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Bấm để tải lên</span></p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX.
                                                2048mb)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="product[thumb]"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label for="description">Mô tả:</label>
                    <textarea name="product[description]" id="editor"></textarea>
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <x-primary-button class="ms-3" type="submit">
                        {{ __('Thêm sản phẩm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
            $(document).ready(function () {
                $('#name').on('keyup', function () {
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
                $('.attribute-checkbox').change(function () {
                    updateSelectedOptions();
                });

                function updateSelectedOptions() {
                    var selectedOptions = [];

                    if (Array.isArray(selectedOptions)) {
                        $('.attribute-checkbox:checked').each(function () {
                            var attribute = $(this).data('attribute');
                            var option = $(this).data('option');
                            selectedOptions.push({ attribute: attribute, option: option });
                        });

                        displaySelectedOptions(selectedOptions);
                    } else {

                    }
                }



                function displaySelectedOptions(selectedOptions) {
                    $('#result').empty();
                    if (selectedOptions.length >= 2) {
                        for (var i = 0; i < selectedOptions.length - 1; i++) {
                            for (var j = i + 1; j < selectedOptions.length; j++) {
                                if (selectedOptions[i].attribute !== selectedOptions[j].attribute) {
                                    var inputGroup = $('<div class="mt-3"></div>');
                                    inputGroup.append('<p>' + selectedOptions[i].option + ' và ' + selectedOptions[j].option + '</p>');

                                    inputGroup.append('<div class="grid grid-cols-3 gap-4">' +
                                        '<div>' +
                                        '<label for="code[]"></label>' +
                                        '<input type="text" class="border-gray-300 focus:border-indigo-500 ' +
                                        'focus:ring-indigo-500 rounded-md shadow-sm w-full" name="sku[code][]" ' +
                                        'placeholder="Mã' +
                                        ' ' +
                                        'code">' +
                                        '</div>' +
                                        '<div>' +
                                        '<label for="quantity[]"></label>' +
                                        '<input type="text" class="border-gray-300 focus:border-indigo-500 ' +
                                        'focus:ring-indigo-500 rounded-md shadow-sm w-full" ' +
                                        'name="sku[quantity][]" ' +
                                        'placeholder="Số lượng">' +
                                        '</div>' +
                                        '<div>' +
                                        '<label for="price[]"></label>' +
                                        '<input type="text" class="border-gray-300 focus:border-indigo-500 ' +
                                        'focus:ring-indigo-500 rounded-md shadow-sm w-full" name="sku[price][]" ' +
                                        'placeholder="Giá">' +
                                        '</div>' +
                                        '<div>' +
                                        '</div>');

                                    $('#result').append(inputGroup);
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
