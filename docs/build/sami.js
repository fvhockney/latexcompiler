
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Fvhockney" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Fvhockney.html">Fvhockney</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Fvhockney_LatexCompiler" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Fvhockney/LatexCompiler.html">LatexCompiler</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Fvhockney_LatexCompiler_LatexCompiler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Fvhockney/LatexCompiler/LatexCompiler.html">LatexCompiler</a>                    </div>                </li>                            <li data-name="class:Fvhockney_LatexCompiler_LatexCompilerFacade" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Fvhockney/LatexCompiler/LatexCompilerFacade.html">LatexCompilerFacade</a>                    </div>                </li>                            <li data-name="class:Fvhockney_LatexCompiler_LatexCompilerServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html">LatexCompilerServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Fvhockney.html", "name": "Fvhockney", "doc": "Namespace Fvhockney"},{"type": "Namespace", "link": "Fvhockney/LatexCompiler.html", "name": "Fvhockney\\LatexCompiler", "doc": "Namespace Fvhockney\\LatexCompiler"},
            
            {"type": "Class", "fromName": "Fvhockney\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html", "name": "Fvhockney\\LatexCompiler\\LatexCompiler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method___construct", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_compile", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::compile", "doc": "&quot;Define the name of the file to be compiled without\nfile suffix&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_with", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::with", "doc": "&quot;Set data to be passed to the view&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_runs", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::runs", "doc": "&quot;Override default runs&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_in", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::in", "doc": "&quot;Define view&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_deletePdf", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::deletePdf", "doc": "&quot;Delete PDF file&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_storagePath", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::storagePath", "doc": "&quot;Set Storage Path&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_run", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::run", "doc": "&quot;Compiles the PDF and store the path to the file&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_fillTemplate", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::fillTemplate", "doc": "&quot;Fills in the template&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_writeToFile", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::writeToFile", "doc": "&quot;Writes filled in template to file&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_compileTex", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::compileTex", "doc": "&quot;Sends to terminal to compile in tex&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_handlePDF", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::handlePDF", "doc": "&quot;Check for existing PDF and move from temp&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_tearDownTemp", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::tearDownTemp", "doc": "&quot;Deletes build directory&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompiler.html#method_makeTempDir", "name": "Fvhockney\\LatexCompiler\\LatexCompiler::makeTempDir", "doc": "&quot;Makes build directory&quot;"},
            
            {"type": "Class", "fromName": "Fvhockney\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompilerFacade.html", "name": "Fvhockney\\LatexCompiler\\LatexCompilerFacade", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompilerFacade", "fromLink": "Fvhockney/LatexCompiler/LatexCompilerFacade.html", "link": "Fvhockney/LatexCompiler/LatexCompilerFacade.html#method_getFacadeAccessor", "name": "Fvhockney\\LatexCompiler\\LatexCompilerFacade::getFacadeAccessor", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Fvhockney\\LatexCompiler", "fromLink": "Fvhockney/LatexCompiler.html", "link": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html", "name": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider", "fromLink": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html", "link": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html#method_boot", "name": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider::boot", "doc": "&quot;Bootstrap services.&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider", "fromLink": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html", "link": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html#method_register", "name": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider::register", "doc": "&quot;Register services.&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider", "fromLink": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html", "link": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html#method_mergeConfigFrom", "name": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider::mergeConfigFrom", "doc": "&quot;Merge the given configuration with the existing configuration.&quot;"},
                    {"type": "Method", "fromName": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider", "fromLink": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html", "link": "Fvhockney/LatexCompiler/LatexCompilerServiceProvider.html#method_mergeConfigs", "name": "Fvhockney\\LatexCompiler\\LatexCompilerServiceProvider::mergeConfigs", "doc": "&quot;Merges the configs together and takes multi-dimensional arrays into account.&quot;"},
            
            
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


