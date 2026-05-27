<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Welcome back</h1>
        <p class="text-sm text-gray-500 mb-6">Sign in to your Denny Express account</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com"
                       class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-2 focus:ring-primary/20 hover:border-gray-400 transition-all">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••"
                       class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-2 focus:ring-primary/20 hover:border-gray-400 transition-all">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary focus:ring-primary">
                    <span class="text-sm text-gray-600">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-primary hover:text-primary-dark font-semibold">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary w-full">Sign In</button>

            @if (Route::has('register'))
                <p class="text-sm text-gray-500 text-center">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary hover:text-primary-dark font-bold">Register</a>
                </p>
            @endif
        </form>
    </div>
</x-layouts.guest>