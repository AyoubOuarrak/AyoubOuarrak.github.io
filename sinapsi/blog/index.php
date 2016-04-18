<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Sinapsi Blog</title>
   
    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/clean-blog.min.css" rel="stylesheet">
    <link href="style/paginator.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.html">Sinapsi</a>
                    </li>
                    <li>
                        <a href="../index.html#about">About</a>
                    </li>
                    <li>
                        <a href="../index.html#contact">Contact</a>
                    </li>
                    <li>
                        <a href="../get.html">Get</a>
                    </li>
		    <li>
			<a href="admin/index.php">Login</a>
		    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('../img/bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Sinapsi Blog</h1>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

   <div class="container">
	 <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		  <?php
	    	      try {
			$pages = new Paginator('4', 'p');
			$stmt = $db->query('SELECT postID FROM blog_posts');
			$pages->set_total($stmt->rowCount());
			$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC '.$pages->get_limit());
			$records = 0;
			while($row = $stmt->fetch()){
		    	   echo '<div class="post-preview">';
		    	   echo '<a href="viewpost.php?id='.$row['postID'].'"><h2 class="post-title">'.$row['postTitle'].'</h2>';
			   echo '<h3 class="post-subtitle">';
			   echo $row['postDesc'];
			   echo '</h3></a>';
		    	   echo '<p class="post-meta">Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';						
		       	   echo '</div>';
			   
			   if(++$records < $stmt->rowCount())  
			   	echo '<hr>';
	  		}
			echo '<br>';
			echo '<center>'.$pages->page_links().'</center>';
	   	     } catch(PDOException $e) {
			echo $e->getMessage();
	   	     }
		 ?>
	     </div>
	 </div>
    </div>
	
    <hr>	
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/Sinapsi_Project" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="https://github.com/SinapsiProject" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Alpha 1.0 Version &copy; 2015 Sinapsi</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/clean-blog.min.js"></script>
</body>
</html>
