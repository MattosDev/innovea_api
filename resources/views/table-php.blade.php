@extends('layouts.layout')

@section('content')
    <h3 style="margin-bottom: 50px">Consulta na API utilizando a biblioteca em PHP</h2>
    <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th scope="col">Autor</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->author }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $paginate->links() !!}
    </div>
@endsection
