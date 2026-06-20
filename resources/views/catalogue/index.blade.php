
<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Catalogue des Produits</h2>

        <div class="row">
            @foreach($products as $product)
            
                <div class="col-md-4 mb-3">
                    <div class="card">

                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 class="card-img-top"
                                 height="200" style="max-width: 100%; max-height: 200px;">
                        @endif

                        <div class="card-body">
                            <h5>{{ $product->nom }}</h5>

                            <p>
                                {{ $product->description }}
                            </p>

                            <p>
                                <strong>{{ $product->prix }} €</strong>
                            </p>

                            <p>
                                Stock : {{ $product->stock }}
                            </p>
                        </div>
                        <div class="card-footer">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button style="background-color: #2883a7; border-color: #2841a7; border: 2px double #2841a7; border-radius: 10px;" type="submit" class="btn btn-success">
                                Ajouter au panier
                            </button>
                        </form>
                        </div>

                    </div>
                </div>
            @endforeach
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

h1,h2,h3,h4,h5{
    color:white;
}

</style>