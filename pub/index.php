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


<body>
    <?php 
        if(isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        } else {
            $lang = 'en';
        }
    ?>

    <div id="header"></div>


    <!-- +++++ Welcome Section +++++ -->
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="../img/user.jpg" alt="profile" style=" border-radius: 50%; width:  180px; height: 180px;">
                    <h1>Hi, I am Yuri Mikawa (三河 祐梨)!</h1>
                    <p>
                        <?php
                            require_once('../hidden/login_info.php');
                            $dbh = new PDO($dsn, $user, $password);

                            $stmt = $dbh->prepare("SELECT * from title");
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                if ($lang == 'ja') {
                                    echo $row['title-j'];
                                } else {
                                    echo $row['title-e'];
                                }
                            }
                        ?>
                        <!--東京大学大学院 <a href="https://www.i.u-tokyo.ac.jp/" target="_blank" rel="noopener noreferrer">情報理工学系研究科</a> システム情報学専攻 博士課程に在籍し、<a href="https://hapislab.org/" target="_blank" rel="noopener noreferrer">
                            篠田牧野研究室
                        </a>に所属しています。<br />
                        専門は<b>拡張現実ディスプレイ(Augmented Reality; AR)</b>です。現実に調和する視覚提示の実現を目指し、新しい光学システムやトラッキングマーカ、コンピュータビジョンアルゴリズムの研究開発をしています。
                        <!--Yuri Mikawa (三河 祐梨) is currently a Ph.D student of Information Physics and Computing, <a href="https://www.i.u-tokyo.ac.jp/" target="_blank" rel="noopener noreferrer">Graduate School of Information Science and Technology, The University of Tokyo</a>.
                        <br />
                        She belongs to <a href="https://hapislab.org/" target="_blank" rel="noopener noreferrer">Shinoda & Makino Laboratory</a>, and majors in visual information presentation using high-speed control system.-->
                    </p>

                </div>
                <!-- /col-lg-8 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /ww -->
    <!-- /grey -->
    <!-- +++++ Second Post +++++ -->
    <div id="white">
        <div class="container">
            <div class="row">
                <!--<div class="col-lg-8 col-lg-offset-2 centered">-->
                <div class="col-md-4">
                    <a href="news.php"><h3>TOP NEWS</h3></a>
                    <div class="row">

                    <?php
                    //require_once('../hidden/login_info.php');
                    //$dbh = new PDO($dsn, $user, $password);

                    $stmt = $dbh->prepare("SELECT * from news");
                    $stmt->execute();
                    
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $res_rev = array_reverse($result);
                    $cnt = 0;
                    foreach ($res_rev as $row) {
                    //foreach ($dbh->query('SELECT * FROM news ORDER BY index') as $row) {

                        if ($lang == 'ja') {
                            $title = $row['title-j'];
                            $text = $row['text-j'];
                        } else {
                            $title = $row['title-e'];
                            $text = $row['text-e'];
                        }
                        if (empty($title)) continue;

                        echo '<div class="col-md-8 ">';
                        echo '<p><bd>', $row['date'], '</bd></p>';

                        echo '<h4>', $title, '</h4>';
                        if (!empty($text)) {
                            echo '<p>', $text, '</p>';
                        }
                        echo '<hr></div>';
                        ++$cnt;
                        if ($cnt == 3) break;
                    }
                    ?>

                    <!--<a href="news.php">>></a>-->

                    </div>
                </div>
                <div class="col-md-8">
                    <h3>PROJECTS</h3>
                    <!--Projects-->

                    <?php
                    //require_once('../../hidden/login_info.php');
                    //$dbh = new PDO($dsn, $user, $password);
                    $cnt = 0;
                    foreach ($dbh->query('SELECT * FROM projects') as $row) {
                        if ($cnt % 3 == 0) {
                            echo '<div class="row mt centered">';
                        }

                        echo '<div class="col-sm-4"  style="vertical-align:middle;height:200px;margin:0 auto;">';

                        echo '<img class="img-responsive" style="margin: auto;" src="../img/portfolio/', $row['img'], '" alt="" />';
                        echo '<p>', (($lang == 'ja') ? $row['title-j'] : $row['title-e']), '</p>';
                        echo '</div>';

                        if ($cnt % 3 == 2) {
                            echo '</div>';
                        }

                        $cnt++;
                    }

                    ?>



                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>


    <!-- +++++ Projects Section +++++ -->

    <div class="container pt">
        <!-- /row -->
    </div>
    <!-- /container -->
    <!-- +++++ Footer Section +++++ -->


    
    
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
