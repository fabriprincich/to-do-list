<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700 hover:bg-slate-50 text-slate-500
        }
        .link {
            @apply text-gray-700 font-medium underline decoration-gray-500 hover:text-blue-900
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-xs
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg bg-gray-100">
    @yield('navigation')
    <h1 class="text-2xl mb-5">@yield('title')</h1>
    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong class="font-bold">Success</strong>
                <div>{{ session('success') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
