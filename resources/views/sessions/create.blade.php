<x-layout-no-nav>
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
            <p class="mt-2 text-center text-sm text-gray-600"></p>
        </div>
        <form class="mt-8 space-y-6" action="/login" method="POST">
            @csrf
            {{--            <input type="hidden" name="remember" value="true">--}}
            <div class="-space-y-px rounded-md shadow-sm">
{{--                <div>--}}
{{--                    <label for="name" class="sr-only">Name</label>--}}
{{--                    <input id="name" name="name" type="text"--}}
{{--                           class="p-2 relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
{{--                           placeholder="Nickname"--}}
{{--                           value="{{ old('name') }}">--}}
{{--                    @error('name')--}}
{{--                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
                <div>
                    <label for="email-address" class="sr-only">Username / Email</label>
                    <input id="email" name="email" type="email"
                           class="p-2 relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Email address"
                           value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password"
                           class="p-2 relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Password">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{--            <div class="flex items-center justify-between">--}}
            {{--                <div class="flex items-center">--}}
            {{--                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">--}}
            {{--                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>--}}
            {{--                </div>--}}

            {{--                <div class="text-sm">--}}
            {{--                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div>
                <button type="submit"
                        class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

</x-layout-no-nav>
