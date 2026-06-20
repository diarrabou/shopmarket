
<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Mon panier</h2>
        <table class="table table-bordered">
            <tr>
                <th>Produit</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
                <th>Action</th>
            </tr>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->product->nom }}</td>
                    <td>
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->nom }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                        @endif
                    </td>
                    <td>{{ $item->product->prix }} €</td>
                    <td>{{ $item->quantite }}</td>
                    <td>{{ $item->product->prix * $item->quantite }} €</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <h4>Total : {{ $total }} €</h4>
        <form method="POST" action="{{ route('orders.store') }}">
           @csrf
           <button class="btn btn-primary">Valider la commande</button>
        </form>
    </div>
</x-app-layout>
<style>

body{
    background: transparent !important;
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
