console.log("Arrancando server de node");

var App = {
    express:'',
    parser:'',
    web: '',
    baseDeDatos:{
        user:"rldiezn",
        password:"123456"
    },
    require:function(){
      this.express=require("express");
      this.parser=require("body-parser");
      this.web=this.express();
      this.web.use(this.parser.urlencoded({extended:true}));
    },
    listen :function(port){
        this.require();
        this.web.listen(port,function(){
            console.log("Servidor arranc\u00F3 con exito :D");
        })
    },
    objectEmpty: function (obj) {
        var size = 0, key,flag=true;
        for (key in obj) {
            if (obj.hasOwnProperty(key)){
                size++;
                flag=false;
            }
        }

        return flag;

    },
    serverGet: function (url,msg,file) {
        this.web.get(url,function(request,response){
            //para leer las variables enviadas por el navegador es a través del obj query
            var empty = App.objectEmpty(request.query);//aqui no pude hacer referencia con this por que estoy dentro de la funcion get
            if(empty){
                if(file == false){
                    response.send(msg);
                }else{
                    response.sendfile(file);//alert('culo');
                }
            }else{
                var texto = "";
                for (var key in request.query) {//recorro query para pasarcelo al texto que voy a imprimir
                    /*texto +="Variable_"+key.valueOf()+": "+request.query.key;// de esta forma da error ya que se intenta leer dentro del
                    * objeto una posicion key que no existe, si queremos que lea el valor de key para acceder a esa posicion del objeto
                    * debemos hacerlo como aparece en la linea 30 Ejm: request.query[key]*/
                    texto +=" Variable_"+key+": "+request.query[key];
                }
                if(file == false){
                    response.send(msg + texto);
                }else{
                    response.sendfile(file);
                }

            }

        });
    },
    serverPost: function (url,msg,file) {
        this.web.post(url,function(request,response){
            //para leer las variables enviadas por el navegador es a través del obj query
            var empty = App.objectEmpty(request.body);//aqui no pude hacer referencia con this por que estoy dentro de la funcion get
            if(empty){
                if(file == false){
                    if(request.body.usuario == App.baseDeDatos.user && request.body.clave == App.baseDeDatos.password){
                        response.send("Login Correcto");
                    }else{
                        response.send("Login Incorrecto");
                    }

                }else{
                    response.sendfile(file);
                }
            }else{
                var texto = "";
                for (var key in request.body) {//recorro query para pasarcelo al texto que voy a imprimir
                    texto +=" Variable_"+key+": "+request.body[key];
                }
                if(file == false){
                    if(request.body.usuario == App.baseDeDatos.user && request.body.clave == App.baseDeDatos.password){
                        response.send("Login Correcto"+texto);
                    }else{
                        response.send("Login Incorrecto");
                    }
                }else{
                    response.sendfile(file);
                }
            }

        });
    }
};

App.listen(8080);
App.serverGet("/","","formulario.html");
App.serverPost("/entrar","",false);
App.serverGet("/test","Buen trabajo Ricardo, lograste un servidor Web desde M\u00E9xico",false);
App.serverGet("/hola/mama-es-linda","Hola <strong>mamá</strong>, estoy triunfando.",false);