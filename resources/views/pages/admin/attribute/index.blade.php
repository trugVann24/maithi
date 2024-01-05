<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                ['title' => 'Sản phẩm', 'url' => route('admin.products.index')],
                ['title' => 'Thuộc tính', 'url' => route('admin.attributes.index')],
                ['title' => 'Danh sách', 'url' => route('admin.attributes.index')],
            ]"/>
            <div class="sm:flex sm:items-center sm:justify-between">
                <h2 class="text-lg font-medium text-gray-800 ">Danh sách thuộc tính</h2>
                <div class="flex items-center mt-4 gap-x-3">
                    <a href="{{ route('admin.attributes.create') }}"
                       class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white
                       transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600 ">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_3098_154395)">
                                <path
                                    d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832"
                                    stroke="currentColor" stroke-width="1.67" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3098_154395">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <span>Thêm mới</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                @foreach ($attributes as $attribute)
                    <div class="border p-3 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="font-medium ">Tên thuộc tính:
                                    <span class="font-normal">{{ $attribute->name }}</span>
                                </span>
                            </div>
                            <div class="flex items-center">
                                <a href="{{route('admin.attributes.edit', $attribute->id)}}" class="px-2 text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                    </svg>
                                </a>
                                <div>
                                    <form action="{{ route('admin.attributes.destroy', $attribute->id) }}"
                                          method="POST"
                                          class="deleteForm" data-attribute-id="{{ $attribute->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-open-modal="deleteAttribute"
                                                data-attribute-id="{{ $attribute->id }}" class="px-2 text-red-500
                                                hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div>
                                @foreach ($attribute->attributeOptions as $options)
                                    <span class="border p-2 rounded-md mr-1">{{ $options->value }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <x-modal name="deleteAttribute" maxWidth="lg">
        <div class="p-4">
            <h2 class="py-2 text-base font-semibold uppercase">Xác nhận xoá !</h2>
            <p class="text-sm font-medium">Bạn có chắc chắn muốn xoá thuộc tính và lựa chọn này không?</p>
            <div class="mt-4 flex justify-end">
                <button class="mr-2 rounded bg-gray-200 px-4 py-2 text-sm font-medium text-black"
                        data-close-modal="deleteAttribute">Hủy
                </button>
                <button class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white"
                        id="confirmDelete">Xoá
                </button>
            </div>
        </div>
    </x-modal>

    @push('script')
        <script>
            $(document).ready(function () {
                $('[data-open-modal]').click(function () {
                    var modalName = $(this).data('open-modal');
                    var attributeId = $(this).data('attribute-id');
                    $('#modal-' + modalName).show().attr('data-attribute-id', attributeId);
                });
                $('[data-close-modal]').click(function () {
                    var modalName = $(this).data('close-modal');
                    $('#modal-' + modalName).hide();
                });
                $('#confirmDelete').click(function () {
                    var modal = $('#modal-deleteAttribute');
                    var attributeId = modal.data('attribute-id');
                    $('.deleteForm[data-attribute-id="' + attributeId + '"]').submit();
                });
            });
        </script>
    @endpush
</x-app-layout>
