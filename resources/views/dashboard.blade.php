<x-layout>
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <svg
                class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
                viewBox="0 0 1155 678">
                <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
                      d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"/>
                <defs>
                    <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177"
                                    y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9089FC"/>
                        <stop offset="1" stop-color="#FF80B5"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">

                @guest()
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Welcome!</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">請登入享用所有服務</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="/login"
                           class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</a>
                        <a href="/register" class="text-sm font-semibold leading-6 text-gray-900">Sign up<span
                                aria-hidden="true">→</span></a>
                    </div>
                @endguest
                @if(auth()->check())
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Welcome!</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">參賽者資訊</p>
                    <p class="mt-6 text-lg leading-8 text-black-600">{{ auth()->user()->name }}</p>
                    <p class="mt-6 text-lg leading-8 text-black-600">{{ auth()->user()->email}}</p>
                    {{--                <div class="mt-10 flex items-center justify-center gap-x-6">--}}
                    {{--                    <a href="#"--}}
                    {{--                       class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">開始旅程</a>--}}
                    {{--                </div>--}}
            </div>
        </div>
    </div>
</x-layout>
@endauth
