

O Problema:
Será necessário criar uma API REST com as seguintes funcionalidades
- CRUD de usuários
- Login
- Recuperação de senha


Requisitos:
- API deve ser feita em PHP, mas a camada de comunicação vai ser o GraphQL, que deve ser feito em Node.
- API deve ser Stateless
- Deve utilizar a última versão do framework Symfony (5.1).
- As informações do usuário devem persistir no MySql.
- Informações de autenticação (token) do usuário deve persistir em um MongoDB e utilizar o Redis como cache.
- Será avaliada a utilização do Doctrine.
- A recuperação de senha pode ser integrada com SendGrid ou utilizar a função mail do PHP.
- O envio de email ao recuperar a senha deverá utilizar RabbitMQ como serviço de mensageria.
- Não é necessário invalidar o token ao recuperar senha, a idéia dessa parte é apenas validar seus conhecimentos com RabbitMQ

Critérios de aceite:
- O Projeto deverá ser entregue em um repositório do GitHub.
- O Readme com a instalação do projeto deve ser explicativo.
- Deve ser utilizado TDD na construção da solução com uma cobertura mínima de 80% do código (Framework não é contado).
- Será avaliada boas práticas de desenvolvimento como SOLID e Design Patterns.  













	