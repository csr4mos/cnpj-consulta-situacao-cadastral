<?php
/**
 * 	@description : Classe Exibição das Páginas Cadastradas no CMS 
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/

class PaginasController extends Controller {
		
	/*
	* Exibe a página : HOME
	*/
    public function pageHome($genezzis){

		$this->genezzis->set('pageTitle', '');
		$this->genezzis->set('view','front/index.html');
		echo Template::instance()->render('front/layout/layout.html');
    }

    /*
	* Exibe o resultado da pesquisa com os dados do cnpj
	* @param $genezzis string
	* @return array com os valores dos campos
	*/
    public function resultadoConsulta($genezzis){

    	$this->genezzis->set('CONSULTA_GRATIS', FALSE);
    	$formata = $this->genezzis->get('SESSION.cnpj');
		$cnpj = preg_replace( '#[^0-9]#', '', $formata ); // Retira pontos e barras do cnpj

		$receita = new ReceitaController();
		$cnpj = $receita->consultaCNPJ( $cnpj );

		$converte = json_encode($cnpj);
		$obj=json_decode($converte);

		// DADOS ECONÔMICOS
		$this->genezzis->set('status', $obj->status);
		$this->genezzis->set('situacao', $obj->situacao);
		$this->genezzis->set('data_abertura', $obj->abertura);

		$this->genezzis->set('tipo', $obj->tipo);
		$this->genezzis->set('razao_social', $obj->nome);
		$this->genezzis->set('natureza_juridica', $obj->natureza_juridica);

		$this->genezzis->set('nome_fantasia', $obj->fantasia);
		$this->genezzis->set('porte', $obj->porte);

		// ATIVIDADE PRIMÁRIA
		$atividade1 = $this->genezzis->set('atividade1', $obj->atividade_principal);
		foreach ($atividade1 as $key) {
			$this->genezzis->set('cnae_principal', $key->code);
			$this->genezzis->set('atividade_principal', $key->text);
		}

		// ATIVIDADE SECUNDÁRIA
		$atividade2 = $this->genezzis->set('atividade2',$obj->atividades_secundarias);
		if(isset($atividade2)){
			foreach ($obj->atividades_secundarias as $key) {
			  $this->genezzis->set('cnae_secundaria', $key->code);
			  $this->genezzis->set('atividade_secundaria', $key->text);
			}
		}

		// ENDEREÇO
		$dados_contato = true;
		$this->genezzis->set('logradouro', $obj->logradouro);
		$this->genezzis->set('numero', $obj->numero);
		$this->genezzis->set('complemento', $obj->complemento);
		$this->genezzis->set('cep', $obj->cep);
		$this->genezzis->set('bairro', $obj->bairro);
		$this->genezzis->set('cidade', $obj->municipio);
		$this->genezzis->set('uf', $obj->uf);

		// CONTATO
		$this->genezzis->set('email', $obj->email);
		$this->genezzis->set('telefone', $obj->telefone);

		// SITUAÇÃO
		$this->genezzis->set('motivo_situacao', $obj->motivo_situacao);
		$this->genezzis->set('data_situacao', $obj->data_situacao);
		$this->genezzis->set('data_situacao_especial', $obj->data_situacao_especial);
		$this->genezzis->set('ultima_atualizacao', $obj->ultima_atualizacao);

		// CAPITAL SOCIAL
		$capital_social = $obj->capital_social;
		$this->genezzis->set('capital_social', number_format($capital_social,2,",","."));

		// QUADRO SOCIETÁRIO
		$qsa = $this->genezzis->set('quadro_societario', $obj->qsa); // ARRAY
		foreach ($qsa as $key) {
            $this->genezzis->set('nome_socio', $key->nome);
            $this->genezzis->set('qualificacao_socio', $key->qual);	
        }

    	$this->genezzis->set('data', date('d/m/Y'));
      	$this->genezzis->set('hora', date('H:i:s'));  	
	$this->genezzis->set('pageTitle', '');
	$this->genezzis->set('view','front/resultado.html');
	echo Template::instance()->render('front/layout/layout.html');
    }

    /*
	* Exibe a página : HOME
	*/
    public function acessoNegado($genezzis){

		$this->genezzis->set('pageTitle', '');
		$this->genezzis->set('view','errors/403.html');
		echo Template::instance()->render('errors/layout.html');
    }
}
