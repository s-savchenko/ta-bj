<?php


namespace Kernel\Template;


use Jenssegers\Blade\Blade;

class BladeRender implements RenderInterface
{
    private Blade $engine;

    public function __construct(Blade $engine)
    {
        $this->engine = $engine;
    }

    public function render(string $view, array $params = []): string
    {
        return $this->engine->render($view, $params);
    }
}
