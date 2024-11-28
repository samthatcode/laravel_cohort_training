<x-layout>
    <form action="{{ route('trainees.store') }}" method="POST" class="space-y-4">
        @csrf {{-- cross site request forgery: which is type of attack that a malicious site could try to make request to an app on your behalf if you are logged and could lead to potential security issues for your account  --}}
        <h2>Create a New Trainee</h2>

        <!-- Trainee Name -->
        <div class="flex flex-col space-y-1">
            <label for="name" class="text-sm font-normal">Trainee Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="border border-gray-300 p-2 rounded">
        </div>

        <!-- Trainee Strength -->
        <div class="flex flex-col space-y-1">
            <label for="skill" class="text-sm font-normal">Trainee Skill (0-100):</label>
            <input type="number" id="skill" name="skill" min="0" max="100"
                value="{{ old('skill') }}" required class="border border-gray-300 p-2 rounded">
        </div>

        <!-- Trainee Bio -->
        <div class="flex flex-col space-y-1">
            <label for="bio" class="text-sm font-normal">Biography:</label>
            <textarea rows="5" id="bio" name="bio" required class="border border-gray-300 p-2 rounded resize-none">
                 {{ old('bio') }}
            </textarea>
        </div>

        <!-- select a Training Center -->
        <div class="flex flex-col space-y-1">
            <label for="training_center_id" class="text-sm font-normal">Select a Training Center:</label>
            <select id="training_center_id" name="training_center_id" required
                class="border border-gray-300 p-2 rounded">
                <option value="" disabled selected>Select a Center</option>
                @foreach ($training_centers as $training_center)
                    <option value="{{ $training_center->id }}"
                        {{ $training_center->id == old('training_center_id') ? 'selected' : '' }}>
                        {{ $training_center->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit"
            class="w-full px-4 py-2 bg-red-400 text-white rounded hover:bg-red-500 transition duration-300 ease-in-out">Create
            Trainee</button>


        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 ">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>

</x-layout>
