<div class="pb-4 pt-4">
    <form action="{{ route('admin.permissions.index') }}" method="GET">
        <label for="table-search" class="sr-only">Search</label>
        <div class="flex flex-row relative mt-1">
            <div>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input
                    name='search'
                    type="text"
                    id="table-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">

            </div>
            <button
                type="submit"
                class="focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900"
                >
                Search
            </button>

            <a href="{{ route('admin.roles.index') }}">
                <button
                    type="submit"
                    class="focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900"
                    >
                    Reset
                </button>
            </a>
    </form>
</div>
