/**
 * Created by Ricardo Diez on 15/06/2016.
 */
var jQueryValidate = function(){
    this.init = function(selector){
        $(selector).validate();
    }
    this.initSpanish = function(selector){
        //Validar Email
        jQuery.validator.addMethod("emailCustom", function(value, element) {
            var expregEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/ ;
            if(expregEmail.test(value)){
                return true;
            }else{
                return false;
            }
        });
        //Validar RFC
        jQuery.validator.addMethod("rfc", function(value, element) {
            var expregRFCShort = /^([A-Z,Ñ]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))$/ ;//RFC de 10
            var expregRFCLarge = /^([A-Z,Ñ]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/ ;
            if(expregRFCShort.test(value)){
                return true;
            }else if(expregRFCLarge.test(value)){
                return true;
            }else{
                return false;
            }
        });
        //Validar Caracteres especiales
        jQuery.validator.addMethod("noSpecialCharts", function(value, element) {
            if(value.length > 0){
                var expregNoSpecialCharts =  /^([#A-Za-z0-9ñÑáéíóúÁÉÍÓÚ., -]+)$/;
                if(expregNoSpecialCharts.test(value)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        });
        //Validar Caracteres especiales
        jQuery.validator.addMethod("noSpecialChartsName", function(value, element) {
            if(value.length > 0){
                var expregNoSpecialCharts =  /^([#A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ^$-]+)$/ ;
                if(expregNoSpecialCharts.test(value)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        });
        //Validar nombre de dominio
        jQuery.validator.addMethod("domaindName", function(value, element) {
            if(value.length > 0){
                var expregNoSpecialCharts =  /^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$/ ;
                if(expregNoSpecialCharts.test(value)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        });
        //Validar Si dominio existe
        jQuery.validator.addMethod("domainIsset", function(value, element) {
            var flag = true;
            var _token = $("input[name=_token]").val();
            if(value.length > 0){
                $.ajax({
                    type     : "POST",
                    url      : '/cliente/obtenerDominio',
                    dataType : "json",
                    data     : {dominio:value,_token:_token,},
                    async: false,
                    success  : function(data){
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(data){
                        //return true;
                        // console.log(data['responseJSON'].length);
                        if(data['responseJSON'].length > 0){
                            flag = false;
                        }else{
                            flag = true;
                        }
                    }
                });
                return flag;
            }else{
                return true;
            }
        });
        //Validar Caracteres especiales correo domaind
        jQuery.validator.addMethod("noSpecialChartsEmailDomaind", function(value, element) {
            if(value.length > 0){
                var expregNoSpecialCharts =  /^([#A-Za-z0-9.\-_ ^$-]+)$/ ;
                if(expregNoSpecialCharts.test(value)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "Campo obligatorio",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}."),
            emailCustom: "Por favor, escribe una dirección de correo válida",
            rfc: "Por favor, escribe un RFC correcto",
            noSpecialCharts: "No se permiten caracteres especiales",
            noSpecialChartsName: "No se permiten caracteres especiales",
            domaindName: "Ingrese un dominio validon Ej: dominio.com",
            domainIsset: "Este dominio ya existe por favor intente con otro",
            noSpecialChartsEmailDomaind: "No se permiten caracteres especiales"
        });
        return $(selector).validate();
    };
}
/*Declaro el objeto tipo Jquery validate*/
var validateForms = new jQueryValidate();



var datos=new Array();
$(document).ready(function() {

    $(document).on('click','#register',function(e){
        event.preventDefault();
        var validator = validateForms.initSpanish("#register_form");
        if(validator.form() && $("#terminosCondiciones").is(":checked")){
            if(grecaptcha.getResponse()!=""){
                $("#register_form").submit();
                $("#errorCaptcha").addClass("hide");
                $("#errorCaptcha").html("");
            }else{
                $("#errorCaptcha").html("Demuestre que no es un robot.");
                $("#errorCaptcha").removeClass("hide");
            }
            /*var g_recaptcha_response=$("#g-recaptcha-response").val();
            $.ajax({
                 type     : "POST",
                 url      : 'https://www.google.com/recaptcha/api/siteverify',
                 dataType : "jsonp",
                 contentType: "application/json; charset=utf-8",
                 data     : {secret:secretCaprcha,response:g_recaptcha_response},
                 crossDomain: true,
                 async: false,
                 success  : function(data){
                    console.log(data);
                 },
                 error: function (request, status, error){
                 //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                 },
                 complete: function(){

                 },
             //jsonp: 'json.wrf',
             });*/
        }else{
            if(!$("#terminosCondiciones").is(":checked")){
                $(".icheckbox_square-blue").css("border","2px solid red");
            }else{
                $(".icheckbox_square-blue").css("border","1px solid #fff");
            }
        }
    });
    
    $(document).on('click','#first_next_buttom_register',function(e){
        event.preventDefault();
        var validator = validateForms.initSpanish("#first_register_form");
        if(validator.form()){
            $("#first").addClass("hide");
            $("#third").addClass("hide");
            $("#second").removeClass("hide");

            $("#tu_dominio_empresarial").html("@"+$("#dominio").val());

            $("#second_register_form #nombrecliente").val($("#nombrecliente").val());
            $("#second_register_form #idcatcantidadempleados").val($("#idcatcantidadempleados").val());
            $("#second_register_form #tagsinput_select").val($("#tagsinput_select").val());
            $("#second_register_form #dominio").val($("#dominio").val());

            return datos;
        }
    });
    
    $(document).on('click','#second_next_buttom_register',function(e){
        event.preventDefault();
        var validator = validateForms.initSpanish("#second_register_form");
        if(validator.form() && $("#terminosCondiciones").is(":checked")){
            if(grecaptcha.getResponse()!=""){
                $("#second_register_form").submit();
                $("#errorCaptcha").addClass("hide");
                $("#errorCaptcha").html("");

                /*$("#first").addClass("hide");
                $("#second").addClass("hide");
                $("#third").removeClass("hide");

                $("#listo_register").html($("#name").val()+' '+$("#paterno").val()+' '+$("#materno").val());*/
                

            }else{
                $("#errorCaptcha").html("Demuestre que no es un robot.");
                $("#errorCaptcha").removeClass("hide");
            }

            return datos;
        }else{
            if(!$("#terminosCondiciones").is(":checked")){
                $("#second_register_form .ios7-switch").css("border","2px solid red");
            }else{
                $("#second_register_form .ios7-switch").css("border","0px solid #fff");
            }
        }
    });

    $(document).on('click','#second_previous_buttom_register',function(e){
        event.preventDefault();
            $("#second").addClass("hide");
            $("#third").addClass("hide");
            $("#first").removeClass("hide");
    });

    $(document).on('click','#third_previous_buttom_register',function(e){
        event.preventDefault();
            $("#first").addClass("hide");
            $("#third").addClass("hide");
            $("#second").removeClass("hide");
    });

    /*var citynames = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: '/json/citynames.json',
            filter: function(list) {
                return $.map(list, function(cityname) {
                    return { name: cityname }; });
            }
        }
    });
    citynames.initialize();

    $('#tagsinput_select').tagsinput({
        typeaheadjs: {
            name: 'citynames',
            displayKey: 'name',
            valueKey: 'name',
            source: citynames.ttAdapter()
        }
    });*/

    $(document).on("change","#ios7-checkbox",function(){
        if($("#ios7-checkbox").is(":checked")){
            $("#container_country").removeClass("hide");
        }else{
            $("#container_country").addClass("hide");
        }
    });

    $("#tagsinput_select").select2({
        tags: ['México', 'Venezuela', 'España','Argentina']
    });

    // $('#inteligence').on('show.bs.modal', function() {
        $("#tagsinput_select_dpto").select2({
            tags: ['Marketing', 'Finanzas', 'Comercial','Gestión','Administración','Recursos Humanos','Compras','Operaciones','Producción','TI']
        });
    // })

    // $("#tagsinput_select").val()
    // $("#tagsinput_select").tagsinput('items')

});
