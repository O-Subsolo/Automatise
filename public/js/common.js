var opened_menu = false;
var black_moon = '<i class="fas fa-moon"></i>';
var white_moon = '<i class="far fa-moon"></i>';
var menu_item_open = false;
var v_hide_menu = false;
var user_option_item = false;

var loading = $('.loader-wrap');
loading.css('display', 'block');

$(function () {



    loading.css('display', 'none');

    $("input").attr('autocomplete', 'off');
    $(".modal_input").attr('autocomplete', 'password');

    localStorage.removeItem('open_items_menu');
    localStorage.setItem('filters', false);

    setInterval(function () {
        $("#body").css('display', 'none');
        $(".pre-loading").css('display', 'block');
    }, 1000);

    if (localStorage.getItem('night_mode') == true) {
        $("#table_list")
            .addClass('ver3')
            .removeClass('ver1')
            .css('display', 'block');

        night_mode = true;
        $(".night-mode i").remove();
        $(".night-mode").append(white_moon);
        localStorage.setItem('night_mode', night_mode);
    } else {
        $("#table_list")
            .removeClass('ver3')
            .addClass('ver1')
            .css('display', 'block');

        night_mode = false;
        localStorage.setItem('night_mode', night_mode);
    }

    $(".night-mode").click(function () {

        night_mode = !night_mode;

        if (night_mode) {
            $("#table_list")
                .removeClass('ver1')
                .addClass('ver3');


            $('.night-mode i').remove();

            $(".night-mode").append(white_moon);

            localStorage.setItem('night_mode', true);
        } else {
            $("#table_list")
                .removeClass('ver3')
                .addClass('ver1');

            $('.night-mode i').remove();
            $(".night-mode").append(black_moon);

            localStorage.setItem('night_mode', false);
        }
    });


    $('.plus-btn').click(function () {
        $('body').toggleClass('menu-open');

        opened_menu = !opened_menu;

        open_menu(opened_menu);
    });

    $(".menu_li").click(function () {

        var id = this.id.replace('li_', '');

        $(".lvl_1").css('display', 'none');

        $("#menu_item_" + id).css('display', 'block');

        if (localStorage.getItem('open_items_menu')) {
            var levels = localStorage.getItem('open_items_menu');

            levels++;

            localStorage.setItem('open_items_menu', levels);
        }


    });

    $(".menu_back").click(function () {
        $(".menu-items").css('display', 'none');

        $(".menu_li").css('display', 'block');

        $(".menu ul").css('display', 'flex');

        $(".r1").css('display', 'block');

        $(".r2").css('display', 'block');
    });


    $('.js-pscroll').each(function () {
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function () {
            ps.update();
        })
    });

    //When loading disable next-tab button
    $('.next-tab').attr('disabled', null);

    //When loading disable submit button
    $('.submit').attr('disabled', null);

    //Used to limit user typing to numbers
    //Limita o usu??rio a digitar apenas n??meros
    $(".number").keypress(function (e) {
        if (e.which < 48 || e.which > 57)
            if(e.which !== 44)
                return false;

    });

    //Numeros com milhares
    $(".point-number").keypress(function (e){
        if (e.which < 48 || e.which > 57)
            if(e.which != 46)
                return false;

    });

    $(".tab-info").keyup(function () {
        $('.input-group').removeClass('border-red');

        $(".text-danger").css('display', 'none');

    }).change(function () {
        $(".text-danger").css('display', 'none');
    });

    //Do not allow input type number to add "e" character
    //N??o permite campos do tipo n??mero de conter o caracter "e"
    $("input[type=number]").keydown(function (e) {

        if (e.which === 69)
            return false;
    });

    //When CPF field changes / Quando o campo cpf muda de valor
    /*$("#cpf").change(function () {
        //Pre cpf validation / Valida????o preliminar do CPF
        before_validate_cpf();
    });*/

    //When CPF field inside a modal changes / Quando um cpf dentro do modal muda de valor
    /*$("#modal_cpf").change(function () {

        before_validate_cpf('modal_cpf');
    });*/

    //Chassis validation when input field changes
    // Quando o campo chassis tem seu valor alterado ocorre a valida????o do mesmo
    $("#chassis").change(function () {
        validate_chassis();
    });


    /*$(".search-model").click(function () {
        $(this).css('display', 'none');

        $(".hide-search").css('display', 'none');

        $("#label-search-model").css('display', 'block');

        $("#search-model").css('display', 'block').focus();
    });

    $("#search-model").blur(function () {

        $(this).css('display', 'none');

        $("#label-search-model").css('display', 'none');

        $(".search-model").css('display', 'block');

        if(localStorage.getItem('filters') == true)
            $("#remove_filters").css('display', 'inline-block');

    });*/

    //Quando o propriet??rio muda / When the owner changes
    $("#owner_id").change(function () {
        var value = $(this).val();

        $("#owner_id_input").val(value);
    });


    //Format a date value / Formata uma data
    $(".date").keyup(function (e) {

        var value = $(this).val();

        if(value.length == 2 && e.which != 8)
        {
            value += '/';

            $(this).val(value);
        }
        else if(value.length == 5 && e.which != 8)
        {
            value += '/';

            $(this).val(value);
        }
    });

    $(".main-item").click(function () {
        var id = this.id;
        var ul = id.replace('item-', '');

        if (menu_item_open)
        {

            $('.ul-subitem').css('display', 'none');

            $("#ul-"+ul).css('display', 'none');

            menu_item_open = !menu_item_open;
        }
        else{
            $('.ul-subitem').css('display', 'none');

            $("#ul-"+ul).css('display', 'block');

            menu_item_open = !menu_item_open;
        }

    });


    //Gambiarra para dar um efeito de anima????o no ??cone pesquisa
    //Animation of search icon
    setTimeout(function () {
        $("#general-search-icon").css('display', 'inline-block');
    }, 2000);



    //When hovered, shows up the user options
    $(".icon-profile").mouseenter(function () {
        $(".profile-settings-box").css('display', 'inline-block');
    });

    //When hovered out, hide user options
    $(".profile-settings-box").mouseleave(function () {
        $(this).css('display', 'none');
    });


    $(".hide-menu").click(function () {

        v_hide_menu = !v_hide_menu;

        if(v_hide_menu)
        {
            $(".menu-topic p").css('display', 'none');
            $(".span-item-name").css('display', 'none');
            $(".span-item").css('display', 'none');

            $(".top-menu").css('width', '3%');

            $(".menu").css('width', '3%');
        }
        else{
            $(".menu-topic p").css('display', 'inline-block');
            $(".span-item-name").css('display', 'inline-block');
            $(".span-item").css('display', 'inline-block');

            $(".top-menu").css('width', '16%');

            $(".menu").css('width', '16%');
        }

    });

    //Fires when $this has new inputs
    //Evento dispara ao digitar
    $("#general-search-input").keyup(function (e) {

        //Gambiarra monstra para diminuir a velocidade de digita????o do usu??rio corno
        //A way to slow down user when typing
        setTimeout(function () {
            $(this).attr('disabled', true);
        }, 500);

        //Parte final da gambiarra acima
        //Final part of the "fix" above
        $(this).attr('disabled', false);

        //If search field is blank / Se o campo pesquisa estiver em branco
        if($(this).val() == "")
        {
            //Shows up the search icon / Mostra o ??cone de pesquisa
            $("#general-search-icon").css('display', 'inline-block');

            //Hide the X icon / Esconde o ??cone X
            $("#general-search-icon-close").css('display', 'none');

            //Shows up the initial table / Mostra a tabela inicial
            $("#tbody-search").css('display', 'none');

            //Hide the table with search results / Esconde a tabela com resultados da pesquisa
            $("#tbody-main").css("display", 'table-row-group');

            //Hide the information of no results found / Esconde a info de resultados n??o encontrados
            $(".no-results").css('display', 'none');

            //Shows up the pagination button
            $(".load-more").css('display', 'inline-block');
        }
        else{
            //Ajax search request / Requisi????o de pesquisa
            search_model();

            //Hide the search icon / Esconde o ??cone de pesquisa
            $("#general-search-icon").css('display', 'none');

            //Shows up the X icon / Mostra o ??cone X
            $("#general-search-icon-close").css('display', 'inline-block');
        }
    });

    //When $this was clicked / Quando o ??cone fechar for clickado
    $("#general-search-icon-close").click(function () {

        //Input search value is now blank / Campo pesquisa est?? vazio
        $("#general-search-input").val("");

        //Hide the table with search results / Esconde a tabela com resultados da pesquisa
        $("#tbody-search").css('display', 'none');

        //Shows up the initial table / Mostra a tabela inicial
        $("#tbody-main").css("display", 'table-row-group');

        //Shows up the search icon / Mostra o ??cone de pesquisa
        $("#general-search-icon").css('display', 'inline-block');

        //Hide the X icon / Esconde o ??cone X
        $("#general-search-icon-close").css('display', 'none');

        //Hide the information of no results found / Esconde a info de resultados n??o encontrados
        $(".no-results").css('display', 'none');

        //Shows up the pagination button
        $(".load-more").css('display', 'inline-block');
    });

    //Closes the alert / Fecha o alert
    setTimeout(function () {
        $(".close").trigger('click');
    },3000);

    $('form').submit(function (e){

        if($('.has-error').length > 0)
        {
            e.preventDefault();
            sweet_alert_error('Verifique os erros na p??gina e tente novamente');
        }
        else if($("#inactive").val() == 1)
        {
            e.preventDefault();

            var msg = '';

            if(location.pathname.search('usuario') != -1)

                msg = 'Voc?? n??o pode alterar um usu??rio inativo, Ative-o e depois altere este usu??rio';

            else if(location.pathname.search('veiculo') != -1){
                msg = 'Voc?? n??o pode alterar um ve??culo inativo, Ative-o e depois altere este ve??culo';
            }
            else if(location.pathname.search('pecas') != -1){
                msg = "Voce n??o pode alterar um pe??a inativa, Ative-a e depois altere esta pe??a";
            }

            sweet_alert_error(msg, 5000);
        }

    });

    $("#show_new_owner").click(function (){
        $("#new_owner").modal('show');
    });

    $("#show_new_vehicle").click(function (){
        $("#new_vehicle").modal('show');
    });

    $("#modal_email").change(function (){
        if(validateEmail($(this).val()))
            verify_email($(this).val());

        else
            sweet_alert_error('Digite um email v??lido');
    });

    $("#license_plate").keyup(function (e) {

        var value = $(this).val();

        $(this).val(value.toUpperCase());

        //if((value.length === 3) && (parseInt(e.which) !== 8))
        //  $(this).val(value.toUpperCase() + '-');

    });

    $(".select2").css('width', '100%').select2();

    //$("b[role='presentation']").css('display', 'none');
    $(".select2-selection__arrow").css('display', 'none');

    /*var atual = 600000.00;

//com R$
    var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

//sem R$
    var f2 = atual.toLocaleString('pt-br', {minimumFractionDigits: 2});

    console.log(f);
    console.log(f2);*/


    /*$('.money').keyup(function (){

        var value = parseFloat($(this).val()); console.log(value);

        var val = value.toLocaleString('pt-br', {currency: 'BRL', minimumFractionDigits: 2});

        console.log(val);
        $(this).val(val);
    });*/
});




