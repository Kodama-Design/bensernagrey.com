<?php
namespace Sapling;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Yaml\Parser;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Sapling
{
    protected $twig;
    protected $parser;

    public function __construct()
    {
        $container = new Container();
        $config_file = file_get_contents(__DIR__.'/../config.yml');
        $this->parser = new Parser();
        $config = $this->parser->parse($config_file);
        $twig_loader = new Twig_Loader_Filesystem($config['twig']['paths']);
        $this->twig = new Twig_Environment($twig_loader, $config['twig']['options']);
    }

    public function getParser()
    {
        return $this->twig;
    }

    public function getTwig()
    {
        return $this->twig;
    }

    public function render($name, array $context = array())
    {
        return $this->twig->render($name, $context);
    }
}