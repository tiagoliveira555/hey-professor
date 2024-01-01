# Hey Professor

[![CI](https://github.com/tiagoliveira555/hey-professor/actions/workflows/laravel.yml/badge.svg?branch=develop)](https://github.com/tiagoliveira555/hey-professor/actions/workflows/laravel.yml)

Projeto desenvolvido durante as aulas da Pinguim Academy.

<img src="https://github.com/tiagoliveira555/hey-professor/blob/developer/public/hey-professor.png" alt="logo">

## ✨ Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- [Laravel](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [MySQL](https://www.mysql.com)

## 💻 Projeto

Um sistema onde podemos criar peguntas para que todos usuários deem like e deslike:

- Publicar um pergunta.
- Deixar uma pergunta como rascunho.
- Filtrar por pergunta.
- Buscar pergunta.

## 🚀 Como executar

- Clone o repositório
- Crie um arquivo `.env`, recomendo usar `.env-example` como base
- Configure seu banco de dados no arquivo `.env`
- Use os comandos: `composer install`, `npm install`, `npm run dev`
- Use o comando: `php artisan migrate:fresh --seed`
- Para rodar a aplicação use o comando `php artisan serve`

A aplicação pode ser acessada em [`http://localhost:8000`](http://localhost:8000).
