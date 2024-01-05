<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Quyền truy cập', 'url' => route('admin.permissions.index')],
                    ['title' => 'Danh sách', 'url' => route('admin.permissions.index')],
                    ['title' => 'Thêm mới', 'url' => route('admin.permissions.create')],
                ]" />
            <div class="mx-auto mt-10 max-w-xl rounded-md border p-4">
                <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                    @method('PUT')
                    @csrf
                    <div>
                        <x-input-label-required for="name" :value="__('Tên quyền')" />
                        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                      value="{{ $permission->name }}" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <x-primary-button class="ms-3">
                            {{ __('Sửa quyền') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2 rounded-md bg-white p-4">
            <div class="p-4">
                <h3 class="text-base font-semibold">Vai trò </h3>
                <div class="">
                    @if ($permission->roles)
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                            @foreach ($permission->roles as $permission_role)
                                <p class="px-1 py-2 text-sm font-medium text-gray-700">{{ $permission_role->name }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="px-4">
                <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
                        @foreach ($roles as $role)
                            <div class="flex items-center">
                                <input type="checkbox" name="roles[]" id="role_{{ $role->id }}"
                                       value="{{ $role->id }}"
                                       class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-blue-500"
                                    {{ $permission->roles->contains($role) ? 'checked' : '' }}>
                                <label for="role_{{ $role->id }}"
                                       class="ml-2 text-sm text-gray-800">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <x-primary-button class="mt-4">
                        {{ __('Cập nhật role') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
