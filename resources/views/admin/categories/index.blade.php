<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2 class="text-center text-white fw-bold mb-4">
    📂       Gestion des Catégories
        </h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
            Ajouter
        </a>
        <table class="table table-bordered">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->nom }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
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
