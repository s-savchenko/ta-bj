<?php


namespace Kernel\Template;


interface RenderInterface
{
    public function render(string $view, array $params = []) : string;
}
