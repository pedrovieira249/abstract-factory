<?php

namespace User\Abstractfactory\LightTheme;

use User\Abstractfactory\Contracts\ButtonInterface;

/**
 * Produto Concreto: LightButton
 *
 * Implementa o produto Button para a família Light Theme.
 * Cor de fundo clara, texto escuro.
 */
class LightButton implements ButtonInterface
{
    private string $label;

    public function __construct(string $label = 'Confirmar')
    {
        $this->label = $label;
    }

    public function render(): string
    {
        return "[Light Theme] Botão renderizado: [ {$this->label} ] "
            . "(fundo: #FFFFFF | texto: #333333)";
    }

    public function onClick(): string
    {
        return "[Light Theme] Botão '{$this->label}' clicado! "
            . "Ação executada com estilo Light.";
    }
}
