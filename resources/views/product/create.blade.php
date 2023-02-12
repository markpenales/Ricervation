<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>

<body>
    <form method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label for="name">Product Description</label>
        <input type="text" name="description" value="{{ old('description') }}">

        <label for="name">Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}">

        <label for="name">Image</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Create Product</button>
    </form>

    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif

    @error('name')
        {{$message}}
    @enderror
    </body>

    </html>
