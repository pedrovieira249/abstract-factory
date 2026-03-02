<?php

namespace User\Abstractfactory;

use User\Abstractfactory\Contracts\GUIFactoryInterface;
use User\Abstractfactory\Contracts\ButtonInterface;
use User\Abstractfactory\Contracts\CheckboxInterface;

/**
 * Class Application (Cliente)
 *
 * O código cliente trabalha SOMENTE com as interfaces abstratas:
 * GUIFactoryInterface, ButtonInterface e CheckboxInterface.
 *
 * Isso significa que é possível trocar a fábrica concreta a qualquer
 * momento sem quebrar o código existente — basta injetar uma fábrica
 * diferente no construtor.
 *
 * Princípio aplicado: Dependency Inversion (SOLID)
 */
class Application
{
    private ButtonInterface $button;
    private CheckboxInterface $checkbox;

    /**
     * O construtor recebe qualquer fábrica que implemente GUIFactoryInterface.
     * A aplicação não sabe (e não precisa saber) qual tema será usado.
     */
    public function __construct(GUIFactoryInterface $factory)
    {
        // A fábrica cria os componentes corretos para o tema configurado.
        $this->button   = $factory->createButton();
        $this->checkbox = $factory->createCheckbox();
    }

    /**
     * Simula a renderização da interface.
     */
    public function renderUI(): void
    {
        echo "=== Renderizando Interface ===" . PHP_EOL;
        echo $this->button->render()   . PHP_EOL;
        echo $this->checkbox->render() . PHP_EOL;
    }

    /**
     * Simula interações do usuário com os componentes.
     */
    public function simulateInteractions(): void
    {
        echo PHP_EOL . "=== Simulando Interações ===" . PHP_EOL;
        echo $this->button->onClick()   . PHP_EOL;
        echo $this->checkbox->toggle()  . PHP_EOL;
        echo $this->checkbox->render()  . PHP_EOL; // Exibe estado atualizado
    }
}
