<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Confirm Password</h1>
        <p class="text-sm text-gray-500 mb-6">For your security, please confirm your password</p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••"
                       class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-2 focus:ring-primary/20 hover:border-gray-400 transition-all">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <button type="submit" class="btn-primary w-full">Confirm</button>
        </form>
    </div>
</x-layouts.guest>