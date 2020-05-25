<?php
    namespace controller;

class Error404Controller extends BaseController
{
    public function indexAction() {
        $this->title = 'Страница не найдена';
        $this->content = $this->templateBuild(__DIR__ . '/../view/404.html.php', []);

        header("HTTP/1.1 404 Not Found");
    }
}