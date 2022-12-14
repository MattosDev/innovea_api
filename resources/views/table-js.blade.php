@extends('layouts.layout')

@section('script')
    <script>
        $(document).ready( function () {
            $.ajax({
                method: "GET",
                url: "https://newsapi.org/v2/everything?q=bitcoin&sortBy=publishedAt&apiKey=1129f43107014a75b1f00717c02a8b34"
            })
            .done(function( data ) {
                console.log(data.articles);
                $('#table').DataTable({
                    data: data.articles,
                    columns: [
                        { data: 'author' },
                        { data: 'title' },
                        { data: 'description' }
                    ],
                    language: {
                        processing: "Processando...",
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        infoEmpty: "Sem registros",
                        infoFiltered: 'filtrados de _MAX_ registros',
                        emptyTable: "Nenhum registro avaliado na tabela",
                        zeroRecords: "Nenhum registro encontrado para a busca",
                        lengthMenu: "Mostrando _MENU_ registros",
                        searchPlaceHolder: 'buscar',
                        search: 'Digite sua busca:',
                        decimal: ",",
                        thousands: ".",
                        paginate: {
                            first: '<<',
                            last: '>>',
                            previous: '<',
                            next: '>'
                        }
                    }
                });
            });
        });
    </script>
@endsection

@section('content')
    <h3 style="margin-bottom: 50px">Consulta na API utilizando apenas JavaScript</h2>
    <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th scope="col">Autor</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
    </table>
@endsection
