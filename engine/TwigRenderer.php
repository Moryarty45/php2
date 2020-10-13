<?php


namespace app\engine;


use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer implements IRenderer
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../twigTemplates');
        $this->twig = new Environment($loader);
    }

    public function renderTemplate($template, $params = [])
    {
         return $this->twig->render($template.'.twig', $params);
    }
}