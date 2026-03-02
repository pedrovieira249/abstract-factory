<?php

namespace User\Abstractfactory\DarkTheme;

use User\Abstractfactory\Contracts\GUIFactoryInterface;
use User\Abstractfactory\Contracts\ButtonInterface;
use User\Abstractfactory\Contracts\CheckboxInterface;

/**
 * Fábrica Concreta: DarkFactory
 *
 * Implementa a Abstract Factory para criar componentes do Dark Theme.
 * Cada método de criação retorna um produto concreto da família Dark.
 * Basta trocar a fábrica injetada no cliente para mudar todo o tema.
 * da aplicação sem alterar nenhuma linha de código do cliente.
 */
class DarkFactory implements GUIFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new DarkButton();
    }

    public function createCheckbox(): CheckboxInterface
    {
        return new DarkCheckbox();
    }
}
