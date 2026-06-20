

<x-app-layout>

    <div class="animated-bg"></div>

    <div class="container py-5">

        <h1 class="text-center display-4 fw-bold text-white mb-5">
            🚀 Dashboard Administrateur
        </h1>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $users }}</h2>
                        <p>👥 Utilisateurs</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $vendeurs }}</h2>
                        <p>🏪 Vendeurs</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $acheteurs }}</h2>
                        <p>🛒 Acheteurs</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $products }}</h2>
                        <p>📦 Produits</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $categories }}</h2>
                        <p>📂 Catégories</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h2 class="counter">{{ $orders }}</h2>
                        <p>📋 Commandes</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card success-card">
                    <div class="card-body text-center">
                        <h2>{{ $ca }} €</h2>
                        <p>💰 Chiffre d'affaires</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5">
            <div class="card mt-5 p-4">
                <h4 class="text-center mb-4">
                    📈 Aperçu des statistiques
                </h4>

                <canvas id="statsChart"></canvas>
            </div>
        </div>
        <style>

    body{
        background:#0f172a;
    }

    .animated-bg{
        position:fixed;
        width:100%;
        height:100%;
        top:0;
        left:0;
        z-index:-1;
        background:linear-gradient(-45deg,#0f172a,#1e3a8a,#2563eb,#06b6d4);
        background-size:400% 400%;
        animation:bgmove 12s ease infinite;
    }

    @keyframes bgmove{
        0%{background-position:0% 50%;}
        50%{background-position:100% 50%;}
        100%{background-position:0% 50%;}
    }

    .stat-card{
        background:rgba(255,255,255,0.15);
        backdrop-filter:blur(15px);
        border:none;
        border-radius:20px;
        color:white;
        transition:.4s;
        overflow:hidden;
    }

    .stat-card:hover{
        transform:translateY(-10px) scale(1.05);
        box-shadow:0 15px 35px rgba(0,0,0,.4);
    }

    .success-card{
        background:linear-gradient(45deg,#16a34a,#22c55e);
    }

    .counter{
        font-size:42px;
        font-weight:bold;
    }

    .stat-card p{
        font-size:18px;
    }


    body{
        background: transparent !important;
    }

    main{
        background: transparent !important;
    }

    .min-h-screen{
        background: transparent !important;
    }

    .bg-white{
        background: transparent !important;
    }

    </style>
    <script>

    document.addEventListener("DOMContentLoaded", function(){

        document.querySelectorAll('.counter').forEach(counter=>{

            let target=parseInt(counter.innerText);

            let count=0;

            let speed=Math.ceil(target/50);

            let interval=setInterval(()=>{

                count+=speed;

                if(count>=target){
                    counter.innerText=target;
                    clearInterval(interval);
                }else{
                    counter.innerText=count;
                }

            },30);

        });

    });

    </script>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const ctx = document.getElementById('statsChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Utilisateurs',
            'Vendeurs',
            'Acheteurs',
            'Produits',
            'Commandes'
        ],
        datasets: [{
            label: 'Statistiques',
            data: [
                {{ $users }},
                {{ $vendeurs }},
                {{ $acheteurs }},
                {{ $products }},
                {{ $orders }}
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});

</script>