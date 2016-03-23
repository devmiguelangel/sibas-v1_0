<?php
require('includes-ce/certificate-DE-EM.inc.php');
require('includes-ce/certificate-DE-EM-MO.inc.php');
require('includes-ce/certificate-AU-EM.inc.php');
require('includes-ce/certificate-AU-EM-MO.inc.php');
require('includes-ce/certificate-AU-MO-AUPRM.inc.php');
require('includes-ce/certificate-AU-MO-AUPBM.inc.php');
require('includes-ce/certificate-AU-MO-AUPRU.inc.php');
require('includes-ce/certificate-AU-MO-AUPBU.inc.php');
require('includes-ce/certificate-AU-MO-AULU.inc.php');
require('includes-ce/certificate-TRD-EM.inc.php');
require('includes-ce/certificate-TRD-EM-MO.inc.php');
require('includes-ce/certificate-TRD-MO-TRDM.inc.php');
require('includes-ce/certificate-TRD-MO-TRDU.inc.php');
require('includes-ce/certificate-TRD-MO-INCM.inc.php');
require('includes-ce/certificate-TRD-MO-INCU.inc.php');
require('includes-ce/certificate-TRD-MO-CAR.inc.php');
require('includes-ce/certificate-TRM-EM.inc.php');
require('includes-ce/certificate-TRM-EM-MO.inc.php');
require('includes-ce/certificate-THC-EM-MO.inc.php');
require('includes-ce/certificate-THD-EM-MO.inc.php');

require('includes-ce/certificate-DE-EM-PEC.inc.php');

require('includes-ce/certificate-DE-SC.inc.php');
require('includes-ce/certificate-DE-SC-MO.inc.php');
require('includes-ce/certificate-AU-SC.inc.php');
require('includes-ce/certificate-TRD-SC.inc.php');
require('includes-ce/certificate-TRM-SC.inc.php');

require('includes-ce/certificate-DE-PES.inc.php');

require('includes-ce/certificate-DE-CP.inc.php');
require('includes-ce/certificate-AU-CP.inc.php');
require('includes-ce/certificate-TRD-CP.inc.php');
require('includes-ce/certificate-TRM-CP.inc.php');

/**
 * 
 */
class CertificateHtml{
	protected $cx, $ide, $idc, $idef, $idcia, 
			$type, $category, $product, $page, $nCopy, $error, $implant, $fac, $reason,
			$sqlPo, $sqlDt, $rsPo, $rsDt, $rowPo, $rowDt, $url,
			$html, $self, $host;
	public $extra, $modality = false;
	private $host_ws = '';
	
	protected function __construct() {
		$self = $_SERVER['HTTP_HOST'];
		$this->url = 'http://' . $self . '/';
		
		if (($this->host_ws = $this->cx->getNameHostEF($_SESSION['idEF'])) !== false) {
			$this->host_ws .= '.';
		}
		
		if (strpos($self, 'localhost') !== false || filter_var($self, FILTER_VALIDATE_IP) !== false) {
			$this->url .= trim($this->host_ws, '.') . '/';
		} elseif (strpos($self, $this->host_ws . 'abrenet.com') === false){
			$this->url .= trim($this->host_ws, '.') . '/';
		} else {
			$this->url .= '';
		}
		
		if($this->type === 'PDF' || $this->type === 'ATCH'){
			$this->url = '';
		}
		
		switch ($this->category) {
		case 'SC':		//	Slip de Cotización
			$this->html = $this->get_html_sc();
			break;
		case 'CE':		//	Certificado
			$this->html = $this->get_html_ce();
			break;
		case 'CP':		//	Certificado Provisional
			$this->html = $this->get_html_cp();
			break;
		case 'PES':		//	Slip Producto Extra
			$this->html = $this->get_html_pes();
			break;
		case 'PEC':		//	Slip de Cotización
			$this->html = $this->get_html_pec();
			break;
		}
	}
	
