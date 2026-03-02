<?php

/**
 * ============================================================
 *  Design Pattern: Abstract Factory
 * ============================================================
 *
 *  INTENÇÃO:
 *  Fornecer uma interface para criação de famílias de objetos
 *  relacionados ou dependentes sem especificar suas classes
 *  concretas.
 *
 *  QUANDO USAR:
 *  - Quando o sistema precisa ser independente de como seus
 *    produtos são criados, compostos e representados.
 *  - Quando o sistema precisa trabalhar com múltiplas famílias
 *    de produtos.
 *  - Quando você quer garantir que produtos de uma mesma família
 *    sejam usados juntos.
 *
 *  PARTICIPANTES:
 *  - Abstract Factory : GUIFactoryInterface
 *  - Concrete Factory : LightFactory, DarkFactory
 *  - Abstract Product : ButtonInterface, CheckboxInterface
 *  - Concrete Product : LightButton, LightCheckbox, DarkButton, DarkCheckbox
 *  - Client           : Application
 * ============================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use User\Abstractfactory\Application;
use User\Abstractfactory\LightTheme\LightFactory;
use User\Abstractfactory\DarkTheme\DarkFactory;

// Carrega as variáveis definidas no arquivo .env para o $_ENV e getenv()
Dotenv::createImmutable(__DIR__)->load();

// ----------------------------------------------------------------
// Configuração do tema (lido do arquivo .env na raiz do projeto)
// ----------------------------------------------------------------
$theme = $_ENV['APP_THEME'] ?? 'light'; // padrão: light
// ----------------------------------------------------------------
// A única decisão condicional fica aqui, no ponto de entrada.
// O restante do código (Application) nunca precisa mudar.
// ----------------------------------------------------------------
$factory = match ($theme) {
    'dark'  => new DarkFactory(),
    'light' => new LightFactory(),
    default => new LightFactory(),
};

// ----------------------------------------------------------------
// O cliente (Application) recebe a fábrica via injeção de
// dependência e desconhece completamente qual tema está ativo.
// ----------------------------------------------------------------
$app = new Application($factory);

echo PHP_EOL;
echo "Tema ativo: " . strtoupper($theme) . PHP_EOL;
echo str_repeat('-', 55) . PHP_EOL;

$app->renderUI();
$app->simulateInteractions();

echo PHP_EOL;
echo str_repeat('=', 55) . PHP_EOL;
echo "Trocando o tema para DARK (sem alterar Application)..." . PHP_EOL;
echo str_repeat('=', 55) . PHP_EOL . PHP_EOL;

// Basta trocar a fábrica — Application não muda nenhuma linha!
$darkApp = new Application(new DarkFactory());
$darkApp->renderUI();
$darkApp->simulateInteractions();

echo PHP_EOL;
