[![Anurag's github stats](https://github-readme-stats.vercel.app/api?username=csr4mos)](https://github.com/anuraghazra/github-readme-stats)
# CNPJ - Consulta Situação Cadastral
>  Realiza uma consulta da situação cadastral de um CNPJ na RFB, usando a API [Receita WS]( https://receitaws.com.br/api ).

> Este módulo realiza as seguintes operações :

> * Realiza validações do CNPJ com retorno em ajax 

> * Exibe somente dados de pessoa jurídica ATIVA ;

> * Situação Cadastral com retorno simples ou completo ;

> * A **consulta simples**, informa os dados econômicos básicos como : <br> - Situação Cadastral;<br>- Data de Abertura; <br>- Razão Social e <br>- Nome Fantasia;

> * A **consulta completa**, além dos dados econômicos básicos, inclui : <br> - Tipo (Matriz / Filial);<br>- Natureza Jurídica; <br>- Código CNAE e Atividades Econômicas Primária e Secundária <br>- Localização<br>- Contatos<br>- Capital Social e<br>- Quadro Societário;

## Pré requisitos

* PHP Version >=7.2.10
* libcurl
* composer

## Instalação

Instale pelo composer

```
$ composer require csr4mos/cnpj-consulta-situacao-cadastral
```

> * Para uso em **servidor local** - baixe o arquivo, descompacte e envie ou mova o conteúdo da pasta para o XAMPP, MAMP, LAMP ou WAMP, e acesse-o pelo seu navegador favorito .

> * Para uso em **servidor online** - baixe o arquivo, envie-o para o seu servidor e descompacte-o em uma pasta ou subdomínio e acesse-o pelo seu navegador favorito .

## Licença

> GPL v3 [ GNU Public License ](http://www.gnu.org/licenses/gpl-3.0.html)
