<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Forgot Password</h1>
        <p class="text-sm text-gray-500 mb-6">Enter your email and we'll send you a reset link</p>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-primary bg-primary/5 border border-primary/10 rounded-lg px-4 py-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="your@email.com"
                       class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-2 focus:ring-primary/20 hover:border-gray-400 transition-all">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Email Password Reset Link</button>

            <p class="text-sm text-gray-500 text-center">
                <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark font-semibold">Back to Sign In</a>
            </p>
        </form>
    </div>
</x-layouts.guest>