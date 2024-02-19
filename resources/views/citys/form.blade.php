<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($post) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post"
                        action="{{ isset($city) ? route('citys.update', $city->city_id) : route('citys.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($city)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="city_name" value="ชื่อเมือง" />
                            <x-text-input id="city_name" name="city_name" type="text" class="mt-1 block w-full"
                                :value="$city->city_name ?? old('city_name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('city_name')" />
                        </div>

                        <div>
                            <x-input-label for="city_description" value="รายละเอียด" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="city_description" name="city_description"
                                class="mt-1 block w-full">{{ $city->city_description ?? old('city_description') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('city_description')" />
                        </div>

                        <div>
                            <x-input-label for="city_img" value="รูป" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="city_img" name="city_img" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="city_img_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($city) ? Storage::url($city->city_img) : '' }}" alt="Featured image preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('city_img')" />
                        </div>



                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for city_img input
        document.getElementById('city_img').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in city_img_preview
                document.getElementById('city_img_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
