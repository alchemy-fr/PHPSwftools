<?php

/* classes.twig */
class __TwigTemplate_77d5b2b67dd5c976a84d07aa78e0473e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout/base.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_77d5b2b67dd5c976a84d07aa78e0473e_1"] = $this->env->loadTemplate("macros.twig");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "All Classes | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_body_class($context, array $blocks = array())
    {
        echo "frame";
    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"header\">
        <h1>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
        echo "</h1>

        <ul>
            <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "classes-frame.html"), "html", null, true);
        echo "\">Classes</a></li>
            ";
        // line 15
        if ($this->getContext($context, "has_namespaces")) {
            // line 16
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "namespaces-frame.html"), "html", null, true);
            echo "\">Namespaces</a></li>
            ";
        }
        // line 18
        echo "        </ul>
    </div>
";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "    <h1>Classes</h1>
    <ul>
        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "classes"));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 26
            echo "            <li>
                ";
            // line 27
            if ($this->getAttribute($this->getContext($context, "class"), "isinterface")) {
                echo "<em>";
            }
            // line 28
            echo "                ";
            echo $context["__internal_77d5b2b67dd5c976a84d07aa78e0473e_1"]->getclass_link($this->getContext($context, "class"), array("target" => "main"));
            echo "
                ";
            // line 29
            if ($this->getAttribute($this->getContext($context, "class"), "isinterface")) {
                echo "</em>";
            }
            // line 30
            echo "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "classes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 32,  101 => 30,  97 => 29,  88 => 27,  85 => 26,  81 => 25,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  38 => 7,  78 => 23,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 3,  92 => 28,  89 => 25,  82 => 8,  79 => 7,  73 => 6,  68 => 18,  66 => 18,  63 => 18,  45 => 8,  42 => 7,  36 => 5,  31 => 5,  20 => 1,  49 => 15,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 3,);
    }
}
