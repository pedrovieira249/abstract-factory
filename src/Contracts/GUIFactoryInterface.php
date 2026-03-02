<?php

namespace User\Abstractfactory\Contracts;

/**
 * Interface GUIFactoryInterface
 *
 * A Abstract Factory declara um conjunto de métodos que retornam
 * diferentes produtos abstratos. Esses produtos formam uma "família"
 * e são relacionados por um tema ou conceito de alto nível.
 * Produtos de uma mesma família geralmente conseguem colaborar entre si.
 */
interface GUIFactoryInterface
{
    public function createButton(): ButtonInterface;

    public function createCheckbox(): CheckboxInterface;
}
