<?php

/* partials/categories.html */
class __TwigTemplate_f99a9ef6e1c3872ab386093cbed68def923c5c90dc2801fb56e1dd29b1275250 extends Twig_Template
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
        // line 12
        echo "
<script id=\"categories-template\" type=\"text/x-handlebars-template\">
{{#each categories}}
<div class=\"radio\">
  <label>
    <input type=\"radio\" name=\"category_id\" id=\"category_id\" value=\"{{id}}\">
    {{name}}
  </label>
</div>
{{/each}}
</script>
";
    }

    public function getTemplateName()
    {
        return "partials/categories.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 12,);
    }
}
