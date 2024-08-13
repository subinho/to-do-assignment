<x-layout>
    @foreach($todos as $todo)
        <div class="mb-4 flex justify-between items-center">
            <a href="/todo/{{$todo->id}}">
                <h3 class="text-lg font-bold">{{$todo->title}}</h3>
                <p class="text-sm">{{$todo->body}}</p>
            </a>
            <div class="flex items-end">
                <button type="submit">Delete</button>
            </div>
        </div>
    @endforeach
</x-layout>
