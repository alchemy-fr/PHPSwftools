<?php

/* pages/index.twig */
class __TwigTemplate_4622b199efa271a5c1e43987ed03cbf1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getContext($context, "page_layout"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"] = $this->env->loadTemplate("macros.twig");
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Index | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_body_class($context, array $blocks = array())
    {
        echo "overview";
    }

    // line 9
    public function block_content_header($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"type\">Index</div>

    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range("A", "Z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 13
            echo "        ";
            if (($this->getAttribute($this->getContext($context, "items", true), $this->getContext($context, "letter"), array(), "array", true, true) && (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "items"), $this->getContext($context, "letter"), array(), "array")) > 1))) {
                // line 14
                echo "            <a href=\"#letter";
                echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 16
                echo "            ";
                echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
                echo "
        ";
            }
            // line 18
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "items"));
        foreach ($context['_seq'] as $context["letter"] => $context["elements"]) {
            // line 23
            echo "<h2 id=\"letter";
            echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
            echo "</h2>
        <dl id=\"index\">";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "elements"));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 26
                $context["type"] = $this->getAttribute($this->getContext($context, "element"), 0, array(), "array");
                // line 27
                $context["value"] = $this->getAttribute($this->getContext($context, "element"), 1, array(), "array");
                // line 28
                if (("class" == $this->getContext($context, "type"))) {
                    // line 29
                    echo "<dt>";
                    echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getclass_link($this->getContext($context, "value"));
                    if ($this->getContext($context, "has_namespaces")) {
                        echo " &mdash; <em>Class in namespace ";
                        echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getnamespace_link($this->getAttribute($this->getContext($context, "value"), "namespace"));
                    }
                    echo "</em></dt>
                    <dd>";
                    // line 30
                    echo nl2br(twig_escape_filter($this->env, $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($this->getContext($context, "value"), "shortdesc"), $this->getContext($context, "value")), "html", null, true));
                    echo "</dd>";
                } elseif (("method" == $this->getContext($context, "type"))) {
                    // line 32
                    echo "<dt>";
                    echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getmethod_link($this->getContext($context, "value"));
                    echo "() &mdash; <em>Method in class ";
                    echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getclass_link($this->getAttribute($this->getContext($context, "value"), "class"));
                    echo "</em></dt>
                    <dd>";
                    // line 33
                    echo nl2br(twig_escape_filter($this->env, $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($this->getContext($context, "value"), "shortdesc"), $this->getAttribute($this->getContext($context, "value"), "class")), "html", null, true));
                    echo "</dd>";
                } elseif (("property" == $this->getContext($context, "type"))) {
                    // line 35
                    echo "<dt>\$";
                    echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getproperty_link($this->getContext($context, "value"));
                    echo " &mdash; <em>Property in class ";
                    echo $context["__internal_4622b199efa271a5c1e43987ed03cbf1_1"]->getclass_link($this->getAttribute($this->getContext($context, "value"), "class"));
                    echo "</em></dt>
                    <dd>";
                    // line 36
                    echo nl2br(twig_escape_filter($this->env, $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($this->getContext($context, "value"), "shortdesc"), $this->getAttribute($this->getContext($context, "value"), "class")), "html", null, true));
                    echo "</dd>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 39
            echo "        </dl>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['letter'], $context['elements'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "pages/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 39,  134 => 36,  127 => 35,  123 => 33,  116 => 32,  112 => 30,  103 => 29,  99 => 27,  93 => 25,  86 => 23,  70 => 18,  64 => 16,  53 => 13,  24 => 3,  41 => 8,  39 => 7,  19 => 2,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 2,  40 => 1,  35 => 6,  32 => 44,  23 => 4,  17 => 1,  108 => 32,  101 => 28,  97 => 26,  88 => 27,  85 => 6,  81 => 22,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  38 => 7,  78 => 21,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 5,  92 => 28,  89 => 25,  82 => 8,  79 => 7,  73 => 5,  68 => 18,  66 => 18,  63 => 18,  45 => 10,  42 => 9,  36 => 7,  31 => 5,  20 => 8,  49 => 12,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 24,);
    }
}