	//SLIP DE COTIZACION
	private function get_html_sc(){
		switch ($this->product){
		case 'DE':
		    return $this->set_html_de_sc();
		    break;
		case 'AU':
		    return $this->set_html_au_sc();
		    break;
	    case 'TRD':
		    return $this->set_html_trd_sc();
		    break;
		case 'TRM':
		    return $this->set_html_trm_sc();
		    break;
		} 
	}
	
	//SLIP PRODUCTO EXTRA
	private function get_html_pes(){
		switch ($this->product){
		case 'DE':
		    return $this->set_html_de_pes();
		    break;
		} 
	}
	
	//	CERTIFICADOS EMISION
	private function get_html_ce() {
		switch ($this->product) {
		case 'DE':
			return $this->set_html_de_em();
			break;
		case 'AU':
			 return $this->set_html_au_em();
			 break;
		case 'TRD':
			 return $this->set_html_trd_em();
			 break;
		case 'TRM':
			 return $this->set_html_trm_em();
			 break;
		case 'TH':
			 return $this->set_html_th_em();
			 break;
		}
	}
	
	//	CERTIFICADOS EMISION PRODUCTO EXTRA
	private function get_html_pec(){
		switch ($this->product){
		case 'DE':
		    return $this->set_html_de_em_pec();
		    break;
		} 
	}
	
	//CERTIFICADOS PROVISIONALES
	private function get_html_cp(){
		switch ($this->product){
	    case 'DE':
			return $this->set_html_de_cp();
			break;
	    case 'AU':
			return $this->set_html_au_cp();
			break;
		case 'TRD':
			return $this->set_html_trd_cp();
			break;
		case 'TRM':
			return $this->set_html_trm_cp();
			break;
		}	
	}
	
	//SLIP DE COTIZACIONES
	private function set_html_de_sc(){ //DESGRAVAMEN SLIP
		if ($this->modality === false) {
			return de_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		} else {
			return de_sc_mo_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		}
	}
	
	private function set_html_au_sc(){//AUTOMOTORES SLIP
	    return au_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);	
	}
	
	private function set_html_trd_sc(){//TODO RIESGO DOMICILIARIO SLIP
	    return trd_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);	
	}
	
	private function set_html_trm_sc(){//TODO RIESGO EQUIPO MOVIL SLIP
	    return trm_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);	
	}
	
	//SLIP PRODUCTO EXTRA
	private function set_html_de_pes(){ //DESGRAVAMEN SLIP
		return de_pes_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
	}
	
	//CERTIFICADOS EMISIONES
	private function set_html_de_em() {	//	Desgravamen
		if ($this->modality === false) {
			return de_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		} else {
			return de_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		}
	}
	
	private function set_html_au_em() {	//	Automotores
		if ($this->modality === false) {
			return au_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		} else {
			return au_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		}
	}
	
	private function set_html_trd_em() {	//	Todo Riesgo Domiciliario
		if ($this->modality === false) {
			return trd_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		} else {
			return trd_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		}
	}
	
	private function set_html_trm_em() {	//	Todo Riesgo Equipo Movil
		if ($this->modality === false) {
			return trm_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		} else {
			return trm_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
		}
	}
	
	private function set_html_th_em() {	//	Tarjetahabiente
		if ($this->modality === false) {
			
		} else {
			$prefix = json_decode($this->rowPo['prefix'], true);
			if ($prefix['prefix'] === 'PTC') {
				return thc_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
			} elseif ($prefix['prefix'] === 'PTD') {
				return thd_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
			}
		}
	}
	
	//CERTIFICADOS PROVISIONALES
	private function set_html_de_cp(){		//Desgravamen
	  return de_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);	
	}
	
	private function set_html_au_cp(){ 		//Automotores
	  return au_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);	
	}
	
	private function set_html_trd_cp() {	//	Todo Riesgo Domiciliario
		return trd_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
	}
	
	private function set_html_trm_cp() {	//Todo Riesgo Equipo Movil
		return trm_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
	}
	
	//CERTIFICADOS EMISIONES PRODUCTO EXTRA
	private function set_html_de_em_pec() {	//	Desgravamen
		return de_em_pec_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
	}
	
}

?>