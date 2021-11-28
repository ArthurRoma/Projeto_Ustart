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
                    {!! Form::open(['class' => 'row g-3', 'name'=>'form', 'route'=>['locadora.atualizar', $locadora->id], 'method'=>'put']) !!}
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="filme" class="form-label">Filme</label>
                            <input type="text" class="form-control" id="filme" name="filme" value="{{ $locadora->filme}}">
                        </div>
                        <div class="col-md-6">
                            <label for="genero" class="form-label">Gênero</label>
                            <input type="text" class="form-control" id="genero" name="genero" value="{{ $locadora->genero }}">
                        </div>
                        <div class="col-md-6">
                            <label for="data_de_lancamento" class="form-label">Data de lançamento</label>
                            <input type="date" class="form-control" id="data_de_lancamento" name="data_de_lancamento" value="{{ $locadora->data_de_lancamento }}">
                        </div>
                        <div class="col-md-6">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control"  id="descricao" name="descricao" value="{{ $locadora->descricao }}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection