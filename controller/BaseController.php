<?php

namespace controller;

use core\DB;
use core\Request;
use model\CategoryModel;

class BaseController
{
    protected $title;
    protected $content;
    protected $topNav;
    protected $request;

    protected $responseReport = [
        'success' => 'Ваше объявление успешно добавлено! Оно будет опубликовано в течение 12 часов после проверки администратором',
        'error' => 'Возникла ошибка. Повторите запрос заново',
        'deleteSuccess' => 'Ваше объявлени успешно удалено'
    ];

    public function __construct(Request $request)
    {
        $this->title = '';
        $this->content = '';
        $this->request = $request;
    }

    public function render()
    {
        // Получаем список всех категорий
        $db = DB::connect();
        $db->exec("set names utf8");

        $categories = new CategoryModel($db);
        $categories = $categories->getAllCategories();

        $this->topNav = $this->templateBuild(__DIR__ . '/../view/tpl_parts/top-nav.html.php',
            ['categories' => $categories]
        );

        // Рендерим базовый шаблон
        echo $this->templateBuild(__DIR__ . '/../view/main.html.php',
            [
                'title'   => $this->title,
                'topNav'  => $this->topNav,
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