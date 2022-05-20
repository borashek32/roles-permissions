<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-2xl mx-auto">
                        <div class="flex">
                            <div class="flex justify-start">
                                <p class="mt-2 text-md text-black-900 uppercase dark:text-gray-400">
                                    Permissions
                                </p>
                            </div>
                        </div>
                        <div class="relative overflow-x-auto">
                            @include('dashboard.admin.permissions.create')

                            @include('dashboard.admin.permissions.search')
                        </div>
                            <table class="w-full rounded text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    @if($permissions->count() > 0)
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Users
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Created at
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Actions
                                            </th>
                                        </tr>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $permission->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                #
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ Date::parse($permission->created_at)->format('j F Y') }}
                                            </td>
                                            <td class="px-6 py-4 flex flex-row">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                    <button
                                                        type="submit"
                                                        class="focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900"
                                                        >
                                                        Edit
                                                    </button>
                                                </a>

                                                <form method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900"
                                                        >
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <p class="mt-5">
                            This is a table of app permissions
                        </p>
                        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
