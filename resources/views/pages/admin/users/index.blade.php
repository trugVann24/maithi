<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Tài khoản nhân viên', 'url' => route('admin.users.index')],
                    ['title' => 'Danh sách', 'url' => route('admin.users.index')],
                ]"/>
            <div class="sm:flex sm:items-center sm:justify-between">

                <h2 class="text-lg font-medium text-gray-800 ">Danh sách tài khoản nhân viên</h2>

                <div class="flex items-center justify-center mt-4 gap-x-3">
                    <form action="{{ route('admin.users.search') }}" method="GET">
                        <div class="relative flex items-center mt-4 md:mt-0">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                            </svg>
                        </span>
                            <input id="query" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border
                            border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5
                            focus:border-blue-400  focus:ring-blue-300 focus:outline-none focus:ring
                            focus:ring-opacity-40" type="text" name="query" placeholder="{{__('Tìm kiếm')}}"/>
                        </div>
                    </form>
                    <a href="{{route('admin.users.create')}}" class="flex items-center justify-center w-1/2 px-5
                    py-2
                    text-sm
                    tracking-wide
                    text-white
                    transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600
                    border-blue-500 border">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
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

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 ">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        <div class="flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 border-gray-300 rounded "/>
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Tên nhân viên
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Vai trò
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Thao tác
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 ">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <input type="checkbox" class="text-blue-500 border-gray-300 rounded "/>
                                                <div>
                                                    <p class="font-normal text-gray-800">{{__($user->id)}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{__($user->name)}}
                                        </td>
                                        <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{__($user->email)}}
                                        </td>
                                        <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            @foreach ($user->roles as $role)
                                                @if ($role->id === 1)
                                                    <span
                                                        class="ml-1 rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-600">{{ $role->name }}</span>
                                                @elseif ($role->id === 2)
                                                    <span
                                                        class="ml-1 rounded-full bg-sky-50 px-2 py-1 text-xs font-medium text-sky-600">{{ $role->name }}</span>
                                                @elseif ($role->id === 3)
                                                    <span
                                                        class="ml-1 rounded-full bg-pink-50 px-2 py-1 text-xs font-medium text-pink-600">{{ $role->name }}</span>
                                                @else
                                                    <span
                                                        class="ml-1 rounded-full bg-orange-50 px-2 py-1 text-xs font-medium text-orange-600">{{ $role->name }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <div class="w-9 h-9 rounded-full hover:bg-blue-50 flex items-center
                                            justify-center hover:text-blue-600">
                                                    <a href="{{route('admin.users.show', $user->id)
                                                        }}" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24
                                                    24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                      class="deleteForm" data-user-id="{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" data-open-modal="deleteUser"
                                                            data-user-id="{{ $user->id }}" class="w-9 h-9 rounded-full hover:bg-red-50 flex items-center
                                                justify-center hover:text-red-600 ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor"
                                                             class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal name="deleteUser" maxWidth="lg">
        <div class="p-4">
            <h2 class="py-2 text-base font-semibold uppercase">Xác nhận xoá !</h2>
            <p class="text-sm font-medium">Bạn có chắc chắn muốn xoá nhân viên này không?</p>
            <div class="mt-4 flex justify-end">
                <button
                    class="mr-2 rounded bg-gray-200 px-4 py-2 text-sm font-medium text-black"data-close-modal="deleteUser">Hủy</button>
                <button class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white"
                        id="confirmDelete">Xoá</button>
            </div>
        </div>
    </x-modal>

    @push('script')
        <script>
            $(document).ready(function() {
                $('[data-open-modal]').click(function() {
                    var modalName = $(this).data('open-modal');
                    var userId = $(this).data('user-id');
                    $('#modal-' + modalName).show().attr('data-user-id', userId);
                });
                $('[data-close-modal]').click(function() {
                    var modalName = $(this).data('close-modal');
                    $('#modal-' + modalName).hide();
                });
                $('#confirmDelete').click(function() {
                    var modal = $('#modal-deleteUser');
                    var userId = modal.data('user-id');
                    $('.deleteForm[data-user-id="' + userId + '"]').submit();
                });
            });
        </script>
    @endpush
</x-app-layout>