function add_model($model)
{

    switch ($model){

        case 'product':
            console.log($model)
            location.href = '/criar_produto';
            break;

        default:
            location.href = '/';
            break;
    }
}


function validateEmail($email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test($email);
}

//Searchs any model / Procura dados em qualquer classe
function search_model()
{
    //Actual url / Url atual
    var page = location.pathname;

    page = page.search('/carros') != -1 ? '/carros' : page;

    var url = '';

    //Value of input search / Valor do campo pesquisa
    var input = $("#general-search-input").val();

    //If page is "/" or "carros" it must search for table cars
    //Se page ?? = "/" ou ?? igual a "carros", procura-se por tabela carros
    switch (page) {
        case '/':
            url = '/car_search/' + input;
            break;

        case '/carros':
            url = '/car_search/' + input;
            break;

        //If true, searches for brands // Pesquisa por montadoras
        case '/montadoras':
            url = '/brand_search/' + input;
            break;

        default: url = null; break;
    }

    //If url, search for the given model
    if(url)
    {
        //Beginning of ajax search request / ??nicio da requisi????o ajax
        var request = $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json'
        });

        request.done(function (e) {
            if(e.status)
            {
                //Hide the initial table / Esconde a tabela inicial
                $("#tbody-main").css('display', 'none');

                //Remove tr tags from search results table / Remove tags tr da tabela de resultados
                $("#tbody-search tr").remove();

                //Remove info of no results fount / Remover <p> de nenhum resultado encontrado
                $(".no-results").css('display', 'none');

                var append = '';

                //If has any results / Se houver qualquer resultado
                if(e.model.length > 0)
                {
                    //Hide the pagination button / Esconde o bot??o de pagina????o
                    $(".load-more").css('display', 'none');

                    //Searching for brands
                    if(page == "/montadoras")
                        append = brand_search(e);

                    else{
                        //Iterate over array model which containing all search results
                        //Itera????o no array model que cont??m todos os resultados da pesquisa
                        for (var i = 0; i < e.model.length; i++)
                        {
                            //Used to know how much columns we should print
                            //Usado para saber quantas colunas devemos exibir
                            var columns = 0;

                            //Tr tag which contains the entire row, we need the id model to delete the right row
                            //in case the user delete a model
                            append += '<tr class="row100 body" id="model_'+e.model[i].column_0+'">';

                            //Displays id from model / Exibe o id da classe
                            append += '<th scope="row">'+e.model[i].column_0+'</th>';

                            //Displays model??s column name and the link to edit
                            //Exibe a coluna nome da classe correspondente e o link para edi????o
                            append += '<td><a href="'+e.edit+e.model[i].column_0+'">'+e.model[i].column_1+'</a></td>';

                            //Iterate over the remaining columns / Itera????o nas colunas restantes
                            for(var x = 2; x < e.columns; x++)
                            {
                                //Used to find which column we are at the moment
                                //Usado para saber qual coluna estamos
                                var c = 'column_' + x;

                                //Display <td> content
                                //Exibe o conte??do da tag <td>
                                append += '<td>'+e.model[i][c]+'</td>';
                            }

                            //<td> and href link of a edit button / <td> e link para edi????o
                            append += '<td><a href="'+e.edit+e.model[i].column_0+'" class="btn btn-sm btn-outline-info" title="Editar">';
                            append += '<i class="fas fa-edit"></i></a>';

                            //Button delete / Bot??o Excluir
                            append += '<button class="btn btn-sm btn-outline-danger" onclick="delete_model('+e.model[i].column_0+')" title="Excluir">';
                            append += '<i class="fas fa-trash"></i></button></td>';
                        }
                    }


                    //Finally displays search results / Exibe os resultados da pesquisa
                    $("#tbody-search").css('display', 'table-row-group').append(append);
                }
                //If has not any results / Sen??o houver resultados
                else{
                    sweet_alert_error('Nenhum resultado encontrado');
                    $(".no-results").css('display', 'block');
                }

            }
        });

        //When request fails it shows the log at console
        //Exibe erros no console
        request.fail(function (e) {
            console.log('fail', e);

            //Error alert message / Mensagem de erro em um alerta
            sweet_alert_error();
        });
    }


}

