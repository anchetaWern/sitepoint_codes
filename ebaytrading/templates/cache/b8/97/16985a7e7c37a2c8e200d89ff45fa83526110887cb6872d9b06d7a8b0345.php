<?php

/* product/new.twig */
class __TwigTemplate_b89716985a7e7c37a2c8e200d89ff45fa83526110887cb6872d9b06d7a8b0345 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("content", $context, $blocks);
        echo "
<div class=\"row\">
\t<div class=\"col-md-4\">\t
\t\t<div class=\"alert alert-";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message", array()), "type", array()), "html", null, true);
        echo "\">
\t\t\t";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message", array()), "text", array()), "html", null, true);
        echo "

\t\t\t";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message", array()), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 11
            echo "\t\t\t<li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["r"], 0, array(), "array"), "html", null, true);
            echo "</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t</div>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-6\">
\t\t<form class=\"form-horizontal\" method=\"POST\" action=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/products/create\">
\t\t  <fieldset>
\t\t    <legend>Create new Product</legend>
\t\t    <div class=\"form-group\">
\t\t      <label for=\"title\" class=\"col-lg-2 control-label\">Title</label>
\t\t      <div class=\"col-lg-10\">
\t\t        <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "title", array()), "html", null, true);
        echo "\">
\t\t      </div>
\t\t    </div>
\t\t    <div class=\"form-group\">
\t\t    \t<label for=\"category\" class=\"col-lg-2 control-label\">Category</label>
\t\t    \t<div class=\"col-lg-10\" id=\"categories-container\">
\t\t    \t\t
\t\t    \t</div>
\t\t    </div>
\t\t    <div class=\"form-group\">
\t\t      <label for=\"price\" class=\"col-lg-2 control-label\">Price</label>
\t\t      <div class=\"col-lg-10\">
\t\t        <input type=\"text\" class=\"form-control\" id=\"price\" name=\"price\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "price", array()), "html", null, true);
        echo "\">
\t\t      </div>
\t\t    </div>
\t\t    <div class=\"form-group\">
\t\t      <label for=\"quantity\" class=\"col-lg-2 control-label\">Quantity</label>
\t\t      <div class=\"col-lg-10\">
\t\t        <input type=\"text\" class=\"form-control\" id=\"quantity\" name=\"quantity\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "quantity", array()), "html", null, true);
        echo "\">
\t\t      </div>
\t\t    </div>\t\t  
\t\t    <div class=\"form-group\">
\t\t      <label for=\"brand\" class=\"col-lg-2 control-label\">Brand</label>
\t\t      <div class=\"col-lg-10\">
\t\t        <input type=\"text\" class=\"form-control\" id=\"brand\" name=\"brand\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "brand", array()), "html", null, true);
        echo "\">
\t\t      </div>
\t\t    </div>
\t\t    <div class=\"form-group\">
\t\t      <label for=\"description\" class=\"col-lg-2 control-label\">Description</label>
\t\t      <div class=\"col-lg-10\">
\t\t        <textarea class=\"form-control\" rows=\"3\" id=\"description\" name=\"description\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "description", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "form", array()), "description", array()), "html", null, true);
        echo "</textarea>
\t\t      </div>
\t\t    </div>
\t\t    
\t\t    <div class=\"form-group\">
\t\t      <div class=\"col-lg-10 col-lg-offset-2\">
\t\t        <button type=\"submit\" class=\"btn btn-primary\">Add Product</button>
\t\t      </div>
\t\t    </div>
\t\t  </fieldset>
\t\t</form>
\t</div>

\t<div class=\"col-md-6\">
\t\t<h5>Upload Photos</h5>
\t\t<form action=\"";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/upload\" method=\"POST\" class=\"dropzone\" id=\"photosdropzone\" enctype=\"multipart/form-data\"></form>
\t</div>
</div>


";
        // line 74
        $this->env->loadTemplate("partials/categories.html")->display($context);
    }

    public function getTemplateName()
    {
        return "product/new.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 74,  137 => 69,  117 => 54,  108 => 48,  99 => 42,  90 => 36,  75 => 24,  66 => 18,  59 => 13,  50 => 11,  46 => 10,  41 => 8,  37 => 7,  31 => 4,  28 => 3,);
    }
}
