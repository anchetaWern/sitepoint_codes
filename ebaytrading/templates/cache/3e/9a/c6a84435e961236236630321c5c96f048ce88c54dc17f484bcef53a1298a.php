<?php

/* settings/view.twig */
class __TwigTemplate_3e9ac6a84435e961236236630321c5c96f048ce88c54dc17f484bcef53a1298a extends Twig_Template
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("content", $context, $blocks);
        echo "
<div class=\"row\">
\t<div class=\"col-md-4\">\t
\t\t<div class=\"alert alert-";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message"), "type"), "html", null, true);
        echo "\">
\t\t\t";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message"), "text"), "html", null, true);
        echo "

\t\t\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message"), "data"));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 10
            echo "\t\t\t<li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), 0, array(), "array"), "html", null, true);
            echo "</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "\t\t</div>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-6\">
\t\t<form class=\"form-horizontal\" method=\"POST\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : null), "html", null, true);
        echo "/settings/update\">
\t\t  <fieldset>
\t\t    <legend>Update Settings</legend>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"store_name\">Store Name</label>
\t\t      <input type=\"text\" id=\"store_name\" name=\"store_name\" class=\"form-control\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "store_name"), "html", null, true);
        echo "\">
\t\t    </div>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"county\">County</label>
\t\t      <input type=\"text\" id=\"county\" name=\"county\" class=\"form-control\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "county"), "html", null, true);
        echo "\">
\t\t    </div>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"street\">Street</label>
\t\t      <input type=\"text\" id=\"street\" name=\"street\" class=\"form-control\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "street"), "html", null, true);
        echo "\">
\t\t    </div>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"country_code_type\">Country Code Type</label>
\t\t      <input type=\"text\" id=\"country_code_type\" name=\"country_code_type\" class=\"form-control\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "country_code_type"), "html", null, true);
        echo "\">
\t\t    </div>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"ebay_website\">Ebay Website</label>
\t\t      <input type=\"text\" id=\"ebay_website\" name=\"ebay_website\" class=\"form-control\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "ebay_website"), "html", null, true);
        echo "\">
\t\t    </div>

\t\t    <div class=\"form-group\">
\t\t      <label for=\"postal_code\">Postal Code</label>
\t\t      <input type=\"text\" id=\"postal_code\" name=\"postal_code\" class=\"form-control\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "postal_code"), "html", null, true);
        echo "\">
\t\t    </div>\t\t  

\t\t\t<div class=\"form-group\">
\t\t\t";
        // line 52
        $context["category_mapping"] = "";
        // line 53
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "category_mapping") == 1)) {
            // line 54
            echo "\t\t\t";
            $context["category_mapping"] = "checked";
            // line 55
            echo "\t\t\t";
        }
        echo "\t\t\t
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"category_mapping\">
\t\t\t\t    <input type=\"checkbox\" id=\"category_mapping\" name=\"category_mapping\" ";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["category_mapping"]) ? $context["category_mapping"] : null), "html", null, true);
        echo ">
\t\t\t\t    Category Mapping
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>\t\t\t

\t\t\t<div class=\"form-group\">\t
\t\t\t";
        // line 65
        $context["category_prefill"] = "";
        // line 66
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "category_prefill") == 1)) {
            // line 67
            echo "\t\t\t";
            $context["category_prefill"] = "checked";
            // line 68
            echo "\t\t\t";
        }
        echo "\t
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"category_prefill\">
\t\t\t\t    <input type=\"checkbox\" id=\"category_prefill\" name=\"category_prefill\" ";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["category_prefill"]) ? $context["category_prefill"] : null), "html", null, true);
        echo ">
\t\t\t\t    Category Prefill
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t\t
\t\t    <div class=\"form-group\">
\t\t      <label for=\"currency_code\">Currency Code</label>
\t\t      <input type=\"text\" id=\"currency_code\" name=\"currency_code\" class=\"form-control\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "currency_code"), "html", null, true);
        echo "\">
\t\t    </div>\t

\t\t    <div class=\"form-group\">
\t\t      <label for=\"item_location\">Item Location</label>
\t\t      <input type=\"text\" id=\"item_location\" name=\"item_location\" class=\"form-control\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "item_location"), "html", null, true);
        echo "\">
