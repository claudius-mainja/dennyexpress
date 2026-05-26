<x-layouts.guest>
    <div class="p-6">
        <h1 class="text-xl font-bold text-primary-navy mb-1">Verify Email</h1>
        <p class="text-sm text-medium-gray mb-6">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>

        @session('status')
            <div class="mb-4 text-sm text-success bg-success/10 p-3 rounded-lg">{{ $value }}</div>
        @endsession

        <div class="space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-primary w-full">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-secondary w-full">Log Out</button>
            </form>
        </div>
    </div>
</x-layouts.guest>