//Used to verify which model has to be deleted
//Usado para verificar qual classe deve ser exclu??da
/*function delete_model($id)
{
    var page = location.pathname;

    switch (page) {
        case '/':
            delete_car($id);
            break;

        case '/carros':
            delete_car($id);
            break;

        case '/produtos':
            delete_product($id);
            break;
    }
}*/

function verify_model($id)
{
    $("#full-danger").niftyModal();
    $("#h3_full_danger").text('Aten????o');
    $("#p_full_danger").text($("#model_text").val());

    localStorage.setItem('model_id', $id);

    console.log(location.pathname);
}

function delete_model()
{
    const url = location.pathname;
    const id = localStorage.getItem('model_id');

    let promise = new Promise(function (resolve, reject){
        $.ajax({
            url: url + '/' + id,
            method: "DELETE",
            dataType: 'json',

        }).done(function (e){
            resolve(e);

        }).fail(function (e){
            console.log('fail', e);
            reject(new Error(e));
        });
    });

    promise.then(
        function (result){
            console.log(result);
            if(result.status)
            {
                sweet_alert_success(result.msg);
                $("#tr-"+id).remove();
                trigger_click_btn_success();
            }
            else
                sweet_alert_error();
        },

        function (error){
            alert(error)
        }
    );

    promise.finally(function (){
        localStorage.removeItem('model_id');
    });
}

