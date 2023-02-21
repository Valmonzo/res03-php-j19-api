<?php

abstract class AbstractController
{
    protected function renderPartial(string $template, array $values)
    {
        $data = $values;

        require "templates/".$template.".phtml";
    }

    protected function render(array $values)
    {
        echo json_encode($values);
    }
}