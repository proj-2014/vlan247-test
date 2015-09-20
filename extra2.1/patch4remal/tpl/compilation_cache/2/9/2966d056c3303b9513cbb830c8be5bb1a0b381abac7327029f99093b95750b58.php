<?php

/* login.twig */
class __TwigTemplate_2966d056c3303b9513cbb830c8be5bb1a0b381abac7327029f99093b95750b58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<html>
<head>
<title> Hello ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "! </title>
<script type=\"text/javascript\"  src=\"/extra2.1/common/public/js/jquery-1.9.1.js\"> </script>
<script type=\"text/javascript\"  src=\"/extra2.1/patch4remal/public/4tpl-login.js\"> </script> 
</head>

<body>

<h2> Hello , this is my Login Panel ! </h2>
<div id=\"wrap\">

<h3i id=\"login\"> User Login </h3>
 ";
        // line 15
        if ((isset($context["name"]) ? $context["name"] : null)) {
            // line 16
            echo "   <div id=\"result\">
       <p><strong> ";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo " </strong>, logined successed! </p>
       <p><a href=\"#\" id=\"logout\"> Logout </a></p>
   </div>
 ";
        } else {
            // line 21
            echo "   <div id=\"login_form\">
       <p><label> user name: </label> <input type=\"text\" class=\"input\" name=\"user\" id=\"user\" /></p>
       <p><label> 密码 ： </label> <input type=\"password\" class=\"input\" name=\"pass\"  id=\"pass\" /></p>
       <div class=\"sub\">
           <input type=\"submit\" class=\"btn\" value=\"login\" />
       </div>
   </div>

 ";
        }
        // line 30
        echo "
</div>


</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 30,  50 => 21,  43 => 17,  40 => 16,  38 => 15,  24 => 4,  19 => 1,);
    }
}