//Load more data to increase list (infinite pagination)
//Carrega mais dados para aumentar o tamanho da lista (pagina????o infinita)
function load_more()
{

    $("#load-more").attr('disabled', true);
    $("#load-more span").text('Carregando...');
    $(".fa-download").css('display', 'none');
    $(".fa-spinner").css('display', 'inline-block');


    var offset = $("#offset").val();
    var page = location.pathname;
    var url = '';

    switch (page) {
        case '/':
            url = '/car_pagination/' + offset;
            break;

        case '/carros':
            url = '/car_pagination/' + offset;
            break;

        case '/montadoras':
            url = '/brand_pagination/' + offset;
            break;

        case '/listar_pecas':
            url = '/part_name/' + offset;
            break;

    }

    var request = $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json'
    });

    request.done(function (e) {

        if(e.status)
        {
            var append = '';

            if(page === '/montadoras')
                append = load_more_brands(e);

            else if(page === '/listar_pecas')
                append = load_more_part_name(e);

            else{

                for (var i = 0; i < e.cars.length; i++)
                {
                    var start_year = e.cars[i].start_year != null ? e.cars[i].start_year : '';
                    var end_year = e.cars[i].end_year != null ? e.cars[i].end_year : '';

                    append += '<tr class="row100 body" id="model_'+e.cars[i].id+'">'+
                        '<th scope="row">'+e.cars[i].id+'</th>'+
                        '<td><a href="'+e.edit+e.cars[i].id+'">'+e.cars[i].model+'</a></td>'+
                        '<td>'+e.cars[i].brand_name+'</td>'+
                        '<td><span>'+e.cars[i].fuel_name+'</span></td>'+
                        '<td>'+start_year+'</td>'+
                        '<td>'+end_year+'</td>'+
                        '<td><a href="'+e.edit+e.cars[i].id+'" class="btn btn-sm btn-outline-info" title="Editar">' +
                        '<i class="fas fa-edit"></i>' +
                        '          </a> '+
                        '          <button class="btn btn-sm btn-outline-danger" onclick="delete_car('+e.cars[i].id+')" title="Excluir">' +
                        '               <i class="fas fa-trash"></i>' +
                        '          </button>'+
                        '      </td>'+
                        '</tr>';
                }

            }


            $("#tbody-main").append(append);

            $("#offset").val(e.offset);
        }
    });

    request.fail(function (e) {
        console.log('fail', e);

        sweet_alert_error();
    });

    $("#load-more").attr('disabled', null);
    $("#load-more span").text('Carregar mais resultados');
    $(".fa-download").css('display', 'inline-block');
    $(".fa-spinner").css('display', 'none');
}

