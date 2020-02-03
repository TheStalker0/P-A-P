@extends('layouts/app')
@section('content') 

<div class="fs">
    <br>
    <center>                  
    @forelse ($servico as $ser)
        <div class="centercr">     
            <p>Id: {{$ser->id}}</p>
            <p>Serviço: {{$ser->servico}}</p>
            <p>Categoria: {{$ser->categoria}}</p>
            <div class="row">
                <div class="col">
                    <a href="/servico/{{$ser->id}}/edit" style="margin:1px" class="btn btn-outline-warning">Editar</a>
                </div>
                <div class="col">
                    <form class="" action="/servico/{{$ser->id}}" style="margin:1px" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-outline-danger" value="Apagar">
                      </form>
                </div>
            </div>
        </div>
    @empty
        <tr>
            <div class="centercr">Lista Vazia</div>
        </tr>
    @endforelse
    </center>
<br>
</div>

@endsection