@extends('template.auth')
@section('title', 'Login')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-auto w-50" src="{{ asset('assets/images/logo.png') }}" alt="Logo">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Login Membership</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ url('/login/verify') }}" method="POST" class="space-y-6">
                @csrf
                <div>

                    <!-- LOGIN -->
                    <label for="login" class="block text-sm/6 font-medium text-gray-100">Email / Username</label>
                    <div class="mt-2">
                        <input id="login" type="text" name="login" required
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-red-500 sm:text-sm/6" />
                    </div>
                </div>

                <div x-data="{ showPassword: false }">

                    <!-- PASSWORD -->
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                        <div class="text-sm">
                            <a href="{{ url('/reset-password') }}" class="font-semibold text-red-400 hover:text-red-300">
                                Lupa password?
                            </a>
                        </div>
                    </div>
                    <div class="mt-2 relative">
                        <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 pr-10 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-red-500 sm:text-sm/6" />
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-200 transition-colors">
                            <span x-show="!showPassword">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M2.99902 3L20.999 21M9.8433 9.91364C9.32066 10.4536 8.99902 11.1892 8.99902 12C8.99902 13.6569 10.3422 15 11.999 15C12.8215 15 13.5667 14.669 14.1086 14.133M6.49902 6.64715C4.59972 7.90034 3.15305 9.78394 2.45703 12C3.73128 16.0571 7.52159 19 11.9992 19C13.9881 19 15.8414 18.4194 17.3988 17.4184M10.999 5.04939C11.328 5.01673 11.6617 5 11.9992 5C16.4769 5 20.2672 7.94291 21.5414 12C21.2607 12.894 20.8577 13.7338 20.3522 14.5"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <span x-show="showPassword">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path
                                            d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg></span>
                        </button>
                    </div>
                </div>

                <div class="inline-flex items-center">

                    <!-- COOKIE -->
                    <label class="flex items-center cursor-pointer relative" for="check-2">
                        <input type="checkbox" name="remember" value="1"
                            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                            id="check-2" />
                        <span
                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </label>
                    <label class="cursor-pointer ml-2 text-white text-sm" for="check-2">
                        Ingat Saya
                    </label>
                </div>

                <div>

                    <!-- BUTTON LOGIN -->
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white hover:bg-green-400">
                        Login
                    </button>
                
                    <!-- Pemisah -->
                    <div class="my-4 flex items-center">
                        <div class="flex-1 border-t border-gray-600"></div>
                        <span class="mx-3 text-gray-400 text-sm">ATAU</span>
                        <div class="flex-1 border-t border-gray-600"></div>
                    </div>
                
                    <!-- Login Google -->
                    <a href="{{ route('google.login') }}"
                        class="flex w-full items-center justify-center gap-3 rounded-md border border-gray-500 bg-white px-3 py-2 text-sm font-semibold text-gray-800 hover:bg-gray-100">
                
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                            class="h-5 w-5">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303C33.651,32.657,29.193,36,24,36c-6.627,0-12-5.373-12-12
                                s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.27,4,24,4
                                C12.955,4,4,12.955,4,24s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12
                                c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.27,4,24,4
                                C16.318,4,9.656,8.337,6.306,14.691z"/>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238
                                C29.211,35.091,26.715,36,24,36c-5.173,0-9.625-3.328-11.283-7.946
                                l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303
                                c-0.792,2.237-2.231,4.166-4.094,5.571l0.003-0.002l6.19,5.238
                                C36.971,39.205,44,34,44,24
                                C44,22.659,43.862,21.35,43.611,20.083z"/>
                        </svg>
                
                        <span>Masuk dengan Google</span>
                    </a>
                
                </div>
            </form>

            <!-- REGISTER -->
            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Belum punya akun?
                <a href="{{ url('/register') }}" class="font-semibold text-red-400 hover:text-red-300">Daftar Sekarang</a>
                <br>
                Kesulitan login? <a href="{{ url('/support-center') }}"
                    class="font-semibold text-red-400 hover:text-red-300">Hubungi Kami</a>
            </p>
        </div>
    </div>
@endsection
