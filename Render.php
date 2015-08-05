<?php

class Render
{
    private $_templateEngine = null;

    private $_templates = [];

    public function __construct($engine)
    {
        $this->_templateEngine = $engine;
    }

    public function loadTemplate($templateName)
    {
        $this->_templates[$templateName] = file_get_contents('templates/' . $templateName . '.html');
    }

    public function render($templateName, $data)
    {
        if (!isset($this->templates[$templateName])) {
            $this->loadTemplate($templateName);
        }

        return $this->_templateEngine->render($this->_templates[$templateName], $data);
    }

    public function renderAllJsTemplates()
    {
        $html = '';
        foreach ($this->_templates as $name => $data) {
            $html .= '<script type="text/template" template-id="' . $name .  '">' . $data . '</script>';
        }

        return $html;
    }
}