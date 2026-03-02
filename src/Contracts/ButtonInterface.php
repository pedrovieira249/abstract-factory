<?php

namespace User\Abstractfactory\Contracts;

/**
 * Interface ButtonInterface
 *
 * Produto Abstrato: Button.
 * Cada produto de uma família deve ter uma interface base.
 * As variantes do produto devem implementar essa interface.
 */
interface ButtonInterface
{
    /**
     * Renderiza o botão na tela.
     */
    public function render(): string;

    /**
     * Simula o clique no botão.
     */
    public function onClick(): string;
}
