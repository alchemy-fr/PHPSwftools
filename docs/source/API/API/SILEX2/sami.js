
window.projectVersion = 'SILEX2';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:SwfTools" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SwfTools.html">SwfTools</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SwfTools_Binary" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SwfTools/Binary.html">Binary</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SwfTools_Binary_Binary" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Binary/Binary.html">Binary</a>                    </div>                </li>                            <li data-name="class:SwfTools_Binary_DriverContainer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Binary/DriverContainer.html">DriverContainer</a>                    </div>                </li>                            <li data-name="class:SwfTools_Binary_Pdf2swf" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Binary/Pdf2swf.html">Pdf2swf</a>                    </div>                </li>                            <li data-name="class:SwfTools_Binary_Swfextract" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Binary/Swfextract.html">Swfextract</a>                    </div>                </li>                            <li data-name="class:SwfTools_Binary_Swfrender" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Binary/Swfrender.html">Swfrender</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SwfTools_Exception" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SwfTools/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SwfTools_Exception_ExceptionInterface" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Exception/ExceptionInterface.html">ExceptionInterface</a>                    </div>                </li>                            <li data-name="class:SwfTools_Exception_InvalidArgumentException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Exception/InvalidArgumentException.html">InvalidArgumentException</a>                    </div>                </li>                            <li data-name="class:SwfTools_Exception_RuntimeException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Exception/RuntimeException.html">RuntimeException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SwfTools_Processor" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SwfTools/Processor.html">Processor</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SwfTools_Processor_File" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Processor/File.html">File</a>                    </div>                </li>                            <li data-name="class:SwfTools_Processor_FlashFile" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Processor/FlashFile.html">FlashFile</a>                    </div>                </li>                            <li data-name="class:SwfTools_Processor_PDFFile" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SwfTools/Processor/PDFFile.html">PDFFile</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:SwfTools_EmbeddedObject" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="SwfTools/EmbeddedObject.html">EmbeddedObject</a>                    </div>                </li>                            <li data-name="class:SwfTools_SwfToolsServiceProvider" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="SwfTools/SwfToolsServiceProvider.html">SwfToolsServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "SwfTools.html", "name": "SwfTools", "doc": "Namespace SwfTools"},{"type": "Namespace", "link": "SwfTools/Binary.html", "name": "SwfTools\\Binary", "doc": "Namespace SwfTools\\Binary"},{"type": "Namespace", "link": "SwfTools/Exception.html", "name": "SwfTools\\Exception", "doc": "Namespace SwfTools\\Exception"},{"type": "Namespace", "link": "SwfTools/Processor.html", "name": "SwfTools\\Processor", "doc": "Namespace SwfTools\\Processor"},
            {"type": "Interface", "fromName": "SwfTools\\Exception", "fromLink": "SwfTools/Exception.html", "link": "SwfTools/Exception/ExceptionInterface.html", "name": "SwfTools\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            
            {"type": "Class", "fromName": "SwfTools\\Binary", "fromLink": "SwfTools/Binary.html", "link": "SwfTools/Binary/Binary.html", "name": "SwfTools\\Binary\\Binary", "doc": "&quot;The abstract binary adapter&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Binary\\Binary", "fromLink": "SwfTools/Binary/Binary.html", "link": "SwfTools/Binary/Binary.html#method_getVersion", "name": "SwfTools\\Binary\\Binary::getVersion", "doc": "&quot;Try to get the version of the binary. If the detection fails, return null&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Binary", "fromLink": "SwfTools/Binary.html", "link": "SwfTools/Binary/DriverContainer.html", "name": "SwfTools\\Binary\\DriverContainer", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Binary\\DriverContainer", "fromLink": "SwfTools/Binary/DriverContainer.html", "link": "SwfTools/Binary/DriverContainer.html#method_create", "name": "SwfTools\\Binary\\DriverContainer::create", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Binary", "fromLink": "SwfTools/Binary.html", "link": "SwfTools/Binary/Pdf2swf.html", "name": "SwfTools\\Binary\\Pdf2swf", "doc": "&quot;The Pdf2Swf adapter&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Binary\\Pdf2swf", "fromLink": "SwfTools/Binary/Pdf2swf.html", "link": "SwfTools/Binary/Pdf2swf.html#method_getName", "name": "SwfTools\\Binary\\Pdf2swf::getName", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Pdf2swf", "fromLink": "SwfTools/Binary/Pdf2swf.html", "link": "SwfTools/Binary/Pdf2swf.html#method_toSwf", "name": "SwfTools\\Binary\\Pdf2swf::toSwf", "doc": "&quot;Transcode a PDF to SWF&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Pdf2swf", "fromLink": "SwfTools/Binary/Pdf2swf.html", "link": "SwfTools/Binary/Pdf2swf.html#method_create", "name": "SwfTools\\Binary\\Pdf2swf::create", "doc": "&quot;Creates the Pdf2swf binary driver&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Binary", "fromLink": "SwfTools/Binary.html", "link": "SwfTools/Binary/Swfextract.html", "name": "SwfTools\\Binary\\Swfextract", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Binary\\Swfextract", "fromLink": "SwfTools/Binary/Swfextract.html", "link": "SwfTools/Binary/Swfextract.html#method_getName", "name": "SwfTools\\Binary\\Swfextract::getName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Swfextract", "fromLink": "SwfTools/Binary/Swfextract.html", "link": "SwfTools/Binary/Swfextract.html#method_listEmbedded", "name": "SwfTools\\Binary\\Swfextract::listEmbedded", "doc": "&quot;Executes the command to list the embedded objects&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Swfextract", "fromLink": "SwfTools/Binary/Swfextract.html", "link": "SwfTools/Binary/Swfextract.html#method_extract", "name": "SwfTools\\Binary\\Swfextract::extract", "doc": "&quot;Execute the command to extract an embedded object from a flash file&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Swfextract", "fromLink": "SwfTools/Binary/Swfextract.html", "link": "SwfTools/Binary/Swfextract.html#method_create", "name": "SwfTools\\Binary\\Swfextract::create", "doc": "&quot;Creates the Swfextract binary driver&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Binary", "fromLink": "SwfTools/Binary.html", "link": "SwfTools/Binary/Swfrender.html", "name": "SwfTools\\Binary\\Swfrender", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Binary\\Swfrender", "fromLink": "SwfTools/Binary/Swfrender.html", "link": "SwfTools/Binary/Swfrender.html#method_getName", "name": "SwfTools\\Binary\\Swfrender::getName", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Swfrender", "fromLink": "SwfTools/Binary/Swfrender.html", "link": "SwfTools/Binary/Swfrender.html#method_render", "name": "SwfTools\\Binary\\Swfrender::render", "doc": "&quot;Renders an SWF file.&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Binary\\Swfrender", "fromLink": "SwfTools/Binary/Swfrender.html", "link": "SwfTools/Binary/Swfrender.html#method_create", "name": "SwfTools\\Binary\\Swfrender::create", "doc": "&quot;Creates the Swfrender binary driver&quot;"},
            
            {"type": "Class", "fromName": "SwfTools", "fromLink": "SwfTools.html", "link": "SwfTools/EmbeddedObject.html", "name": "SwfTools\\EmbeddedObject", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\EmbeddedObject", "fromLink": "SwfTools/EmbeddedObject.html", "link": "SwfTools/EmbeddedObject.html#method___construct", "name": "SwfTools\\EmbeddedObject::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\EmbeddedObject", "fromLink": "SwfTools/EmbeddedObject.html", "link": "SwfTools/EmbeddedObject.html#method_getOption", "name": "SwfTools\\EmbeddedObject::getOption", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\EmbeddedObject", "fromLink": "SwfTools/EmbeddedObject.html", "link": "SwfTools/EmbeddedObject.html#method_getType", "name": "SwfTools\\EmbeddedObject::getType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\EmbeddedObject", "fromLink": "SwfTools/EmbeddedObject.html", "link": "SwfTools/EmbeddedObject.html#method_getId", "name": "SwfTools\\EmbeddedObject::getId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\EmbeddedObject", "fromLink": "SwfTools/EmbeddedObject.html", "link": "SwfTools/EmbeddedObject.html#method_detectType", "name": "SwfTools\\EmbeddedObject::detectType", "doc": "&quot;Detect type based on the raw output&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Exception", "fromLink": "SwfTools/Exception.html", "link": "SwfTools/Exception/ExceptionInterface.html", "name": "SwfTools\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SwfTools\\Exception", "fromLink": "SwfTools/Exception.html", "link": "SwfTools/Exception/InvalidArgumentException.html", "name": "SwfTools\\Exception\\InvalidArgumentException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SwfTools\\Exception", "fromLink": "SwfTools/Exception.html", "link": "SwfTools/Exception/RuntimeException.html", "name": "SwfTools\\Exception\\RuntimeException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SwfTools\\Processor", "fromLink": "SwfTools/Processor.html", "link": "SwfTools/Processor/File.html", "name": "SwfTools\\Processor\\File", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Processor\\File", "fromLink": "SwfTools/Processor/File.html", "link": "SwfTools/Processor/File.html#method___construct", "name": "SwfTools\\Processor\\File::__construct", "doc": "&quot;Build the File processor given the configuration&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Processor\\File", "fromLink": "SwfTools/Processor/File.html", "link": "SwfTools/Processor/File.html#method_changePathnameExtension", "name": "SwfTools\\Processor\\File::changePathnameExtension", "doc": "&quot;Change the extension of a pathname&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Processor", "fromLink": "SwfTools/Processor.html", "link": "SwfTools/Processor/FlashFile.html", "name": "SwfTools\\Processor\\FlashFile", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Processor\\FlashFile", "fromLink": "SwfTools/Processor/FlashFile.html", "link": "SwfTools/Processor/FlashFile.html#method_render", "name": "SwfTools\\Processor\\FlashFile::render", "doc": "&quot;Render the flash to PNG file&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Processor\\FlashFile", "fromLink": "SwfTools/Processor/FlashFile.html", "link": "SwfTools/Processor/FlashFile.html#method_listEmbeddedObjects", "name": "SwfTools\\Processor\\FlashFile::listEmbeddedObjects", "doc": "&quot;List all embedded object of the current flash file&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Processor\\FlashFile", "fromLink": "SwfTools/Processor/FlashFile.html", "link": "SwfTools/Processor/FlashFile.html#method_extractEmbedded", "name": "SwfTools\\Processor\\FlashFile::extractEmbedded", "doc": "&quot;Extract the specified Embedded file&quot;"},
                    {"type": "Method", "fromName": "SwfTools\\Processor\\FlashFile", "fromLink": "SwfTools/Processor/FlashFile.html", "link": "SwfTools/Processor/FlashFile.html#method_extractFirstImage", "name": "SwfTools\\Processor\\FlashFile::extractFirstImage", "doc": "&quot;Extract the first embedded image found&quot;"},
            
            {"type": "Class", "fromName": "SwfTools\\Processor", "fromLink": "SwfTools/Processor.html", "link": "SwfTools/Processor/PDFFile.html", "name": "SwfTools\\Processor\\PDFFile", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\Processor\\PDFFile", "fromLink": "SwfTools/Processor/PDFFile.html", "link": "SwfTools/Processor/PDFFile.html#method_toSwf", "name": "SwfTools\\Processor\\PDFFile::toSwf", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SwfTools", "fromLink": "SwfTools.html", "link": "SwfTools/SwfToolsServiceProvider.html", "name": "SwfTools\\SwfToolsServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SwfTools\\SwfToolsServiceProvider", "fromLink": "SwfTools/SwfToolsServiceProvider.html", "link": "SwfTools/SwfToolsServiceProvider.html#method_register", "name": "SwfTools\\SwfToolsServiceProvider::register", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


