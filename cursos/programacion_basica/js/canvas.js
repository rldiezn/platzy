var Canvas = function (id_canvas) {
    this.canvas= document.getElementById(id_canvas);
    this.canvasWidth= document.getElementById(id_canvas).clientWidth;//obtengo altura del canvas
    this.canvasHeight= document.getElementById(id_canvas).clientHeight;//obtengo altura del canvas
    this.canvasArea= document.getElementById(id_canvas).getContext("2d");//obtengo el contexto del canvas que es donde se puede pintar
    this.canvasLineasGrilla= document.getElementById(id_canvas).getAttribute("data-lineas-grilla");//defino el ancho ente lineas que tendra la grilla
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
    },
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
    },
    this.pintarCirculo=function(parametros){
        this.canvasArea.strokeStyle = parametros.borderColor;
        this.canvasArea.arc(parametros.ejeX,parametros.ejeY,parametros.radio,parametros.radian,parametros.direccionContraReloj);
        this.canvasArea.fillStyle=parametros.backgroundColor;
        this.canvasArea.fill();
    },
    this.pintarImg=function(parametros){
        var img = new Image();
        img.src = parametros.src;
        var canvasArea = this.canvasArea;
        img.onload = function () {
            canvasArea.drawImage(img,parametros.ejeX,parametros.ejeY);
        }
    }
}

var canvas= new Canvas('canvas_area');
var canvas_diagonal=new Canvas('canvas_area_diagonal');
var canvas_diagonal_fusion=new Canvas('canvas_area_diagonal_fusion');
var canvas_img=new Canvas('canvas_area_img');
//extructura de parametros para circulos
var circulos = {
    parametros_circulo_a:{
        borderColor:"#00F",
        ejeX:130,
        ejeY:220,
        radio:55,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"yellow"
    },
    parametros_circulo_b:{
        borderColor:"#00F",
        ejeX:220,
        ejeY:220,
        radio:55,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"red"
    },
    parametros_circulo_c:{
        borderColor:"red",
        ejeX:150,
        ejeY:150,
        radio:100,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_d:{
        borderColor:"red",
        ejeX:100,
        ejeY:100,
        radio:100,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_e:{
        borderColor:"red",
        ejeX:207,
        ejeY:207,
        radio:50,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_h:{
        borderColor:"red",
        ejeX:260,
        ejeY:260,
        radio:25,
        radian:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"red"
    }
};
//extructura de parametros para imagenes
var imagenes = {
    parametros_img_a:{
        src:"img/kratos-300x300.jpg",
        ejeX:0,
        ejeY:0
    },
    parametros_img_b:{
        src:"img/kratos-300x300.jpg",
        ejeX:0,
        ejeY:0
    },
};
//inicio el path para dibujar
canvas.canvasArea.beginPath();
canvas.canvasArea.strokeStyle = "red";
canvas.pintarLineasEjercicio();
canvas.canvasArea.closePath();
canvas.canvasArea.stroke();
//finalizo el path

canvas.pintarGrilla();
canvas_diagonal.pintarGrillaDiagonal();
canvas_diagonal_fusion.pintarGrillaDiagonal();
canvas_diagonal_fusion.pintarGrilla();

canvas.canvasArea.beginPath();
canvas.pintarCirculo(circulos.parametros_circulo_a);
canvas.canvasArea.closePath();
canvas.canvasArea.stroke();

canvas.canvasArea.beginPath();
canvas.pintarCirculo(circulos.parametros_circulo_b);
canvas.canvasArea.closePath();
canvas.canvasArea.stroke();


canvas_diagonal.canvasArea.beginPath();
canvas_diagonal.pintarCirculo(circulos.parametros_circulo_c);
canvas_diagonal.canvasArea.closePath();
canvas_diagonal.canvasArea.stroke();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_d);
canvas_diagonal_fusion.canvasArea.closePath();
canvas_diagonal_fusion.canvasArea.stroke();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_e);
canvas_diagonal_fusion.canvasArea.closePath();
canvas_diagonal_fusion.canvasArea.stroke();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_h);
canvas_diagonal_fusion.canvasArea.closePath();
canvas_diagonal_fusion.canvasArea.stroke();

canvas_img.canvasArea.beginPath();
canvas_img.pintarImg(imagenes.parametros_img_a)
canvas_img.canvasArea.closePath();
canvas_img.canvasArea.stroke();