function remove_filters()
{
    $("#tbody-search").css('display', 'none');

    $("#tbody-main").css('display', 'block');

    $("#search-model").val('');

    $("#remove_filters").css('display', 'none');

    localStorage.setItem('filters', false);
}

function open_menu($status) {
    if ($status) {

        $(".menu").css('display', 'block');
        $(".r1").css('display', 'block');
        $(".r2").css('display', 'block');

        $(".limiter").css('display', 'none');
        $(".container-contact100").css('display', 'none');
        $(".bars").css('display', 'none');


        localStorage.setItem('open_items_menu', 1);
    } else {

        $(".menu").css('display', 'none');
        $(".r1").css('display', 'none');
        $(".r2").css('display', 'none');

        $(".limiter").css('display', 'block');
        $(".container-contact100").css('display', 'flex');
        $(".bars").css('display', 'initial');

        localStorage.setItem('open_items_menu', 0);
    }
}

function back_menu() {
    var levels = localStorage.getItem('open_items_menu');

    if (levels == 1)
        $(".plus-btn").trigger('click');

    else {
        $(".lvl_" + levels).css('display', 'none');

        levels--;

        localStorage.setItem('open_items_menu', levels);

        if (levels == 1) {
            $(".menu_li").css("display", 'block');
            $(".lvl_" + levels).css('display', 'block');
        }

    }
}



