<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 bg-white shadow sm:rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Vai trò', 'url' => route('admin.roles.index')],
                    ['title' => 'Danh sách', 'url' => route('admin.roles.index')],
                    ['title' => 'Thêm mới', 'url' => route('admin.roles.create')],
                ]" />
            <div class="mx-auto mt-10 max-w-xl rounded-md border p-4">
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div>
                        <x-input-label-required for="name" :value="__('Tên vai trò')" />
                        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                      :value="old('name')" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <x-primary-button class="ms-3">
                            {{ __('Thêm vai trò') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-app-layout>
