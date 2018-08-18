# Teste Piloti

## Instalação

* 1 - Clonar o repositório

      git clone https://github.com/fellipebastos/teste-piloti.git

* 2 - Abrir o terminal, ir ao novo diretório criado no passo anterior e instalar o composer:

      composer install

* 3 - Ainda no diretório do projeto, replicar o arquivo .env.example e renomea-lo para .env.


  * 3.1 - Importar o banco enviado por email ou criar um banco de dados com colação: 

        "utf8_general_ci".

  * 3.2 - Configurar o acesso ao banco de dados no arquivo "/.env"

* 4 - No diretório do projeto, gerar nova chave do Laravel, digite no terminal:

      php artisan key:generate

* 5 - Executar migrations:

      php artisan migrate:refresh --seed

  * 5.1 - Será criado um usuário com o login:

        E-mail: admin@teste.com.br
        Senha: admin123

* 6 - Pronto, basta rodar seu servidor e o projeto está pronto para ser testado.

      php artisan serve