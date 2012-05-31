<?php

/* pages/opensearch.twig */
class __TwigTemplate_31c0ab8a72a6630b17046be270781062 extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "project"), "config", array(0 => "base_url"), "method")) {
            // line 2
            echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <OpenSearchDescription xmlns=\"http://a9.com/-/spec/opensearch/1.1/\" xmlns:referrer=\"http://a9.com/-/opensearch/extensions/referrer/\">
        <ShortName>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "version"), "html", null, true);
            echo ")</ShortName>
        <Description>Searches ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "version"), "html", null, true);
            echo ")</Description>
        <Tags>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
            echo "</Tags>
        ";
            // line 7
            if ($this->getAttribute($this->getContext($context, "project"), "config", array(0 => "favicon"), "method")) {
                // line 8
                echo "<Image height=\"16\" width=\"16\" type=\"image/x-icon\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "favicon"), "method"), "html", null, true);
                echo "</Image>
        ";
            }
            // line 10
            echo "        <Url type=\"text/html\" method=\"GET\" template=\"";
            echo twig_escape_filter($this->env, (strtr($this->getAttribute($this->getContext($context, "project"), "config", array(0 => "base_url"), "method"), array("%version%" => $this->getAttribute($this->getContext($context, "project"), "version"))) . "/index.html?q={searchTerms}&src={referrer:source?}"), "html", null, true);
            echo "\"/>
        <InputEncoding>UTF-8</InputEncoding>
        <AdultContent>false</AdultContent>
    </OpenSearchDescription>
";
        }
    }

    public function getTemplateName()
    {
        return "pages/opensearch.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 8,  39 => 7,  19 => 2,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 2,  40 => 1,  35 => 6,  32 => 44,  23 => 4,  17 => 1,  108 => 32,  101 => 30,  97 => 29,  88 => 27,  85 => 6,  81 => 25,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  38 => 7,  78 => 23,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 5,  92 => 28,  89 => 25,  82 => 8,  79 => 7,  73 => 5,  68 => 18,  66 => 18,  63 => 18,  45 => 8,  42 => 7,  36 => 5,  31 => 5,  20 => 8,  49 => 15,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 24,);
    }
}
