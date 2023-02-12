<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
</head>

<body>

    @if(session()->has('deleted'))
        {{session()->get('deleted')}}
    @endif

    @if (count($products) == 0)
        No products available
    @else
        <table>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Products Sold</th>
                <th>Actions</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="NFA rice" style="width: 100px"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->sold_quantity }}</td>
                    <td><button onclick="deleteProduct(this)" id="{{ $product->id }}">Delete</button></td>
                </tr>

                // TODO: Make a model for confirmation of delete
                <form method="POST" id="delete-product-{{ $product->id }}"
                    action="{{ route('delete-product', $product->id) }}">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </table>

        <script>
            function deleteProduct(element) {
                let formID = 'delete-product-' + element.id;
                document.getElementById(formID).submit();
            }
        </script>
    @endif
</body>

</html>