\t\t    </div>\t

\t\t    <div class=\"form-group\">
\t\t      <label for=\"dispatch_time\">Dispatch Time</label>
\t\t      <input type=\"text\" id=\"dispatch_time\" name=\"dispatch_time\" class=\"form-control\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "dispatch_time"), "html", null, true);
        echo "\">
\t\t    </div>\t

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"listing_duration\">Listing Duration</label>
\t\t\t\t<select class=\"form-control\" id=\"listing_duration\" name=\"listing_duration\">
\t\t\t\t";
        // line 95
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listing_durations"]) ? $context["listing_durations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["ld"]) {
            // line 96
            echo "\t\t\t\t\t";
            $context["listing_duration"] = "";
            // line 97
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "listing_duration") == (isset($context["ld"]) ? $context["ld"] : null))) {
                // line 98
                echo "\t\t\t\t\t";
                $context["listing_duration"] = "selected";
                // line 99
                echo "\t\t\t\t\t";
            }
            echo "\t
\t\t\t\t \t<option value=\"";
            // line 100
            echo twig_escape_filter($this->env, (isset($context["ld"]) ? $context["ld"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["listing_duration"]) ? $context["listing_duration"] : null), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["ld"]) ? $context["ld"] : null), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ld'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"listing_type\">Listing Type</label>
\t\t\t\t<select class=\"form-control\" id=\"listing_type\" name=\"listing_type\">
\t\t\t\t";
        // line 108
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listing_types"]) ? $context["listing_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["lt"]) {
            // line 109
            echo "\t\t\t\t\t";
            $context["listing_type"] = "";
            // line 110
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "listing_type") == (isset($context["lt"]) ? $context["lt"] : null))) {
                // line 111
                echo "\t\t\t\t\t";
                $context["listing_type"] = "selected";
                // line 112
                echo "\t\t\t\t\t";
            }
            echo "\t
\t\t\t\t \t<option value=\"";
            // line 113
            echo twig_escape_filter($this->env, (isset($context["lt"]) ? $context["lt"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["listing_type"]) ? $context["listing_type"] : null), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["lt"]) ? $context["lt"] : null), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"condition_type\">Condition Type</label>
\t\t\t\t<select class=\"form-control\" id=\"condition_type\" name=\"condition_type\">
\t\t\t\t";
        // line 121
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["condition_types"]) ? $context["condition_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["ct"]) {
            // line 122
            echo "\t\t\t\t\t";
            $context["condition_type"] = "";
            // line 123
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "condition_type") == $this->getAttribute((isset($context["ct"]) ? $context["ct"] : null), "id", array(), "array"))) {
                // line 124
                echo "\t\t\t\t\t";
                $context["condition_type"] = "selected";
                // line 125
                echo "\t\t\t\t\t";
            }
            echo "\t
\t\t\t\t \t<option value=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ct"]) ? $context["ct"] : null), "id", array(), "array"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["condition_type"]) ? $context["condition_type"] : null), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ct"]) ? $context["ct"] : null), "name", array(), "array"), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ct'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "\t\t\t\t</select>
\t\t\t</div>\t\t\t

\t\t\t<div class=\"form-group\">
\t\t\t\t";
        // line 132
        $context["optimal_picturesize"] = "";
        // line 133
        echo "\t\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "optimal_picturesize") == 1)) {
            // line 134
            echo "\t\t\t\t";
            $context["optimal_picturesize"] = "checked";
            // line 135
            echo "\t\t\t\t";
        }
        echo "\t\t
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"optimal_picturesize\">
\t\t\t\t    <input type=\"checkbox\" id=\"optimal_picturesize\" name=\"optimal_picturesize\" ";
        // line 138
        echo twig_escape_filter($this->env, (isset($context["optimal_picturesize"]) ? $context["optimal_picturesize"] : null), "html", null, true);
        echo ">
