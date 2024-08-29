<x-app-layout :$api_token :$user>


    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">New User Form</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('createuser') }}" method="POST">
                @csrf
                
             
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your first name">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your last name">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your email">
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="block text-gray-700">Age</label>
                        <input type="number" id="age" name="age" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your age">
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label for="address" class="block text-gray-700">Address</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your address">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your phone number">
                    </div>
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="text" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter your password">
                    </div>
                    <!-- Professional Summary -->
                    <div class="md:col-span-2">
                        <label for="professional_summary" class="block text-gray-700">Professional Summary</label>
                        <textarea id="prof_summary" name="professional_summary" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Write your professional summary here..."></textarea>
                    </div>
                    <div class="block mt-4">
    <x-input-label for="is_admin" :value="__('Is Admin?')" />
    
    <select name="is_admin" id="is_admin" class="block mt-1 w-full">
        <option value="yes" {{ old('is_admin') === 'yes' ? 'selected' : '' }}>{{ __('Yes') }}</option>
        <option value="no" {{ old('is_admin') === 'no' ? 'selected' : '' }}>{{ __('No') }}</option>
    </select>
    
    <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
</div>


                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
                        Submit  
                       
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
