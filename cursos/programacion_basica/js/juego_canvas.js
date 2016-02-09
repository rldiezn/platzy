var canvas_juego = new Canvas('campo');//instancio mi objeto de la clase Canvas
//declaro las teclas de movimiento
Canvas.prototype.teclasMovimiento={
    left:37,
    up:38,
    right:39,
    down:40
};
//defino las imagenes que utlizare
Canvas.prototype.imagenes={
    fondo:{
        src:"img/juego/fondo.png",
        ejeX:0,
        ejeY:0,
        imgOnload: false,
        velocidad:50,
        width: 500,
        height: 500
    },
    dianaFrente:{
        src:"img/juego/diana-frente.png",
        ejeX:0,
        ejeY:0,
        imgOnload: false,
        velocidad:50,
        width: 50,
        height: 50
    },
    dianaAtras:{
        src:"img/juego/diana-atras.png",
        ejeX:0,
        ejeY:0,
        imgOnload: false,
        velocidad:50,
        width: 50,
        height: 50
    },
    dianaDerecha:{
        src:"img/juego/diana-der.png",
        ejeX:0,
        ejeY:0,
        imgOnload: false,
        velocidad:50,
        width: 50,
        height: 50
    },
    dianaIzquierda:{
        src:"img/juego/diana-izq.png",
        ejeX:0,
        ejeY:0,
        imgOnload: false,
        velocidad:50,
        width: 50,
        height: 50
    },
    lizFrente:{
        src:"img/juego/liz.png",
        ejeX:450,
        ejeY:450,
        imgOnload: false,
        velocidad:20,
        width: 50,
        height: 50
    }
};
//defino los obstaculos
Canvas.prototype.obstaculos={
    limiteMin:0,
    limiteMax:450,
    obstaculo_a: {
        ejeX: 150,
        ejeY: 0,
        width: 50,
        height: 200,
        ejeXLeft: function () {
            return this.ejeX + (this.width * 2);
        }
    },
    obstaculo_b: {
        ejeX: 0,
        ejeY: 150,
        width: 100,
        height: 50,
        ejeXLeft: function () {
            return this.ejeX + (this.width * 2);
        }
    },
    obstaculo_c: {
        ejeX: 500,
        ejeY: 300,
        width: 350,
        height: 50,
        ejeXLeft: function () {
            return this.ejeX + (this.width * 2);
        }
    }
};
//funcion para validar que solo precionen las teclas de las flechas
Canvas.prototype.keyValid=function(datos){
    if(datos.keyCode == this.teclasMovimiento.up ||
       datos.keyCode == this.teclasMovimiento.down ||
       datos.keyCode == this.teclasMovimiento.left ||
       datos.keyCode == this.teclasMovimiento.right
    ){
        return true;
    }else{
        return false;
    }
}
//objeto que almacena las funciones que contralan las colisiones
Canvas.prototype.colisiones={
    colisiones_up:{
        colision_obstaculo_a: function (img,obj) {
            /*aca no puedo hacer referencia a obstaculos con el this debido a que  colisiones es un objeto entonces si aplico this dentro de el solo llamara a los elementos del objeto
             * colisiones y no del objeto canvas por eso mi solucion fue pasarle el objeto Canvas como parametro a la funcion*/
            if(img.ejeX !=(obj.obstaculos.obstaculo_a.ejeX + obj.obstaculos.obstaculo_a.width) || img.ejeY != (obj.obstaculos.obstaculo_a.height + obj.obstaculos.obstaculo_a.width)){
                return false;
            }else{
                return true;
            }
        },
        colision_obstaculo_b: function (img,obj) {
            if(img.ejeY !=(obj.obstaculos.obstaculo_b.ejeY+(obj.obstaculos.obstaculo_b.height*2)) || img.ejeX > (obj.obstaculos.obstaculo_b.width)){
                return false;
            }else{
                return true;
            }
        },
        colision_obstaculo_c: function (img,obj) {
            if(img.ejeY !=(obj.obstaculos.obstaculo_c.ejeY+(obj.obstaculos.obstaculo_c.height*2)) || img.ejeX < (obj.obstaculos.obstaculo_c.ejeX-obj.obstaculos.obstaculo_c.width)){
                return false;
            }else{
                return true;
            }
        }

    },
    colisiones_down:{//cuando diana va hacia abajo solo tiene posibilidad de colision con el obstaculo b y c
        colision_obstaculo_b: function (img,obj) {
            /*aca no puedo hacer referencia a obstaculos con el this debido a que  colisiones es un objeto entonces si aplico this dentro de el solo llamara a los elementos del objeto
             * colisiones y no del objeto canvas por eso mi solucion fue pasarle el objeto Canvas como parametro a la funcion*/
            if(img.ejeY!=obj.obstaculos.obstaculo_b.ejeY || img.ejeX > obj.obstaculos.obstaculo_b.width){
                return false;
            }else{
                return true;
            }
        },
        colision_obstaculo_c: function (img,obj) {
            if(img.ejeY != obj.obstaculos.obstaculo_c.ejeY || img.ejeX < (obj.obstaculos.obstaculo_c.ejeX-obj.obstaculos.obstaculo_c.width)){
                return false;
            }else{
                return true;
            }
        }

    },
    colisiones_left:{//cuando diana va hacia la izquierda solo tiene posibilidad de colision con el obstaculo a y b
        colision_obstaculo_a: function (img,obj) {
            /*aca no puedo hacer referencia a obstaculos con el this debido a que  colisiones es un objeto entonces si aplico this dentro de el solo llamara a los elementos del objeto
             * colisiones y no del objeto canvas por eso mi solucion fue pasarle el objeto Canvas como parametro a la funcion*/
            if(img.ejeX !=obj.obstaculos.obstaculo_a.ejeXLeft() || img.ejeY > obj.obstaculos.obstaculo_a.height){
                return false;
            }else{
                return true;
            }
        },
        colision_obstaculo_b: function (img,obj) {
            if(img.ejeY != (obj.obstaculos.obstaculo_b.ejeY+obj.imagenes.dianaIzquierda.width) ||  img.ejeX != (obj.obstaculos.obstaculo_b.width+obj.imagenes.dianaIzquierda.width)){
                return false;
            }else{
                return true;
            }
        }

    },
    colisiones_right:{//cuando diana va hacia la derecha solo tiene posibilidad de colision con el obstaculo a y c
        colision_obstaculo_a: function (img,obj) {
            /*aca no puedo hacer referencia a obstaculos con el this debido a que  colisiones es un objeto entonces si aplico this dentro de el solo llamara a los elementos del objeto
             * colisiones y no del objeto canvas por eso mi solucion fue pasarle el objeto Canvas como parametro a la funcion*/
            if(img.ejeX !=obj.obstaculos.obstaculo_a.ejeX || img.ejeY > obj.obstaculos.obstaculo_a.height){
                return false;
            }else{
                return true;
            }
        },
        colision_obstaculo_c: function (img,obj) {
            if(img.ejeY != (obj.obstaculos.obstaculo_c.ejeY+obj.obstaculos.obstaculo_c.height) || img.ejeX < (obj.obstaculos.obstaculo_c.ejeX-obj.obstaculos.obstaculo_c.width-obj.imagenes.dianaDerecha.width)){
                return false;
            }else{
                return true;
            }
        }

    }
};
//funcion para mover a diana por el canvas
Canvas.prototype.mover=function(datos,parametros){
    var img;
    if(this.keyValid(datos)){//valido que solo funcione con las felchas del teclado
        //si va hacia arriba
        if(datos.keyCode == this.teclasMovimiento.up){
            img=this.imagenes.dianaAtras;
            if(img.ejeY != this.obstaculos.limiteMin){
                if(!this.colisiones.colisiones_up.colision_obstaculo_a(img,this)) {
                    if(!this.colisiones.colisiones_up.colision_obstaculo_b(img,this)){
                        if(!this.colisiones.colisiones_up.colision_obstaculo_c(img,this)){
                            this.restarDianaEjeY();
                        }
                    }
                }
            }
        }
        //si va hacia abajo
        if(datos.keyCode == this.teclasMovimiento.down){
            img=this.imagenes.dianaFrente;
            if(img.ejeY != this.obstaculos.limiteMax) {
                if(!this.colisiones.colisiones_down.colision_obstaculo_b(img,this)){
                    if(!this.colisiones.colisiones_down.colision_obstaculo_c(img,this)){
                        this.sumarDianaEjeY();
                    }
                }

            }
        }
        //si va hacia la izquierda
        if(datos.keyCode == this.teclasMovimiento.left){
            img=this.imagenes.dianaIzquierda;
            if(img.ejeX != this.obstaculos.limiteMin) {
                if(!this.colisiones.colisiones_left.colision_obstaculo_a(img,this)){
                    if(!this.colisiones.colisiones_left.colision_obstaculo_b(img,this)) {
                        this.restarDianaEjeX();
                    }
                }
            }
        }
        //si va hacia la derecha
        if(datos.keyCode == this.teclasMovimiento.right){
            img=this.imagenes.dianaDerecha;
            if(img.ejeX != this.obstaculos.limiteMax) {
                if(!this.colisiones.colisiones_right.colision_obstaculo_a(img,this)) {
                    if(!this.colisiones.colisiones_right.colision_obstaculo_c(img,this)){
                        this.sumarDianaEjeX();
                    }
                }
            }
        }

        this.pintarTodo(parametros,img);

    }

};
//funcion para pintar todos los elementos del canvas
Canvas.prototype.pintarTodo=function(imagenes,who){
    this.pintarImg(imagenes.fondo);
    this.pintarImg(who);
    this.pintarImg(imagenes.lizFrente);
};
//funciones para restarle o sumarle a los ejes X y Y de las imagenes que corresponden a Diana
Canvas.prototype.restarDianaEjeY=function(){
    this.imagenes.dianaAtras.ejeY-=this.imagenes.dianaAtras.velocidad;
    this.imagenes.dianaFrente.ejeY-=this.imagenes.dianaFrente.velocidad;
    this.imagenes.dianaDerecha.ejeY-=this.imagenes.dianaDerecha.velocidad;
    this.imagenes.dianaIzquierda.ejeY-=this.imagenes.dianaIzquierda.velocidad;
}
Canvas.prototype.sumarDianaEjeY=function(){
    this.imagenes.dianaAtras.ejeY+=this.imagenes.dianaAtras.velocidad;
    this.imagenes.dianaFrente.ejeY+=this.imagenes.dianaFrente.velocidad;
    this.imagenes.dianaDerecha.ejeY+=this.imagenes.dianaDerecha.velocidad;
    this.imagenes.dianaIzquierda.ejeY+=this.imagenes.dianaIzquierda.velocidad;
}
Canvas.prototype.restarDianaEjeX=function(){
    this.imagenes.dianaAtras.ejeX-=this.imagenes.dianaAtras.velocidad;
    this.imagenes.dianaFrente.ejeX-=this.imagenes.dianaFrente.velocidad;
    this.imagenes.dianaDerecha.ejeX-=this.imagenes.dianaDerecha.velocidad;
    this.imagenes.dianaIzquierda.ejeX-=this.imagenes.dianaIzquierda.velocidad;
}
Canvas.prototype.sumarDianaEjeX=function(){
    this.imagenes.dianaAtras.ejeX+=this.imagenes.dianaAtras.velocidad;
    this.imagenes.dianaFrente.ejeX+=this.imagenes.dianaFrente.velocidad;
    this.imagenes.dianaDerecha.ejeX+=this.imagenes.dianaDerecha.velocidad;
    this.imagenes.dianaIzquierda.ejeX+=this.imagenes.dianaIzquierda.velocidad;
}
//pintoTodo en el canvaas
canvas_juego.pintarTodo(canvas_juego.imagenes,canvas_juego.imagenes.dianaFrente);
//ejecuto la funcion mover cuando el evento keydown es disparado
document.addEventListener('keydown',function(datos){//datos en este caso devuelve la informacion relacionada con evento keyDown por Ejm: que tecla se marco
    canvas_juego.mover(datos,canvas_juego.imagenes);
});
