<?php

/* layout/layout.twig */
class __TwigTemplate_9d205c72e2a3426feb4367ca952ff111 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout/base.twig");

        $this->blocks = array(
            'html' => array($this, 'block_html'),
            'body_class' => array($this, 'block_body_class'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_html($context, array $blocks = array())
    {
        // line 4
        echo "    <body id=\"";
        $this->displayBlock('body_class', $context, $blocks);
        echo "\">
        ";
        // line 5
        $this->displayBlock('header', $context, $blocks);
        // line 6
        echo "        <div class=\"content\">
            ";
        // line 7
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "        </div>
        ";
        // line 9
        $this->displayBlock('footer', $context, $blocks);
        // line 10
        echo "    </body>
";
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        echo "";
    }

    // line 9
    public function block_footer($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 7,  61 => 5,  55 => 4,  95 => 27,  59 => 15,  43 => 7,  142 => 39,  134 => 36,  127 => 35,  123 => 33,  116 => 32,  112 => 30,  103 => 29,  99 => 27,  93 => 25,  86 => 22,  70 => 18,  64 => 16,  53 => 13,  24 => 3,  41 => 8,  39 => 7,  19 => 2,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 12,  40 => 6,  35 => 6,  32 => 4,  23 => 4,  17 => 1,  108 => 32,  101 => 28,  97 => 26,  88 => 27,  85 => 6,  81 => 23,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 10,  47 => 11,  44 => 9,  38 => 5,  78 => 21,  74 => 20,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 3,  92 => 26,  89 => 25,  82 => 8,  79 => 22,  73 => 9,  68 => 17,  66 => 18,  63 => 18,  45 => 8,  42 => 9,  36 => 7,  31 => 5,  20 => 8,  49 => 12,  37 => 6,  33 => 4,  30 => 3,  27 => 6,  26 => 3,);
    }
}
