<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>glaseca file hosting</title>		
			<link rel="shortcut icon" href="image/favicon.png" type="image/png" />
			<link href="css/basic.css" type="text/css" rel="stylesheet" />
			<script type="text/javascript" src="js/enhance.js"></script>
			<script type="text/javascript" src="js/zoom.js"></script>				
			<script type="text/javascript">
				enhance({
					loadScripts: [
						'https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js',
						'js/jQuery.fileinput.js',
						'js/example.js'
					],
					loadStyles: ['css/enhanced.css']	
				});   
		    </script>
		
		
		<script type="text/javascript">var switchTo5x=false;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "ur-2b0e3338-2619-969f-271e-78394b31d265",button=false,onhover:false,shorten:false,minorServices:false}); </script>
			
				
	</head>
	<body>	
	
	<div id="idioma">
		<a href="http://glaseca.es/hosting"><img src="images/spain.png" alt="Espa&ntilde;ol" title="Espa&ntilde;ol" width="27px" height="28px"/></a>
		<a href="http://glaseca.es/hosting/en/"><img src="images/uk.png" alt="English" title="English" width="27px" height="28px"/></a>
	<!--	<a href="http://glaseca.es/hosting"><img src="images/spain2.png" alt="Espa&ntilde;ol" title="Espa&ntilde;ol" width="31px" height="35px"/></a>
		<a href="http://glaseca.es/hosting/en/"><img src="images/uk2.png" alt="English" title="English" width="31px" height="35px"/></a> -->
	</div>
	<div id="flotanteizquierda">
	<form name="subir_imagen" method="post" enctype="multipart/form-data">      
		<fieldset>
			<legend>File profile</legend>
			<label for="file">Select a file</label>
			<input type="file" name="imagen" id="file" />
			<input type="submit" name="botEnviarImagen" id="upload" value="Upload" />		
		</fieldset>
	</form>
	</div>
	<div id="flotanteizquierda">
		<img src="images/logo2.png" width="60%" height="60%"/>
	</div>
	<div style="clear:left;"></div>
<?php 
		$hayimagen = 0;
        if(isset($_POST["botEnviarImagen"])){
			$nameimagen = strtolower($_FILES['imagen']['name']);
			$tmpimagen = $_FILES['imagen']['tmp_name'];
			$extimagen = pathinfo($nameimagen);
			$ext = array("bmp","gif","jpg","png","jpeg","pdf","mp3","mp4","mov","avi","swf","wav","m4v","zip","tar","txt","css","rar","doc","xls","pps","docx","xlsx","ppsx","ppt","pptx");
			$urlnueva = "ficheros/".md5($name . time()).'.'.$extimagen['extension'];
			$hayimagen = 1;
            ?>
						<div id="contenedor">
							<div id="flotanteizquierda">
							<?php  
			
                if(is_uploaded_file($tmpimagen)){
				
			/*
				echo "nombre" . $nameimagen . "<br />";
				echo "temp" . $tmpimagen . "<br />";
				echo "ext" . $extimagen['extension'] . "<br />";
			*/	
									
                    if(array_search($extimagen['extension'],$ext)){                    
                        copy($tmpimagen, $urlnueva);
						$urlcompleta = "http://glaseca.es/hosting/" . $urlnueva;	
						require("googl.php");
						$googl = new Googl();
						$urlmin = $googl->shorten($urlcompleta, "AIzaSyB3SNv0eGM2T2ooj2HlIadd-UkJV0aD0_Y");
						 
						
						echo "<div style='font-size:10pt;float=left;'><br />Your file (Shorten URL): <a href='$urlmin' target='_blank'>$urlmin</a><br /><br />";						
						echo "Your file (Server URL): <a href='$urlnueva' target='_blank'>$urlnueva</a></div><br /><br />";

						?>
						</div>	
							
						<div id="flotantederecha">
							<h3>Share the URL:</h3>
							<span class='st_google_bmarks_large' displayText='Bookmarks' st_url="<?php echo $urlcompleta; ?>"></span>
							<span class='st_facebook_large' displayText='Facebook' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting"></span>
							<span class='st_twitter_large' st_via='' displayText='Tweet' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting"></span>
							<span class='st_linkedin_large' st_summary='<?php echo $urlcompleta; ?>' displayText='LinkedIn' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting"></span>
							<?
						/*	if($extimagen['extension'] != "zip" && $extimagen['extension'] != "pdf" && $extimagen['extension'] != "swf" && $extimagen['extension'] != "zip" 
								&& $extimagen['extension'] != "tar" && $extimagen['extension'] != "rar")
							{
							?>
								<span class='st_pinterest_large' displayText='Pinterest' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting""></span>
							<?php
							}
						*/	?>
							<span class='st_evernote_large' displayText='Evernote' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting"></span>
							<span class='st_email_large' displayText='Email' st_url="<?php echo $urlcompleta; ?>" st_title="I uploaded this file to @glaseca hosting""></span>
						</div>
						
						<div id="flotantederecha">
							<?php
								$widthHeight ='100';
								$EC_level='L';
								$margin='0';
								echo '<h3>QR code: </h3><img class="qr" src="http://chart.apis.google.com/chart?chs='.$widthHeight.'x'.$widthHeight.'&cht=qr&chld='.$EC_level.'|'
									.$margin.'&chl='.$urlmin.'" alt="QR code" widthHeight="'.$widthHeight.'" widthHeight="'.$widthHeight.'"/>';
							?>
						</div>
						
   					<?php    				
						
						if($extimagen['extension']=="bmp" || $extimagen['extension']=="jpg" || $extimagen['extension']=="jpeg" || $extimagen['extension']=="gif" || $extimagen['extension']=="png")
						{	
						?>
							<div style="clear:left;padding:30px;">
							<?php
							echo '<img class="imagen" src="'.$urlnueva.'" /><br /><br /><br />';                        
							?>
								 </div>
							<?php
						
						}

				   }
                    
                    else {                    
                        echo "not allowed to upload files with the extension you are using<br /><br /><br />";
                    }
                }
                
                else {
                    echo "Select a file.";
                }
				
		
		}
		

	if($hayimagen==0)
	{
		?>
		<div id="flotantemuyabajo"><label>2012 &copy; glaseca | All rights reserved.</label></div></div><br /><br />
		<?php
	}
	else
	{
		?>
		<div id="flotanteabajo"><label>2012 &copy; glaseca | All rights reserved.</label></div></div><br /><br />	
		<?php
	}
	?>
		
	</body>
</html>