<html>
  <head>
    <style>
      .duration-4 {
       transition-duration: 0.4s;
      }  
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-white rounded shadow hover:shadow-md duration-4">
      <div class="flex flex-row justify-between uppercase font-bold text-blue-dark border-b p-6">
        <p>{{$products->title}}<p>
        <div class="cursor-pointer text-grey-dark hover:text-blue duration-4"><i class="fas fa-ellipsis-v"></i></div>
      </div>
      <div class="p-6 text-grey-darker text-justify flex flex-col">
        <img src="{{asset($products->images->first()->path)}}" alt="ProductImage" class="w-64 flex self-center rounded-full shadow-lg mb-6 object-scale-down h-200 w-200">
        <p class="font-bold text-sm uppercase mb-2 text-blue-darker">Descripción:<p>
        <span class="text-grey-darker">
          {{$products->description}}
        </span>
        <div class="pt-4">
          <span class="uppercase bg-green text-lime-500 font-bold p-2 text-xs shadow rounded">Precio: ${{$products->price}}</span>  
          <span class="uppercase bg-yellow-dark text-grey-darkest font-bold p-2 text-xs shadow rounded">Cantidad disponible: {{$products->stock}}</span>  
        </div>
            <form method="POST" action="{{route('products.cart.store', ['product'=>$products->id])}}" class="uppercase self-end bg-green font-bold text-white px-6 py-4 rounded hover:bg-green-dark duration-4">
                @csrf
          <button class="bg-lime-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
            Agregar al carrito
          </button>           
          </form>
          <a href="{{route('UserProduct.show', ['id'=> $products->id])}}" class="text-indigo-600 hover:text-indigo-900 rounded">Detalle</a>
      </div>
     </div>
  </body>
</html>