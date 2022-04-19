<header class="header">
        <div class="wrapper">
            <div class="header__body">
                <a href="index.php" class="header__logo">
                    <img src="../img/logo/logo.jpg" alt="logotip">
                </a>
                <div class = "header__burger__all">
                    <div class="header__burger">
                        <span></span>
                    </div>
                    
                    <a href="index.php" class="header__logo__burger">
                        <img src="../img/logo/logo.jpg" alt="logotip">
                    </a>
                   
                    <ul>
                        <li class = "lang_link">
                            <a href="?lang=ru"   class="header__item__burger">RU</a>
                            <a href="?lang=en" class="header__item__burger">EN</a>
                        </li>
                    </ul>
                    <a href="#popup" class = "connect"><img src="/img/connect_header/connect.svg"></a>
                </div>
				
                <nav class="header__menu">
                    <ul class="header__list">
                        <li>
                            <a href="index.php" class="headerr__item a">
                                <?php
                                    echo name('main');
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="index.php#orgcom" class="headerr__item a">
                                <?php
                                    echo name('organizing_committee');
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="index.php#newconf" class="headerr__item a">
                                <?php
                                    echo name('announcements');
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="el_collection.php" class="headerr__item">
                                <?php
                                    echo name('collections_materials');
                                ?>
                            </a>
                        </li>
                        <li>
							<div class = "block__title">
								<a href="#" class="headerr__item item_archive">
                                    <?php
                                        echo name('conference_archive');
                                    ?>
                            	</a>
							</div>
                            
							<ul class = "ul_podli">
								<?php
									include "connect.php";
                                    $Date = mysqli_query($connect,"SELECT  conf.`ID_year`, dat.`date_from` FROM `conferences` conf LEFT JOIN `dates` dat ON conf.`ID_conf` = dat.`ID_conf` WHERE DATE(`date_from`) >= CURDATE()");
                                    $Date = mysqli_fetch_assoc($Date);
									$year = mysqli_query($connect,"SELECT * FROM `years` WHERE `ID_year` <=".$Date["ID_year"]);
									while(($row = mysqli_fetch_assoc($year)) != false){
										echo "<li class='nav__item'><a class='headerr__item' href='blog.php?year=".$row["ID_year"]."'>".$row["year"]."</a>";
									}
								?>
							</ul>
                        </li>
                        <li>
                            <a href="index.php#contact" class="headerr__item a">
							    <?php
                                    echo name('contacts');
                                ?>
                            </a>
                        </li>
                        <li class = "lang_link_menu">
                            <!-- <a href="#" id = "ru" class="headerr__item lang">RU</a>
                            <a href="#" id = "en" class="headerr__item lang">EN</a> -->
                            <a href="?lang=ru" class="headerr__item lang">RU</a>
                            <a href="?lang=en" class="headerr__item lang">EN</a>
                        </li>
                         <li>
                            <a href="#popup" class = "headerr__item connect c">
                            <?php echo name('contact')?>
                                <img src="/img/connect_header/connect.svg"></a>
                        </li>
                        <li>
                            <a href="sign_in.php"><img src="adminPanels/img/icon/exit.svg" alt="sign in/sign up">
                                <?php
                                    if( !isset($_SESSION) ) {
                                        session_start();
                                    }
                                    if( isset($_SESSION['user']) ) {
                                        $user_name = mysqli_query( $connect, "SELECT name_us FROM users WHERE ID_user = ".$_SESSION['user'] );
                                        $user_name = mysqli_fetch_assoc($user_name)['name_us'];
                                        print("<span title='Exit'>".$user_name."</span>");
                                    }
                                ?>
                            </a>
                        </li>
                    </ul>              
                </nav>
                           
            </div>
			<div class = "crumbs"><?php bread ();?></div>
        </div>     
    </header>
    <div id="popup" class="popup ob_c">
        <div class="popup__body">
            <div class="popup__content">
                <a href="#header" class="popup__close">X</a>
                <div class="popup__tytle">
                    <p>Обратная связь</p>
                </div>
                <div class="popup__text">
                    <p>Здесь Вы можете задать интересующие Вас вопросы, выразить свое мнение о наших конференциях или оставить предложение.</p>
                    <p>Заполните необходимые поля в приведенной ниже форме и нажмите кнопку «Отправить». Мы свяжемся с Вами.</p>
                    <p>Спасибо за Ваш интерес!</p>
                </div>
                <form class="popup__form" action="mail.php" method="POST">
                    <label>
                        Ваше имя
                        <br>
                        <input type="text" name = "name">
                    </label>
                    <label>
                        Ваш email
                        <br>
                        <input type="email" name = "email">
                    </label>
                    <label>
                        Ваше сообщение
                        <br>
                        <textarea name="text" id="" cols="30" rows="10"></textarea>
                    </label>
                    <button type="submit" class = "but__modal">Отправить</button>
                </form>
            </div>
        </div>
    </div>





    