<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php echo Asset::css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>
		<?php echo Asset::css('https://fonts.googleapis.com/css?family=Lato'); ?>
		<?php echo Asset::css('https://fonts.googleapis.com/css?family=Montserrat'); ?>
		<?php echo Asset::js("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js");?>
		<?php echo Asset::js("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");?>
		<?php echo Asset::css('Florida-style.css'); ?>
	</head>
<!--	<body>
		<div id="mainContent">
			<?=$content; ?>
		</div>
		
	</body>-->

<!-- this is where i need to put the generic attractions -->

<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	 			
	 			<?php
                    
                    foreach($demos as $d){?>

                        <li><a href= "<?= Uri::create('florida/attractions/' . $d['attractionID'])?>"><?= $d['attractionName']?></a></li>
                        
                    <?php } ?>
                    
                <li class="active"><a href="../add.php">Add</a></li>
	 			<li><a href= "../comment.php">Comment</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-justified">
          			<li class="dropdown" id="menuLogin">
            			<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
<?php 
				$session = Session::instance();
				if(strcmp("",$session->get('username'))==0){ ?>
                                <form action="login" method="POST"> 
                                    <input name="username" id="username" type="text" placeholder="Username"> 
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="login">
				</form>
				<?php } else { ?>
                            <form action="logout" method="POST"> 
                                    <input name="username" id="username" type="text" placeholder="Username"> 
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="logout">
                            </form>
                <?php } ?>
				
            		</div>
                    		</li>
          	 	 </ul>
		</div>
	</nav>
	<br>
	<br>
	<br>

	<!-- Indicators -->
	<div id="Carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#Carousel" data-slide-to="0" class="active"></li>
			<li data-target="#Carousel" data-slide-to="1"></li>
			<li data-target="#Carousel" data-slide-to="2"></li>
			<li data-target="#Carousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
                <?php echo Asset::img('florida-postcard.jpg');?>
			</div>
		
			<div class="item">
				<?php echo Asset::img('nightRocket.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('UniversalFlorida.svg.png');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch gardens 1.jpg');?>
			</div>
		</div>
		
		 <!-- Left and right controls -->
  		<a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
   			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
 		</a>
		
  		<a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  		</a>
	</div>
	
		<body>
		<div id="mainContent">
			<?=$content; ?>
		</div>
		
	</body>
	
	
	<div id="footer">
			Part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project
		</div>
</body>
</html>
