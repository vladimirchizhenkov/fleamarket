<?php
namespace core;

abstract class Helper
{
    public function getTemplateParts($template) {
        include_once '../tpl_parts/' . $template;
    }
}

include_once 'tpl_parts/modal.html.php' ?>
