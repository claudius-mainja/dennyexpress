<x-layouts.app title="Profile">
    <div class="container-custom py-8">
        <h1 class="text-2xl font-bold text-primary-navy mb-6">Profile Settings</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-4">Profile Information</h2>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-4">Update Password</h2>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div>
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-4">Delete Account</h2>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
