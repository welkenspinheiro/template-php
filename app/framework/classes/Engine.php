<?php

namespace app\framework\classes;

use Exception;

class Engine
{
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

        return $content;
    }
}
