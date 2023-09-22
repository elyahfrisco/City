<?php
// Settings
@ini_set('max_execution_time', "30"); // 30 seconds
// print ini_get('max_execution_time');
@ini_set('memory_limit', "64M"); // 8MB - Set any from 8M, 16M, 24M, 32M, 40M, 48M, 56M, 64M, 128M
// print ini_get('memory_limit');

// these two below are best to adjust via .htaccess - see documentation
@ini_set('post_max_size', "10M"); // 10MB
@ini_set('upload_max_filesize', "10M"); // 10MB

// Max File Size Allowed - Soft Restriction - Not always fool proof but its better to use
$Max_File_Size="10485760"; // In bytes - 10485760=10MB, 4194304=4MB, 2097152=2MB, 1048576=1MB

// print ini_get('post_max_size');

// allow multiple upload or single upload
// set this no to allow single upload - use lowercase
// $multipleUpload="no";
$multipleUpload="yes";

// get all post data
$ssAct=$_REQUEST["ssAct"];

$ssIPAddress=$_REQUEST["ssIPAddress"];

$ssSumMath=$_REQUEST["ssSumMath"];
$ssMathTest=$_REQUEST["ssMathTest"];

$ssName=$_REQUEST["ssName"];
$ssEmail=$_REQUEST["ssEmail"];
$ssPhone=$_REQUEST["ssPhone"];
#$ssWebsite=$_REQUEST["ssWebsite"];
#$ssCountry=$_REQUEST["ssCountry"];
#$ssCity=$_REQUEST["ssCity"];
#$ssZip=$_REQUEST["ssZip"];
$ssPurpose=$_REQUEST["ssPurpose"];
$ssMessage=$_REQUEST["ssMessage"];
$ssFile=$_REQUEST["ssFile"];
$ssCopyEmail=$_REQUEST["ssCopyEmail"];
// get uploaded files from form in loop
function reArrayFiles($ssFile)
{
  $file_ary = array();
  $file_count = count($ssFile['name']);
  $file_keys = array_keys($ssFile);
    for ($i=0; $i<$file_count; $i++)
  {
    foreach ($file_keys as $key)
      {
      $file_ary[$i][$key] = $ssFile[$key][$i];
      }
  }
  return $file_ary;
}
?>
<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg9.jpg);margin-top:-20px;">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Contactez-nous</h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
          <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
          <li class="active">Contact</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb row END -->
