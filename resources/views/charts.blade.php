@extends('layouts.app')

@section('content')
<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<style type="text/css">
    body{
        font-family: 'Roboto Mono', monospace;
    }
    h1{
        text-align: ;
        font-size:35px;
        font-weight:900;
    }
</style>
    
<body>
    <h1 class="ml-4 text-indigo-700">Graphiques pour suivre vos dépenses :</h1>
    <div class="graphBox">
                
        <div class="box">
            <canvas id="myChart" ></canvas>
        </br>
        <h2 class="text-center font-bold text-gray-500">La distribution des coûts des dépenses </h2>
        </div>
        <div class="box">
            <canvas id="chart2" ></canvas>
        </br>
            <h2 class="text-center font-bold text-gray-500">Graphique represnet les dépenses et les cotisations par rapport au mois</h2>
        </div>
    </div>

</body>
  



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
    var labelss =  {{ Js::from($labelss) }};
    var users2 =  {{ Js::from($datass) }};
    var s =  {{ Js::from($s) }};
    var l =  {{ Js::from($l) }};
    var x =  {{ Js::from($x) }};

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart2 = document.getElementById('chart2').getContext('2d');
    
    var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['<200 Dh','Entre 200 & 500 Dh', '<500 Dh'],
        datasets: [{
            label: 'deponses',
            data: [s,l,x],
            backgroundColor: [
                'rgb(255,77,166)',
                'rgb(77,255,225)',
                'rgb(76,0,230)',
                
            ],
            
            
        }]
    },
    options: {
       responsive: true,
       }
});

var myChart= new Chart(chart2, {
 
    data: {
        datasets: [{
            type: 'bar',
            label: ' les dépenses',
            data: users,
            backgroundColor: [
                'rgb(255,77,166)',
                 'rgb(179,129,255)',
                'rgb(77,255,225)',
                'rgb(204,255,153)',
                'rgb(76,0,230)',
                
            ],
        }, {
            type: 'line',
            label: ' les cotisations',
            data: users2,
            borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
        }],
        labels: labels,
    },
    options: {
       responsive: true,
    }
});
</script>
@endsection
