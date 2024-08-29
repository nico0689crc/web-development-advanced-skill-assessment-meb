<x-app-layout>
{{-- resources/views/users/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-5">User Details</h1>
        
        <div class="mb-4">
            <strong>First Name:</strong> {{ $user->first_name }}
        </div>
        <div class="mb-4">
            <strong>Last Name:</strong> {{ $user->last_name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong>Age:</strong> {{ $user->age }}
        </div>
        <div class="mb-4">
            <strong>Address:</strong> {{ $user->address }}
        </div>
        <div class="mb-4">
            <strong>Phone:</strong> {{ $user->phone }}
        </div>
        <div class="mb-4">
            <strong>Professional Summary:</strong> {{ $user->prof_summary }}
        </div>


        <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Edit User
        </a>

        <a href="{{ route('users.index') }}" class="ml-4 text-blue-500 hover:underline">Back to User List</a>
    </div>
</body>
</html>

</x-app-layout>