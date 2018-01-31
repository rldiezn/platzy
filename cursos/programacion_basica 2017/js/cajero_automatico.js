/**
 * Created by HOSTING on 27/01/2018.
 */
 class BilletesC{

    constructor(valor,cantidad){
        this.valor = valor;
        this.cantidad = cantidad;
    }

 }

var acciones = {
  arrBilletes:[100,20,200,500,1000,50],//Tipos de billetes disponibles (Billetes mexicanos para este ejemplo)
  arrBilletesCajero:[],
  arrBilletesAEntregar:[],
  msjOut:{},
  comparar: function(a,b){
    return a - b;
  },
  ordenerArray:function(arr){//referencia: https://developer.mozilla.org/es/docs/Web/JavaScript/Referencia/Objetos_globales/Array/sort
    arr.sort( acciones.comparar );
  },
  aleatorio: function (min, maxi) {
      var resultado;
      resultado = Math.floor(Math.random() * (maxi - min + 1)) + min;
      return resultado;
  },
  llenarCajero: function(arr){
    //ordeno Array de tipos de billetes para no tener problemas de iteracion en el ciclo
    acciones.ordenerArray(arr);
    var countArray= arr.length -1;
    for(var i = countArray; i >= 0;i--){
      acciones.arrBilletesCajero.push(new BilletesC(arr[i],acciones.aleatorio(0,10)))
    }
  },
  calTotalCajero: function(arr){
    var totalCajero = 0;
    for(bc of arr){
      totalCajero = totalCajero + (bc.valor*bc.cantidad);
      console.log(bc);
    }
    console.log(totalCajero);
    return totalCajero;
  },
  retiro: function(){ 
    //reinicio las variables que muestran el resiltado
    resultado.innerHTML = "";
    acciones.arrBilletesAEntregar = [];
    var cuantoSolicita = parseInt(document.getElementById('dinero').value);
    var totaCajero = acciones.calTotalCajero(acciones.arrBilletesCajero);
    if(cuantoSolicita > 0){
      if(totaCajero >= cuantoSolicita){
            for(bc of acciones.arrBilletesCajero){

              if(bc.valor <= cuantoSolicita && bc.cantidad > 0 && cuantoSolicita > 0){          
                  var cuantosBilletes = Math.floor(cuantoSolicita / bc.valor);
                  var totalBilletes;
                  if(cuantosBilletes > bc.cantidad){
                    totalBilletes = bc.cantidad;
                  }else{
                    totalBilletes = cuantosBilletes;
                  }
                  acciones.arrBilletesAEntregar.push(new BilletesC(bc.valor,totalBilletes));          
                  cuantoSolicita = cuantoSolicita - (bc.valor * totalBilletes);
                  bc.cantidad = bc.cantidad - totalBilletes;
                  console.log('puedo darte '+totalBilletes+' billetes de : '+ bc.valor);        
                
              }

            }

            if(cuantoSolicita==0){
              acciones.msjOut.msj = 'Su solicitud fue procesada con exito.';
              acciones.msjOut.billetesOut = acciones.arrBilletesAEntregar;
            }else{
              acciones.msjOut.msj = 'No puedo procesar tu solicitud favor ingrese otro monto.';
              acciones.msjOut.billetesOut = acciones.arrBilletesAEntregar;
            }

          }else{
            acciones.msjOut.msj = 'Disculpe no disponemos de la cantidad que solicita por favor intente con una cantidad menor.';
            acciones.msjOut.billetesOut = acciones.arrBilletesAEntregar;
          }
    }else{
      acciones.msjOut.msj = 'Favor ingrese un monto.';
      acciones.msjOut.billetesOut = acciones.arrBilletesAEntregar;
    }

    acciones.msjOut.msj = acciones.msjOut.msj + '<br>';
    if(acciones.msjOut.billetesOut.length > 0){
      for(bOut of acciones.msjOut.billetesOut){
        acciones.msjOut.msj = acciones.msjOut.msj + ' -> '+bOut.cantidad + ' billete(s) de ' + bOut.valor+'<br>';
      }
    }

    console.log(acciones.msjOut.msj);
    resultado.innerHTML = acciones.msjOut.msj;

    return acciones.msjOut;
  }
};
//declaro la cantidad de billetes de mi cajero
acciones.llenarCajero(acciones.arrBilletes);

var b = document.getElementById('extraer');
var resultado = document.getElementById('resultado');
b.addEventListener('click',acciones.retiro);






