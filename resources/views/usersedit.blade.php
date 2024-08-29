<x-app-layout :$user :$api_token>
    <div class="container mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-5">Edit User</h1>
        
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">{{ implode(', ', $errors->all()) }}</span>
            </div>
        @endif

        <form action="{{ route('users.update', $user_edit->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->
            <input type="hidden" value="{{$api_token}}" name="api_token"/>

            
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('name', $user_edit->first_name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                <input type="last_name" name="last_name" id="last_name" value="{{ old('last_name', $user_edit->last_name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user_edit->email) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                <input type="age" name="age" id="age" value="{{ old('age', $user_edit->age) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="address" name="address" id="address" value="{{ old('address', $user_edit->address) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                <input type="phone" name="phone" id="phone" value="{{ old('phone', $user_edit->phone) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label for="prof_summary" class="block text-gray-700 text-sm font-bold mb-2">Professional Summary</label>
                <input type="prof_summary" name="prof_summary" id="prof_summary" value="{{ old('prof_summary', $user_edit->prof_summary) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update User</button>
                <a href="{{ route('dashboard', ['api_token' => $api_token]) }}" class="text-blue-500 hover:underline">Back to User List</a>
            </div>
        </form>
    </div>
</x-app-layout>
