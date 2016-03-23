<?php
function de_sc_mo_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
	
	$fontSize = 'font-size: 75%;';
	$fontsizeh2 = 'font-size: 80%';
	$width_ct = 'width: 700px;';
	$width_ct2 = 'width: 695px;';
	$marginUl = 'margin: 0 0 0 20px; padding: 0;';
	
	/*
	$url_img = $url;
	if($type == 'PDF'){
		$marginUl = 'margin: 0 0 0 -20px; padding:0;';
		$fontSize = 'font-size: 75%;';
		$fontsizeh2 = 'font-size: 40%';
		$width_ct = 'width: 785px;';
		$width_ct2 = 'width: 775px;';
		$url_img = '';
	}
	if($type == 'PDF'){
	   $imagen = getimagesize($url_img.'../images/'.$row['logo_cia']); 
	   $dir_cia = $url_img.'../images/'.$row['logo_cia'];
	   $dir_logo = $url_img.'../img/logo-sud.jpg';  
    }else{
	   $imagen = getimagesize($url_img.'images/'.$row['logo_cia']);
	   $dir_cia = $url_img.'images/'.$row['logo_cia'];
	   $dir_logo = $url_img.'img/logo-sud.jpg';   
	}*/
	//$imagen = getimagesize($url.'images/'.$row['logo_cia']);
	//$dir_cia = $url.'images/'.$row['logo_cia'];
	//$dir_logo = $url.'images/'.$row['logo_ef'];   
	//$ancho = $imagen[0];            
    //$alto = $imagen[1];
	
	ob_start();
