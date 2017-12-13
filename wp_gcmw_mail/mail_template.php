<?php

class MailTemplate
{
    protected $_file;
    protected $_data=  array();

    public function __construct($file = null)
    {
        $this->_file = $file;
    }

    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function setTemplateData($templateData)
    {
        $this->_data = $templateData;
        return $this;
    }

    public function render()
    {
        write_log("Inside Maildata.render");
        write_log(print_r($this->_data,TRUE));
        write_log("*****************");
        extract($this->_data);
        ob_start();
        include($this->_file);
        return ob_get_clean();
    }
}


?>