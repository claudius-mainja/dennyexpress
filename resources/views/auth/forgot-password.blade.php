<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Reset Password</h1>
        <p class="text-sm text-medium-gray mb-6">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.</p>

        @session('status')
            <div class="mb-4 text-sm text-success bg-success/10 p-3 rounded-lg">{{ $value }}</div>
        @endsession

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-dark-charcoal mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="input-field" placeholder="your@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Email Password Reset Link</button>

            <p class="text-sm text-medium-gray text-center">
                <a href="{{ route('login') }}" class="text-primary-blue hover:text-accent-blue font-medium">Back to Sign In</a>
            </p>
        </form>
    </div>
</x-layouts.guest>
