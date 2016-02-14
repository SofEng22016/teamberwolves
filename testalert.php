
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Bootbox.js&mdash;alert, confirm and flexible modal dialogs for the Bootstrap framework</title>

    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootbox.css" />
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-20517424-8']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
 </head>
<body class="bb-js">
<div class="bb-alert alert alert-info" style="display:none;">
        <span>Alert</span>
    </div>
    <div class="container">
        <section id="examples" class="bb-section">
            <div class="row">
                <div class="col-md-12">
                    <p class="lead">
                        Prompt
                        <a href="#" data-bb="prompt" class="btn btn-default"><i class="glyphicon glyphicon-play"></i></a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- JS dependencies -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="js/example.js"></script>
    <script>
        $(function () {
            Example.init({
                "selector": ".bb-alert"
            });
        });
    </script>
    <!-- bootbox code -->
    <script src="js/bootbox.js"></script>
    <!-- put all demo code in one place -->
    <script src="js/demos.js"></script>
</body>
</html>
