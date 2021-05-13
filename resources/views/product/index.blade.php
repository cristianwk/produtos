@extends('layouts.main')
@section('conteudo')
        <div class="container"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Lista de Produtos
                            <a href="{{ route('product.inserir') }}" class="btn btn-success btn-sm float-right">Novo</a>
                        </div>
                        <dir class="card-body">
                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{ session('info')}}
                                </div>
                            @endif
                            <table class="table table-hover table-sm">
                                <thead>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    @foreach($product as $prod)
                                    <tr>
                                        <td>
                                            {{ $prod->description }}
                                        </td>
                                        <td>
                                            {{ $prod->price }}
                                        </td>
                                        <td>
                                            <a href="{{ route('product.editar', $prod->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                            <a href="javascript: document.getElementById('delete-{{ $prod->id }}').submit()" class="btn btn-danger btn-sm">Excluir</a>

                                            <form id="delete-{{ $prod->id }}" action="{{ route('product.excluir', $prod->id) }}" method="POST">
                                             {!! method_field('delete') !!}
                                             {{ csrf_field() }}   
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </dir>
                        <div class="card-footer">
                            Bem Vindo {{ auth()->user()->name }}
                            <a href="javascript:document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Logout</a>

                            <form action="{{ route('logout') }}" id="logout" style="display:none" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
