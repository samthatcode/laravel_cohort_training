<x-layout>
    <h2>Currently Available Trainees</h2>

    <ul>
        @foreach ($trainees as $trainee)
            <li>
                <x-card :highlight="$trainee['skill'] > 70" href="{{ route('trainees.show', $trainee->id) }}">
                    <div>
                        <h3>{{ $trainee->name }}</h3>
                        <p>{{ $trainee->training_center->name }}</p>
                    </div>
                </x-card>
            </li>
        @endforeach
    </ul>

    {{ $trainees->links() }}
</x-layout>
