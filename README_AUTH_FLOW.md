# Sistema de Cadastro — Fluxo de 5 Páginas

Páginas:
1. **/register** — Cadastro com nome, e-mail, senha.
2. **/login** — Login com e-mail e senha, com link "Esqueceu a senha?".
3. **/forgot** — Redireciona para **/edit** (pedido do usuário).
4. **/edit** — Edita **nome**, **e-mail** (chave) e **senha** (opcionais, atualiza pelo e-mail informado).
5. **/logged** — Tela final "Logado" estilosa.

## Como usar
- Requisitos Laravel comuns (PHP, Composer, banco configurado no `.env`).
- Rodar migrações (`php artisan migrate`).
- Acesse `/register` para criar o primeiro usuário.
- Após login, você será enviado para `/logged`.
- O botão "Esqueceu a senha?" no login leva para `/edit`.

> Observação: a tela **/edit** permite atualizar dados localizando o usuário pelo e-mail cadastrado (sem envio de e-mail de recuperação).
