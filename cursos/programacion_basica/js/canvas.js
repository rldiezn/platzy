var datos_canvas={
    canvas: document.getElementById("canvas_area"),
    canvasWidth: document.getElementById("canvas_area").clientWidth,//obtengo altura del canvas
    canvasHeight: document.getElementById("canvas_area").clientHeight,//obtengo altura del canvas
    canvasArea: document.getElementById("canvas_area").getContext("2d"),//obtengo el contexto del canvas que es donde se puede pintar
    canvasLineasGrilla: document.getElementById("canvas_area").getAttribute("data-lineas-grilla"),//defino el ancho ente lineas que tendra la grilla
    canvasCantidadLinea: function(){//defino el ancho de cada linea
        return this.canvasWidth / this.canvasLineasGrilla ;
    },
    canvasLimiteX: function () {//limite de lineas de la grilla por el eje X
        return this.canvasWidth / this.canvasCantidadLinea();
    },
    canvasLimiteY: function () {//limete de lineas de la grilla  por el eje Y
        return this.canvasHeight / this.canvasCantidadLinea();
    },
    pintarGrilla:function(){//funcion para pintar la grilla
        var linea, punto

        for(linea = 0; linea <= this.canvasCantidadLinea(); linea++)
        {
            punto = (linea * this.canvasLineasGrilla) ;
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo(punto, 0);
            this.canvasArea.lineTo(punto, datos_canvas.canvasHeight);
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }

        for(linea = 0; linea <= this.canvasCantidadLinea(); linea++)
        {
            punto = (linea * this.canvasLineasGrilla);
            this.canvasArea.beginPath();
            this.canvasArea.strokeStyle = "#AAA";
            this.canvasArea.moveTo(0, punto);
            this.canvasArea.lineTo(datos_canvas.canvasWidth , punto);
            this.canvasArea.stroke();
            this.canvasArea.closePath();
        }
    }
}
//inicio el path para dibujar
datos_canvas.canvasArea.beginPath();
datos_canvas.canvasArea.strokeStyle = "red";
datos_canvas.canvasArea.moveTo(50,150);//paso las coordenadas del punto de partida de la linea
datos_canvas.canvasArea.lineTo(200,50);//paso las coordenadas del punto de destino de la linea
datos_canvas.canvasArea.moveTo(200,150);
datos_canvas.canvasArea.lineTo(50,50);
datos_canvas.canvasArea.moveTo(50,50);
datos_canvas.canvasArea.lineTo(50,150);
datos_canvas.canvasArea.moveTo(200,50);
datos_canvas.canvasArea.lineTo(200,150)
datos_canvas.canvasArea.moveTo(50,50);
datos_canvas.canvasArea.lineTo(200,50);
datos_canvas.canvasArea.moveTo(50,150);
datos_canvas.canvasArea.lineTo(200,150);
datos_canvas.canvasArea.moveTo(125,50);
datos_canvas.canvasArea.lineTo(125,150);
datos_canvas.canvasArea.moveTo(50,100);
datos_canvas.canvasArea.lineTo(200,100);
datos_canvas.canvasArea.closePath();
datos_canvas.canvasArea.stroke();
//finalizo el path


datos_canvas.canvasArea.beginPath();
datos_canvas.canvasArea.strokeStyle = "#00F";
datos_canvas.canvasArea.arc(130,220,55,(Math.PI * 2),false);
datos_canvas.canvasArea.fillStyle="yellow";
datos_canvas.canvasArea.fill();
datos_canvas.canvasArea.closePath();
datos_canvas.canvasArea.stroke();

datos_canvas.canvasArea.beginPath();
datos_canvas.canvasArea.strokeStyle = "#00F";
datos_canvas.canvasArea.arc(220,220,55,(Math.PI * 2),false);
datos_canvas.canvasArea.fillStyle="red";
datos_canvas.canvasArea.fill();
datos_canvas.canvasArea.closePath();
datos_canvas.canvasArea.stroke();

datos_canvas.canvasArea.beginPath();
var img = new Image();
img.src = "img/kratos-300x300.jpg"
img.onload = function () {
    //datos_canvas.canvasArea.drawImage(img,0,0);
}
datos_canvas.canvasArea.closePath();
datos_canvas.canvasArea.stroke();

datos_canvas.pintarGrilla();