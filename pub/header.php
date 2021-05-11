    <!-- Static navbar -->
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">YURI MIKAWA</a>
        </div>
        <div class="navbar-collapse collapse">
        
            <ul class="nav navbar-nav navbar-right">

                <?php 
                    $lang = (isset($_POST['lang']) ? $_POST['lang'] : 'en');
                    //echo $_POST['lang'];
                    //echo $lang;
                    $new_lang = ($lang == 'en') ? 'JA' : 'EN';
                    $new_lang_s = ($lang == 'en') ? 'ja' : 'en';
                    //echo $new_lang, " ", $new_lang_s;
                    $filename = (isset($_POST['filename']) ? $_POST['filename'] : 'index.php');
                    //echo $filename;
                    //echo $_POST['filename'];


                    echo '<li><a href="index.php?lang=', $lang, '">TOP</a></li>';
                    echo '<li><a href="news.php?lang=', $lang, '">NEWS</a></li>';
                    echo '<li><a href="education.php?lang=', $lang, '">EDUCATION</a></li>';
                    echo '<li><a href="publication.php?lang=', $lang, '">PUBLICATION</a></li>';
                    echo '<li><a href="movies.php?lang=', $lang, '">MOVIES</a></li>';
                
                    echo '<li><a href="', $filename , '?lang=', $new_lang_s, '" style="color:pink">', $new_lang, '</a></li>';
                //<li><a href="news.php">NEWS</a></li>
                //<li><a href="education.php">Education</a></li>
                //<li><a href="publication.php">Publication</a></li>
                //<li><a href="movies.php">MOVIES</a></li>
                //<!--<li><a href="../en/index.php" style="color:pink">EN</a></li>-->

                ?>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>