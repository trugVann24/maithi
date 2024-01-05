<x-app-layout>
    <div class="sm:px-6 lg:px-8">
        <div class="rounded-md bg-white p-4">
            <div class="flex items-center justify-between py-2">
                <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Danh sách nhân viên', 'url' => route('admin.users.index')],
                    ['title' => 'Thêm nhân viên', 'url' => route('admin.users.create')],
                ]" />
                <div class="">
                    <p class="text-xs font-medium text-gray-600">Bên dưới đây là chức năng thêm danh mục </p>
                    <p class="text-xs font-medium text-gray-600"><span class="text-red-500">(*)</span> bắt buộc phải nhập
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-2 rounded-md bg-white p-4">
            <div class="mx-auto max-w-xl rounded-md border p-4">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div>
                        <x-input-label-required for="name" :value="__('Tên nhân viên')" />
                        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                      :value="old('name')" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label-required for="email" :value="__('Email')" />
                        <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                                      :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label-required for="password" :value="__('Mật khẩu')" />

                        <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                                      autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label-required for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

                        <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                      name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">

                        <x-primary-button class="ms-4">
                            {{ __('Đăng ký') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
