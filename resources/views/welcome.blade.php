<html>
<head>
    <title>Leer je pizza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: "Pusss";
            src: url("/storage/PUSSS.woff") format("woff");
        }
        body{
            font-family: Helvetica, sans-serif;
            background-color: #131f5f;
            color: white;
        }
        h1{
            font-family: "Pusss";
            font-size: 4rem;
            text-align: center;
            letter-spacing: 1.6;
            line-height: 1.1;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        button{
            font-family: "Pusss";
            font-size: 30px;
        }
    </style>
</head>

<body>

<h1>{{ $pizza->name }}</h1>
    <p>Ingrediënten: <span id="correct">0</span> / {{$pizza->ingredients->count()}}</p>
<form action="{{ route('pizza.update', $pizza->id) }}" method="post">
    @csrf



@foreach ($ingredients as $ingredient)

            <label style="display: inline-block; background-color: #e2b9ae; padding: 5px; margin: 5px; border-radius: 5px">

            <input id="{{ $ingredient->id }}" type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" >
                {{ $ingredient->name }}

            </label>


 @endforeach

<p> Aantal fouten: <span id="mistakes">0</span> </p>

    <button style="background-color: green; padding: 10px; border:0; color: white; border-radius:10px;" type="button" onclick="window.location.reload();">Volgende Pizza</button>

    <img style="display: block; margin-left: auto; margin-right: auto; max-width: 90%; margin-top:20px; text-align: center;"  src="storage/logo.png">

</body>
</html>

<script>
    //if checkbox is clicked check if the id is in the array
    //if it is count mistakes +1 if it's not count correct +1
    //on click of a checkbox show if its correct or wrong

    //if the form is submitted show the total amount of mistakes and the total amount of correct answers
    var mistakes = 0;
    var correct = 0;
    var ingredient_count = {{$pizza->ingredients->count()}};
    var ingredients = @json($pizza->ingredients->pluck('id'));
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function(){
            if(ingredients.includes(parseInt(checkbox.value))){
                correct++;
                //change color of the label to green
                checkbox.parentElement.style.backgroundColor = 'green';
                //change the value of the span corrent to the value of the variable correct
                document.getElementById('correct').innerText = correct;
                console.log('correct: ' + correct);
            }else{
                mistakes++;
                checkbox.parentElement.style.backgroundColor = 'red';
                console.log('mistakes: ' + mistakes);
                document.getElementById('mistakes').innerText = Math.round(mistakes/2);

            }
            if(ingredient_count === correct){

                //show confetti.webp for 3 seconds then remove the image
                var img = document.createElement('img');
                img.src = 'storage/confetti.webp';
                img.style.position = 'absolute';
                img.style.top = '0';
                img.style.left = '0';
                img.style.width = '120%';
                img.style.height = '100%';
                console.log(img);
                document.body.appendChild(img);
                setTimeout(function(){
                    img.remove();
                }, 3000);

            }
        });
    });
    //if ingredients_count is equal to correct show confetti on the screen
    console.log(ingredient_count);

</script>

