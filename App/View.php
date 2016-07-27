<?php

namespace App;

use App\Traits\DinamicProperties;

class View 
{
    use DinamicProperties;

    public function display($template)
    {
        include $template;
    }

    public function render($template)
    {
        ob_start();
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}