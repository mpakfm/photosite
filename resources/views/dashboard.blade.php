<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Добавить фото
                </div>
                <form method="POST" action="{{ route('photo-add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center pt-6 sm:pt-0">
                        <div class="">
                            <label for="photo-name" class="block font-medium text-sm text-gray-700">Название</label>
                            <input name="photo-name" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="">
                            <label for="photo-tag" class="block font-medium text-sm text-gray-700">Тэг</label>
                            <input name="photo-tag" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="">
                            <label for="photo-file" class="block font-medium text-sm text-gray-700">Файл</label>
                            <input name="photo-file" type="file" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="">
                            <input class="btn btn-info" type="submit" value="Сохранить"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>
                </form>
                <div class="p-6 bg-white border-b border-gray-200">
                    Список фото
                    <table class="w-full border-collapse border border-slate-400">
                        <thead>
                            <th>ID</th>
                            <th></th>
                            <th>Название</th>
                            <th>Тэг</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($photoList as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="/photo-del/{{ $item->id }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></a></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->tag }}</td>
                                    <td><img  src="{{ Storage::url($item->path) }}" width="150"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
