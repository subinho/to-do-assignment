<x-layout>
    @foreach($todos as $todo)
        <div>
            <h3>{{$todo->title}}</h3>
            <p>{{$todo->body}}</p>
        </div>
    @endforeach
</x-layout>
