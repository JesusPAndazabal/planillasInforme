
<!-- Página 1 del informe -->
<page>
    <page_header>
        <?php 
            $fechaActual = date('d-m-Y ');
            $horaActual  = date('H:i:s');
        ?>
        <img class="img ml-13 mb-1" src="../dist/img/logougel.jpg" alt="">
        <h6> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; GOBIERNO REGIONAL - ICA</h6>
        <h6> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;DIRECCIÓN REGIONAL DE EDUCACIÓN</h6>
        <h6>UNIDAD DE GESTIÓN EDUCATIVA LOCAL - CHINCHA</h6>
        <h5 class="mt-1 mb-1 tr"> Fecha de Impresion : <?php  echo $fechaActual; ?></h5>
        <!-- <h5 class="mb-1 tr"> Hora de Impresion : <?php  echo $horaActual; ?></h5> -->
        <h3 class="mt-1 tc underline">Boleta de Pago - Planilla</h3>
        
    </page_header>

   <!--  <h4 class="mt-16 tc mb-4">Periodo :&nbsp;<?php foreach ($datosObtenidos as $clave){ echo "{$clave['mes']}";}?> - <?php foreach ($datosObtenidos as $clave){echo "{$clave['anio']}";}?></h4>
 -->
    <table class="mt-17">

        <tr>
            <th id="th">Periodo</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['mes']}  - {$clave['anio']}
                </th>
            ";            
        }
        ?>
        </tr>


        <tr>
            <th id="th">Empleado</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['empleado']}  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Código Modular</th>
        
        <?php foreach ($datosObtenidos as $clave){

            $anio = $clave['anio'];

          

            if($anio  <= 2002){
                $codigoInstitucion = $clave['codigomodular'];
            }else if($anio < 2002){
                $codigoInstitucion = $clave['codigodni'];
            }
            
            echo "
                <th>
                    :$codigoInstitucion  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Institución</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['nombre']}  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Código de Institución</th>
        
        <?php foreach ($datosObtenidos as $clave){
            $anio = $clave['anio'];

            if($anio <= 2003){
                $codigoEmpleado = $clave['codlegacy'];
            }else if($anio > 2003){
                $codigoEmpleado = $clave['codactual'];
            }

            echo "
                <th>
                    :$codigoEmpleado  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Estado del Empleado</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['activo']}  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Cargo</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['cargo']}  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Nivel Educación</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['nivel']}  
                </th>
            ";            
        }
        ?>
        </tr>

        <tr>
            <th id="th">Tipo de Empleado</th>
        
        <?php foreach ($datosObtenidos as $clave){
            echo "
                <th>
                    :{$clave['tipoempleado']}  
                </th>
            ";            
        }
        ?>
        </tr>


    </table>

        
    <p>_________________________________________________________________________________</p>
        <h5 class="bold mt-1 tc">Ingresos</h5>
    <p>_________________________________________________________________________________</p>

   <table cellspacing="0" style="width: 40%;">
        <tr>
            <td style="width:55%;">
            <table style ="margin-bottom: 14%;">
                
                <?php foreach ($datosIngresosCol1 as $clave){
                
                $monto = $clave['monto'];
                
                if($anio <= 1991){
                    $numeroConvertido = number_format($monto,3);
                }else if($anio >=1992 ){
                    $numeroConvertido = number_format($monto,2);
                }

                echo "
                        <tr style = 'border: solid 1px;'>
                            <th style = 'border:1px solid #000;' class='textS'>+{$clave['nombre']}</th>
                            <th style = 'border:1px solid #000;' class='tr textS'>$numeroConvertido</th>
                        </tr>
                    ";
                } ?>
            </table>
            </td>

            <td style="width: 55%">
            <table style="margin-bottom: -6%">
                <?php foreach ($datosIngresosCol2 as $clave){

                    $monto = $clave['monto'];
                
                    if($anio <= 1991){
                        $numeroConvertido = number_format($monto,3);
                    }else if($anio >=1992 ){
                        $numeroConvertido = number_format($monto,2);
                    }
    
                    
                    echo "
                        <tr style = 'border: solid 1px;'>
                            <th style = 'border:1px solid #000;' class='textS '>+{$clave['nombre']}</th>
                            <th style = 'border:1px solid #000;' class='tr textS'>$numeroConvertido</th>
                        </tr>
                    ";
                } ?>
            </table>
            </td>
     
        </tr>
    </table>   
        
    
    
    <!-- Fin del cuerpo de la página  -->
    <p>_________________________________________________________________________________</p>
        <h5 class="bold mt-1 tc">Egresos</h5>
    <p>_________________________________________________________________________________</p>

    <table>

        <?php foreach ($datosEgresos as $clave){
             $monto = $clave['monto'];
                
             if($anio <= 1991){
                 $numeroConvertido = number_format($monto,3);
             }else if($anio >=1992 ){
                 $numeroConvertido = number_format($monto,2);
             }

            echo "
                <tr>
                    <th class='textS'>-{$clave['nombre']}</th>
                    <th class='tr textS'>$numeroConvertido</th>
                </tr>
            ";
        } ?>
    </table>
    
    <p>_________________________________________________________________________________</p>
    

    <span class="tr  mt-2 bold">Total Haberes : <?php foreach ($sumarIngresos as $clave){
         $sumingreso = $clave['ingreso'];
                
         if($anio <= 1991){
             $sumaIngresos = number_format($sumingreso,3);
         }else if($anio >=1992 ){
             $sumaIngresos = number_format($sumingreso,2);
         }

        echo $sumaIngresos; $ingresos = $sumingreso;
        }
    ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="tr  mt-2 bold">Total Descuentos : <?php foreach ($sumarEgresos as $clave){

        $sumegreso = $clave['egreso'];

        if($anio <= 1991){
            $sumaEgresos = number_format($sumegreso,3);
        }else if($anio >=1992 ){
            $sumaEgresos = number_format($sumegreso,2);
        }

        echo $sumaEgresos;
        }
    ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <?php 
    $totalLiquido =  $ingresos - $clave['egreso'];
    
                
    if($anio <= 1991){
        $format_number1 = number_format($totalLiquido,3);
    }else if($anio >=1992 ){
        $format_number1 = number_format($totalLiquido,2);
    }
    
    ?>

    <span class="tr mt-2 bold">Total Liquido : <?php echo $format_number1 ?></span><br>


    <qrcode  value="http://192.168.164.120/querysheet/reports/reporte/<?php foreach ($datosObtenidos as $clave){
            echo "
                {$clave['idboleta']}  
            ";            
        }
        ?>" style="width: 40mm; background-color: white; color: black; margin-left:76%; margin-top:7%"></qrcode> 

        

    <page_footer>
        <p> Pag - [[page_cu]]</p>
    </page_footer>

</page>
