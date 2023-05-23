# Agenda de Tarefas

Este é um projeto de uma aplicação web para gerenciar agendas de tarefas. Permite aos usuários criar, editar, excluir tarefas e gerar relatórios.

## Pré-requisitos

Certifique-se de ter os seguintes requisitos instalados em seu ambiente de desenvolvimento:

- PHP
- MySQL (ou MariaDB)
- Servidor web (por exemplo, Apache)

## Configuração do Banco de Dados

1. Crie um banco de dados MySQL (ou MariaDB) para a aplicação.

2. No arquivo `config.php`, atualize as constantes `DB_HOST`, `DB_NAME`, `DB_USER` e `DB_PASSWORD` com as informações de conexão corretas para o seu banco de dados.

3. Importe o arquivo `database.sql` no seu banco de dados para criar as tabelas necessárias.

## Executando o Projeto

1. Clone este repositório para o seu ambiente de desenvolvimento local.

2. Configure o servidor web para apontar para a pasta raiz do projeto.

3. Inicie o servidor web e certifique-se de que o PHP esteja configurado corretamente.

4. Acesse a aplicação em um navegador web, utilizando a URL correspondente ao servidor web configurado.

5. Na página de login, você pode criar um novo usuário clicando em "Cadastre-se". Preencha as informações solicitadas e crie uma conta de usuário.

6. Faça login com o usuário criado e você será redirecionado para a página inicial, onde poderá visualizar, criar, editar e excluir tarefas.

7. Para gerar um relatório das agendas de tarefas, clique no link "Gerar Relatório" na página inicial. O relatório será baixado automaticamente em formato PDF.

8. Caso esteja usando docker,bastar rodar um docker-compose up -d para ter acesso ao banco.

## Contribuição

Este projeto está aberto a contribuições. Se você encontrar problemas ou tiver sugestões de melhorias, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
