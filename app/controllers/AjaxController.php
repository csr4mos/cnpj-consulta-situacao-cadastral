<?php
/**
 * 	@description : Classe para manipular o ajax e retornar dados em JSON
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/

class AjaxController extends Controller{
	
	/*
	* Valida um campo obrigatório
	* @param $campo string
	* @param $valor string
	* @return boolean ( Validou = FALSE | Erro = TRUE )
	*/
    public function isRequired($campo,$valor){
		
		if(empty($campo)){
			throw new Exception($this->genezzis->format($this->genezzis->get('TRANSLATE.FieldRequired'),$valor));
		} 
	}
	
	/*
	* Valida o tamanho mínimo de um campo
	* @param $campo string
	* @return boolean ( Validou = FALSE | Erro = TRUE )
	*/
    public function isMinLength($campo,$valor,$tamanho){
		
		if (strlen($campo) < $tamanho) {
			throw new Exception($this->genezzis->format($this->genezzis->get('TRANSLATE.MinLength'),$valor,$tamanho));
		}
	}
	
	/*
	* Valida o tamanho máximo de um campo
	* @param $campo string
	* @return boolean ( Validou = FALSE | Erro = TRUE )
	*/
    public function isMaxLength($campo,$valor,$tamanho){
		
		if (strlen($campo) > $tamanho) {
			throw new Exception($this->genezzis->format($this->genezzis->get('TRANSLATE.MaxLength'),$valor,$tamanho));
		}
	}

	/*
	* Busca o CNPJ na base de dados da RFB
	* @param $cnpj integer
	* @return boolean ( Validou = FALSE | Erro = TRUE )
	*/
    public function statusCNPJ($cnpj){
		
		$recebe = $this->genezzis->get('POST.cnpj');
	    $cnpj = preg_replace( '#[^0-9]#', '', $recebe ); // Retira pontos e barras do cnpj

	    $receita = new ReceitaController();
	    $cnpj = $receita->consultaCNPJ( $cnpj );

	    $converte = json_encode($cnpj);
	    $obj=json_decode($converte);
	    $status = $obj->status;
	    $situacao = $obj->situacao;
	    $motivo_situacao = $obj->motivo_situacao;
		
		if($status =='ERROR'){
			throw new Exception('CNPJ <strong class="text-warning">inválido</strong>, pessoa jurídica não encontrada nos registros da RFB .');
		}

		if($situacao != 'ATIVA'){
			throw new Exception($this->genezzis->format('CNPJ <strong class="text-warning">inválido</strong>. A situação da pessoa jurídica consta como <strong class="text-warning">{0}</strong> .',$motivo_situacao));
		}
	}	
	
	
	/*
	* Valida o CNPJ digitado
	*/
    public function buscaCNPJ($genezzis){
		
		// Dados vindos do formulário
		$cnpj = $this->genezzis->set('cnpj',$this->genezzis->get('POST.cnpj'));
		
		try{
			
			//	Valida a $senha digitado no formulário
			if(isset($cnpj)){
				$max = '19';
				$min = '11';
				$valor = 'CNPJ';
				$this::isRequired($cnpj,$valor);
				$this::isMaxLength($cnpj,$valor,$max);
				$this::isMinLength($cnpj,$valor,$min);
				$this::statusCNPJ($cnpj);
			}

			// SE exisir uma sessão, destrói
	    	if(isset($_SESSION)){
	    		session_destroy();
	    	}

	    	// Inicia uma nova sessão
			session_start();

			// Formata o cnpj sem barras e pontos
			$formataCNPJ = preg_replace( '#[^0-9]#', '', $cnpj );

			$this->genezzis->set('SESSION.fCNPJ',$formataCNPJ);
			$this->genezzis->set('SESSION.cnpj',$cnpj);

			// Retorno JSON
			echo json_encode(
				array(
					'status' 	=> 'Success',
					'status_code' => 200, 
					'msg' 		=> 'cadastrou'
				)
			);

		} catch(Exception $ex){
			
			// Retorno JSON
			echo json_encode(
				array(
					'status' 	=> 'Error',
					'status_code' => 404,
					'msg' 		=> $ex->getMessage()
				)
			);
		}
	}
}