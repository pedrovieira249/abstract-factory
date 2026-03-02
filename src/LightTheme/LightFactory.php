<?php

namespace User\Abstractfactory\LightTheme;

use User\Abstractfactory\Contracts\GUIFactoryInterface;
use User\Abstractfactory\Contracts\ButtonInterface;
use User\Abstractfactory\Contracts\CheckboxInterface;

/**
 * Fábrica Concreta: LightFactory
 *
 * Implementa a Abstract Factory para criar componentes do Light Theme.
 * Cada método de criação retorna um produto concreto da família Light.
 * O cliente nunca sabe qual produto concreto está recebendo — ele
 * trabalha apenas com as interfaces abstratas.
 */
class LightFactory implements GUIFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new LightButton();
    }

    public function createCheckbox(): CheckboxInterface
    {
        return new LightCheckbox();
    }
}
