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
        this.canvasArea.arc(parametros.ejeX,parametros.ejeY,parametros.radio,parametros.radian_inicio,parametros.radian_fin,parametros.direccionContraReloj);
        if(parametros.backgroundColor != false){
            this.canvasArea.fillStyle=parametros.backgroundColor;
            this.canvasArea.fill();
        }

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
    this.limpiarCanvas=function(){
        this.canvasArea.clearRect(0, 0, this.canvasWidth, this.canvasHeight);
    }

}