\t\t\t\t    Optimal Picture Size
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"form-group\">\t
\t\t\t\t";
        // line 145
        $context["out_of_stock_control"] = "";
        // line 146
        echo "\t\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "out_of_stock_control") == 1)) {
            // line 147
            echo "\t\t\t\t";
            $context["out_of_stock_control"] = "checked";
            // line 148
            echo "\t\t\t\t";
        }
        echo "\t
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"out_of_stock_control\">
\t\t\t\t    <input type=\"checkbox\" id=\"out_of_stock_control\" name=\"out_of_stock_control\" ";
        // line 151
        echo twig_escape_filter($this->env, (isset($context["out_of_stock_control"]) ? $context["out_of_stock_control"] : null), "html", null, true);
        echo ">
\t\t\t\t    Out of stock control
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>


\t\t\t<div class=\"form-group\">\t
\t\t\t\t";
        // line 159
        $context["get_it_fast"] = "";
        // line 160
        echo "\t\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "get_it_fast") == 1)) {
            // line 161
            echo "\t\t\t\t";
            $context["get_it_fast"] = "checked";
            // line 162
            echo "\t\t\t\t";
        }
        echo "\t
\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"get_it_fast\">
\t\t\t\t    <input type=\"checkbox\" id=\"get_it_fast\" name=\"get_it_fast\" ";
        // line 165
        echo twig_escape_filter($this->env, (isset($context["get_it_fast"]) ? $context["get_it_fast"] : null), "html", null, true);
        echo ">
\t\t\t\t    Get it Fast
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"form-group\">\t
\t\t\t\t";
        // line 172
        $context["include_prefilled"] = "";
        // line 173
        echo "\t\t\t\t";
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "include_prefilled") == 1)) {
            // line 174
            echo "\t\t\t\t";
            $context["include_prefilled"] = "checked";
            // line 175
            echo "\t\t\t\t";
        }
        // line 176
        echo "\t\t\t\t<div class=\"checkbox\">
\t\t\t\t  <label for=\"include_prefilled\">
\t\t\t\t    <input type=\"checkbox\" id=\"include_prefilled\" name=\"include_prefilled\" ";
        // line 178
        echo twig_escape_filter($this->env, (isset($context["include_prefilled"]) ? $context["include_prefilled"] : null), "html", null, true);
        echo ">
\t\t\t\t    Include Prefilled Item Now
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t</div>

\t\t   \t<div class=\"form-group\">
\t\t   \t\t<label>Seller Profiles</label>
\t\t\t\t";
        // line 186
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user_preferences"]) ? $context["user_preferences"] : null), "seller_profiles"));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 187
            echo "\t\t\t\t<div class=\"radio\">
\t\t\t\t  <label>
\t\t\t\t  \t";
            // line 189
            $context["key"] = ($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "type", array(), "array") . "_profile");
            // line 190
            echo "\t\t\t\t\t";
            $context["checked"] = "";
            // line 191
            echo "\t\t\t\t\t";
            if ((((($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "type", array(), "array") == "PAYMENT") && ($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "payment_profile") == $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id", array(), "array"))) || (($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "type", array(), "array") == "RETURN_POLICY") && ($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "return_profile") == $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id", array(), "array")))) || (($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "type", array(), "array") == "SHIPPING") && ($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "shipping_profile") == $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id", array(), "array"))))) {
                // line 192
                echo "\t\t\t\t\t";
                $context["checked"] = "checked";
                // line 193
                echo "\t\t\t\t\t";
            }
            echo "\t
\t\t\t\t    <input type=\"radio\" name=\"";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "type", array(), "array"), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id", array(), "array"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id", array(), "array"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["checked"]) ? $context["checked"] : null), "html", null, true);
            echo ">
\t\t\t\t  \t";
            // line 195
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "name", array(), "array"), "html", null, true);
            echo "
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 199
        echo "\t\t   \t</div>
\t\t\t\t
\t\t\t<div class=\"form-group\">
\t\t\t\t<label>Shipping Service</label>
\t\t\t\t";
        // line 203
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["shipping_services"]) ? $context["shipping_services"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 204
            echo "\t\t\t\t<div class=\"radio\">
\t\t\t\t  <label>
\t\t\t\t\t";
            // line 206
            $context["shipping_service"] = "";
            // line 207
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "shipping_service") == (isset($context["r"]) ? $context["r"] : null))) {
                // line 208
                echo "\t\t\t\t\t";
                $context["shipping_service"] = "checked";
                // line 209
                echo "\t\t\t\t\t";
            }
            echo "\t
