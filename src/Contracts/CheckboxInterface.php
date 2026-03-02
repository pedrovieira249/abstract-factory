<?php

namespace User\Abstractfactory\Contracts;

/**
 * Interface CheckboxInterface
 *
 * Produto Abstrato: Checkbox.
 * Aqui está outro produto abstrato. Todos os produtos podem interagir
 * entre si, mas a interação correta só é possível entre produtos da
 * mesma família concreta.
 */
interface CheckboxInterface
{
    /**
     * Renderiza o checkbox na tela.
     */
    public function render(): string;

    /**
     * Simula a marcação/desmarcação do checkbox.
     */
    public function toggle(): string;
}
