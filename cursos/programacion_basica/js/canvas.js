var Canvas = function (id_canvas) {
    this.canvas= document.getElementById(id_canvas);
    this.canvasWidth= document.getElementById(id_canvas).clientWidth;//obtengo altura del canvas
    this.canvasHeight= document.getElementById(id_canvas).clientHeight;//obtengo altura del canvas
    this.canvasArea= document.getElementById(id_canvas).getContext("2d");//obtengo el contexto del canvas que es donde se puede pintar
    this.canvasLineasGrilla= document.getElementById(id_canvas).getAttribute("data-lineas-grilla");//defino el ancho ente lineas que tendra la grilla
    this.teclasMovimiento = {
        left:37,
        up:38,
        right:39,
        down:40
    };
    this.limiteMin=0;
    this.limiteMax=450;
    this.imagenes = {
        fondo:{
            src:"img/juego/fondo.png",
            ejeX:0,
            ejeY:0,
            imgOnload: false,
            velocidad:50
        },
        dianaFrente:{
            src:"img/juego/diana-frente.png",
            ejeX:0,
            ejeY:0,
            imgOnload: false,
            velocidad:50
        },
        dianaAtras:{
            src:"img/juego/diana-atras.png",
            ejeX:0,
            ejeY:0,
            imgOnload: false,
            velocidad:50
        },
        dianaDerecha:{
            src:"img/juego/diana-der.png",
            ejeX:0,
            ejeY:0,
            imgOnload: false,
            velocidad:50
        },
        dianaIzquierda:{
            src:"img/juego/diana-izq.png",
            ejeX:0,
            ejeY:0,
            imgOnload: false,
            velocidad:50
        },
        lizFrente:{
            src:"img/juego/liz.png",
            ejeX:450,
            ejeY:450,
            imgOnload: false,
            velocidad:20
        }
    };
    this.obstaculos = {
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
    this.canvasCantidadLinea= function(){//defino el ancho de cada linea
        return this.canvasWidth / this.canvasLineasGrilla ;
    };
    this.canvasLimiteX= function () {//limite de lineas de la grilla por el eje X
        return this.canvasWidth / this.canvasCantidadLinea();
    };
    this.canvasLimiteY= function () {//limete de lineas de la grilla  por el eje Y
        return this.canvasHeight / this.canvasCantidadLinea();
    };
    this.pintarGrilla=function(){//funcion para pintar la grilla
        var linea, punto

        for(linea = 0; linea <= this.canvasCantidadLinea(); linea++)
        {
            punto = (linea * this.canvasLineasGrilla) ;
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo(punto, 0);
            this.canvasArea.lineTo(punto, this.canvasHeight);
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }

        for(linea = 0; linea <= this.canvasCantidadLinea(); linea++)
        {
            punto = (linea * this.canvasLineasGrilla);
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo(0, punto);
            this.canvasArea.lineTo(this.canvasWidth , punto);
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }
    };
    this.pintarGrillaDiagonal=function(){//funcion para pintar la grilla
        var linea, punto

        for(linea = 0; linea <= (this.canvasCantidadLinea()*2); linea++)
        {
            punto = (linea * this.canvasLineasGrilla) ;
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo(punto, 0);
            this.canvasArea.lineTo(0, punto);
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }

        for(linea = 0; linea <= (this.canvasCantidadLinea()*2); linea++)
        {
            punto = (linea * this.canvasLineasGrilla);
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo((this.canvasWidth -punto) , 0);
            this.canvasArea.lineTo((this.canvasWidth ), (punto));
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }
    };
    this.pintarLineasEjercicio=function(){
        this.canvasArea.strokeStyle = "red";
        this.canvasArea.moveTo(50,150);//paso las coordenadas del punto de partida de la linea
        this.canvasArea.lineTo(200,50);//paso las coordenadas del punto de destino de la linea
        this.canvasArea.moveTo(200,150);
        this.canvasArea.lineTo(50,50);
        this.canvasArea.moveTo(50,50);
        this.canvasArea.lineTo(50,150);
        this.canvasArea.moveTo(200,50);
        this.canvasArea.lineTo(200,150)
        this.canvasArea.moveTo(50,50);
        this.canvasArea.lineTo(200,50);
        this.canvasArea.moveTo(50,150);
        this.canvasArea.lineTo(200,150);
        this.canvasArea.moveTo(125,50);
        this.canvasArea.lineTo(125,150);
        this.canvasArea.moveTo(50,100);
        this.canvasArea.lineTo(200,100);
    };
    this.pintarCirculo=function(parametros){
        this.canvasArea.strokeStyle = parametros.borderColor;
        this.canvasArea.arc(parametros.ejeX,parametros.ejeY,parametros.radio,parametros.radian,parametros.direccionContraReloj);
        this.canvasArea.fillStyle=parametros.backgroundColor;
        this.canvasArea.fill();
    };
    this.pintarImg=function(parametros){
        var img = new Image();
        img.src = parametros.src;
        var canvasArea = this.canvasArea;
        img.onload = function () {
            parametros.imgOnload=true;
            if(parametros.imgOnload){
                canvasArea.drawImage(img,parametros.ejeX,parametros.ejeY);
            }
        }
    };
    this.mover=function(datos,parametros){
        var img;
        if(datos.keyCode == this.teclasMovimiento.up ||
           datos.keyCode == this.teclasMovimiento.down ||
           datos.keyCode == this.teclasMovimiento.left ||
           datos.keyCode == this.teclasMovimiento.right
        ){//valido que solo funcione con las felchas del teclado
            if(datos.keyCode == this.teclasMovimiento.up){
                img=this.imagenes.dianaAtras;
                if(img.ejeY != this.limiteMin){
                    if(img.ejeX !=(this.obstaculos.obstaculo_a.ejeX + this.obstaculos.obstaculo_a.width) || img.ejeY != (this.obstaculos.obstaculo_a.height + this.obstaculos.obstaculo_a.width)) {
                        if(img.ejeY !=(this.obstaculos.obstaculo_b.ejeY+(this.obstaculos.obstaculo_b.height*2)) || img.ejeX > (this.obstaculos.obstaculo_b.width)){
                            if(img.ejeY !=(this.obstaculos.obstaculo_c.ejeY+(this.obstaculos.obstaculo_c.height*2)) || img.ejeX < (this.obstaculos.obstaculo_c.ejeX-this.obstaculos.obstaculo_c.width)){
                                this.restarDianaEjeY();
                            }
                        }
                    }
                }
            }
            if(datos.keyCode == this.teclasMovimiento.down){
                img=this.imagenes.dianaFrente;
                if(img.ejeY != this.limiteMax) {
                    if(img.ejeY!=this.obstaculos.obstaculo_b.ejeY || img.ejeX > this.obstaculos.obstaculo_b.width){
                        if(img.ejeY != this.obstaculos.obstaculo_c.ejeY || img.ejeX < (this.obstaculos.obstaculo_c.ejeX-this.obstaculos.obstaculo_c.width)){
                            this.sumarDianaEjeY();
                        }
                    }

                }
            }
            if(datos.keyCode == this.teclasMovimiento.left){
                img=this.imagenes.dianaIzquierda;
                if(img.ejeX != this.limiteMin) {
                    if(img.ejeX !=this.obstaculos.obstaculo_a.ejeXLeft() || img.ejeY > this.obstaculos.obstaculo_a.height){
                        if(img.ejeY != (this.obstaculos.obstaculo_b.ejeY+this.obstaculos.obstaculo_b.height) ||  img.ejeX != (this.obstaculos.obstaculo_b.width+this.obstaculos.obstaculo_b.height)) {
                            this.restarDianaEjeX();
                        }
                    }
                }
            }
            if(datos.keyCode == this.teclasMovimiento.right){
                img=this.imagenes.dianaDerecha;
                if(img.ejeX != this.limiteMax) {
                    if(img.ejeX !=this.obstaculos.obstaculo_a.ejeX || img.ejeY > this.obstaculos.obstaculo_a.height) {
                        if(img.ejeY != (this.obstaculos.obstaculo_c.ejeY+this.obstaculos.obstaculo_c.height) || img.ejeX < (this.obstaculos.obstaculo_c.ejeX-this.obstaculos.obstaculo_c.width-this.obstaculos.obstaculo_c.height)){
                            this.sumarDianaEjeX();
                        }
                    }
                }
            }

            this.pintarTodo(parametros,img);

        }

    };
    this.pintarTodo=function(imagenes,who){
        this.pintarImg(imagenes.fondo);
        this.pintarImg(who);
        this.pintarImg(imagenes.lizFrente);
    };
    this.restarDianaEjeY=function(){
        this.imagenes.dianaAtras.ejeY-=this.imagenes.dianaAtras.velocidad;
        this.imagenes.dianaFrente.ejeY-=this.imagenes.dianaFrente.velocidad;
        this.imagenes.dianaDerecha.ejeY-=this.imagenes.dianaDerecha.velocidad;
        this.imagenes.dianaIzquierda.ejeY-=this.imagenes.dianaIzquierda.velocidad;
    }
    this.sumarDianaEjeY=function(){
        this.imagenes.dianaAtras.ejeY+=this.imagenes.dianaAtras.velocidad;
        this.imagenes.dianaFrente.ejeY+=this.imagenes.dianaFrente.velocidad;
        this.imagenes.dianaDerecha.ejeY+=this.imagenes.dianaDerecha.velocidad;
        this.imagenes.dianaIzquierda.ejeY+=this.imagenes.dianaIzquierda.velocidad;
    }
    this.restarDianaEjeX=function(){
        this.imagenes.dianaAtras.ejeX-=this.imagenes.dianaAtras.velocidad;
        this.imagenes.dianaFrente.ejeX-=this.imagenes.dianaFrente.velocidad;
        this.imagenes.dianaDerecha.ejeX-=this.imagenes.dianaDerecha.velocidad;
        this.imagenes.dianaIzquierda.ejeX-=this.imagenes.dianaIzquierda.velocidad;
    }
    this.sumarDianaEjeX=function(){
        this.imagenes.dianaAtras.ejeX+=this.imagenes.dianaAtras.velocidad;
        this.imagenes.dianaFrente.ejeX+=this.imagenes.dianaFrente.velocidad;
        this.imagenes.dianaDerecha.ejeX+=this.imagenes.dianaDerecha.velocidad;
        this.imagenes.dianaIzquierda.ejeX+=this.imagenes.dianaIzquierda.velocidad;
    }

}