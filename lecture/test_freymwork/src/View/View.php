<?php
    namespace View;
    class View{
        private $templatesPath;
        public function __construct(string $templatesPath){
            $this->templatesPath = $templatesPath;
        }

        public function renderHtml(string $templateName, array $vars = [], int $code = 200):void{
            http_response_code($code);
            $title = "Мой блог";
            extract($vars);
            ob_start();
            include $this->templatesPath . '/' . $templateName;
            $buffer = ob_get_contents();
            ob_end_clean();
            echo $buffer;
        }
    }
?>