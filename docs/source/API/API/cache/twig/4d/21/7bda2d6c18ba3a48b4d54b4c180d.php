<?php

/* namespaces.twig */
class __TwigTemplate_4d217bda2d6c18ba3a48b4d54b4c180d extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Namespaces | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 5
    public function block_body_class($context, array $blocks = array())
    {
        echo "frame";
    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"header\">
        <h1>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
        echo "</h1>

        <ul>
            <li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "classes-frame.html"), "html", null, true);
        echo "\">Classes</a></li>
            <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "namespaces-frame.html"), "html", null, true);
        echo "\">Namespaces</a></li>
        </ul>
    </div>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    <h1>Namespaces</h1>

    <ul>
        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "namespaces"));
        foreach ($context['_seq'] as $context["_key"] => $context["namespace"]) {
            // line 23
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "namespace"), "html", null, true);
            echo "/namespace-frame.html\" target=\"index\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "namespace"), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['namespace'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 25
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "namespaces.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 23,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 3,  92 => 20,  89 => 25,  82 => 8,  79 => 7,  73 => 6,  68 => 21,  66 => 18,  63 => 18,  45 => 8,  42 => 7,  36 => 5,  31 => 7,  20 => 1,  49 => 15,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 3,);
    }
}
