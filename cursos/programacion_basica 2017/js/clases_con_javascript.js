/**
 * Created by HOSTING on 06/01/2018.
 */
var imagenes = [];
imagenes['tocinauro'] = 'img/cerdo.png';
imagenes['pokacho'] = 'img/pollo.png';
imagenes['cauchin'] = 'img/vaca.png';

class Pakiman
{
    constructor(name,life,atack){
        this.image = new Image();
        this.name = name;
        this.life = life;
        this.atack = atack;
        this.image.src = imagenes[this.name];
    }

    hablar(){
        alert(this.name);
    }

    mostrar(){
        document.body.appendChild(this.image);
        document.write("<br /> <p>");
        document.write("<strong>"+this.name+"</strong><br />");
        document.write("Vida: "+this.life+"<br />");
        document.write("Ataque: "+this.atack);
        document.write("</p>");
        document.write("<hr>");
    }
}

var tocinauro = new Pakiman('tocinauro','120','40');
var pokacho = new Pakiman('pokacho','80','50');
var cauchin = new Pakiman('cauchin','100','30');

var coleccion = [];
coleccion.push(new Pakiman('tocinauro','120','40'));
coleccion.push(new Pakiman('pokacho','80','50'));
coleccion.push(new Pakiman('cauchin','100','30'));
//con in p es equivalente al indece
for(var p in coleccion){
    console.log(p);
}
//con of p es equivalente al objeto
for(var p of coleccion){
    p.mostrar();
}




