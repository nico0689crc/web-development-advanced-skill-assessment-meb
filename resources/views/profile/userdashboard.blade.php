<x-app-layout>
<!-- resources/views/user/profile.blade.php -->


    <div class="container mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
       <h1 style="font-size: 2rem; font-weight: bold; color: #333; margin-bottom: 20px;">
            User Profile
        </h1>

        <div class="user-profile">
            <p><strong>First Name:</strong> {{ $user->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Age:</strong> {{ $user->age }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Professional Summary:</strong> {{ $user->prof_summary }}</p>

            <a href="{{ route('users.edit', $user->id) }}" 
               style="display: inline-block; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; text-align: center;">
                Edit Profile
        </div>
    </div>



</x-app-layout>
