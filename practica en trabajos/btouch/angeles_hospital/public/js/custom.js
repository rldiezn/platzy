/**
 * Created by Ricardo Diez on 17/02/2016.
 */
/*funcion para ver el previo de la img del input file*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_input_profile').removeClass('hide');
            $('#img_input_profile').attr('src', e.target.result);
            // $('#img_input_profile_show').attr('src', e.target.result);
            $('#crop-change-img').attr('src', e.target.result);

            //mando la img al servidor
            var formData = new FormData(document.getElementById("form_edit_img_profile_doctor"));
            formData.append("_token", $("input[name=_token]").val());
            $("#edit_section_profile_crop_buttom").attr("disabled","disabled");
            var $image = $(".featured_image > img");

            $($image).cropper("destroy")
            originalData = {};
            $image.cropper({
                aspectRatio: 300/300,
                cropBoxResizable: false,
                viewMode:3,
                minCanvasWidth:200,
                minCanvasHeight:200,
                dragMode:'move',
                zoomable: false,
                rotatable: false,
                multiple: false,
                cropend: function () {
                    $("#edit_section_profile_crop_buttom").removeAttr("disabled");
                    originalData = $image.cropper("getCroppedCanvas");
                    console.log(originalData.toDataURL());
                    imgBase64Doctor=originalData.toDataURL();
                }
            });

            $('#modal_profile_img').modal('show');

        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURLPatient(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_input_profile').removeClass('hide');
            // $('#img_input_profile').attr('src', e.target.result);
            // $('#img_input_profile_show').attr('src', e.target.result);
            $('#crop-change-img').attr('src', e.target.result);

            //mando la img al servidor
            var formData = new FormData(document.getElementById("form_edit_img_profile_patient"));
            formData.append("_token", $("input[name=_token]").val());

            $("#edit_section_profile_crop_buttom_patient").attr("disabled","disabled");
            var $image = $(".featured_image > img");

            $($image).cropper("destroy")
            originalData = {};
            $image.cropper({
                aspectRatio: 300/300,
                cropBoxResizable: false,
                viewMode:3,
                minCanvasWidth:200,
                minCanvasHeight:200,
                dragMode:'move',
                zoomable: false,
                rotatable: false,
                multiple: false,
                cropend: function () {
                    $("#edit_section_profile_crop_buttom_patient").removeAttr("disabled");
                    originalData = $image.cropper("getCroppedCanvas");
                    console.log(originalData.toDataURL());
                    imgBase64Patient=originalData.toDataURL();
                }
            });

            $('#modal_profile_img').modal('show');

            /*$.ajax({
             type     : "POST",
             url      : '/paciente/editarImgProfile',
             dataType : "json",
             data     : formData,
             // cache: false,
             contentType: false,
             processData: false,
             success  : function(data){
             if(data.estado=="1"){
             //mostrar_modal_dinamic(data.msg,'success');
             // location.reload();
             } else{
             //mostrar_modal_dinamic(data.msg,'danger');
             }
             },
             error: function (request, status, error){
             //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
             },
             complete: function(){

             }
             });*/



        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURLBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_background_banner').removeClass('hide');
            $('#img_background_banner').attr('src', e.target.result);

            //mando la img al servidor
            var formData = new FormData(document.getElementById("form_edit_img_banne_doctor"));
            formData.append("_token", $("input[name=_token]").val());


            $.ajax({
                type     : "POST",
                url      : '/linkedin/editarImgBanner',
                dataType : "json",
                data     : formData,
                // cache: false,
                contentType: false,
                processData: false,
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        // location.reload();
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }

        reader.readAsDataURL(input.files[0]);
    }
}

var where;
var VALORLIMITE = 2000;//valor que viene de PHP
var common = {
    random: function (minimo, maximo)
    {
        var numero = Math.floor( Math.random() * (maximo - minimo + 1) + minimo );
        return numero;
    }
}

var FileUploadPlugin = function (parametros) {
    this.selector=parametros.selector;
    this.defaultInitObj = {
        url: parametros.url,
        isImg:false,
        multiple: false,
        maxFileCount: 1,
        fileName: parametros.fileName,
        acceptFiles: parametros.acceptFiles,
        maxFileSize: parametros.maxSize * 1024,//100MB máximo
        dragDrop: true,
        showFileSize: true,
        showDone: false,
        showStatusAfterSuccess: true,
        showDelete: true,
        showPreview: true,
        previewHeight: "100px",
        previewWidth: "100px",
        dragDropStr: "<span><b>Arrastrar y soltar archivos</b></span>",
        abortStr: "Abortar",
        cancelStr: "Cancelar",
        doneStr: "Archivo cargado",
        multiDragErrorStr: "Arrastrar y más; soltar los archivos no están permitidos.",
        extErrorStr: "no está permitido. extensiones permitidas:",
        sizeErrorStr: "no está permitido. Tamaño máximo permitido:",
        uploadErrorStr: "No se permite Subir",
        uploadStr: "Cargar CV",
        returnType: "json",
        onSelect:function(file){
            console.log(file[0].type.search(/image/i));
            if(file[0].type.search(/image/i)!= -1){
                //alert('Hola mama consegui una img');
                $(document).on('load',function(){
                    $("#load_img_profile").siblings(".ajax-file-upload-container").find(".ajax-file-upload-statusbar").css("width","220px");
                });

            }
        },
        /*controla la respuesta luego de enviar el archivo especificamente
         en el parametro data se devuelve el json que respondel eserver*/
        onSuccess:function(files,data,xhr,pd){//TODO
            parametros.onSuccess(files,data,xhr,pd);
        } ,
        /*controla la respuesta luego de borrar el archivo especificamente
         en el parametro data se devuelve el json que respondel eserver*/
        deleteCallback:function(data,pd){//TODO
            parametros.deleteCallback(data,pd);
        }

    };
    this.initDefault = function(){
        $(this.selector).uploadFile(this.defaultInitObj);

    };
};
var DatePickerUI = function (selector){
    this.selector=selector;
    this.defaultInitObj={
        currentText: 'Hoy',
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        //dateFormat: "yy-mm-dd",//ISO 8601
        dateFormat: "yy-mm",
        prevText: '<Ant',
        nextText: 'Sig>',
        changeMonth: true,
        changeYear: true,
        closeText: 'Aceptar',
        weekHeader: 'Sm',
        showButtonPanel: true,
        minDate:new Date(1950, 10 - 1, 25),
        showMonthAfterYear: true,
        maxDate:'0',
        yearRange: '-50:+0',
        onClose: function(dateText, inst) {

            function isDonePressed(){
                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
            }

            if (isDonePressed()){
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');

                $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
            }
        },
        beforeShow : function(input, inst) {

            inst.dpDiv.addClass('month_year_datepicker')

            if ((datestr = $(this).val()).length > 0) {
                year = datestr.substring(datestr.length-4, datestr.length);
                month = datestr.substring(0, 2);
                $(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
                $(this).datepicker('setDate', new Date(year, month-1, 1));
                $(".ui-datepicker-calendar").hide();
            }
        }

    };
    this.initDefault = function(){
        $(this.selector).datepicker(this.defaultInitObj);
        $(".ui-widget-header").css("color","#222");
    };
    this.init = function(selector){
        $(selector).datepicker(this.defaultInitObj);
    };
    this.destroyDatepicker=function(){
        $(this.selector).datepicker('destroy');
    }
};
var LimitCharPlugin = function(){
    this.selector;
    this.defaultInitObj={
        limite: VALORLIMITE,//default
        clase_alert: "has-error"
    };
    this.initDefault = function(){
        /*Debe existir un span con la clase help-block para que esto funcione*/
        $(this.selector).limitChar(this.defaultInitObj);
    }
    this.init = function(selector,limit){
        this.defaultInitObj.limite=limit;
        this.defaultInitObj.clase_alert="has-error";
        /*Debe existir un span con la clase help-block para que esto funcione*/
        $(selector).limitChar(this.defaultInitObj);
    }
}
//instancio objeto del tipo DatePickerUI
var datepicker = new DatePickerUI(".datepicker");
//instancio objeto del tipo LimitCharPlugin
var limitchar = new LimitCharPlugin();

function initialize(mapToShow,latitud,longitud) {
    var mapCanvas = document.getElementById(mapToShow);
    var mapOptions = {
        center: new google.maps.LatLng(latitud, longitud),
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(mapCanvas, mapOptions)
}

function initMap(target,mapToShow,latitud,longitud) {
    // Create a map object and specify the DOM element for display.
    var map;

    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var mapCanvas = document.getElementById(mapToShow);
        var mapOptions = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(mapCanvas, mapOptions)
    }

    /*var map = new google.maps.Map(document.getElementById(mapToShow), {
     center: {lat: latitud, lng: longitud},
     scrollwheel: true,
     zoom: 8
     });*/

    $(target).on('shown.bs.modal', function () {
        google.maps.event.trigger(map, "resize");
    });

}


//declaro clase para google maps
var googleMaps = function(){
    this.latitude;
    this.longtitude;
    this.selector;
    this.target;
    this.myCenter;
    this.marker;

    this.resizeMap ;

    this.resizingMap;
    this.initialize=function(latitude,longitude,showMapSelector){

        this.myCenter=new google.maps.LatLng(latitude, longitude);
        this.marker=new google.maps.Marker({ position:this.myCenter });

        var mapProp = {
            center:this.myCenter,
            zoom: 16,
            draggable: true,
            scrollwheel: true,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        map=new google.maps.Map(document.getElementById(showMapSelector),mapProp);
        this.marker.setMap(map);

        google.maps.event.addListener(this.marker, 'click', function() {

            infowindow.setContent(contentString);
            infowindow.open(map, this.marker);

        });
    };
    this.googleMapsInit=function(latitude,longitude,showMapSelector,modalTarget){
        this.latitude=latitude;
        this.longtitude=longitude;
        this.selector=showMapSelector;
        this.target=modalTarget;
        //tuve que declarar estas funciones aca ya que de no hacerlo genera error el codigo
        function resizeMap(){
            if(typeof map =="undefined") return;
            setTimeout( function(){resizingMap();} , 400);
        };
        function resizingMap() {
            if(typeof map =="undefined") return;
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        };
        google.maps.event.addDomListener(window, 'load', this.initialize(this.latitude,this.longtitude,this.selector));

        google.maps.event.addDomListener(window, "resize", resizingMap());

        $(this.target).on('show.bs.modal', function() {
            //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
            resizeMap();
        })
        if(this.target==""){
            //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
            resizeMap();
        }

    }
};
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
            noSpecialChartsName: "No se permiten caracteres especiales"
        });
        return $(selector).validate();
    };
}
/*Declaro el objeto tipo Jquery validate*/
var validateForms = new jQueryValidate();
var imgBase64Doctor="";
var imgBase64Patient="";

