@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Locadora') }}
                    <a href="{{ route("home") }}" type="button" class="float-right btn btn-secondary">Voltar</a>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('locadora.inserir') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-md-6">
                            <label for="filme" class="form-label">Filme</label>
                            <input type="text" class="form-control" id="filme" name="filme" value="{{ old('filme') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="genero" class="form-label">Gênero</label>
                            <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero') }}">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="data_de_lancamento" class="form-label">Data de lançamento</label>
                            <input type="date" class="form-control" id="data_de_lancamento" name="data_de_lancamento" value="{{ old('data_de_lancamento') }}">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control"  id="descricao" name="descricao" value="{{ old('descricao') }}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection