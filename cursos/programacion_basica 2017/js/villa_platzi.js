/**
 * Created by HOSTING on 06/01/2018.
 */
var teclas = {
    UP: 38,
    DOWN: 40,
    LEFT: 37,
    RIGHT: 39,
    movimiento: 10
};

var acciones = {
    aleatorio: function (min, maxi) {
        var resultado;
        resultado = Math.floor(Math.random() * (maxi - min + 1)) + min;
        return resultado;
    },
    dibujar: function(){

        if(imagenes.fondo.cargaOK)
        {
            lienzo.drawImage(imagenes.fondo.imagen, 0, 0);
        }

        if(imagenes.vaca.cargaOK)
        {
            console.log('Hay '+imagenes.vaca.cantidad+' vacas');
            for(var v=0; v < imagenes.vaca.cantidad; v++)
            {
                if(imagenes.vaca.random) {
                    imagenes.vaca.ejeX[v] = acciones.aleatorio(0, 420);
                    imagenes.vaca.ejeY[v] = acciones.aleatorio(0, 420);
                }
                lienzo.drawImage(imagenes.vaca.imagen, imagenes.vaca.ejeX[v], imagenes.vaca.ejeX[v]);
            }
        }

        if(imagenes.pollo.cargaOK)
        {
            console.log('Hay '+imagenes.pollo.cantidad+' pollos');
            for(var v=0; v < imagenes.pollo.cantidad; v++)
            {
                if(imagenes.pollo.random) {
                    imagenes.pollo.ejeX[v] = acciones.aleatorio(0, 420);
                    imagenes.pollo.ejeY[v] = acciones.aleatorio(0, 420);
                }
                lienzo.drawImage(imagenes.pollo.imagen, imagenes.pollo.ejeX[v], imagenes.pollo.ejeY[v]);
            }
        }

        if(imagenes.cerdo.cargaOK)
        {
            console.log('Hay '+imagenes.cerdo.cantidad+' cerdos');
            for(var v=0; v < imagenes.cerdo.cantidad; v++)
            {
                if(imagenes.cerdo.random){
                    imagenes.cerdo.ejeX[v] = acciones.aleatorio(0, 420);
                    imagenes.cerdo.ejeY[v] = acciones.aleatorio(0, 420);
                }
                    lienzo.drawImage(imagenes.cerdo.imagen, imagenes.cerdo.ejeX[v], imagenes.cerdo.ejeY[v]);


            }
        }

        if(imagenes.dragon.cargaOK)
        {
            console.log('Hay '+imagenes.dragon.cantidad+' dragones');
            for(var v=0; v < imagenes.dragon.cantidad; v++)
            {
                if(imagenes.dragon.random){
                    imagenes.dragon.ejeX = acciones.aleatorio(0, 420);
                    imagenes.dragon.ejeY = acciones.aleatorio(0, 420);
                }

                lienzo.drawImage(imagenes.dragon.imagen, imagenes.dragon.ejeX, imagenes.dragon.ejeY);
            }
        }
    },
    dibujarConTecla: function (evento){

        imagenes.vaca.random = false;
        imagenes.pollo.random = false;
        imagenes.cerdo.random = false;
        imagenes.dragon.random = false;
        switch (evento.keyCode){
            case teclas.UP://resto a y
                if(imagenes.dragon.ejeY > 0 ){
                    imagenes.dragon.ejeY = imagenes.dragon.ejeY - teclas.movimiento;
                    acciones.dibujar();
                }

                break;
            case teclas.DOWN://sumo a y
                if(imagenes.dragon.ejeY < 420 ) {
                    imagenes.dragon.ejeY = imagenes.dragon.ejeY + teclas.movimiento;
                    acciones.dibujar();
                }
                break;
            case teclas.LEFT://resto a x
                if(imagenes.dragon.ejeX > 0) {
                    imagenes.dragon.ejeX = imagenes.dragon.ejeX - teclas.movimiento;
                    acciones.dibujar();
                }
                break;
            case teclas.RIGHT://sumo a x
                if(imagenes.dragon.ejeX < 420) {
                    imagenes.dragon.ejeX = imagenes.dragon.ejeX + teclas.movimiento;
                    acciones.dibujar();
                }
                break;
            default:
                console.log('debe precionar las teclas de dirección');
                break;
    }


}
};

var imagenes = {
  fondo:{
      url: "img/tile.png",
      cargaOK: false,
      cargarImg: function(){
          imagenes.fondo.cargaOK = true;
          acciones.dibujar();
      }
  },
  vaca:{
      url: "img/vaca.png",
      cargaOK: false,
      cantidad: acciones.aleatorio(1, 5),
      cargarImg: function(){
          imagenes.vaca.cargaOK = true;
          acciones.dibujar();
      },
      random:true

  },
  pollo:{
      url: "img/pollo.png",
      cargaOK: false,
      cantidad: acciones.aleatorio(1, 20),
      cargarImg: function(){
          imagenes.pollo.cargaOK = true;
          acciones.dibujar();
      },
      random:true
  },
  cerdo:{
      url: "img/cerdo.png",
      cargaOK: false,
      cantidad: acciones.aleatorio(1, 10),
      cargarImg: function(){
          imagenes.cerdo.cargaOK = true;
          acciones.dibujar();
      },
      random:true
  },
  dragon:{
      url: "img/dragon.gif",
      cargaOK: false,
      cantidad: acciones.aleatorio(1, 1),
      cargarImg: function(){
          imagenes.dragon.cargaOK = true;
          acciones.dibujar();
      },
      ejeX: 0,
      ejeY: 0,
      random:true
  }
};

//identifico elemento canvas
var idCanvas = document.getElementById('villa_platzi');
var lienzo = idCanvas.getContext("2d");
//aplico los eventos de carga de imagen
imagenes.fondo.imagen = new Image();
imagenes.fondo.imagen.src = imagenes.fondo.url;
imagenes.fondo.imagen.addEventListener("load", imagenes.fondo.cargarImg);

imagenes.vaca.imagen = new Image();
imagenes.vaca.imagen.src = imagenes.vaca.url;
imagenes.vaca.imagen.addEventListener("load", imagenes.vaca.cargarImg);
imagenes.vaca.ejeX = new Array();
imagenes.vaca.ejeY = new Array();

imagenes.pollo.imagen = new Image();
imagenes.pollo.imagen.src = imagenes.pollo.url;
imagenes.pollo.imagen.addEventListener("load", imagenes.pollo.cargarImg);
imagenes.pollo.ejeX = new Array();
imagenes.pollo.ejeY = new Array();

imagenes.cerdo.imagen = new Image();
imagenes.cerdo.imagen.src = imagenes.cerdo.url;
imagenes.cerdo.imagen.addEventListener("load", imagenes.cerdo.cargarImg);
imagenes.cerdo.ejeX = new Array();
imagenes.cerdo.ejeY = new Array();

imagenes.dragon.imagen = new Image();
imagenes.dragon.imagen.src = imagenes.dragon.url;
imagenes.dragon.imagen.addEventListener("load", imagenes.dragon.cargarImg);

//aplico escuchadores sobre el document
document.addEventListener('keyup',acciones.dibujarConTecla);



