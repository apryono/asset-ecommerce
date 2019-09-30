<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>KitchenArt Media</title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery-ui.min.js"></script>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="/plugins/elfinder/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" href="/plugins/elfinder/css/theme.css">

        <!-- elFinder JS (REQUIRED) -->
        <script src="/plugins/elfinder/js/elfinder.min.js"></script>

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Helper function to get parameters from the query string.
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
                var match = window.location.search.match(reParam);

                return (match && match.length > 1) ? match[1] : '';
            }

            $().ready(function () {
                var funcNum = getUrlParam('CKEditorFuncNum');

                var elf = $('#elfinder').elfinder({
                    url: '<?php echo url("elfinder/connector"); ?>',
                    getFileCallback: function (file) {
                        window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                        window.close();
                    },
                    resizable: false
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>
