<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Yuri Mikawa's Website</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
 <!--Favicons--> 
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
 <!--Google Fonts--> 
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
 <!--Bootstrap CSS File--> 
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!--Libraries CSS Files--> 
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <!--Main Stylesheet File--> 
<link href="css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>-->
<script src="js/main.js"></script>
<script src="lib/jeuqey/jquery.js"></script>
<script src="lib/jeuqey/jquery.min.js"></script>
 <!--=======================================================
  Template Name: Stanley
  Template URL: https://templatemag.com/stanley-bootstrap-freelancer-template/
  Author: TemplateMag.com
  License: https://templatemag.com/license/
=======================================================--> 


</head>
<!--<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    //共通パーツ読み込み
    $(function() {
    $("#header").load("header.html");
    $("#footer").load("footer.html");
    });
</script>-->


<body>

    <div id="header"></div>


    <!-- +++++ Welcome Section +++++ -->

    
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>NEWS</h3>
                <hr>
                <!--<p>現在在籍(在職)中のものに下線が引いてあります．</p>-->
            </div>
        </div>
        
        <div class="row">

        
            <?php
            require_once('../hidden/login_info.php');
            $dbh = new PDO($dsn, $user, $password);

            $stmt = $dbh->prepare("SELECT * from news");
            //$stmt->bindParam(':order', $order);
            //$stmt->bindParam(':direction', $direction);
            $stmt->execute();
                    
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $res_rev = array_reverse($result);

            $cnt = 0;
            foreach ($res_rev as $row) {
                echo '<div class="col-md-12 ">';
                echo '<br>';
                echo '<p><bd>', $row['date'], '</bd></p>';
                echo '<h4>', $row['title-j'], '</h4>';
                if (!empty($row['text-j'])) {
                    echo '<p>', $row['text-j'], '</p>';
                }
                echo '<hr>';
                echo '</div>';
                ++$cnt;
            }
            ?>

        </div>
    </div>

    <!-- +++++ Projects Section +++++ -->
    
    <div id="foot"></div>
  
	<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
	<script>
		$(function(){
            var url = window.location;	
            //console.log("aaa");
            //console,log(url);
        	//var path = url.pathname.split('/'); 
        	// ↑上記でも同じですが現在ページURLのパス名のみです。？以降の文字列も取得しません。
        	var path = url.href.split('/');
        	var _file_name = path.pop();
            console.log(_file_name);
            var names = _file_name.split('?');
            console.log(names);
            var file_name = names[0];
            var lang_info = 'en';
            if (names.length >= 2) {
                var lang_info = names[1];
                var langs = lang_info.split('=');
                lang_info = langs[1];
            }
            //console.log(file_name);
            //console.log(lang_info);

			$("#header").load("header.php", {filename: file_name, lang: lang_info});
			$("#foot").load("footer.html", {filename: file_name, lang: lang_info});
		});
	</script>


</body>
</html>
