show pizza name with all the ingredients

    <div style="display: block; margin-left:auto; margin-right:auto; max-width: 400px;" class="mt-16">
        <h1>{{ $pizza->name }}</h1>
        <p>Ingredients:</p>
        <ul>
            @foreach ($pizza->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
            @endforeach
        </ul>
        <a href="{{route('pizza.edit', $pizza->id)}}">
            Edit
        </a>
    </div>



