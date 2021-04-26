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
            $("#shipping_tax").addClass('has-error').removeClass('has-success');
            $("#shipping_value").addClass('has-error').removeClass('has-success');
            e.preventDefault();
            return;
        }

        if($("#commission_value").val() != "" && $("#commission_tax").val() != "")
        {
            sweet_alert_error('Preencha apenas o campo comissão percentual do vendedor ou valor total da comissão');
            $("#commission_tax").addClass('has-error').removeClass('has-success');
            $("#commission_value").addClass('has-error').removeClass('has-success');
            e.preventDefault();
            return;
        }
    });

    $(".opt-ship").change(function (){
        console.log($(this));
        if(($("#shipping_tax").val() != "" && $("#shipping_value").val() == "") || ($("#shipping_tax").val() == "" && $("#shipping_value") != ""))
            $(".opt-ship").removeClass('has-error').addClass('has-success');

        else if($("#shipping_tax").val() != "" && $("#shipping_value").val() != "") {
            $(".opt-ship").removeClass('has-success').addClass('has-error');
            sweet_alert_error('Preencha apenas o campo alíquota do frete ou valor do frete');
        }
    });


    $(".opt-comm").change(function (){
        if(($("#commission_tax").val() != "" && $("#commission_value").val() == "") || ($("#commission_tax").val() == "" && $("#commission_value") != ""))
            $('.opt-comm').removeClass('has-error').addClass('has-success');

        else if($("#commission_tax").val() != "" && $("#commission_value").val() != "") {
            $(".opt-comm").removeClass('has-success').addClass('has-error');
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

function delete_product(id)
{

    var request = $.ajax({
        url: '/product/' + id,
        method: 'DELETE',
        dataType: 'json'
    });

    request.done(function (e) {

        if(e.status)
        {
            var data = {
                title: 'Sucesso',
                text: 'O produto selecionado foi excluído',
                type: 'success',
                confirmButtonClass: 'btn btn-success'
            };

            swal(data);

        }else{

            data = {
                title: 'Atenção',
                text: 'Um erro ocorreu, tente novamente mais tarde',
                type: 'danger',
                confirmButtonClass: 'btn btn-danger'
            };

            swal(data);
        }
    });

    request.fail(function (e) {
        console.log('fail');
        console.log(e);

        data = {
            title: 'Atenção',
            text: 'Um erro ocorreu, tente novamente mais tarde',
            type: 'danger',
            confirmButtonClass: 'btn btn-danger'
        };

        swal(data);
    });
}
