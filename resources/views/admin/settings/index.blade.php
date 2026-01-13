<x-admin-layout>
    <x-slot name="title">Site Settings</x-slot>

<<<<<<< HEAD
=======
    @php
        // Ensure settings is always an array to prevent foreach errors
        $settings = $settings ?? [];
        if (!is_array($settings)) {
            $settings = [];
        }
    @endphp

>>>>>>> master
    <div class="max-w-4xl">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Site Settings</h2>
            <p class="text-gray-600">Configure your website settings</p>
        </div>

<<<<<<< HEAD
=======
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

>>>>>>> master
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- General Settings -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">General Settings</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Site Name (English)</label>
                        <input type="text" name="site_name_en" value="{{ $settings['site_name_en'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Site Name (French)</label>
                        <input type="text" name="site_name_fr" value="{{ $settings['site_name_fr'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tagline (English)</label>
                        <input type="text" name="tagline_en" value="{{ $settings['tagline_en'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tagline (French)</label>
                        <input type="text" name="tagline_fr" value="{{ $settings['tagline_fr'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                        <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <input type="text" name="address" value="{{ $settings['address'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Media</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">YouTube URL</label>
                        <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- SEO Defaults -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Default SEO Settings</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (English)</label>
                        <input type="text" name="default_meta_title_en" value="{{ $settings['default_meta_title_en'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (French)</label>
                        <input type="text" name="default_meta_title_fr" value="{{ $settings['default_meta_title_fr'] ?? '' }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (English)</label>
                        <textarea name="default_meta_description_en" rows="3"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ $settings['default_meta_description_en'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (French)</label>
                        <textarea name="default_meta_description_fr" rows="3"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ $settings['default_meta_description_fr'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- About Page Content -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">About Page Content</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">About Text (English)</label>
                        <textarea name="about_text_en" rows="6"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ $settings['about_text_en'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">About Text (French)</label>
                        <textarea name="about_text_fr" rows="6"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ $settings['about_text_fr'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-6 py-3 rounded-lg">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
