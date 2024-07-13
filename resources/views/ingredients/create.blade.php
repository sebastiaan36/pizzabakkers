create a form to add a new ingredient
     <div style="display: block; margin-left:auto; margin-right:auto; max-width: 400px;" class="mt-16">
         <h1>Add a new ingredient</h1>
         <form action="{{ route('ingredient.store') }}" method="post">
             @csrf
             <label for="name">Name</label>
             <input type="text" name="name" id="name">

             <input type="submit" value="Add ingredient">
         </form>

     </div>
