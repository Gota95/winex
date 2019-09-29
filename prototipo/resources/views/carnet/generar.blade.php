<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Receta del Paciente: {{$receta->nombre_paciente.' '.$receta->apellido_paciente}}</title>
        <link href="styles.css" rel="stylesheet" type="text/css">

        <style type="text/css">
        body {
        margin: 0;
        padding: 0;
        }

        #background
       {
         left: 0px;
         top: 0px;
         position: relative;
         margin-left: auto;
         margin-right: auto;
         width: 340px;
         height: 624px;
         overflow: hidden;
         z-index:0;
        }

        #Fondo
       {
         left: 0px;
         top: 0px;
         position: absolute;
         width: 340px;
         height: 624px;
         z-index:1;
       }

        #DrMardoqueoRabanales
       {
         left: 17px;
         top: 85px;
         position: absolute;
         width: 269px;
         height: 47px;
         z-index:2;
       }

        #Capa2
       {
         left: 7px;
         top: 1px;
         position: absolute;
         width: 323px;
         height: 68px;
         z-index:3;
       }

        #Rectnguloredondeado2
       {
         left: 6px;
         top: 296px;
         position: absolute;
         width: 325px;
         height: 323px;
         z-index:4;
       }

        #Rectnguloredondeado1
       {
         left: 6px;
         top: 147px;
         position: absolute;
         width: 325px;
         height: 144px;
         z-index:5;
       }

        #Capa1
       {
         left: 74px;
         top: 365px;
         position: absolute;
         width: 180px;
         height: 194px;
         z-index:6;
       }

        #Nombre
       {
         left: 19px;
         top: 168px;
         position: absolute;
         width: 293px;
         height: 79px;
         z-index:7;
       }

        #Firma
       {
         left: 139px;
         top: 593px;
         position: absolute;
         width: 172px;
         height: 12px;
         z-index:8;
       }

        #Rp
       {
         left: 16px;
         top: 307px;
         position: absolute;
         width: 23px;
         height: 13px;
         z-index:9;
       }
        </style>


    </head>
    <body>
        <div id="background">
            <div id="Fondo"><img src="images/Fondo.png"></div>
            <div id="DrMardoqueoRabanales"><img src="images/DrMardoqueoRabanales.png"></div>
            <div id="Capa2"><img src="images/Capa2.png"></div>
            <div id="Rectnguloredondeado2"><img src="images/Rectnguloredondeado2.png"></div>
            <div id="Rectnguloredondeado1"><img src="images/Rectnguloredondeado1.png"></div>
            <div id="Capa1"><img src="images/Capa1.png"></div>
            <div id="Nombre">
              <SPAN style="position: absolute; top: -6 px; left: 100 px;">{{$receta->nombre_paciente.' '.$receta->apellido_paciente}}</span>
              <SPAN style="position: absolute; top: 27 px; left: 100 px;">San Lorenzo</span>
              <SPAN style="position: absolute; top: 61 px; left: 100 px;">{{$receta->fecha}}</span>
              <img src="images/Nombre.png">
            </div>
            <div id="Firma"><img src="images/Firma.png"></div>
            <div id="Rp">
              <SPAN style="position: absolute; top: 0 px; left: 100 px;">{{$receta->medicamento}}</span>
              <p style="position: absolute; top: 10 px; left: 100 px;">{{$receta->indicaciones}}</p>
              <img src="images/Rp.png">
            </div>
        </div>
 </body>
 </html>
