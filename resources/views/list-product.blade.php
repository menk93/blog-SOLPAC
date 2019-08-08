@extends('layout')

@section('title')
    Home
@endsection

@section('content')
<body>

  @if (session('message'))
  <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" 
      data-dismiss="alert"
      aria-label="close">&times;</a>
  {{ session('message') }}
  </div>
  @endif
  <div id="line-one">   
  <div class="container">
    <div class="row">
        <div class="col-md-12" id="center"> 
            <h1><b>Produtos</b></h1>
            <br>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <ol class="breadcrumb">
              <li><a class="current-demo" href="/">Home</a></li>                  
              <li class="active">Produtos</li>
          </ol>
          <br>
          <a href="{{route('product.create')}}" 
              class="btn btn-default btn-sm pull-right">
              <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
          
          <div id="pesquisa" class="pull-right">
              <form class="form-group" method="post" 
                    action="#">                                   
                  <input type="text" name="pesquisar" 
                          class="form-control input-sm pull-left" 
                          placeholder="Pesquisar por nome..." required> 
                  <button class="btn btn-default btn-sm pull-right" 
                          id="color"> 
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
              </form>
          </div>
        </div>           
      </div>
      <div class="row">
          <div class="col-md-12">   
              <br />
              <h4 id="center"><b>PRODUTOS CADASTRADOS ({{$total}})</b></h4>
              <br>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th id="center">Código</th>
                              <th>Nome</th>
                              <th>Descrição</th>
                              <th id="center">Quantidade</th>
                              <th>Preço</th>                
                                           
                              <th id="center">Ações</th>                
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $product)
                          <tr>
                              <td id="center">{{$product->id}}</td>
                              <td title="Nome">{{$product->name}}</td>
                              <td title="Descrição">{{$product->description}}</td>
                              <td title="Quantidade" id="center">{{$product->quantity}}</td>
                              <td title="Preço">R$ {{number_format($product->price, 2,',','.')}}</td> 
                              
                              <td id="center">
                                  <a href="{{route('product.edit', $product->id)}}" 
                                      data-toggle="tooltip" 
                                      data-placement="top"
                                      title="Alterar"><i class="fa fa-pencil"></i></a>
                                  &nbsp;<form style="display: inline-block;" method="POST" 
                                              action="{{route('product.destroy', $product->id)}}"                                                        
                                              data-toggle="tooltip" data-placement="top"
                                              title="Excluir" 
                                              onsubmit="return confirm('Confirma exclusão?')">
                                      {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                      <button type="submit" style="background-color: #fff">
                                          <a><i class="fa fa-trash-o"></i></a>                                                    
                                      </button></form></td>               
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

</body>


