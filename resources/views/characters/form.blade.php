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
                        action="{{ isset($character) ? route('characters.update', $character->id) : route('characters.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($character)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="name" value="ชื่อ" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="$character->name ?? old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        {{-- <div>
                            <x-input-label for="element" value="ธาตุ" />

                            <x-textarea-input id="element" name="element"
                                class="mt-1 block w-full">{{ $character->element ?? old('element') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('element')" />
                        </div> --}}
                        <div>
                            <x-input-label for="element" value="ธาตุ" />
                            <select id="element" name="element" class="mt-1 block w-full rounded border-gray-300" required autofocus>
                                <option value="Anemo" {{ old('element', $character->element ?? '') === 'Anemo' ? 'selected' : '' }}>Anemo</option>
                                <option value="Electro" {{ old('element', $character->element ?? '') === 'Electro' ? 'selected' : '' }}>Electro</option>
                                <option value="Pyro" {{ old('element', $character->element ?? '') === 'Pyro' ? 'selected' : '' }}>Pyro</option>
                                <option value="Cryo" {{ old('element', $character->element ?? '') === 'Cryo' ? 'selected' : '' }}>Cryo</option>
                                <option value="Dendro" {{ old('element', $character->element ?? '') === 'Dendro' ? 'selected' : '' }}>Dendro</option>
                                <option value="Geo" {{ old('element', $character->element ?? '') === 'Geo' ? 'selected' : '' }}>Geo</option>
                                <option value="Hydro" {{ old('element', $character->element ?? '') === 'Hydro' ? 'selected' : '' }}>Hydro</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('element_type')" />
                        </div>
                        <div>
                            <x-input-label for="gender" value="เพศ" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="gender" name="gender"
                                class="mt-1 block w-full">{{ $character->gender ?? old('gender') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>
                        <div>
                            <x-input-label for="city" value="เมืองเกิด" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="city" name="city"
                                class="mt-1 block w-full">{{ $character->city ?? old('city') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div>
                            <x-input-label for="description" value="รายละเอียด" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="description" name="description"
                                class="mt-1 block w-full">{{ $character->description ?? old('description') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="featured_image" value="รูป" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="featured_image" name="featured_image" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($character) ? Storage::url($character->featured_image) : '' }}" alt="Featured image preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                        </div>

                        <div>
                            <x-input-label for="model_img" value="model_img" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="model_img" name="model_img" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="model_img_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($character) ? Storage::url($character->model_img) : '' }}" alt="model_img preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('model_img')" />
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
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
        document.getElementById('model_img').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('model_img_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