//Generic Ajax Request / Requisi????o ajax gen??rica
function sweet_alert($data, $ajax) {
    swal({
        title: $data.title,
        text: $data.text,
        icon: $data.icon ? $data.icon : "warning",
        buttons: {
            cancel: {
                text: $data.cancel ? $data.cancel : "Cancelar",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: $data.button ? $data.button : "OK",
                value: true,
                visible: true,
                closeModal: true
            }
        }

    }).then((value) => {
        if (value) {
            var request = $.ajax({
                url: $ajax.url,
                method: $ajax.method ? $ajax.method : 'GET',
                dataType: 'json'
            });

            request.done(function (e) {
                if (e.status) {

                    sweet_alert_success($data.success_msg);

                    setTimeout(function () {
                        if ($data.reload)
                            location.reload();
                        else
                            $("#model_" + $data.id).remove();
                    }, 3000);
                } else {
                    sweet_alert_error();

                    return false;
                }
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
                sweet_alert_error();

                return false;
            })

        }

        return false;
    });


}

function sweet_alert_error($msg, $timer) {
    var msg = $msg ? $msg : 'Um erro desconhecido ocorreu, tente novamente mais tarde';

    $("#full-error").niftyModal();

    $("#h3_full_error").text('Aten????o');

    $("#p_full_error").text(msg);

    /*swal(msg, {
        icon: 'error',
        timer: $timer ? $timer : 3000
    });*/
}

function sweet_alert_success($msg, $timer) {

    $('#full-success').niftyModal();

    var msg = $msg ? $msg : 'Sucesso';

    $("#h3_full_success").text('Sucesso');

    $("#p_full_success").text(msg);

    /*swal(msg, {
        icon: 'success',
        timer: $timer ? $timer : 3000
    });*/
}

function clean_fields($class) {
    $("." + $class).val('');
}

/*
 * $tab indicates the next tab which should show up
 * $class indicates which fields has to be filled up before going to the next tab
 *
 * $tab indica qual tab deve aparecer
 * $class verifica quais campos s??o obrigat??rios
 */
