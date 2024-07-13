show the name of the pizza
<h1>{{ $pizza->name }}</h1>

show all ingredients as a clickable element later to store them in the pizza_ingredient table
<form method="POST" action="{{ route('pizza.update', $pizza->id) }}">
    @csrf
    @method('PUT')

    <div class="mt-3">
        <label for="ingredients" :value="__('Ingredients')" ></label>
        @foreach ($ingredients as $ingredient)
            <div>
                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" {{ $pizza->ingredients->contains($ingredient) ? 'checked' : '' }}>
                <label for="ingredients">{{ $ingredient->name }}</label>
            </div>
        @endforeach
        @foreach($errors as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    <input type="submit" value="Update pizza">