\t\t\t\t    <input type=\"radio\" name=\"shipping_service\" id=\"";
            // line 210
            echo twig_escape_filter($this->env, (isset($context["r"]) ? $context["r"] : null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["r"]) ? $context["r"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["shipping_service"]) ? $context["shipping_service"] : null), "html", null, true);
            echo ">
\t\t\t\t  \t";
            // line 211
            echo twig_escape_filter($this->env, (isset($context["r"]) ? $context["r"] : null), "html", null, true);
            echo "
\t\t\t\t  </label>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        echo "\t\t\t</div>

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"shippingservice_priority\">Shipping Service Priority</label>
\t\t\t\t<select name=\"shippingservice_priority\" id=\"shippingservice_priority\">
\t                ";
        // line 220
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["shippingservice_priorities"]) ? $context["shippingservice_priorities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["sp"]) {
            // line 221
            echo "\t                ";
            $context["shippingservice_priority"] = "";
            // line 222
            echo "\t                ";
            if (($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "shippingservice_priority") == (isset($context["sp"]) ? $context["sp"] : null))) {
                // line 223
                echo "\t\t\t\t\t";
                $context["shippingservice_priority"] = "selected";
                // line 224
                echo "\t                ";
            }
            // line 225
            echo "\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["sp"]) ? $context["sp"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, (isset($context["shippingservice_priority"]) ? $context["shippingservice_priority"] : null), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["sp"]) ? $context["sp"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 227
        echo "\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"shippingservice_cost\">Shipping Service Cost</label>
\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"shippingservice_cost\" name=\"shippingservice_cost\" value=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "shippingservice_cost"), "html", null, true);
        echo "\">
\t\t\t</div>

\t\t\t<div class=\"form-group\">
\t\t\t\t<label for=\"shippingservice_additionalcost\">Shipping Service Additional Cost</label>
\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"shippingservice_additionalcost\" name=\"shippingservice_additionalcost\" value=\"";
        // line 237
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "shippingservice_additionalcost"), "html", null, true);
        echo "\">
\t\t\t</div>

\t\t    <div class=\"form-group\">
\t\t      <div class=\"col-lg-10\">
\t\t        <button type=\"submit\" class=\"btn btn-primary\">Update Settings</button>
\t\t      </div>
\t\t    </div>

\t\t  </fieldset>
\t\t</form>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "settings/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  552 => 237,  544 => 232,  537 => 227,  524 => 225,  521 => 224,  518 => 223,  515 => 222,  512 => 221,  508 => 220,  501 => 215,  491 => 211,  483 => 210,  478 => 209,  475 => 208,  472 => 207,  470 => 206,  466 => 204,  462 => 203,  456 => 199,  446 => 195,  436 => 194,  431 => 193,  428 => 192,  425 => 191,  422 => 190,  420 => 189,  416 => 187,  412 => 186,  401 => 178,  397 => 176,  394 => 175,  391 => 174,  388 => 173,  386 => 172,  376 => 165,  369 => 162,  366 => 161,  363 => 160,  361 => 159,  350 => 151,  343 => 148,  340 => 147,  337 => 146,  335 => 145,  325 => 138,  318 => 135,  315 => 134,  312 => 133,  310 => 132,  304 => 128,  292 => 126,  287 => 125,  284 => 124,  281 => 123,  278 => 122,  274 => 121,  266 => 115,  254 => 113,  249 => 112,  246 => 111,  243 => 110,  240 => 109,  236 => 108,  228 => 102,  216 => 100,  211 => 99,  208 => 98,  205 => 97,  202 => 96,  198 => 95,  189 => 89,  181 => 84,  173 => 79,  162 => 71,  155 => 68,  152 => 67,  149 => 66,  147 => 65,  137 => 58,  130 => 55,  127 => 54,  124 => 53,  122 => 52,  115 => 48,  107 => 43,  99 => 38,  91 => 33,  83 => 28,  75 => 23,  66 => 17,  59 => 12,  50 => 10,  46 => 9,  41 => 7,  37 => 6,  31 => 3,  28 => 2,);
    }
}
