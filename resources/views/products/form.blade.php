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
                        @if($edit) Editar Produto - {{ $product->name }} @else Adicionar Produtos @endif
                        <span class="panel-subtitle"></span>
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form id="form_products" action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
                            @method('PUT')
                        @else
                            <form id="form_products" action="{{ route('product.store') }}" method="POST">
                        @endif

                        @csrf
                            <div class="row no-margin-y">
                                <div class="form-group col-md-2 col-sm-12">
                                    <input type="file" name="photo" id="file" style="display:none;">
                                    <img src="#" alt="" id="photo_product" hidden onclick="change_photo()">
                                    <i class="fas fa-cloud-upload-alt photo-product" onclick="change_photo();"></i>
                                    <p class="photo-p-help" onclick="change_photo();">Clique para editar a Foto do Produto</p>
                                </div>

                                <div class="form-group col-md-10 col-sm-12">
                                    <label>Nome Produto</label>
                                    <input type="text" id="name" name="name" placeholder="AK-47" class="form-control input-sm"
                                        value="@if($edit){{ $product->name }}@else{{ old('name') }}@endif">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo de Fabrica</label>
                                    <input type="text" id="maker_code" name="maker_code" placeholder="132385hnldkf898"
                                           class="form-control input-sm" value="@if($edit){{ $product->maker_code }}@else{{ old('maker_code') }}@endif">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label>Codigo Interno <i class="fas fa-info-circle" title="Este Código será gerado automaticamente"></i></label>
                                    @if($edit)
                                        <input type="text" id="internal_code" name="internal_code" value="{{ $product->internal_code }}" readonly class="form-control input-sm">
                                    @else
                                        <input type="text" id="internal_code" name="internal_code" placeholder="Este Código será gerado automaticamente" readonly class="form-control input-sm">
                                    @endif
                                </div>
                                <div class="form-group col-md-2 col-sm-12 ">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control input-sm">
                                        <option value="1" @if($edit && $product->status === 1) selected @elseif(!$edit) selected @endif>Ativo</option>
                                        <option value="0" @if($edit && $product->status === 0) selected @endif>Inativo</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                    <label>Marca</label>
                                    <input type="text" name="brand" id="brand" placeholder="Andrey Kalishnikov URSS" class="form-control input-sm"
                                           value="@if($edit){{ $product->brand }}@else{{ old('brand') }}@endif">
                                </div>
                            </div>

                                <br>

                            <div class="row no-margin-y">

                                <div class="form-group col-md-3 col-sm-12">
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
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Quantidade</label>
                                    <input type="text" name="quantity" id="quantity" placeholder="5000" class="form-control input-sm number"
                                           value="@if($edit){{ $product->quantity }}@else{{ old('quantity') }}@endif">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Código GTIN/EAN</label>
                                    <input type="text" placeholder="1234567891472" name="gtin" id="gtin" maxlength="14" class="form-control input-sm number"
                                           value="@if($edit){{ $product->gtin }}@else{{ old('gtin') }}@endif">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>NCM</label>
                                    <input type="text" placeholder="0000.00.00" name="ncm" id="ncm" maxlength="10" class="form-control input-sm number"
                                           value="@if($edit){{ $product->ncm }}@else{{ old('ncm') }}@endif">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Localização no estoque</label>
                                    <input type="text" placeholder="Do lado da Claymore" name="stock_location" id="stock_location" class="form-control input-sm"
                                           value="@if($edit){{ $product->stock_location }}@else{{ old('stock_location') }}@endif">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque mínimo</label>
                                    <input type="text" placeholder="1" class="form-control input-sm number" name="stock_min" id="stock_min"
                                           value="@if($edit){{ $product->stock_min }}@else{{ old('stock_min') }}@endif">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label>Estoque máximo</label>
                                    <input type="text" placeholder="9999" class="form-control input-sm number" name="stock_max" id="stock_max"
                                           value="@if($edit){{ $product->stock_max }}@else{{ old('stock_max') }}@endif">
                                </div>
                                <div class="form-group col-md-3 col-sm-12 ">
                                    <label>Tipo de classificação</label>
                                    <select class="form-control input-sm" name="class_type_id" id="class_type_id">
                                        <option value="">Selecione</option>
                                        @foreach($types as $t)
                                            @if($edit)
                                                <option value="{{ $t->id }}" @if($product->class_type_id == $t->id) selected @endif> {{ $t->code }} - {{ $t->name }}</option>
                                            @else
                                                <option value="{{ $t->id }}">{{ $t->code }} - {{ $t->name }}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-xs-6">
                                    <label for="">Opções</label>
                                    <input type="text" name="variation_1" id="variation_1" placeholder="Tamanho, cor e etc" class="form-control input-sm"
                                           value="@if($edit){{ $product->variation_1 }}@else{{ old('variation_1') }}@endif">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="">Opções</label>
                                    <input type="text" name="variation_2" id="variation_2" placeholder="Tamanho, cor e etc" class="form-control input-sm"
                                           value="@if($edit){{ $product->variation_2 }}@else{{ old('variation_2') }}@endif">
                                </div>
                            </div>

                            <div class="row no-margin-y">
                                <div class="form-group col-xs-12">
                                    <label>Observações do Produto</label>
                                    <textarea rows="5" class="form-control" id="description" name="description">@if($edit){{ $product->description }}@else{{ old('description') }}@endif</textarea>
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
                                <input type="text" placeholder="0,00" name="price" id="price" class="form-control input-sm number"
                                       value="@if($edit){{ $product->price }}@else{{ old('price') }}@endif">
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de ICMS</label>
                                <input type="text" placeholder="%" class="form-control input-sm number" name="icms" id="icms"
                                value="@if($edit){{ $product->icms }}@else{{ old('icms') }}@endif">
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de IPI</label>
                                <input type="text" placeholder="%" class="form-control input-sm number" name="ipi" id="ipi"
                                value="@if($edit){{ $product->ipi }}@else{{ old('ipi') }}@endif">
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                                <label>Alíquota de PIS</label>
                                <input type="text" placeholder="%" class="form-control input-sm number" name="pis" id="pis"
                                value="@if($edit){{ $product->pis }}@else{{ old('pis') }}@endif">
                            </div>
                        </div>
                        <div class="row no-margin-y">
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Alíquota do frete</label>
                                <input type="text" placeholder="%" class="form-control input-sm opt-ship number" name="shipping_tax" id="shipping_tax"
                                value="@if($edit){{ $product->shipping_tax }}@else{{ old('shipping_tax') }}@endif">
                            </div>
                            <div class="form-group col-md-1 col-sm-12">
                                <p class="pgt-out">OU</p>
                            </div>
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Valor Frete</label>
                                <input type="text" placeholder="0,00" class="form-control input-sm opt-ship number" name="shipping_value" id="shipping_value"
                                value="@if($edit){{ $product->shipping_value }}@else{{ old('shipping_value') }}@endif">
                            </div>

                            <div class="form-group col-md-2 col-sm-12">
                                <label>Comissão vendedor</label>
                                <input type="text" placeholder="%" class="form-control input-sm opt-comm number" name="commission_tax" id="commission_tax"
                                value="@if($edit){{ $product->commission_tax }}@else{{ old('commission_tax') }}@endif">
                            </div>
                            <div class="form-group col-md-1 col-sm-12">
                                <p class="pgt-out">OU</p>
                            </div>
                            <div class="form-group col-md-2 col-sm-12">
                                <label>Valor Comissão</label>
                                <input type="text" placeholder="0,00" class="form-control input-sm opt-comm number" name="commission_value" id="commission_value"
                                value="@if($edit){{ $product->commission_value }}@else{{ old('commission_value') }}@endif">
                            </div>
                        </div><br>
                        {{--<div class="row no-margin-y">
                            <div class="form-group col-md-2 col-sm-12 has-success">
                                <label>Lucro Zero</label>
                                <input type="text" placeholder="" readonly="readonly" value="" class="form-control input-sm">
                            </div>
                        </div>--}}
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
