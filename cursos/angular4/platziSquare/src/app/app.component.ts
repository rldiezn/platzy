import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  title = 'Platzi square';
  lenguage = 'es';
  translate = {
    lenguage:'es',
    es:{
      welcomeMsg:'Bienvenido a '+ this.title,
      segestion:'Te listamos algunos enlaces que te ayudaran a empezar con Angular 4: ',
      tourOfHeroes : 'El viaje del Heroe',
      CLIDocumentation : 'Documentaciòn CLI',
      angularBlog : 'Blog de Angular 4'
    },
    en:{
      welcomeMsg:'Welcome to '+ this.title,
      segestion:'Here are some link to help you start:',
      tourOfHeroes : 'Tour of heroes',
      CLIDocumentation : 'CLI Documentation',
      angularBlog : 'Angular blogs'
    }
  };

  tourOfHeroes = 'El viaje del Heroe';
  CLIDocumentation = 'Documentaciòn CLI';
  angularBlog = 'Blog de Angular 4'
  //test Math
  a = 5;
  b = 6;
  c = this.a + this.b;
  stateButton = false;
  countClick = 0;
  nombre:string = "";
  apellido:string = "";

  lat=19.4153569;
  lng=-99.1360143;

  items =[
    {plan:'pagado',cercania:1,disrancia:1,age:30,status:true,name:'Miguel Mendoza'},
    {plan:'gratuito',cercania:1,disrancia:1.8,age:17,status:true,name:'Beatriz Hernandez'},
    {plan:'pagado',cercania:2,disrancia:4,age:33,status:true,name:'Leonard Cuenca'},
    {plan:'gratuito',cercania:3,disrancia:5,age:15,status:true,name:'Dailin Morillo'},
    {plan:'gratuito',cercania:3,disrancia:10,age:28,status:true,name:'Ricardo Diez'},
    {plan:'pagado',cercania:3,disrancia:15,age:22,status:true,name:'Xenia'},
    {plan:'gratuito',cercania:3,disrancia:20,age:39,status:false,name:'Gabriel Nicolas'},
  ]

  constructor (){
    setTimeout(()=>{
      this.stateButton = true
    },3000);
  }

   doSomething(){
      this.countClick++;
      alert("Este es mi click: "+this.countClick);
    }


  //arrayTest:['1':['Hola']]


}
