<x-master-layout>
    <div class="max-w-7xl mx-auto">
        <x-breadcrumbs :breadcrumbs="[
                    ['title' => 'Trang chủ', 'url' => route('index-home')],
                    ['title' => $product->name, 'url' => route('admin.products.create')],
                ]"/>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-full h-[300px] border rounded-md overflow-hidden shadow-md">
                <img src="{{asset('image/products/'.$product->thumb)}}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="w-full h-max border rounded-md overflow-hidden shadow-md p-5">
                <span class="text-lg">
                    {{$product->name}}
                </span>
                <p class="py-2">
                    Mã sản phẩm:
                    <span>{{$product->name}}</span>
                </p>
                <div class="w-full px-4 py-4 rounded-md bg-primary/10">
                    <span class="font-semibold text-gray-900">
                        125000 VNĐ
                    </span>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                        </svg>
                    </div>
                    <span class="text-sm"> Thời gian dự kiến quý khách nhận được hàng vào khoảng ngày 2-3 ngày. </span>
                </div>
            </div>
            <div class="w-full h-max border rounded-md overflow-hidden shadow-md p-5">
                <p class="text-lg text-center py-2 border-b">
                    Sản phẩm của hãng
                </p>
                <img src="" alt="">
            </div>
        </div>
        <div class="mt-10">
            <h3 class="text-xl font-normal uppercase text-gray-600">
                Chi tiết sản phẩm
            </h3>
            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-2">
                    <div class="flex items-center gap-6 ">
                        <p class="text-gray-400">
                            Danh mục
                        </p>
                        <span class="bg-primary/10 mt-2 px-4">
                             <x-breadcrumbs :breadcrumbs="
                             [
                                ['title' => 'Trang chủ', 'url' => route('index-home')],
                                ['title' => $product->name, 'url' => route('admin.products.create')],
                            ]"/>
                        </span>
                    </div>
                    <div class="flex items-center gap-6 mt-4">
                        <p class="text-gray-400">
                            Thương hiệu
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-master-layout>
