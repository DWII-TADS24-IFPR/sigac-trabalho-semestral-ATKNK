@extends('layout.app')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h1>{{ $turma->curso->sigla }} {{ $turma->ano }}</h1>

        <div class="d-flex flex-row align-items-center">
            <a type="link" class="btn btn-warning m-1 shadow-sm" href="/turma/{{ $turma->id }}/edit">Editar</a>
            <form class="m-0 shadow-sm" action="{{ route('turma.destroy', $turma->id) }}" method="POST"
                onsubmit="return confirm('Está certo que deseja excluir esta turma?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>

    <div class="d-flex flex-row">
        <div class="d-flex flex-column container mb-3 p-2 border border-tertiary rounded shadow-sm">
            <div class="mx-5 my-2">
                <h3>Alunos:</h3>
                @foreach ($alunos as $aluno)
                    <div class="d-flex flex-row align-items-center justify-content-between my-1">
                        <p>{{ $aluno->nome }}</p>
                        <a class="btn btn-secondary" href="/aluno/{{ $aluno->id }}">Exibir</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex flex-column container mb-3 p-2 border border-tertiary rounded shadow-sm">
            <div class="mx-5 my-2">
                <h3>Gráfico:</h3>
                <div id="myChart" style="max-width:700px; height:400px"></div>
            </div>
        </div>
    </div>
@endsection

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['Aluno', 'Horas'],
            @foreach ($dados as [$nome, $horas])
                ['{{ $nome }}', {{ $horas }}],
            @endforeach
        ]);

        const options = {
            title: 'Carga Horária por Aluno',
            legend: {
                position: 'none'
            },
            hAxis: {
                title: 'Horas',
                minValue: 0
            },
            chartArea: {
                left: 150,
                top: 50,
                width: '70%',
                height: '80%'
            },
            bar: {
                groupWidth: '35%'
            },
        };


        const chart = new google.visualization.BarChart(document.getElementById('myChart'));
        chart.draw(data, options);

    }
</script>
