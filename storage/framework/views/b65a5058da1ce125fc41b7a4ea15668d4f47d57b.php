<!DOCTYPE html>
<html>
<head>
    <title>Tu Quiniela Ganadora</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.quiniela.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>


    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/metisMenu.min.css'); ?>

    <?php echo Html::style('css/sb-admin-2.css'); ?>

    <?php echo Html::style('css/font-awesome.min.css'); ?>

    <?php echo Html::style('css/style.quiniela.css'); ?>

    <?php echo Html::style('css/bootstrap.css'); ?>

    

<body>
    <!-- header-section-starts -->
    <div class="full">
           <?php echo $__env->yieldContent('content'); ?>
        
    </div>
            <script type="text/javascript">
        $(window).load(function() {
            
          $("#flexiselDemo1").flexisel({
                visibleItems: 6,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,            
                pauseOnHover: false,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 2
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 3
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 4
                    }
                }
            });
            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
        <?php echo Html::script('js/jquery.min.js'); ?>

        <?php echo Html::script('js/bootstrap.min.js'); ?>

        <?php echo Html::script('js/metisMenu.min.js'); ?>

        <?php echo Html::script('js/sb-admin-2.js'); ?>

   
</body>
</html>