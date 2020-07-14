<?php

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );

if(isset($_SERVER['HTTP_REFERER'])){
	$referencia =  $_SERVER['HTTP_REFERER'];
	$explodir = explode("@", $referencia);
	$userName = $explodir[1];
	$cvUserName = '@'.$userName;
} else {
	echo 'nada';
	header('Location: ./');
	//$explodir = explode(",", $genezzis->get('LANGUAGE'));
	//$idiomaPadrao = $explodir[0];
}

require('fpdf/alphapdf.php');

// --------- Variáveis do Formulário ----- //
//$email    = $_POST['email'];
//$nome     = $_POST['nome'];
//$cpf      = $_POST['cpf'];

// --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
$cvNome = 'Cristiano';
$cvSobrenome = 'Ramos';
$cvOcupacao = 'Full Stack Developer';
$cvIdade = '39';
$cvCidade = 'Porto Alegre';
$cvUF = 'RS';
//$cvUserName = '@CristianoRamos';
$cvTelefoneFixo = '(51) 4063 - 8626';
$cvTelefoneCel = '(51) 98052 - 0726';
$cvEmail = 'csramos@meu.curriculocriativo.com';
$urlCCV = 'https://meu.curriculocriativo.com/'.$cvUserName;
$imagem = 'foto.jpg';
$urlCCV_FileImage = 'http://localhost/meu.curriculocriativo.com/uploads/'.$cvUserName.'/'.$imagem;
$cvFilhosMenores = 1;
$qtdFilhosMenores = ( $cvFilhosMenores >= 1 ) ? ($cvFilhosMenores .' filho') : ($cvFilhosMenores .' filhos');
$cvGenero = 1; // 1 = Masculino - 2 = Feminino
$cvEstadoCivil = 'Casado';
$cvIdiomas = 'Português - Nativo';
$cvFerramentas = 'CorelDraw , PHP , HTML5';
$cvBiografia = "Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat.
\nPraesent lacinia ultrices consectetur. Sed non ipsum felis. 
\nQuem manda na minha terra sou euzis! Copo furadis é disculpa de bebadis,
\narcu quam euismod magna. Mé faiz elementum girarzis,
\nnisi eros vermeio. Per aumento de cachacis, eu reclamis.
\nTá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. ";
$cvFormacaoAcademica = "UNIVERSIDADE PAULISTA - UNIP - PÓLO INDEPENDÊNCIA - PORTO ALEGRE / RS
\nTecnólogo Gestão da Tecnologia da Informação - Início 2018/2 - Previsão 2020/1
\n\n\n";
$cvHistoricoProfissional="02/2019 - Atualmente
\nGenezzis Sistemas - Estagiário em Gestão de Projetos
\nDesenvolvimento de sistemas de informação , desenvolvimento de material gráfico ,
\natendimento ao cliente .
\n\n\n";
$cvCursos="TÉCNICO EM INFORMÁTICA - 1200 HS - Alcides Maya Tecnologia
\nUnidade Dr. Flores - Porto Alegre / RS - Início - 2015/1
\n";
$cvInfoComplementar="Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat.
\nPraesent lacinia ultrices consectetur. Sed non ipsum felis.";
$cvPretensaoSalarial = "100,00";

// Cria uma instância do PDF
$pdf = new AlphaPDF();

// Definições do Arquivo 
$pdf->SetTitle( 'Curriculo Criativo de '.$cvNome .' '. $cvSobrenome , true);
$pdf->SetAuthor('Genezzis Sistemas - www.genezzis.com',true);
$pdf->SetCreator('Curriculo Criativo ',true);
$pdf->SetSubject('Curriculo Criativo de '.$cvNome .' '. $cvSobrenome , true);
$pdf->SetKeywords('currículo,curriculum,cv,resume,perfil profissional,histórico profissional,resumo profissional',true);
$pdf->SetDisplayMode('fullpage', 'single');

// Orientação Landing Page ///
$pdf->AddPage('P');

$pdf->SetLineWidth(1.5);

// desenha a imagem do certificado
$pdf->Image('background-Save-as-PDF.jpg',0,0,211);

