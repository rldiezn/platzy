function Pokemon(datos){
    this.name=datos.name;
    this.life=datos.life;
    this.atack=datos.atack;
    this.grito=datos.grito
    this.gritar= function (){
        alert(this.grito);
    }
}

var datosKratos={
    name:"Kratos",
    life:200,
    atack:1000,
    grito:"The true warrior is not hide Posseidon, leave the sea! and face me!",
}
var datosPickachu={
    name:"Pickachu",
    life:100,
    atack:55,
    grito:"Pikaaaachu!",
}

var kratos = new Pokemon(datosKratos);//instancio objeto pokemon kratos
var pickachu = new Pokemon(datosPickachu);//instancio objeto pokemon pikachu

function inicio(obj){
    nombrePokemon.innerHTML=obj.name;
    var datos_pokemon=obj.name+ " tiene una vida de: " + obj.life + ", un ataque de: " + obj.atack + " y grita de esta forma: <b>"+obj.grito+"</b>"
    datosPokemon.innerHTML=datos_pokemon;
    imgPokemon.setAttribute("src","img/"+obj.name+".jpg");
    obj.gritar();
}

inicio(kratos);