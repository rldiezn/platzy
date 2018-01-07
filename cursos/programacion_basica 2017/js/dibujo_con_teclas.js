/**
 * Created by HOSTING on 06/01/2018.
 */
function dibujarlinea (array){
    array['lienzo'].beginPath();
    array['lienzo'].strokeStyle = array['color'];
    array['lienzo'].moveTo(array['ejeXinit'],array['ejeYinit']);//primer parametro es x y segundo parametro es y
    array['lienzo'].lineTo(array['ejeXend'],array['ejeYend']);
    array['lienzo'].stroke();
    array['lienzo'].closePath();
}

var teclas = {
    UP: 38,
    DOWN: 40,
    LEFT: 37,
    RIGHT: 39
};

var operacion = {
    xIni:150,
    yIni:150,
    mouseXIni:0,
    mouseYIni:0,
    movimiento: 10,
    bandera: 0
};



function dibujarConTecla(evento){

    switch (evento.keyCode){
        case teclas.UP://resto a y
            if(operacion.yIni > 0 ){
                arrayDibujar['ejeXinit'] = operacion.xIni;
                arrayDibujar['ejeYinit'] = operacion.yIni;
                arrayDibujar['ejeXend'] = operacion.xIni;
                arrayDibujar['ejeYend'] = operacion.yIni - operacion.movimiento;
                dibujarlinea(arrayDibujar);
                operacion.yIni = operacion.yIni - operacion.movimiento;
            }

        break;
        case teclas.DOWN://sumo a y
            if(operacion.yIni < 300 ) {
                arrayDibujar['ejeXinit'] = operacion.xIni;
                arrayDibujar['ejeYinit'] = operacion.yIni;
                arrayDibujar['ejeXend'] = operacion.xIni;
                arrayDibujar['ejeYend'] = operacion.yIni + operacion.movimiento;
                dibujarlinea(arrayDibujar);
                operacion.yIni = operacion.yIni + operacion.movimiento;
            }
        break;
        case teclas.LEFT://resto a x
            if(operacion.xIni > 0) {
                arrayDibujar['ejeXinit'] = operacion.xIni;
                arrayDibujar['ejeYinit'] = operacion.yIni;
                arrayDibujar['ejeXend'] = operacion.xIni - operacion.movimiento;
                arrayDibujar['ejeYend'] = operacion.yIni;
                dibujarlinea(arrayDibujar);
                operacion.xIni = operacion.xIni - operacion.movimiento;
            }
        break;
        case teclas.RIGHT://sumo a x
            if(operacion.xIni < 300) {
                arrayDibujar['ejeXinit'] = operacion.xIni;
                arrayDibujar['ejeYinit'] = operacion.yIni;
                arrayDibujar['ejeXend'] = operacion.xIni + operacion.movimiento;
                arrayDibujar['ejeYend'] = operacion.yIni;
                dibujarlinea(arrayDibujar);
                operacion.xIni = operacion.xIni + operacion.movimiento;
            }
        break;
        default:
            console.log('debe precionar las teclas de dirección');
        break;
    }


}

function dibujarConMouse(evento){

    if(operacion.bandera == 1){
        arrayDibujar['ejeXinit'] = operacion.mouseXIni;
        arrayDibujar['ejeYinit'] = operacion.mouseYIni;
        arrayDibujar['ejeXend'] = evento.layerX;
        arrayDibujar['ejeYend'] = evento.layerY;
        dibujarlinea(arrayDibujar);
        operacion.mouseXIni = evento.layerX;
        operacion.mouseYIni = evento.layerY;
    }

}

function pressMouse(evento){
    operacion.bandera = 1;
    operacion.mouseXIni = evento.layerX;
    operacion.mouseYIni = evento.layerY;
}

function pressOutMouse(evento){
    operacion.bandera = 0;
}

//identifico elemento canvas
var idCanvas = document.getElementById('white_space_teclas');
var arrayDibujar = new Array();

//alimento array para la funcion dibujar
arrayDibujar['lienzo'] = idCanvas.getContext('2d');
arrayDibujar['color'] = 'red';

//aplico escuchadores sobre el document
document.addEventListener('keyup',dibujarConTecla);
//aplico escuchadores de eventos sobre el elemento canvas
idCanvas.addEventListener('mousedown',pressMouse);
idCanvas.addEventListener('mouseup',pressOutMouse);
idCanvas.addEventListener('mousemove',dibujarConMouse);

