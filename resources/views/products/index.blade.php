<div class="be-content be-icons-list">
    <div class="page-head">
        <h2 class="page-head-title">Produtos</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Vendas</a></li>
            <li class="active">Produtos</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body xs-pb-10">
                        <form action="#" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-12">
                                    <a href="javascript:" class="btn btn-success btn-lg" onclick="add_model('product')">
                                        <i class="icon icon-left mdi mdi-plus"></i>
                                        Novo Produto
                                    </a>
                                    <a href="javascript:" class="btn  btn-warning btn-lg" >
                                        <i class="icon icon-left mdi mdi-format-list-bulleted"></i>
                                        Lista de Categorias
                                    </a>

                                </div>
                                <div class="col-md-4 col-sm-12 pull-right">
                                    <div class="input-group input-search">
                                        <input type="text" placeholder="Pesquisar" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default">
                                                <i class="icon mdi mdi-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12
                       ">
                <div id="accordion1" class="panel-group accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                    <i class="icon mdi mdi-chevron-down"></i>
                                    Filtros
                                </a>
                            </h4>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in">
                            <br>
                            <div class="panel-body">
                                <div class="col-xs-3">
                                    <select id="icon-category" class="select2">
                                        <option value="">Categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-5">
                                    <div class="be-checkbox be-checkbox-color has-success inline">
                                        <input id="check9" type="checkbox" >
                                        <label for="check9 ">Promoção</label>
                                    </div>
                                    <div class="be-checkbox be-checkbox-color inline">
                                        <input id="check10" type="checkbox">
                                        <label for="check10">Fora de Linha</label>
                                    </div>
                                    <div class="be-checkbox be-checkbox-color has-warning inline">
                                        <input id="check11" type="checkbox">
                                        <label for="check11">Sem estoque</label>
                                    </div>
                                    <div class="be-checkbox be-checkbox-color has-danger inline">
                                        <input id="check12" type="checkbox">
                                        <label for="check12">Inativo</label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-body">
                        <table class="table table-striped table-hover table-fw-widget">
                            <thead>
                            <tr>
                                <th style="width:10%;">Foto</th>
                                <th style="width:10%;">Codigo Interno</th>
                                <th style="width:15%;">Nome</th>
                                <th style="width:15%;">Categoria</th>
                                <th style="width:15%;">Custo</th>
                                <th style="width:10%;">Qtd. em estoque</th>
                                <th style="width:5%;"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr id="tr-{{ $product->id }}" class="">
                                    <td>
                                        @if($product->photo == "")
                                            <img src="{{ '../../images/noimage.jpg' }}" alt="" style="max-width: 50px;">
                                        @else
                                            <img src="{{ '../../'.$product->photo }}" alt="" style="max-width: 50px;">
                                        @endif
                                    </td>
                                    <td class="cell-detail">
                                        <span>
                                            {{ $product->internal_code }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $product->category_name }}</td>
                                    <td class="">
                                        R${{ $product->price }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td class="text-right">

                                        <div class="col-md-6">
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" type="button" class="btn btn-primary" title="Editar Produto">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger" title="Excluir Produto?" onclick="verify_model({!! $product->id !!})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <input type="hidden" id="model_text" value="Tem certeza que deseja excluir este produto?">

                                            {{--<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                Ação
                                                <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu pull-right">
                                                <li><a href="edit-produto.html">Editar</a></li>
                                                <li><a href="#">Inativar Produto</a></li>
                                            </ul>--}}

                                    </td>
                                </tr>
                            @endforeach

                            {{--<tr class="promo">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>
                                    <span class="cell-detail-description-promocao">
                                                    Condição especial
                                                </span>
                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>

                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="fora-linha">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>
                                    <span class="cell-detail-description-fora-linha">
                                                    Fora de Linha
                                                </span>
                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>

                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="sem-estoque">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>
                                    <span class="cell-detail-description-sem-estoque">
                                                    Sem estoque
                                                </span>
                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>

                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="excluido">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>
                                    <span class="cell-detail-description-excluido">
                                                    Inativo
                                                </span>
                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="">
                                <td>
                                    2583
                                </td>
                                <td class="cell-detail">
                                                <span>
                                                    Pedido de Venda 235
                                                </span>

                                </td>
                                <td>
                                    2583
                                </td>
                                <td class="">
                                    GS0583
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Ação
                                            <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="edit-produto.html">Editar</a></li>
                                            <li><a href="#">Inativar Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



