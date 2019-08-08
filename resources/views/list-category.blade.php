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
          <h1><b>Categorias</b></h1>
          <br>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
              <ol class="breadcrumb">
                  <li><a class="current-demo" href="/">Home</a></li>                  
                  <li class="active">Categorias</li>
              </ol>              
          </div>          
      </div>
      <div class="row">
        <div class="col-md-12">
          <br>
          <a href="{{route('category.create')}}" class="btn btn-default btn-sm pull-right">
              <span class="glyphicon glyphicon-plus"></span> 
              Adicionar
          </a>
          <div id="pesquisa" class="pull-right">
            <form class="form-group" method="post" action="#">                                   
                <input type="text" name="pesquisar" 
                        class="form-control input-sm pull-left" 
                        placeholder="Pesquisar por nome..." required> 
                <button class="btn btn-default btn-sm pull-right" id="color"> 
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
          </div>
        </div>           
      </div>
      <div class="row">
        <div class="col-md-12">   
          <br />
          <h4 id="center"><b>CATEGORIAS CADASTRADAS ({{$total}})</b></h4>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                  <tr>
                      <th id="center">Código</th>
                      <th>Nome</th>
                      <th>Descrição</th>            
                      <th id="center">Inativo</th>
                      <th id="center">Ações</th>
                  </tr>
              </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td id="center">{{$category->id}}</td>
                    <td title="Nome">{{$category->name}}</td>
                    <td title="Descrição">{{$category->description}}</td>
                    <td id="right" title="Inativo">{{$category->inactive}}</td>
                    <td id="center">
                      <a href="{{route('category.edit', $category->id)}}" 
                          data-toggle="tooltip" 
                          data-placement="top"
                          title="Alterar"><i class="fa fa-pencil"></i></a>
                      &nbsp;
                      <form style="display: inline-block;" method="POST" 
                                  action="{{route('category.destroy', $category->id)}}"                                                        
                                  data-toggle="tooltip" data-placement="top"
                                  title="Excluir" 
                                  onsubmit="return confirm('Confirma exclusão?')">
                          {{method_field('DELETE')}}{{ csrf_field() }}                                                
                          <button type="submit" style="background-color: #fff">
                              <a><i class="fa fa-trash-o"></i></a>                                                    
                          </button>
                      </form>
                    </td>                    
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
