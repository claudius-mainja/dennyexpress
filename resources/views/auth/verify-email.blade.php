<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Verify Email</h1>
        <p class="text-sm text-gray-500 mb-4">Please verify your email address to continue</p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-primary bg-primary/5 border border-primary/10 rounded-lg px-4 py-3">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <p class="text-sm text-gray-600 mb-6">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we'll gladly send you another.
        </p>

        <div class="flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-primary">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 underline">Log Out</button>
            </form>
        </div>
    </div>
</x-layouts.guest>