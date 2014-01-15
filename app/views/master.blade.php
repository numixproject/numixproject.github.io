<!doctype html>
<html lang="en">
<head>
	<meta name="google-site-verification" content="HKv7wJWsML_I-ABHu4FaEcYZCy8ViTBjoQAuKYr4B2M" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="title" content="Numix - Not just yet another theme suite" />
    <meta name="description" content="Numix is a collection of modern and beautiful artworks." />
    <title>Numix - Not just yet another theme suite</title>
	{{HTML::style("css/bootstrap.min.css")}}
	{{HTML::style("css/font-awesome.min.css")}}
	{{HTML::style("css/ahmarBase.css")}}
	{{HTML::style("css/dataTable/jquery.dataTables.css")}}
	{{HTML::style("css/alertify.core.css")}}
	{{HTML::style("css/alertify.bootstrap.css")}}
	{{HTML::script("js/jquery.js")}}
	{{HTML::script("js/bootstrap.min.js")}}
	{{HTML::script("js/jquery.dataTables.min.js")}}
	{{HTML::script("js/alertify.min.js")}}
	{{HTML::script("js/lehkat.min.js")}}
	{{HTML::script("js/main.js")}}
    {{HTML::style("css/opensans.css")}}
    {{HTML::style("css/numixlogotype.css")}}
    {{HTML::style("css/fontello.css")}}
    {{HTML::style("css/stylesheet.css")}}
    <link rel="stylesheet" type="text/css" media="print" href="./css/print.css">
    <link href="https://plus.google.com/115833527622591803679" rel="publisher" />
    <link rel="image_src" href="./img/preview.png" />
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <!-- <link rel="stylesheet" type="text/css" media="all" href="./css/opensans.css">
    <link rel="stylesheet" type="text/css" media="all" href="./css/numixlogotype.css">
    <link rel="stylesheet" type="text/css" media="all" href="./css/fontello.css">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/stylesheet.css">
    -->
    
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-44576566-1', 'numixproject.org');
        ga('send', 'pageview');
    </script>
    <script type="text/javascript">
    (function() {
        var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
        po.src = "//apis.google.com/js/plusone.js?publisherid=115833527622591803679";
        var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
    })();
    </script>
</head>
<body>
	 <nav>
            <ul>
                <li><a href="#home" class="title">Numix</a></li>
                <li><a href="#about"><span class="icon-info"></span></a></li>
                <li><a href="#design"><span class="icon-feather"></span></a></li>
                <li><a href="#projects"><span class="icon-shop"></span></a></li>
                <li><a href="#form"><span class="fa fa-comment"></span></a></li>
            </ul>
        </nav>
	@yield("content")
</body>
<footer>
   <!-- notification -->
        <script type="text/javascript">
        $(function(){
        
        @if((Session::get("error")))
            alertify.error("{{Session::get('error')}}");
        @elseif(Session::get("success"))
            alertify.success("{{Session::get('success')}}");
        @endif

        })
        </script>
</footer>
</html>