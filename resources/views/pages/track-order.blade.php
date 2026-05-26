<x-layouts.app title="Track Your Order">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Track Your Order</h1>
                <p class="text-white/80 text-lg max-w-2xl mx-auto">
                    Enter your order number or email to track your delivery in real-time
                </p>
            </div>
        </div>
    </section>

    {{-- Track Order Form --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-3xl p-8 md:p-10 border border-gray-100">
                <form x-data="{ tracking: null, searching: false }" @submit.prevent="
                    searching = true;
                    setTimeout(() => {
                        tracking = {
                            order_number: 'DEN-' + Math.floor(Math.random() * 10000),
                            status: 'in_transit',
                            estimated_delivery: '2-3 business days',
                            steps: [
                                { title: 'Order Placed', description: 'Your order has been received', completed: true, date: 'Today, 09:00 AM' },
                                { title: 'Processing', description: 'Your order is being prepared', completed: true, date: 'Today, 11:30 AM' },
                                { title: 'Shipped', description: 'Your order has been dispatched', completed: true, date: 'Today, 02:15 PM' },
                                { title: 'In Transit', description: 'Your order is on its way', completed: false, current: true },
                                { title: 'Delivered', description: 'Your order has been delivered', completed: false }
                            ]
                        };
                        searching = false;
                    }, 1500);
                " class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Order Number or Email</label>
                        <input type="text" 
                               placeholder="Enter your order number (e.g., DEN-12345) or email"
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                               required>
                    </div>
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-all duration-300 disabled:opacity-50"
                            :disabled="searching">
                        <span x-show="!searching">Track Order</span>
                        <span x-show="searching">
                            <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Searching...
                        </span>
                    </button>
                </form>

                {{-- Tracking Results --}}
                <div x-show="tracking" x-transition class="mt-10">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-6">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Order Number</p>
                                <p class="text-lg font-bold text-gray-900" x-text="tracking.order_number"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Estimated Delivery</p>
                                <p class="text-lg font-bold text-primary" x-text="tracking.estimated_delivery"></p>
                            </div>
                            <div class="px-4 py-2 bg-primary/10 rounded-lg">
                                <span class="text-sm font-semibold text-primary">In Transit</span>
                            </div>
                        </div>
                    </div>

                    {{-- Timeline --}}
                    <div class="relative">
                        <template x-for="(step, index) in tracking.steps" :key="index">
                            <div class="flex gap-4 mb-6 last:mb-0">
                                <div class="flex flex-col items-center">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0"
                                         :class="step.completed || step.current ? 'bg-primary' : 'bg-gray-200'">
                                        <template x-if="step.completed">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </template>
                                        <template x-if="step.current">
                                            <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                                        </template>
                                        <template x-if="!step.completed && !step.current">
                                            <span class="text-sm font-semibold text-gray-400" x-text="index + 1"></span>
                                        </template>
                                    </div>
                                    <div class="w-0.5 flex-1 min-h-[20px]"
                                         :class="step.completed ? 'bg-primary' : 'bg-gray-200'"></div>
                                </div>
                                <div class="flex-1 pb-6">
                                    <h4 class="font-semibold text-gray-900" 
                                        :class="{ 'text-primary': step.current }"
                                        x-text="step.title"></h4>
                                    <p class="text-sm text-gray-500 mt-0.5" x-text="step.description"></p>
                                    <p class="text-xs text-gray-400 mt-1" x-text="step.date" x-show="step.date"></p>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="mt-8 p-4 bg-accent/10 rounded-xl border border-accent/20">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-accent shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Need help with your order?</p>
                                <p class="text-sm text-gray-600 mt-1">
                                    Contact us on WhatsApp at <strong>074 355 1336</strong> or email <strong>info@dennyexpress.co.za</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
            
            <div class="space-y-4" x-data="{ open: 0 }">
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 1 ? 0 : 1">
                        <span class="font-semibold text-gray-900">How long does delivery take?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 1" class="px-6 pb-4 text-sm text-gray-600">
                        Standard delivery takes 2-5 business days across South Africa. Express delivery is available for major cities within 1-2 business days.
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 2 ? 0 : 2">
                        <span class="font-semibold text-gray-900">Where can I find my order number?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 2" class="px-6 pb-4 text-sm text-gray-600">
                        Your order number was sent to your email address when you placed the order. It starts with 'DEN-' followed by numbers. You can also use your email address to track.
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 3 ? 0 : 3">
                        <span class="font-semibold text-gray-900">What if my order is delayed?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 3" class="px-6 pb-4 text-sm text-gray-600">
                        If your order is delayed beyond the estimated delivery time, please contact us on WhatsApp at 074 355 1336 and we'll investigate immediately.
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
