<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Comic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="mb-4 bg-red-500/20 text-red-500 p-4 rounded-lg border border-red-500/30">
                            <p class="font-bold">Please fix the following errors:</p>
                            <ul class="list-disc list-inside mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('comics.store') }}" enctype="multipart/form-data" x-data="{ imagePreview: null }">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Summary -->
                        <div class="mt-4">
                            <x-input-label for="summary" :value="__('Summary')" />
                            <textarea id="summary" name="summary" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('summary') }}</textarea>
                            <x-input-error :messages="$errors->get('summary')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="Ongoing" @selected(old('status') == 'Ongoing')>Ongoing</option>
                                    <option value="Completed" @selected(old('status') == 'Completed')>Completed</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Comic Web -->
                            <div>
                                <x-input-label for="comic_web" :value="__('Comic URL')" />
                                <x-text-input id="comic_web" class="block mt-1 w-full" type="url" name="comic_web" :value="old('comic_web')" placeholder="https://example.com/read/comic" />
                                <x-input-error :messages="$errors->get('comic_web')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="mt-4">
                            <x-input-label :value="__('Categories')" class="mb-2" />
                            <div class="p-4 border border-gray-300 dark:border-gray-700 rounded-md max-h-60 overflow-y-auto">
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach($categories as $category)
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                   @if(is_array(old('categories')) && in_array($category->id, old('categories'))) checked @endif
                                                   class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                            <span class="text-sm">{{ $category->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                        </div>

                        <!-- Image Upload -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Cover Image')" />
                            <div class="mt-2 flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img x-show="imagePreview" class="h-24 w-24 object-cover rounded-md" :src="imagePreview" alt="Image Preview">
                                    <div x-show="!imagePreview" class="h-24 w-24 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                                        <svg class="h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </div>
                                </div>
                                <input type="file" id="image" name="image" accept="image/*" @change="imagePreview = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300 dark:hover:file:bg-gray-600"/>
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <a href="{{ route('comics.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-md">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button class="ms-4">
                                {{ __('Save Comic') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>