console.log("Arrancando server de node");

var App = {
    express:'',
    parser:'',
    arDrone:'',//for drone
    drondinez:'',//for drone
    web: '',
    require:function(){
        this.express=require("express");
        this.parser=require("body-parser");
        this.arDrone=require("ar-drone");//for drone
        this.web=this.express();
        this.web.use(this.parser.urlencoded({extended:true}));
        this.drondinez=this.arDrone.createClient();//for drone
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
    obtenerVariablesRequest:function(obj){
        var texto = "";
        for (var key in obj) {//recorro query para pasarcelo al texto que voy a imprimir
            /*texto +="Variable_"+key.valueOf()+": "+request.query.key;// de esta forma da error ya que se intenta leer dentro del
             * objeto una posicion key que no existe, si queremos que lea el valor de key para acceder a esa posicion del objeto
             * debemos hacerlo como aparece en la linea 30 Ejm: request.query[key]*/
            texto +=" Variable_"+key+": "+obj[key];
        }
        return texto;
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
                var texto = App.obtenerVariablesRequest(request.query);
                if(file == false){
                    response.send(msg + texto);
                }else{
                    response.sendfile(file);
                }

            }

            App.optionManager(url);

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
                var texto = App.obtenerVariablesRequest(request.body);
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

            App.optionManager(url);

        });
    },
    //for drone
    droneBattery: function(){
      console.log("Batería: "+this.drondinez.battery());
    },
    droneDespegar:function(){
        this.drondinez.config('control:altitude_max',100000);
        this.drondinez.takeoff();
        this.droneBattery();
    },
    droneRotar: function () {
        this.drondinez.stop();
        this.drondinez.calibrate(0);
        this.droneBattery();
    },
    droneAterrizar: function () {
        this.drondinez.stop();
        this.drondinez.land();
        this.droneBattery();
    },
    optionManager:function(option){//las distintas opciones son URL's
        if(option=="/"){
            console.log("Home");
            this.droneBattery();
        }else if(option =="/despegar"){
            console.log("Despegando");
            this.droneBattery();
            this.droneDespegar();
        }else if(option == "/aterrizar"){
            console.log("Aterrizando");
            this.droneAterrizar();
        }else{
            console.log("Home");
        }
    },
    //end for drone
    init: function () {
        App.listen(8080);
        App.serverGet("/","","opciones_drone.html");
        App.serverGet("/despegar","","opciones_drone.html");
        App.serverGet("/aterrizar","","opciones_drone.html");
    }
};

App.init();
