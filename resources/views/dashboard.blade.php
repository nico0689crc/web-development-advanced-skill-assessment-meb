<x-app-layout :$user :$api_token>

    @if ($message = Session::get('success'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ $message }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg p-4 y mt-4"> 
    <h1 class="text-2xl font-bold mb-5">User Database</h1> <br>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
    <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-700">ID</th>
                    <th class="py-3 px-4 text-left text-gray-700">First Name</th>
                    <th class="py-3 px-4 text-left text-gray-700">Last Name</th>
                    <th class="py-3 px-4 text-left text-gray-700">Email</th>
                    <th class="py-3 px-4 text-left text-gray-700">Age</th>
                    <th class="py-3 px-4 text-left text-gray-700">Address</th>
                    <th class="py-3 px-4 text-left text-gray-700">Phone</th>
                    <th class="py-3 px-4 text-left text-gray-700">Professional Summary</th>
                    <th class="py-3 px-4 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4 text-gray-600">{{ $user->id }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->first_name }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->last_name }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->email }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->age }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->address }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->phone }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $user->prof_summary }}</td>
                        <td class="py-3 px-4 flex space-x-4">
                        <a href={{route('users.edit', ['id' => $user->id, 'api_token' => $api_token])}} class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="api_token" value="{{$api_token}}"/>
                            <button type="submit" class="text-red-500 hover:underline ml-4">Delete</button>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-app-layout>
