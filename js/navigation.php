<header class="header">
        <div class="wrapper">
            <div class="header__body">
                <a href="index.php" class="header__logo">
                    <img src="../img/logo/logo.jpg" alt="logotip">
                </a>
				<div class="header__burger">
                    <span></span>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li>
                            <a href="index.php" class="headerr__item">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="index.php#orgcom" class="headerr__item">
								Оргкомитет
                            </a>
                        </li>
                        <li>
                            <a href="index.php#newconf" class="headerr__item">
								Анонсы
                            </a>
                        </li>
                        <li>
                            <a href="el_collection.php" class="headerr__item">
								Сборники материалов
                            </a>
                        </li>
                        <li>
							<div class = "block__title">
								<a href="#" class="headerr__item item_archive">
									Архив конференций
                            	</a>
							</div>
                            
							<ul class = "ul_podli">
								<?php
									include "connect.php";
									$year = mysqli_query($connect,"SELECT * FROM `years`");
									while(($row = mysqli_fetch_assoc($year)) != false){
										echo "<li class='nav__item'><a class='headerr__item' href='blog.php?year=".$row["ID_year"]."'>".$row["year"]."</a>";
									}
								?>
							</ul>
                        </li>
                        <li>
                            <a href="index.php#contact" class="headerr__item">
							Контакты
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
			<div class = "crumbs"><?php bread ();?></div>
        </div>
    </header>






    