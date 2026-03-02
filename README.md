# Design Pattern: Abstract Factory

## O que é?

O **Abstract Factory** é um padrão de projeto criacional que fornece uma interface para criar **famílias de objetos relacionados** sem especificar suas classes concretas.

Em vez de instanciar objetos diretamente com `new`, o cliente solicita os objetos a uma **fábrica**, que decide qual classe concreta criar. Isso permite trocar famílias inteiras de objetos apenas substituindo a fábrica — sem alterar nenhuma linha do código cliente.

---

## Problema que resolve

Imagine que sua aplicação precisa suportar múltiplos temas de interface (Light e Dark). Cada tema possui seus próprios componentes: `Button`, `Checkbox`, etc. Sem o padrão, o código cliente ficaria cheio de condicionais como:

```php
if ($theme === 'dark') {
    $button = new DarkButton();
} else {
    $button = new LightButton();
}
```

Com o Abstract Factory, essa lógica fica **centralizada em um único ponto**, e o cliente jamais precisa conhecer as classes concretas.

---

## Exemplo implementado

O exemplo modela uma **fábrica de componentes de UI** com dois temas:

- **Light Theme** → fundo claro, texto escuro
- **Dark Theme** → fundo escuro, texto claro

Cada tema produz dois componentes: `Button` e `Checkbox`.

---

## Estrutura do projeto

```
Abstract Factory/
├── index.php                        # Ponto de entrada (demonstração)
├── composer.json
└── src/
    ├── Application.php              # Cliente — usa somente interfaces
    ├── Contracts/
    │   ├── GUIFactoryInterface.php  # Abstract Factory
    │   ├── ButtonInterface.php      # Produto Abstrato: Button
    │   └── CheckboxInterface.php    # Produto Abstrato: Checkbox
    ├── LightTheme/
    │   ├── LightFactory.php         # Fábrica Concreta — Light
    │   ├── LightButton.php          # Produto Concreto — Light Button
    │   └── LightCheckbox.php        # Produto Concreto — Light Checkbox
    └── DarkTheme/
        ├── DarkFactory.php          # Fábrica Concreta — Dark
        ├── DarkButton.php           # Produto Concreto — Dark Button
        └── DarkCheckbox.php         # Produto Concreto — Dark Checkbox
```

---

## Participantes do padrão

| Papel | Classe / Interface |
|---|---|
| **Abstract Factory** | `GUIFactoryInterface` |
| **Concrete Factory** | `LightFactory`, `DarkFactory` |
| **Abstract Product** | `ButtonInterface`, `CheckboxInterface` |
| **Concrete Product** | `LightButton`, `LightCheckbox`, `DarkButton`, `DarkCheckbox` |
| **Client** | `Application` |

---

## Como funciona (fluxo)

```
.env  (APP_THEME=light | dark)
   │
   └── index.php  (carrega o .env via phpdotenv)
            │
            ├── Lê $_ENV['APP_THEME']
            │
            ├── light → new LightFactory()
            └── dark  → new DarkFactory()
                     │
                     └── new Application($factory)
                                  │
                                  ├── $factory->createButton()   → ButtonInterface
                                  └── $factory->createCheckbox() → CheckboxInterface

                     Application usa apenas os métodos das interfaces.
                     Jamais depende de LightButton ou DarkButton diretamente.
```

---

## Diagrama de classes

```
«interface»                     «interface»
GUIFactoryInterface             ButtonInterface
─────────────────               ───────────────
+ createButton()                + render(): string
+ createCheckbox()              + onClick(): string
       ▲
       │ implements
       ├──────────────────┐
       │                  │
LightFactory          DarkFactory            «interface»
─────────────         ───────────            CheckboxInterface
+ createButton()      + createButton()       ─────────────────
+ createCheckbox()    + createCheckbox()     + render(): string
       │                     │               + toggle(): string
       │ creates              │ creates
       ▼                      ▼
LightButton            DarkButton
LightCheckbox          DarkCheckbox
```

---

## Pré-requisitos

- PHP **8.1** ou superior
- [Composer](https://getcomposer.org/)

---

## Instalação

```bash
# Clone ou acesse o diretório do projeto
cd "Abstract Factory"

# Instale as dependências (gera o autoload)
composer install

# Crie o arquivo de ambiente a partir do exemplo
cp .env.example .env
```

Em seguida, abra o `.env` e defina o tema desejado:

```dotenv
APP_THEME=light
```

> Valores aceitos: `light` ou `dark`. Qualquer outro valor usa `light` como padrão.

---

## Como rodar

O tema é controlado pela variável `APP_THEME` no arquivo `.env`. Altere o valor e execute:

```bash
php index.php
```

### Tema Light

**.env:**
```dotenv
APP_THEME=light
```

**Saída esperada:**

```
Tema ativo: LIGHT
-------------------------------------------------------
=== Renderizando Interface ===
[Light Theme] Botão renderizado: [ Confirmar ] (fundo: #FFFFFF | texto: #333333)
[Light Theme] Checkbox renderizado: [ ] Aceito os termos (borda: #CCCCCC | checkmark: #1A73E8)

=== Simulando Interações ===
[Light Theme] Botão 'Confirmar' clicado! Ação executada com estilo Light.
[Light Theme] Checkbox 'Aceito os termos' agora está MARCADO.
[Light Theme] Checkbox renderizado: [X] Aceito os termos (borda: #CCCCCC | checkmark: #1A73E8)
```

### Tema Dark

**.env:**
```dotenv
APP_THEME=dark
```

**Saída esperada:**

```
Tema ativo: DARK
-------------------------------------------------------
=== Renderizando Interface ===
[Dark Theme] Botão renderizado: [ Confirmar ] (fundo: #1E1E1E | texto: #F0F0F0)
[Dark Theme] Checkbox renderizado: [ ] Aceito os termos (borda: #444444 | checkmark: #00FF88)

=== Simulando Interações ===
[Dark Theme] Botão 'Confirmar' clicado! Ação executada com estilo Dark.
[Dark Theme] Checkbox 'Aceito os termos' agora está MARCADO.
[Dark Theme] Checkbox renderizado: [X] Aceito os termos (borda: #444444 | checkmark: #00FF88)
```

---

## Princípios SOLID aplicados

| Princípio | Como foi aplicado |
|---|---|
| **S** — Single Responsibility | Cada classe tem uma única responsabilidade (criar ou representar um componente). |
| **O** — Open/Closed | Para adicionar um novo tema, basta criar novas classes — sem modificar as existentes. |
| **L** — Liskov Substitution | `LightFactory` e `DarkFactory` são intercambiáveis em qualquer lugar que espera `GUIFactoryInterface`. |
| **I** — Interface Segregation | As interfaces `ButtonInterface` e `CheckboxInterface` são pequenas e coesas. |
| **D** — Dependency Inversion | `Application` depende de abstrações (`interfaces`), nunca de classes concretas. |

---

## Adicionando um novo tema

Para criar um terceiro tema (ex: **High Contrast**) sem alterar nenhuma classe existente:

1. Crie a pasta `src/HighContrastTheme/`
2. Crie `HighContrastButton` implementando `ButtonInterface`
3. Crie `HighContrastCheckbox` implementando `CheckboxInterface`
4. Crie `HighContrastFactory` implementando `GUIFactoryInterface`
5. Adicione o case no `match` do `index.php`

Pronto. `Application` **não precisa de nenhuma alteração**.
