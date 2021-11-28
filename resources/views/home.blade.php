@extends('layouts.app')

@section('content')
<style>
    .btn-danger {
        margin-left: 10px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Locadora') }}
                <a href="{{ route("locadora.criar") }}" type="button" class="float-right btn btn-primary">Adicionar Locadora</a>
            </div>
            <div class="card-body">
                    @if (isset($locadoras) && !$locadoras->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Filme</th>
                                <th scope="col">Gênero</th>
                                <th scope="col">Data de lançamento</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locadoras as $locadora)
                                    <tr>
                                        <th scope="row">{{ $locadora->id }}</th>
                                        <td>{{ $locadora->filme }}</td>
                                        <td>{{ $locadora->genero }}</td>
                                        <td>{{ $locadora->data_de_lancamento }}</td>
                                        <td>{{ $locadora->descricao }}</td>
                                        <td class="row">
                                            <a href="{{ route("locadora.editar", $locadora->id) }}" type="button" class="btn btn-secondary">Editar</a>
                                            {!! Form::open(['class' => '', 'name'=>'form', 'route'=>['locadora.excluir', $locadora->id], 'method'=>'delete']) !!}
                                                @method('delete')
                                                @csrf         
                                                <button  type="submit" class="btn btn-danger">Excluir</button>                                    
                                            </form>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

               