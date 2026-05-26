<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Welcome back</h1>
        <p class="text-sm text-medium-gray mb-6">Sign in to your Denny Express account</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-dark-charcoal mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="input-field" placeholder="your@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-dark-charcoal mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-border-gray text-primary-blue focus:ring-accent-blue">
                    <span class="text-sm text-medium-gray">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-primary-blue hover:text-accent-blue">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary w-full">Sign In</button>

            @if (Route::has('register'))
                <p class="text-sm text-medium-gray text-center">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary-blue hover:text-accent-blue font-medium">Register</a>
                </p>
            @endif
        </form>
    </div>
</x-layouts.guest>