var controlForAdwordsShow=0;
var control_palabraAdwordsShow="";

function findAdword(palabra_clave)
{
    var palabra_clave_arr = palabra_clave.split(" ");


    for(var i=0;i<palabra_clave_arr.length;i++){
        if(adWordsJSON[palabra_clave_arr[i]]!= undefined){

            var randomInd = common.random(0,(adWordsJSON[palabra_clave_arr[i]].length)-1);

            if(controlForAdwordsShow == 0 && control_palabraAdwordsShow!=palabra_clave_arr[i]){
                console.log(adWordsJSON[palabra_clave_arr[i]][randomInd]);
                controlForAdwordsShow++;
                control_palabraAdwordsShow=palabra_clave_arr[i];
                if(!adWordsJSON[palabra_clave_arr[i]][randomInd].click_count ){adWordsJSON[palabra_clave_arr[i]][randomInd].click_count=0}
                $('#banner img').attr('src',adWordsJSON[palabra_clave_arr[i]][randomInd].src_img);
                $('#banner a').attr('href',adWordsJSON[palabra_clave_arr[i]][randomInd].url_site);
                $('#banner #img_banner_adwords').attr('data-palabra-clave',adWordsJSON[palabra_clave_arr[i]][randomInd].palabra_clave);
                $('#banner #img_banner_adwords').attr('data-indice',randomInd);
                $('#banner').css('animation-duration',adWordsJSON[palabra_clave_arr[i]][randomInd].tiempo_mostrar+'s');
                $('#banner').css('-webkit-animation-duration',adWordsJSON[palabra_clave_arr[i]][randomInd].tiempo_mostrar+'s');
                $('#banner').removeClass('hide');
                adWordsJSON[palabra_clave_arr[i]][randomInd].show_count++;
                $.ajax({
                    type    : "POST",
                    url         : '/addWords/saveShow',
                    dataType : "json",
                    data    : {idtbladwords:adWordsJSON[palabra_clave_arr[i]][randomInd].idtbladwords,show_count:adWordsJSON[palabra_clave_arr[i]][randomInd].show_count},
                    success  : function(data){
                        if(data.estado=="1"){
                            //mostrar_modal_dinamic(data.msg,'success');
                            console.log('Guardo Show con exito');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else{
            // $('#banner').addClass('hide');
        }

    }

}

$(document).ready(function(){

    /*$('#modal_meritocracia_cita').modal({backdrop: 'static',keyboard: false});*/
    // $('#modal_meritocracia_cita').modal('show');
    // $('#resumenEventModal').modal('show');
    //<a data-controls-modal="modal_meritocracia_cita" data-backdrop="static" data-keyboard="false" href="#">
    // $(document).on("click",".fc-day-grid-event",function(){$('#resumenEventModal').modal('show');});
    $(document).on('click','#img_banner_adwords',function(e){
        adWordsJSON[$(this).data("palabra-clave")][$(this).data("indice")].click_count++;
        // console.log(adWordsJSON[$(this).data("palabra-clave")][$(this).data("indice")].click_count);return false;
        $.ajax({
            type     : "POST",
            url      : '/addWords/saveClick',
            dataType : "json",
            data     : {idtbladwords:adWordsJSON[$(this).data("palabra-clave")][$(this).data("indice")].idtbladwords,click_count:adWordsJSON[$(this).data("palabra-clave")][$(this).data("indice")].click_count},
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    console.log('Guardo Click con exito');
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });
    });
    $(document).on('click','#cancel_section_meritocracia_buttom',function(e){
        e.preventDefault();
        $("#modal_meritocracia_cita .modal-body").html('<div class="header-custom">'+'Aviso'+
            '<button type="button" id="close_meritocracia" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '</div><br>'+'<div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3>Grupo Ángeles agradece tu confianza</h3></div><br><br>');
        // $('#modal_meritocracia_cita').modal('hide');
    });
    $(document).on('click','#close_meritocracia',function(e){
        e.preventDefault();
        location.reload();
    });
    $(document).on('click','#send_section_meritocracia_buttom',function(e){
        e.preventDefault();
        var formDataJson = $('#form_send_meritocracia').serializeJSON();
        var $btn = $(this).button('loading');
        $.ajax({
            type     : "POST",
            url      : '/meritocracia/guardar',
            dataType : "json",
            data     : formDataJson,
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    $("#modal_meritocracia_cita .modal-body").html('<div class="header-custom">'+'Aviso'+
                        '<button type="button" id="close_meritocracia" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '</div><br>'+'<div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3>Grupo Ángeles agradece tu confianza</h3></div><br><br>');
                    $btn.button('reset');
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });
        console.log(formDataJson);
    });

    $(document).on('click','#send_expediente',function(e){
        e.preventDefault();
        $("#showAppointmentForm").hide();
        $("#send_section_cita").hide();
        $("#section_expediente").removeClass('hide');
        $("#section_expediente").removeClass('hide');
    });
    $(document).on('click','#submitExpediente',function(e){
        e.preventDefault();
        $("#section_expediente").addClass('hide');
        $("#section_expediente").addClass('hide');
        $("#showAppointmentForm").show();
        $("#send_section_cita").show();
    });

    $(document).on('click','.check_desblock',function(){
        if($(this).is(":checked")){
            $($(this).data("paciente")).attr('readonly','readonly');
            $($(this).data("paciente")).val('');
            $($(this).data("parentesco")).attr('readonly','readonly');
            $($(this).data("parentesco")).val('');
        }else{
            $($(this).data("paciente")).removeAttr('readonly');
            $($(this).data("parentesco")).removeAttr('readonly');
        }
    });


    $(document).on('click','.cancel_modal',function(){
        $($(this).data('modal-id')).modal('hide');
    });

    $(document).on('click','#edit_section_profile_crop_buttom',function(){
        if(imgBase64Doctor){

            var idtblDr = $(this).data('id-doctor');
            var oldImg = $("#oldImgProfile").val();
            var $btn = $(this).button('loading')

            var formData = new FormData(document.getElementById("form_edit_img_profile_crop"));
            formData.append("_token", $("input[name=_token]").val());
            formData.append("tblLinkedInDrImg", imgBase64Doctor);
            formData.append("idtblDr", idtblDr);
            formData.append("oldImgProfile", oldImg);

            $.ajax({
                type     : "POST",
                url      : '/linkedin/editarImgProfile',
                dataType : "json",
                data     : formData,
                // cache: false,
                contentType: false,
                processData: false,
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        // location.reload();
                        $('#img_input_profile_show').attr('src', imgBase64Doctor);
                        $btn.button('reset');
                        $('#modal_profile_img').modal('hide');

                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });

            // alert(idtblDr+ ' '+oldImg);
        }
    });

    $(document).on('click','#plus_info',function(){
        var  btnMore = $(this);
        var  url = $(this).data('url');
        var  limit = parseInt($(this).attr('data-limit'));
        var  rows = $(this).data('rows');
        var  table = $(this).data('id-table');
        var $btn = $(this).button('loading');

        $.ajax({
            type     : "POST",
            url      : url,
            dataType : "json",
            data     : {rows:rows,limit:limit},
            // cache: false,
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    console.log(data);
                    if(data.disabled==1){
                        $btn.button('reset');
                        btnMore.hide();
                    }else{
                        $(table).append(data.rows);
                        $btn.button('reset');
                        limit=limit+rows;
                        btnMore.attr("data-limit",limit);
                        $('.location').each(function(){
                            var mapToShow = $(this).data('map-show');
                            var latitude = $(this).data('latitude');
                            var longitude = $(this).data('longitude');
                            var target = $(this).data('target');
                            var google_maps = new googleMaps();
                            google_maps.googleMapsInit(latitude,longitude,mapToShow,target);

                        });
                    }
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                    alert(data.msg);
                    $("#plus_info").attr("disabled","disabled");
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });

    });


    $(document).on('click','#edit_section_profile_crop_buttom_patient',function(){
        if(imgBase64Patient){

            var idtblDr = $(this).data('id-patient');
            var oldImg = $("#oldImgProfile").val();
            var $btn = $(this).button('loading')

            var formData = new FormData(document.getElementById("form_edit_img_profile_patient_crop"));
            formData.append("_token", $("input[name=_token]").val());
            formData.append("tblpacienteimgprofile", imgBase64Patient);
            formData.append("idtblpaciente", idtblDr);
            formData.append("oldImgProfile", oldImg);

            $.ajax({
                type     : "POST",
                url      : '/paciente/editarImgProfile',
                dataType : "json",
                data     : formData,
                // cache: false,
                contentType: false,
                processData: false,
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        // location.reload();

                        $('#img_input_profile_show').attr('src', imgBase64Patient);
                        $btn.button('reset');
                        $('#modal_profile_img').modal('hide');

                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });

            // alert(idtblDr+ ' '+oldImg);
        }
    });

    // var cropperHeader = new Croppic('yourId', cropperOptions);

    //buscador

    RegExp.escape = function(str)
    {
        var specials = /[.*+?|()\[\]{}\\$^]/g; // .*+?|()[]{}\$^
        return str.replace(specials, "\\$&");
    }

    /*$(document).on("keyup","#buscador",function(){
        if($("#buscador").val().length==0){
            controlForAdwordsShow =0;
            control_palabraAdwordsShow =0;
            $('#banner').addClass('hide');
        }
        var typeValue = $(this).val().toLowerCase();
        if($(this).val()!=""){
            $.ajax({
                type:  'POST',
                //url:   'http://52.34.51.52:8983/solr/mysql_index/select?q=TblDoctorName%3A(' + $(this).val() + '*)TblDoctorPaterno%3A(' + $(this).val() + '*)TblDoctorMaterno%3A(' + $(this).val() + '*)Catservicioname%3A(' + $(this).val() + '*)Catserviciodescription%3A(' + $(this).val() + '*)TblLinkedInDrProfHead%3A(' + $(this).val() + '*)TblLinkedInDrSummary%3A(' + $(this).val() + '*)TblExperienceCompany%3A(' + $(this).val() + '*)TblExperienceDescriptionJob%3A(' + $(this).val() + '*)TblExperienceLocationJob%3A(' + $(this).val() + '*)Name%3A(' + $(this).val() + '*)CatHospitalAddress%3A(' + $(this).val() + '*)CatHospitalDescription%3A(' + $(this).val() + '*)Tblsintomasname%3A(' + $(this).val() + '*)Tblsintomaslugar%3A(' + $(this).val() + '*)SintomaConcat%3A(' + $(this).val() + '*)TblsintomasnameServicio%3A(' + $(this).val() + '*)TblsintomaslugarServicio%3A(' + $(this).val() + '*)SintomaConcatServicio%3A(' + $(this).val() + '*)&rows=100&wt=json&indent=true',
                url: 'http://52.34.51.52:8983/solr/mysql_index_omar/select?q=Padecimientos%3A("' + $(this).val() + '*")Sinonimos%3A("' + $(this).val() + '*")Metadatos%3A("' + $(this).val() + '*")Especialidades_Servicios%3A("' + $(this).val() + '*")&rows=2&fl=Especialidades_Servicios&wt=json&indent=true',
                dataType: 'jsonp',
                success: function(data){
                    if(data.response.numFound > 0){
                        var esp_serv = '';
                        for (var i = 0; i < data.response.docs.length; i++) {
                            esp_serv += data.response.docs[i].Especialidades_Servicios + ' ';
                            // esp_serv += '"' + data.response.docs[i].Especialidades_Servicios + '" ';
                        }
                        esp_serv = esp_serv.replace(/,/g, ' ');
                        esp_serv = String(esp_serv).trim();

                        // esp_serv.trim();
                        console.log(esp_serv);

                        if(esp_serv.length > 0) {
                            $.ajax({
                                type:  'POST',
                                // url:   'http://52.34.51.52:8983/solr/mysql_index/select?q=TblDoctorName%3A(' + esp_serv + '*)TblDoctorPaterno%3A(' + esp_serv + '*)TblDoctorMaterno%3A(' + esp_serv + '*)Catservicioname%3A(' + esp_serv + '*)Catserviciodescription%3A(' + esp_serv + '*)TblLinkedInDrProfHead%3A(' + esp_serv + '*)TblLinkedInDrSummary%3A(' + esp_serv + '*)TblExperienceCompany%3A(' + esp_serv + '*)TblExperienceDescriptionJob%3A(' + esp_serv + '*)TblExperienceLocationJob%3A(' + esp_serv + '*)Name%3A(' + esp_serv + '*)CatHospitalAddress%3A(' + esp_serv + '*)CatHospitalDescription%3A(' + esp_serv + '*)Tblsintomasname%3A(' + esp_serv + '*)Tblsintomaslugar%3A(' + esp_serv + '*)SintomaConcat%3A(' + esp_serv + '*)TblsintomasnameServicio%3A(' + esp_serv + '*)TblsintomaslugarServicio%3A(' + esp_serv + '*)SintomaConcatServicio%3A(' + esp_serv + '*)&rows=100&wt=json&indent=true',
                                url:   'http://52.34.51.52:8983/solr/mysql_index/select?q=TblLinkedInDrProfHead%3A(' + esp_serv + '*)TblLinkedInDrSummary%3A(' + esp_serv + '*)Catservicioname%3A(' + esp_serv + '*)Catserviciodescription%3A(' + esp_serv + '*)&rows=100&wt=json&indent=true',
                                dataType: 'jsonp',
                                success: function(data){

                                    if(data.response.numFound > 0){
                                        //data.response;
                                        var html="";
                                        for (var i=0;i<data.response.docs.length;i++){
                                            var res = data.response.docs[i]['Id'].split("-");
                                            /!*if(res[0]=="doctor"){
                                             // console.log( 'Es doctor');
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorName'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(!isNaN(res[0])){//si no es un NaN entonces es un hospital
                                             // console.log( 'Es Servicio');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'++++</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }else if(res[0]=="servicio"){
                                             // console.log( 'Es Servicio');
                                             var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/servicio/verServicio/'+res[1]+'">'+nameServices[2]+'******</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else*!/ if(res[0]=="linkedin"){
                                                // console.log( 'Es Linkedin');
                                                if(data.response.docs[i]['IdDoctorLink'] != undefined){
                                                    html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                                    html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                                    html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                                                    //html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                                    html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+'...</div>';
                                                    html+='</div>';
                                                    html+='</div>';
                                                }

                                            }/!*else if(res[0]=="experiencia"){
                                             // console.log( 'Es Experiencia');
                                             if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                                             data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                                             }
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="estudio"){
                                             // console.log( 'Es Estudio');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrEst']+'">'+String(data.response.docs[i]['NameDrEst']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblEducationSchool']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDegree']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationFieldOfStudy']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationGrade']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="curso"){
                                             // console.log( 'Es Curso');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrCourse']+'">'+String(data.response.docs[i]['NameDrCourse']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblCoursesName']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesInstitution']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['IdtblExperience']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasDoctor"){
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasServicio"){
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/servicio/verServicio/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }else {
                                             //result_search
                                             // console.log( 'Es hospital');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }*!/

                                        }
                                        for (var i=0;i<data.response.docs.length;i++){
                                            var res = data.response.docs[i]['Id'].split("-");
                                            /!*if(res[0]=="doctor"){
                                             // console.log( 'Es doctor');
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorName'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'---</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else*!/ if(!isNaN(res[0])){//si no es un NaN entonces es un hospital
                                                // console.log( 'Es Servicio');
                                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                                html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'++++</a></div>';
                                                html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                                html+='</div>';
                                                html+='</div>'
                                            }/!*else if(res[0]=="servicio"){
                                             // console.log( 'Es Servicio');
                                             var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/servicio/verServicio/'+res[1]+'">'+nameServices[2]+'******</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="linkedin"){
                                             // console.log( 'Es Linkedin');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="experiencia"){
                                             // console.log( 'Es Experiencia');
                                             if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                                             data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                                             }
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="estudio"){
                                             // console.log( 'Es Estudio');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrEst']+'">'+String(data.response.docs[i]['NameDrEst']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblEducationSchool']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDegree']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationFieldOfStudy']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationGrade']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="curso"){
                                             // console.log( 'Es Curso');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrCourse']+'">'+String(data.response.docs[i]['NameDrCourse']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblCoursesName']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesInstitution']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['IdtblExperience']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasDoctor"){
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasServicio"){
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/servicio/verServicio/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }else {
                                             //result_search
                                             // console.log( 'Es hospital');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }*!/

                                        }
                                        for (var i=0;i<data.response.docs.length;i++){
                                            var res = data.response.docs[i]['Id'].split("-");
                                            /!*if(res[0]=="doctor"){
                                             // console.log( 'Es doctor');
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorName'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'---</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(!isNaN(res[0])){//si no es un NaN entonces es un hospital
                                             // console.log( 'Es Servicio');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'++++</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }else*!/ if(res[0]=="servicio"){
                                                // console.log( 'Es Servicio');
                                                var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                                html+='<div class="title_url"><a href="/hospital/verHospital/'+data.response.docs[i]["IdcatHospitalServ"]+'">'+data.response.docs[i]["Catservicioname"]+'</a></div>';
                                                // html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                                html+='</div>';
                                                html+='</div>';
                                            }/!*else if(res[0]=="linkedin"){
                                             // console.log( 'Es Linkedin');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="experiencia"){
                                             // console.log( 'Es Experiencia');
                                             if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                                             data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                                             }
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="estudio"){
                                             // console.log( 'Es Estudio');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrEst']+'">'+String(data.response.docs[i]['NameDrEst']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblEducationSchool']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDegree']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationFieldOfStudy']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationGrade']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="curso"){
                                             // console.log( 'Es Curso');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrCourse']+'">'+String(data.response.docs[i]['NameDrCourse']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblCoursesName']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesInstitution']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['IdtblExperience']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasDoctor"){
                                             var nameDoctor="Doctor(a)";

                                             if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                                             nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                                             }

                                             if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                                             }
                                             if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                                             nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                                             }

                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>';
                                             }else if(res[0]=="sintomasServicio"){
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/servicio/verServicio/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }else {
                                             //result_search
                                             // console.log( 'Es hospital');
                                             html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                             html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                             html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                             html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                             html+='</div>';
                                             html+='</div>'
                                             }*!/

                                        }


                                        $('#result_search').html(html);
                                        $(".not_found").addClass("hide");
                                        findAdword(typeValue);

                                    }else{
                                        $('#result_search').html("");
                                        $("#not_found").removeClass("hide");
                                    }
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    console.log(xhr.status);
                                    console.log(thrownError);
                                    console.log(xhr)
                                },
                                jsonp: 'json.wrf'
                            });
                        }
                        /!*if(data.response.numFound > 0){
                         //data.response;
                         var html="";
                         for (var i=0;i<data.response.docs.length;i++){
                         var res = data.response.docs[i]['Id'].split("-");
                         if(res[0]=="doctor"){
                         // console.log( 'Es doctor');
                         var nameDoctor="Doctor(a)";

                         if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                         nameDoctor=data.response.docs[i]['TblDoctorName'];
                         }

                         if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                         nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                         }
                         if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                         nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                         }

                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="servicio"){
                         // console.log( 'Es Servicio');
                         var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/servicio/verServicio/'+res[1]+'">'+nameServices[2]+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="linkedin"){
                         // console.log( 'Es Linkedin');
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="experiencia"){
                         // console.log( 'Es Experiencia');
                         if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                         data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                         }
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="estudio"){
                         // console.log( 'Es Estudio');
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrEst']+'">'+String(data.response.docs[i]['NameDrEst']).toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['TblEducationSchool']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDegree']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationFieldOfStudy']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationGrade']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="curso"){
                         // console.log( 'Es Curso');
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrCourse']+'">'+String(data.response.docs[i]['NameDrCourse']).toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['TblCoursesName']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesInstitution']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['IdtblExperience']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="sintomasDoctor"){
                         var nameDoctor="Doctor(a)";

                         if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                         nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                         }

                         if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                         nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                         }
                         if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                         nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                         }

                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                         html+='</div>';
                         html+='</div>';
                         }else if(res[0]=="sintomasServicio"){
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/servicio/verServicio/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                         html+='</div>';
                         html+='</div>'
                         }else{
                         //result_search
                         // console.log( 'Es hospital');
                         html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                         html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                         html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                         html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                         html+='</div>';
                         html+='</div>'
                         }

                         }


                         $('#result_search').html(html);
                         $(".not_found").addClass("hide");
                         findAdword(typeValue);

                         }else{
                         $('#result_search').html("");
                         $("#not_found").removeClass("hide");
                         }*!/
                    }else{
                        $('#result_search').html("");
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    console.log(xhr)
                },
                jsonp: 'json.wrf'
            });

        }else{
            $('#result_search').html("");
            $(".not_found").addClass("hide");
        }
        // console.log($(this).val());
    });*/

    $(document).on("keyup","#buscador",function(){
        if($("#buscador").val().length==0){
            controlForAdwordsShow =0;
            control_palabraAdwordsShow =0;
            $('#banner').addClass('hide');
        }
        var typeValue = $(this).val().toLowerCase();
        if($(this).val()!=""){
            $.ajax({
                type:  'POST',
                url:   'http://52.34.51.52:8983/solr/mysql_index/select?q=TblDoctorName%3A(' + $(this).val() + '*)TblDoctorPaterno%3A(' + $(this).val() + '*)TblDoctorMaterno%3A(' + $(this).val() + '*)Catservicioname%3A(' + $(this).val() + '*)Catserviciodescription%3A(' + $(this).val() + '*)TblLinkedInDrProfHead%3A(' + $(this).val() + '*)TblLinkedInDrSummary%3A(' + $(this).val() + '*)TblExperienceCompany%3A(' + $(this).val() + '*)TblExperienceDescriptionJob%3A(' + $(this).val() + '*)TblExperienceLocationJob%3A(' + $(this).val() + '*)Name%3A(' + $(this).val() + '*)CatHospitalAddress%3A(' + $(this).val() + '*)CatHospitalDescription%3A(' + $(this).val() + '*)Tblsintomasname%3A(' + $(this).val() + '*)Tblsintomaslugar%3A(' + $(this).val() + '*)SintomaConcat%3A(' + $(this).val() + '*)TblsintomasnameServicio%3A(' + $(this).val() + '*)TblsintomaslugarServicio%3A(' + $(this).val() + '*)SintomaConcatServicio%3A(' + $(this).val() + '*)TblExperienceJobTitle%3A(' + $(this).val() + '*)&rows=100&wt=json&indent=true',
                dataType: 'jsonp',
                success: function(data){
                    if(data.response.numFound > 0){
                        //data.response;
                        var html="";
                        /*for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="doctor"){
                                // console.log( 'Es doctor');
                                var nameDoctor="Doctor(a)";

                                if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                                    nameDoctor=data.response.docs[i]['TblDoctorName'];
                                }

                                if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                                }
                                if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                                }

                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="servicio"){
                                // console.log( 'Es Servicio');
                                var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/servicio/verServicio/'+res[1]+'">'+nameServices[2]+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="linkedin"){
                                // console.log( 'Es Linkedin');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="experiencia"){
                                // console.log( 'Es Experiencia');
                                if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                                    data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                                }
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="estudio"){
                                // console.log( 'Es Estudio');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrEst']+'">'+String(data.response.docs[i]['NameDrEst']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblEducationSchool']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDegree']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationFieldOfStudy']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationGrade']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblEducationDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="curso"){
                                // console.log( 'Es Curso');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrCourse']+'">'+String(data.response.docs[i]['NameDrCourse']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblCoursesName']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesInstitution']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['IdtblExperience']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblCoursesDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="sintomasDoctor"){
                                var nameDoctor="Doctor(a)";

                                if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                                    nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                                }

                                if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                                }
                                if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                                }

                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }else if(res[0]=="sintomasServicio"){
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/servicio/verServicio/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>'
                            }else{
                                //result_search
                                // console.log( 'Es hospital');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>'
                            }

                        }*/

                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="servicio"){
                                // console.log( 'Es Servicio');
                                var nameServices=String(data.response.docs[i]["Catservicioname"]).split(".");
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/servicio/verServicioHospital/'+res[1]+'">'+data.response.docs[i]["Catservicioname"]+'</a></div>';
                                // html+='<div class="text_description">'+String(data.response.docs[i]['Catserviciodescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }

                        }
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="sintomasServicio"){
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/servicio/verServicioHospital/'+data.response.docs[i]['IdcatservicioSintomaServicio']+'">'+data.response.docs[i]['CatservicionameFormatSintoma']+'</a></div>';
                                //html+='<div class="text_description">'+String(data.response.docs[i]['CatserviciodescriptionSintomaServicio']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>'
                            }

                        }
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            // console.log( 'Es Linkedin');
                            if(res[0]=="doctor"){
                                // console.log( 'Es doctor');
                                var nameDoctor="Doctor(a)";

                                if(data.response.docs[i]['TblDoctorName']!= undefined && data.response.docs[i]['TblDoctorName'] !=""){
                                    nameDoctor=data.response.docs[i]['TblDoctorName'];
                                }

                                if(data.response.docs[i]['TblDoctorPaterno']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorPaterno'];;
                                }
                                if(data.response.docs[i]['TblDoctorMaterno']!= undefined){
                                    nameDoctor +=' '+data.response.docs[i]['TblDoctorMaterno'];;
                                }

                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+res[1]+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                //html+='<div class="text_description">'+String(data.response.docs[i]['Extracto']).substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }

                        }
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="linkedin"){
                                // console.log( 'Es Linkedin');
                                if(data.response.docs[i]['IdDoctorLink'] != undefined){
                                    html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                    html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                    html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDoctorLink']+'">'+String(data.response.docs[i]['Nombre_doctor']).toUpperCase()+'</a></div>';
                                    //html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrSummary']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                    html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrProfHead']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblLinkedInDrCountry']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+'...</div>';
                                    html+='</div>';
                                    html+='</div>';
                                }
                            }

                        }
                        var flagSintomasDoctor="";
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="sintomasDoctor"){
                                var nameDoctor="Doctor(a)";
                                if(data.response.docs[i]['idtblDrSintoma']!=flagSintomasDoctor){
                                    flagSintomasDoctor=data.response.docs[i]['idtblDrSintoma'];
                                    if(data.response.docs[i]['TblDoctorNameSintoma']!= undefined && data.response.docs[i]['TblDoctorNameSintoma'] !=""){
                                        nameDoctor=data.response.docs[i]['TblDoctorNameSintoma'];
                                    }

                                    if(data.response.docs[i]['TblDoctorPaternoSintoma']!= undefined){
                                        nameDoctor +=' '+data.response.docs[i]['TblDoctorPaternoSintoma'];;
                                    }
                                    if(data.response.docs[i]['TblDoctorMaternoSintoma']!= undefined){
                                        nameDoctor +=' '+data.response.docs[i]['TblDoctorMaternoSintoma'];;
                                    }

                                    html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                    html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                    html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['idtblDrSintoma']+'">'+nameDoctor.toUpperCase()+'</a></div>';
                                    //html+='<div class="text_description">'+String(data.response.docs[i]['TblLinkedInDrSummarySintoma']).substring(0,300)+'...</div>';
                                    html+='</div>';
                                    html+='</div>';
                                }
                            }

                        }
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(!isNaN(res[0])){//si no es un NaN entonces es un hospital
                                // console.log( 'Es Servicio');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                //html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>'
                            }

                        }
                        for (var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(!isNaN(res[0])){//si no es un NaN entonces es un hospital
                                // console.log( 'Es Servicio');
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/hospital/verHospital/'+res[0]+'">'+String(data.response.docs[i]['Name']).toUpperCase()+'</a></div>';
                                //html+='<div class="text_description">'+String(data.response.docs[i]['CatHospitalAddress']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['CatHospitalDescription']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,300)+'...</div>';
                                html+='</div>';
                                html+='</div>'
                            }

                        }
                        for(var i=0;i<data.response.docs.length;i++){
                            var res = data.response.docs[i]['Id'].split("-");
                            if(res[0]=="experiencia"){
                                // console.log( 'Es Experiencia');
                                if(String(data.response.docs[i]['NameDrExp']).toUpperCase() ==""){
                                    data.response.docs[i]['NameDrExp']=String(data.response.docs[i]['TblExperienceJobTitle']).toUpperCase();
                                }
                                html+='<div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid">';
                                html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid container_search" >';
                                html+='<div class="title_url"><a href="/doctor/verPerfil/'+data.response.docs[i]['IdDrExp']+'">'+String(data.response.docs[i]['NameDrExp']).toUpperCase()+'</a></div>';
                                html+='<div class="text_description">'+String(data.response.docs[i]['TblExperienceCompany']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceJobTitle']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceDescriptionJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>")+', '+String(data.response.docs[i]['TblExperienceLocationJob']).toLowerCase().replace(typeValue,"<b>"+typeValue+"</b>").substring(0,200)+'...</div>';
                                html+='</div>';
                                html+='</div>';
                            }
                        }



                        $('#result_search').html(html);
                        $(".not_found").addClass("hide");
                        findAdword(typeValue);

                    }else{
                        $('#result_search').html("");
                        $("#not_found").removeClass("hide");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    console.log(xhr)
                },
                jsonp: 'json.wrf'
            });

        }else{
            $('#result_search').html("");
            $(".not_found").addClass("hide");
        }
        // console.log($(this).val());
    });



    //declaro objeto que servira de parametro para inicializar el objeto tipo FileUploadPlugin
    var formatoParametrosFileUploadPlugin = {
        selector:"#fileuploader",
        url:"../index.php",
        fileName:"cvDoctor",
        acceptFiles:".pdf",
        maxSize:100,
        isImg:false,/*
         onSelect:function(files)
         {//TODO
         if(this.defaultInitObj.isImg){
         alert("es imagen");
         }
         },*/
        onSuccess:function(files,data,xhr,pd)
        {//TODO
            console.log(files);
            console.log(data);
            console.log(xhr);
            console.log(pd);
            where = data;
        },
        deleteCallback:function(data,pd){//TODO
            console.log(data)
            console.log(pd)
        }
    };
    var formatoParametrosFileUploadPluginImgProfile = {
        selector:"#load_img_profile",
        url:"../index.php",
        fileName:"imgProfile",
        acceptFiles:"image/*",
        maxSize:100,
        isImg:true,/*
         onSelect:function(files)
         {//TODO
         if(formatoParametrosFileUploadPluginImgProfile.defaultInitObj.isImg){
         alert("es imagen");
         }
         },*/
        onSuccess:function(files,data,xhr,pd)
        {//TODO


            console.log(data[0].imgProfile);
            if(data[0].imgProfile.type.search(/image/i)!= -1){
                $("#load_img_profile").siblings(".ajax-file-upload-container").find(".ajax-file-upload-statusbar").addClass("ajax-file-upload-statusbar-imgProfile");
                $("#load_img_profile").siblings(".ajax-file-upload-container").find(".ajax-file-upload-statusbar .ajax-file-upload-preview").css("width","150").css("height","150");
                $("#load_img_profile").siblings(".ajax-file-upload-container")
                    .find(".ajax-file-upload-statusbar .ajax-file-upload-filename, .ajax-file-upload-statusbar .ajax-file-upload-progress")
                    .addClass("hide");
                $("#load_img_profile").siblings(".ajax-file-upload-container").addClass("ajax-file-upload-container-img-profile");
            }
            console.log(files[0]);
            console.log(data);
            console.log(xhr);
            console.log(pd);
            where = data;
        },
        deleteCallback:function(data,pd){//TODO
            console.log(data)
            console.log(pd)
        }
    };
    //instancio objeto del tipo FileUploadPlugin
    var uploadfile = new FileUploadPlugin(formatoParametrosFileUploadPlugin);
    var uploadfileImgProfile = new FileUploadPlugin(formatoParametrosFileUploadPluginImgProfile);
    //iniciar el Upload file
    uploadfile.initDefault();
    uploadfileImgProfile.defaultInitObj.isImg=true;
    uploadfileImgProfile.defaultInitObj.uploadStr="Subir Foto";
    uploadfileImgProfile.defaultInitObj.dragDrop=false;
    uploadfileImgProfile.initDefault();
    //iniciar el Datepicker
    datepicker.initDefault();
    //iniciar limitchar
    limitchar.init(".limitChar",VALORLIMITE);

    $("#plus_exp").on("click",function(){
        datepicker.destroyDatepicker();
        var random_val = common.random(0,9999);
        var template_clone = $( "#clone_exp" ).html();
        $(this).attr('disabled','disabled');
        $("#clone_exp").each(function(){

            $("#form_save_experience_doctor_0").attr("id","form_save_experience_doctor_"+random_val);
            $("#send_new_experience_0").attr("data-form-new","#form_save_experience_doctor_"+random_val);
            $("#send_new_experience_0").attr("id","send_new_experience_"+random_val);

            $("#idExp_0").attr("id","idExp_"+random_val);
            $("#remove_0").attr("data-container-id","#clone_exp_"+random_val);
            $("#remove_0").attr("id","remove_"+random_val);
            $("#inputCargo_0").parent().siblings("label").attr("for","inputCargo_"+random_val);
            $("#inputCargo_0").attr("id","inputCargo_"+random_val);
            $("#inputHospital_0").parent().siblings("label").attr("for","inputHospital_"+random_val);
            $("#inputHospital_0").attr("id","inputHospital_"+random_val);
            $("#inputFechaIngreso_0").parent().siblings("label").attr("for","inputFechaIngreso_"+random_val);
            $("#inputFechaIngreso_0").attr("id","inputFechaIngreso_"+random_val);
            $("#inputFechaFin_0").parent().siblings("label").attr("for","inputFechaFin_"+random_val);
            $("#inputFechaFin_0").attr("id","inputFechaFin_"+random_val);

            //limitchar.init("#inputDescripcionCargo_0" ,2000);
            $("#inputDescripcionCargo_0").parent().siblings("label").attr("for","inputDescripcionCargo_"+random_val);
            $("#inputDescripcionCargo_0").attr("id","inputDescripcionCargo_"+random_val);
            $("#actual_exp_0").attr("id","actual_exp_"+random_val);
        });
        $( "#clone_exp" ).clone().attr("id","clone_exp_"+random_val).removeClass("hide").prependTo("#space_clone_exp");
        datepicker.defaultInitObj.maxDate="0";
        datepicker.initDefault();
        $( "#clone_exp").html(template_clone);
        $("#sectionExperiencia").each(function(){limitchar.init("#inputDescripcionCargo_"+random_val ,2000)});

    });

    $("#plus_est").on("click",function(){
        datepicker.destroyDatepicker();
        var random_val = common.random(0,9999);
        var template_clone = $( "#clone_est" ).html();
        $(this).attr('disabled','disabled');
        $("#clone_est").each(function(){

            $("#form_save_education_doctor_0").attr("id","form_save_education_doctor_"+random_val);
            $("#send_new_education_0").attr("data-form-new","#form_save_education_doctor_"+random_val);
            $("#send_new_education_0").attr("id","send_new_education_"+random_val);


            $("#idEst_0").attr("id","idEst_"+random_val);
            $("#remove_est_0").attr("data-container-id","#clone_est_"+random_val);
            $("#remove_est_0").attr("id","remove_"+random_val);
            $("#inputCarrera_0").parent().siblings("label").attr("for","inputCarrera_"+random_val);
            $("#inputCarrera_0").attr("id","inputCarrera_"+random_val);
            $("#inputUniversidad_0").parent().siblings("label").attr("for","inputUniversidad_"+random_val);
            $("#inputUniversidad_0").attr("id","inputUniversidad_"+random_val);
            $("#inputFechaIngresoUniv_0").parent().siblings("label").attr("for","inputFechaIngresoUniv_"+random_val);
            $("#inputFechaIngresoUniv_0").attr("id","inputFechaIngresoUniv_"+random_val);
            $("#inputFechaFinUniv_0").parent().siblings("label").attr("for","inputFechaFinUniv_"+random_val);
            $("#inputFechaFinUniv_0").attr("id","inputFechaFinUniv_"+random_val);
            $("#inputDescripcionCarrera_0").parent().siblings("label").attr("for","inputDescripcionCarrrera_"+random_val);
            $("#inputDescripcionCarrera_0").attr("id","inputDescripcionCarrera_"+random_val);
            $("#actual_est_0").attr("id","actual_est_"+random_val);
        });
        $( "#clone_est" ).clone().attr("id","clone_est_"+random_val).removeClass("hide").prependTo("#space_clone_est");

        datepicker.defaultInitObj.maxDate="+5Y";
        datepicker.defaultInitObj.yearRange="-50:+5";
        datepicker.initDefault();
        $( "#clone_est").html(template_clone);
        $("#sectionEstudios").each(function(){limitchar.init("#inputDescripcionCarrera_"+random_val ,2000)});
    });

    $("#plus_curso").on("click",function(){
        datepicker.destroyDatepicker();
        var random_val = common.random(0,9999);
        var template_clone = $( "#clone_curso" ).html();
        $(this).attr('disabled','disabled');
        $("#clone_curso").each(function(){

            $("#form_save_course_doctor_0").attr("id","form_save_course_doctor_"+random_val);
            $("#send_new_course_0").attr("data-form-new","#form_save_course_doctor_"+random_val);
            $("#send_new_course_0").attr("id","send_new_course_"+random_val);

            $("#idCourse_0").attr("id","idCourse_"+random_val);
            $("#remove_curso_0").attr("data-container-id","#clone_curso_"+random_val);
            $("#remove_curso_0").attr("id","remove_"+random_val);
            $("#nombreCurso_0").parent().siblings("label").attr("for","nombreCurso_"+random_val);
            $("#nombreCurso_0").attr("id","nombreCurso_"+random_val);
            $("#inputInstitucion_0").parent().siblings("label").attr("for","inputInstitucion_"+random_val);
            $("#inputInstitucion_0").attr("id","inputInstitucion_"+random_val);
            $("#asociadoCon_0").parent().siblings("label").attr("for","asociadoCon_"+random_val);
            $("#asociadoCon_0").attr("id","asociadoCon_"+random_val);
            $("#inputFechaIngresoCurso_0").parent().siblings("label").attr("for","inputFechaIngresoCurso_"+random_val);
            $("#inputFechaIngresoCurso_0").attr("id","inputFechaIngresoCurso_"+random_val);
            $("#inputFechaFinCurso_0").parent().siblings("label").attr("for","inputFechaFinCurso_"+random_val);
            $("#inputFechaFinCurso_0").attr("id","inputFechaFinCurso_"+random_val);
            $("#inputDescripcionCurso_0").parent().siblings("label").attr("for","inputDescripcionCurso_"+random_val);
            $("#inputDescripcionCurso_0").attr("id","inputDescripcionCurso_"+random_val);
            $("#actual_curso_0").attr("id","actual_curso_"+random_val);
        });
        $( "#clone_curso" ).clone().attr("id","clone_curso_"+random_val).removeClass("hide").prependTo("#space_clone_course");
        datepicker.defaultInitObj.maxDate="+5Y";
        datepicker.defaultInitObj.yearRange="-50:+5";
        datepicker.initDefault();
        $( "#clone_curso").html(template_clone);
        $("#sectionCourse").each(function(){limitchar.init("#inputDescripcionCurso_"+random_val ,2000)});
    });

    $(document).on("click",".remove_element",function(){
        //$($(this).data("container-id")).remove();
        var container_to_delete = $(this).data("container-id");
        var container_modal = $(this).data("container-modal");
        var id_to_delete = $(this).data("idto-delete");
        var data_url = $(this).data("url-delete");
        var button_toactivate = $(this).data("button-toactivate");
        var _token = $("input[name=_token").val();
        var url={
            1:"/doctor/cambiarStatusExperiencia",
            2:"/doctor/cambiarStatusEstudio",
            3:"/doctor/cambiarStatusCursos",
        }
        var $btn = $(this).button('loading')
        //alert("Hola mama voy a eliminar a "+ id_to_delete.length);return false
        if(id_to_delete.length != 0){
            $.ajax({
                type     : "POST",
                url      : url[data_url],
                dataType : "json",
                data     : {idExperience:id_to_delete,idEducation:id_to_delete,idCourse:id_to_delete,_token:_token},
                success  : function(data){
                    if(data.success=="true"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $btn.button('reset');
                        $(container_modal).modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $(container_to_delete).remove();
                        location.reload();
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }else{
            $(button_toactivate).removeAttr('disabled');
            $($(this).data("container-id")).remove();
        }

    });

    $(document).on("change","#tblLinkedInDrImg",function(){
        readURL(this);
    });
    $(document).on("change","#tblpacienteimgprofile",function(){
        readURLPatient(this);
    });


    $(document).on("change","#tblLinkedInDrBannerImg",function(){
        readURLBanner(this);
    });

    $( ".over_edit" ).on( "click", function() {
        $( "#label_img" ).trigger( "click" );
    });


    /*PERFIL HOSPITAL*/
    $(document).on("click",".ver_mas",function(){
        var display = $(".value_boton").toggle();
        if ( $("#ver_mas_value").is(":visible")) {
            $( "#container-banner" ).css("height","100%");
        } else {
            $("#container-banner").css("height","233px");
        }

    });


    /*ENVIAR FORM*/
    //lapiz editar nombre
    $(document).on("click","#edit_name",function(){

        $("#doctor_name_show").addClass('hide');
        $("#doctor_name_edit").removeClass("hide");

    });
    //lapiz editar direccion y pais
    $(document).on("click","#edit_adress",function(){

        $("#doctor_adress_show").addClass('hide');
        $("#doctor_adress_edit").removeClass("hide");

    });
    //lapiz extracto
    $(document).on("click","#edit_summary",function(){

        $("#doctor_summary_show").addClass('hide');
        $("#doctor_summary_edit").removeClass("hide");

    });
    //lapiz cv
    $(document).on("click","#edit_cv",function(){

        $("#doctor_cv_show").addClass('hide');
        $("#doctor_cv_edit").removeClass("hide");

    });
    //lapiz experiencia, estudio y cursos
    $(document).on("click",".edit_section_dinamyc_buttom",function(){

        var container_show = $(this).data("container-show");
        var container_edit = $(this).data("container-edit");
        var class_show = $(this).data("class-show");
        var class_edit = $(this).data("class-edit");
        //Ocultar y mostrar clases generales
        $(class_edit).addClass('hide');
        $(class_show).removeClass('hide');
        //mostrar y ocultar
        $(container_show).addClass('hide');
        $(container_edit).removeClass("hide");

    });

    $(document).on("click","#edit_section_name_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish("#form_edit_name_doctor");
        if(validator.form()){
            var formDataJson = $('#form_edit_name_doctor').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblDr = $("input[name=idtblDr]").val();
            var $btn = $(this).button('loading');

            $.ajax({
                type     : "POST",
                url      : '/doctor/editarNombre',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#doctor_name_show").html(data.datos.tblDoctorName+' '+data.datos.tblDoctorPaterno+' '+data.datos.tblDoctorMaterno);
                        $("#doctor_name_edit").addClass('hide');
                        $("#doctor_name_show").removeClass('hide');
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }

    });


    $(document).on("click","#edit_section_adress_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish("#form_edit_adress_doctor");

        if(validator.form()){
            var formDataJson = $('#form_edit_adress_doctor').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblDr = $("input[name=idtblDr]").val();
            var idtblLinkedInDr = $("input[name=idtblLinkedInDr]").val();
            var $btn = $(this).button('loading');
            $.ajax({
                type     : "POST",
                url      : '/linkedin/editarDireccion',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr,idtblLinkedInDr:idtblLinkedInDr},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#doctor_adress_show").html('<blockquote style="font-size: 12px"><p>'+data.datos.tblLinkedInDrProfHead+'</p><p>'+data.datos.tblLinkedInDrAddress+', '+data.datos.tblLinkedInDrCountry+'</p></blockquote>');
                        $("#doctor_adress_edit").addClass('hide');
                        $("#doctor_adress_show").removeClass("hide");
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }



    });

    $(document).on("click","#edit_section_summary_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish("#form_edit_summary_doctor");

        if(validator.form()){
            var formDataJson = $('#form_edit_summary_doctor').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblDr = $("input[name=idtblDr]").val();
            var idtblLinkedInDr = $("input[name=idtblLinkedInDr]").val();
            var $btn = $(this).button('loading');

            $.ajax({
                type     : "POST",
                url      : '/linkedin/editarExtracto',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr,idtblLinkedInDr:idtblLinkedInDr},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#doctor_summary_show").html('<p class="justify-italic-paragraf">"'+data.datos.tblLinkedInDrSummary+'"</p>');
                        $("#doctor_summary_edit").addClass('hide');
                        $("#doctor_summary_show").removeClass("hide");

                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }


    });

    $(document).on("click",".edit_section_send_buttom",function(e){
        e.preventDefault();

        var container_show = $(this).data("container-show");
        var container_edit = $(this).data("container-edit");
        var id_edit = $(this).data("id-edit");
        var type_edit = $(this).data("type-edit");

        if(type_edit== 1){//>PARA EXPERIENCIAS
            var validator = validateForms.initSpanish('#form_edit_experience_doctor_'+id_edit);
            if(validator.form()){
                var formDataJson = $('#form_edit_experience_doctor_'+id_edit).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var idtblExperience = id_edit;
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/experiencia/editarExperienciaWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr,idtblExperience:idtblExperience},
                    success  : function(data){
                        if(data.estado=="1"){
                            //mostrar_modal_dinamic(data.msg,'success');
                            var htmlExperience = ""
                            // $(container_show).html('<p class="justify-italic-paragraf">"'+data.view+'' +'"</p>');
                            $(container_edit).addClass('hide');
                            $(container_show).removeClass("hide");
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else if( type_edit == 2){//>PARA ESTUDIOS
            var validator = validateForms.initSpanish('#form_edit_education_doctor_'+id_edit);
            if(validator.form()) {
                var formDataJson = $('#form_edit_education_doctor_'+id_edit).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var idtblEducation = id_edit;
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/estudio/editarEstudioWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr,idtblEducation:idtblEducation},
                    success  : function(data){
                        if(data.estado=="1"){
                            //mostrar_modal_dinamic(data.msg,'success');
                            var htmlExperience = ""
                            // $(container_show).html('<p class="justify-italic-paragraf">"'+data.view+'' +'"</p>');
                            $(container_edit).addClass('hide');
                            $(container_show).removeClass("hide");
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });

            }


        }else if(type_edit == 3){//>PARA CURSOS
            var validator = validateForms.initSpanish('#form_edit_course_doctor_'+id_edit);
            if(validator.form()) {
                var formDataJson = $('#form_edit_course_doctor_'+id_edit).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var idtblCourses = id_edit;
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/curso/editarCursoWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr,idtblCourses:idtblCourses},
                    success  : function(data){
                        if(data.estado=="1"){
                            //mostrar_modal_dinamic(data.msg,'success');
                            var htmlExperience = ""
                            // $(container_show).html('<p class="justify-italic-paragraf">"'+data.view+'' +'"</p>');
                            $(container_edit).addClass('hide');
                            $(container_show).removeClass("hide");
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else{
            //TODO
        }





    });


    $(document).on("click","#edit_section_cv_buttom",function(){

        // var formDataJson = $('#form_edit_summary_doctor').serializeJSON();

        // var _token = $("input[name=_token]").val();
        // var idtblDr = $("input[name=idtblDr]").val();
        // var idtblLinkedInDr = $("input[name=idtblLinkedInDr]").val();

        var formData = new FormData(document.getElementById("form_edit_cv_doctor"));
        formData.append("_token", $("input[name=_token]").val());
        var $btn = $(this).button('loading');


        $.ajax({
            type     : "POST",
            url      : '/linkedin/editarCV',
            dataType : "json",
            data     : formData,
            // cache: false,
            contentType: false,
            processData: false,
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    $("#doctor_cv_show").html('<a class="btn btn-default btn-lg col-lg-2 col-md-2  col-sm-5 col-xs-5" target="_blank" href="/upload/doctores/'+data.datos.idtblDr+'/cv/'+data.datos.tblLinkedInDrCV+'">' +
                        '<span class="glyphicon glyphicon-list-alt"></span> Curriculum</a>' +
                        '<div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" >' +
                        '<img id="edit_cv" class="edit edit_section" width="20" src="/img/pencilforlinke.png">' +
                        '</div>');
                    $("#doctor_cv_edit").addClass('hide');
                    $("#doctor_cv_show").removeClass("hide");

                    $btn.button('reset');
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });


    });


    $(document).on("click",".send_new_item",function(e){
        e.preventDefault();

        var container_show = $(this).data("container-show");
        var container_edit = $(this).data("container-edit");
        var form_id = $(this).data("form-new");
        var type_add = $(this).data("type-add");
        var validator = validateForms.initSpanish(form_id);

        if(type_add== 1){//>PARA EXPERIENCIAS
            if(validator.form()) {
                var formDataJson = $(form_id).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/experiencia/crearExperienciaWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr},
                    success  : function(data){
                        if(data.estado=="1"){
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else if( type_add == 2){//>PARA ESTUDIOS
            if(validator.form()) {
                var formDataJson = $(form_id).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/estudio/crearEstudioWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr},
                    success  : function(data){
                        if(data.estado=="1"){
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else if(type_add == 3){//>PARA CURSOS
            if(validator.form()) {
                var formDataJson = $(form_id).serializeJSON();
                var _token = $("input[name=_token]").val();
                var idtblDr = $("input[name=idtblDr]").val();
                var $btn = $(this).button('loading');

                $.ajax({
                    type     : "POST",
                    url      : '/curso/crearCursoWeb',
                    dataType : "json",
                    data     : {formDataJson:formDataJson,_token:_token,idtblDr:idtblDr},
                    success  : function(data){
                        if(data.estado=="1"){
                            location.reload();
                            $btn.button('reset');
                        } else{
                            //mostrar_modal_dinamic(data.msg,'danger');
                        }
                    },
                    error: function (request, status, error){
                        //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                    },
                    complete: function(){

                    }
                });
            }


        }else{
            //TODO
        }





    });


    /*Filtrado*/
    $('#search').keyup(function() {
        var table = $(this).data("id-table-search");
        var $rows = $(table+' tr');
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });

    /************Paciente****************/

    //lapiz editar nombre
    $(document).on("click","#edit_name_patient",function(){

        $("#patient_name_show").addClass('hide');
        $("#patient_name_edit").removeClass("hide");

    });
    //lapiz editar info
    $(document).on("click","#edit_info_patient",function(){

        $("#patient_info_show").addClass('hide');
        $("#patient_info_edit").removeClass("hide");

    });
    //lapiz editar direccion particular
    $(document).on("click","#edit_address_P",function(){

        $("#patient_address_P_show").addClass('hide');
        $("#patient_address_P_edit").removeClass("hide");

    });
    //lapiz editar direccion particular
    $(document).on("click","#edit_address_F",function(){

        $("#patient_address_F_show").addClass('hide');
        $("#patient_address_F_edit").removeClass("hide");

    });



    $(document).on("click","#edit_section_patient_name_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish('#form_edit_name_patient');
        if(validator.form()){
            var formDataJson = $('#form_edit_name_patient').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblpaciente = $("input[name=idtblpaciente]").val();
            var $btn = $(this).button('loading');
            $.ajax({
                type     : "POST",
                url      : '/paciente/editarNombre',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblpaciente:idtblpaciente},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#patient_name_show").html(data.datos.tblpacientename+' '+data.datos.tblpacientepaterno+' '+data.datos.tblpacientematerno);
                        $("#patient_name_edit").addClass('hide');
                        $("#patient_name_show").removeClass('hide');
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }


    });



    $(document).on("click","#edit_patient_section_info_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish('#form_edit_info_patient');
        if(validator.form()){
            var formDataJson = $('#form_edit_info_patient').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblpaciente = $("input[name=idtblpaciente]").val();
            var idtblcontacto = $("input[name=idtblcontacto]").val();
            // var $btn = $(this).button('loading');
            $.ajax({
                type     : "POST",
                url      : '/paciente/editarInfo',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblpaciente:idtblpaciente,idtblcontacto:idtblcontacto},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        //$("#doctor_name_show").html(data.datos.tblDoctorName+' '+data.datos.tblDoctorPaterno+' '+data.datos.tblDoctorMaterno);
                        $("#patient_info_edit").addClass('hide');
                        $("#patient_info_show").removeClass('hide');
                        location.reload();
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                        location.reload();
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }


    });

    $(document).on("click","#edit_section_patient_address_P_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish('#form_edit_address_P_patient');
        if(validator.form()){
            var formDataJson = $('#form_edit_address_P_patient').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblpaciente = $("input[name=idtblpaciente]").val();
            var idtblcontacto = $("input[name=idtblcontacto]").val();
            var $btn = $(this).button('loading');
            $.ajax({
                type     : "POST",
                url      : '/paciente/editarDireccionParticular',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblpaciente:idtblpaciente,idtblcontacto:idtblcontacto},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#patient_address_P_show").html('<p class="justify-italic-paragraf">"'+data.datos+'"</p>');
                        $("#patient_address_P_edit").addClass('hide');
                        $("#patient_address_P_show").removeClass('hide');
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }


    });


    $(document).on("click","#edit_section_patient_address_F_buttom",function(e){
        e.preventDefault();
        var validator = validateForms.initSpanish('#form_edit_address_F_patient');
        if(validator.form()){
            var formDataJson = $('#form_edit_address_F_patient').serializeJSON();
            var _token = $("input[name=_token]").val();
            var idtblpaciente = $("input[name=idtblpaciente]").val();
            var idtblcontacto = $("input[name=idtblcontacto]").val();
            var $btn = $(this).button('loading');
            $.ajax({
                type     : "POST",
                url      : '/paciente/editarDireccionFiscal',
                dataType : "json",
                data     : {formDataJson:formDataJson,_token:_token,idtblpaciente:idtblpaciente,idtblcontacto:idtblcontacto},
                success  : function(data){
                    if(data.estado=="1"){
                        //mostrar_modal_dinamic(data.msg,'success');
                        $("#patient_address_F_show").html('<p class="justify-italic-paragraf">"'+data.datos+'"</p>');
                        $("#patient_address_F_edit").addClass('hide');
                        $("#patient_address_F_show").removeClass('hide');
                        location.reload();
                        $btn.button('reset');
                    } else{
                        //mostrar_modal_dinamic(data.msg,'danger');
                    }
                },
                error: function (request, status, error){
                    //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
                },
                complete: function(){

                }
            });
        }


    });

    $(document).on("click","#remove_address_F",function(){


        var tblpacientefiscal = $("input[name=tblpacientefiscal]").val("");
        var formDataJson = $('#form_edit_address_F_patient').serializeJSON();
        var _token = $("input[name=_token]").val();
        var idtblpaciente = $("input[name=idtblpaciente]").val();
        var idtblcontacto = $("input[name=idtblcontacto]").val();
        $.ajax({
            type     : "POST",
            url      : '/paciente/eliminarDireccionFiscal',
            dataType : "json",
            data     : {formDataJson:formDataJson,_token:_token,idtblpaciente:idtblpaciente,idtblcontacto:idtblcontacto},
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    location.reload();
                    $btn.button('reset');
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });

    });
    /************End Paciente****************/

    /*$(document).on("click",".location",function(){
     var mapToShow=$(this).data('map-show');
     var latitude=$(this).data('latitude');
     var longitude=$(this).data('longitude');
     var target=$(this).data('target');

     var map;

     google.maps.event.addDomListener(window, 'load', initialize);

     function initialize() {
     var mapCanvas = document.getElementById(mapToShow);
     var mapOptions = {
     center: new google.maps.LatLng(latitude, longitude),
     zoom: 8,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions)
     }

     $(target).on('shown.bs.modal', function () {
     google.maps.event.trigger(map, "resize");
     });



     // initMap(target, mapToShow, latitude, longitude);
     });

     var map;
     var idMapShow ='map_1';
     var latitud = 44.5403;
     var longitud=-78.5463
     google.maps.event.addDomListener(window, 'load', initialize);

     function initialize() {
     var mapCanvas = document.getElementById(idMapShow);
     var mapOptions = {
     center: new google.maps.LatLng(latitud, longitud),
     zoom: 8,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions)
     }

     $('#modal_googlemaps_1').on('shown.bs.modal', function () {
     google.maps.event.trigger(map, "resize");
     });
     */

    $('.location').each(function(){
        var mapToShow = $(this).data('map-show');
        var latitude = $(this).data('latitude');
        var longitude = $(this).data('longitude');
        var target = $(this).data('target');
        var google_maps = new googleMaps();
        google_maps.googleMapsInit(latitude,longitude,mapToShow,target);

    });

    $(document).on("click",".location",function() {
        var mapToShow = $(this).data('map-show');
        var latitude = $(this).data('latitude');
        var longitude = $(this).data('longitude');
        var target = $(this).data('target');
        //instancio mapa
        var google_maps = new googleMaps();
        google_maps.googleMapsInit(latitude,longitude,mapToShow,target);

    });

    /*Formularios relacionados al Login y registro de usuario*/
    validateForms.initSpanish("#login_angeles");
    validateForms.initSpanish("#register_angeles");
    validateForms.initSpanish("#send_email_angeles");
    validateForms.initSpanish("#reset_angeles");

    //Close Appwork
    $(document).on('click','.close_appwork',function(){
        $(this).parent().hide();
    });

    //Close Appwork
    $(document).on('click','.enviarSolicitudCita',function(){
        var formDataJson = $($(this).data("selector-form")).serializeJSON();
        var url = $(this).data("url");
        var $btn = $(this).button('loading');
        console.log($(this).data("selector-form"));
        console.log(formDataJson+' '+url);
        $.ajax({
            type     : "POST",
            url      : url,
            dataType : "json",
            data     : formDataJson,
            success  : function(data){
                if(data.estado=="1"){
                    //mostrar_modal_dinamic(data.msg,'success');
                    $(".body_form_appointment").addClass("hide");
                    $(".footer_form_appointment").addClass("hide");
                    $(".message_succes h4").html(data.msg);
                    $(".message_succes").removeClass("hide");
                    $btn.button('reset');
                } else{
                    //mostrar_modal_dinamic(data.msg,'danger');
                    alert("Error!");
                }
            },
            error: function (request, status, error){
                //mostrar_modal_dinamic("ERROR<br>Estatus: "+status+"<br>Request status: "+request.status+"<br>Error: "+error,'success');
            },
            complete: function(){

            }
        });
        console.log(formDataJson);
    });





});//end document ready


