$(function (){

    $("#ncm").keyup(function (e){

        var ncm = '';

        console.log(e.which);
        console.log(this.value.length);

        if(this.value.length == 4 && e.which != 8)
        {
            ncm = this.value.toString() + '.';

            console.log(ncm);

            $("#ncm").val(ncm);
        }
        else if(this.value.length == 7 && e.which != 8)
        {
            ncm = this.value.toString() + '.';

            $("#ncm").val(ncm);
        }

    });

    $("#form_products").submit(function (e){

        if($("#shipping_tax").val() != "" && $("#shipping_value").val() != "")
        {
            sweet_alert_error('Preencha apenas o campo alíquota do frete ou valor do frete');
            $("#shipping_tax").addClass('has-error').removeClass('custom-has-success');
            $("#shipping_value").addClass('has-error').removeClass('custom-has-success');
            e.preventDefault();
            return;
        }

        if($("#commission_value").val() != "" && $("#commission_tax").val() != "")
        {
            sweet_alert_error('Preencha apenas o campo comissão percentual do vendedor ou valor total da comissão');
            $("#commission_tax").addClass('has-error').removeClass('custom-has-success');
            $("#commission_value").addClass('has-error').removeClass('custom-has-success');
            e.preventDefault();
            return;
        }
    });

    $(".opt-ship").change(function (){
        console.log($(this));
        if(($("#shipping_tax").val() != "" && $("#shipping_value").val() == "") || ($("#shipping_tax").val() == "" && $("#shipping_value") != ""))
            $(".opt-ship").removeClass('has-error').addClass('custom-has-success');

        else if($("#shipping_tax").val() != "" && $("#shipping_value").val() != "") {
            $(".opt-ship").removeClass('custom-has-success').addClass('has-error');
            sweet_alert_error('Preencha apenas o campo alíquota do frete ou valor do frete');
        }
    });


    $(".opt-comm").change(function (){
        if(($("#commission_tax").val() != "" && $("#commission_value").val() == "") || ($("#commission_tax").val() == "" && $("#commission_value") != ""))
            $('.opt-comm').removeClass('has-error').addClass('custom-has-success');

        else if($("#commission_tax").val() != "" && $("#commission_value").val() != "") {
            $(".opt-comm").removeClass('custom-has-success').addClass('has-error');
            sweet_alert_error('Preencha apenas o campo comissão percentual do vendedor ou valor total da comissão');
        }
    });

    $("#file").change(function() {
        readURL(this);
        $(".photo-product").css('display', 'none');
    });

});

function change_photo()
{
    $("#file").trigger('click');
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#photo_product').attr('src', e.target.result).removeAttr('hidden');
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}


/*function delete_product(id)
{

    var request = $.ajax({
        url: '/product/' + id,
        method: 'DELETE',
        dataType: 'json'
    });

    request.done(function (e) {

        if(e.status)
            sweet_alert_success('O produto foi excluído com sucesso');
        else
            sweet_alert_error();

    });

    request.fail(function (e) {
        console.log('fail');
        console.log(e);

        sweet_alert_error();
    });
}*/


function new_category()
{

    var name = $("#new_category").val();

    let promise = new Promise(function(resolve, reject) {

        $.ajax({
            url: '/category_exists/' + name + '/' + 'product',
            method: "GET",
            dataType: 'json',

        }).done(function (e){
            console.log(e);

            resolve(e.status);
        }).fail(function (e){
            console.log(e);

            reject(new Error(e));
        });
        //setTimeout(() => resolve("done!"), 1000);
    });

// resolve runs the first function in .then
    promise.then(
        function (result){
            console.log(result);

            if(!result)
                store_category();

            else{
                sweet_alert_error('Esta categoria já existe');
            }
        }, // shows "done!" after 1 second
        function(error){
            alert(error)
        } // doesn't run
    );

    promise.finally(function (){
        $("#new_category").val('');
    });
}

function store_category()
{
    var name = $("#new_category").val();

    $.ajax({
        url: '/new_category',
        method: 'POST',
        dataType: 'json',
        data: {
            'name': name,
            'class': 'product'
        }
    }).done(function (e){
        if(e.status) {
            sweet_alert_success('A Categoria ' + name + ' foi cadastrada com sucesso');

            var append = '<option selected value="'+e.id+'">'+name+'</option>';

            $("#category_id").append(append);
            trigger_click_btn_success();
        }
    }).fail(function (e){
        console.log('fail', e);

        sweet_alert_error('Um erro ocorreu, tente novamente mais tarde');
    });
}
