
<!-- Página 1 del informe -->
<page>
<page_header>
    <div style="display: flex; justify-content: space-between; align-items: center; height: 60px;">
        <!-- Logo Ministerio (Izquierda) -->
        <img style="width: 180px; height: 50px; " src="../dist/img/logoMinisterio.png" alt="">
        
        <!-- Logo Huaytara (Derecha) -->
        <img style="width: 98px; height: 55px; margin-left: 360px;" src="../dist/img/logoHuaytara2.jpg" alt="">
    </div>
    <h5 class="mt-1 mb-1 tr" style="font-size: 18px;"><?php foreach ($datosObtenidos as $clave) echo "{$clave['mes']} de {$clave['anio']}"; ?></h5>
    <h3 class="tc">BOLETA DE PAGO</h3>
    </page_header>


   <!--  <h4 class="mt-16 tc mb-4">Periodo :&nbsp;<?php foreach ($datosObtenidos as $clave){ echo "{$clave['mes']}";}?> - <?php foreach ($datosObtenidos as $clave){echo "{$clave['anio']}";}?></h4>
 -->
    




 <table  class="tabla-datos mt-16">
    <tr>
        <th colspan="3" style="background-color: #95ceda; color: black; padding: 10px;">DATOS PERSONALES</th>
    </tr>

    <tr>
        <td id="th" style="width: auto;"><strong>N° DE ORDEN:</strong><br><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['numRegistro']}"; ?></td>
        <td id="th" style="width: 80%;"><strong>APELLIDOS Y NOMBRES:</strong><br><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['nombresApellidos']}"; ?></td>
        <td id="th"><strong>N° DE DOCUMENTO:</strong><br><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['numeroDoc']}"; ?></td>
    </tr>

    <tr>
        <td id="th"><strong>FECHA DE INGRESO:</strong><br><br> <?php foreach ($datosObtenidos as $clave) echo "{$clave['fechaIngreso']}"; ?></td>
        <td id="th" style="width: 80%;"><strong>CARGO DEL TRABAJADOR:</strong><br><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['descripcion']}"; ?></td>
        <td id="th"><strong>CUSSP:</strong><br><br> <?php foreach ($datosObtenidos as $clave) echo "{$clave['cussp']}"; ?></td>
        
    </tr>

    <tr>
        <td><strong>NUMERO DE CUENTA:</strong><br><br> <?php foreach ($datosObtenidos as $clave) echo "{$clave['numCuenta']}"; ?></td>
        <td id="th"><strong>REGIMEN PENSIONARIO:</strong><br><br> 
        <?php 
            $tipoRegimen = $clave['tipo'];

            if($tipoRegimen == "" || $tipoRegimen == null){
                $tipoRegimen = "SNP";
            }else{
                $tipoRegimen = $tipoRegimen;
            }

            foreach ($datosObtenidos as $clave) echo $tipoRegimen; 
        
        ?></td>
        <td id="th"><strong>NOMBRE DEL REGIMEN:</strong><br><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['nombre']}"; ?></td>
    </tr>
    
</table>





<br>
<table cellspacing="0" style="width: 10%; margin: auto; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 11px; border: 1px solid #ddd;">
    <tr>
        <!-- Encabezado "Ingresos" -->
        <td style="width: 50%; vertical-align: top; padding-right: 5px; border-right: 1px solid #ccc;">
            <table cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #95ceda;">
                    <th colspan="2" style="text-align: center; padding: 5px; font-size: 11px; font-weight: bold; border-bottom: 1px solid #ccc;">
                        INGRESOS
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>SUELDO BASICO</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['sueldoBasico']}"; ?></th>
                    </tr>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>ASIGNACIÓN FAMILIAR</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['asignacionFamiliar']}"; ?></th>
                    </tr>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>REINTEGRO</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['reintegros']}"; ?></th>
                    </tr>  
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>AGUINALDO</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['montoAguinaldo']}"; ?></th>
                    </tr>    
                </tbody>
            </table>
        </td>

        <!-- Encabezado "Descuentos" -->
        <td style="width: 50%; vertical-align: top; padding-left: 5px;">
            <table cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #95ceda;">
                    <th colspan="2" style="text-align: center; padding: 5px; font-size: 11px; font-weight: bold; border-bottom: 1px solid #ccc;">
                        APORTES TRABAJADOR
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>ONP OBLIGATORIO</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['obliOnp']}"; ?></th>
                    </tr>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>AFP OBLIGATORIO</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['afpOblig']}"; ?></th>
                    </tr>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>PRIMA DE SEGURO AFP</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['montoprimaSeguro']}"; ?></th>
                    </tr>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>ESSALUD VIDA+</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['essaludVida']}"; ?></th>
                    </tr> 
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>DESCUENTOS / INASISTENCIAS</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['montoInasistencia']}"; ?></th>
                    </tr> 
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>COMISIÓN % SOBRE R.A</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['comisionFlujo']}"; ?></th>
                    </tr>  
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='padding: 3px; text-align: left;'>SALUD</th>
                        <th style='padding: 3px; text-align: right;'><br><?php foreach ($datosObtenidos as $clave) echo "{$clave['ssalud']}"; ?></th>
                    </tr>  
                </tbody>
            </table>
        </td>
    </tr>
</table>

<br>

<table  class="tabla-datos2">

    <tr>
        <td id="th" style="width: 85%;background-color: #95ceda;"><strong>TOTAL REMUNERACION:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($datosObtenidos as $clave) echo "{$clave['montoRem']}"; ?></td>
        <td id="th" style="width: 83%;background-color: #95ceda;"><strong>TOTAL DESCUENTO:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($datosObtenidos as $clave) echo "{$clave['totalDescuento']}"; ?></td>
    </tr>

    <tr>
        <td id="th" style="width: 85%;background-color: #95ceda;"><strong>REMUNERACION NETA:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($datosObtenidos as $clave) echo "{$clave['netoPagar']}"; ?></td>
        <td id="th" style="width: 83%;background-color: #95ceda;"><strong>TOTAL APORTES:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($datosObtenidos as $clave) echo "{$clave['montototalAporte']}"; ?></td>
    </tr>
    
</table>


    
 
    <page_footer>
        <p> Pag - [[page_cu]]</p>
    </page_footer>

</page>
