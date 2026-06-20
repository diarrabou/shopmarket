<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Catalogue des produits</h2>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">

                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;">
                        @endif

                        <div class="card-body">
                            <h5>{{ $product->nom }}</h5>

                            <p>
                                Prix : {{ $product->prix }} €
                            </p>

                            <p>
                                Stock : {{ $product->stock }}
                            </p>

                            <p>
                                {{ $product->description }}
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <p>Aucun produit disponible.</p>
            @endforelse
        </div>
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