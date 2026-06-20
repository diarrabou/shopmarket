<div class="animated-bg"></div>
<x-app-layout>
    <div class="container mt-4">
        <h2>Ajouter une catégorie</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button class="btn btn-success">Enregistrer</button>
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
    background:rgba(151, 137, 137, 0.75) !important;
    backdrop-filter:blur(15px);
}

table th{
    color:white !important;
    background:rgba(166, 161, 161, 0.64) !important;
}

table td{
    color:white !important;
    background:rgba(137, 131, 131, 0.64) !important;
}

h1,h2,h3,h4,h5{
    color:white;
}

</style>