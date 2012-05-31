<?php

/* panel.twig */
class __TwigTemplate_8d84fa44f07eb0f18f5c586d4e520a30 extends Twig_Template
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
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Frameset//EN\" \"http://www.w3.org/TR/html4/frameset.dtd\">
<html lang=\"en\">
<head>
    <title>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/reset.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/panel.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
    <script src=\"tree.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "js/jquery-1.3.2.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "js/searchdoc.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
    <script type=\"text/javascript\" charset=\"utf-8\">
        //<![CDATA[
        \$(document).ready(function(){
            \$('#version-switcher').change(function() {
                window.parent.location = \$(this).val()
            })
        })
       \$(function() {
           \$.ajax({
             url: 'search_index.js',
             dataType: 'script',
             success: function () {
                 \$('.loader').css('display', 'none');
                 var panel = new Searchdoc.Panel(\$('#panel'), search_data, tree, top.frames[1]);
                 \$('#search').focus();

                 for (var i=0; i < ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "default_opened_level", 1 => 0), "method"), "html", null, true);
        echo "; i++) {
                     \$('.level_' + i).each(function (\$li) {
                         panel.tree.toggle(\$(this));
                     });
                 }

                 var s = window.parent.location.search.match(/\\?q=([^&]+)/);
                 if (s) {
                     s = decodeURIComponent(s[1]).replace(/\\+/g, ' ');
                     if (s.length > 0)
                     {
                         \$('#search').val(s);
                         panel.search(s, true);
                     }
                 }
             }
           });
       })
        //]]>
    </script>
</head>
<body>
    <div class=\"panel panel_tree\" id=\"panel\">
        <div class=\"loader\">
            <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "i/loader.gif"), "html", null, true);
        echo "\" /> loading...
        </div>
        <div class=\"header\">
            <div class=\"nav\">
                <h1>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "config", array(0 => "title"), "method"), "html", null, true);
        echo "</h1>
                ";
        // line 55
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "versions")) > 1)) {
            // line 56
            echo "                    <form action=\"#\" method=\"GET\">
                        <select id=\"version-switcher\" name=\"version\">
                            ";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "project"), "versions"));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 59
                echo "                                <option value=\"../";
                echo twig_escape_filter($this->env, $this->getContext($context, "version"), "html", null, true);
                echo "/index.html\"";
                echo ((($this->getContext($context, "version") == $this->getAttribute($this->getContext($context, "project"), "version"))) ? (" selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "version"), "longname"), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 61
            echo "                        </select>
                    </form>
                ";
        }
        // line 64
        echo "                <div style=\"clear: both\"></div>
                <table>
                    <tr><td><input type=\"Search\" placeholder=\"Search\" autosave=\"searchdoc\" results=\"10\" id=\"search\" autocomplete=\"off\"></td></tr>
                </table>
            </div>
        </div>
        <div class=\"tree\">
            <ul>
            </ul>
        </div>
        <div class=\"result\">
            <ul>
            </ul>
        </div>
    </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "panel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 64,  120 => 61,  107 => 59,  22 => 4,  91 => 27,  72 => 20,  67 => 7,  61 => 5,  55 => 4,  95 => 27,  59 => 26,  43 => 7,  142 => 39,  134 => 36,  127 => 35,  123 => 33,  116 => 32,  112 => 30,  103 => 58,  99 => 56,  93 => 54,  86 => 50,  70 => 18,  64 => 18,  53 => 14,  24 => 3,  41 => 8,  39 => 9,  19 => 2,  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 12,  40 => 6,  35 => 8,  32 => 4,  23 => 4,  17 => 1,  108 => 32,  101 => 28,  97 => 55,  88 => 27,  85 => 6,  81 => 23,  77 => 21,  62 => 16,  60 => 16,  56 => 15,  50 => 13,  47 => 11,  44 => 9,  38 => 5,  78 => 23,  74 => 20,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 5,  92 => 26,  89 => 25,  82 => 8,  79 => 22,  73 => 20,  68 => 19,  66 => 18,  63 => 17,  45 => 10,  42 => 9,  36 => 7,  31 => 5,  20 => 8,  49 => 12,  37 => 6,  33 => 4,  30 => 6,  27 => 6,  26 => 5,);
    }
}
