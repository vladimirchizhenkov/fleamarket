<?php

namespace controller;

class BaseController
{
    protected $title;
    protected $content;

    public function __construct()
    {
        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        echo $this->templateBuild(__DIR__ . '/../view/v_main.php',
            [
                'title'   => $this->title,
                'content' => $this->content
            ]
        );
    }

    protected function templateBuild(string $template, array $params = [])
    {
        ob_start();
        extract($params);
        include_once $template;

        return ob_get_clean();
    }
}
