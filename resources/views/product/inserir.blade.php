@extends('layouts.main')
@section('conteudo')
        <div class="container"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Inserir Produtos                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.loja') }}" method="POST">
                                <!-- @csrf - gera um token que o laravel verifica a autenticidade, isso por usar blade -->
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Descrição</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="">Preço</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <a href="{{route('product.index')}}" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
