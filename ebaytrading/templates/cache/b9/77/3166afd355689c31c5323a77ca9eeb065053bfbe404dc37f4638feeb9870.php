<?php

/* /base.twig */
class __TwigTemplate_b9773166afd355689c31c5323a77ca9eeb065053bfbe404dc37f4638feeb9870 extends Twig_Template
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
\t";
        // line 7
        if ((isset($context["is_productpage"]) ? $context["is_productpage"] : null)) {
            // line 8
            echo "\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
            echo "/assets/lib/dropzone/dropzone.css\">
\t";
        }
        // line 10
        echo "</head>
<body>
\t
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
        // line 23
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</a>
        </div>
        <div class=\"navbar-collapse collapse\">
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li class=\"active\"><a href=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t<li class=\"dropdown\">
\t\t\t\t  <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Products <span class=\"caret\"></span></a>
\t\t\t\t  <ul class=\"dropdown-menu\" role=\"menu\">
\t\t\t\t    <li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/products/new\">New</a></li>
\t\t\t\t    <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/products\">List</a></li>
\t\t\t\t  </ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li class=\"dropdown\"><a href=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/token\">Get Token</a></li>
\t\t\t</ul>
\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t<li><a href=\"";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/settings\">Settings</a></li>
\t\t\t</ul>
        </div>
      </div>
    </div>

    <div class=\"container\">
    \t";
        // line 47
        $this->displayBlock('content', $context, $blocks);
        // line 48
        echo "    </div>
\t
\t<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/assets/js/jquery.js\"></script>
\t<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/assets/lib/bootstrap/bootstrap.js\"></script>
\t";
        // line 52
        if ((isset($context["is_productpage"]) ? $context["is_productpage"] : null)) {
            // line 53
            echo "\t<script src=\"";
            echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
            echo "/assets/js/handlebars.js\"></script>
\t<script src=\"";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
            echo "/assets/lib/dropzone/dropzone.js\"></script>
\t<script src=\"";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
            echo "/assets/js/dropzone-options.js\"></script>
\t<script src=\"";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
            echo "/assets/js/new-product.js\"></script>
\t";
        }
        // line 58
        echo "
</body>
</html>";
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 47,  133 => 58,  128 => 56,  124 => 55,  120 => 54,  115 => 53,  113 => 52,  109 => 51,  105 => 50,  101 => 48,  99 => 47,  89 => 40,  83 => 37,  75 => 32,  71 => 31,  64 => 27,  57 => 23,  42 => 10,  36 => 8,  34 => 7,  30 => 6,  26 => 5,  20 => 1,);
    }
}