function next_tab($tab, $class) {
    //Every input which has target $class
    var fields = $("." + $class);

    $(".input-group").removeClass('border-red');
    $(".select-input").removeClass('border-red');

    //If has at least one field of the given $class
    //Se pelo menos um campo com a $class informada for encontrado
    if (fields.length > 0) {
        var i = 0;
        var errors = localStorage.getItem('errors') ? localStorage.getItem('errors') : 0;

        while (i < fields.length) {

            //If a required input wasn't filled.
            //Se um campo obrigat??rio n??o foi preenchido.
            if (fields[i].value === '' && fields[i].getAttribute('required') !== null) {
                var id = fields[i].id;

                $("#input-" + id).addClass('border-red');

                $("#span_" + id + "_status").css('display', 'block');

                //Scroll to input with error
                $('html, body').animate({
                    scrollTop: $("." + $class + "-title").offset().top
                }, 1000);

                errors++;
            }

            i++;
        }

        //If no errors / Se n??o houver erros
        if (errors === 0) {
            if ($tab === 0) //If there is no others tabs to fill in / Sen??o houver outras tabs
                $("#form").submit(); //then the form can be persisted normally / Formul??rio submetido

            else //If has others tabs and no errors, remove disabled class from next tab title
                $("#user_edit_tab_" + $tab).trigger('click').removeClass('disabled');


        }
    }
}

/*
 Add or remove spinner function to element $id or $class
 */
function spinner_input($function, $id, $class) {
    if ($function) {
        if ($id) {
            $("#" + $id).addClass("loading-input");
        } else if ($class) {
            $("." + $class).addClass("loading-input");
        }
    } else {
        if ($id) {
            $("#" + $id).removeClass("loading-input");
        } else if ($class) {
            $("." + $class).removeClass("loading-input");
        }
    }

}


/*
 Validate chassis number
 */
function validate_chassis() {
    var chassis = $("#chassis").val();

    if (chassis.length < 17 && chassis.length > 0) {
        $("#span_chassis_status").css('display', 'block');

        $("#input-chassis").addClass('border-red');

        localStorage.getItem('errors') ? localStorage.setItem('errors', localStorage.getItem('errors') + 1) : localStorage.setItem('errors', 1);
    } else {
        $("#span_chassis_status").css('display', 'none');

        $("#input-chassis").removeClass('border-red');

        localStorage.getItem('errors') ? localStorage.setItem('errors', localStorage.getItem('errors') - 1) : localStorage.removeItem('errors');
    }
}

function feature_not_available()
{
    sweet_alert_error('Este recurso ainda n??o est?? dispon??vel, tente novamente mais tarde');
}

function reorder($orderBy, $page)
{
    localStorage.setItem('orderBy', $orderBy);

    if($orderBy)
    {

        var charAt = location.pathname.replace('/', '');
        charAt = charAt.search('/');

        var path = '';

        if(charAt == -1)
            location.href = location.pathname + '/' + $orderBy

        else{

            path = location.pathname.substr(0, charAt + 1);

            location.href = path + '/' + $orderBy;
        }
    }
    else{

        location.href = '/' + $page;
    }



}

function filter($filterBy, $page)
{

    if(localStorage.getItem('orderBy'))
        //console.log(localStorage.getItem('orderBy'));
        location.href = '/' + $page + '/' + localStorage.getItem('orderBy') + '/' + $filterBy;

    else
        //console.log('aqui');
        location.href = '/' + $page + '/' + null + '/' + $filterBy;

    /*var charAt = location.pathname.replace('/', '');
    charAt = charAt.search('/');

    var path = '';

    if(charAt == -1)
        //console.log(charAt);
        location.href = location.pathname + '/' + null + '/' + $filterBy;

    else{

        path = location.pathname.substr(0, charAt + 1);

        location.href = path + '/' + $filterBy;
    }*/
}

function getWidth() {
    if (self.innerWidth) {
        return self.innerWidth;
    }

    if (document.documentElement && document.documentElement.clientWidth) {
        return document.documentElement.clientWidth;
    }

    if (document.body) {
        return document.body.clientWidth;
    }
}

