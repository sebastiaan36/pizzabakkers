

    <div style="display: block; margin-left:auto; margin-right:auto; max-width: 400px;" class="mt-16">
        <h1>Choose your ingredients</h1>
        @foreach ($ingredients as $ingredient)

            <a href="{{route('ingredient.show', $ingredient->id)}}">{{ $ingredient->name }} </a>

        @endforeach

    </div>
