var canvas_juego = new Canvas('campo');

canvas_juego.pintarTodo(canvas_juego.imagenes,canvas_juego.imagenes.dianaFrente)

document.addEventListener('keydown',function(datos){
    canvas_juego.mover(datos,canvas_juego.imagenes);
});
