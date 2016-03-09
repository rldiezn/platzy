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
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        dateFormat: "yy-mm-dd",//ISO 8601
        prevText: '<Ant',
        nextText: 'Sig>',
        closeText: 'Cerrar',
        weekHeader: 'Sm',
    };
    this.initDefault = function(){
        $(this.selector).datepicker(this.defaultInitObj);
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

$(document).ready(function(){
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
        $("#clone_exp").each(function(){

            $("#remove_0").attr("data-container-id","#clone_exp_"+random_val);
            $("#remove_0").attr("id","remove_"+random_val);
            $("#inputCargo_0").parent().siblings("label").attr("for","inputCargo_"+random_val);
            $("#inputCargo_0").attr("name","cargo["+random_val+"]");
            $("#inputCargo_0").attr("id","inputCargo_"+random_val);
            $("#inputHospital_0").parent().siblings("label").attr("for","inputHospital_"+random_val);
            $("#inputHospital_0").attr("name","hospital["+random_val+"]");
            $("#inputHospital_0").attr("id","inputHospital_"+random_val);
            $("#inputFechaIngreso_0").parent().siblings("label").attr("for","inputFechaIngreso_"+random_val);
            $("#inputFechaIngreso_0").attr("name","fechaIngreso["+random_val+"]");
            $("#inputFechaIngreso_0").attr("id","inputFechaIngreso_"+random_val);
            $("#inputFechaFin_0").parent().siblings("label").attr("for","inputFechaFin_"+random_val);
            $("#inputFechaFin_0").attr("name","fechaFin["+random_val+"]");
            $("#inputFechaFin_0").attr("id","inputFechaFin_"+random_val);

            //limitchar.init("#inputDescripcionCargo_0" ,2000);
            $("#inputDescripcionCargo_0").parent().siblings("label").attr("for","inputDescripcionCargo_"+random_val);
            $("#inputDescripcionCargo_0").attr("name","inputDescripcionCargo["+random_val+"]");
            $("#inputDescripcionCargo_0").attr("id","inputDescripcionCargo_"+random_val);
            $("#actual_exp_0").attr("name","actual_exp["+random_val+"]");
            $("#actual_exp_0").attr("id","actual_exp_"+random_val);
        });
        $( "#clone_exp" ).clone().attr("id","clone_exp_"+random_val).removeClass("hide").prependTo("#space_clone_exp");
        datepicker.initDefault();
        $( "#clone_exp").html(template_clone);
        $("#sectionExperiencia").each(function(){limitchar.init("#inputDescripcionCargo_"+random_val ,2000)});

    });

    $("#plus_est").on("click",function(){
        datepicker.destroyDatepicker();
        var random_val = common.random(0,9999);
       var template_clone = $( "#clone_est" ).html();
        $("#clone_est").each(function(){
            $("#remove_est_0").attr("data-container-id","#clone_est_"+random_val);
            $("#remove_est_0").attr("id","remove_"+random_val);
            $("#inputCarrera_0").parent().siblings("label").attr("for","inputCarrera_"+random_val);
            $("#inputCarrera_0").attr("name","carrera["+random_val+"]");
            $("#inputCarrera_0").attr("id","inputCarrera_"+random_val);
            $("#inputUniversidad_0").parent().siblings("label").attr("for","inputUniversidad_"+random_val);
            $("#inputUniversidad_0").attr("name","universidad["+random_val+"]");
            $("#inputUniversidad_0").attr("id","inputUniversidad_"+random_val);
            $("#inputFechaIngresoUniv_0").parent().siblings("label").attr("for","inputFechaIngresoUniv_"+random_val);
            $("#inputFechaIngresoUniv_0").attr("name","inputFechaIngresoUniv["+random_val+"]");
            $("#inputFechaIngresoUniv_0").attr("id","inputFechaIngresoUniv_"+random_val);
            $("#inputFechaFinUniv_0").parent().siblings("label").attr("for","inputFechaFinUniv_"+random_val);
            $("#inputFechaFinUniv_0").attr("name","inputFechaFinUniv["+random_val+"]");
            $("#inputFechaFinUniv_0").attr("id","inputFechaFinUniv_"+random_val);
            $("#inputDescripcionCarrera_0").parent().siblings("label").attr("for","inputDescripcionCarrrera_"+random_val);
            $("#inputDescripcionCarrera_0").attr("name","inputDescripcionCarrera["+random_val+"]");
            $("#inputDescripcionCarrera_0").attr("id","inputDescripcionCarrera_"+random_val);
            $("#actual_est_0").attr("name","actual_est["+random_val+"]");
            $("#actual_est_0").attr("id","actual_est_"+random_val);
        });
        $( "#clone_est" ).clone().attr("id","clone_est_"+random_val).removeClass("hide").prependTo("#space_clone_est");
        datepicker.initDefault();
        $( "#clone_est").html(template_clone);
        $("#sectionEstudios").each(function(){limitchar.init("#inputDescripcionCarrera_"+random_val ,2000)});
    });

    $("#plus_curso").on("click",function(){
        datepicker.destroyDatepicker();
        var random_val = common.random(0,9999);
       var template_clone = $( "#clone_curso" ).html();
        $("#clone_curso").each(function(){
            $("#remove_curso_0").attr("data-container-id","#clone_curso_"+random_val);
            $("#remove_curso_0").attr("id","remove_"+random_val);
            $("#nombreCurso_0").parent().siblings("label").attr("for","nombreCurso_"+random_val);
            $("#nombreCurso_0").attr("name","nombreCurso["+random_val+"]");
            $("#nombreCurso_0").attr("id","nombreCurso_"+random_val);
            $("#inputInstitucion_0").parent().siblings("label").attr("for","inputInstitucion_"+random_val);
            $("#inputInstitucion_0").attr("name","institucion["+random_val+"]");
            $("#inputInstitucion_0").attr("id","inputInstitucion_"+random_val);
            $("#asociadoCon_0").parent().siblings("label").attr("for","asociadoCon_"+random_val);
            $("#asociadoCon_0").attr("name","asociadoCon["+random_val+"]");
            $("#asociadoCon_0").attr("id","asociadoCon_"+random_val);
            $("#inputFechaIngresoCurso_0").parent().siblings("label").attr("for","inputFechaIngresoCurso_"+random_val);
            $("#inputFechaIngresoCurso_0").attr("name","inputFechaIngresoCurso["+random_val+"]");
            $("#inputFechaIngresoCurso_0").attr("id","inputFechaIngresoCurso_"+random_val);
            $("#inputFechaFinCurso_0").parent().siblings("label").attr("for","inputFechaFinCurso_"+random_val);
            $("#inputFechaFinCurso_0").attr("name","inputFechaFinCurso["+random_val+"]");
            $("#inputFechaFinCurso_0").attr("id","inputFechaFinCurso_"+random_val);
            $("#inputDescripcionCurso_0").parent().siblings("label").attr("for","inputDescripcionCurso_"+random_val);
            $("#inputDescripcionCurso_0").attr("name","inputDescripcionCurso["+random_val+"]");
            $("#inputDescripcionCurso_0").attr("id","inputDescripcionCurso_"+random_val);
            $("#actual_curso_0").attr("name","actual_curso["+random_val+"]");
            $("#actual_curso_0").attr("id","actual_curso_"+random_val);
        });
        $( "#clone_curso" ).clone().attr("id","clone_est_"+random_val).removeClass("hide").prependTo("#space_clone_course");
        datepicker.initDefault();
        $( "#clone_curso").html(template_clone);
        $("#sectionCourse").each(function(){limitchar.init("#inputDescripcionCurso_"+random_val ,2000)});
    });

    $(document).on("click",".remove_element",function(){
        $($(this).data("container-id")).remove();
    });

    $(document).on("change","#profile_image_doctor",function(){
        readURL(this);
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
});//end document ready