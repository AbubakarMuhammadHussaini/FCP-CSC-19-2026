<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="mt-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Department
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created On
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ ($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration }}.
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $department->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $department->created_at->toDayDateTimeString() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('departments.edit', $department) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg dark:text-white hover:bg-green-900">Edit</a>
                                        <form class="ml-2 inline" method="POST" action="{{ route('departments.destroy', $department) }}">
                                            @csrf
                                            @method('DELETE')
                
                                            <button  class="px-4 py-2 bg-red-600 text-white rounded-lg dark:text-white hover:bg-red-900" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            {{ $departments->links() }}
                        </div>


                    </div>

                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('departments.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
