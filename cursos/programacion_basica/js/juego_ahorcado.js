var Ahorcado = function () {
    this.canvas_ahorcado = new Canvas('campo_ahorcado');
    this.intentos_maximos = 5;
    this.intento = 0;
    this.vivo = true;
    this.palabras = new Array();
    this.palabraSelect = new Array();
    this.underscoreOrLetter;
    this.palabraMostrar = "";
    this.abecedario = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','\u00F1','o','p','q','r','s','t','u','v','w','x','y','z'];
    this.palabrasMake= function () {

        this.palabras[0]=['kratos','Protagonista del juego de Sony God of War'];
        this.palabras[1]=['platzy','La mejor experiencia de educaci\u00F3n Online'];
        this.palabras[2]=['sol','La tierra gira alrededor de el ...'];
        this.palabras[3]=['musica','Es el lenguaje que unos pocos manejan pero que todos entienden'];
        this.palabras[4]=['madera','Necesito suerte deber\u00EDa tocar...'];

        return this.palabras;

    };
    this.palabrasRandom=function(){
      var ind = common.valorRandom(0,4);
      this.palabraSelect=this.palabras[ind];
    };
    this.head =  {
        parametros_circulo_a:{
            borderColor:"red",
            ejeX:150,
            ejeY:140,
            radio:40,
            radian_inicio:0,
            radian_fin:Math.PI * 2,
            direccionContraReloj:false,
            backgroundColor:false
        }
    };
}

Ahorcado.prototype.trazar=function(){
    this.intento++;
    if(this.intento >= this.intentos_maximos){
        this.vivo=false;
    }
    this.dibujarTodo();
}

Ahorcado.prototype.dibujarPoste=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    this.canvas_ahorcado.canvasArea.strokeStyle = "#000";
    this.canvas_ahorcado.canvasArea.moveTo(150,100);
    this.canvas_ahorcado.canvasArea.lineTo(150,50);
    this.canvas_ahorcado.canvasArea.lineTo(400,50);
    this.canvas_ahorcado.canvasArea.lineTo(400,350);
    this.canvas_ahorcado.canvasArea.lineWidth= 15;
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path

}

Ahorcado.prototype.dibujarCabeza=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    this.canvas_ahorcado.pintarCirculo(this.head.parametros_circulo_a);
    this.canvas_ahorcado.canvasArea.lineWidth= 5;
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path

}

Ahorcado.prototype.dibujarTorso=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    this.canvas_ahorcado.canvasArea.moveTo(150,180);
    this.canvas_ahorcado.canvasArea.lineTo(150,260);
    this.canvas_ahorcado.canvasArea.lineWidth= 5;
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path

}

Ahorcado.prototype.dibujarBrazos=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    this.canvas_ahorcado.canvasArea.moveTo(120,220);
    this.canvas_ahorcado.canvasArea.lineTo(150,180);
    this.canvas_ahorcado.canvasArea.lineTo(180,220);
    this.canvas_ahorcado.canvasArea.lineWidth= 5;
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path
}

Ahorcado.prototype.dibujarPiernas=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    this.canvas_ahorcado.canvasArea.moveTo(120,300);
    this.canvas_ahorcado.canvasArea.lineTo(150,260);
    this.canvas_ahorcado.canvasArea.lineTo(180,300);
    this.canvas_ahorcado.canvasArea.lineWidth= 5;
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path
}

Ahorcado.prototype.dibujarOjos=function(){
    //inicio el path para dibujar
    this.canvas_ahorcado.canvasArea.beginPath();
    //ojo izquierdo
    this.canvas_ahorcado.canvasArea.moveTo(125,125);
    this.canvas_ahorcado.canvasArea.lineTo(145,145);
    this.canvas_ahorcado.canvasArea.moveTo(145,125);
    this.canvas_ahorcado.canvasArea.lineTo(125,145);
    //ojo derecho
    this.canvas_ahorcado.canvasArea.moveTo(155,125);
    this.canvas_ahorcado.canvasArea.lineTo(175,145);
    this.canvas_ahorcado.canvasArea.moveTo(175,125);
    this.canvas_ahorcado.canvasArea.lineTo(155,145);
    this.canvas_ahorcado.canvasArea.lineWidth= 5;
    this.canvas_ahorcado.canvasArea.strokeStyle = "blue";
    this.canvas_ahorcado.canvasArea.stroke();
    this.canvas_ahorcado.canvasArea.closePath();
    //finalizo el path
}

