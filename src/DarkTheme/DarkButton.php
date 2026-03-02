<?php

namespace User\Abstractfactory\DarkTheme;

use User\Abstractfactory\Contracts\ButtonInterface;

/**
 * Produto Concreto: DarkButton
 *
 * Implementa o produto Button para a família Dark Theme.
 * Cor de fundo escura, texto claro.
 */
class DarkButton implements ButtonInterface
{
    private string $label;

    public function __construct(string $label = 'Confirmar')
    {
        $this->label = $label;
    }

    public function render(): string
    {
        return "[Dark Theme] Botão renderizado: [ {$this->label} ] "
            . "(fundo: #1E1E1E | texto: #F0F0F0)";
    }

    public function onClick(): string
    {
        return "[Dark Theme] Botão '{$this->label}' clicado! "
            . "Ação executada com estilo Dark.";
    }
}
