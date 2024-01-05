<x-master-layout>
    <!--Slider start-->
    <div id="controls-carousel" class="relative w-full">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach($banners as $banner)
                <div class="images duration-700 ease-in-out transition-all">
                    <img
                        src="{{asset('image/banners/'.$banner->image)}}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="{{$banner->title}}">
                </div>
            @endforeach
        </div>
        <button id="prev"
                type="button"
                class="absolute top-0 start-0 z-[16] flex items-center justify-center h-full px-4 cursor-pointer group
                focus:outline-none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30
        group-hover:bg-white/50 group-focus:ring-2 group-focus:ring-white group-focus:outline-none">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>

            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button id="next"
                type="button"
                class="absolute top-0 end-0 z-[16] flex items-center justify-center h-full px-4 cursor-pointer group
                focus:outline-none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30
        group-hover:bg-white/50 group-focus:ring-2 group-focus:ring-white group-focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>
    <!--Slider end-->


    <div class="max-w-7xl mx-auto ">
        <!--Brands start-->
        <div class="py-4">
            <div class="text-center mt-4">
                <h3 class="text-2xl text-gray-800 uppercase">Mua theo thương hiệu</h3>
                <span class="text-gray-700">Click vào một thương hiệu và thỏa sức mua sắm</span>
            </div>
            <div class="grid grid-cols-6 gap-4 mt-4">
                @foreach($brands as $brand)
                    <a href="" class="p-2 border rounded-lg flex items-center justify-center">
                        <div class="h-36 w-36 overflow-hidden">
                            <img src="{{asset('image/brands/'. $brand->image)}}" alt="" class="w-full h-full object-cover">
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="" class="flex justify-end text-sm font-normal text-primary pb-2">+ Xem tất cả</a>
            <hr>
        </div>
        <!--Brands end-->

        <!--Products start-->
        <div class="py-4">
            <div class="text-center">
                <h3 class="text-2xl text-gray-800 uppercase">Sản phẩm</h3>
            </div>
            <div class="grid grid-cols-6 gap-4 mt-4">
                @foreach($products as $product)
                    <a href="{{route('product-detail', ['slug' => $product->slug])}}" class="p-2 border w-full h-max rounded-md
                    border-primary/40
                    hover:border-primary">
                       <div class="w-full h-52 overflow-hidden">
                           <img src="{{asset('image/products/'. $product->thumb)}}" alt="" class="w-full h-full
                           object-cover">
                       </div>
                        <p class="text-base text-gray-700 py-2">{{$product->name}}</p>
                        <div class="flex items-center justify-between">
                            <p class="font-semibold text-blue-800 mt-1 border-r px-2">{{ number_format
                            ($product->price_default)}}
                                VNĐ</p>
                            <button class="p-2 rounded-md bg-white hover:bg-primary/10 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1
                            .5" stroke="currentColor" class="w-5 h-5 text-primary ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="" class="flex justify-end text-sm font-normal text-primary pb-2">+ Xem tất cả</a>
            <hr>
        </div>
        <!--Products end-->

        <!--Category start-->
        <div class="py-4">
            <div class="text-center">
                <h3 class="text-2xl text-gray-800 uppercase">Danh mục sản phẩm</h3>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach($categories as $category)
                    <a href="" class="p-2 border rounded-lg flex items-center justify-center border-primary/40
                    hover:border-primary">
                        <div class="h-36 w-full overflow-hidden flex flex-col items-center justify-center text-primary">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                                </svg>

                            </div>
                            <span class="mt-3 text-lg">{{$category->name}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="" class="flex justify-end text-sm font-normal text-primary pb-2">+ Xem tất cả</a>
            <hr>
        </div>
        <!--Category end-->
    </div>



    <!--Script start-->
    @push('script')
        <script>
            $(document).ready(function () {
                var totalImages = $('.images').length;
                var currentIndex = 0;
                var intervalTime = 3000;

                showImage(currentIndex);

                $('#prev').click(function () {
                    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                    showImage(currentIndex);
                    resetInterval();
                });

                $('#next').click(function () {
                    currentIndex = (currentIndex + 1) % totalImages;
                    showImage(currentIndex);
                    resetInterval();
                });

                function showImage(index) {
                    $('.images').hide();
                    $('.images:eq(' + index + ')').show();
                }
                function resetInterval() {
                    clearInterval(interval);
                    interval = setInterval(function () {
                        currentIndex = (currentIndex + 1) % totalImages;
                        showImage(currentIndex);
                    }, intervalTime);
                }

                var interval = setInterval(function () {
                    currentIndex = (currentIndex + 1) % totalImages;
                    showImage(currentIndex);
                }, intervalTime);
            });
        </script>
    @endpush
</x-master-layout>
