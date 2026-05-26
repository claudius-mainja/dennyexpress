<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Create Account</h1>
        <p class="text-sm text-medium-gray mb-6">Join Denny Express for a seamless shopping experience</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-dark-charcoal mb-1">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="input-field" placeholder="John Doe">
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-dark-charcoal mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="input-field" placeholder="your@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-dark-charcoal mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-dark-charcoal mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Create Account</button>

            <p class="text-sm text-medium-gray text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary-blue hover:text-accent-blue font-medium">Sign In</a>
            </p>
        </form>
    </div>
</x-layouts.guest>
