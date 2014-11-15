<?php

/* base.twig */
class __TwigTemplate_ba423df494ba733d124e439eda25752441153e9fe47b2484c0d6694649e5dab7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/assets/lib/bootstrap/bootstrap.css\">
</head>
<body>

 \t
    <div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</a>
        </div>
        <div class=\"navbar-collapse collapse\">
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li class=\"active\"><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t<li class=\"dropdown\">
\t\t\t\t  <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Products <span class=\"caret\"></span></a>
\t\t\t\t  <ul class=\"dropdown-menu\" role=\"menu\">
\t\t\t\t    <li><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/products/new\">New</a></li>
\t\t\t\t    <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/products\">List</a></li>
\t\t\t\t  </ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li class=\"dropdown\"><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/token\">Get Token</a></li>
\t\t\t</ul>
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li><a href=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/settings\">Settings</a></li>
\t\t\t</ul>
        </div>
      </div>
    </div>

    <div class=\"container\">
    \t";
        // line 44
        $this->displayBlock('content', $context, $blocks);
        // line 45
        echo "    </div>
\t
\t<script src=\"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/assets/js/jquery.js\"></script>
\t<script src=\"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/assets/lib/bootstrap/bootstrap.js\"></script>
</body>
</html>";
    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 44,  99 => 48,  95 => 47,  91 => 45,  89 => 44,  79 => 37,  73 => 34,  65 => 29,  61 => 28,  54 => 24,  47 => 20,  30 => 6,  26 => 5,  20 => 1,);
    }
}
