var canvas= new Canvas('canvas_area');
var canvas_diagonal=new Canvas('canvas_area_diagonal');
var canvas_diagonal_fusion=new Canvas('canvas_area_diagonal_fusion');
var canvas_img=new Canvas('canvas_area_img');
//extructura de parametros para circulos
var circulos = {
    parametros_circulo_a:{
        borderColor:"#00F",
        ejeX:130,
        ejeY:220,
        radio:55,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"yellow"
    },
    parametros_circulo_b:{
        borderColor:"#00F",
        ejeX:220,
        ejeY:220,
        radio:55,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"red"
    },
    parametros_circulo_c:{
        borderColor:"red",
        ejeX:150,
        ejeY:150,
        radio:100,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_d:{
        borderColor:"red",
        ejeX:100,
        ejeY:100,
        radio:100,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_e:{
        borderColor:"red",
        ejeX:207,
        ejeY:207,
        radio:50,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"black"
    },
    parametros_circulo_h:{
        borderColor:"red",
        ejeX:260,
        ejeY:260,
        radio:25,
        radian_inicio:0,
        radian_fin:Math.PI * 2,
        direccionContraReloj:false,
        backgroundColor:"red"
    }
};
//extructura de parametros para imagenes
var imagenes = {
    parametros_img_a:{
        src:"img/kratos-300x300.jpg",
        ejeX:0,
        ejeY:0
    },
    parametros_img_b:{
        src:"img/kratos-300x300.jpg",
        ejeX:0,
        ejeY:0
    },
};
//inicio el path para dibujar
canvas.canvasArea.beginPath();
canvas.canvasArea.strokeStyle = "red";
canvas.pintarLineasEjercicio();
canvas.canvasArea.closePath();
canvas.canvasArea.stroke();
//finalizo el path

canvas.pintarGrilla();
canvas_diagonal.pintarGrillaDiagonal();
canvas_diagonal_fusion.pintarGrillaDiagonal();
canvas_diagonal_fusion.pintarGrilla();

canvas.canvasArea.beginPath();
canvas.pintarCirculo(circulos.parametros_circulo_a);
canvas.canvasArea.stroke();
canvas.canvasArea.closePath();

canvas.canvasArea.beginPath();
canvas.pintarCirculo(circulos.parametros_circulo_b);
canvas.canvasArea.stroke();
canvas.canvasArea.closePath();


canvas_diagonal.canvasArea.beginPath();
canvas_diagonal.pintarCirculo(circulos.parametros_circulo_c);
canvas_diagonal.canvasArea.stroke();
canvas_diagonal.canvasArea.closePath();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_d);
canvas_diagonal_fusion.canvasArea.stroke();
canvas_diagonal_fusion.canvasArea.closePath();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_e);
canvas_diagonal_fusion.canvasArea.stroke();
canvas_diagonal_fusion.canvasArea.closePath();

canvas_diagonal_fusion.canvasArea.beginPath();
canvas_diagonal_fusion.pintarCirculo(circulos.parametros_circulo_h);
canvas_diagonal_fusion.canvasArea.stroke();
canvas_diagonal_fusion.canvasArea.closePath();

canvas_img.canvasArea.beginPath();
canvas_img.pintarImg(imagenes.parametros_img_a)
canvas_img.canvasArea.stroke();
canvas_img.canvasArea.closePath();