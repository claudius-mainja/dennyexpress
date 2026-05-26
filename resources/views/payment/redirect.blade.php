<x-layouts.app title="Processing Payment | Denny Express">
    <div class="min-h-[70vh] flex items-center justify-center py-section">
        <div class="text-center max-w-md mx-auto">
            <div class="w-20 h-20 mx-auto mb-6 bg-primary-green/10 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-primary-green animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
            </div>
            
            <h1 class="text-2xl font-bold text-dark-charcoal mb-2">Processing Payment</h1>
            <p class="text-medium-gray mb-6">You are being redirected to {{ $gateway ?? 'payment gateway' }}...</p>
            
            <form id="payment-form" action="{{ $url }}" method="POST">
                @foreach ($data as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button type="submit" class="btn-primary">
                    Click here if you are not redirected
                </button>
            </form>
            
            <p class="text-xs text-medium-gray mt-6">
                This is secure and encrypted. You will be redirected to our payment provider.
            </p>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.getElementById('payment-form').submit();
                }, 1000);
            });
        </script>
    @endpush
</x-layouts.app>
