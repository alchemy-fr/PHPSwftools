<?php

/* layout/page.twig */
class __TwigTemplate_c42a2236042086f306c251f6fa0e84b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("default/layout/page.twig");

        $this->blocks = array(
            'frame' => array($this, 'block_frame'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default/layout/page.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_frame($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 39,  134 => 36,  127 => 35,  123 => 33,  116 => 32,  112 => 30,  103 => 29,  99 => 27,  93 => 25,  86 => 23,  70 => 18,  64 => 16,  53 => 13,  24 => 3,  41 => 8,  39 => 7,  19 => 2,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 2,  40 => 1,  35 => 6,  32 => 44,  23 => 4,  17 => 1,  108 => 32,  101 => 28,  97 => 26,  88 => 27,  85 => 6,  81 => 22,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  38 => 7,  78 => 21,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 5,  92 => 28,  89 => 25,  82 => 8,  79 => 7,  73 => 5,  68 => 18,  66 => 18,  63 => 18,  45 => 10,  42 => 9,  36 => 7,  31 => 5,  20 => 8,  49 => 12,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 3,);
    }
}
