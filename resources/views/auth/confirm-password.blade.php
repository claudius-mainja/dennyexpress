<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Confirm Password</h1>
        <p class="text-sm text-medium-gray mb-6">This is a secure area of the application. Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <div>
                <label for="password" class="block text-sm font-medium text-dark-charcoal mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="input-field" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Confirm</button>
        </form>
    </div>
</x-layouts.guest>