<!-- contact area -->
<!-- contact area -->
<div class="section-full content-inner bg-white contact-style-1">
<div class="container">
  <div class="row">
    <div class="col-md-4 m-b30">
      <div class="icon-bx-wraper bx-style-1 p-a30 center">
        <div class="icon-xl text-primary m-b20"> <span class="icon-cell"><i class="fa fa-map-marker"></i></span> </div>
        <div class="icon-content">
          <h5 class="dlab-tilte text-uppercase m-b40">Adresse</h5>
          <p>96 rue Anatole France, 92300 Levallois Perret</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 m-b30">
      <div class="icon-bx-wraper bx-style-1 p-a30 center">
        <div class="icon-xl text-primary m-b20"> <span class="icon-cell"><i class="fa fa-clock-o"></i></span> </div>
        <div class="icon-content">
          <h5 class="dlab-tilte text-uppercase">Horaires d'ouverture</h5>
          <p>Du Lundi au Vendredi<br>de 9h30 à 19h30 (20h sur RDV)<br>et Dimanche sur RDV de 10h30 à 17h30.<br></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 m-b30">
      <div class="icon-bx-wraper bx-style-1 p-a30 center">
        <div class="icon-xl text-primary m-b20"> <span class="icon-cell"><i class="fa fa-phone"></i></span> </div>
        <div class="icon-content">
          <h5 class="dlab-tilte text-uppercase">Contact</h5>
          <p>Tel : 01 41 34 31 45<br>Fax : 01 41 34 31 75 <br>Port : 06 68 90 10 10<</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="section-head head-1">
        <span class="text-primary">Vous recherchez ou vous voulez vendre un véhicule ?</span>
        <h3 class="h3 text-uppercase">Leasing</h3>
        <div class="dlab-separator bg-gray-dark"></div>
        <p>Laissez nous toutes les informations necessaires sur votre véhicule.<br>
        Cela pourra nous permettre d'estimer votre voiture.<br>
        Nous vous contactons par mail ou par telephone dans un délai de 24H pour vous donner notre prix d'achat!</p>
      </div>
    </div>
    <div class="col-md-8">
      <div class="p-a30 bg-gray clearfix m-b30 ">
        <h2>Contactez-nous</h2>
        <?php
        // file type check - allowed png, gif, jpeg, jpg, rar, zip, pdf
        if($ssAct!='')
        {
      		for($i=0;$i<count($_FILES['ssFile']['size']);$i++)
      		{
      			if(strstr($_FILES['ssFile']['type'][$i], 'image/png')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'image/gif')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'image/jpeg')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'image/pjpeg')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'application/msword')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')!==false
      				|| strstr($_FILES['ssFile']['type'][$i], 'application/pdf')!==false
      			  )
      					{
      					$fileAllow="true";
      					$whichFile="all";
      					}
      				else
      					{
      					$whichFile=$_FILES['ssFile']['type'][$i];
      					$fileAllow="false";
      					// if any disallowed file is trapped - block attachment and sending email - and show alert
      					break;
      					}
      		}
        }

        if($ssSumMath!=$ssMathTest && $ssAct=='send') {
        // Math test code wrong
        $testSeries1="false";
        }
        //////////////////////
        if($testSeries1=='false') {
        echo "<div class='alert alert-danger'><strong>La somme des deux chiffres est incorrecte</strong>! Merci de réessayer!</div>";
        }
        //////////////////////
        if($fileAllow=='false' && $whichFile!='') {
        echo "<div class='alert alert-danger'><strong>L'extension de fichier</strong> [<strong> $whichFile </strong>] n'est pas autorisée! Uniquement JPG, GIF, PNG, PDF, RAR, ZIP sont autorisés. Merci de réessayer!</div>";
        }
        // send email
        if($ssAct!='' && $ssAct=='send' && $testSeries1!='false' && $fileAllow!='false' || $ssAct!='' && $ssAct=='send' && $testSeries1!='false' && $fileAllow=='false' && $whichFile=='')
        {
          // attach files and send html email ////////////////////////////////////////////////////////////////
          // where email should go
          $to="city.car.france@orange.fr";
          // email subject
          $subject="Demande de contact - ".$ssName;
          // sender email
          $from = $ssEmail;

          $body = "<div style='background-color:#F4F4F4;padding:10px 0;font-family:Helvetica,Arial,sans-serif;' align='center'>
            <div style='width:600px;border:1px solid #DBDBDB;border-radius:6px;background-color:#fff;'>
              <div style='background-color:#82db19;height:100px;border-radius:6px 6px 0 0;box-shadow:0px 0px 10px 0px #ccc;border-bottom:1px solid #1067A0;'>
                <div style='float:left;' align='left'>
                  <div style='color:#fff;font-size:30px;font-weight:bold;padding:24px 0 0 20px;text-shadow:2px 1px 1px #0B456C;'>City Car<em></em></div>
                  <div style='color:#D7ECFB;padding:0 0 0 20px; font-size:14px;text-shadow:1px 1px 1px #0B456C;'>Demande de contact<em></em></div>
                  <div style='clear:both;'></div>
                </div>
                <div style='clear:both;'></div>
              </div>
              <div align='left' style='padding:10px 30px; text-align:justify; color:#666; font-size:13px;line-height:22px;'>
                <div style='border-bottom:1px solid #eee;margin:10px 0;'>
                  <p>Cette personne cherche a vous contacter : <br /><strong>$ssName [ $ssEmail ]</strong></p>
                </div>
            	<h4>Sujet: $ssPurpose</h4><br>
                <p><strong>Message:</strong></p>
                <p>$ssMessage</p>
                <p> <em>Telephone:</em> $ssPhone<br />
                   </p>
                <p> <em>Adresse IP de l'expediteur:</em> $ssIPAddress / <em>Geolocalisation</em> <a href='http://ipinfodb.com/ip_locator.php?ip=$ssIPAddress'>ici</a>, <a href='http://www.ip-tracker.org/ip-to-location.php?ip=$ssIPAddress'>ici</a> ou <a href='http://whatismyipaddress.com/ip/$ssIPAddress'>ici</a> </p>
              </div>
            </div>";

  	      // generate a random string to use as boundary marker
  	      $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
  	      // email headers
    		  $headers = "From: $from\r\n" .
    		  "Reply-To: $ssEmail\r\n" .
    		  "Return-Path: $ssEmail\r\n" .
    	      "MIME-Version: 1.0\r\n" .
    	         "Content-Type: multipart/mixed;\r\n" .
    	         " boundary=\"{$mime_boundary}\"";

          // text message to display in email
          $message=$body;
          // MIME boundary for email message
          $message = "This is a multi-part message in MIME format.\n\n" .
             "--{$mime_boundary}\n" .
             "Content-Type: text/html; charset=\"utf-8\"\n" .
             "Content-Transfer-Encoding: 7bit\n\n" .
          $message . "\n\n";
          $file_ary = reArrayFiles($_FILES['ssFile']);
  	      // process files
  	      foreach($file_ary as $file)
  	      {
  	         // store file information in variables
  	         $tmp_name = $file['tmp_name'];
  	         $type = $file['type'];
  	         $name = $file['name'];
  	         $size = $file['size'];
  	         // echo $tmp_name."\n\n";
  	         // if file exists
  	         if (file_exists($tmp_name))
  	         {
  	            // check to make sure it is uploaded file - not a system file
  	            if(is_uploaded_file($tmp_name))
  	            {
  	               // open file for a binary read
  	               $file = fopen($tmp_name,'rb');
  	               // read file content into a variable
  	               $data = fread($file,filesize($tmp_name));
  	               // close file
  	               fclose($file);
  	               // encode it and split it into acceptable length lines
  	               $data = chunk_split(base64_encode($data));
  	            }

  	            // insert a boundary to start the attachment
  	            // specify the content type, file name, and disposition
  				      // boundary between each file
  	            $message .= "--{$mime_boundary}\n" .
  	               "Content-Type: {$type};\n" .
  	               " name=\"{$name}\"\n" .
  	               "Content-Disposition: attachment;\n" .
  	               " filename=\"{$name}\"\n" .
  	               "Content-Transfer-Encoding: base64\n\n" .
  	            $data . "\n\n";
  	         }
  	      }
  	      // closing mime boundary - end of message
  	      $message.="--{$mime_boundary}--\n";
  	      // send email
  	      if (@mail($to, $subject, $message, $headers))
  	      {
  			    if($ssCopyEmail=='yes') { @mail($ssEmail, $subject, $message, $headers); }
            $sentMessage="Votre message a bien été envoyé.";
  		    }else{
            $sentError="Nous avons rencontré un problème lors de l'envoi de votre message.";
          }
        } ?>
        <?php if($sentMessage!='') { ?>
        <div class="alert alert-success"><?php echo "$sentMessage"; ?></div>
        <?php } ?>
        <?php if($sentError!='') { ?>
        <div class="alert alert-danger"><?php echo "$sentError"; ?></div>
        <?php } ?>
        <form id="commentForm" role="form" enctype="multipart/form-data" method="POST" action="<?php echo $PHP_SELF; ?>" >
          <input type="hidden" name="ssAct" value="send">
          <input type="hidden" name="ssIPAddress" value="<?php print $_SERVER['REMOTE_ADDR']; ?>">
          <div class="row">
            <div class="col-md-6">
              <label for="subject">Sujet</label>
              <select name="ssPurpose" id="subject" class="m-b15">
                <option value="Je recherches un véhicule" selected>Je recherches un véhicule</option>
                <option value="Je vends mon véhicule">Je vends mon véhicule</option>
                <option value="Je recherches un leasing">Je recherches un leasing</option>
                <option value="Envoi de document">Envoi de document</option>
              </select>
              <label for="exampleInputEmail1">Nom et prénom</label>
              <input type="text" class="form-control m-b15" name="ssName" value="<?php if($ssAct=='send') { echo "$ssName"; } ?>" placeholder="Nom">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="ssEmail" value="<?php if($ssAct=='send') { echo "$ssEmail"; } ?>"  class="form-control m-b15" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Téléphone</label>
                  <input type="text" name="ssPhone" value="<?php if($ssAct=='send') { echo "$ssPhone"; } ?>" class="form-control" placeholder="Téléphone">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Message</label>
                <textarea class="form-control" rows="8" name="ssMessage" value="<?php if($ssAct=='send') { echo "$ssMessage"; } ?>" placeholder="Message"></textarea>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label class="text-info">Fichiers attachés
                  <?php #if($multipleUpload=='yes') { echo "(s)"; } ?>
                </label>
                <input type="file" name="ssFile[]" style="height: 26px;">
                <?php if($multipleUpload=='yes') { ?>
                <br />
                <input type="file" name="ssFile[]" style="height: 26px;">
                <br />
                <input type="file" name="ssFile[]" style="height: 26px;">
                <?php } ?>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo "$Max_File_Size"; ?>" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="row">
                <div class="form-group col-md-8">
                  <?php $sum1=rand(1, 9); ?>
                  <?php $sum2=rand(1, 9); ?>
                  <?php $totalSum=$sum1+$sum2; ?>
                  <div style="padding-bottom:4px;">Quelle est la somme de <span class="label label-danger"><?php echo "$sum1"; ?></span> et <span class="label label-danger"><?php echo "$sum2"; ?></span> ?</div>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="ssSumMath" placeholder="Réponse" class="form-control required digits">
                  <input type="hidden" value="<?php echo "$totalSum"; ?>" name="ssMathTest">
                </div>
                <div class="form-group col-md-12">
                  <button class="site-button" type="submit">Envoyer</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
