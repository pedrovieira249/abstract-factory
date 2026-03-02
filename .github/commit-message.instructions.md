# Convenção de mensagens de commit (pt-BR)

## Obrigatório
Gerar mensagens de commit em **português do Brasil** seguindo **rigorosamente** o padrão **Conventional Commits**.

Formato:
```
<type>(<scope opcional>): <título>

<corpo opcional>
```

## Types permitidos (somente estes)
- feat
- fix
- chore
- refactor
- docs
- test
- style

## Regras do título
- Em pt-BR, no **presente do indicativo** (ex.: adiciona, corrige, ajusta, remove).
- **Curto e direto**, com **no máximo 100 caracteres**.
- Descrever **uma única mudança principal**.
- Evitar detalhes internos irrelevantes (nomes de arquivos, métodos, commits anteriores).
- Escrever em **pt-BR** e no **presente do indicativo** (ex.: “adiciona”, “corrige”, “ajusta”, “remove”).
- Não usar emojis, exclamações ou frases motivacionais.
- Evitar termos vagos: “melhorias”, “ajustes”, “atualizações”, “alterações diversas”.

## Scope (opcional)
- Usar apenas quando ajudar a entender o impacto (ex.: api, auth, gemini, audit, logs, db, s3, queue).
- Não usar nomes de arquivos/métodos como scope.

## Corpo (somente se necessário)
- Use o corpo apenas quando a mudança não ficar clara no título.
- Explicar **o que** mudou e **por quê**, em frases curtas e objetivas.
- Não listar detalhes internos irrelevantes (nomes de arquivos, métodos, commits anteriores).
- Pode citar detalhes técnicos apenas quando forem essenciais para entender a mudança (ex.: motivo do retry, impacto em compatibilidade, mudança de contrato)

## Exemplos (bons)
- feat(gemini): adiciona cliente com timeout e retries
- fix(audit): corrige gravação do correlation id em falhas de integração
- refactor(logs): padroniza campos do log estruturado
- docs: documenta fluxo de autenticação via Sanctum
- test(gemini): adiciona testes para tratamento de 429

## Exemplos (ruins)
- melhorias gerais
- update
- feat: ajustes
- fix: corrigindo bug
- chore: várias alterações
- 🔥 feat: adiciona coisa legal

Exemplo com corpo:
fix(gemini): trata resposta inválida da API sem quebrar o fluxo

Ajusta o parsing para validar campos obrigatórios antes de mapear a resposta.
Evita erro 500 quando o provedor retorna payload incompleto.