// opacidade total
$pdf->SetAlpha(1);

/*
* Nome do Usuário - Título da Página
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 26);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(224,235,255);
$pdf->SetXY(80,12);
$pdf->MultiCell(200, 10, utf8_decode($cvNome . ' ' . $cvSobrenome), 0, 'L','');
$pdf->Ln(5);


/*
* Url do Curriculo Criativo
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(224,235,255);
$pdf->SetXY(81,18);
$pdf->MultiCell(200, 10, $urlCCV,  0, 'L', '');
$pdf->Ln(5);


/*
* Telefones Fixo
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*
$pdf->SetFont('Helvetica', '', 8);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(224,235,255);
$pdf->SetXY(81,23);
$pdf->MultiCell(200, 10, $cvTelefoneFixo, 0, 'L', '');
$pdf->Ln(5);


/*
* Celular / Whats
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(81,28);
$pdf->MultiCell(200, 10, 'Telefone : '. $cvTelefoneFixo. ' - Celular / Whats : ' . $cvTelefoneCel, 0, 'L', '');
$pdf->Ln(5);


/*
* Email
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(224,235,255);
$pdf->SetXY(81,33);
$pdf->MultiCell(200, 10, 'Email : ' .$cvEmail, 0, 'L', '');
$pdf->Ln(5);

/*
* Foto
* @param Ln - finaliza o bloco
*/
$pdf->Image($urlCCV_FileImage , 32, 20, '', 36, 'JPG');


/*
* Nome do Usuário - Dados Pessoais
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
//$pdf->SetFont('Helvetica', '', 12);
//$pdf->SetXY(30,52);
//$pdf->MultiCell(200, 10, utf8_decode($cvNome . ' ' . $cvSobrenome), 0, 'L', '');
//$pdf->Ln(5);


/*
* Profissão / Ocupação
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 10);
$pdf->SetXY(28,61);
$pdf->MultiCell(200, 10, utf8_decode($cvOcupacao),  0, 'L', '');
$pdf->Ln(1);

/*
* Idade
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(39,66);
$pdf->MultiCell(200, 10, utf8_decode($cvIdade).' anos',  0, 'L', '');
$pdf->Ln(5);


/*
* Estado Civíl / Nº de Filhos Menores de 14 anos
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 6);
$pdf->SetXY(39,71);
$pdf->MultiCell(200, 10, utf8_decode($cvEstadoCivil . ' - ' . $qtdFilhosMenores),  0, 'L', '');
$pdf->Ln(5);


/*
* Cidade e Estado
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(35,75);
$pdf->MultiCell(200, 10, utf8_decode($cvCidade . ' - ' . $cvUF),  0, 'L', '');
$pdf->Ln(5);


/*
* Pretensão Salarial
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 5);
$pdf->SetXY(37,80);
$pdf->MultiCell(200, 10, utf8_decode('Pretensão Salarial'),  0, 'L', '');
$pdf->Ln(5);


$pdf->SetFont('Helvetica', 'B', 9);
$pdf->SetXY(42,84);
$pdf->MultiCell(200, 10, utf8_decode($cvPretensaoSalarial),  0, 'L', '');
$pdf->Ln(5);


$pdf->SetFont('Helvetica', '', 5);
$pdf->SetXY(55,84);
$pdf->MultiCell(200, 10, utf8_decode('P/ Hora'),  0, 'L', '');
$pdf->Ln(5);


/*
* Idiomas
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(27,65);
//Fields Name position
$Y_Fields_Name_position = 27;
//Table position, under Fields Name
$Y_Table_Position = 100;
$number_of_products='6';
$i = 0;
$pdf->SetY($Y_Table_Position);
for($i=0; $i < $number_of_products; $i++)
{
	$pdf->SetX(27);
	$pdf->MultiCell(110, 4, utf8_decode($cvIdiomas),  0, 'L', '');
	//$i = $i +1;
}
$pdf->Ln(5);


/*
* Ferramentas
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(37,138);
//Fields Name position
$Y_Fields_Name_position = 27;
//Table position, under Fields Name
$Y_Table_Position = 152;
$number_of_products='10';
$i = 0;
$pdf->SetY($Y_Table_Position);
for($i=0; $i < $number_of_products; $i++)
{
	$pdf->SetX(27);
	$pdf->MultiCell(138, 4, utf8_decode($cvFerramentas),  0, 'L', '');
	//$i = $i +1;
}
$pdf->Ln(5);


/*
* Biografia
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(90,60);
$pdf->MultiCell(200, 2, utf8_decode($cvBiografia),  0, 'L', '');
$pdf->Ln(5);


/*
* Formação Acadêmica
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(90,65);
//Fields Name position
$Y_Fields_Name_position = 27;
//Table position, under Fields Name
$Y_Table_Position = 100;
$number_of_products='4';
$i = 0;
$pdf->SetY($Y_Table_Position);
for($i=0; $i < $number_of_products; $i++)
{
	$pdf->SetX(90);
	$pdf->MultiCell(200, 2, utf8_decode($cvFormacaoAcademica),  0, 'L', '');
	//$i = $i +1;
}
$pdf->Ln(5);


/*
* Histórico Profissional
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(90,120);
//Fields Name position
$Y_Fields_Name_position = 27;
//Table position, under Fields Name
$Y_Table_Position = 152;
$number_of_products='3';
$i = 0;
$pdf->SetY($Y_Table_Position);
for($i=0; $i < $number_of_products; $i++)
{
	$pdf->SetX(90);
	$pdf->MultiCell(200, 2, utf8_decode($cvHistoricoProfissional),  0, 'L', '');
	//$i = $i +1;
}
$pdf->Ln(5);



/*
* Cursos e Certificações
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(90,218);
//Fields Name position
$Y_Fields_Name_position = 27;
//Table position, under Fields Name
$Y_Table_Position = 228;
$number_of_products='3';
$i = 0;
$pdf->SetY($Y_Table_Position);
for($i=0; $i < $number_of_products; $i++)
{
	$pdf->SetX(90);
	$pdf->MultiCell(200, 2, utf8_decode($cvCursos),  0, 'L', '');
	//$i = $i +1;
}
$pdf->Ln(5);


/*
* Informação Complementar
* @param SetFont - Fonte e tamanho
* @param SetTextColor - Cor do texto
* @param SetFillColor - Cor de Fundo da Célula
* @param SetXY - Ajusta a posição X e Y do Texto
* @param MultiCell - Tamanho width e height e posição do texto
* @param Ln - finaliza o bloco
*/
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetXY(90,265);
$pdf->MultiCell(200, 2, utf8_decode($cvInfoComplementar),  0, 'L', '');
$pdf->Ln(5);


