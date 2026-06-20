<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
<div class="container"> 
        <a class="navbar-brand text-white" href="{{ route('home') }}"> 
            ShopMarket 
        </a> 
 
        <div class="d-flex justify-content-between w-100"> 
 
            <ul class="navbar-nav flex-row"> 
 
                <li class="nav-item me-3"> 
                    <a class="nav-link text-white" href="{{ route('home') }}"> 
                        Accueil 
                    </a> 
                </li> 
 
                @auth 
 
                    @if(Auth::user()->role === 'admin') 
                        <li class="nav-item me-3"> 
                            <a class="nav-link text-white fw-semibold" 
                            href="{{ route('categories.index') }}"> 
                            Gestion Catégories 
                            </a> 
                        </li>
 
                        <li class="nav-item me-3"> 
                            <a class="nav-link text-white" 
                               href="{{ route('admin.dashboard') }}"> 
                                Dashboard Admin 
                            </a> 
                        </li> 
 
                    @endif 
 
                    @if(Auth::user()->role === 'vendeur')
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="{{ route('seller.dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="{{ route('seller.products') }}">
                            Mes Produits
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white"href="{{ route('seller.orders') }}">
                            Articles vendus
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="{{ route('seller.ventes') }}">
                            Ventes
                        </a>
                    @endif
 
                    @if(Auth::user()->role === 'acheteur')

                        <li class="nav-item me-3">
                            <a class="nav-link text-white"
                            href="{{ route('catalogue') }}">
                                Espace Acheteur
                            </a>
                        </li>

                        <li class="nav-item me-3">
                            <a class="nav-link text-white"
                            href="{{ route('cart.index') }}">
                                Mon Panier
                            </a>
                        </li>

                    @endif
               @endauth 
 
            </ul> 
 
        <ul class="navbar-nav flex-row"> 
 
                @auth 
 
                    <li class="nav-item me-3"> 
                        <span class="nav-link text-white"> 
                            {{ Auth::user()->name }} 
                        </span> 
                    </li> 
 
                    <li class="nav-item"> 
                        <form method="POST" 
                              action="{{ route('logout') }}"> 
                            @csrf 
 
                            <button class="btn btn-danger btn-sm"> 
                                Déconnexion 
                            </button> 
                        </form> 
                    </li> 
 
                @else 
 
                    <li class="nav-item me-3"> 
                        <a class="nav-link text-white" 
                           href="{{ route('login') }}"> 
                            Connexion 
                        </a> 
                    </li> 
 
                <li class="nav-item"> 
                <a class="nav-link text-white" 
                href="{{ route('register') }}"> 
                Inscription 
                </a> 
                </li> 
            @endauth 
      </ul> 
</div> 
</div> 
</nav>