<?php

/* search_index.twig */
class __TwigTemplate_d8c0f43d3430cb3be31f74eae42d7c37 extends Twig_Template
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
        $context["__internal_d8c0f43d3430cb3be31f74eae42d7c37_1"] = $this->env->loadTemplate("macros.twig");
        // line 4
        echo "var search_data = {
    'index': {
        'searchIndex': ";
        // line 6
        echo twig_jsonencode_filter($this->getAttribute($this->getContext($context, "index"), "searchIndex", array(), "array"));
        echo ",
        'info': [";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "index"), "info", array(), "array"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "[";
            // line 10
            if ((1 == $this->getAttribute($this->getContext($context, "item"), 0, array(), "array"))) {
                // line 11
                echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "shortname"));
                echo ",";
                // line 12
                echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "namespace"));
                echo ",";
                // line 13
                echo twig_jsonencode_filter($this->env->getExtension('sami')->pathForClass($context, $this->getAttribute($this->getContext($context, "item"), 1, array(), "array")));
                echo ",";
                // line 14
                echo twig_jsonencode_filter((($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "parent")) ? ((" < " . $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "parent"), "shortname"))) : ("")));
                echo ",";
                // line 15
                echo twig_jsonencode_filter($this->env->getExtension('sami')->getSnippet($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "shortdesc")));
                echo ",";
                // line 16
                echo 1;
            } elseif ((2 == $this->getAttribute($this->getContext($context, "item"), 0, array(), "array"))) {
                // line 18
                echo twig_jsonencode_filter((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "class"), "shortname") . "::") . $this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "name")));
                echo ",";
                // line 19
                echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "class"), "name"));
                echo ",";
                // line 20
                echo twig_jsonencode_filter($this->env->getExtension('sami')->pathForMethod($context, $this->getAttribute($this->getContext($context, "item"), 1, array(), "array")));
                echo ",";
                // line 21
                echo twig_jsonencode_filter($context["__internal_d8c0f43d3430cb3be31f74eae42d7c37_1"]->getmethod_parameters_signature($this->getAttribute($this->getContext($context, "item"), 1, array(), "array")));
                echo ",";
                // line 22
                echo twig_jsonencode_filter($this->env->getExtension('sami')->getSnippet($this->getAttribute($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"), "shortdesc")));
                echo ",";
                // line 23
                echo 2;
            } elseif ((3 == $this->getAttribute($this->getContext($context, "item"), 0, array(), "array"))) {
                // line 25
                echo twig_jsonencode_filter($this->getAttribute($this->getContext($context, "item"), 1, array(), "array"));
                echo ",";
                // line 26
                echo "\"\"";
                echo ",";
                // line 27
                echo twig_jsonencode_filter($this->env->getExtension('sami')->pathForNamespace($context, $this->getAttribute($this->getContext($context, "item"), 1, array(), "array")));
                echo ",";
                // line 28
                echo "\"\"";
                echo ",";
                // line 29
                echo "\"\"";
                echo ",";
                // line 30
                echo 3;
            }
            // line 32
            echo "]";
            // line 33
            echo (($this->getAttribute($this->getContext($context, "loop"), "last")) ? ("") : (","));
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo "]
    }
}
search_data['index']['longSearchIndex'] = search_data['index']['searchIndex']";
    }

    public function getTemplateName()
    {
        return "search_index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 35,  104 => 33,  96 => 29,  90 => 27,  87 => 26,  84 => 25,  75 => 21,  57 => 14,  46 => 10,  125 => 64,  120 => 61,  107 => 59,  22 => 4,  91 => 27,  72 => 20,  67 => 7,  61 => 5,  55 => 4,  95 => 27,  59 => 26,  43 => 7,  142 => 39,  134 => 36,  127 => 35,  123 => 33,  116 => 32,  112 => 30,  103 => 58,  99 => 30,  93 => 28,  86 => 50,  70 => 18,  64 => 18,  53 => 14,  24 => 3,  41 => 8,  39 => 9,  19 => 4,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 32,  51 => 12,  40 => 6,  35 => 8,  32 => 4,  23 => 6,  17 => 1,  108 => 32,  101 => 28,  97 => 55,  88 => 27,  85 => 6,  81 => 23,  77 => 21,  62 => 16,  60 => 15,  56 => 15,  50 => 13,  47 => 11,  44 => 9,  38 => 5,  78 => 22,  74 => 20,  69 => 19,  58 => 13,  54 => 13,  48 => 11,  29 => 5,  92 => 26,  89 => 25,  82 => 8,  79 => 22,  73 => 20,  68 => 19,  66 => 18,  63 => 16,  45 => 10,  42 => 9,  36 => 7,  31 => 5,  20 => 8,  49 => 12,  37 => 6,  33 => 4,  30 => 6,  27 => 8,  26 => 5,);
    }
}