?>
<div id="container-main" style="<?=$width_ct;?> height: auto; padding: 5px;">
   <div id="container-cert" style="<?=$width_ct2;?> font-weight: normal; font-size: 80%; font-family: Arial, Helvetica, sans-serif; color: #000000;">
   
     <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; <?=$fontSize;?>">
         <tr>
           <td style="width:34%;">
               <img src="<?=$url;?>images/<?=$row['logo_ef'];?>" width="200"/>
           </td>
           <td style="width:32%;"></td>
           <td style="width:34%; text-align:right;">
               <img src="<?=$url;?>images/<?=$row['logo_cia'];?>" width="100"/>
           </td>
         </tr>
         <tr><td colspan="3">&nbsp;</td></tr>
         <tr>
           <td style="width:34%;">SLIP DE COTIZACIÓN<br/>No. DE-<?=$row['no_cotizacion'];?></td>
           <td style="width:32%;"></td> 
           <td style="width:34%; text-align:right;">Cotización válida hasta el: 05-12-2013</td>
         </tr>
         <tr>
           <td colspan="3" style="width:100%; text-align:center;">
             SLIP DE COTIZACIÓN<br/>
             DECLARACION JURADA DE SALUD<br/>
             SOLICITUD DE SEGURO DE DESGRAVAMEN HIPOTECARIO
           </td>
         </tr>
     </table><br/>
	 
     <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; <?=$fontSize;?>">
         <tr>
           <td style="width:50%; text-align:right;"><b>Tipo Cobertura:</b></td>
           <td style="width:50%;">Individual - Mancomuno</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Monto Actual Solicitado:</b></td>
           <td style="width:50%;"><?=$row['monto'].' '.$row['moneda'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Plazo del Presente Crédito:</b></td>
           <td style="width:50%;"><?=$row['plazo'].' '.$row['tipoplazo'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Producto:</b></td>
           <td style="width:50%;"><?=$row['producto'];?></td>
         </tr>
      </table><br/>
      <?php
            $titulares=array();
			$j=1;
			$num_titulares=$rsDt->num_rows;
			
			while($regiDt=$rsDt->fetch_array(MYSQLI_ASSOC)){
                $jsonData = $regiDt['respuesta'];
                $phpArray = json_decode($jsonData);
		    ?>
                <div style="width: auto;	height: auto; text-align: left; margin: 7px 0; padding: 0; font-weight: bold; <?=$fontsizeh2;?>">Datos del titular <?=$regiDt['cont_titular'];?></div>                             
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; <?=$fontSize;?>">
                   <tr style="font-weight:bold;">
                     <td style="width:25%; text-align:center; font-weight:bold;">Apellido Paterno</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Apellido Materno</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Nombres</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Apellido de Casada</td>
                   </tr>
                   <tr>
                     <td style="width:25%; text-align:center;"><?=$regiDt['paterno'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['materno'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['nombre'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['ap_casada'];?></td>
                   </tr>
                    <tr style="font-weight:bold;">
                     <td style="width:25%; text-align:center; font-weight:bold;">Lugar de Nacimiento</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Pais</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Fecha de Nacimiento</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Lugar de Residencia</td>
                   </tr>
                   <tr>
                     <td style="width:25%; text-align:center;"><?=$regiDt['lugar_nacimiento'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['pais'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['fecha_nacimiento'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['lugar_residencia'];?></td>
                   </tr>
                   <tr style="font-weight:bold;">
                     <td style="width:25%; text-align:center; font-weight:bold;">Documento de Identidad o Pasaporte</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Edad</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Peso (kg)</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Estatura (cm)</td>
                   </tr>
                   <tr>
                     <td style="width:25%; text-align:center;"><?=$regiDt['ci'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['edad'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['peso'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['estatura'];?></td>
                   </tr>
                   <tr style="font-weight:bold;">
                     <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">Dirección del Domicilio</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Tel. Domicilio</td>
                     <td style="width:25%; text-align:center; font-weight:bold;">Tel. Oficina</td>
                   </tr>
                   <tr>
                     <td colspan="2" style="width:50%; text-align:center;"><?=$regiDt['direccion'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['telefono_domicilio'];?></td>
                     <td style="width:25%; text-align:center;"><?=$regiDt['telefono_oficina'];?></td>
                   </tr>
                   <tr style="font-weight:bold;">
                     <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">Ocupación</td>
                     <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">Descripción</td>
                   </tr>
                   <tr>
                     <td colspan="2" style="width:50%; text-align:center;"><?=$regiDt['ocupacion'];?></td>
                     <td colspan="2" style="width:50%; text-align:center;"><?=$regiDt['desc_ocupacion'];?></td>
                   </tr>
                </table>		
		<?php
		        $titulares[1][$j]=$regiDt['nombre'].' '.$regiDt['paterno'].' '.$regiDt['materno'];
				$titulares[2][$j]=$row['monto'].' '.$row['moneda'];
				$titulares[3][$j]=$row['tasa_final'];
				 echo'<div style="width: auto;	height: auto; text-align: left; margin: 7px 0; padding: 0; font-weight: bold; '.$fontsizeh2.'">Cuestionario</div>
						<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; '.$fontSize.'">';
						  $c=0;
						  $error=array();
						  foreach ($phpArray as $key => $value) {
							  $vec=explode('|',$value);
							  $id_pregunta=$vec[0];
							  $respuesta=$vec[1];
							  $select4="select
										  pregunta,
										  respuesta,
										  orden
										from
										  s_pregunta
										where
										  id_pregunta=".$id_pregunta.";"; 			  
							  //$regi4 = mysqli_fetch_array((mysqli_query($conexion,$select4)),MYSQLI_ASSOC);
							  $res4 = $conexion->query($select4, MYSQLI_STORE_RESULT);
							  $regi4 = $res4->fetch_array(MYSQLI_ASSOC); 
							  echo'<tr>
								   <td style="width:5%; text-align:left;">'.$regi4['orden'].'</td>
								   <td style="width:80%; text-align:left;">'.$regi4['pregunta'].'</td>';
							  if($respuesta==$regi4['respuesta']){
									if($respuesta==1){ 
										echo'<td style="width:15%; text-align:right;">si</td>';
									}elseif($respuesta==0){
										echo'<td style="width:15%; text-align:right;">no</td>';
									}	
							  }else{
									if($respuesta==1){ 
										echo'<td style="width:15%; text-align:right;">si</td>';
									}elseif($respuesta==0){
										echo'<td style="width:15%; text-align:right;">no</td>';
									}
									$error[$c]=$regi4['orden'];
									$c++;
							  }
							 echo'</tr>';
						  }
				   echo'</table>
				        <div style="width: auto;	height: auto; text-align: left; margin: 7px 0; padding: 0; font-weight: bold; '.$fontsizeh2.'">Detalle</div>
						<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; '.$fontSize.'">
						  <tr><td>';
					         if(!empty($regiDt['observacion'])){
								if($row['monto_def']>=10001){
								   echo'<div style="text-align:justify; border:1px solid #C68A8A; background:#FFEBEA; padding:8px;">
								   No cumple con la(s) pregunta(s) ';
								   foreach($error as $valor){
										echo $valor.',&nbsp;';      
								   }
								   unset($error);
								  echo'&nbsp;del cuestionario<br/><br/>
								  <b>Nota:</b>&nbsp;Al no cumplir con una o mas preguntas del cuestionario del presente slip, 
				la compa&ntilde;&iacute;a de seguros solicitar&aacute; ex&aacute;menes m&eacute;dicos para la autorizaci&oacute;n de aprobaci&oacute;n del seguro o en su defecto podr&aacute; declinar la misma.
								  </div>'; 
								}
							 }else{
								 if($row['monto_def']>=10001){
								 echo'<div style="text-align:justify; border:1px solid #3B6E22; background:#6AA74F; padding:8px; color:#ffffff;">
							             Cumple con las preguntas del cuestionario 
						              </div>';
								 }
							 }	   
					 echo'</td></tr>
				        </table>';
						echo'<div style="width: auto; height: auto; text-align: left; margin: 7px 0; padding: 0; font-weight: bold; '.$fontsizeh2.'">Indice de Masa Corporal</div>';
							 $res=($regiDt['peso']+100)-$regiDt['estatura'];
							 if( (($res>=0) and ($res<=15))  or (($res<0) and ($res>=-15)) ){
								$dato=1;
							 }elseif($res<-15){
								$dato=2;
							 }elseif($res>15){
								$dato=3;
							 }
					   echo'<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; '.$fontSize.'">
							  <tr>
								<td style="width:30%; text-align:left;">'.imc($dato).'</td>
								<td style="width:70%; text-align:right;">
								  <table border="0" cellspacing="0" cellpadding="0" style="width:30%; font-size:9px;">
									 <tr><td colspan="3" style="color:#ffffff; background:#0075AA; font-weight:bold; text-align:center; width:100%;">Datos</td></tr>
									 <tr><td><b>Estatura</b></td><td style="text-align:right">'.$regiDt['estatura'].'</td><td style="text-align:right"><b>cm</b></td></tr>
									 <tr><td><b>Peso</b></td><td style="text-align:right">'.$regiDt['peso'].'</td><td style="text-align:right"><b>kg</b></td></tr>
								  </table>
								</td> 
							  </tr>
							  <tr><td colspan="2" style="width:100%;">';
							    if($row['monto_def']>=10001){
									 if($dato==1){
										 echo'<div style="text-align:justify; border:1px solid #3B6E22; background:#6AA74F; padding:8px; color:#ffffff;">
											 Cumple con la estatura y peso adecuado. 
										  </div>';
									 }else{
										 echo'<div style="text-align:justify; border:1px solid #C68A8A; background:#FFEBEA; padding:8px;">
											   <b>Nota:</b>&nbsp;Al no cumplir con el peso y la estatura adecuados, 
		la compa&ntilde;&iacute;a de seguros solicitar&aacute; ex&aacute;menes m&eacute;dicos para la autorizaci&oacute;n de aprobaci&oacute;n del seguro o en su defecto podr&aacute; declinar la misma.
											  </div>';
									 }
								}
							  echo'</td></tr>  
							</table>';
				  $j++;				 		
			}
		?>
       <div style="font-size:80%; width: 100%; height: auto; margin: 7px 0;">
                        
            Declaro haber contestado con total veracidad, máxima buena fe a todas las preguntas del presente cuestionario y no haber omitido u ocultado hechos y/o circunstancias que hubieran podido influir en la celebracion del Contrato de Seguro. Relevo expresamente del secreto profesional y legal, a cualquier médico que me hubiese asistido y/o tratado de dolencias y le autorizo a revelar a <?=$row['compania'];?> Todos los datos y antecedentes patológicos que pudiera tener o de los que hubiera adquirido conocimiento al prestarme sus servicios. Entiendo que de presentarse alguna eventualidad contemplada bajo la Póliza de Seguro como conscuencia de alguna enfermedad existente a la fecha de la firma de este documento o cuando haya alcanzado la edad límite estipulada en la Póliza, la Compañia Aseguradora quedara liberada de toda responsabilidad en lo que respecta a mi Seguro. Finalmente, declaro conocer en su totalidad lo estipulado en mi Póliza de Seguro.<br/><br/>
            
            <b>CONTRATANTE:</b> <?=$row['ef_nombre']?><br/>
            <b>ACTIVIDAD GENERAL:</b> Varias y sin limitaciones<br/><br/>
            
            <b>RIESGOS CUBIERTOS:</b>
            <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
                <li><b>Muerte por cualquier Causa</b>, que no esté excluida en el Condicionado General de la Póliza incluido el suicidio después de 6 meses de vigencia ininterrumpida de la cobertura individual del seguro.</li>
                <li><b>Pago anticipado del capital asegurado en caso de invalidez total y permanente por accidente o enfermedad</b>, en forma irreversible por lo menos en un 65% según el manual de normas autorizado por la APS, en actual vigencia.</li>
                <li><b>Gastos de Sepelio</b>, son los gastos que demanden los herederos legales o nominados por el Sepelio de un Asegurado (Titular o Conyugue), como consecuencia del fallecimiento por una enfermedad o un accidente cubierto para el Titular.</li>
            </ol><br/>     
                        
            <b>CAPITALES ASEGURADOS:</b>
               <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
                <li>Saldo deudor.</li>
                <li>Saldo deudor.</li>
                <li>USD 300.00</li>
               </ol><br/>
               
            <b>RIESGOS EXCLUIDOS:</b> La Compañía no cubre y esta eximida de toda responsabilidad en caso de fallecimiento del asegurado en los siguientes casos:
             <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
                <li>Si el asegurado participa como conductor o acompañante en competencias de automóviles, motocicletas, lanchas de motor o avionetas, practicas de paracaídas.</li>
                <li>Si el asegurado realiza operaciones o viajes submarinos o en transportes aéreos no autorizados para transporte de pasajeros, vuelos no regulares.</li>
                <li>Enfermedades pre-existentes conocidas al inicio del seguro o enfermedad congénita, para créditos mayores a USD. 5,001.00</li>
                <li>SIDA/HIV para siniestros a partir de USD. 5.001.00</li>
                <li>Guerra, invasión, revolución, sublevación, motín o hechos que las leyes clasifiquen como delitos contra la seguridad del Estado, siempre y cuando el asegurado no participe activamente.</li>
                <li>Suicidio realizado por el asegurado dentro de 6 meses de vigencia ininterrumpida de su cobertura. En consecuencia este riesgo quedara cubierto a partir del primer día del segundo semestre de vigencia para cada operación asegurada.</li>
                <li>Fisión o fusión nuclear</li>
              </ol><br/>  
             
              <b>EDAD DE ADMISIÓN Y PERMANENCIA:</b><br/>
                Para muerte:<br/>
                Mínima 18 años<br/>
                Máxima 70 años. Renovacion garantizada en función de la duracion del credito hasta cumplir los 75 años<br/><br/>
                
                Para invalidez:<br/>
                Minima 18 años<br/>
                Maxima 60 años (hasta cumplir 61 años) al momento de inicio de cobertura<br/>
                Permanencia: 65 años inclusive hasta cumplir los 66 años<br/><br/>
            
       </div>      
       
  
        <?php
           echo'<div style="width: auto; height: auto; text-align: left; margin: 7px 0; padding: 0; font-weight: bold; '.$fontsizeh2.'">Tasa Mensual</div>';
		   
		   echo'<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; '.$fontSize.'">
				  <tr style="text-align:center;">
					<td style="width:30%;"><b>NOMBRE</b></td>
					<td style="width:30%;"><b>VALOR ASEGURADO</b></td>
					<td style="width:40%;"><b>TASA FINAL</b></td>
				  </tr>';
				  if($num_titulares==1){
					  echo'<tr style="text-align:center;">
							 <td style="width:30%;">'.$titulares[1][1].'</td>
							 <td style="width:30%;">'.$titulares[2][1].'</td>
							 <td style="width:20%;">'.$titulares[3][1].'</td>
						  </tr>';
				  }else{
					 echo'<tr style="text-align:center;">
							 <td style="width:30%;">'.$titulares[1][1].'</td><td style="width:30%;">'.$titulares[2][1].'</td><td rowspan="2" style="width:20%;">'.$titulares[3][1].'</td>
						  </tr>
						  <tr style="text-align:center;">
							 <td style="width:30%;">'.$titulares[1][2].'</td><td style="width:30%;">'.$titulares[2][2].'</td>
						  </tr>'; 
				  }
		  echo'</table>';
		?>
       <div style="font-size:80%; width: 100%; height: auto; margin: 7px 0;">  
            <b>PRIMA:</b> De acuerdo a declaraciones mensuales del contratante, por mes vencido.<br/>
            <b>FORMA DE PAGO:</b> Contado a través de <?=$row['ef_nombre']?><br/>
            <b>BENEFICIARIO:</b> <?=$row['ef_nombre']?> TÍTULO ONEROSO y/o El Tomador del seguro<br/><br/>
            
            <b>OBSERVACIONES:</b> Las primas del seguro no constituyen hecho generador de tributo según el Art. No. 54 de la Ley de Seguros 1883 del 25 de Junio de 1998 y a la Resolución Ministerial Nro. 880 del 28 de Junio de 1999. Autorizo a la compañía mi reporte a la Central de Riesgos del Mercado de Seguros, acorde a las normativas reglamentarias de la Autoridad de Fiscalización y Control de Pensiones y Seguros.<br/><br/>
            
            <b>INICIO DE LA COBERTURA:</b> La cobertura de esta Póliza para cada Asegurado aceptado, comenzará a partir del momento del desembolso de su crédito por parte de <?=$row['ef_nombre']?>, previo cumplimiento de lo establecido en los &rdquo;Requisitos de Asegurabilidad&rdquo;.<br/><br/>
            
            
            <b>AVISO DE SINIESTRO:</b> En caso de fallecimiento o invalidez total y permanente del Asegurado, el tomador, tan pronto y a más tardar dentro de los 60 días calendario siguientes de tener conocimiento del siniestro, debe comunicar el mismo a la Compañía, salvo fuerza mayor o impedimento justificado, caso contrario la Compañía se libera de cualquier responsabilidad indemnizatoria por extemporaneidad.<br/><br/>

<b>PLAZO PARA PAGO DE SINIESTRO:</b> El plazo para el pago de siniestros por sepelio será realizado dentro de 2 días hábiles de recibidos todos los documentos requeridos por la compañía. para el pago de siniestros por las demás coberturas será dentro de los 10 días de presentados todos los documentos.<br/><br/> 
        
           <b> PARA SINIESTROS HASTA USD 5.000:</b>
           <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
            <li>Original de la Declaración Jurada de Salud.</li>
            <li>Certificado de Defunción, (para el área rural podrá presentar un certificado de cualquier autoridad local del pueblo o localidad, dandofe del fallecimiento del asegurado y la certificación del jefe de agencia).</li>
            <li>Fotocopia de C.I. y/o fotocopia de Certificado de Nacimiento y/o Carnet de Identidad RUN y/o libreta de servicio militar.</li>
            <li>Estado de cuenta saldo deudor.</li>
            <li>Para el caso de Invalidez: Certificado INSO (Instituto Nacional de Salud Ocupacional) o en su defecto de otra institución que esté debidamente autorizada por la Autoridad Competente, la cual determine el grado de invalidez.</li>
            </ol><br/>
            
            <b>PARA SINIESTROS DE USD 5.001 EN ADELANTE:</b>
            <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
               <li> Original de la Declaración Jurada de Salud</li>
                <li>Certificado de Defunción, (para el área rural podrá presentar un certificado de cualquier autoridad local del pueblo o localidad, dando fe del fallecimiento del asegurado y la certificación del jefe de agencia).</li>
               <li>Fotocopia de C.I. y/o fotocopia de Certificado de Nacimiento y/o Carnet de Identidad RUN y/o libreta de servicio militar.</li>
                <li>Estado de cuenta saldo deudor.</li>
                <li>Historia Clinica si existiera.</li>
                <li>Para el caso de Invalidez: Certificado INSO (Instituto Nacional de Salud Ocupacional) o en su defecto de otra institución que esté debidamente autorizada por la Autoridad Competente, la cual determine el grado de invalidez.</li>
            </ol><br/>

            <b>SEPELIO:</b>
           <ol style="<?=$marginUl;?> list-style-type:lower-alpha;">
            <li>Fotocopia del Carnet de Identidad del Asegurado, y/o Fotocopia de Certificado de nacimiento y/o Carnet de identidad RUN y/o libreta del servicio militar.</li>
            <li>Fotocopia de carnet de identidad del Beneficiario y/o Fotocopia de Certificado de nacimiento y/o Carnet de identidad RUN y/o libreta de servicio militar.</li>
           <li>Certificado de Defunción, (para el área rural podrá presentar un certificado de cualquier autoridad local del pueblo o localidad, dandofe del fallecimiento del asegurado y la certificación del jefe de agencia).</li>
            <li>Declaratoria de Beneficiarios o declaratoria de herederos en caso de no existir la nominacion de los mismos.</li>
            <li>Carta de los beneficiarios solicitando el beneficio.</li>
           </ol><br/><br/>
           Todo lo que no esté previsto por el Certificado de Cobertura Individual, se sujetará a lo establecido en las Condiciones Particulares, Condiciones Generales y demás documentos Anexos a la presente Póliza de Seguro de Desgravamen Hipotecario en Grupo, el Código de Comercio, la Ley de Seguros y por las disposiciones legales vigentes en la materia. 
  
       </div><br/><br/><br/>
       
       <div style="font-size:80%; width: 100%; height: auto; margin: 7px 0;">
           
            
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; <?=$fontSize;?>">
			  <?php
                if($num_titulares==2){
                   echo'<tr>
                     <td style="width:20%; text-align:center;">'.$titulares[1][1].'</td>
                     <td style="width:20%; text-align:center;">'.$titulares[1][2].'</td>
                     <td style="width:20%; text-align:center;">'.date('d-m-Y').'</td>
                   </tr>
                   <tr>
                     <td style="width:20%; text-align:center;"><b>Titular 1</b></td>
                     <td style="width:20%; text-align:center;"><b>Titular 2</b></td>
                     <td style="width:20%; text-align:center;"><b>Fecha Actual</b></td>
                   </tr>';
                }elseif($num_titulares==1){
                     echo'<tr>
                     <td style="width:30%; text-align:center;">'.$titulares[1][1].'</td>
                     
                     <td style="width:30%; text-align:center;">'.date('d-m-Y').'</td>
                   </tr>
                   <tr>
                     <td style="width:30%; text-align:center;"><b>Titular 1</b></td>
                     
                     <td style="width:30%; text-align:center;"><b>Fecha Actual</b></td>
                   </tr>';
                }
                ?>
            </table>
       </div>
	
   </div>
</div>
<?php
	$html = ob_get_clean();
	return $html;
}
?>