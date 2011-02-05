<?php

/**
* Template class to pre-populate the settings file from user input
*/
class Template
{
    public $filename = 'settings.tpl';
    private $tokens = array();
    private $file_as_string = '';
    
    function __construct($file_name_in)
    {
        $this->filename = $file_name_in;
    }
    
    function assign_tokens($tokens_in)
    {
        $this->tokens = array(); // empty the array
        $this->tokens = $this->tokens + $tokens_in;
    }
    
    function load_fetch()
    {
        if($this->filename)
        {
            extract($this->tokens,EXTR_SKIP);
            ob_start();            
            include ($this->filename);
            $this->file_as_string = ob_get_contents();
            ob_end_clean();
            return $this->file_as_string;
        }
    }
}
?>