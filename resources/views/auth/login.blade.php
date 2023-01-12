@extends('login_register/template')

@section('content')

<div id="login" class="fixed-top">
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>

    <aside>
        <figure>
            <a href="index.html"><img src="{{url('assets/dashboard/img/otakkanan.png')}}" width="155" height="36" data-retina="true" alt="" class="logo_sticky"></a>
        </figure>
        @if ($errors->any())
        <div class="mb-4">
            <div class="font-medium text-red-600">
                {{ __('Whoops! Something went wrong.') }}
            </div>
        
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- <div class="access_social">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
                <a href="#0" class="social_bt linkedin">Login with Linkedin</a>
            </div>
            <div class="divider"><span>Or</span></div> --}}

            <div class="form-group">
                <label for="Email">
                    {{__('Email')}}
                </label>
                <input  class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus>
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label for="password" class="block font-medium text-sm text-gray-700">
                    {{ __('Password') }}
                </label>
                <input class="form-control" id="password"  type="password" name="password" required autocomplete="current-password">
                <i class="icon_lock_alt"></i>
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <button type="submit" class="btn_1 rounded full-width">
                    {{ __('Log in') }}
                </button>
            </div>

            <div class="text-center add_top_10">Don't have an account? <strong><a href="{{ route('register') }}">Sign up!</a></strong></div>
        </form>
        <div class="copy">© 2018 Panagea</div>
    </aside>
</div>

@endsection


{{-- 
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
