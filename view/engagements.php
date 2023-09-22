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
?>
<?php
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
?>
 <?php
// file type check - allowed png, gif, jpeg, jpg, rar, zip, pdf
if($ssAct!='')
{

// view array - for testinf
// print_r( $_FILES );

// add this one line below if rar is not being accepted in system
// || strstr($_FILES['ssFile']['type'][$i], 'application/rar')!==false

// allow psd - add below if you want to allow psd files
// || strstr($_FILES['ssFile']['type'][$i], 'application/photoshop')!==false
// || strstr($_FILES['ssFile']['type'][$i], 'application/x-rar-compressed')!==false
// || strstr($_FILES['ssFile']['type'][$i], 'application/zip')!==false

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
?>
      <?php
if($_REQUEST['spam-check'] != '' && $ssAct=='send') {
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
//////////////////////
/*
if($whichFile=='' && $ssAct=='send') {
echo "<div class='alert alert-info'>This is just an info! You did not attach any file!</div>";
}
*/
?>
      <?php
// send email
if($ssAct!='' && $ssAct=='send' && $testSeries1!='false' && $fileAllow!='false' || $ssAct!='' && $ssAct=='send' && $testSeries1!='false' && $fileAllow=='false' && $whichFile=='')
{
       // attach files and send html email ////////////////////////////////////////////////////////////////

       // where email should go
	   $to="city.car.france@orange.fr";
	   // email subject
	   $subject="Envoi de dossier - ".$ssName;
	   // sender email
       $from = 'dossier@city-car.fr';

       $body = "<div style='background-color:#F4F4F4;padding:10px 0;font-family:Helvetica,Arial,sans-serif;' align='center'>
<div style='width:600px;border:1px solid #DBDBDB;border-radius:6px;background-color:#fff;'>
  <div style='background-color:#106AA8;height:100px;border-radius:6px 6px 0 0;box-shadow:0px 0px 10px 0px #ccc;border-bottom:1px solid #1067A0;'>
    <div style='float:left;' align='left'>
      <div style='color:#fff;font-size:30px;font-weight:bold;padding:24px 0 0 20px;text-shadow:2px 1px 1px #0B456C;'>City Car<em></em></div>
      <div style='color:#D7ECFB;padding:0 0 0 20px; font-size:14px;text-shadow:1px 1px 1px #0B456C;'>Demande de dossier<em></em></div>
      <div style='clear:both;'></div>
    </div>
    <div style='clear:both;'></div>
  </div>
  <div align='left' style='padding:10px 30px; text-align:justify; color:#666; font-size:13px;line-height:22px;'>
    <div style='border-bottom:1px solid #eee;margin:10px 0;'>
      <p>Cette personne cherche a vous contacter : <br /><strong>$ssName [ $ssEmail ]</strong></p>
    </div>
	<h4>Sujet: $ssPurpose Envoi de document</h4><br>
    <p><strong>Message:</strong></p>
    <p>$ssMessage Envoi de document</p>
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
		  }
		else
			{
			$sentError="Nous avons rencontré un problème lors de l'envoi de votre message.";
            }

}
?>
<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg9.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Constituer un dossier</h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
            <li class="active">Dossier</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb row END -->
<div class="section-full content-inner bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="section-head head-1">
            <span class="text-primary">City Car Services</span>
            <h3 class="h3 text-uppercase">Constitution de dossier en ligne</h3>
            <div class="dlab-separator bg-gray-dark"></div>
            <p>Vous venez de Province (Lyon, Toulouse, Strasbourg…) ou vos contraintes personnelles vous empêche de vous déplacer directement dans nos points de vente. City Car Lease vous offre la possibilité de transmettre vos documents en ligne sur notre page sécurisée en téléchargeant vos pièces depuis votre ordinateur. Dès réception de votre dossier complet nous nous engageons à vous donner une réponse sous 24H à 48H maximum.</p>
          </div>
        </div>
        <div class="col-md-8 col-md-offset-1">
          <?php if($sentMessage!='') { ?>
          <div class="alert alert-success"><?php echo "$sentMessage"; ?></div>
          <?php } ?>
          <?php if($sentError!='') { ?>
          <div class="alert alert-danger"><?php echo "$sentError"; ?></div>
          <?php } ?>
          <div class="section-content box-sort-in button-example p-t10 p-b30">
            <div class="dlab-tabs border-top bg-tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#particulier" aria-expanded="true"><i class="fa fa-user"></i> <span class="title-head"> Particulier</span></a></li>
                <li class=""><a data-toggle="tab" href="#entreprise" aria-expanded="false"><i class="fa fa-suitcase"></i>  <span class="title-head"> Entreprise</span></a></li>
                <li class=""><a data-toggle="tab" href="#liberal" aria-expanded="false"><i class="fa fa-paper-plane"></i>  <span class="title-head"> Profession libérale</span></a></li>
              </ul>
              <div class="tab-content">
                <div id="particulier" class="tab-pane bg-gray active">
                  <div class="p-l30 p-r30 clearfix">
                    <h5>Constitution du dossier particulier:</h5>
                    <div class="dzFormMsg"></div>
                    <form method="post" class="" role="form" enctype="multipart/form-data" method="POST" action="<?php echo $PHP_SELF; ?>" >
                    <input type="hidden" name="ssAct" value="send">
                    <input type="hidden" name="ssIPAddress" value="<?php print $_SERVER['REMOTE_ADDR']; ?>">
                    <input type="hidden" name="spam-check" value="" placeholder="Leave empty!">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ssName" value="<?php if($ssAct=='send') { echo "$ssName"; } ?>"  placeholder="Nom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> 
                                  <input type="email" name="ssEmail" value="<?php if($ssAct=='send') { echo "$ssEmail"; } ?>"  class="form-control"  placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="tel" name="ssPhone" value="<?php if($ssAct=='send') { echo "$ssPhone"; } ?>"  class="form-control"  placeholder="Téléphone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-id-card-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Pièce d'identité recto/verso</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-heart-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Pièce d'identité du conjoint si marié</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-files-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">3 derniers bulletins de salaire</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-bank"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Relevé d'identité banquaire original</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-list-alt"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Dernier avis d'imposition (si possible)</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
							  <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-check-square-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Justificatif de domicile (&nbsp;dernier EDF, Orange…&nbsp;)</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo "$Max_File_Size"; ?>" />
                        <div class="col-md-12">
                            <button name="submit" type="submit" value="Submit" class="site-button btn-lg btn-block"> <span>Envoyer</span> </button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div id="entreprise" class="tab-pane bg-gray">
                  <div class="p-l30 p-r30 clearfix">
                    <h5>Constitution du dossier entreprise:</h5>
                    <div class="dzFormMsg"></div>
                    <form method="post" class="" role="form" enctype="multipart/form-data" method="POST" action="<?php echo $PHP_SELF; ?>" >
                    <input type="hidden" name="ssAct" value="send">
                    <input type="hidden" name="ssIPAddress" value="<?php print $_SERVER['REMOTE_ADDR']; ?>">
                    <input type="hidden" name="spam-check" value="" placeholder="Leave empty!">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ssName" value="<?php if($ssAct=='send') { echo "$ssName"; } ?>"  placeholder="Nom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> 
                                  <input type="email" name="ssEmail" value="<?php if($ssAct=='send') { echo "$ssEmail"; } ?>"  class="form-control"  placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="tel" name="ssPhone" value="<?php if($ssAct=='send') { echo "$ssPhone"; } ?>"  class="form-control"  placeholder="Téléphone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-id-card-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Pièce d'identité recto/verso du gérant ou président</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-tag"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">K-BIS de la société de moins de 3 mois</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-bar-chart"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Dernier Bilan + Liasse Fiscale</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-bank"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Relevé d'identité banquaire original</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo "$Max_File_Size"; ?>" />
                        <div class="col-md-12">
                            <button name="submit" type="submit" value="Submit" class="site-button btn-lg btn-block"> <span>Envoyer</span> </button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div id="liberal" class="tab-pane bg-gray">
                  <div class="p-l30 p-r30 clearfix">
                    <h5>Constitution du dossier profession libérale:</h5>
                    <div class="dzFormMsg"></div>
                    <form method="post" class="" role="form" enctype="multipart/form-data" method="POST" action="<?php echo $PHP_SELF; ?>" >
                    <input type="hidden" name="ssAct" value="send">
                    <input type="hidden" name="ssIPAddress" value="<?php print $_SERVER['REMOTE_ADDR']; ?>">
                    <input type="hidden" name="spam-check" value="" placeholder="Leave empty!">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ssName" value="<?php if($ssAct=='send') { echo "$ssName"; } ?>"  placeholder="Nom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> 
                                  <input type="email" name="ssEmail" value="<?php if($ssAct=='send') { echo "$ssEmail"; } ?>"  class="form-control"  placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="tel" name="ssPhone" value="<?php if($ssAct=='send') { echo "$ssPhone"; } ?>"  class="form-control"  placeholder="Téléphone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-id-card-o"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Pièce d'identité recto/verso</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-tag"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Dernier avis<br>d'imposition</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-barcode"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Numéro<br>INSEE</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                            <div class="col-sm-12 m-b30">
                              <label class="icon-bx-wraper bx-style-1 p-a20 left">
                                <div class="icon-bx-xs radius bg-primary"> <span class="icon-cell"><i class="fa fa-bank"></i></span> </div>
                                <div class="icon-content">
                                  <p class="dlab-tilte h6 text-muted" style="font-size:19px;">Relevé d'identité banquaire original</p>
								  <input type="file" class="m-t10" name="ssFile[]" style="height: 26px;">
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo "$Max_File_Size"; ?>" />
                        <div class="col-md-12">
                            <button name="submit" type="submit" value="Submit" class="site-button btn-lg btn-block"> <span>Envoyer</span> </button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
