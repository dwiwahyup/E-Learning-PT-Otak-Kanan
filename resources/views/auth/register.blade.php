@extends('login_register.template')
@section('content')

<div id="login">
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">
                    {{ __('Name') }}
                </label>

                <input id="name" name="name" value="{{old('name')}}" required autofocus class="form-control" type="text">
                <i class="ti-user"></i>
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">
                    {{ __('Email') }}
                </label>

                <input class="form-control" name="email" type="email" id="email" value="{{old('Email')}}" required>
                <i class="icon_mail_alt"></i>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">
                    {{ __('Password') }}
                </label>

                <input class="form-control" name="password" type="password" id="password" required autocomplete="new-password">
                <i class="icon_lock_alt"></i>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">
                    {{ __('Confirm Password') }}
                </label>

                <input name="password_confirmation" class="form-control" type="password" id="password_confirmation" required>
                <i class="icon_lock_alt"></i>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <button type="submit" class="btn_1 rounded full-width add_top_30">
                    {{ __('Register') }}
                </button>
            </div>

            <div id="pass-info" class="clearfix"></div>

            <div class="text-center add_top_10">Already have an acccount? <strong><a href="{{ route('login') }}">Sign In</a></strong></div>
        </form>
        <div class="copy">© 2018 Panagea</div>
    </aside>
</div>
@endsection


{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
