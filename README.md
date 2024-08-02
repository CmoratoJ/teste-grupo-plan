# ☄ Proposta do projeto
> Desenvolver uma aplicação web que inclua uma interface de usuário (frontend)
> conectada à uma API REST.

# 💻 Stack Utilizada

- Este projeto utiliza o [framework Laravel](https://laravel.com).
- Como banco de dados, o projeto utiliza o [MySQL](https://www.mysql.com).
<!-- - Para os testes, é utilizado o [PHPUnit](https://phpunit.de). -->
- Para o versionamento, foi utilizado o [Git](https://git-scm.com).
- Para o set-up no ambiente de desenvolvimento, foi utilizado o [Docker](https://www.docker.com).
<!-- - Para o servidor de e-mail, foram utilizadas as Notifications e as Queues do próprio laravel para gerar a fila de envio. -->

# ⚡️ Como Instalar

- Acesse algum diretório de sua preferência e baixe o projeto, usando:
```
git clone https://github.com/CmoratoJ/teste-grupo-plan.git
```
```
git clone https://github.com/CmoratoJ/teste-grupo-plan-front.git
```
- Acesse o diretório teste-grupo-plan:
```
cd teste-grupo-plan/  
```
- Agora que os arquivos foram devidamente baixados para o seu diretório, configure o seu arquivo .env com base no arquivo .env.example:
```
cp .env.example .env
```
- O projeto roda utilizando o docker portanto certifique-se de tê-lo instalado:

- Após o docker devidamente instalado rode o comando para criar o container
```
docker-compose up -d
```
- Após a criação do container é necessário acessá-lo, para isso utilize o comando
```
docker exec -it nginx-grupoplan bash
```
- Rode o comando para gerar a pasta vendor e criar o autoload
```
composer install
```
- Ainda dentro do conteiner crie as tabelas usando as migrations e o seeder para criar o usuário admin:
```
php artisan migrate
```
```
php artisan db:seed --class=PermissionSeeder
```
- Rode o comando abaixo para gerar o jwt secret:
```
php artisan jwt:secret
```
- Após esses passos basta acessar o link :
```
http://localhost:8080/
```
- Para acessar o sistema, basta informar o email a seguir:
```
admin@admin.com
```
- E a senha:
```
admin
```

✅ Pronto! Agora você está pronto para usar o projeto na sua máquina com essas etapas simples.