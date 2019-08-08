@extends('layout')

@section('title')
    Home
@endsection

@section('content')

    <body>
        <div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">              
                        <h1><b>Categoria</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a class="current-demo" href="/">Home</a></li>                  
                            <li><a href="{{route('category.index')}}">Categorias</a></li>                  
                            <li class="active">Alteração</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>ALTERAÇÃO DOS DADOS DA CATEGORIA</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('category.update', $category->id)}}" 
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       value="{{$category->name}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" name="description" 
                                       class="form-control" 
                                       value="{{$category->description}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inactive">Inativo</label>
                                <select class="form-control" type="boolean" name="inactive" 
                                       class="form-control" required>
                                    <option value="1" selected="selected">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>    
                        </div>                 
                        <div class="col-md-6">
                            <div class="form-group">
                                
                            </div>
                        </div>                       
                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Alterar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
