<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Reset Password</h1>
        <p class="text-sm text-medium-gray mb-6">Enter your new password below.</p>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email" class="block text-sm font-medium text-dark-charcoal mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus class="input-field" placeholder="your@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-dark-charcoal mb-1">Password</label>
                <input id="password" type="password" name="password" required class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-dark-charcoal mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Reset Password</button>
        </form>
    </div>
</x-layouts.guest>
