<x-appbase-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Criar novo tópico') }}
        </h2>
    </x-slot>

    <section class="mx-6">
        <div class="p-8">
            <x-form action="{{ route('admin.blog.store') }}">
                <div class="space-y-8">

                    {{-- Title --}}
                    <div>
                        <x-form.label for="title" value="{{ __('Titulo') }}" />
                        <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus />
                        <x-form.error for="title" />
                    </div>

                    {{-- Category --}}
                    <div>
                        <x-form.label for="category" value="{{ __('Categoria') }}" />
                        <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="">Selecionar categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id() }}">{{ $category->name() }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="category" />
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-form.label for="tags" value="{{ __('Tags') }}" />
                        <select name="tags[]" id="tags" x-data="{}" x-init="function () { choices($el) }" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id() }}">{{ $tag->name() }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="tags" />
                    </div>

                    {{-- Body --}}
                    <div>
                        <x-form.label for="body" value="{{ __('Descrição') }}" />
                        <livewire:trix>
                
                        <x-form.error for="body" />
                    </div>

                    {{-- Button --}}
                    <x-buttons.primary>
                        {{ __('Salvar') }}
                    </x-buttons.primary>
            </x-form>
        </div>
    </section>
</x-appbase-layout>
