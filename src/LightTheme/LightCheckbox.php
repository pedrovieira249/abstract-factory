<?php

namespace User\Abstractfactory\LightTheme;

use User\Abstractfactory\Contracts\CheckboxInterface;

/**
 * Produto Concreto: LightCheckbox
 *
 * Implementa o produto Checkbox para a família Light Theme.
 * Borda cinza clara, checkmark azul.
 */
class LightCheckbox implements CheckboxInterface
{
    private string $label;
    private bool $checked;

    public function __construct(string $label = 'Aceito os termos', bool $checked = false)
    {
        $this->label  = $label;
        $this->checked = $checked;
    }

    public function render(): string
    {
        $state = $this->checked ? '[X]' : '[ ]';

        return "[Light Theme] Checkbox renderizado: {$state} {$this->label} "
            . "(borda: #CCCCCC | checkmark: #1A73E8)";
    }

    public function toggle(): string
    {
        $this->checked = !$this->checked;
        $state = $this->checked ? 'MARCADO' : 'DESMARCADO';

        return "[Light Theme] Checkbox '{$this->label}' agora está {$state}.";
    }
}
