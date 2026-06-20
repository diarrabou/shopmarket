<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Mes Produits</h2>
        <a href="{{ route('seller.products.create') }}" class="btn btn-primary mb-3">
            Ajouter un produit
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 100px; height: 100px;">Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nom }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                        @endif
                    </td>
                    <td>{{ $product->nom }}</td>
                    <td>{{ $product->prix }} €</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('seller.products.edit', $product) }}" class="btn btn-warning btn-sm">
                            Modifier
                        </a>
                        <form method="POST" action="{{ route('seller.products.destroy', $product) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Aucun produit trouvé</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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