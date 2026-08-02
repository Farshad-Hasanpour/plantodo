<div class="max-w-2xl mx-auto space-y-8 py-6 px-4">
    <div class="bg-white shadow rounded-2xl p-6">
        <h2 class="text-xl font-semibold mb-4">Update Profile</h2>

        @if (session()->has('success_profile'))
            <div class="bg-green-100 text-green-800 text-sm rounded p-2 mb-4">
                {{ session('success_profile') }}
            </div>
        @endif

        <form wire:submit.prevent="updateProfile" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input
                	type="text"
                	wire:model.defer="update_profile_form.name"
                    class="w-full rounded border-gray-300 shadow-sm mt-1"
                >
                @error('update_profile_form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input
                	type="email"
                	wire:model.defer="update_profile_form.email"
                    class="w-full rounded border-gray-300 shadow-sm mt-1"
                >
                @error('update_profile_form.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button
            	type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            >
                Save Changes
            </button>
        </form>
    </div>

    <div class="bg-white shadow rounded-2xl p-6">
        <h2 class="text-xl font-semibold mb-4">Change Password</h2>

        @if (session()->has('success_password'))
            <div class="bg-green-100 text-green-800 text-sm rounded p-2 mb-4">
                {{ session('success_password') }}
            </div>
        @endif

        <form wire:submit.prevent="updatePassword" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" wire:model.defer="update_password_form.new_password"
                       class="w-full rounded border-gray-300 shadow-sm mt-1">
                @error('update_password_form.new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input type="password" wire:model.defer="update_password_form.new_password_confirmation"
                       class="w-full rounded border-gray-300 shadow-sm mt-1">
            </div>

            <button type="submit"
                    class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                Update Password
            </button>
        </form>
    </div>
</div>
