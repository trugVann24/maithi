<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Sản phẩm', 'url' => route('admin.products.index')],
                    ['title' => 'Thuộc tính', 'url' => route('admin.attributes.index')],
                    ['title' => 'Danh sách', 'url' => route('admin.attributes.index')],
                    ['title' => 'Thêm mới', 'url' => route('admin.attributes.create')],
                ]"/>
            <div>
                <div class="mx-auto mt-10 max-w-xl rounded-md border p-4">
                    <form id="attributeForm">
                        <div>
                            <x-input-label-required for="name" :value="__('Tên thuộc tính')"/>
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                          :value="old('name')" value="{{__($attributes->name)}}"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div id="optionsContainer" class="mt-3">
                            <div class="option relative">
                                <x-input-label-required for="value" :value="__('Tuỳ chọn thuộc tính')"/>
                                @foreach($attributes->attributeOptions as $index => $option)
                                    <x-text-input id="value_{{ $index }}" class="mt-1 block w-full" type="text" name="value[]"
                                                  :value="old('value', $option->value)"/>
                                <button type="button" class="removeOption absolute text-red-600 top-7
                                right-2 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                    </svg>
                                </button>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="button" id="addOption" class="mt-3 flex items-center justify-center w-1/2
                            px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-emerald-500
                            rounded-lg sm:w-auto gap-x-2 hover:bg-emerald-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                </svg>
                                <span>Thêm mới</span>
                            </button>
                            <button type="submit" class="mt-3 flex items-center justify-center w-1/2 px-5
                            py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg
                            sm:w-auto gap-x-2 hover:bg-blue-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0
                            24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25"/>
                                </svg>
                                <span>Lưu lại</span>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function () {
                $("#addOption").click(function () {
                    var optionHtml = '<div class="option relative mt-3">' +
                        '<label for="value" class="block font-medium text-sm text-gray-700">Tuỳ chọn thuộc ' +
                        'tính</label>' +
                        '<input type="text" class="optionValue w-full mt-1 border-gray-300 focus:border-indigo-500 ' +
                        'focus:ring-indigo-500 rounded-md shadow-sm" name="value[]" required>' +
                        '<button type="button" class="removeOption absolute text-red-600 top-7 right-2 p-2">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>' +
                        '</svg>' +
                        '</button>' +
                        '</div>';
                    $("#optionsContainer").append(optionHtml);
                });

                $("#optionsContainer").on("click", ".removeOption", function () {
                    $(this).closest(".option").remove();
                });

                $("#attributeForm").submit(function (e) {
                    e.preventDefault();
                    var attributeName = $("#name").val();
                    var optionValues = $("input[name^='value']").map(function () {
                        return $(this).val();
                    }).get();
                    $.ajax({
                        url: "{{ route('admin.attributes.update', ['attribute' => $attributes->id]) }}",
                        type: 'PUT',
                        data: {
                            name: attributeName,
                            value: optionValues
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response.success) {
                                window.location.href = "{{ route('admin.attributes.index') }}";
                            }
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
