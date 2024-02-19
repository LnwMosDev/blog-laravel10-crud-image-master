<x-app-layout>
    <style>
        .btn{
            gap: 5px;
        }
    </style>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Characters' }}
            </h2>
            <a href="{{ route('characters.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">ADD</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-max ">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">ชื่อ</th>
                                {{-- <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">ธาตุ</th>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">เพศ</th>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">เมือง</th> --}}
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">รายละเอียด</th>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">รูป</th>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">โมเดล</th>
                                <th class="border-b font-large p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($characters as $character)
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $character->name }}</td>
                                    {{-- <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $character->element }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $character->gender }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $character->city }}</td> --}}
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $character->description }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-1 pl-4 text-slate-500 dark:text-slate-400">
                                        <img src="{{ Storage::url($character->featured_image) }}"  class="w-20 h-48 object-cover" alt="Featured Image">
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        <img src="{{ Storage::url($character->model_img) }}" class="w-20 h-48 object-cover" alt="model_img">
                                    </td>

                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        <div class="btn flex items-center ">
                                        <a href="{{ route('characters.show', $character->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md button">SHOW</a>
                                        <a href="{{ route('characters.edit', $character->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md button">EDIT</a>
                                        <form method="post" action="{{ route('characters.destroy', $character->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md button">DELETE</button>
                                        </form>
                                    </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $characters->links() }}
                     </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