function getHeight() {
    if (self.innerHeight) {
        return self.innerHeight;
    }

    if (document.documentElement && document.documentElement.clientHeight) {
        return document.documentElement.clientHeight;
    }

    if (document.body) {
        return document.body.clientHeight;
    }
}

function resize_options_buttons()
{
    $(".btn-inactive").css('display', 'inline-block');

    $(".form-options")
        .css('width', '300px')
        .css('margin-left', '79%')
        .css('float', 'left');

}

function activate()
{
    var data, ajax = false;

    console.log(location.pathname);

    if(location.pathname.search('usuario') != -1)
    {
        data = {
            title: 'Aten????o',
            text: 'Voc?? deseja reativar este usu??rio?',
            button: "Reativar",
            reload: true,
            success_msg: 'O usu??rio foi reativado'
        }

        ajax = {
            url: '/reactivate-person/' + $("#person_id").val(),
            method: "PUT",
        }


    }else if(location.pathname.search('veiculo') != -1)
    {
        data = {
            title: 'Aten????o',
            text: 'Voc?? deseja reativar este ve??culo?',
            button: "Reativar",
            reload: true,
            success_msg: 'O ve??culo foi reativado'
        }

        ajax = {
            url: '/reactivate-vehicle/' + $("#vehicle_id").val(),
            method: "PUT",
        }
    }
    else if(location.pathname.search('peca') != -1)
    {
        data = {
            title: 'Aten????o',
            text: 'Voc?? deseja reativar esta pe??a?',
            button: "Reativar",
            reload: true,
            success_msg: 'A pe??a foi reativada'
        }

        ajax = {
            url: '/reactivate-parts/' + $("#hidden_part_id").val(),
            method: "PUT",
        }
    }
    else if(location.pathname.search('oficina') != -1)
    {
        data = {
            title: 'Aten????o',
            text: 'Voc?? deseja reativar esta oficina?',
            button: "Reativar",
            reload: true,
            success_msg: 'A oficina foi reativada'
        }

        ajax = {
            url: '/reactivate-workshop/' + $("#workshop_id").val(),
            method: "PUT",
        }
    }

    if(data)
        sweet_alert(data, ajax);
}

function verify_email($email)
{
    var loading = $(".loader-wrap");
    loading.css("display", "block");
    $("#new_owner").css("display", 'none');

    $.ajax({
        url: '/verify_email/'+$email,
        method: "GET",
        dataType: 'json',
        success: function (e){
            if(e.code == 404)
            {
                $("#modal_email")
                    .removeClass('has-error')
                    .addClass('has-success');

                $("#btn_modal").attr('disabled', null);

                loading.css("display", "none");
                $("#new_owner").css("display", 'block');
            }

            else if(e.code == 200)
            {
                $("#modal_email")
                    .removeClass('has-success')
                    .addClass('has-error');

                $("#btn_modal").attr('disabled', true);

                loading.css("display", "none");
                $("#new_owner").css("display", 'block');

                sweet_alert_error("Este email j?? est?? sendo utilizado.");
            }

        },
        fail: function (e){
            console.log('fail', e);

            loading.css("display", "none");
            $("#new_owner").css("display", 'block');
        }
    });
}

function logout()
{
    $("#logout").submit();
}

function reload_page_delay($delay)
{
    var delay = $delay ? $delay : 3000;

    let promise = new Promise(function(resolve, reject) {
        setTimeout(() => resolve(), delay);
    });

    promise.then(result => location.reload());
}

function trigger_click_btn_success($delay)
{
    var delay = $delay ? $delay : 3000;

    let promise = new Promise(function (resolve, reject){
        setTimeout(() => resolve(), delay);
    });

    promise.then(function (result){
        $("#btn_full_success").trigger('click');
    });
}


