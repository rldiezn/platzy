/**
 * Created by HOSTING on 27/12/2017.
 */
function dibujarlinea (array){
    lienzo.beginPath();
    lienzo.strokeStyle = array['color'];
    lienzo.moveTo(array['ejeXinit'],array['ejeYinit']);//primer parametro es x y segundo parametro es y
    lienzo.lineTo(array['ejeXend'],array['ejeYend']);
    lienzo.stroke();
    lienzo.closePath();
}

var idCanvas = document.getElementById('white_space');
var lienzo = idCanvas.getContext('2d');
var arrayDibujar = new Array();
var limit = 30;
var ind = 0;
var yInti = 0;
var xEnd = 10;

arrayDibujar['lienzo'] = lienzo;
arrayDibujar['color'] = 'red';


// mi solucion
for(ind=0;ind<=limit;ind++){
    //dibuja de la esquina 1 ,2 y 3 |_
    arrayDibujar['ejeXinit'] = 0;
    arrayDibujar['ejeYinit'] = 10 * ind;
    arrayDibujar['ejeXend'] =  10 * (ind +1);
    arrayDibujar['ejeYend'] = 300;
    dibujarlinea(arrayDibujar);
    //dibuja de la esquina 1, 4 y 3 -|
    arrayDibujar['ejeXinit'] = 300;
    arrayDibujar['ejeYinit'] = 10 * (ind +1);
    arrayDibujar['ejeXend'] = 10 * ind ;
    arrayDibujar['ejeYend'] = 0;
    dibujarlinea(arrayDibujar);
    //dibuja de la esquina 2, 1 y 4 |-
    arrayDibujar['ejeXinit'] = 0;
    arrayDibujar['ejeYinit'] = 300 - (10 * ind);
    arrayDibujar['ejeXend'] = 10 * (ind +1) ;
    arrayDibujar['ejeYend'] = 0;
    dibujarlinea(arrayDibujar);
    //dibuja de la esquina 2, 3 y 4 _|
    arrayDibujar['ejeXinit'] = 10 * ind;
    arrayDibujar['ejeYinit'] = 300;
    arrayDibujar['ejeXend'] = 300 ;
    arrayDibujar['ejeYend'] = 300 - (10 * ind);
    dibujarlinea(arrayDibujar);
}

/*
while(ind <= limit){

    arrayDibujar['ejeXinit'] = '0';
    arrayDibujar['ejeYinit'] = yInti;
    arrayDibujar['ejeXend'] = xEnd;
    arrayDibujar['ejeYend'] = '300';
    dibujarlinea(arrayDibujar);
    ind = ind + 1;
    yInti = yInti + 10;
    xEnd = xEnd + 10;

}

 ind = 0
 yInti = 10;
 xEnd = 0;
while(ind <= limit){

    arrayDibujar['ejeXinit'] = '300';
    arrayDibujar['ejeYinit'] = yInti;
    arrayDibujar['ejeXend'] = xEnd;
    arrayDibujar['ejeYend'] = '0';
    dibujarlinea(arrayDibujar);
    ind = ind + 1;
    yInti = yInti + 10;
    xEnd = xEnd + 10;

}

ind = 0
yInti = 10;
xEnd = 300;
while(ind <= limit){

    arrayDibujar['ejeXinit'] = xEnd;
    arrayDibujar['ejeYinit'] = '0';
    arrayDibujar['ejeXend'] = '0';
    arrayDibujar['ejeYend'] = yInti;
    dibujarlinea(arrayDibujar);
    ind = ind + 1;
    yInti = yInti + 10;
    xEnd = xEnd - 10;

}

 ind = 0
 yInti = 10;
 xEnd = 300;
while(ind <= limit){

    arrayDibujar['ejeXinit'] = xEnd;
    arrayDibujar['ejeYinit'] = '300';
    arrayDibujar['ejeXend'] = '300';
    arrayDibujar['ejeYend'] = yInti;
    dibujarlinea(arrayDibujar);
    ind = ind + 1;
    yInti = yInti + 10;
    xEnd = xEnd - 10;

}
*/
/*
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'blue';
arrayDibujar['ejeXinit'] = '100';
arrayDibujar['ejeYinit'] = '250';
arrayDibujar['ejeXend'] = '200';
arrayDibujar['ejeYend'] = '250';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'red';
arrayDibujar['ejeXinit'] = '200';
arrayDibujar['ejeYinit'] = '250';
arrayDibujar['ejeXend'] = '200';
arrayDibujar['ejeYend'] = '100';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'blue';
arrayDibujar['ejeXinit'] = '200';
arrayDibujar['ejeYinit'] = '100';
arrayDibujar['ejeXend'] = '100';
arrayDibujar['ejeYend'] = '100';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'red';
arrayDibujar['ejeXinit'] = '100';
arrayDibujar['ejeYinit'] = '100';
arrayDibujar['ejeXend'] = '200';
arrayDibujar['ejeYend'] = '250';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'pink';
arrayDibujar['ejeXinit'] = '200';
arrayDibujar['ejeYinit'] = '100';
arrayDibujar['ejeXend'] = '100';
arrayDibujar['ejeYend'] = '250';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'grey';
arrayDibujar['ejeXinit'] = '150';
arrayDibujar['ejeYinit'] = '100';
arrayDibujar['ejeXend'] = '150';
arrayDibujar['ejeYend'] = '250';
dibujarlinea(arrayDibujar);
arrayDibujar['color'] = 'brown';
arrayDibujar['ejeXinit'] = '100';
arrayDibujar['ejeYinit'] = '175';
arrayDibujar['ejeXend'] = '200';
arrayDibujar['ejeYend'] = '175';
dibujarlinea(arrayDibujar);*/