Ahorcado.prototype.escribirPista=function (){
    var pistaPalabra = document.getElementById('pista_palabra');
    pistaPalabra.innerHTML=this.palabraSelect[1];
};

Ahorcado.prototype.dibujarTodo=function(){
    this.dibujarPoste();
    this.escribirPista();
    this.pintarAreaSubrayada();
    if(this.intento > 0){
        this.dibujarCabeza();
    }
    if(this.intento > 1){
        this.dibujarTorso();
    }
    if(this.intento > 2){
        this.dibujarBrazos();
    }
    if(this.intento > 3){
        this.dibujarPiernas();
    }
    if(this.intento > 4){
        this.dibujarOjos();
    }

}

Ahorcado.prototype.pintarAreaSubrayada=function(){
    var container_palabra = document.getElementById("container_palabra");
    if(this.vivo){
        this.palabraMostrar = "";
        var length_container = this.palabraSelect[0].length;
        for(var i = 0;i<length_container;i++ ){

            if(typeof this.underscoreOrLetter[i] != 'undefined'){
                this.palabraMostrar += this.underscoreOrLetter[i]+ ' ';
            }else{
                this.palabraMostrar += "_ ";
            }
        }
    }else{
        this.palabraMostrar=this.palabraSelect[0];
    }
    container_palabra.innerHTML=ahorcado.palabraMostrar;

}

Ahorcado.prototype.pintarLetras = function(){

    var containerAbecedario= document.getElementById('container_abecedario');
    var letras="";
    for (var i=0;i<this.abecedario.length;i++){
        letras+='<input type="button" id="letra_'+this.abecedario[i]+'"  class="letra" value="'+this.abecedario[i]+'" > ';
    }
    containerAbecedario.innerHTML=letras;
    //agrego a cada letra la funcionalidad de jugar
    var btn = document.getElementsByClassName("letra");
    for (var i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', function(){
            ahorcado.jugar(this,btn);
        });
    }

}

Ahorcado.prototype.iniciar=function(){

    this.palabrasMake();
    this.palabrasRandom();
    this.pintarLetras();
    this.underscoreOrLetter = new Array(this.palabraSelect[0].length);//arreglo que controla cuanto lleva de la palabra a descubrir
    this.dibujarTodo();

};
Ahorcado.prototype.jugar=function(datos,btn){
    var opcion = datos.value;
    var flag = false;
    datos.setAttribute("disabled","disabled");
    for(var a = 0; a<ahorcado.palabraSelect[0].length; a++){
        if(ahorcado.palabraSelect[0][a]==opcion){
            ahorcado.underscoreOrLetter[a]=opcion;
            flag=true;
        }
    }

    if(!flag){
        ahorcado.trazar();
        if(!ahorcado.vivo){
            alert("haz muerto");
            for(var b = 0;b<btn.length;b++){
                btn[b].setAttribute("disabled","disabled");
            }
        }
    }else{
        ahorcado.dibujarTodo();
        if(this.gano()){
            alert("haz ganado");
            for(var b = 0;b<btn.length;b++){
                btn[b].setAttribute("disabled","disabled");
            }
        }
    }
};

Ahorcado.prototype.gano= function () {

    var flag =true;
    for(var i = 0;i<this.underscoreOrLetter.length;i++){
        if(typeof this.underscoreOrLetter[i] == 'undefined'){
            flag=false;
        }
    }

    return flag;
}


Ahorcado.prototype.reiniciar = function () {
    this.intento = 0;
    this.canvas_ahorcado.limpiarCanvas();
    this.iniciar();
    //console.clear();
}

var ahorcado = new Ahorcado();
ahorcado.iniciar();


document.getElementById('reset').addEventListener('click',function(){
    ahorcado.reiniciar();
});

