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
                        <form>
                            <div class="row no-margin-y">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Nome Produto</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo de Fabrica</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo Interno</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-2 col-sm-12 ">
                                    <label>Status</label>
                                    <select class="form-control input-sm">
                                        <option>Ativo</option>
                                        <option>Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Marca</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Unidade</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Código GTIN/EAN</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>NCM</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Localização no estoque</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque mínimo</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque máximo</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12 ">
                                    <label>Tipo de classificação</label>
                                    <select class="form-control input-sm">
                                        <option value="">Selecione</option>
                                        <option value="00">00 - Mercadoria para Revenda</option>
                                        <option value="01">01 - Matéria-Prima</option>
                                        <option value="02">02 - Embalagem</option>
                                        <option value="03">03 - Produto em Processo</option>
                                        <option value="04">04 - Produto Acabado</option>
                                        <option value="05">05 - Subproduto</option>
                                        <option value="06">06 - Produto Intermediário</option>
                                        <option value="07">07 - Material de Uso e Consumo</option>
                                        <option value="08">08 - Ativo Imobilizado</option>
                                        <option value="09">09 - Serviços</option>
                                        <option value="10">10 - Outros insumos</option>
                                        <option value="99">99 - Outras</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row no-margin-y">
                                <div class="form-group col-xs-12">
                                    <label>Observações do Produto</label>
                                    <textarea required="" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
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
                        <form>
                            <div class="row no-margin-y">
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Preço de Custo</label>
                                    <input type="text" placeholder="" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Alíquota de ICMS</label>
                                    <input type="text" placeholder="%" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Alíquota de IPI</label>
                                    <input type="text" placeholder="%" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Alíquota de PIS</label>
                                    <input type="text" placeholder="%" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="row no-margin-y">
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Aliquota do frete</label>
                                    <input type="text" placeholder="%" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-1 col-sm-12">
                                    <p class="pgt-out">OU</p>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Valor Frete</label>
                                    <input type="text" placeholder="0,00" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="row no-margin-y">
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Comisão vendedor</label>
                                    <input type="text" placeholder="%" class="form-control input-sm">
                                </div>
                                <div class="form-group col-md-1 col-sm-12">
                                    <p class="pgt-out">OU</p>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Valor Comisão</label>
                                    <input type="text" placeholder="0,00" class="form-control input-sm">
                                </div>
                            </div><br>
                            <div class="row no-margin-y">
                                <div class="form-group col-md-2 col-sm-12 has-success">
                                    <label>Lucro Zero</label>
                                    <input type="text" placeholder="" readonly="readonly" value="Readonly input text" class="form-control input-sm">
                                </div>
                            </div>
                        </form><br>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
