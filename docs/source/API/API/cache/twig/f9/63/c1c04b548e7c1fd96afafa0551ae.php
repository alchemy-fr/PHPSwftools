<?php

/* macros.twig */
class __TwigTemplate_f963c1c04b548e7c1fd96afafa0551ae extends Twig_Template
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
        // line 4
        echo "
";
        // line 8
        echo "
";
        // line 18
        echo "
";
        // line 24
        echo "
";
        // line 30
        echo "
";
        // line 44
        echo "
";
        // line 48
        echo "
";
    }

    // line 1
    public function getattributes($attributes = null)
    {
        $context = $this->env->mergeGlobals(array(
            "attributes" => $attributes,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "attributes"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 5
    public function getnamespace_link($namespace = null, $attributes = null)
    {
        $context = $this->env->mergeGlobals(array(
            "namespace" => $namespace,
            "attributes" => $attributes,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForNamespace($context, $this->getContext($context, "namespace")), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this, "attributes", array(0 => $this->getContext($context, "attributes")), "method"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "namespace"), "html", null, true);
            echo "</a>";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 9
    public function getclass_link($class = null, $attributes = null, $absolute = null)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $class,
            "attributes" => $attributes,
            "absolute" => $absolute,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 10
            if ($this->getAttribute($this->getContext($context, "class"), "projectclass")) {
                // line 11
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForClass($context, $this->getContext($context, "class")), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this, "attributes", array(0 => $this->getContext($context, "attributes")), "method"), "html", null, true);
                echo ">";
            } elseif ($this->getAttribute($this->getContext($context, "class"), "phpclass")) {
                // line 13
                echo "<a href=\"http://php.net/";
                echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this, "attributes", array(0 => $this->getContext($context, "attributes")), "method"), "html", null, true);
                echo ">";
            }
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this, "abbr_class", array(0 => $this->getContext($context, "class"), 1 => ((array_key_exists("absolute", $context)) ? (_twig_default_filter($this->getContext($context, "absolute"), false)) : (false))), "method"), "html", null, true);
            // line 16
            if (($this->getAttribute($this->getContext($context, "class"), "projectclass") || $this->getAttribute($this->getContext($context, "class"), "phpclass"))) {
                echo "</a>";
            }
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 19
    public function getmethod_link($method = null, $attributes = null, $absolute = null, $classonly = null)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $method,
            "attributes" => $attributes,
            "absolute" => $absolute,
            "classonly" => $classonly,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 20
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForMethod($context, $this->getContext($context, "method")), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this, "attributes", array(0 => $this->getContext($context, "attributes")), "method"), "html", null, true);
            echo ">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this, "abbr_class", array(0 => $this->getAttribute($this->getContext($context, "method"), "class")), "method"), "html", null, true);
            if ((!((array_key_exists("classonly", $context)) ? (_twig_default_filter($this->getContext($context, "classonly"), false)) : (false)))) {
                echo "::";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "method"), "name"), "html", null, true);
            }
            // line 22
            echo "</a>";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 25
    public function getproperty_link($property = null, $attributes = null, $absolute = null, $classonly = null)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $property,
            "attributes" => $attributes,
            "absolute" => $absolute,
            "classonly" => $classonly,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 26
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForProperty($context, $this->getContext($context, "property")), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this, "attributes", array(0 => $this->getContext($context, "attributes")), "method"), "html", null, true);
            echo ">";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this, "abbr_class", array(0 => $this->getAttribute($this->getContext($context, "property"), "class")), "method"), "html", null, true);
            if ((!((array_key_exists("classonly", $context)) ? (_twig_default_filter($this->getContext($context, "classonly"), true)) : (true)))) {
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "property"), "name"), "html", null, true);
            }
            // line 28
            echo "</a>";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 31
    public function gethint_link($hints = null, $attributes = null)
    {
        $context = $this->env->mergeGlobals(array(
            "hints" => $hints,
            "attributes" => $attributes,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 32
            if ($this->getContext($context, "hints")) {
                // line 33
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "hints"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["hint"]) {
                    // line 34
                    if ($this->getAttribute($this->getContext($context, "hint"), "class")) {
                        // line 35
                        echo twig_escape_filter($this->env, $this->getAttribute($this, "class_link", array(0 => $this->getAttribute($this->getContext($context, "hint"), "name")), "method"), "html", null, true);
                    } elseif ($this->getAttribute($this->getContext($context, "hint"), "name")) {
                        // line 37
                        echo $this->env->getExtension('sami')->abbrClass($this->getAttribute($this->getContext($context, "hint"), "name"));
                    }
                    // line 39
                    if ($this->getAttribute($this->getContext($context, "hint"), "array")) {
                        echo "[]";
                    }
                    // line 40
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "|";
                    }
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hint'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
            }
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 45
    public function getabbr_class($class = null, $absolute = null)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $class,
            "absolute" => $absolute,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 46
            echo "<abbr title=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((array_key_exists("absolute", $context)) ? (_twig_default_filter($this->getContext($context, "absolute"), false)) : (false))) ? ($this->getContext($context, "class")) : ($this->getAttribute($this->getContext($context, "class"), "shortname"))), "html", null, true);
            echo "</abbr>";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 49
    public function getmethod_parameters_signature($method = null)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $method,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 50
            $context["__internal_f963c1c04b548e7c1fd96afafa0551ae_1"] = $this->env->loadTemplate("macros.twig");
            // line 51
            echo "(";
            // line 52
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "method"), "parameters"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 53
                if ($this->getAttribute($this->getContext($context, "parameter"), "hashint")) {
                    echo $context["__internal_f963c1c04b548e7c1fd96afafa0551ae_1"]->gethint_link($this->getAttribute($this->getContext($context, "parameter"), "hint"));
                    echo " ";
                }
                // line 54
                echo "\$";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "parameter"), "name"), "html", null, true);
                // line 55
                if ($this->getAttribute($this->getContext($context, "parameter"), "default")) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "parameter"), "default"), "html", null, true);
                }
                // line 56
                if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                    echo ", ";
                }
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 58
            echo ")";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  377 => 58,  361 => 56,  356 => 55,  353 => 54,  348 => 53,  331 => 52,  329 => 51,  327 => 50,  316 => 49,  301 => 46,  289 => 45,  263 => 40,  259 => 39,  256 => 37,  253 => 35,  251 => 34,  234 => 33,  232 => 32,  220 => 31,  209 => 28,  203 => 27,  197 => 26,  183 => 25,  172 => 22,  166 => 21,  160 => 20,  146 => 19,  133 => 16,  131 => 15,  124 => 13,  117 => 11,  115 => 10,  102 => 9,  51 => 2,  40 => 1,  35 => 48,  32 => 44,  23 => 18,  17 => 4,  108 => 32,  101 => 30,  97 => 29,  88 => 27,  85 => 6,  81 => 25,  77 => 23,  62 => 16,  60 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  38 => 7,  78 => 23,  74 => 22,  69 => 19,  58 => 13,  54 => 12,  48 => 9,  29 => 30,  92 => 28,  89 => 25,  82 => 8,  79 => 7,  73 => 5,  68 => 18,  66 => 18,  63 => 18,  45 => 8,  42 => 7,  36 => 5,  31 => 5,  20 => 8,  49 => 15,  37 => 6,  33 => 10,  30 => 4,  27 => 6,  26 => 24,);
    }
}
