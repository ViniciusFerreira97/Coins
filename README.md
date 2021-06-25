## Introdução ao Projeto

Prezados, o projeto foi desenvolvido utilizando PHP(Laravel), uma estruta e arquitetura que permite o crescimento do software de maneira ágil. 

Cada questão foi realizada em sua respectiva controller, seguindo a seguinte ordem:
- ProductController - Funções refrente a busca das demais moedas, realizando uma conuslta em outra API para atualização dos dados em tempo real.
- LocationController - Funções para calculo de localização das lojas próximas ao cliente.

##Instalação

- Instalação de uma vesão do PHP acima da 7.4.
- Instalação do Composer.
- Instalação do Laravel
- Clonar o projeto
- Rodar o comando: composer install
- Rodar o comando: php artisan serve
- Utiizar sua base_url para os teste.

##EndPoints

Para realização dos teste, basta concatenar sua base_url com uma das rotas abaixo:

- GET: api/coins/{price} -> Price é o valor atual do produto a ser consultado.
- POST: api/shop ->Enviando o json. 
 - Ex:  {
	"posicaoCliente": [20, 32],
	"lojas": [[ 40,88 ], [ 18, 56 ], [ 99, 2 ]],
	"plano": [100,100]
}
