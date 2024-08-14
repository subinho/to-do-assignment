<x-layout>
    <div class="flex items-center justify-center mb-7 font-bold ">
        <x-button href="todo/create">New todo</x-button>
    </div>
    @foreach($todos as $todo)
        <div class="mb-4 flex justify-between items-center ">
            <div class="flex-1 pr-4">
                <a href="/todo/{{$todo->id}}">
                    <h3 class="text-lg font-bold">{{$todo->title}}</h3>
                    <p class="text-sm">{{$todo->body}}</p>
                </a>
            </div>
            <div class="flex-none items-end w-1/5 flex flex-row items-center gap-4">

                <form method="POST" action="/todo/{{ $todo->id }}/complete" id="complete-form-{{$todo->id}}" class="flex-1 flex items-center justify-center text-sm">
                    @csrf
                    @method('PATCH')

                    <button type="submit" form="complete-form-{{$todo->id}}" class="{{$todo->completed ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-500 hover:bg-gray-600'}} px-3 py-2 text-sm font-semibold text-white shadow-sm">{{$todo->completed ? 'Completed' : 'In Progress'}}</button>
                </form>

                <div class="ml-4 flex items-center justify-center md:ml-6 flex-1">

                    @if(!$todo->completed)
                        <p class="text-sm text-red-500 font-bold cursor-default   ">
                            {{$todo->getRemainingTime()}}
                        </p>
                    @endif
                </div>
                <form method="POST" action="/todo/{{ $todo->id }}" id="delete-form-{{$todo->id}}" class="flex-1 flex items-center justify-center">
                    @csrf
                    @method('DELETE')

                    <x-form-button form="delete-form-{{$todo->id}}" class="text-red-500 text-sm font-bold bg-red-500 hover:bg-red-600">Delete</x-form-button>

                </form>
            </div>
        </div>
    @endforeach
</x-layout>
