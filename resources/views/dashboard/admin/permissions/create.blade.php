<form method="POST" action="{{ route('admin.permissions.store') }}" class="m-4 w-full flex" style="margin-left: 0px">
    @csrf

    <input name="name" class="p-4 mr-0 w-full border text-gray-800 border-gray-200 bg-white"
        placeholder="Enter name of a new permission"/>

    <button class="px-8 bg-yellow-400  text-gray-800 font-bold p-4 uppercase border-yellow-500 border">
        Create
    </button>
</form>

@error('name')
    <div class="ml-2 mt-2 text-red-500 mb-2 text-small">
        {{ $message }}
    </div>
@enderror
