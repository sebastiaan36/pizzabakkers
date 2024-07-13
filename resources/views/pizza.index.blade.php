//show list of all pizzas with a clickable link to each pizza
<x-app-layout>
    <div style="display: block; margin-left:auto; margin-right:auto; max-width: 400px;" class="mt-16">
        <h1>Choose your pizza</h1>
        @foreach ($pizzas as $pizza)

                <a href="{{route('pizza.show', $pizza->id)}}">{{ $pizza->name }} </a>
                <p> {{ $pizza->price }} </p>
            @endforeach

    </div>
</x-app-layout>
