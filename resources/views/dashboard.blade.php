<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg object-center">
                <div class="p-6 bg-white border-b border-gray-200 object-center">
                    Добавить фото
                </div>
                <form class="p-6" method="POST" action="{{ route('photo-add') }}" enctype="multipart/form-data">
                    @csrf
                    <!--<div class="flex flex-col items-center pt-6 sm:pt-0">-->
                    <table class="w-auto border-collapse ">
                        <tr>
                            <td class="p-2"><label for="photo-name" class="block font-medium text-sm text-gray-700">Название</label></td>
                            <td class="p-2"><input name="photo-name" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></td>
                        </tr>
                        <tr>
                            <td class="p-2"><label for="photo-tag" class="block font-medium text-sm text-gray-700">Тэг</label></td>
                            <td class="p-2"><input name="photo-tag" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></td>
                        </tr>
                        <tr>
                            <td class="p-2"><label for="photo-sort" class="block font-medium text-sm text-gray-700">Сортировка</label></td>
                            <td class="p-2"><input name="photo-sort" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="500"></td>
                        </tr>
                        <tr>
                            <td class="p-2"><label for="photo-published" class="block font-medium text-sm text-gray-700">Публиковать</label></td>
                            <td class="p-2"><input name="photo-published" type="checkbox" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="1" checked></td>
                        </tr>
                        <tr>
                            <td class="p-2"><label for="photo-file" class="block font-medium text-sm text-gray-700">Файл</label></td>
                            <td class="p-2"><input name="photo-file" type="file" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="p-2 text-center"><input class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" type="submit" value="Сохранить"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></td>
                        </tr>
                    </table>
                </form>
                <div class="p-6 bg-white border-b border-gray-200">
                    Список фото
                    <table class="w-full border-collapse border border-slate-400">
                        <thead>
                            <th>ID</th>
                            <th></th>
                            <th>Добавлено</th>
                            <th>Название</th>
                            <th>Тэг</th>
                            <th>Sort</th>
                            <th>Pub</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($photoList as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="/photo-del/{{ $item->id }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></a></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->tag }}</td>
                                    <td class="text-center">{{ $item->sort }}</td>
                                    <td class="text-center">{{ $item->published ? 'Да' : '' }}</td>
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
