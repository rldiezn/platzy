var common={
	msg:"",
	valorRandom:function (minimo,maximo) {
		return Math.floor( Math.random() * (maximo - minimo + 1) + minimo );
	},
	valorDefinido:function(opcion){
		if(typeof opcion != 'undefined'){
			return true;
		}else{
			return false;
		}
	},
	volverAJugar:function(obj,message){
		var valor = prompt("Deseas volver a intentarlo?\n Si = 1,\n  No= 0","1");

		if(valor >= 0 && valor <=1){
			if(valor == 1){
				obj.jugar();
			}else{
				this.mensajeJuego(message);
			}

		}else{
			this.mensajeJuego("Seleccione una opcion Correcta!");
			this.volverAJugar();
		}
	},
	mensajeJuego:function (messsage){
		alert(messsage);
	}
};

var janKenPon = {
	piedra:0,
	papel:1,
	tijera:2,
	msg:"",
	opcionUsuario:"",
	opcionMaquina:"",
	opciones: ["Piedra","Papel","Tijera"],
	jugar:function(){
		var opcionElegida=prompt("Que opcion elijes?\n Piedra = 0,\n  Papel= 1,\n  Tijera=2","0");		
		if( common.valorDefinido(this.opciones[opcionElegida])){//si es una opcion valida
			this.opcionUsuario=opcionElegida;
			this.opcionMaquina=this.eligeMaquina(0,2);				
			common.msg=this.quienGana(this.opcionUsuario,this.opcionMaquina);
			common.mensajeJuego("Elegiste: "+ this.opciones[opcionElegida]+ "\n"+"Javascript Eligio: "+ this.opciones[this.opcionMaquina]+ "\n"+common.msg);
			common.volverAJugar(janKenPon,"Gracias por Jugar Conmigo, espero verte pronto ;)");
		}else{//si no le vuelvo a disparar el prompt
			common.mensajeJuego("elige una opcion Valida");
			this.queEliges();//Vuelvo a llamar a la funcion para que pueda insertar un valor valido
		}
				
	},
	quienGana: function(optionPlayer,optionMachine){
		var msg = "";
		if(optionPlayer == this.piedra ){

			if(optionMachine==this.piedra){
				msg="Empate";
			}else if(optionMachine==this.papel){
				msg="Perdiste";
			}else{
				msg="Ganaste";	
			}

		}else if(optionPlayer == this.papel ){


			if(optionMachine==this.piedra){
				msg="Ganaste";
			}else if(optionMachine==this.papel){
				this.msg="Empate";
			}else{
				msg="Perdiste";	
			}

		}else if (optionPlayer == this.tijera ){

			if(optionMachine==this.piedra){
				msg="Perdiste";
			}else if(optionMachine==this.papel){
				msg="Ganaste";
			}else{
				msg="Empate";	
			}
		}

		return msg;
	},
	eligeMaquina:function (minimo,maximo) {
		return common.valorRandom(minimo,maximo);
	}
};

var buscaMinas= {
	ejeX:"0",
	ejeY:"0",
	campoMinado:[],
	tamanioCampoValor:"0",
	msg:"",
	tamanioCampo:function (){
		var tamanio;
		tamanio = prompt("De que tamanio deseas tu matriz\n Debe ser un numero mayor que 0","3");
		if(tamanio != 0){
			return tamanio;
		}else{
			common.mensajeJuego("elige un numero mayor a 0");
			this.tamanioCampo();
		}
	},
	jugar:function (){
		this.tamanioCampoValor=parseInt(this.tamanioCampo());
		this.generarCampo(this.tamanioCampoValor);
		console.log(this.campoMinado);
		alert("Usted esta acaba de meterse en un campo minado seleccione valores entre 0 y "+(this.tamanioCampoValor-1)+" para el eje X y el eje Y");
		this.ejeX = prompt("Cual es el valor de X","0");
		this.ejeY = prompt("Cual es el valor de Y","0");
		if(common.valorDefinido(this.campoMinado[this.ejeX])){//veo si existe la primera posicion
			if(common.valorDefinido(this.campoMinado[this.ejeX][this.ejeY])){//veo si existe la segunda posicion
				if(this.campoMinado[this.ejeX][this.ejeY]==0){
					common.msg=this.mensajeGanadorMina();
				}else{
					common.msg=this.mensajePerdedorMina();
				}
			}else{
				common.msg=this.mensajePerdedorFuera();
			}
		}else{
			common.msg=this.mensajePerdedorFuera();
		}
		common.mensajeJuego(common.msg);
		common.volverAJugar(buscaMinas,"Sabia que te rendirias, si eres capaz espero verte pronto");
	},
	generarCampo: function (limite) {
		for(var i=0;i<limite;i++){
			this.campoMinado[i]=[];
			for(var g=0;g<limite;g++){
				this.campoMinado[i][g]=common.valorRandom(0,1);
			}
		}
	},
	mensajeGanadorMina:function (){
		return "Haz ganado la partida";
	},
	mensajePerdedorMina:function (){
		return "Moriste por pisar una mina";
	},
	mensajePerdedorFuera:function (){
		return "Moriste por pisar fuera del campo minado";
	}
};

