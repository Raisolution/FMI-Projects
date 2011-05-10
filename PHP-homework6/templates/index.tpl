<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{$title}</title>
        
        {foreach $cssFiles as $cssFile}
            <link rel="stylesheet" href="{$cssFolder}/{$cssFile}" type="text/css" media="screen">
        {/foreach}
              
        {foreach $javascriptFiles as $jsFile}
            <script src="{$javascriptFolder}/{$jsFile}" type="text/javascript" language="javascript" charset="utf-8"></script>
        {/foreach}
    </head>
    <body>
        {$test}
    </body>
</html>