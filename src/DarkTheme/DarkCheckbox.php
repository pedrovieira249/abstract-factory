<?php

namespace User\Abstractfactory\DarkTheme;

use User\Abstractfactory\Contracts\CheckboxInterface;

/**
 * Produto Concreto: DarkCheckbox
 *
 * Implementa o produto Checkbox para a família Dark Theme.
 * Borda cinza escura, checkmark verde neon.
 */
class DarkCheckbox implements CheckboxInterface
{
    private string $label;
    private bool $checked;

    public function __construct(string $label = 'Aceito os termos', bool $checked = false)
    {
        $this->label   = $label;
        $this->checked = $checked;
    }

    public function render(): string
    {
        $state = $this->checked ? '[X]' : '[ ]';

        return "[Dark Theme] Checkbox renderizado: {$state} {$this->label} "
            . "(borda: #444444 | checkmark: #00FF88)";
    }

    public function toggle(): string
    {
        $this->checked = !$this->checked;
        $state = $this->checked ? 'MARCADO' : 'DESMARCADO';

        return "[Dark Theme] Checkbox '{$this->label}' agora está {$state}.";
    }
}
