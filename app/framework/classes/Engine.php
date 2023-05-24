<?php

namespace app\framework\classes;

use Exception;
use ReflectionClass;

class Engine
{
    private ?string $layout;
    private string $content;
    private array $data;
    private array $dependencies;
    private array $section;
    private string $actionSection;

    public function render(String $view, array $data)
    {
        $view = dirname(__FILE__, 2) . "/resources/views/{$view}.php";
        if (!file_exists($view)) {
            throw new Exception("{$view} nao existe");
        }
        ob_start();

        extract($data);

        require $view;

        $content = ob_get_contents();

        ob_end_clean();

        if (!empty($this->layout)) {
            $this->content = $content;
            $data = array_merge($this->data, $data);
            $layout = $this->layout;
            $this->layout = null;
            return $this->render($layout, $this->data);
        }

        return $content;
    }

    public function dependencies(array $dependencies)
    {
        foreach ($dependencies as $dependency) {
            $className = strtolower((new ReflectionClass($dependency))->getShortName());
            $this->dependencies[$className] = $dependency;
        }
    }

    public function __call(string $name, array $arguments)
    {
        if(!method_exists($this->dependencies['macros'],$name)){
            throw new Exception("Macro {$name} nao existe");
        }
        if(empty($arguments)){
            throw new Exception("Metodo {$name} precisa de 1 paramentro");
        }
        return $this->dependencies['macros']->$name($arguments[0]);
    }

    private function load()
    {
        return !empty($this->content) ? $this->content : '';
    }

    private function extends(string $layout, array $data = [])
    {
        $this->layout = $layout;
        $this->data = $data;

        return $this;
    }

    private function session(string $session)
    {
        return $_SESSION[$session] ?? '';
    }

    private function section(string $name)
    {
        echo $this->section[$name] ?? null;
    }

    private function start(string $name)
    {
        ob_start();
        $this->actionSection = $name;
    }

    private function stop()
    {
        $this->section[$this->actionSection] = ob_get_contents();
        ob_end_clean();
    }

}
