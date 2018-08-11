<?php

   /*
    * Template Class
    * Creating a template View Object
    */

   // protected - accessible in the class that defines them 
   // and in other classes which inherit from that class. Things
   // that are private are only visible within the class itself. 
   //Things that are protected are visible in the class itself and in subclasses.
    
   class Template{
    
        //Path to Template
        protected $template;
        
        //Variables passed in

        protected $vars=array();

        //   Class Constructor
        
        public function __construct($template){
            $this->template=$template;
        }

        //  Get Template Variables
        
        public function __get($key){
            return $this->vars=[$key];
        }

        //Set Template Variables
        
        public function __set($key,$value){
            return $this->template[$key]=$value;
        }

        // Convert Object To String So that we can Echo in Template

        public function __toString(){

            extract($this->vars);
            chdir(dirname($this->template));
            ob_start();

            include($this->template);
            return ob_get_clean();
        }

    }
?>