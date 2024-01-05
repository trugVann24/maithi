<x-app-layout>
    <div class=" sm:px-6 lg:px-8">
        <div class="bg-white rounded-md p-4">
            <x-breadcrumbs :breadcrumbs="[
                ['title' => 'Danh sách nhân viên', 'url' => route('admin.users.index')],
                ['title' => 'Cập nhật nhân viên', 'url' => route('admin.users.create')],
            ]" />
            <div class="py-2">
                <h3 class="text-base font-medium">
                    Cập nhật nhân viên
                </h3>
                <p class="text-xs font-medium text-gray-600">Bạn có thể cập nhật vai trò, quyền truy cập của các nhân viên.</p>
            </div>
        </div>
        <div class="">
            <div class="mt-2 bg-white rounded-md p-4">
                <div class="text-sm">
                    <span class="my-2 block">Tên tài khoản: {{ $user->name }}</span>
                    <span class="my-2 block">Email: {{ $user->email }}</span>
                </div>
            </div>
            <div class="">
                <div class="mt-2 bg-white rounded-md p-4">
                    <h3 class="mb-2 text-base font-medium">Vai trò </h3>
                    <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                            @foreach ($roles as $role)
                                <div class="flex items-center">
                                    <input type="checkbox" name="roles[]" id="role_{{ $role->id }}"
                                           value="{{ $role->id }}"
                                           class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-blue-500"
                                        {{ $user->roles->contains($role) ? 'checked' : '' }}>
                                    <label for="role_{{ $role->id }}"
                                           class="ml-2 text-sm text-gray-600">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Cập nhật vai trò') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-2 bg-white rounded-md p-4">
                <div class="">
                    <h3 class="mb-2 text-base font-medium">Quyền truy cập</h3>
                </div>
                <div class="mt-2 rounded-md ">
                    <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                            @foreach ($permissions as $permission)
                                <div class="flex items-center">
                                    <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                                           value="{{ $permission->id }}"
                                           class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-blue-500"
                                        {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                                    <label for="permission_{{ $permission->id }}"
                                           class="ml-2 text-sm text-gray-600">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Cập nhật quyền truy cập') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
