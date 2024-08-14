<x-layout>

    @if(!$todo->completed)
    <p class="text-red-500">Time left {{ $todo->getRemainingTime()  }}</p>
    @endif
    <p class="mb-4">Todo is {{$todo->completed ? 'completed' : 'in progress'}}</p>
    <h3 class="text-lg font-bold mb-2">{{$todo->title}}</h3>
    <p>{{$todo->body}}</p>

    <div class="mt-6 flex items-center justify-between gap-x-6">
        <form method="POST" action="/todo/{{ $todo->id }}" id="delete-form">
            @csrf
            @method('DELETE')

            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>
        </form>

        <div class="flex items-center gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Go back</a>

            <div>
                <x-button href="/todo/{{ $todo->id }}/edit">Edit Job</x-button>
            </div>
        </div>
    </div>
</x-layout>
