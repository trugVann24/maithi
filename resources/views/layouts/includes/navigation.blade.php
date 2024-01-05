<div class="bg-primary text-white transition-all duration-300 ease-linear">
    <div class="py-2 max-w-7xl mx-auto flex items-center justify-between">
        <div class="">
            <span class="text-base mr-2 font-semibold">
                Hỗ trợ:
                <span class="font-normal">
                    0374407152
                </span>
            </span>
            <span class="text-base font-semibold">
                Email:
                <span class="font-normal">
                    trugvann.24@gmail.com
                </span>
            </span>
        </div>
        <div>
            <a href="">
                Đăng nhập/Đăng ký
            </a>
        </div>
    </div>
</div>
<div class="bg-white top-0 left-0 right-0 z-[22] " id="menu">
    <div class="max-w-7xl mx-auto py-3 flex items-center justify-between md:block">
        <div class="flex items-center justify-between">
            <div>
                <a href="#">
                    <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                </a>
            </div>

            <div class="hidden mx-10 md:block ">
                <div class="flex items-center relative">
                    <div class="bg-gray-100 text-primary font-medium px-2 h-12
                                    rounded-l-md " id="toggleSub">
                        <button class="uppercase mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                    </div>
                    <form action="" method="get">
                        <div class="flex items-center">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <input type="text"
                                    class="w-full  pl-10 pr-4 text-gray-700 bg-gray-100
                                       border-none h-12 focus:outline-none focus:ring-0"
                                    placeholder="{{ __('Tìm kiếm ...') }} ">
                            </div>
                            <div
                                class="bg-gray-100 text-primary font-medium px-2 py-3
                                    rounded-r-md h-12">
                                <button class="uppercase text-sm ">Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="bg-white w-64 border absolute hidden z-[20]" id="submenu">
                    @php
                        $categories = App\Models\Category::with('products')->get();
                     @endphp

                    @foreach($categories as $item)
                        <li class="px-4 py-2 border-b group hover:text-primary">
                            <a href="" class="flex items-center justify-between">
                                {{$item->name}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1
                            .5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                            <ul class="hidden absolute bg-white border left-64 top-0 w-64 group-hover:block">
                            @foreach($item->products as $product)
                                    <li class="px-4 py-2 hover:bg-gray-50">
                                        <a href="{{route('product-detail', ['slug' => $product->slug])}}" class="block">
                                            {{$product->name}}
                                        </a>
                                    </li>
                            @endforeach
                            </ul>
                        </li>
                    @endforeach

                </ul>
            </div>
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->

            <div id="mobileMenu"
                class="hidden absolute inset-x-0 z-20 w-full px-6 py-2 transition-all duration-300 ease-in-out bg-white top-10 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:flex md:items-center">
                <div class="flex flex-col md:flex-row md:mx-1">
                    <a class="my-2 leading-5 text-gray-700 transition-colors duration-300 transform hover:text-primary md:mx-4 md:my-0 flex items-center text-base"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                        Liên hệ
                    </a>
                    <a class="my-2 leading-5 text-gray-700 transition-colors duration-300 transform hover:text-primary md:mx-4 md:my-0 flex items-center text-base"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                        </svg>
                        Tin tức
                    </a>
                    <a class="my-2 leading-5 text-gray-700 transition-colors duration-300 transform hover:text-primary md:mx-4 md:my-0 flex items-center text-base"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Giỏ hàng
                    </a>
                </div>
            </div>

        </div>
        <div class="flex lg:hidden">
            <button id="mobileMenuButton" type="button"
                class="text-gray-500hover:text-gray-600
            focus:outline-none focus:text-gray-600 "
                aria-label="toggle menu">
                <svg id="menuIconClosed" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 sm:hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>

                <svg id="menuIconOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Mobile menu toggle
        $("#mobileMenuButton").click(function() {
            $("#mobileMenu").toggle();
            $("#menuIconClosed").toggle();
            $("#menuIconOpen").toggle();
        });
        function toggleSubMenu() {
            $('#submenu').toggleClass('hidden');
        }

        $('#toggleSub').on('click', toggleSubMenu);

        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > 0) {
                $("#menu").addClass("fixed");
            } else {
                $("#menu").removeClass("fixed");
            }
        });
    });
</script>
