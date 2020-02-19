@extends('layouts/app')
@section('content') 

<div class="back">
<br> 
    <div class="centercr">
        <center>
        <form action="/pvis" method="GET">
        <h3>Pequisar</h3>
        <div class="col-md-4">
            <div class="col">
        <input type="text" name="pesq" class="form-control" placeholder="Pesquisar">
        <br>
        <input type="submit" value="Pesquisar" class="btn btn-outline-warning">
        </div>
        </div>
        </form>
        </center>
    </div>
<br>
    <br>
    <center>                  
    @forelse ($Utente as $utt)
        <div class="centercr">     
            <p>Id: {{$utt->Id}}</p>
            <p>Nome: {{$utt->Nome}}</p>
            <div class="row">
                <div class="col">
                    <a href="/utente/{{$utt->Id}}/edit" style="margin:1px" class="btn btn-outline-warning">Editar</a>
                </div>

                <div class="col">
                    <a href="/utente/{{$utt->Id}}" style="margin:1px" class="btn btn-outline-light">Mostrar</a>
                </div>

                <div class="col">
                    <form class="" action="/utente/{{$utt->Id}}" style="margin:1px" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" name="" class="btn btn-outline-danger" value="Apagar">
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