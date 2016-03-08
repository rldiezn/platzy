/**
 * Created by Ricardo Diez on 18/02/2016.
 */
//original plugin here: http://www.masquewordpress.com/plugin-jquery-para-limitar-caracteres-en-un-campo-de-texto/
(function($){
    $.fn.limitChar = function(options) {
        defaults = {
            limite: 200,
            clase_alert: "has-error"
        }
        var options = $.extend(defaults,  options);
        return this.each(function() {
            var caracteres = options.limite;
            /*Debe existir un span con la clase help-block para que esto funcione*/
            $(this).siblings(".help-block").html("Disponible <strong>"+ caracteres +"</strong> caracteres");
            $(this).on("keyup",$(this),function(){
                if($(this).val().length > caracteres){
                    $(this).val($(this).val().substr(0, caracteres));
                }

                var quedan =  caracteres - $(this).val().length;
                /*Debe existir un span con la clase help-block para que esto funcione*/
                $(this).siblings(".help-block").html("Disponible <strong>"+ quedan +"</strong> caracteres");
                if(quedan <= 10)
                {
                    $(this).closest(".form-group").addClass(options.clase_alert);
                }
                else
                {
                    $(this).closest(".form-group").removeClass(options.clase_alert);
                }

            });
        });
    };
})(jQuery);