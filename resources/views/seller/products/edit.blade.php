<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Modifier le produit</h2>
        <form method="POST" action="{{ route('seller.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $product->nom }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" value="{{ $product->prix }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Catégorie</label>
                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                    @endforeach
                </select>
            </div>
            <!-- IMAGE -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-3">
                <label>Image du produit</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</x-app-layout>
<style>

body{
    background: transparent !important;
}
label{
    color:white;
}
.animated-bg{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:-1;

    background:linear-gradient(
        -45deg,
        #0f172a,
        #1e3a8a,
        #2563eb,
        #06b6d4
    );

    background-size:400% 400%;
    animation:bgmove 12s ease infinite;
}

@keyframes bgmove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.card{
    background:rgba(33, 31, 31, 0.56);
    backdrop-filter:blur(15px);
    border:none;
    border-radius:20px;
    color:white;
}

table{
    background:rgba(123, 117, 117, 0.75) !important;
    backdrop-filter:blur(15px);
}

table th{
    color:white !important;
    background:rgba(116, 114, 114, 0.64) !important;
}

table td{
    color:white !important;
    background:rgba(103, 100, 100, 0.64) !important;
}

h1,h2,h3,h4,h5{
    color:white;
}

</style>