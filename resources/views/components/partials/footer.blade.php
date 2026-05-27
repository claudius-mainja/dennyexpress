<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <div class="space-y-4">
                <div class="flex items-center gap-2.5">
                    <span class="text-2xl font-black text-white uppercase">Denny Express</span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    South Africa's leading POS systems and IT hardware provider. Quality products, competitive pricing, and expert support for your retail business.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-9 h-9 bg-white/10 hover:bg-primary rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 bg-white/10 hover:bg-primary rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 bg-white/10 hover:bg-primary rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-gray-400 mb-4">Shop</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('shop.index') }}" class="text-sm text-gray-300 hover:text-white transition-colors">All Products</a></li>
                    <li><a href="{{ route('shop.index') }}?category=pos-systems" class="text-sm text-gray-300 hover:text-white transition-colors">POS Systems</a></li>
                    <li><a href="{{ route('shop.index') }}?category=computers" class="text-sm text-gray-300 hover:text-white transition-colors">Desktops</a></li>
                    <li><a href="{{ route('shop.index') }}?category=monitors" class="text-sm text-gray-300 hover:text-white transition-colors">Monitors</a></li>
                    <li><a href="{{ route('shop.index') }}?category=printers" class="text-sm text-gray-300 hover:text-white transition-colors">Printers</a></li>
                    <li><a href="{{ route('shop.index') }}?category=packaging-stickers" class="text-sm text-gray-300 hover:text-white transition-colors">Packaging</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-gray-400 mb-4">Support</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('pages.contact') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('pages.faq') }}" class="text-sm text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="{{ route('pages.shipping') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Shipping Info</a></li>
                    <li><a href="{{ route('pages.returns') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Returns & Exchanges</a></li>
                    <li><a href="{{ route('pages.warranty') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Warranty</a></li>
                    <li><a href="{{ route('pages.support') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Technical Support</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-gray-400 mb-4">Company</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('pages.about') }}" class="text-sm text-gray-300 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('pages.terms') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Terms & Conditions</a></li>
                    <li><a href="{{ route('pages.privacy') }}" class="text-sm text-gray-300 hover:text-white transition-colors">Privacy Policy</a></li>
                </ul>

                <h3 class="text-sm font-black uppercase tracking-wider text-gray-400 mb-4 mt-6">Contact</h3>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>187 Alexandra, Halfway House, Midrand, Gauteng, South Africa</span>
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>sales@dennyexpress.co.za</span>
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+27 74 355 1336</span>
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 mt-0.5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>012 023 3315</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Denny Express. All rights reserved.</p>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/payments/visa.svg') }}" alt="Visa" class="h-8 object-contain">
                    <img src="{{ asset('images/payments/mastercard.svg') }}" alt="Mastercard" class="h-8 object-contain">
                    <img src="{{ asset('images/payments/payfast.svg') }}" alt="PayFast" class="h-8 object-contain">
                    <img src="{{ asset('images/payments/ozow.svg') }}" alt="Ozow" class="h-8 object-contain">
                    <img src="{{ asset('images/payments/eft.svg') }}" alt="EFT" class="h-8 object-contain">
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-white/5 text-center">
                <p class="text-xs text-gray-600">
                    Designed & Developed by 
                    <a href="https://www.blacklemur.co.za" target="_blank" class="text-primary hover:text-accent transition-colors font-medium">
                        Blacklemur Innovations
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
