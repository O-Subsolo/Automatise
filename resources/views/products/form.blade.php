<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Produtos | Serviço</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Cadastro</a></li>
            <li class="active">Produtos | Serviço</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <!--Basic forms-->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Adicionar Produtos | Serviço
                        <span class="panel-subtitle"></span>
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
                            @method('PUT')
                        @else
                            <form action="{{ route('product.store') }}" method="POST">
                        @endif

                        @csrf
                            <div class="row no-margin-y">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Nome Produto</label>
                                    <input type="text" name="name" placeholder="AK-47" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo de Fabrica</label>
                                    <input type="text" placeholder="132385hnldkf898" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo Interno <i class="fas fa-info-circle" title="Este Código será gerado automaticamente"></i></label>
                                    @if($edit)
                                        <input type="text" name="internal_code" value="{{ $product->internal_code }}" readonly class="form-control input-sm">
                                    @else
                                        <input type="text" name="internal_code" placeholder="Este Código será gerado automaticamente" readonly class="form-control input-sm">
                                    @endif
                                </div>
                                <div class="form-group col-md-2 col-sm-12 ">
                                    <label>Status</label>
                                    <select name="status" class="form-control input-sm">
                                        <option value="1" selected>Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Marca</label>
                                    <input type="text" placeholder="Andrey Kalishnikov URSS" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Unidade de Medida</label>
                                    <select name="unit" id="unit" class="form-control input-sm">
                                        <option value="">Selecione</option>
                                        @foreach($units as $un)
                                            @if($edit)
                                                <option value="{{ $un->id }}" @if($un->id == $product->unit) selected @endif>{{ $un->name }}</option>
                                            @else
                                                <option value="{{ $un->id }}">{{ $un->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Quantidade</label>
                                    <input type="number" placeholder="5000" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Código GTIN/EAN</label>
                                    <input type="text" placeholder="0000.00.00" maxlength="13" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>NCM</label>
                                    <input type="text" placeholder="AK-47 tem NCM?" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Localização no estoque</label>
                                    <input type="text" placeholder="Do lado da Claymore" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque mínimo</label>
                                    <input type="text" placeholder="1" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque máximo</label>
                                    <input type="text" placeholder="9999" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12 ">
                                    <label>Tipo de classificação</label>
                                    <select class="form-control input-sm">
                                        <option value="">Selecione</option>
                                        @foreach($types as $t)
                                            <option value="{{ $t->id }}">{{ $t->code }} - {{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-xs-6">
                                    <label for="">Opções</label>
                                    <input type="text" name="variation_1" placeholder="Tamanho, cor e etc" class="form-control input-sm">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="">Opções</label>
                                    <input type="text" name="variation_2" placeholder="Tamanho, cor e etc" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-xs-12">
                                    <label>Observações do Produto</label>
                                    <textarea rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Precificação
                        <span class="panel-subtitle"></span>
                    </div>
                    <div class="panel-body">
                        <div class="row no-margin-y">
                            <div class="form-group col-md-3 col-sm-12">
                                <label>Preço de Custo</label>
                                <input type="number" placeholder="0,00" class="form-control input-sm">
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de ICMS</label>
                                <input type="number" placeholder="%" class="form-control input-sm">
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de IPI</label>
                                <input type="number" placeholder="%" class="form-control input-sm">
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de PIS</label>
                                <input type="number" placeholder="%" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="row no-margin-y">
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Alíquota do frete</label>
                                <input type="number" placeholder="%" class="form-control input-sm">
                            </div>
                            <div class="form-group col-md-1 col-sm-12">
                                <p class="pgt-out">OU</p>
                            </div>
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Valor Frete</label>
                                <input type="number" placeholder="0,00" class="form-control input-sm">
                            </div>

                            <div class="form-group col-md-2 col-sm-12">
                                <label>Comissão vendedor</label>
                                <input type="number" placeholder="%" class="form-control input-sm">
                            </div>
                            <div class="form-group col-md-1 col-sm-12">
                                <p class="pgt-out">OU</p>
                            </div>
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Valor Comissão</label>
                                <input type="number" placeholder="0,00" class="form-control input-sm">
                            </div>
                        </div><br>
                        <div class="row no-margin-y">
                            <div class="form-group col-md-2 col-sm-12 has-success">
                                <label>Lucro Zero</label>
                                <input type="text" placeholder="" readonly="readonly" value="" class="form-control input-sm">
                            </div>
                        </div>
                        <br>
                            <div class="row xs-pt-15">
                                <div class="col-xs-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-success btn-lg">
                                            <i class="icon icon-left mdi mdi-check"></i>
                                            Salvar
                                        </button>
                                        <button class="btn btn-space btn-default btn-lg">Cancelar</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
