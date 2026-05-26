<x-layouts.app title="Support">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Technical Support</h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Our team of certified engineers is here to help you with product selection, configuration, and troubleshooting
                </p>
            </div>
        </div>
    </section>

    {{-- Support Options --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <a href="mailto:support@dennyexpress.co.za" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:border-primary/50 transition-all group">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Email Support</h3>
                    <p class="text-sm text-gray-500 mb-3">Response within 24 hours</p>
                    <span class="text-sm text-primary font-medium">support@dennyexpress.co.za</span>
                </a>

                <a href="tel:0743551336" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:border-primary/50 transition-all group">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Phone Support</h3>
                    <p class="text-sm text-gray-500 mb-3">Mon-Fri, 8AM-5PM</p>
                    <span class="text-sm text-accent font-medium">074 355 1336</span>
                </a>

                <a href="https://wa.me/27743551336" target="_blank" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:border-primary/50 transition-all group">
                    <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-success/20 transition-colors">
                        <svg class="w-8 h-8 text-success" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">WhatsApp</h3>
                    <p class="text-sm text-gray-500 mb-3">Quick questions & support</p>
                    <span class="text-sm text-success font-medium">Chat Now</span>
                </a>
            </div>

            {{-- Support Form --}}
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Submit a Support Request</h2>
                    <p class="text-gray-600">Fill out the form below and our team will get back to you as soon as possible</p>
                </div>

                <form class="max-w-2xl mx-auto space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1.5">Full Name *</label>
                            <input type="text" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="Your full name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1.5">Email Address *</label>
                            <input type="email" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1.5">Phone Number</label>
                            <input type="tel" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="082 123 4567">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1.5">Order Number</label>
                            <input type="text" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="DENNY-2024-...">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1.5">Support Topic *</label>
                        <select class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            <option>Select a topic...</option>
                            <option>Product Inquiry</option>
                            <option>Technical Support</option>
                            <option>Warranty Claim</option>
                            <option>Order Issue</option>
                            <option>Shipping Question</option>
                            <option>Return Request</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1.5">Subject *</label>
                        <input type="text" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="Briefly describe your issue">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1.5">Message *</label>
                        <textarea rows="5" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="Please provide as much detail as possible: product model, issue description, steps to reproduce, etc."></textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Submit Support Request
                    </button>
                </form>
            </div>

            {{-- Quick Links --}}
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('pages.faq') }}" class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 hover:border-primary/30 transition-all group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 text-sm">FAQ</h4>
                        <p class="text-xs text-gray-500">Common questions answered</p>
                    </div>
                </a>

                <a href="{{ route('pages.returns') }}" class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 hover:border-primary/30 transition-all group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 text-sm">Returns</h4>
                        <p class="text-xs text-gray-500">30-day return policy</p>
                    </div>
                </a>

                <a href="{{ route('pages.warranty') }}" class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 hover:border-primary/30 transition-all group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 text-sm">Warranty</h4>
                        <p class="text-xs text-gray-500">18-month coverage</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
