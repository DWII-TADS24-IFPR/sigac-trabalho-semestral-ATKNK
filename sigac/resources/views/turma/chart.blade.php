<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIGAC</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.navbar')

    <div class="container mt-1 d-flex align-items-center justify-content-center flex-column">
        <div id="myChart" style="max-width:700px; height:400px"></div>
    </div>

    @include('layout.footer')
</body>

</html>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Your Function
    function drawChart() {

        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Aluno', 'Horas'],
            ['TEST', 150],
            ['TEST', 130],
            ['TEST', 44],
            ['TEST', 24],
            ['TEST', 15]
        ]);

        // Set Options
        const options = {
            title: 'Horas Complementares por Alunos'
        };

        // Draw
        const chart = new google.visualization.BarChart(document.getElementById('myChart'));
        chart.draw(data, options);

    }
</script>