$pdfdoc = $pdf->Output('', 'S');

// ******** Agora vai enviar o e-mail pro usuário contendo o anexo
// ******** e também mostrar na tela para caso o e-mail não chegar

//$subject = 'Seu Certificado do Workshop';
//$messageBody = "Olá $nome<br><br>É com grande prazer que entregamos o seu certificado.<br>Ele está em anexo nesse e-mail.<br><br>Atenciosamente,<br>Lincoln Borges<br><a href='http://www.lnborges.com.br'>http://www.lnborges.com.br</a>";

//$mail = new PHPMailer();
//$mail->SetFrom("certificado@lnborges.com.br", "Certificado");
//$mail->Subject    = $subject;
//$mail->MsgHTML(utf8_decode($messageBody));	
//$mail->AddAddress($email); 
//$mail->addStringAttachment($pdfdoc, 'certificado.pdf');
//$mail->Send();

$certificado="../uploads/$cvUserName/$cvUserName.pdf"; //atribui a variável $certificado com o caminho e o nome do arquivo que será salvo (vai usar o CPF digitado pelo usuário como nome de arquivo)
$pdf->Output($certificado,'F'); //Salva o certificado no servidor (verifique se a pasta "arquivos" tem a permissão necessária)
// Utilizando esse script provavelmente o certificado ficara salvo em www.seusite.com.br/gerar_certificado/arquivos/999.999.999-99.pdf (o 999 representa o CPF digitado pelo usuário)

$pdf->Output('',''); // Mostrar o certificado na tela do navegador

?>