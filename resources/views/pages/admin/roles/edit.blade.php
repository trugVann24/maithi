<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Vai trò', 'url' => route('admin.roles.index')],
                    ['title' => 'Danh sách', 'url' => route('admin.roles.index')],
                    ['title' => 'Thêm mới', 'url' => route('admin.roles.create')],
                ]"/>
            <div class="mx-auto mt-10 max-w-xl rounded-md border p-4">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @method('PUT')
                    @csrf
                    <div>
                        <x-input-label-required for="name" :value="__('Tên vai trò')"/>
                        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                      value="{{ $role->name }}" autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <x-primary-button class="ms-3">
                            {{ __('Sửa vai trò') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="p-4 bg-white shadow sm:rounded-lg">
            <h3 class="text-base font-medium mb-2">Quyền truy cập</h3>
            <div class="">
                @if ($role->permissions)
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                        @foreach ($role->permissions as $role_permission)
                            <span class="px-1 py-2 text-sm text-gray-600">{{ $role_permission->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                    @foreach ($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                                   value="{{ $permission->id }}"
                                   class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-blue-500"
                                {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
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

</x-app-layout>
