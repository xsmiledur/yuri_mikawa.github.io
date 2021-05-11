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

    <!-- +++++ Projects Section +++++ -->

    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>EDUCATION</h3>
                <hr>
                <p>
                <?php
                    if ($lang == 'ja') {
                        echo "現在在籍(在職)中のものに下線が引いてあります．";
                    } else {
                        echo "Those currently enrolled (working) are underlined.";
                    }
                
                ?></p>
            </div>
        </div>
        


        <?php
            require_once('../hidden/login_info.php');
            $dbh = new PDO($dsn, $user, $password);
        ?>
            
        <div class="row">
            <div class="col-lg-12">
                <h3>学歴</h3>
                <table style="text-align:left">
                    <?php
                        function white_list(&$value, $allowed, $message) {
                            if ($value === null) {
                                return $allowed[0];
                            }
                            $key = array_search($value, $allowed, true);
                            if ($key === false) { 
                                throw new InvalidArgumentException($message); 
                            } else {
                                return $value;
                            }
                        }
                        echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br/>';


                        echo 'e<br/>';
                        $order = white_list($order, ["index"], "Invalid field name");
                        $dirc = white_list($dirc, ["DESC", "ASC"], "Invalid field name");
                        //$sql = "SELECT * from education WHERE type = :type ORDER BY index DESC";
                        $sql = "SELECT * from education WHERE type = :type ORDER BY :order DESC";
                        //$sql = "SELECT * from education WHERE type = ? ORDER BY '.$order.' '.$dirc.'";
                        echo $order, '<br/>';
                        echo $dirc, '<br/>';
                        echo $sql, '<br/>';
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue(':type', 'academic', PDO::PARAM_STR);
                        $stmt->bindValue(':order', 1, PDO::PARAM_INT);
                        //$stmt->bindValue(':dirc', 'DESC', PDO::PARAM_STR);
                        //$stmt->execute(['academic', 'index', 'DESC']);
                        //$stmt->execute(['academic']);
                        $stmt->execute();
                            
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
            
                            $period = $row['period'];
                            $now = $row['now'];
                            $usta = ($now ? '<u>' : '');
                            $uend = ($now ? '</u>' : '');
                            if ($lang == 'ja') {
                                $title = $row['title-j'];
                            } else {
                                $title = $row['title-e'];
                            }

                            echo '<tr>';
                            echo '<td>', $usta, $period, $uend, '</td>';
                            echo '<td>', $usta, $title, $uend, '</td>';
                            echo '</tr>';

                        }
                    ?>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <!--<div class="mt">-->
                <h3>学歴</h3>
                <table style="text-align:left">
                    <tr>
                        <td><u>2021.04 - 2023.03</u></td>
                        <td><u>日本学術振興会特別研究員DC2</a></u></td>

                    </tr>
                    <tr>
                        <td><u>2020.04 - 現在</u></td>
                        <td><u>東京大学 大学院情報理工学系研究科 システム情報学専攻 博士後期課程 (<a href="https://hapislab.org/" target="_blank" rel="noopener noreferrer">篠田牧野研究室)</a></u></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 50px;">2018.04 - 2020.03</td>
                        <td>東京大学 大学院情報理工学系研究科 システム情報学専攻 修士課程 (<a href="http://www.ishikawa-vision.org/index-j.html" target="_blank" rel="noopener noreferrer">石川妹尾研究室</a>)</td>
                    </tr>
                    <tr>
                        <td>2016.04 - 2018.03</td>
                        <td>東京大学 工学部 計数工学科 システム情報工学コース (篠田牧野研究室)</td>
                    </tr>
                    <tr>
                        <td>2014.04 - 2016.03</td>
                        <td>東京大学 教養学部 理科Ⅰ類</td>
                    </tr>
                    <tr>
                        <td>2011.04 - 2014.03</td>
                        <td>東京都立西高等学校 普通科</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">

                <h3>RA/TA</h3>

                <table style="text-align:left">
                    <tr>
                        <td>2020.10 - 2021.03</td>
                        <td>東京大学 大学院新領域創成科学研究科 篠田牧野研究室 リサーチアシスタント(RA)</td>
                    </tr>
                    <tr>
                        <td>2020.05 - 2021.02</td>
                        <td>東京大学 情報基盤センター 石川グループ研究室 技術補佐員</td>
                    </tr>
                    <tr>
                        <td>2020.04 - 2021.03</td>
                        <td>東京大学 大学院情報理工学系研究科 博士学生特別リサーチアシスタント(IST-RA)</td>
                    </tr>
                    <tr>
                        <td>2018.04 - 2020.03</td>
                        <td>東京大学 大学院情報理工学系研究科 石川妹尾研究室 技術補佐員</td>
                    </tr>

                    <tr>
                        <td style="padding-right:50px"><u>2018.09 - 2019.08, 2020.04 - </u></td>
                        <td><u>東京大学 工学部計数工学科ティーチングアシスタント(TA)</u></td>
                    </tr>

                    <!--<tr>
        <td style="padding-right: 50px;"><u>2020.04 - 2020.08</u></td>
        <td><u>東京大学 工学部計数工学科ティーチングアシスタント</u></td>
    </tr>-->
                    <tr>
                        <td>2018.04 - 2019.03</td>
                        <td>新規渡日留学生(特別研究学生) チューター</td>
                    </tr>
                </table>
            </div>

            <div class="col-lg-12">

                <h3>海外留学</h3>
                <table style="text-align:left">
                    <tr>
                        <td>2019.03</td>
                        <td>国立台湾大学 短期訪問</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 50px;">2016.01 - 2016.02</td>
                        <td>カリフォルニア大学 サンディエゴ校(UCSD) 短期留学</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">
                <h3>助成金</h3>
                <table style="text-align:left">
                    <tr>
                        <td>2021.01 - 2021.12</td>
                        <td>Microsoft Research Asia Collavorative Research for PhD Student 2021 (D-CORE 2021) [JPY 1,070,000]</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">

                <h3>奨学金</h3>
                <table style="text-align:left">
                    <tr>
                        <td style="padding-right: 50px;">2020.04 - 2021.03</td>
                        <td>東京大学トヨタ・ドワンゴ高度人工知能人材奨学金 [JPY 1,200,000]</td>
                    </tr>
                    <tr>
                        <td>2019.04 - 2020.03</td>
                        <td>日本学生支援機構 第一種奨学金</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">
                <h3>所属学会</h3>
                <ul>
                    <li>日本バーチャルリアリティ学会</li>
                </ul>
            </div>

            <div class="col-lg-12">
                <h3>インターンシップ</h3>
                <table style="text-align:left">
                    <tr>
                        <td>2019.10 - 2020.12</u></td>
                        <td>株式会社Sapeet 三次元画像計測リサーチエンジニア</td>
                    </tr>
                    <tr>
                        <td style="padding-right:50px">2019.01 - 2019.09</td>
                        <td>Pretia株式会社 画像処理リサーチエンジニア</td>
                    </tr>
                    <tr>
                        <td>2018.08 - 2018.12</td>
                        <td>株式会社メルカリ R4D xRチーム サマーインターンシップ/長期インターンシップ</td>
                    </tr>
                    <tr>
                        <td>2018.04 - 2019.03</td>
                        <td>株式会社Qoncept 画像処理リサーチエンジニア</td>
                    </tr>

                    <tr>
                        <td>2017.10 - 2018.03</td>
                        <td>株式会社南国ソフト VR/ARエンジニア</td>
                    </tr>
                    <tr>
                        <td>2016.09 - 2017.09</td>
                        <td>NODE株式会社 Webエンジニア</td>
                    </tr>
                </table>
            </div>
            

            <div class="col-lg-12">
                <h3>スキル</h3>
                太字: 非常に頻繁に使っているもの、細字: 昔使っていた/今勉強中のもの.
                <ul>
                <li>プログラミング言語: <b>C++,MATLAB</b>, C#, Python, HTML, CSS, PHP, JavaScript</li>
                <li>プログラミングライブラリ: <b>OpenCV, OpenGL(glsl,glfw,glew), imgui,Eigen</b>,Qt</li>
                <li>ソフトウェア: <b>Adobe Illustrator, Photoshop, Premiere Pro, Autodesk Fusion 360</b>, Unity</li>
                <li>ハードウェア: <b>産業用カメラ,プロジェクタ</b>, HoloLens1. 電子工作,AUTD3</li>
                </ul>
            </div>

            <div class="col-lg-12">
                <h3>資格等</h3>

                <table style="text-align:left">
                    <tr>
                        <td style="padding-right:50px">2021.04</td>
                        <td>知的財産管理技能検定２級</td>
                    </tr>
                    <tr>
                        <td style="padding-right:50px">2017</td>
                        <td>実用数学検定１級（計算技能）</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /row -->
    </div>
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
