<x-layout>
    <h2>Currently Available Trainees</h2>

    <ul>
        @foreach ($trainees as $trainee)
            <li>
                <div class="{{ $trainee['skill'] > 70 ? 'highlight' : '' }} card">
                    <div class="w-[70%]">
                        <h3>{{ $trainee->name }}</h3>
                        <p>{{ $trainee->training_center->name }}</p>
                    </div>

                    <!-- View Details Button -->
                    <a href="{{ route('trainees.show', $trainee->id) }}" class="btn">View Details</a>

                    <!-- Edit Button -->
                    <a href="{{ route('trainees.edit', $trainee->id) }}" class="btn-edit">Edit</a>
                </div>
            </li>
        @endforeach
    </ul>

    {{ $trainees->links() }}
</x-layout>
