-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 21 2022 г., 16:59
-- Версия сервера: 5.6.51
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mgimonew`
--

-- --------------------------------------------------------

--
-- Структура таблицы `committee`
--

CREATE TABLE `committee` (
  `ID_per` int(11) NOT NULL,
  `name_per_ru` text NOT NULL,
  `name_per_en` text,
  `photo_per` text NOT NULL,
  `link_per_ru` text NOT NULL,
  `link_per_en` text NOT NULL,
  `position_ru` text NOT NULL,
  `position_en` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `committee`
--

INSERT INTO `committee` (`ID_per`, `name_per_ru`, `name_per_en`, `photo_per`, `link_per_ru`, `link_per_en`, `position_ru`, `position_en`) VALUES
(56, 'Мальгин Артем Владимирович', 'Artem V. Malgin', 'orgcom/malgin-6.jpg', 'https://mgimo.ru/people/malgin/', 'https://english.mgimo.ru/people/malgin', 'Проректор по развитию — руководитель аппарата Ректора\r\n', 'Vice-Rector for Strategic Development - Chief of the Rector\'s Office'),
(57, 'Козловская Елена Александровна', 'Elena A. Kozlovskaya', 'orgcom/kozlovskaya.jpg', 'https://mgimo.ru/people/kozlovskaya/', 'https://mgimo.ru/people/kozlovskaya/', 'Директор Одинцовского филиала МГИМО', 'Director of MGIMO’s Odintsovo branch'),
(58, 'Иконникова Валентина Александровна', 'Valentina A. Ikonnikova', 'orgcom/ikonnikova.jpg', 'https://mgimo.ru/people/ikonnikova/', 'https://english.mgimo.ru/people/ikonnikova', 'Декан факультета лингвистики и межкультурной коммуникации\r\n', 'Dean of the School of Linguistics and Cross-Cultural Communication'),
(59, 'Паршина Наталья Дмитриевна', 'Natalya D. Parshina ', 'orgcom/parshina.jpg', 'https://mgimo.ru/people/parshina/', 'https://english.mgimo.ru/people/parshina', 'Заведующая кафедрой лингвистики и переводоведения', 'Head of the Department of Linguistics and Translation&Interpreting Studies'),
(60, 'Полевая Ольга Владимировна', 'Olga V. Polevaya ', 'orgcom/polevaya4.jpg', 'https://mgimo.ru/people/polevaya/', 'https://english.mgimo.ru/people/polevaya', 'Заведующая кафедрой иностранных языков\r\n', 'Head of Foreign Languages Department');

-- --------------------------------------------------------

--
-- Структура таблицы `conferences`
--

CREATE TABLE `conferences` (
  `ID_conf` int(11) NOT NULL,
  `Name_conf_ru` text NOT NULL,
  `Name_conf_en` text,
  `ID_year` int(11) NOT NULL,
  `info_ru` text NOT NULL,
  `info_en` text NOT NULL,
  `main_photo` text NOT NULL,
  `anons_name_ru` text NOT NULL,
  `anons_name_en` text NOT NULL,
  `info_anons_ru` text NOT NULL,
  `info_anons_en` text NOT NULL,
  `an_conception_ru` text NOT NULL,
  `an_conception_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `conferences`
--

INSERT INTO `conferences` (`ID_conf`, `Name_conf_ru`, `Name_conf_en`, `ID_year`, `info_ru`, `info_en`, `main_photo`, `anons_name_ru`, `anons_name_en`, `info_anons_ru`, `info_anons_en`, `an_conception_ru`, `an_conception_en`) VALUES
(65, 'Научно-практический межвузовский семинар «Язык. Культура. Перевод» с успехом прошел на Факультете лингвистики и межкультурной коммуникации МГИМО-Одинцово', 'Practical Science Inter-University Seminar  \"Language. Culture. Translation\" was successfully held by the School of Linguistics and Cross-Cultural Communication of MGIMO-Odintsovo', 1, '21 марта на Факультете лингвистики и межкультурной коммуникации Одинцовского филиала МГИМО состоялся научно-практический межвузовский семинар «Язык. Культура. Перевод». \r\n\r\nОткрыла семинар от имени организационного комитета и выступила в качестве модератора пленарного заседания заведующий кафедрой английского языка, доктор педагогических наук К.Г. Чикнаверова.\r\n\r\n   С приветственным словом к докладчикам и слушателям обратился директор Одинцовского филиала МГИМО, кандидат филологических наук, Заслуженный работник высшего образования С.К. Васильев. В своем выступлении Сергей Константинович отметил возрастающую значимость английского языка как средства межкультурной коммуникации в современном мире и рассказал о преподавании иностранных языков в филиале, в том числе на новых направлениях подготовки в бакалавриате.\r\n\r\n   Большой интерес участников семинара вызвал пленарный доклад профессора М.Я. Блоха, доктора филологических наук, почетного профессора и заведующего кафедрой грамматики английского языка Московского педагогического государственного университета (МПГУ) на тему «Родной язык и два его кардинальных воплощения».\r\n\r\n   В рамках пленарного заседания с докладом на тему «Интернациональная ономастическая терминология экономического знания» также выступила Е.М. Какзанова, доктор филологических наук, профессор Российского университета дружбы народов (РУДН).\r\n\r\n   Во второй части семинара участники продолжили работу в формате круглого стола в двух секциях.\r\n\r\n   Первая секция была посвящена исследованию научного дискурса и проблемам современного терминоведения. Работа в секции шла под руководством Л.М. Босовой, профессора кафедры английского языка.\r\n\r\n   Участники секции выступили с докладами на темы: «Соотношение общих, специальных и терминологических языковых единиц на разных этапах эволюции правовой лексики» (Е.П. Попова, к.ф.н., старший преподаватель кафедры иностранных языков Российского государственного университета правосудия), «Политический дискурс как основа политической коммуникации» (Л.М. Босова, д.ф.н., профессор кафедры английского языка Одинцовского филиала МГИМО, А.Н. Диденко, старший преподаватель кафедры английского языка), «Индивидуально-авторское своеобразие научных текстов» (В.В. Зуева, к.ф.н., доцент кафедры английского языка Одинцовского филиала МГИМО), «Британские термины высшего образования с культурным компонентом значения» (Ю.Б. Цверкун, старший преподаватель кафедры английского языка Одинцовского филиала МГИМО).\r\n\r\n   Вторая секция в своей работе рассмотрела различные вопросы переводоведения и методики преподавания иностранных языков вузе. Председателем секции стала Е.Е. Бухтеева, доцент кафедры иностранных языков.\r\n\r\n   Выступления докладчиков охватывали следующие темы: «К проблеме культуры учебной деятельности» (Е.Е. Бухтеева, к.пед.н., доцент кафедры иностранных языков Одинцовского филиала МГИМО), «Место лингвистической теории в общеевропейском стандарте подготовки переводчиков European Master’s in Translation» (С.К. Павликова, к.ф.н., заведующий кафедрой лингвистики и межкультурной коммуникации), «Этимология топонимов немецкого языка в лингвистическом аспекте» (Е.С. Колягина, старший преподаватель кафедры иностранных языков), «Специфика перевода английских звукоподражаний на русский язык в детском анимационном фильме» (В.С. Лукьянова, к.ф.н., доцент кафедры английского языка, О.А. Колоскова, старший преподаватель кафедры английского языка), «Проверка сформированности умений чтения в формате “множественный выбор”» (О.А. Гринько, преподаватель кафедры английского языка).\r\n\r\n   В межвузовском семинаре в качестве слушателей приняли активное участие преподаватели кафедр Факультета лингвистики и межкультурной коммуникации, студенты магистратуры и бакалавриата. Презентации докладов сопровождались обсуждением вопросов практического применения результатов научных исследований в переводческой и преподавательской работе.', 'On March 21, the School of Linguistics and Cross-cultural Communication of the Odintsovo branch of MGIMO hosted a practical science interuniversity seminar \"Language. Culture. Translation\".\r\n\r\nThe head of the English language Department, Doctor of Pedagogical Sciences K.G. Chiknaverova opened the seminar on behalf of the organizing committee and acted as moderator of the plenary session.\r\n\r\nThe director of the Odintsovo branch of MGIMO, Candidate of Philological Sciences, Honored Worker of Higher Education S.K. Vasiliev addressed the speakers and listeners with a welcoming speech. In his speech, Sergey Konstantinovich noted the increasing importance of the English language as a means of cross-cultural communication in the modern world and spoke about the teaching of foreign languages in the Odintsovo branch, including new areas of bachelor\'s degree training.\r\n\r\nThe plenary report of Professor M.Ya. Bloch, Doctor of Philology, Honorary Professor and Head of the Department of English Grammar of Moscow Pedagogical State University (MPSU) on the topic \"Native language and its two cardinal embodiments\" aroused great interest among the participants of the seminar.\r\n\r\nDuring the plenary session, a report on the topic \"International onomastic terminology of economic knowledge\" was also made by E.M. Kakzanova, Doctor of Philology, Professor of the Peoples\' Friendship University of Russia (RUDN).\r\n\r\nIn the second part of the seminar, the participants continued their work in the format of a round table in two sections.\r\n\r\nThe first section was devoted to the study of scientific discourse and the problems of modern terminology. The work in the section was led by L.M. Bosova, Professor of the English Language Department.\r\n\r\nThe participants of the section made presentations on the following topics: \"The ratio of general, special and terminological linguistic units at different stages of the evolution of legal vocabulary\" (E.P. Popova, Ph.D., Senior Lecturer of the Department of Foreign Languages of the Russian State University of Justice), \"Political Discourse as the basis of political communication\" (L.M. Bosova, Ph.D., Professor of the English Language Department of the Odintsovo Branch of MGIMO, A.N. Didenko, Senior Lecturer of the English Language Department), \"Individual authorial originality of scientific texts\" (V.V. Zueva, Ph.D., Associate Professor of the English Language Department of the Odintsovo Branch of MGIMO), \"British terms of higher education with a cultural component of meaning\" (Yu.B. Tsverkun, Senior lecturer at the English Language Department of the Odintsovo branch of MGIMO).\r\n\r\nThe second section focused on a number of translation studies issues and methods of foreign language teaching at a university. The section was chaired by E.E. Bukhteeva, Associate Professor of the Department of Foreign Languages.\r\n\r\nThe topics included the following: \"To the problem of academic activities’ culture\" (E.E. Bukhteeva, Candidate of Pedagogical Sciences, Associate Professor of the Department of Foreign Languages at Odintsovo branch of MGIMO University), \"The Role of the Linguistic Theory in the Eurostandard  European Master’s in Translation\" (S.К. Pavlikova, PhD in Philology, Head of the Department of Linguistics and Cross-Cultural Communication), \"Этимология топонимов немецкого языка в лингвистическом аспекте\" (E.S. Kolyagina, Senior lecturer of the Department of Foreign Languages), \"Peculiarities of translating English sound symbolism into Russian in cartoon animation for children\" (V.S. Lukyanova, PhD in Philology, Associate Professor of the English Language Department, О.А. Koloskova, Senior lecturer of the English Language Department), \"Testing reading skills with the help of ‘multiple choice’ tasks\" (O.A. Grinko, Lecturer of the English Language Department).\r\n\r\nBachelor’s, Master’s degree students and lecturers of the departments of the School of Linguistics and Cross-Cultural Communication took an active part in the interuniversity seminar as listeners. The presentations of the reports were accompanied by a discussion of the practical application of the results of scientific research in translation and teaching.\r\n\r\n', 'konf/2018.03.21/centralphoto/IMG_0882.jpg', 'Приглашаем принять участие в межвузовском семинаре', 'Invitation to participate an inter-university seminar', 'Уважаемые коллеги!\r\n\r\nФакультет лингвистики и межкультурной коммуникации приглашает вас принять участие в научно-практическом межвузовском семинаре «ЯЗЫК. КУЛЬТУРА. ПЕРЕВОД», который состоится 21 марта 2018 года в 11.00 по адресу: г. Одинцово, ул. Ново-Спортивная, д. 3., ауд. 542\r\n\r\nВ программе семинара: доклады по лингвистике и методике преподавания иностранных языков и культур.', 'Dear colleagues! \r\n\r\nSchool of Linguistics and Cross-Cultural Communication invites you to participate in an inter-university practical science seminar “LANGUAGE. CULTURE. TRANSLATION” on March 21, 2018 (11.00) at: Odintsovo, Novo-Sportivnaya Street, 3 (room 542). \r\n\r\nThe seminar format will include: reports on linguistics, and methods of teaching languages and cultures.', '', ''),
(69, 'В МГИМО-Одинцово прошла конференция «Язык. Культура. Перевод»', 'Conference \"Language. Culture. Translation\" took place at MGIMO-Odintsovo ', 2, '20 февраля в МГИМО-Одинцово под председательством декана факультета Лингвистики и межкультурной коммуникации В.А. Иконниковой состоялась всероссийская научно-практическая конференция «Язык. Культура. Перевод».\r\n\r\nДиректор Одинцовского кампуса МГИМО С.К. Васильев, комментируя работу конференции отметил:\r\n- Проведение такой конференции именно в МГИМО, особенно в его Одинцовском филиале, имеет для нас важное значение: впервые в университете МГИМО начата подготовка переводчиков. Вы знаете, что в МГИМО преподаются 53 иностранных государственных языка, благодаря чему МГИМО попал в книгу Рекордов Гиннеса. Но лишь два года назад в нашем филиале был создан факультет Лингвистики и межкультурной коммуникации. За этот короткий период существования факультета в его деятельности произошло много интересных и важных событий. Его создание повлияло на систему преподавания иностранных языков в МГИМО в целом.\r\nВместе с тем, современный образовательный процесс выдвигает новые требования к переводу, обучению в рамках болонского процесса, интернационализации образования и межкультурной коммуникации.\r\nМы хотим, чтобы Одинцовский филиал МГИМО стал интересной и инновационной площадкой для отечественных и зарубежных филологов.\r\n\r\nВ рамках мероприятия прозвучали доклады представителей ведущих лингвистических вузов постсоветского пространства, затрагивающие такие темы, как русская терминография, лингвострановедение, использование иностранного языка как средства академической мобильности и многие другие. В ходе секций конференции поднимались вопросы внедрения профессиональной терминологии, межкультурной коммуникации, теории и практики перевода, а также современного литературоведения, обучения иностранным языкам.\r\nУчастники конференции имели возможность принять участие в мастер-классе «Использование видеофильмов при обучении устному переводу на слух» и в круглых столах «Актуальные процессы в современном русском языке», «Роль мотивации в обучении иностранному языку».\r\n\r\nЗаместитель директора по языковой подготовке МГИМО – Одинцово Ирина Александровна Мазаева:\r\n- Для нас это очень важное событие. В рамках развивающегося факультета Лингвистики и межкультурной коммуникации надеемся, что эта конференция будет определенным важным событием в научной жизни МГИМО, чтобы мы смогли полноправно включиться в большой многоголосый научный хор лучших языковых школ Москвы и России. Хочу отметить, что МГИМО в строительстве своих языковедческих школ идет необычным путем, который отличается от школ педагогических вузов, многие из которых готовят переводчиков.\r\nМГИМО отличается тем, что за долгие годы накопил потрясающую практическую составляющую подготовки переводчиков в дипломатической, в межкультурной сфере. И мы надеемся, что аккумулируя все значимые, и эффективные методики обучения иностранным языкам в сфере подготовки переводчиков высокого класса, мы создадим свою лингвистическую школу.\r\n\r\nДекан факультета лингвистики и межкультурной коммуникации Валентина Александровна Иконникова, комментируя итоги конференции, отметила:\r\n\r\n- В Одинцовском филиале МГИМО впервые проводится столь крупная конференция по лингвистике, которая вызвала большой интерес у широкой аудитории еще на стадии подготовки.\r\nМы очень рады, что нам поступило более 50-ти заявок на выступления с докладами, проведение круглых столов и мастер-классов. Заявки поступили как от известных лингвистов, переводчиков и теоретиков: терминоведов, лингвокультурологов, специалистов по когнитивной лингвистике и методике преподавания иностранных языков и русского как иностранного, так и от слушателей магистратуры и аспирантуры.\r\nАктивное участие в работе конференции приняли переводчики-практики и профессорско-преподавательский состав филиала.\r\nДля нас особая честь принимать докладчиков Пленарного заседания – известных как в России, так и в мировой лингвистике: Почетного профессора МПГУ М.Я. Блоха, главного научного сотрудника Института русского языка им. В.В. Виноградова РАН С.Д. Шелова и старшего научного сотрудника кафедры франзуского языка МГИМО МИД России, лауреата государственной премии, кавалера ордена \"Пальмовая ветвь\" Французской Республики профессора Л.Г. Веденину.\r\nЦель нашей конференции – стать площадкой для научно-практической работы в области языкознания, прикладных исследований, практики перевода и преподавания иностранных и родного языков. Мы надеемся, что конференция позволит заявить о новой точке на карте России, которая станет форумом для обсуждения проблем языковой политики, межкультурной коммуникации, лингвистических методов обработки цифровых запросов в сети и так далее.\r\nФакультет лингвистики и межкультурной коммуникации Одинцовского филиала МГИМО динамично развивается и привлекает внимание как слушателей на программы бакалавриата и магистратуры, так представителей ведущих направлений современного языкознания.\r\nСотрудничество в области лингвистики с ведущими научно-исследовательскими институтами Российской академии наук, Университетами Курска, Перми, Владивостока, Москвы и другими известными научными школами обогащает образовательную среду кампуса, дает бесценных опыт как студентам, так и преподавателям.\r\nМы планируем, что в следующем году конференция станет международной, и в ней примут участие наши партнеры и коллеги из США, Финляндии, Италии и других стран.\r\n\r\nКроме того, в конференц-зале библиотеки прошла встреча профессора Л.Г. Ведениной с преподавателями иностранных языков, вызвавшая живой интерес аудитории. Людмила Георгиевна передала в дар Библиотеке и факультету лингвистики часть своей личной уникальной библиотеки, включая авторские труды.\r\n\r\nВ.В. Женченко, Дальневосточный федеральный государственный университет:\r\n- Сегодня состоялось замечательное мероприятие: Конференция «Язык. Культура. Перевод». Я стала свидетелем прекрасных информативных докладов, которые представили наши коллеги, как из Одинцовского филиала МГИМО, так и из других учебных заведений России. Конференция была очень хорошо организована, прошла на высоком уровне. Я почерпнула очень много новой информации по межкультурной коммуникации, по проблемам лингвистики, лингвострановедения и т.д. Это была замечательная возможность увидеть мэтров, которые занимаются изучением языка и всех его аспектов.', 'On February 20, All-Russian Practical Science Conference \"Language. Culture. Translation\" was held at MGIMO-Odintsovo under the chairmanship of V.A. Ikonnikova - the Dean of the School of Linguistics and Cross-Cultural Communication.\r\n\r\nThe director of the Odintsovo MGIMO campus, S.K. Vasiliev, commenting on the work of the conference, noted:\r\n- Holding such a conference at MGIMO, especially in its Odintsovo branch, is of great importance for us: training of translators has begun at MGIMO University for the first time. You know that 53 foreign state languages are taught at MGIMO, thanks to which MGIMO got into the Guinness Book of  World Records. But only two years ago, the School of Linguistics and Cross-Сultural Communication was established in our branch. During this short period of the faculty\'s existence, many interesting and important events took place. Its creation influenced the system of teaching foreign languages at MGIMO as a whole.\r\n\r\nAt the same time, the modern educational process puts forward new requirements for translation, learning within the Bologna process, internationalization of education and cross-cultural communication.\r\n\r\nWe want the Odintsovo branch of MGIMO to become an interesting and innovative platform for domestic and foreign philologists.\r\n\r\nThe event featured talks by representatives of the leading linguistic universities of the post-Soviet space, touching on such topics as Russian terminography, linguistics and cultural studies, the use of a foreign language as a means of academic mobility and many others. During the sessions of the conference, issues of implementing professional terminology, cross-cultural communication, theory and practice of translation, as well as modern literary studies, teaching foreign languages were raised.\r\n\r\nThe conference participants had the opportunity to take part in the master class \"The use of films in teaching interpretation\" and in the round tables \"Current processes in the modern Russian language\", \"The role of motivation in teaching a foreign language\".\r\n\r\nIrina Aleksandrovna Mazaeva, Deputy Director for Language Training at MGIMO – Odintsovo: \r\n- This is a very important event for us. As a project of the developing School of Linguistics and Cross-Cultural Communication, we hope that this conference will become an important event in the scientific life of MGIMO, so that we can in our own right join the large multi-voiced scientific choir of the best language schools in Moscow and Russia. I would like to note that MGIMO is following an unusual path in the construction of its linguistic schools, which differs from the schools of pedagogical universities, many of which train translators.\r\n\r\nMGIMO is distinguished by the fact that over the years it has accumulated an amazing practical data base for training translators in the diplomatic and intercultural sphere. And we hope that by combining all the outstanding effective methods of teaching foreign languages in the field of training high-class translators, we will create our own linguistic school.\r\n\r\nThe Dean of the School of Linguistics and Cross-cultural Communication Valentina Aleksandrovna Ikonnikova, commenting on the results of the conference, noted:\r\n- For the first time such a large conference on linguistics is being held in the Odintsovo branch of MGIMO, which aroused great interest among a wide audience already at the preparatory stage.\r\n\r\nWe are very pleased to have received more than 50 applications for presentations, round tables and master classes. Applications were sent by well-known linguists, translators and theorists: terminologists, linguoculturologists, specialists in cognitive linguistics and methods of teaching foreign languages, and Russian as a foreign language, as well as from graduate and postgraduate students.\r\nPractical translators and the teaching staff of the branch took an active part in the conference.\r\n\r\nPractical translators and the teaching staff of the branch took an active part in the conference. It is a special honor for us to receive the speakers of the Plenary Session – well-known both in Russia and in the world linguistics: Honorary Professor of the Moscow State University M.Ya. Bloch, Chief Researcher the V.V. Vinogradov Russian Language Institute of the Russian Academy of Sciences S.D. Shelov and senior researcher of the Department of the French Language of MGIMO of the Ministry of Foreign Affairs of Russia, laureate of the State Prize, recipient of Order of Academic Palms of the French Republic Professor L.G. Vedenina.\r\n\r\nThe purpose of our conference is to become a platform for scientific and practical work in the field of linguistics, applied research, translation practice and teaching of foreign languages and Russian. We hope that the conference will allow us to mark a new point on the map of Russia, which will become a forum for discussing the problems of language policy, intercultural communication, linguistic methods of processing digital requests on the web, and so on.\r\n\r\nThe School of Linguistics and Cross-cultural Communication of the Odintsovo branch of MGIMO is dynamically developing and attracts the attention of aspiring students for bachelor\'s and master\'s degree programs, as well as representatives of leading spheres of modern linguistics.\r\n\r\nThe School of Linguistics and Cross-cultural Communication of the Odintsovo branch of MGIMO is dynamically developing and attracts the attention of both students for bachelor\'s and master\'s degree programs, as well as representatives of leading spheres of modern linguistics. Cooperation in the field of linguistics with leading research institutes of the Russian Academy of Sciences, Universities of Kursk, Perm, Vladivostok, Moscow, and other well-known scientific schools enriches the educational environment of the campus, gives invaluable experience to both students and teachers.\r\n\r\nWe plan for the conference next year to become international, and, hopefully, our partners and colleagues from the USA, Finland, Italy and other countries will take part in it.\r\n\r\nIn addition, there was a meeting with Professor L.G. Vedenina and teachers of foreign languages that took place in the conference hall of the library. The meeting aroused keen interest of the audience. Lyudmila Georgievna donated part of her personal unique library, including author\'s works, to the university library and the School of Linguistics.\r\n\r\nV.V. Zhenchenko, Far Eastern Federal State University:\r\nA wonderful event took place today - the Conference \"Language. Culture. Translation\". I was present at excellent informative reports by our colleagues both from the Odintsovo branch of MGIMO and from other educational institutions in Russia. The conference was very well organized and held at a high level. I was exposed to a lot of new information on cross-cultural communication, on the problems of linguistics, cultural studies, etc. It was a wonderful opportunity to see the masters who study the language and all its aspects.\r\n\r\n', 'konf/2019.02.20/centralphoto/IMG_3953.jpg', '20 февраля 2019 года на факультете Лингвистики и межкультурной коммуникации Одинцовского филиала МГИМО состоится Всероссийская научно-практическая конференция «Язык. Культура. Перевод»', 'On February 20, 2019, the Department of Linguistics and Cross-Cultural Communication of the Odintsovo branch of MGIMO University will host the All-Russia practical science conference \"Language. Culture. Translation\"', 'В конференции примут участие такие известные лингвисты, как Почетный профессор Московского педагогического государственного университета, доктор филологических наук, профессор, Председатель диссертационного совета по германским и романским языкам, заведующий кафедрой грамматики английского языка Института иностранных языков М.Я. Блох; доктор филологических наук, главный научный сотрудник Института русского языка им. В.В. Виноградова РАН С.Д. Шелов; доктор филологических наук, профессор, старший научный сотрудник кафедры французского языка МГИМО МИД РФ Л.Г. Веденина и другие.\r\n\r\nВ Оргкомитет поступило более 45 заявок на выступление с докладом из ведущих научно-исследовательских институтов и вузов Москвы, Курска, Перми, Владивостока и других городов. Активное участие в конференции примут преподаватели и студенты факультета Лингвистики и межкультурной коммуникации.\r\n\r\nНа конференции планируется работа шести секций, трех круглых столов и нескольких мастер-классов. Секции посвящены следующим направлениям:\r\n\r\n• Терминоведение и языки для специальных целей;\r\n• Лингвострановедение и межкультурная коммуникация;\r\n• Проблемы теории и практики перевода;\r\n• Современное литературоведение: теоретические и прикладные проблемы;\r\n• Методика обучения иностранным языкам;\r\n• Когнитивные исследования языка.\r\n\r\nКроме того, в рамках конференции в зале Библиотеки кампуса планируется встреча профессора МГИМО Л.Г. Ведениной с преподавателями иностранных языков. Людмила Георгиевна представит выставку книг из личного собрания, переданных ею в дар Библиотеке Одинцовского филиала и факультету Лингвистики и межкультурной коммуникации.\r\n\r\nВ рамках секции Перевода будет организован мастер-класс для магистров Лингвистики на тему: «Использование видеофильмов при обучении устному переводу на слух».\r\n\r\nТакже пройдут следующие круглые столы: «Актуальные процессы в современном русском языке», «Дискурсивный подход к анализу политики. Как политологам и лингвистам услышать друг друга?» и «Роль мотивации в обучении иностранному языку» (в рамках секции «Методика обучения иностранным языкам»).\r\n\r\nРегистрация участников будет открыта 20 февраля 2019 года с 10.30 в холле второго этажа. Пленарное заседания начнется в 11.00. Секционные заседания, мастер-класс и круглые столы – с 14.00.\r\n\r\nЖдем всех на конференции!\r\n', 'The conference will receive such celebrated speakers as Honorary Professor of the Moscow State Pedagogical University, Doctor of Philology, Professor, Chairman of Dissertation Board in Germanic and Romance Languages, Head of the English Grammar Department of the Foreign Languages Institute M.Ya. Bloch; Doctor of Philology, Chief Researcher the V.V. Vinogradov Russian Language Institute of the Russian Academy of Sciences S.D. Shelov;  senior researcher of the Department of the French Language of MGIMO of the Ministry of Foreign Affairs of Russia L.G. Vedenina.\r\n\r\nThe Organizing Committee got over 45 applications of future participants from the leading research institutes and educational establishments of Russia, Kursk, Perm, Vladivostok and other cities. Professors and students of the Department of Linguistics and Cross-Cultural Communication will also take active part in the conference.\r\n\r\nSix subforums, three round tables and a number of master classes are planned at the conference. Subforums will be devoted to the following topics:\r\n\r\n• Terminology Science and LSP;\r\n• Country Studies and Cross-Cultural Communication;\r\n• Translation Studies: Theory and Practice;\r\n• Modern Literature Studies: Theoretical and Applied Problems.;\r\n• Methods of Teaching Foreign Languages;\r\n• Cognitive Linguistics.\r\n\r\nIn addition, a meeting of MGIMO Professor L.G. Vedenina with foreign language teachers will be held in the hall of the campus library. Lyudmila Georgievna is going to present a collection of her books donated to the library of the Odintsovo branch and the Department of Linguistics and Cross-Cultural Communication.\r\n\r\nIn Translation section the following master class is planned for masters in linguistics: \"The use of films in teaching interpretation\".\r\n\r\nBesides, there will be the following round tables: \"Current processes in the modern Russian language\", \"Discourse approach to the analysis of politics. How can political scientists and linguists start cooperating?\" and \"The role of motivation in foreign language teaching\" (at the subforum \"Methods of Teaching Foreign Languages\").\r\n\r\nRegistration will be opened for the participants on February 20, 2019 at 10.30 in the second floor hall. Plenary sessions will start at 11.00. Subforums, master classes and round tables begin at 14.00.\r\n\r\nLooking forward to seeing you at the conference!\r\n', '', ''),
(72, 'Международная конференция «Язык. Культура. Перевод: научные парадигмы и практические аспекты»', 'International conference “Language. Culture. Translation: Research paradigms and practical aspects”', 3, '20 февраля в МГИМО-Одинцово начала свою работу двухдневная международная научно-практическая конференция «Язык. Культура. Перевод: научные парадигмы и практические аспекты». В мероприятии принимают участие более 200 докладчиков из более 10 стран - США, Великобритании, Италии, Финляндии, Венгрии, Польши, Китая, Южной Кореи, Казахстана и других, представители ведущих университетов России - лингвисты, авторы учебников по иностранным языкам, студенты, магистранты и аспиранты.\r\n\r\n   Открывая конференцию, ректор МГИМО А.В. Торкунов отметил: «Специалисты, которые владеют языковыми навыками и инструментами коммуникации, будут цениться всегда. Никакие технологии не заменят человеческого общения. Сегодняшняя конференция, которая проходит в Одинцово, - тому яркое свидетельство».\r\n\r\n   Декан Факультета лингвистики и межкультурной коммуникации В.А. Иконникова в своем выступлении подчеркнула, что проведение международной конференции на базе МГИМО-Одинцово свидетельствует о том, что подмосковный кампус в полной мере стал международной площадкой для проведения научно-практического форума в области актуальных теоретических и практических вопросов. Сегодня филиал МГИМО в Одинцово стал новым центром для научно-исследовательской работы в области языкознания, практики перевода и преподавания иностранных языков.\r\n\r\n   В круглых столах и мастер-классах также приняли участие сотрудники медиа-холдинга RT, компании по разработке цифровых лингвистических технологий Translation Memory “TRADOS”, Библиотеки иностранной литературы им. М.И. Рудомино, издательств Pearson, Oxford University Press, учителя лучших школ Москвы и Подмосковья, гимназий и лицеев.\r\n\r\n   В рамках пленарного заседания состоялась российская презентация книги профессора Университета Рединга (Великобритания) Джейн Сеттер «Your Voice Speaks Volumes». Книга вышла в издательстве Oxford University press. Зарубежные и российские докладчики обсудили новые методики подготовки переводчиков и другие важные вопросы лингвокультурологии.', 'On February 20, a two-day international scientific and practical conference “Language. Culture. Translation: Research paradigms and practical aspects” started. The event is attended by more than 200 speakers from more than 10 countries - the USA, Great Britain, Italy, Finland, Hungary, Poland, China, South Korea, Kazakhstan and others, representatives of leading Russian universities - linguists, authors of textbooks on foreign languages, undergraduate and postgraduate students.\r\n\r\nOpening the conference, MGIMO Rector Anatoly V. Torkunov noted: “Specialists who possess language skills and communication tools will always be appreciated. No technology can replace human communication. Today\'s conference, which is taking place in Odintsovo, is a vivid testimony to that.”\r\n\r\nThe Dean of the School of Linguistics and Cross-Cultural Communication Valentina A. Ikonnikova in her speech stressed that the holding of an international conference on the premises of MGIMO-Odintsovo indicates that the campus has fully become a major international platform for a scientific and practical forum for topical theoretical and practical issues. Today, the MGIMO branch in Odintsovo has become a new center for research work in the field of linguistics, translation practice and teaching of foreign languages.\r\n\r\nThe round tables and workshops were also attended by employees of RT media holding, the company for the development of digital linguistic technologies Translation Memory “TRADOS”, All-Russia Library of Foreign Literature founded by M.I. Rudomino, publishers Pearson, Oxford University Press, teachers of the best schools in Moscow and the Moscow region, gymnasiums and lyceums.\r\n\r\nWithin the framework of the plenary session, a Russian presentation of the book “Your Voice Speaks Volumes” by Professor Jane Setter of the University of Reading (Great Britain) took place. The book was published by Oxford University Press. Foreign and Russian speakers discussed new methods of training translators and other important issues of linguoculturology.\r\n', 'konf/2020.02.20/centralphoto/yazyk-kultura-perevod_09.jpg', 'Приглашаем на международную лингвистическую конференцию', 'We invite you to the international linguistic conference ', '20-21 февраля 2020 года на площадке МГИМО-Одинцово на факультете лингвистики и межкультурной коммуникации пройдет международная научно-практическая конференция «Язык. Культура. Перевод: научные парадигмы и практические аспекты».\r\n\r\nНа конференции планируются заседания по следующим секциям:\r\n•	Лингвострановедение и межкультурная коммуникация;\r\n•	Терминоведение и языки для специальных целей;\r\n•	Лексикология и фразеология: новые подходы и методы исследования;\r\n•	Когнитивные исследования языка. Дискурсивные исследования;\r\n•	Проблемы теории и практики перевода;\r\n•	Методика обучения иностранным языкам;\r\n•	Актуальные проблемы преподавания русского языка как иностранного;\r\n•	Современное литературоведение: теоретические и прикладные проблемы;\r\n•	Компьютерная лингвистика. Корпусные исследования. Лингвистический аспект цифровой обработки данных.\r\n•	В программу конференции будет также включена онлайн-сессия с профессором Асеном Кирином из Университета Джорджии (США).\r\n\r\nНа второй день работы конференции кроме пленарного и секционных заседаний запланированы многочисленные мастер-классы и круглые столы. Среди модераторов мастер-классов – представители известных издательств («РЕЛОД» и др.) и разработчиков цифровых лингвистических технологий и продуктов (TRADOS, Pearson и др.).\r\n', 'On February 20 and 21, 2020, the international practical science conference \"Language. Culture. Translation: Research paradigms and practical aspects\" will take place on the premises of MGIMO-Odintsovo on the faculty of Linguistics and Cross-cultural Communication.\r\n\r\nMeetings on the following forums are planned at the conference:\r\n●	Country Studies and Cross-Cultural Communication;\r\n●	Terminology Science and LSP;\r\n●	Lexicology and Phraseology: New Approaches and Research Methods;\r\n●	Cognitive Linguistics. Discourse and Textual Data Analysis;\r\n●	Translation Studies;\r\n●	Teaching Modern Languages;\r\n●	Teaching Russian as a Foreign Language;\r\n●	Theory and Practice of Literature Studies;\r\n●	Digital and Corpus Linguistics: Linguistic Aspects of Data Processing.\r\n\r\nThe conference program will also include an online session with Professor Asen Kirin from the University of Georgia (USA). On the second day of the conference, in addition to the plenary and breakout sessions, workshops and round tables are planned. Among the moderators of the master classes are representatives of well-known publishing houses (RELOD, etc.) and developers of digital linguistic technologies and products (TRADOS, Pearson, etc.).\r\n', '', ''),
(78, 'Международный семинар «Язык. Культура. Перевод: современные технологии в лингвистике»', 'International seminar \"Language. Culture. Translation: modern technologies in linguistics\"', 4, '25–26 февраля в МГИМО-Одинцово в гибридном формате состоялся Международный научно-практический семинар «Язык. Культура. Перевод: современные технологии в лингвистике».\r\n\r\nВ мероприятии в очном и дистанционном форматах приняли участие более 70 докладчиков и свыше 150 слушателей из Финляндии, Венгрии, Узбекистана и других стран, представители «цифровой» переводческой индустрии, медиа и ведущих университетов России — лингвисты, переводчики, студенты, магистранты и аспиранты.\r\n\r\nВ течение двух дней состоялись пленарное заседание, два круглых стола, мастер-классы и восемь секционных заседаний по четырем темам: «Терминоведение и современные технологии в лингвистике», «Лингвокультурология, межкультурная коммуникация и современные технологии в лингвистике (подсекции А и Б)», «Компьютерная лингвистика», «Дистанционное обучение иностранным языкам, переводу, лингвистическому исследованию и межкультурной коммуникации».\r\n\r\nОткрывая международный семинар, директор Одинцовского филиала МГИМО Е.А.Козловская отметила, что на площадке МГИМО-Одинцово Факультет лингвистики и межкультурной коммуникации уже в четвертый раз проводит научно-практический лингвистический форум «Язык. Культура. Перевод». Формат научной дискуссии менялся и постепенно приобрел свои отличительные традиции и сформировавшуюся стратегию развития. Елена Александровна подчеркнула, что Факультет лингвистики и межкультурной коммуникации — не просто «еще один лингвистический факультет». Это факультет, готовящий лингвистов МГИМО, лингвистов-международников, которые приобретают уникальные компетенции в области современных технологий в лингвистике как на уровне программы бакалавриата, так и на уровне магистратуры.\r\n\r\nДекан ФЛМК В.А.Иконникова отметила, что новая реальность значительно изменила формат проведения международного научно-практического форума «Язык. Культура. Перевод», что принесло как новые вызовы, так и безусловные достоинства: к слушателям, находившимся в кампусе МГИМО-Одинцово, онлайн могли подключиться эксперты и участники дискуссии со всего мира, причем одновременно на нашем форуме присутствовали от 60 до 120 слушателей онлайн. Основной темой международного семинара ожидаемо стали современные технологии в лингвистике. Сегодня экспертному сообществу переводчиков, преподавателей, ученых-лингвистов необходимо осмыслить практический запрос общества на «цифровую лингвистику», сформулировать проблемные области исследования и дать профессиональную оценку и рекомендации по использованию современных программных продуктов в переводе, распознавании речи, семантическом поиске, стратегиях воздействия на целевую аудиторию и решении вопросов кибербезопасности. Современным лингвистам необходимо уметь работать в команде с инженерами-программистами, чтобы ставить адекватные задачи, искать пути решения практических задач с использованием знаний теоретической структурной лингвистики.\r\n\r\nНа пленарном заседании главные векторы научной дискуссии задали основатель Ивановской научной цифровой лексикографической школы, руководитель научно-образовательного центра «Современная российская и европейская лексикография» профессор О.М.Карпова; профессор МГУ им. М.В.Ломоносова, эксперт по использованию корпусной лингвистики в переводе и анализе отраслевых терминологий А.Г.Анисимова; директор Школы аудиовизуального перевода «РуФилмс» А.В.Козуляев, заинтересовавший слушателей докладом «Аудиовизуальный перевод как инструмент российской мягкой силы»; профессор Национального университета государственной службы Будапешта (Венгрия) Эва Харнос, представившая подробный анализ возможного алгоритма распознавания сарказма лингвистом и нейронной сетью.\r\n\r\nВо второй день, кроме секционных заседаний, состоялся мастер-класс «Инструменты самопроверки при переводе на английский язык», модератором выступил генеральный директор бюро переводов Technical Translation & Software доцент Д.И.Троицкий; а также два круглых стола. Модераторами круглого стола «CATT И CAIT: компьютерные технологии в профессиональной подготовке переводчиков» выступили А.Ю.Калинин и Е.Д.Малёнова. В круглом столе приняли участие шесть докладчиков, слушатели и студенты задавали вопросы в чате и непосредственно модераторам. Модераторами круглого стола «Опыт преподавания и популяризация арабского языка в дистанционном формате» выступили А.А.Беликова (Russia Today), Н.Г.Мингазова (Казань), М.С.Аль-Аммари и О.А.Берникова (Санкт-Петербург). Круглый стол вызвал оживленную дискуссию среди преподавателей и студентов.\r\n\r\nПодводя итоги международного семинара, модераторы заседаний особо отметили высокий научно-практический уровень докладов и дискуссий; динамику развития форума, а также исключительную работу студентов-лингвистов по организации и помощи председателям в проведении всех мероприятий.\r\n\r\nПо итогам работы семинара традиционно выйдет сборник научных трудов, который индексируется в РИНЦ. Все участники получат электронные сертификаты. В 2022 году организаторы надеются на возможность проведения полномасштабной очной международной конференции «Язык. Культура. Перевод» с сохранением успешного опыта элементов дистанционной работы.', 'On February 25-26, the International Scientific and Practical Seminar \"Language. Culture. Translation: modern technologies in linguistics\". The event was attended by more than 70 speakers and over 150 listeners from Finland, Hungary, Uzbekistan and other countries, representatives of the digital translation industry, media and leading universities of Russia — linguists, translators, students, undergraduates and postgraduates.\r\n\r\nWithin two days, a plenary session, two round tables, workshops and eight breakout sessions were held on four topics: \"Terminology and modern technologies in linguistics\", \"Language and county studies, intercultural communication and modern technologies in linguistics (subforums A and B)\", \"Computational linguistics\", \"Distance learning of foreign languages, translation, linguistic research and intercultural communication\".\r\n\r\nSumming up the results of the international seminar, the moderators of the meetings emphasized the high scientific and practical level of reports and discussions; the dynamics of the development of the forum, as well as the exceptional work of linguistics students in organizing and assisting the chairmen in conducting all events. According to the results of the seminar, a collection of scientific papers will traditionally be published, which is indexed in the RSCI. All participants will receive electronic certificates. In 2022, the organizers hope for the possibility of holding a full-scale face-to-face international conference “Language. Culture. Translation” with the preservation of successful experience of elements of remote work.\r\n', 'konf/2021.02.25/centralphoto/yazyk-kultura-perevod.jpg', 'Международный научно-практический семинар «Язык. Культура. Перевод: современные технологии в лингвистике»', 'International practical science seminar \"Language. Culture. Translation: modern technologies in linguistics\". ', 'Приглашаем принять участие в международном научно-практическом семинаре «Язык. Культура. Перевод: современные технологии в лингвистике», который пройдет в гибридном формате 25–26 февраля в МГИМО-Одинцово.\r\n\r\n— Программа семинара\r\nС 2018 года на Факультете лингвистики и межкультурной коммуникации (ФЛМК) МГИМО ежегодно в феврале-марте проходит обсуждение наиболее актуальных результатов, проблем и перспектив лингвистических исследований, проводимых в рамках отечественных и зарубежных научно-практических школ.\r\n\r\nВ 2018 году встреча лингвистов проходила в рамках межвузовского семинара; в 2019 году — в формате Всероссийской научно-практической конференции; в 2020 году — в форме Международной научно-практической конференции «Язык. Культура. Перевод: научные парадигмы и практические аспекты».\r\n\r\nС 2021 года принято решение по нечетным годам проводить Международный научно-практический семинар в гибридном (онлайн+ офлайн) формате (до 4 секций); по четным годам — Международную научно-практическую конференцию (более 8 секций).\r\n\r\nОсновной темой Международного научно-практического семинара 2021 является использование достижений компьютерной лингвистики в теоретических исследованиях, методологии гибридного и дистанционного преподавания и решении прикладных лингвистических задач: обработка текста, анализ языка социальных сетей, машинный перевод, программы переводческой памяти, системы семантического поиска, корпусные исследования в терминоведении, социолингвистике, лексикологии, лексической семантике, лексикографии, лингвокультурологии, межкультурной коммуникации и переводоведении.\r\n\r\nПриглашаем лингвистов, экспертов из индустрии, переводчиков, преподавателей и студентов принять участие в работе следующих секций:\r\n•	Терминоведение и современные технологии в лингвистике: терминологические базы данных, перевод терминологий\r\n•	Лингвокультурология, межкультурная коммуникация и современные технологии в лингвистике: медиадискурс онлайн и перспективы медиалингвистики; может ли компьютерная программа / нейросеть распознать сарказм и культурный компонент значения?\r\n•	Компьютерная лингвистика: создание и использование корпусов разных типов, цифровая лексикография, программы переводческой памяти, машинный перевод, системы семантического поиска, распознавания речи, чат боты, языки программирования в лингвистике и т.д.\r\n•	Дистанционное обучение иностранным языкам, переводу, лингвистическому исследованию и межкультурной коммуникации: методология синхронной и асинхронной работы на современных обучающих платформах\r\n', 'We invite you to take part in the international practical science seminar \"Language. Culture. Translation: Modern technologies in linguistics\", which will be held in a hybrid format on February 25 and 26 in MGIMO-Odintsovo.\r\nSeminar program\r\n\r\nSince 2018, the Faculty of Linguistics and Intercultural Communication (LCCC) of MGIMO annually in February or March discusses the most relevant results, problems and prospects of linguistic research conducted by domestic and foreign scientific and practical schools. In 2018, the meeting of linguists was held within the framework of an inter-university seminar; in 2019 - in the format of the All-Russian Scientific and Practical Conference; in 2020 - in the form of the International Scientific and Practical Conference \"Language. Culture. Translation: Scientific paradigms and practical aspects\".\r\n\r\nStarting from 2021, it was decided to hold an International Practical Science Seminar (up to four sections) in a hybrid form (online + offline) every odd year, and an International practical science conference (more than eight sections) every even year. The main topic of the International Scientific and Practical Seminar 2021 is the use of the achievements of computational linguistics in theoretical research, the methodology of hybrid and distance teaching and the solution of applied linguistic problems: text processing, analysis of the language of social networks, machine translation, translation memory programs, semantic search systems, corpus research in terminology, sociolinguistics, lexicology, lexical semantics, lexicography, linguoculturology, intercultural communication and translation studies.\r\n\r\nWe invite linguists, industry experts, translators, teachers and students to take part in the following sections:\r\n•	Terminology studies and modern technologies in linguistics: terminology databases, translation of terminology.\r\n•	Cultural linguistics and area studies, cross-cultural communication and state-of-the-art technologies in linguistics: media discourse online and media linguistics perspectives; can a computer application / neural text processing system recognize sarcasm or the cultural component of meaning?\r\n•	Computational linguistics: compilation and application of corpora of different types, digital lexicography, translation memory programs, machine translation, semantic search systems, speech recognition, chatbots, computer programming languages in linguistics, etc.\r\n•	Distant teaching / learning foreign languages, translation, linguistic research and cross-cultural communication: methods of synchronous and asynchronous work at the modern learning platforms.\r\n', '', '');
INSERT INTO `conferences` (`ID_conf`, `Name_conf_ru`, `Name_conf_en`, `ID_year`, `info_ru`, `info_en`, `main_photo`, `anons_name_ru`, `anons_name_en`, `info_anons_ru`, `info_anons_en`, `an_conception_ru`, `an_conception_en`) VALUES
(80, '17–18 февраля в МГИМО-Одинцово в гибридном формате в пятый раз состоялась Международная научно-практическая конференция «Язык. Культура. Перевод: межкультурная коммуникация в цифровую эпоху»', NULL, 5, 'В мероприятии приняли участие более 300 докладчиков и более 100 слушателей из 13 стран. Было представлено 54 города (31 в России и 23 за рубежом), 114 вузов, 13 школ и около 20 иных организаций («Газпром корпоративный институт», Росбанк, Russia Today, общественные фонды, языковые центры, переводческие агентства и др.).\r\n\r\nНа конференции встретились представители ведущих университетов России и мира, эксперты из индустрии в области автоматической обработки естественных языков (Natural Language Processing), известные ученые-филологи, преподаватели, лингвисты-блогеры, переводчики, представители медиа, работодателей и корпоративного языкового образования, руководители крупных издательств и библиотек, студенты, магистранты и аспиранты.\r\n\r\nВ течение двух дней состоялись четыре пленарных заседания, круглый стол «Школа молодого ученого», пять мастер-классов и 24 секционных заседания по десяти темам: «Терминология и знание. Современные исследования отраслевых терминосистем»; «Компьютерная лингвистика: инструменты корпусной лингвистики, современные технологии переводческой деятельности, Natural Language Processing»; «Сотрудничество при подготовке переводчиков: вузы — представители индустрии — международное сообщество»; «Перевод: перспективы развития теории и практики в цифровую эпоху»; «Дискурсивные исследования: междисциплинарность, интертекстуальность, поликодовость»; «Лингвокультурология и межкультурная коммуникация в цифровую эпоху: от безэквивалентной лексики к мультикультурному онлайн-дискурсу»; «Методология синхронной и асинхронной работы в аудитории и на современных обучающих платформах»; «Преподавание языков для специальных целей: актуальные вопросы теории и практики»; «Лексикология и лексикография в цифровую эпоху»; «Современное литературоведение: теоретические и прикладные проблемы. Филологический анализ художественных текстов».\r\n\r\nОткрывая международную конференцию, директор Одинцовского филиала Е.А.Козловская отметила, что на площадке МГИМО-Одинцово Факультет лингвистики и межкультурной коммуникации уже в пятый раз проводит научно-практический лингвистический форум «Язык. Культура. Перевод», количество участников которого с каждым годом растет. В этом году конференция проходит в рамках институционального проекта МГИМО «Инновации и цифра в образовании», входящего в программы «Приоритета 2030». Отрадно, что среди участников конференции много представителей российских и зарубежных школ, что важно для стратегического проекта МГИМО 2030 «Русская международная школа».\r\n\r\nЕлена Александровна подчеркнула, что все языковые кафедры МГИМО-Одинцово выросли из Факультета лингвистики и межкультурной коммуникации. ФЛМК является одним из самых молодых факультетов МГИМО, но за пять лет сумел стать значимым центром отечественной и международной лингвистической экспертизы, что является серьезным достижением.\r\n\r\nКафедра лингвистики и переводоведения, выпускающая кафедра ФЛМК, готовит как бакалавров-лингвистов, так и магистров по направлению «Перевод и современные технологии в лингвистике». Программа была создана и открыта всего два года назад, в самом начале пандемии, но уже сегодня слушатели 2 курса этой магистратуры успешно осуществляют синхронный перевод данной международной конференции как в конференц-зале, так и в Zoom-трансляции. Преподаватели кафедры осуществляют как подготовку по английскому языку от уровня B1 до С2, так и преподавание разных видов перевода, теоретических и практических лингвистических дисциплин на английском и русском языках. Секция преподавателей русского языка (в том числе русского как иностранного) также работает на данной кафедре. Кафедра иностранных языков факультета обеспечивает языковую подготовку по четырем европейским (немецкому, французскому, испанскому и итальянскому) и китайскому языкам студентов всех факультетов МГИМО-Одинцово.\r\n\r\nДекан ФЛМК В.А.Иконникова отметила, что в цифровую эпоху межкультурная коммуникация стремительно развивается и требует междисциплинарного сотрудничества. На площадке конференции «Язык. Культура. Перевод» взаимодействуют представители разных локальных и профессиональных культур и языков, обсуждающие перевод, «перекодирование» и интерпретацию широчайшего диапазона тематик: от языка географических карт до терминологии ядерной физики; от онлайн-словарей и корпусов до кибербезопасности при семантическом поиске в сети; от языка русского искусства до перевода юридических текстов. Дискуссии ведутся на материале русского, английского, немецкого, чешского, итальянского, китайского, датского, французского, испанского, польского, украинского, белорусского, казахского, узбекского и многих других языков и их территориальных вариантов.\r\n\r\nВалентина Александровна выразила благодарность руководству и Эндаументу МГИМО за поддержку, а также участникам конференции — за интерес к заявленной тематике и подготовку интереснейших докладов. В.А.Иконникова подчеркнула, что студенты факультета по традиции являются активными участниками конференции, выступая в разных ролях: от ивент-менеджеров, организаторов и спикеров секционных заседаний (бакалавриат) до переводчиков-синхронистов (магистранты 2 курса). Более 60 руководителей секционных заседаний — сотрудники МГИМО-Одинцово и приглашенные коллеги — внесли значительный вклад в создание программы конференции. Декан рассказала также, что при проведении конференции ФЛМК сотрудничает с Факультетом финансовой экономики, который активно участвует в обсуждении проблематики автоматической обработки естественных языков, и с Колледжем МГИМО, студенты которого создали и администрируют сайт конференции. Отдельная секция, посвященная преподаванию языков в сфере юриспруденции, была подготовлена кафедрой английского языка в сфере юриспруденции Международно-правового факультета. Валентина Александровна пожелала всем плодотворной работы, глубоких дискуссий, радости общения офлайн и онлайн.\r\n\r\nНа утреннем пленарном заседании главные векторы научной дискуссии задали профессор кафедры информационного обеспечения внешней политики МГУ им. М.В.Ломоносова, эксперт по медиалингвистике Т.Г.Добросклонская; председатель правления Союза переводчиков России, заведующий кафедрой теории и практики английского языка и перевода Нижегородского государственного лингвистического университета им. Н.А.Добролюбова В.В.Сдобников; профессор кафедры теории и практики перевода МГУ, эксперт по территориальным вариантам английского языка З.Г.Прошина; профессор фонетики Редингского университета (Великобритания) Дж.Сеттер — с презентацией исследования об акцентах английского языка: Walker R., Low E., Setter J. 2021. English Pronunciation for a Global World. Oxford: Oxford University Press.\r\nНа вечернем пленарном заседании 17 февраля выступили основатель и руководитель Школы дидактики перевода, профессор кафедры иностранных языков Российского университета дружбы народов Н.Н.Гавриленко; профессор теории культуры и русской литературы Университета Эмори (Атланта, США) М.Н.Эпштейн; ведущий научный сотрудник и директор Центра пространственного анализа международных отношений Института международных исследований МГИМО И.Ю.Окунев.\r\n\r\nВо второй день конференции два доклада утреннего пленарного заседания были посвящены вопросам лексикографии: презентация профессора Ивановского государственного университета, заведующей Научно-образовательным центром «Актуальные проблемы современной лексикографии» О.М.Карповой и доклад главного научного сотрудника Института русского языка им. В.В.Виноградова РАН С.Д.Шелова и научного сотрудника Т.Д.Четвериковой. Еще два доклада были посвящены рынку труда в области языкового образования (выступление генерального директора ООО «Лэнгвидж.Просвещение» Э.В.Майминой) и корпоративной языковой подготовке (доклад руководителя группы международных образовательных проектов «Газпром корпоративный институт» В.В.Климачёва и заведующей кафедрой иностранных языков в сфере менеджмента Санкт-Петербургского государственного университета, языкового координатора CEMS Е.В.Орловой).\r\n\r\nВечернее пленарное заседание состояло из лекций Почетного профессора МПГУ М.Я.Блоха и Почетного профессора МГИМО, кавалера французского Ордена Академических пальм Л.Г.Ведениной, а также выступлений профессоров из США: эксперта по кибербезопасности А.Тёмкина (Department of Computer Science, Boston University, Professor and Chair) и эксперта по языку византийской и русской культуры А.Кирина (Lamar Dodd School of Art, The University of Georgia, Professor).\r\n\r\nФонетический трек конференции завершился конкурсом для студентов ФЛМК, модератором которого выступила Н.Я.Конкина, а в жюри вошли профессор Дж.Сеттер и блогер-фонетист О.Сытина.\r\n\r\nВ Школе молодого ученого (модератор Н.С.Титова) приняли участие студенты ФЛМК, МП, ФУП, Правового колледжа Юридического института Российского университета транспорта, учащиеся Горчаковского лицея МГИМО, частной школы Билимкана-Алматы (Казахстан).\r\n\r\nПодводя итоги международной конференции, модераторы заседаний особо отметили новый уровень и стремительную динамику развития международного форума, глубину и широкий диапазон докладов и дискуссий, а также отлаженную работу переводчиков-синхронистов и студентов-волонтеров ФЛМК. По итогам работы конференции традиционно выйдет Сборник научных трудов, который индексируется в РИНЦ. Все участники получат электронные сертификаты. По результатам пленарных и секционных обсуждений в Оргкомитет уже поступило множество предложений по реализации новых проектов в области лингвистических инноваций на Факультете лингвистики и межкультурной коммуникации МГИМО.\r\n\r\nИнформационными партнерами конференции выступили Всероссийская библиотека иностранной литературы им. М.И.Рудомино, ООО «Лэнгвидж.Просвещение», Издательство «КноРус». Международные партнеры ФЛМК, принявшие участие в конференции, — Университет Джорджии (США), Университет языков и СМИ (Милан, Италия).', '', 'konf/2022.02.17/centralphoto/yazyk-kultura-perevod-02-22_006.jpg', 'Приглашаем Вас принять участие в ежегодной международной научно-практической КОНФЕРЕНЦИИ «ЯЗЫК. КУЛЬТУРА. ПЕРЕВОД: МЕЖКУЛЬТУРНАЯ КОММУНИКАЦИЯ В ЦИФРОВУЮ ЭПОХУ»', 'We invite you to take part in the annual International Practical Science CONFERENCE “LANGUAGE. CULTURE. TRANSLATION: CROSS-CULTURAL COMMUNICATION IN DIGITAL ERA”.', 'На КОНФЕРЕНЦИИ планируется работа следующих секций:\r\n\r\n1. Терминология и знание. Современные исследования отраслевых терминосистем.\r\n2. Компьютерная лингвистика: инструменты корпусной лингвистики, современные технологии переводческой деятельности, Natural Language Processing.\r\n3. Сотрудничество при подготовке переводчиков: вузы — представители индустрии — международное сообщество.\r\n4. Перевод: перспективы развития теории и практики в цифровую эпоху.\r\n5. Дискурсивные исследования: междисциплинарность, интертекстуальность, поликодовость.\r\n6. Лингвокультурология и межкультурная коммуникация в цифровую эпоху: от безэквивалентной лексики к мультикультурному онлайн дискурсу.\r\n7. Методология синхронной и асинхронной работы в аудитории и на современных обучающих платформах.\r\n8. Преподавание языков для специальных целей: актуальные вопросы теории и практики.\r\n9. Лексикология и лексикография в цифровую эпоху.\r\n10. Современное литературоведение: теоретические и прикладные проблемы. Филологический анализ художественных текстов.\r\n\r\n<a href=\"https://mgimo.ru/about/news/conferences/yazyk-kultura-perevod-mezhkulturnaya-kommunikaciya-v-cifrovuyu-epohu/\">Читать информацию на официальном сайте МГИМО</a>\r\n\r\nСтатьи участников конференции будут опубликованы в Сборнике докладов, индексированном в РИНЦ.\r\n\r\nРегламент конференции:\r\n- выступление на пленарном заседании – 30 минут.\r\n- выступление на секционном заседании – 10 минут.\r\nСканы сертификатов высылаются всем участникам конференции, выступившим с докладом онлайн и офлайн.\r\n\r\n	На КОНФЕРЕНЦИИ возможна также работа мастер-классов, круглых столов, семинаров.\r\n\r\nСрок подачи заявки для выступления с докладом / в качестве слушателя ‒ до 20 декабря 2021 г. включительно (заявка обязательна). \r\n\r\nПодача статей для публикации до 15 февраля 2022 г. \r\n\r\nВы можете направить свои вопросы и/или заявку по адресу: yazyk-kultura-perevod@odin.mgimo.ru\r\n\r\nУчастие в Конференции бесплатное. Публикация и индексация статей оплачивается отдельно. \r\n\r\nФорма регистрации: <a href=\"https://forms.gle/tMsnyhTz18S3xnt26\">https://forms.gle/tMsnyhTz18S3xnt26</a>\r\nФорма регистрации для подачи статьи к публикации: <a href=\"https://forms.gle/TG3TjqcY5uMXquP78\">https://forms.gle/TG3TjqcY5uMXquP78</a>\r\n', 'The Conference program will include the following sub-forums: \r\n\r\n1. Terminology and Knowledge. Modern Research of Terminological Systems. \r\n2. Computational Linguistics: Tools of Corpus Linguistics, Modern Translation Technologies, Natural Language Processing.\r\n3. Cooperation in Translator Training: Higher Educational Institutions - \r\nIndustry Representatives - International Community. \r\n4. Translation: Digital Era Prospects for the Development of Theory and \r\nPractice.\r\n5. Discourse Research: Interdisciplinarity, Intertextuality, Polycodes.\r\n6. Cultural Linguistics and Cross-cultural Communication of the Digital Era: \r\nfrom Semantic Voids to Multicultural Online Discourse.\r\n7. Methods of Synchronous and Asynchronous Work in Class and on Modern \r\nEducational Platforms. \r\n8. Teaching Foreign Languages for Specific Purposes: Issues of Theory and \r\nPractice.\r\n9. Lexicology and Lexicography of the Digital Era. \r\n10. Modern Literature Studies: Theoretical and Applied Problems. Philological Analysis of Literary Texts.\r\n\r\n<a href=\"https://mgimo.ru/about/news/conferences/yazyk-kultura-perevod-mezhkulturnaya-kommunikaciya-v-cifrovuyu-epohu/\">Read about the Conference at the official MGIMO University website</a>\r\n\r\nApplication form: <a href=\"https://forms.gle/bfFmLiPnKBX91ojZ9\">https://forms.gle/bfFmLiPnKBX91ojZ9</a>    \r\nApplication form for submitting a paper for the Conference Proceedings: <a href=\"https://forms.gle/jdCcjNiwB5QndzWH6\">https://forms.gle/jdCcjNiwB5QndzWH6</a>\r\n\r\nArticles of the participants will be published in the Conference proceedings and indexed (RSCI).\r\n\r\nParticipation is free of charge. Publishing will be charged extra.\r\n\r\nConference procedure:\r\n- a plenary talk – 30 minutes.\r\n- a sub-forum talk – 10 minutes.\r\n\r\nOnline and offline speakers are eligible for an electronic Certificate of Attendance.\r\n\r\nThe Conference format may also include workshops, round tables and seminars.\r\n\r\nConference speakers and guests are invited to submit their applications till December 20, 2021 (application is obligatory for participation).\r\n\r\nThe deadline for the forwarding the articles is February 15, 2022.\r\nYou can also forward your questions and / or application to:  yazyk-kultura-perevod@odin.mgimo.ru.\r\n', '<p>Конференция является центром международной экспертизы в области фундаментальных, прикладных и междисциплинарных исследований в сферах:</p>\r\n<ul>\r\n	<li>современной лингвистики: терминоведения, лингвокультурологии, дискурсологии; </li>\r\n	<li>современных технологий в лингвистике и языковом образовании, обработки данных естественных языков (Natural language processing); </li>\r\n	<li>теории и практики межкультурной коммуникации в цифровую эпоху; </li>\r\n	<li>теории и практики перевода; </li>\r\n	<li>иных филологических исследований. </li>\r\n</ul>\r\n\r\n<h2>Для кого Конференция:</h2>\r\n<p>Для исследователей; преподавателей; студентов; представителей индустрии / работодателей; учителей; переводчиков:</p>\r\n\r\n<li>	для преподавателей вузов;\r\n<li>	для ученых, проводящих исследования в области современной лингвистики, культуры, теории коммуникации, терминологий, перевода, современных технологий в лингвистике, обработки данных естественного языка, теории и методики преподавания иностранных языков и культур, междисциплинарных исследований; </li>\r\n<li>	для разработчиков ПО в области лингвистики, лексикографии и перевода; </li>\r\n<li>	для представителей индустрии перевода и цифровых технологий в области автоматической обработки естественных языков (Natural Language Processing); </li>\r\n<li>	для переводчиков; </li>\r\n<li>	для учителей школ, лингвистических центров, СПО; </li>\r\n<li>	для студентов бакалавриата и магистратуры, аспирантов, соискателей и докторантов; </li>\r\n<li>	для слушателей, интересующихся тематикой конференции. </li>\r\n', '<p>The Conference is an international forum for theoretical, applied and interdisciplinary expert research and practical discussion in the following fields:</p>\r\n\r\n<ul>\r\n<li>	modern linguistics (terminology studies, sociolinguistics and culture / area studies through language, discourse analysis etc.); </li>\r\n<li>	modern technologies in linguistics and language education as well as Natural language processing; </li>\r\n<li>	theory and practice of cross-cultural communication in digital era; </li>\r\n<li>	translation and interpretation studies; </li>\r\n<li>	other philological research. </li>\r\n\r\n<h2>The Conference is for:</h2>\r\n<ul>\r\n<li>researchers, </li>\r\n<li>university and school teachers, \r\nindustry, business and employer representatives; </li>\r\n<li>translators and interpreters, </li>\r\n<li>students, </li>\r\n<li>other participants interested in the topics discussed. </li>\r\n</ul>\r\n'),
(82, 'Состоялся научный межвузовский семинар', 'A scientific interuniversity seminar was held', 4, '<p>Открывая международный семинар, директор Одинцовского филиала МГИМО Е.А.Козловская отметила, что на площадке МГИМО-Одинцово Факультет лингвистики и межкультурной коммуникации уже в четвертый раз проводит научно-практический лингвистический форум «Язык. Культура. Перевод». Формат научной дискуссии менялся и постепенно приобрел свои отличительные традиции и сформировавшуюся стратегию развития. Елена Александровна подчеркнула, что Факультет лингвистики и межкультурной коммуникации — не просто «еще один лингвистический факультет». Это факультет, готовящий лингвистов МГИМО, лингвистов-международников, которые приобретают уникальные компетенции в области современных технологий в лингвистике как на уровне программы бакалавриата, так и на уровне магистратуры.</p><p>&nbsp;</p><p>Декан ФЛМК В.А.Иконникова отметила, что новая реальность значительно изменила формат проведения международного научно-практического форума «Язык. Культура. Перевод», что принесло как новые вызовы, так и безусловные достоинства: к слушателям, находившимся в кампусе МГИМО-Одинцово, онлайн могли подключиться эксперты и участники дискуссии со всего мира, причем одновременно на нашем форуме присутствовали от 60 до 120 слушателей онлайн. Основной темой международного семинара ожидаемо стали современные технологии в лингвистике. Сегодня экспертному сообществу переводчиков, преподавателей, ученых-лингвистов необходимо осмыслить практический запрос общества на «цифровую лингвистику», сформулировать проблемные области исследования и дать профессиональную оценку и рекомендации по использованию современных программных продуктов в переводе, распознавании речи, семантическом поиске, стратегиях воздействия на целевую аудиторию и решении вопросов кибербезопасности. Современным лингвистам необходимо уметь работать в команде с инженерами-программистами, чтобы ставить адекватные задачи, искать пути решения практических задач с использованием знаний теоретической структурной лингвистики.</p>', '<p>Within two days, a plenary session, two round tables, workshops and eight breakout sessions were held on four topics: \"Terminology and modern technologies in linguistics\", \"Language and county studies, intercultural communication and modern technologies in linguistics (subforums A and B)\", \"Computational linguistics\", \"Distance learning of foreign languages, translation, linguistic research and intercultural communication\".</p><p>Summing up the results of the international seminar, the moderators of the meetings emphasized the high scientific and practical level of reports and discussions; the dynamics of the development of the forum, as well as the exceptional work of linguistics students in organizing and assisting the chairmen in conducting all events. According to the results of the seminar, a collection of scientific papers will traditionally be published, which is indexed in the RSCI. All participants will receive electronic certificates. In 2022, the organizers hope for the possibility of holding a full-scale face-to-face international conference “Language. Culture. Translation” with the preservation of successful experience of elements of remote work.</p>', 'konf/2021.06.21/centralphoto/Internet_20220224_011350_53.jpeg', 'XX межвузовский семинар «Лингвострановедение: методы анализа, технологии обучения»\r\n', 'XX interuniversity seminar \"Linguistics: methods of analysis, teaching technologies\"', '<p>21–22 июня в МГИМО состоится XX межвузовский семинар «Лингвострановедение: методы анализа, технологии обучения».</p><p>В рамках семинара предполагается работа секций «Языки в аспекте лингвострановедения», «Проблемы лингводидактики», «Проблемы переводоведения», «Дети в культуре и обществе».</p><p>Формат заседаний будет установлен в мае. По итогам Семинара будет опубликован сборник статей с индексацией в РИНЦ.</p><p>Прием заявок осуществляется до 15 апреля по адресу lingvo@inno.mgimo.ru. Регламент выступления — 15 минут.</p>', '<p>On June 21-22, MGIMO will host the XX interuniversity seminar \"Linguistics: methods of analysis, teaching technologies\".</p><p>Within the framework of the seminar, the work of the sections \"Languages in the aspect of linguistics\", \"Problems of linguodidactics\", \"Problems of translation studies\", \"Children in culture and society\" is expected.</p><p>The format of the meetings will be set in May. Following the results of the Seminar, a collection of articles with indexing in the RSCI will be published.</p><p>Applications are accepted until April 15 at lingvo@inno.mgimo.ru . The time limit of the speech is 15 minutes.</p>', '', ''),
(83, 'Состоялась конференция «Традиции и инновации в преподавании иностранного языка в неязыковом вузе»', 'The conference \"Traditions and innovations in teaching a foreign language in a non-linguistic university\" was held', 2, '<p>15 сентября научно-практическую конференцию с&nbsp;международным участием «Традиции и&nbsp;инновации в&nbsp;преподавании иностранного языка в&nbsp;неязыковом вузе», организованная Факультетом международных отношений, политологии и&nbsp;зарубежного регионоведения РГГУ. Конференция проходила в&nbsp;гибридном формате.</p><p>МГИМО представляла научный сотрудник Центра пространственного анализа международных отношений ИМИ <a href=\"https://mgimo.ru/people/evgeniya-zakharova/\">Е.А.Захарова</a>, которая выступила с&nbsp;докладом «Возможности пространственных и&nbsp;непространственных моделей пространственного анализа в&nbsp;регионоведческих исследованиях». В&nbsp;рамках доклада Е.А.Захарова рассказала о&nbsp;различиях между пространственными и&nbsp;непространственными моделями, о&nbsp;программах, в&nbsp;которых можно работать при использовании пространственного метода, а&nbsp;также привела примеры из&nbsp;некоторых исследований, проведенных ЦПАМО.</p>', '<p>On September 15, a scientific and practical conference with international participation \"Traditions and innovations in teaching a foreign language in a non-linguistic university\", organized by the Faculty of International Relations, Political Science and Foreign Regional Studies of RSUH. The conference was held in a hybrid format.</p><p>MGIMO was represented by E.A.Zakharova, a researcher at the Center for Spatial Analysis of International Relations, who made a report on \"The possibilities of spatial and non-spatial models of spatial analysis in regional studies\". Within the framework of the report, E.A.Zakharova spoke about the differences between spatial and non-spatial models, about programs in which you can work using the spatial method, and also gave examples from some studies conducted by the CPAMO.</p>', 'konf/2019.09.15/centralphoto/DSC_2929.JPG', 'Приглашаем к участию в научно-практической конференции «Традиции и инновации в преподавании иностранного языка в неязыковом вузе»', 'We invite you to participate in the scientific and practical conference \"Traditions and innovations in teaching a foreign language in a non-linguistic university\"', '<p>Открыта регистрация на&nbsp;научно-практическую конференцию с&nbsp;международным участием «Традиции и&nbsp;инновации в&nbsp;преподавании иностранного языка в&nbsp;неязыковом вузе». Конференция состоится 15–16 сентября 2019&nbsp;г. Конференцию организует и&nbsp;проводит кафедра Лингвистики МГИМО в&nbsp;сотрудничестве с&nbsp;Факультетом иностранных языков и&nbsp;регионоведения и&nbsp;Институтом стран Азии и&nbsp;Африки МГУ имени М.В.Ломоносова при поддержке Фонда развития МГИМО, Ассоциации выпускников МГИМО и&nbsp;Лиги преподавателей высшей школы.</p><p>Форма участия в&nbsp;конференции: очная.</p><p>Рабочий язык конференции: русский.</p>', '<p>Registration for the IV scientific and practical conference with international participation \"Traditions and innovations in teaching a foreign language in a non-linguistic university\" has been opened. The conference will be held on September 15-16, 2019. The conference is organized and conducted by the Department of Linguistics of MGIMO in cooperation with The Faculty of Foreign Languages and Regional Studies and the Institute of Asian and African Countries of Lomonosov Moscow State University with the support of the MGIMO Development Fund, the MGIMO Alumni Association and the League of Higher School Teachers.</p><p>Form of participation in the conference: full-time.</p><p>The working language of the conference is Russian.</p>', '', ''),
(84, 'Состоялась Международная научно-исследовательская конференция ', 'An international research conference was held', 3, '<p>Открыла семинар от имени организационного комитета и выступила в качестве модератора пленарного заседания заведующий кафедрой английского языка, доктор педагогических наук К.Г. Чикнаверова.</p><p>С приветственным словом к докладчикам и слушателям обратился директор Одинцовского филиала МГИМО, кандидат филологических наук, Заслуженный работник высшего образования С.К. Васильев. В своем выступлении Сергей Константинович отметил возрастающую значимость английского языка как средства межкультурной коммуникации в современном мире и рассказал о преподавании иностранных языков в филиале, в том числе на новых направлениях подготовки в бакалавриате.</p><p>Большой интерес участников семинара вызвал пленарный доклад профессора М.Я. Блоха, доктора филологических наук, почетного профессора и заведующего кафедрой грамматики английского языка Московского педагогического государственного университета (МПГУ) на тему «Родной язык и два его кардинальных воплощения».</p><p>В рамках пленарного заседания с докладом на тему «Интернациональная ономастическая терминология экономического знания» также выступила Е.М. Какзанова, доктор филологических наук, профессор Российского университета дружбы народов (РУДН).</p><p>Во второй части семинара участники продолжили работу в формате круглого стола в двух секциях.</p><p>Первая секция была посвящена исследованию научного дискурса и проблемам современного терминоведения. Работа в секции шла под руководством Л.М. Босовой, профессора кафедры английского языка.</p><p>Участники секции выступили с докладами на темы: «Соотношение общих, специальных и терминологических языковых единиц на разных этапах эволюции правовой лексики» (Е.П. Попова, к.ф.н., старший преподаватель кафедры иностранных языков Российского государственного университета правосудия), «Политический дискурс как основа политической коммуникации» (Л.М. Босова, д.ф.н., профессор кафедры английского языка Одинцовского филиала МГИМО, А.Н. Диденко, старший преподаватель кафедры английского языка), «Индивидуально-авторское своеобразие научных текстов» (В.В. Зуева, к.ф.н., доцент кафедры английского языка Одинцовского филиала МГИМО), «Британские термины высшего образования с культурным компонентом значения» (Ю.Б. Цверкун, старший преподаватель кафедры английского языка Одинцовского филиала МГИМО).</p>', '<p>Associate Professor of the English Language Department of the Odintsovo Branch of MGIMO), \"British terms of higher education with a cultural component of meaning\" (Yu.B. Tsverkun, Senior lecturer at the English Language Department of the Odintsovo branch of MGIMO). The second section focused on a number of translation studies issues and methods of foreign language teaching at a university. The section was chaired by E.E. Bukhteeva, Associate Professor of the Department of Foreign Languages. The topics included the following: \"To the problem of academic activities’ culture\" (E.E. Bukhteeva, Candidate of Pedagogical Sciences, Associate Professor of the Department of Foreign Languages at Odintsovo branch of MGIMO University), \"The Role of the Linguistic Theory in the Eurostandard European Master’s in</p>', 'konf/2020.04.17/centralphoto/DSC_3186.JPG', 'Приглашаем Вас принять участие в Международной научно-исследовательской конференции «Наука. Технологии. Общество», которая состоится 17-18 апреля 2020 года.', 'We invite you to take part in the International Research Conference \"Science. Technologies. Society\", which will be held on April 17-18, 2020.', '<p>Материалы научно-исследовательской конференции будут опубликованы в журналах, индексируемых в ведущей наукометрической базе данных «Scopus».</p><p>Направления работы конференции:</p><p>1. Опыт междисциплинарных исследований в науке<br>2. Научно-технологическое развитие России и мира<br>3. Фундаментальные и прикладные исследования в точных науках<br>4. Инновации в топливно-энергетическом комплексе<br>5. Цифровая трансформация в сельском хозяйстве<br>6. Актуальные вопросы управления регионом<br>7. Современные тренды в образовании<br>8. Инновации в биологии и медицине<br>9. Теоретические и методологические аспекты развития экономики.<br>10. Цифровая трансформация и Индустрия 4.0: состояние и перспективы развития.<br>11. Экономическая и информационная безопасность.<br>12. Экономика и менеджмент на предприятиях и в отраслях.<br>13. Окружающая среда, экономика и общество: актуальные аспекты устойчивого развития.<br>14. Новые вызовы межкультурной коммуникации.<br>15. Вопросы управления персоналом в условиях цифровой экономики.<br>16. Прикладные исследования в гуманитарных науках.<br>17. Цифровые решения в юридической науке и практике.<br>18. История России и мира.</p>', '<p>The materials of the research conference will be published in journals indexed in the leading scientometric database \"Scopus\".</p><p>Areas of work of the conference:</p><p>1. Experience of interdisciplinary research in science<br>2. Scientific and technological development of Russia and the world<br>3. Fundamental and applied research in the exact sciences<br>4. Innovations in the fuel and energy complex<br>5. Digital transformation in agriculture<br>6. Topical issues of regional management<br>7. Modern trends in education<br>8. Innovations in biology and medicine<br>9. Theoretical and methodological aspects of economic development.<br>10. Digital transformation and Industry 4.0: the state and prospects of development.<br>11. Economic and information security.<br>12. Economics and management in enterprises and industries.<br>13. Environment, economy and society: current aspects of sustainable development.<br>14. New challenges of intercultural communication.<br>15. Personnel management issues in the digital economy.<br>16. Applied research in the humanities.<br>17. Digital solutions in legal science and practice.<br>18. History of Russia and the world.</p>', '', ''),
(85, 'Состоялась конференция «Традиции и инновации в преподавании иностранного языка в неязыковом вузе»', 'An international research conference was held', 4, '<p>Открывая международный семинар, директор Одинцовского филиала МГИМО Е.А.Козловская отметила, что на площадке МГИМО-Одинцово Факультет лингвистики и межкультурной коммуникации уже в четвертый раз проводит научно-практический лингвистический форум «Язык. Культура. Перевод». Формат научной дискуссии менялся и постепенно приобрел свои отличительные традиции и сформировавшуюся стратегию развития. Елена Александровна подчеркнула, что Факультет лингвистики и межкультурной коммуникации — не просто «еще один лингвистический факультет». Это факультет, готовящий лингвистов МГИМО, лингвистов-международников, которые приобретают уникальные компетенции в области современных технологий в лингвистике как на уровне программы бакалавриата, так и на уровне магистратуры.</p><p>Декан ФЛМК В.А.Иконникова отметила, что новая реальность значительно изменила формат проведения международного научно-практического форума «Язык. Культура. Перевод», что принесло как новые вызовы, так и безусловные достоинства: к слушателям, находившимся в кампусе МГИМО-Одинцово, онлайн могли подключиться эксперты и участники дискуссии со всего мира, причем одновременно на нашем форуме присутствовали от 60 до 120 слушателей онлайн. Основной темой международного семинара ожидаемо стали современные технологии в лингвистике. Сегодня экспертному сообществу переводчиков, преподавателей, ученых-лингвистов необходимо осмыслить практический запрос общества на «цифровую лингвистику», сформулировать проблемные области исследования и дать профессиональную оценку и рекомендации по использованию современных программных продуктов в переводе, распознавании речи, семантическом поиске, стратегиях воздействия на целевую аудиторию и решении вопросов кибербезопасности. Современным лингвистам необходимо уметь работать в команде с инженерами-программистами, чтобы ставить адекватные задачи, искать пути решения практических задач с использованием знаний теоретической структурной лингвистики.</p>', '<p>Within two days, a plenary session, two round tables, workshops and eight breakout sessions were held on four topics: \"Terminology and modern technologies in linguistics\", \"Language and county studies, intercultural communication and modern technologies in linguistics (subforums A and B)\", \"Computational linguistics\", \"Distance learning of foreign languages, translation, linguistic research and intercultural communication\".</p><p>Summing up the results of the international seminar, the moderators of the meetings emphasized the high scientific and practical level of reports and discussions; the dynamics of the development of the forum, as well as the exceptional work of linguistics students in organizing and assisting the chairmen in conducting all events. According to the results of the seminar, a collection of scientific papers will traditionally be published, which is indexed in the RSCI. All participants will receive electronic certificates. In 2022, the organizers hope for the possibility of holding a full-scale face-to-face international conference “Language. Culture. Translation” with the preservation of successful experience of elements of remote work.</p>', 'konf/2021.10.21/centralphoto/DSC_3083.JPG', 'Приглашаем к участию в научно-практической конференции «Традиции и инновации в преподавании иностранного языка в неязыковом вузе»', 'We invite you to participate in the scientific and practical conference \"Traditions and innovations in teaching a foreign language in a non-linguistic university\"', '<p>Открыта регистрация на&nbsp;научно-практическую конференцию с&nbsp;международным участием «Традиции и&nbsp;инновации в&nbsp;преподавании иностранного языка в&nbsp;неязыковом вузе». Конференция состоится 15–16 сентября 2019&nbsp;г. Конференцию организует и&nbsp;проводит кафедра Лингвистики МГИМО в&nbsp;сотрудничестве с&nbsp;Факультетом иностранных языков и&nbsp;регионоведения и&nbsp;Институтом стран Азии и&nbsp;Африки МГУ имени М.В.Ломоносова при поддержке Фонда развития МГИМО, Ассоциации выпускников МГИМО и&nbsp;Лиги преподавателей высшей школы. Форма участия в&nbsp;конференции: очная. Рабочий язык конференции: русский.</p>', '<p>Registration for the IV scientific and practical conference with international participation \"Traditions and innovations in teaching a foreign language in a non-linguistic university\" has been opened. The conference will be held on September 15-16, 2019. The conference is organized and conducted by the Department of Linguistics of MGIMO in cooperation with The Faculty of Foreign Languages and Regional Studies and the Institute of Asian and African Countries of Lomonosov Moscow State University with the support of the MGIMO Development Fund, the MGIMO Alumni Association and the League of Higher School Teachers. Form of participation in the conference: full-time. The working language of the conference is Russian.</p>', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `dates`
--

CREATE TABLE `dates` (
  `ID_date` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dates`
--

INSERT INTO `dates` (`ID_date`, `date_from`, `date_to`, `text_ru`, `text_en`, `ID_conf`) VALUES
(1, '2021-12-20', '2021-12-20', 'Приём заявок на выступление с научным докладом на пленарном заседании / секции', 'Registration as speakers ', 80),
(2, '2022-01-15', '2022-01-15', 'Принятие решения о включении доклада в программу Конференции', 'Approval of applications', 80),
(3, '2022-02-10', '2022-02-10', 'Публикация программы Конференции', 'Conference program publication ', 80),
(4, '2022-02-15', '2022-02-15', 'Прием статей для публикации в Сборнике материалов Конференции (РИНЦ)', 'Submission of papers for the Conference Proceedings (Russian Science Index, elibrary.ru) ', 80),
(5, '2022-03-10', '2022-03-10', 'Сообщение о приеме статьи к публикации', 'Approval of the papers ', 80),
(6, '2022-03-28', '2022-03-28', 'Оплата публикации статьи в Сборнике материалов конференции', 'Payment for the papers', 80),
(8, '2022-04-17', '2022-04-18', 'Конференция 2022', 'Conference 2022', 80),
(9, '2018-02-21', '2018-02-21', 'Конференция 2018', 'Conference 2018', 65),
(10, '2019-02-20', '2019-02-20', 'Конференция 2019', 'Conference 2019', 69),
(11, '2020-02-20', '2020-02-21', 'Конференция 2020', 'Conference 2020', 72),
(12, '2021-02-25', '2021-02-26', 'Конференция 2021', 'Conference 2021', 78),
(14, '2021-06-21', '2021-06-22', 'Конференция 2021', 'Conference 2021', 82),
(15, '2019-09-15', '2019-09-16', 'Конференция 2019', 'Conference 2019', 83),
(16, '2020-04-17', '2020-04-18', 'Конференция 2020', 'Conference 2020', 84),
(17, '2021-10-21', '2021-10-22', 'Конференция 2021', 'Conference 2021', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `el_collection`
--

CREATE TABLE `el_collection` (
  `ID_documents` int(11) NOT NULL,
  `Name_documents_ru` text NOT NULL,
  `Name_documents_en` text,
  `Road_to_documents` text NOT NULL,
  `ID_conf` int(11) NOT NULL,
  `cover` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `el_collection`
--

INSERT INTO `el_collection` (`ID_documents`, `Name_documents_ru`, `Name_documents_en`, `Road_to_documents`, `ID_conf`, `cover`, `link`) VALUES
(130, 'ЯЗЫК. КУЛЬТУРА. ПЕРЕВОД: СОВРЕМЕННЫЕ ТЕХНОЛОГИИ В ЛИНГВИСТИКЕ Сборник научных трудов под ред. В. А. Иконниковой, Е. В. Глушко', 'LANGUAGE, CULTURE, TRANSLATION: MODERN TECHNOLOGIES IN LINGUISTICS Conference proceedings edited by Valentina A. Ikonnikova, Elena V. Glushko', '/adminPanels/konf/2021.02.25/ellcollection/YAzyik. Kultura. Perevod 2021.pdf', 78, 'konf/2021.02.25/cover/oblojka 2021.jpg', 'https://www.elibrary.ru/item.asp?id=46600285&selid=46654900'),
(132, 'ЯЗЫК. КУЛЬТУРА. ПЕРЕВОД: НАУЧНЫЕ ПАРАДИГМЫ И ПРАКТИЧЕСКИЕ АСПЕКТЫ Сборник научных трудов: в 2 частях. Часть 1', 'LANGUAGE, CULTURE, TRANSLATION: RESEARCH PARADIGMS AND PRACTICAL ASPECTS Conference proceedings in 2 parts. Part 1', '/adminPanels/konf/2020.02.20/ellcollection/CHast 1 YAzyik. Kultura. Perevod 2020 (5).pdf', 72, 'konf/2020.02.20/cover/Risunok2.png', 'https://elibrary.ru/item.asp?id=44629694&selid=44657102'),
(133, 'ЯЗЫК. КУЛЬТУРА. ПЕРЕВОД: НАУЧНЫЕ ПАРАДИГМЫ И ПРАКТИЧЕСКИЕ АСПЕКТЫ Сборник научных трудов: в 2 частях. Часть 2', 'LANGUAGE, CULTURE, TRANSLATION: RESEARCH PARADIGMS AND PRACTICAL ASPECTS Conference proceedings in 2 parts. Part 2', '/adminPanels/konf/2020.02.20/ellcollection/CHast 2 YAzyik. Kultura. Perevod 2020.pdf', 72, 'konf/2020.02.20/cover/Risunok3.png', 'https://elibrary.ru/item.asp?id=44657419&selid=44658677'),
(135, 'Сборник материалов всероссийской научно-практической конференции под ред. В.А. Иконниковой, Н.Д. Паршиной; Московский государственный институт международных отношений (ун-т) Министерства иностранных дел Российской Федерации, Одинцовский филиал МГИМО МИД России', 'Proceedings of the all-Russia practical science conference edited by Valentina A. Ikonnikova, Natalya D. Parshina; Moscow State Institute of International Relations (University) of the Ministry of Foreign Affairs of the Russian Federation in the town of Odintsovo', '/adminPanels/konf/2019.02.20/ellcollection/YAzyik. Kultura. Perevod. Sbornik 2019.pdf', 69, 'konf/2019.02.20/cover/Risunok1.png', 'https://elibrary.ru/item.asp?id=43419413&selid=43451238'),
(136, 'Научные труды под редакцией Ивановой И. И.', 'Scientific works edited by Ivanova I. I.', '/adminPanels/konf/2021.06.21/ellcollection/YAzyik. Kultura. Perevod 2021.pdf', 82, 'konf/2021.06.21/cover/scale_1200 (1).jpg', 'https://www.elibrary.ru/item.asp?selid=43451238&id=43419413');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `ID_feedback` int(11) NOT NULL,
  `Name_feedback_ru` text NOT NULL,
  `Name_feedback_en` text,
  `post_ru` text NOT NULL,
  `post_en` text,
  `feedback_ru` text NOT NULL,
  `feedback_en` text,
  `ID_conf` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`ID_feedback`, `Name_feedback_ru`, `Name_feedback_en`, `post_ru`, `post_en`, `feedback_ru`, `feedback_en`, `ID_conf`, `rating`) VALUES
(4, 'Хайруллин Владимир Ихсанович ', 'Vladimir I. Khairoulline ', '(Башкирский государственный университет), профессор, доктор филологических наук', '(Bashkir State University), Professor, Doctor of Philology', 'Пишу, чтобы выразить восхищение Вашей громадной работой по организации и проведению замечательной конференции «Язык. Культура. Перевод: Научные парадигмы и практические аспекты». С большим интересом заслушал доклады пленарных и секционных заседаний, получил импульс по практическому применению того, что увидел в работе мастер-класса, вдохновился пожеланиями ректора А.В. Торкунова.\r\nБлагодарю Вас за предоставленную возможность  принять участие в этом международном научном событии.', 'I am writing to express my admiration for your tremendous work in organizing and holding a wonderful conference \"Language. Culture. Translation: Scientific paradigms and practical aspects\". I listened with great interest to the reports of the plenary and breakout sessions, received an impulse for the practical application of what I saw in the work of the master class, and was inspired by the wishes of Rector Anatoly V. Torkunov. Thank you for the opportunity to take part in this international scientific event.', 72, 5),
(5, 'Éva Jakusné Harnos ', 'Éva Jakusné Harnos ', '', '(Department of Foreign and Specialised Languages, Faculty of Public Governance and International Studies, National University of Public Service, Budapest, Hungary), Adjunct Professor, PhD', '', 'Let me express my thanks for the invitation and the wonderful hospitality. It was an honour that I could be a keynote speaker before such professional audience. I think I have benefited a lot from the professional exchanges end enjoyed sharing ideas with all the colleagues. I&#039;m particularly grateful for the high quality simultaneous interpretation, which allowed understanding the talks of outstanding Russian linguists. In addition, I&#039;d like to congratulate you on your excellent team and well-trained and polite students. I think with the conference you and your colleagues have started a tradition which will create a reputation for your work.', 72, 5),
(7, 'Алексеева Ирина Сергеевна ', 'Irina S. Alexeeva ', '(Санкт-Петербург, РГПУ им. А.И. Герцена/ Москва, руководитель\r\nСтратегического центра развития переводческого образования в России\r\nпри Российской академии образования), профессор кафедры перевода,\r\nдиректор Санкт-Петербургской высшей школы перевода, кандидат\r\nфилологических наук, доцент', '(St. Petersburg, A.I. Herzen Russian State Pedagogical University/ Moscow, Head of the Strategic Center for the Development of Translation Education in Russia at the Russian Academy of Education), Professor of the Department of Translation, Director of the St. Petersburg Higher School of Translation, Candidate of Philological Sciences, Associate Professor', 'Большое спасибо Вам за конференцию - все ее этапы были очень удачны и полезны: и секции, и телемост, и литературный вечер, и прекрасное заключительное заседание, и наличие обеспечения переводом.\r\nВсяческих Вам удач!', 'Thank you very much for the conference - all its stages were very successful and useful: the sections, the teleconference, the literary evening, the wonderful final meeting, and the availability of translation support. I wish you every success!', 72, 4),
(8, 'Карасик Владимир Ильич ', 'Vladimir I. Karasik ', '(Государственный институт русского языка имени А.С. Пушкина), доктор филологических наук, профессор кафедры общего и русского языкознания', '(the Pushkin State Russian Language Institute), Doctor of Philology, Professor of the Department of General and Russian Linguistics', 'Спасибо Вам за приглашение на конференцию.\r\nВсё было замечательно организовано, мне понравились доклады на пленарном заседании, и были интересные доклады на секции, которой руководила Е.В. Власова.\r\nВсего Вам доброго!\r\n', 'Thank you for the invitation to the conference. Everything was wonderfully organized, I liked the reports at the plenary session, and there were interesting reports at the section headed by Elena V. Vlasova. All the best to you!', 72, 5),
(9, 'Степанюк Юлия Валерьевна  ', 'Yulia V. Stepanyuk ', '(Московский государственный университет им. М.В. Ломоносова), доцент кафедры французского языка для факультета иностранных языков и регионоведения, кандидат филологических наук, доцент', '(Lomonosov Moscow State University), Associate Professor of the Department of French for the Faculty of Foreign Languages and Regional Studies, Candidate of Philological Sciences, Associate Professor', 'Хочу выразить благодарность за интереснейшую конференцию, прекрасно организованную, с очень насыщенной и разнообразной программой.\r\nОтдельную благодарность хотелось бы выразить студентам, в высшей степени доброжелательным и отзывчивым, которые приходили на помощь в самых разных ситуациях.\r\nХочется надеяться, что такая прекрасная конференция станет традиционной! ))', 'I would like to express my gratitude for the most interesting conference, perfectly organized, with a very rich and diverse program. I would like to express my special gratitude to the students, who were extremely friendly and responsive, who came to the rescue in a variety of situations. I would like to hope that such a wonderful conference will be held on a regular basis ))', 72, 3),
(10, 'Панютина Марина Николаевна ', 'Marina N. Panyutina ', '(Ивановский государственный университет), аспирант кафедры зарубежной филологии', '(Ivanovo State University), post-graduate student of the Department of Foreign Philology', 'Благодарю за интересное и прекрасно организованное мероприятие! А также за предоставленную возможность принять в нём участие!\r\nНадеюсь на встречу в следующем году.', 'Thank you for an interesting and perfectly organized event! As well as for the chance to participate! Look forward to meeting you next year.', 78, 5),
(11, 'Панова Ольга Борисовна ', 'Olga B. Panova ', '(Национальный Исследовательский Томский государственный университет), кандидат филологических наук, доцент', '(National Research Tomsk State University), PhD, Associate Professor', 'Благодарю вас за предоставленную мне возможность выступить на конференции МГИМО-Одинцово «Язык. Культура. Перевод»! Считаю, что конференция прошла успешно, было очень интересно! Спасибо всем организаторам конференции, руководству МГИМО-Одинцово! Конечно, отдельно спасибо руководителю нашей секции Босовой Людмиле Михайловне за интеллигентное и грамотное ведение секции и за положительный отзыв о моём докладе. Я обязательно расскажу о конференции в нашем — Томском государственном университете.\r\nСпасибо также за сертификат и высланные видеозаписи конференции.', 'Thank you for the opportunity to give a talk at the conference \"Language. Culture. Translation\" at MGIMO-Odintsovo! In my opinion, the conference was a success, it was very interesting! I would like to thank the hosts, the administration of MGIMO-Odintsovo! And I would like, of course, to thank the head of our section Bosova Lyudmila Mikhailovna personally - for her thoughtful and compentent monitoring, and for the positive response to my presentation. I will, no doubt, tell about the conference to my colleagues at Tomsk State University.  Special thanks for the certificate and the conference videos you provided.', 78, 5),
(12, 'Попова Елена Павловна ', 'Elena P. Popova ', '(Российский Государственный Университет Правосудия), кандидат филологических наук, доцент', '(Russian State University of Justice), PhD, Associate Professor', 'Большое спасибо за предоставленную возможность участия и высланный сертификат! \r\nВсего Вам самого доброго!', 'Thank you very much for the opportunity to participate and for the certificate that was kindly posted to me!  My very best wishes!', 78, 4),
(14, 'Карасик Владимир Ильич ', 'Vladimir I. Karasik ', '(Государственный институт русского языка имени А.С. Пушкина), доктор филологических наук, профессор кафедры общего и русского языкознания', '(the Pushkin State Russian Language Institute), Doctor of Philology, Professor of the Department of General and Russian Linguistics', 'Спасибо Вам за приглашение на конференцию.\r\nВсё было замечательно организовано, мне понравились доклады на пленарном заседании, и были интересные доклады на секции, которой руководила Е.В. Власова.\r\nВсего Вам доброго!\r\n', 'Thank you for the invitation to the conference. Everything was wonderfully organized, I liked the reports at the plenary session, and there were interesting reports at the section headed by Elena V. Vlasova. All the best to you!', 82, 5),
(15, 'Панова Ольга Борисовна \r\n', 'Olga B. Panova ', '(Национальный Исследовательский Томский государственный университет), кандидат филологических наук, доцент', '(National Research Tomsk State University), PhD, Associate Professor', 'Благодарю вас за предоставленную мне возможность выступить на конференции МГИМО-Одинцово «Язык. Культура. Перевод»! Считаю, что конференция прошла успешно, было очень интересно! Спасибо всем организаторам конференции, руководству МГИМО-Одинцово! Конечно, отдельно спасибо руководителю нашей секции Босовой Людмиле Михайловне за интеллигентное и грамотное ведение секции и за положительный отзыв о моём докладе. Я обязательно расскажу о конференции в нашем — Томском государственном университете.\r\nСпасибо также за сертификат и высланные видеозаписи конференции.', 'Thank you for the opportunity to give a talk at the conference \"Language. Culture. Translation\" at MGIMO-Odintsovo! In my opinion, the conference was a success, it was very interesting! I would like to thank the hosts, the administration of MGIMO-Odintsovo! And I would like, of course, to thank the head of our section Bosova Lyudmila Mikhailovna personally - for her thoughtful and compentent monitoring, and for the positive response to my presentation. I will, no doubt, tell about the conference to my colleagues at Tomsk State University.  Special thanks for the certificate and the conference videos you provided.', 82, 4),
(18, 'Elizaveta', NULL, 'Препод', NULL, '<p>Все круто!</p>', NULL, 80, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `ID_partner` int(11) NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`ID_partner`, `logo`, `ID_conf`) VALUES
(1, 'konf/2022.02.17/partners/logo-1.png', 80),
(2, 'konf/2022.02.17/partners/logo-2.png', 80),
(3, 'konf/2022.02.17/partners/logo-3.png', 80);

-- --------------------------------------------------------

--
-- Структура таблицы `photo_conf`
--

CREATE TABLE `photo_conf` (
  `ID_photo` int(11) NOT NULL,
  `photo_conf` text NOT NULL,
  `ID_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo_conf`
--

INSERT INTO `photo_conf` (`ID_photo`, `photo_conf`, `ID_conf`) VALUES
(78, 'konf/2018.03.21/foto/IMG_0862.jpg', 65),
(79, 'konf/2018.03.21/foto/IMG_0870.jpg', 65),
(80, 'konf/2018.03.21/foto/IMG_0878.jpg', 65),
(81, 'konf/2018.03.21/foto/IMG_0879.jpg', 65),
(87, 'konf/2019.02.20/foto/IMG_3917.jpg', 69),
(88, 'konf/2019.02.20/foto/IMG_3935.jpg', 69),
(89, 'konf/2019.02.20/foto/IMG_3944.jpg', 69),
(90, 'konf/2019.02.20/foto/IMG_4020.jpg', 69),
(91, 'konf/2019.02.20/foto/IMG_4050.jpg', 69),
(92, 'konf/2019.02.20/foto/IMG_4097.jpg', 69),
(93, 'konf/2019.02.20/foto/IMG_4104.jpg', 69),
(94, 'konf/2019.02.20/foto/IMG_20190220_193406.jpg', 69),
(95, 'konf/2020.02.20/foto/yazyk-kultura-perevod_03.jpg', 72),
(96, 'konf/2020.02.20/foto/yazyk-kultura-perevod_06.jpg', 72),
(97, 'konf/2020.02.20/foto/yazyk-kultura-perevod_07.jpg', 72),
(98, 'konf/2020.02.20/foto/yazyk-kultura-perevod_09.jpg', 72),
(99, 'konf/2020.02.20/foto/yazyk-kultura-perevod_10.jpg', 72),
(100, 'konf/2020.02.20/foto/yazyk-kultura-perevod_12.jpg', 72),
(101, 'konf/2020.02.20/foto/yazyk-kultura-perevod_17.jpg', 72),
(102, 'konf/2020.02.20/foto/yazyk-kultura-perevod_18.jpg', 72),
(103, 'konf/2020.02.20/foto/yazyk-kultura-perevod_29.jpg', 72),
(104, 'konf/2020.02.20/foto/yazyk-kultura-perevod_41.jpg', 72),
(105, 'konf/2020.02.20/foto/yazyk-kultura-perevod_42.jpg', 72),
(111, 'konf/2021.02.25/foto/yazyk-kultura-perevod_01.jpg', 78),
(112, 'konf/2021.02.25/foto/yazyk-kultura-perevod_02.jpg', 78),
(113, 'konf/2021.02.25/foto/yazyk-kultura-perevod_03.jpg', 78),
(114, 'konf/2021.02.25/foto/yazyk-kultura-perevod_04.jpg', 78),
(115, 'konf/2021.02.25/foto/yazyk-kultura-perevod_05.jpg', 78),
(116, 'konf/2021.02.25/foto/yazyk-kultura-perevod_06.jpg', 78),
(117, 'konf/2021.02.25/foto/yazyk-kultura-perevod_07.jpg', 78),
(118, 'konf/2021.02.25/foto/yazyk-kultura-perevod_08.jpg', 78),
(119, 'konf/2021.02.25/foto/yazyk-kultura-perevod_09.jpg', 78),
(120, 'konf/2021.02.25/foto/yazyk-kultura-perevod_10.jpg', 78),
(121, 'konf/2021.02.25/foto/yazyk-kultura-perevod_11.jpg', 78),
(122, 'konf/2021.02.25/foto/yazyk-kultura-perevod_12.jpg', 78),
(123, 'konf/2021.02.25/foto/yazyk-kultura-perevod_13.jpg', 78),
(124, 'konf/2021.02.25/foto/yazyk-kultura-perevod_14.jpg', 78),
(125, 'konf/2021.02.25/foto/yazyk-kultura-perevod_15.jpg', 78),
(126, 'konf/2021.02.25/foto/yazyk-kultura-perevod_16.jpg', 78),
(127, 'konf/2021.02.25/foto/yazyk-kultura-perevod_17.jpg', 78),
(128, 'konf/2021.02.25/foto/yazyk-kultura-perevod_18.jpg', 78),
(129, 'konf/2021.02.25/foto/yazyk-kultura-perevod_19.jpg', 78),
(130, 'konf/2021.02.25/foto/yazyk-kultura-perevod_20.jpg', 78),
(131, 'konf/2021.02.25/foto/yazyk-kultura-perevod_22.jpg', 78),
(132, 'konf/2021.02.25/foto/yazyk-kultura-perevod_23.jpg', 78),
(133, 'konf/2021.02.25/foto/yazyk-kultura-perevod_24.jpg', 78),
(134, 'konf/2021.02.25/foto/yazyk-kultura-perevod_25.jpg', 78),
(135, 'konf/2021.02.25/foto/yazyk-kultura-perevod_26.jpg', 78),
(136, 'konf/2021.02.25/foto/yazyk-kultura-perevod_27.jpg', 78),
(137, 'konf/2021.02.25/foto/yazyk-kultura-perevod_28.jpg', 78),
(142, 'konf/2021.02.25/foto/yazyk-kultura-perevod_29.jpg', 78),
(143, 'konf/2021.02.25/foto/yazyk-kultura-perevod_30.jpg', 78),
(144, 'konf/2021.02.25/foto/yazyk-kultura-perevod_31.jpg', 78),
(145, 'konf/2021.02.25/foto/yazyk-kultura-perevod_32.jpg', 78),
(184, 'konf/2022.02.17/foto/DSC_3004.JPG', 80),
(185, 'konf/2022.02.17/foto/DSC_3136.JPG', 80),
(186, 'konf/2022.02.17/foto/DSC_4168.JPG', 80),
(187, 'konf/2022.02.17/foto/DSC_4324.JPG', 80),
(188, 'konf/2022.02.17/foto/Internet_20220224_011350_2.jpeg', 80),
(189, 'konf/2022.02.17/foto/Internet_20220224_011350_8.jpeg', 80),
(190, 'konf/2022.02.17/foto/Internet_20220224_011350_9.jpeg', 80),
(191, 'konf/2022.02.17/foto/Internet_20220224_011350_10.jpeg', 80),
(192, 'konf/2022.02.17/foto/Internet_20220224_011350_12.jpeg', 80),
(193, 'konf/2022.02.17/foto/Internet_20220224_011350_15.jpeg', 80),
(194, 'konf/2022.02.17/foto/Internet_20220224_011350_16.jpeg', 80),
(195, 'konf/2022.02.17/foto/Internet_20220224_011350_17.jpeg', 80),
(196, 'konf/2022.02.17/foto/Internet_20220224_011350_21.jpeg', 80),
(197, 'konf/2022.02.17/foto/Internet_20220224_011350_23.jpeg', 80),
(198, 'konf/2022.02.17/foto/Internet_20220224_011350_26.jpeg', 80),
(199, 'konf/2022.02.17/foto/Internet_20220224_011350_27.jpeg', 80),
(200, 'konf/2022.02.17/foto/Internet_20220224_011350_29.jpeg', 80),
(201, 'konf/2022.02.17/foto/Internet_20220224_011350_30.jpeg', 80),
(202, 'konf/2022.02.17/foto/Internet_20220224_011350_34.jpeg', 80),
(203, 'konf/2022.02.17/foto/Internet_20220224_011350_35.jpeg', 80),
(204, 'konf/2022.02.17/foto/Internet_20220224_011350_36.jpeg', 80),
(205, 'konf/2022.02.17/foto/Internet_20220224_011350_41.jpeg', 80),
(206, 'konf/2022.02.17/foto/Internet_20220224_011350_43.jpeg', 80),
(207, 'konf/2022.02.17/foto/Internet_20220224_011350_44.jpeg', 80),
(208, 'konf/2022.02.17/foto/Internet_20220224_011350_45.jpeg', 80),
(209, 'konf/2022.02.17/foto/Internet_20220224_011350_47.jpeg', 80),
(210, 'konf/2022.02.17/foto/Internet_20220224_011350_48.jpeg', 80),
(211, 'konf/2022.02.17/foto/Internet_20220224_011350_49.jpeg', 80),
(212, 'konf/2022.02.17/foto/Internet_20220224_011350_51.jpeg', 80),
(213, 'konf/2022.02.17/foto/Internet_20220224_011350_53.jpeg', 80),
(214, 'konf/2022.02.17/foto/Internet_20220224_011350_54.jpeg', 80),
(215, 'konf/2022.02.17/foto/Internet_20220224_011350_70.jpeg', 80),
(216, 'konf/2022.02.17/foto/Internet_20220224_011350_71.jpeg', 80),
(217, 'konf/2022.02.17/foto/Internet_20220224_011350_72.jpeg', 80),
(218, 'konf/2022.02.17/foto/Internet_20220224_011350_74.jpeg', 80),
(219, 'konf/2022.02.17/foto/yazyk-kultura-perevod-02-22.jpg', 80),
(220, 'konf/2022.02.17/foto/yazyk-kultura-perevod-02-22_003.jpg', 80),
(221, 'konf/2022.02.17/foto/yazyk-kultura-perevod-02-22_004.jpg', 80),
(222, 'konf/2022.02.17/foto/yazyk-kultura-perevod-02-22_005.jpg', 80),
(231, 'konf/2021.06.21/foto/DSC_4168.JPG', 82),
(232, 'konf/2021.06.21/foto/DSC_4324.JPG', 82),
(233, 'konf/2021.06.21/foto/Internet_20220224_011350_2.jpeg', 82),
(234, 'konf/2021.06.21/foto/Internet_20220224_011350_8.jpeg', 82),
(235, 'konf/2021.06.21/foto/Internet_20220224_011350_9.jpeg', 82),
(236, 'konf/2021.06.21/foto/Internet_20220224_011350_10.jpeg', 82),
(237, 'konf/2021.06.21/foto/Internet_20220224_011350_12.jpeg', 82),
(238, 'konf/2021.06.21/foto/Internet_20220224_011350_15.jpeg', 82),
(239, 'konf/2021.06.21/foto/Internet_20220224_011350_16.jpeg', 82),
(240, 'konf/2019.09.15/foto/DSC_3157.JPG', 83),
(241, 'konf/2019.09.15/foto/DSC_3134.JPG', 83),
(242, 'konf/2019.09.15/foto/DSC_3083.JPG', 83),
(243, 'konf/2019.09.15/foto/DSC_3039.JPG', 83),
(244, 'konf/2019.09.15/foto/DSC_3018.JPG', 83),
(245, 'konf/2019.09.15/foto/DSC_2974.JPG', 83),
(246, 'konf/2019.09.15/foto/DSC_2992.JPG', 83),
(247, 'konf/2020.04.17/foto/DSC_3237.JPG', 84),
(248, 'konf/2020.04.17/foto/DSC_3204.JPG', 84),
(249, 'konf/2020.04.17/foto/DSC_3134.JPG', 84),
(250, 'konf/2020.04.17/foto/DSC_3083.JPG', 84),
(251, 'konf/2020.04.17/foto/DSC_3039.JPG', 84),
(252, 'konf/2020.04.17/foto/DSC_3018.JPG', 84),
(253, 'konf/2020.04.17/foto/DSC_2974.JPG', 84),
(254, 'konf/2021.10.21/foto/DSC_3134.JPG', 85),
(255, 'konf/2021.10.21/foto/DSC_3083.JPG', 85),
(256, 'konf/2021.10.21/foto/DSC_3039.JPG', 85),
(257, 'konf/2021.10.21/foto/DSC_3018.JPG', 85),
(258, 'konf/2021.10.21/foto/DSC_3237.JPG', 85),
(259, 'konf/2021.10.21/foto/DSC_3204.JPG', 85),
(260, 'konf/2021.10.21/foto/DSC_3186.JPG', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `playbill`
--

CREATE TABLE `playbill` (
  `ID_playbill` int(11) NOT NULL,
  `name_playbill_ru` text NOT NULL,
  `name_playbill_en` text,
  `road_ru` text NOT NULL,
  `road_en` text NOT NULL,
  `ID_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `playbill`
--

INSERT INTO `playbill` (`ID_playbill`, `name_playbill_ru`, `name_playbill_en`, `road_ru`, `road_en`, `ID_conf`) VALUES
(14, 'программа 2019', NULL, '/adminPanels/konf/2019.02.20/playbill/Programma konferentsii 2019.docx', '', 69),
(15, 'полная программа 2020', NULL, '/adminPanels/konf/2020.02.20/playbill/Polnaya programma 2020.docx', '', 72),
(16, 'краткая программа 2020', NULL, '/adminPanels/konf/2020.02.20/playbill/Kratkaya programma 2020.docx', '', 72),
(17, 'программа 2021', '', 'adminPanels/konf/2021.02.25/playbill/VKR Volohova I-4.1.docx', '', 78),
(21, 'Информационное письмо 2022', 'Call for papers 2022', '/adminPanels/konf/2022.02.17/playbill/Informatsionnoe pismo 2022.pdf', '/adminPanels/konf/2022.02.17/playbill/Call for papers 2022.pdf', 80),
(22, 'Программа конференции', 'Conference programme', '/adminPanels/konf/2022.02.17/playbill/programme 2022.docx', '/adminPanels/konf/2022.02.17/playbill/Programme Rus-English 2022.docx', 80),
(23, '', 'Zoom links', '', '/adminPanels/konf/2022.02.17/playbill/zoom links.docx', 80),
(25, 'программа', 'programm', '/adminPanels/konf/2021.06.21/playbill/Programma 2021.pdf', '/adminPanels/konf/2021.06.21/playbill/Programma 2021.pdf', 82),
(26, 'программа конференции', '', '/adminPanels/konf/2019.09.15/playbill/Informatsionnoe pismo 2022 (1).pdf', '', 83),
(27, 'программа конференции', 'conference program', '/adminPanels/konf/2020.04.17/playbill/Informatsionnoe pismo 2022 (1).pdf', '/adminPanels/konf/2020.04.17/playbill/Call for papers 2022.pdf', 84);

-- --------------------------------------------------------

--
-- Структура таблицы `speakers`
--

CREATE TABLE `speakers` (
  `ID_speak` int(11) NOT NULL,
  `ID_conf` int(11) NOT NULL,
  `name_ru` text NOT NULL,
  `name_en` text,
  `photo` text NOT NULL,
  `linkSP_ru` text NOT NULL,
  `linkSP_en` text NOT NULL,
  `info_ru` text NOT NULL,
  `info_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speakers`
--

INSERT INTO `speakers` (`ID_speak`, `ID_conf`, `name_ru`, `name_en`, `photo`, `linkSP_ru`, `linkSP_en`, `info_ru`, `info_en`) VALUES
(12, 65, 'Блох Марк Яковлевич', 'Mark Ya. Blokh', 'konf/2018.03.21/speakers/Mark_YAkovlevich_Bloh.jpg', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', '', ''),
(17, 69, 'Васильев Сергей Константинович', 'Sergey K. Vasiliev ', 'konf/2019.02.20/speakers/63d4ac9566d943ffac8bb4c102fc457f.jpg', 'https://mgimo.ru/people/vasilev/', 'https://mgimo.ru/people/vasilev/', '', ''),
(27, 69, 'Блох Марк Яковлевич ', 'Mark Ya. Blokh', 'konf/2019.02.20/speakers/bloh.jpg', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', '', ''),
(28, 69, 'Шелов Сергей Дмитриевич', 'Sergey D. Shelov', 'konf/2019.02.20/speakers/shelov.jpg', 'http://www.ruslang.ru/publica/shelov', 'http://www.ruslang.ru/publica/shelov', '', ''),
(29, 69, 'Четверикова Татьяна Дмитриевна', 'Tatiana D. Chetverikova', 'konf/2019.02.20/speakers/chetverikova.jpg', 'http://www.ruslang.ru/publica/chetverikova', 'http://www.ruslang.ru/publica/chetverikova', '', ''),
(30, 69, 'Веденина Людмила Георгиевна', 'Ludmila G. Vedenina', 'konf/2019.02.20/speakers/vedenina.jpg', 'https://mgimo.ru/people/vedenina/', 'https://mgimo.ru/people/vedenina/', '', ''),
(31, 72, 'Карасик Владимир Ильич', 'Vladimir I. Karasik', 'konf/2020.02.20/speakers/karasik.jpg', 'https://ru.wikipedia.org/wiki/Карасик,_Владимир_Ильич', 'https://ru.wikipedia.org/wiki/Карасик,_Владимир_Ил...', '', ''),
(32, 72, 'Jane Setter ', 'Jane Setter ', 'konf/2020.02.20/speakers/setter.jpg', 'https://en.wikipedia.org/wiki/Jane_Setter', 'https://en.wikipedia.org/wiki/Jane_Setter', '', ''),
(33, 72, 'Éva Jakusné Harnos ', 'Éva Jakusné Harnos ', 'konf/2020.02.20/speakers/eva.jpg', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', '', ''),
(34, 72, 'Алексеева Ирина Сергеевна', 'Irina S. Alexeeva ', 'konf/2020.02.20/speakers/alekseeva.jpg', 'https://www.herzen.spb.ru/main/structure/inst/inyaz/1410533555/1410533942/1410555459/1410560975/1410609981/', 'https://www.herzen.spb.ru/main/structure/inst/inyaz/1410533555/1410533942/1410555459/1410560975/1410609981/', '', ''),
(35, 72, 'Блох Марк Яковлевич', 'Mark Ya. Blokh', 'konf/2020.02.20/speakers/bloh.jpg', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', 'https://ru.wikipedia.org/wiki/Блох,_Марк_Яковлевич', '', ''),
(36, 72, 'Веденина Людмила Георгиевна ', 'Ludmila G. Vedenina', 'konf/2020.02.20/speakers/vedenina.jpg', 'https://mgimo.ru/people/vedenina/', 'https://mgimo.ru/people/vedenina/', '', ''),
(37, 72, 'Беликова Анна Алексеевна', 'Belikova A. Anna', 'konf/2020.02.20/speakers/belikova.jpg', 'https://fmp.msu.ru/o-fakultete/kafedry/kafedra-informatsionnogo-obespecheniya-vneshnej-politiki/prepodavateli/belikova-a-a', 'https://fmp.msu.ru/o-fakultete/kafedry/kafedra-informatsionnogo-obespecheniya-vneshnej-politiki/prepodavateli/belikova-a-a', '', ''),
(38, 78, 'Карпова Ольга Михайловна', 'Olga M. Karpova', 'konf/2021.02.25/speakers/karpova.jpg', 'http://ivanovo.ac.ru/about_the_university/employees/388/', 'http://ivanovo.ac.ru/about_the_university/employees/388/', '', ''),
(41, 78, 'Анисимова Александра Григорьевна', 'Aleksandra G. Anisimova', 'konf/2021.02.25/speakers/anisimova.jpg', 'https://www.philol.msu.ru/~engdep/department/staff/anisimova-aleksandra/', 'https://www.philol.msu.ru/~engdep/department/staff/anisimova-aleksandra/', '', ''),
(42, 78, 'Козуляев Алексей Владимирович', 'Alexey V. Kozulyaev', 'konf/2021.02.25/speakers/kozuliaev.jpg', 'https://marketing.hse.ru/lecturers/kozuljaev', 'https://marketing.hse.ru/lecturers/kozuljaev', '', ''),
(43, 78, 'Éva Jakusné Harnos ', 'Éva Jakusné Harnos ', 'konf/2021.02.25/speakers/eva.jpg', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', '', ''),
(44, 65, 'Евгения Михайловна Какзанова', 'Evgeniya M. Kakzanova', 'konf/2018.03.21/speakers/foto_kakzanova.jpg', 'https://kakzanova.ru/', 'https://kakzanova.ru/', '', ''),
(47, 80, 'Добросклонская Татьяна Георгиевна', 'Tatiana G. Dobrosklonskaya', 'konf/2022.02.17/speakers/dobr.jpg', 'https://fmp.msu.ru/o-fakultete/kafedry/kafedra-informatsionnogo-obespecheniya-vneshnej-politiki/prepodavateli/dobrosklonskaya-t-g', 'https://fmp.msu.ru/o-fakultete/kafedry/kafedra-informatsionnogo-obespecheniya-vneshnej-politiki/prepodavateli/dobrosklonskaya-t-g', 'Доктор филологических наук, профессор, профессор кафедры информационного обеспечения внешней политики факультета мировой политики МГУ имени М.В. Ломоносова, Почетный профессор Пекинского университета международного сотрудничества.\r\n\r\nЯвляется автором более ста работ по вопросам языка средств массовой информации, политического медиадискурса, межкультурной коммуникации, сетевых текстов, в том числе «Вопросы изучения медиатекстов», «Медиалингвистика: системный подход к изучению языка СМИ», «Язык СМИ». \r\n\r\nДобросклонская Т.Г. регулярно участвует в международных конференциях, неоднократно читала лекции на английском языке по приглашению зарубежных университетов (США, Великобритания, Канада).', ''),
(48, 80, 'Сдобников Вадим Витальевич', 'Vadim V. Sdobnikov ', 'konf/2022.02.17/speakers/sdob.jpg', 'https://lunn.ru/tutors/5677', 'https://lunn.ru/tutors/5677', 'Доктор филологических наук, доцент, заведующий кафедрой теории и практики английского языка и перевода Нижегородского лингвистического университета, Председатель Правления Союза переводчиков России.\r\n\r\nАвтор более 150 научных и научно-методических работ на русском и английском языках по теории, дидактике и практике перевода.\r\n\r\nЧлен редколлегий журналов «Вестник Нижегородского государственного лингвистического университета им. Н. А. Добролюбова», «Мосты. Журнал переводчиков»\r\n', ''),
(49, 80, 'Прошина Зоя Григорьевна', 'Zoya G. Proshina', 'konf/2022.02.17/speakers/proshina.jpg', 'https://istina.msu.ru/profile/proshinazoyag/', 'https://istina.msu.ru/profile/proshinazoyag/', 'Доктор филологических наук, профессор, профессор кафедры теории преподавания иностранных языков факультета иностранных языков и регионоведения МГУ им. М.В. Ломоносова. Область научных интересов – теория лингвоконтактологии, межкультурной коммуникации, перевода. Автор более 120 научных и научно-методических работ на русском и английском языках. ', ''),
(50, 80, 'Jane Setter', 'Jane Setter', 'konf/2022.02.17/speakers/setter.jpg', 'https://www.reading.ac.uk/elal/staff/professor-jane-setter   ', 'https://www.reading.ac.uk/elal/staff/professor-jane-setter   ', 'Джейн Сеттер – всемирно известный профессор фонетики и эксперт в области научной коммуникации Университета Рединга (Великобритания), регулярно участвующий в научно-исследовательской деятельности. Является соредактором восемнадцатого издания Cambridge English Pronouncing Dictionary. ', 'Reading University (Reading, UK), Professor of Phonetics\r\nJane Setter is probably best known as co-editor of the eighteenth edition of the Cambridge English Pronouncing Dictionary (CUP, 2011). Her main research interests are English phonetics and phonology, English pronunciation and intelligibility, phonology in atypical speech populations, and phonetics and phonology in Hong Kong English; her particular interest is in prosodic aspects of speech such as rhythm and intonation. She is a popular keynote speaker, both at home and abroad.\r\n'),
(51, 80, 'Карпова Ольга Михайловна', 'Olga M. Karpova', 'konf/2022.02.17/speakers/karpova.png', 'http://ivanovo.ac.ru/about_the_university/employees/388/ ', 'http://ivanovo.ac.ru/about_the_university/employees/388/ ', 'Доктор филологических наук, профессор, профессор Ивановского государственного университета,\r\nзаведующая Научно-образовательным центром «Актуальные проблемы современной лексикографии», президент Ивановской ассоциации преподавателей английского языка «IVELTA», Заслуженный работник Высшей школы РФ.\r\n \r\nЕжегодно её аспиранты и студенты проходят стажировки в ведущих отечественных и зарубежных центрах, а выпускники работают как в российских университетах (Иваново, Москва, Ярославль), так и в зарубежных (Великобритания, США, Италия и т.д.). \r\n\r\nС 1995 года О. М. Карпова является организатором девяти школ-семинаров по лексикографии, имеющих международное признание.\r\n\r\n\r\n', ''),
(52, 80, 'Asen Kirin', 'Asen Kirin', 'konf/2022.02.17/speakers/kirin.jpg', 'https://art.uga.edu/directory/asen-kirin ', 'https://art.uga.edu/directory/asen-kirin ', 'Асен Кирин – профессор истории искусств Школы искусств имени Ламара Додда (Университет штата Джорджия, США), куратор коллекции русского искусства им. В. Паркера (Музей штата Джорджия). Профессор Кирин учился в Университете Софии в Болгарии, изучал славянские языки и литературу в Московском государственном университете. Степень магистра искусств получил в Университете Вандербильта (США), степень доктора наук – в Принстонском университете (США). Профессор Кирин – эксперт по позднему античному, византийскому и русскому искусству и архитектуре.\r\n\r\nС 2018 года профессор Кирин активно сотрудничает с факультетом лингвистики и межкультурной коммуникации МГИМО-Одинцово, читая\r\nонлайн лекции по сохранению российского культурного наследия в США бакалаврам, магистрантам и преподавателям.\r\n', 'Asen Kirin is a Professor of Art History, Parker Curator of Russian Art (Lamar Dodd School of Art, The Georgia Museum of Art, The University of Georgia). From 2018 Prof. Kirin has been successfully cooperating with the School of Linguistics and Cross-Cultural Cooperation giving online lectures on preserving Russian cultural heritage in the USA for BA and MA students and teachers of the School. '),
(54, 80, 'Анатолий Тёмкин', 'Anatoly Temkin', 'konf/2022.02.17/speakers/temkin.jpg', 'https://www.bu.edu/met/profile/anatoly-temkin/ ', 'https://www.bu.edu/met/profile/anatoly-temkin/ ', 'Анатолий Темкин – профессор Бостонского университета, одного из ведущих университетов США, заведующий кафедрой компьютерных наук колледжа Метрополитен при Бостонском университете, автор онлайн-курсов по информационным технологиям и криптографии. ', 'Department of Computer Science, Boston University, USA, \r\nPh.D., Professor and Chair.\r\n\r\nDr. Temkin teaches undergraduate and graduate courses in discrete mathematics, computer language theory, cryptography, algorithms, and computer information systems. In 2004, he received the Metcalf Award for Excellence in Teaching. His research interests include information security and curriculum design.'),
(55, 80, 'Климачев Вадим Владимирович', 'Vadim V. Klimachev', 'konf/2022.02.17/speakers/klim.jpg', 'https://institute.gazprom.ru/about/teachers/klimachev/ ', 'https://institute.gazprom.ru/about/teachers/klimachev/ ', 'Кандидат экономических наук, руководитель группы международных образовательных проектов «Газпром корпоративный институт», руководитель направления «Корпоративная языковая подготовка». Председатель Совета основной образовательной программы магистратуры «Иностранные языки и межкультурная коммуникация в сфере бизнеса и экономики» Санкт-Петербургского государственного университета.', ''),
(56, 80, 'Орлова Елена Владимировна', 'Elena V. Orlova ', 'konf/2022.02.17/speakers/orlova.jpg', 'https://gsom.spbu.ru/about-gsom/faculty/orlova/ ', 'https://gsom.spbu.ru/about-gsom/faculty/orlova/ ', 'Кандидат психологических наук, заведующий кафедрой иностранных языков в сфере менеджмента СПбГУ, доцент кафедры иностранных языков в сфере менеджмента, языковой координатор CEMS.', ''),
(59, 80, 'Окунев Игорь Юрьевич', 'Igor Yu. Okunev', 'konf/2022.02.17/speakers/okunev.jpg', 'https://mgimo.ru/people/okunev/ ', 'https://mgimo.ru/people/okunev/ ', 'Кандидат политических наук, доцент, ведущий научный сотрудник и директор Центра пространственного анализа международных отношений Института международных исследований МГИМО.\r\n\r\nАвтор учебника по политической географии, трех индивидуальных монографий («Основы пространственного анализа», «Столицы в зеркале критической геополитики», «Геополитика микрогосударств») и более ста публикаций по вопросам политической географии, критической геополитики, столицеведения и федерализма в ведущих российских и зарубежных научных изданиях.\r\n\r\nПредседатель исследовательского комитета по геополитике Международной ассоциации политической науки, действительный член Русского географического общества и Ассоциации российских географов-обществоведов. Ответственный секретарь онлайн-версии журнала Сравнительная политика (WoS). \r\n', ''),
(60, 80, 'Сергей Дмитриевич Шелов', 'Sergey D. Shelov', 'konf/2022.02.17/speakers/shelov.jpg', 'https://www.ruslang.ru/publica/shelov ', 'https://www.ruslang.ru/publica/shelov ', 'Доктор филологических наук, главный научный сотрудник и руководитель терминологического центра Института русского языка им. В.В. Виноградова. \r\n\r\nРуководитель и участник разработки Автоматизированной информационной системы научной терминологии «WinTerm» (ИРЯ РАН), а также ряда проектов, поддержанных РГНФ и РФФИ.\r\n\r\nОтветственный редактор пяти выпусков издания «Терминология и знание», соорганизатор пяти международных симпозиумов «Терминология и знание».\r\n\r\nЯвляется автором более 250 трудов по терминоведению и терминографии, одним из разработчиков трех нормативных словарей / словарей рекомендуемых терминов и терминологических рекомендаций. \r\n', ''),
(63, 80, 'Маймина Эльвира Викторовна', 'Elvira V. Maimina', 'konf/2022.02.17/speakers/maymina.jpg', 'https://lang-prosv.ru/organization/management.html?sphrase_id=3278', 'https://lang-prosv.ru/organization/management.html?sphrase_id=3278', 'Доктор экономических наук, доцент, генеральный директор ООО «Лэнгвидж.Просвещение». В 2010 году защитила докторскую диссертацию по теме: «Реструктуризация деятельности организации как институционный инструмент обеспечения устойчивого развития национальной экономики». Более 7 лет являлась Деканом экономического факультета, заместителем проректора по учебной части, заведующим кафедрой экономической теории в Академии труда и социальных отношений. С февраля 2019 года заместитель председателя Общественного совета Федеральной службы по надзору в сфере образования и науки.', ''),
(64, 80, 'Гавриленко Наталия Николаевна', 'Natalia N. Gavrilenko ', 'konf/2022.02.17/speakers/gavr.jpg', 'https://www.gavrilenko-nn.ru/school/edinomyshlennik/view/1', 'https://www.gavrilenko-nn.ru/school/edinomyshlennik/view/1', 'Доктор педагогических наук, профессор кафедры иностранных языков Инженерной академии Российского университета дружбы народов.\r\n\r\nСоздатель и руководитель Школы дидактики перевода (www.gavrilenko-nn.ru).\r\n\r\nАвтор более 170 научных работ в области переводоведения и дидактики перевода.\r\n\r\nЧлен диссертационных советов по защите докторских и кандидатских диссертаций -\r\n\r\nна базе РУДН - лингвистический и методический советы;\r\nна базе МГЛУ - методический совет.\r\nЧлен редакционных советов: Вестник Российский университет дружбы народов «Вопросы образования: языки и специальность», научного Проекта SWorld по Программе Sworld-Men-Редактор; Вестник Московского государственного лингвистического университета «Педагогические науки», Editura Eurostampa, ISBN 978-606-569-614-3, Румыния,\r\nЧлен Учебно-методического объединения по образованию в области лингвистики (неязыковые вузы) (МГЛУ).\r\nЧлен Союза переводчиков России.', ''),
(66, 82, 'Веденина Людмила Георгиевна', 'Ludmila G. Vedenina', 'konf/2021.06.21/speakers/vedenina.jpg', 'https://mgimo.ru/people/vedenina/', 'https://mgimo.ru/people/vedenina/', '', ''),
(67, 82, 'Éva Jakusné Harnos ', 'Éva Jakusné Harnos ', 'konf/2021.06.21/speakers/eva.jpg', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', 'https://www.researchgate.net/profile/Eva-Jakusne-Harnos-2', '', ''),
(68, 82, 'Алексеева Ирина Сергеевна', 'Irina S. Alexeeva ', 'konf/2021.06.21/speakers/alekseeva.jpg', 'https://www.herzen.spb.ru/main/structure/inst/inyaz/1410533555/1410533942/1410555459/1410560975/1410609981/', 'https://www.herzen.spb.ru/main/structure/inst/inyaz/1410533555/1410533942/1410555459/1410560975/1410609981/', '', ''),
(69, 83, 'Иванов Сергей Иванович', 'Sergey I. Ivanov', 'konf/2019.09.15/speakers/1.jpg', '', '', '', ''),
(70, 83, 'Завьялов Виктор Васильевич', 'Victor V. Zavyalov', 'konf/2019.09.15/speakers/2.jpg', '', '', '', ''),
(71, 83, 'Пижурин Ярослав Алексеевич', 'Yaroslav A. Pyzhurin', 'konf/2019.09.15/speakers/3.jpeg', '', '', '', ''),
(72, 84, 'Петров Николай Иванович', 'Nikolai I. Petrov', 'konf/2020.04.17/speakers/3.jpeg', '', '', '', ''),
(73, 84, 'Иванов Сергей Сергеевич', 'Sergey S. Ivanov', 'konf/2020.04.17/speakers/4.jpg', '', '', '', ''),
(74, 85, 'Абрамов Михаил Иванович', 'Mikhail I. Abramov', 'konf/2021.10.21/speakers/3.jpeg', '', '', '', ''),
(75, 85, 'Миров Виталий Игоревич', 'Vitaly I. Mirov', 'konf/2021.10.21/speakers/4.jpg', '', '', '', ''),
(76, 85, 'Завьялов Степан Михайлович', 'Stepan M. Zavyalov', 'konf/2021.10.21/speakers/2.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `name_us` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `access_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_user`, `name_us`, `login`, `password`, `access_level`) VALUES
(14, '1', '1', '$2y$10$Uzlo8/.JzeJRpnUXBaC0CebCokYUPHqhPYpKl3WZTXYQQaJBHb/7i', 1),
(15, 'Elennn', '2', '$2y$10$xOkEncqLBYBoLHB9b0.W8eG8yxt5/HAUOI.hSrdokgubS0NqeWPqK', 1),
(16, 'Helen Skott', '2', '2', 1),
(17, 'Elizaveta', 'Lisa', '$2y$10$Jp/8alMtWQaflwkalDXCQuSr6qQ.qAzjtNIJ07.shPiGKNoBHiHn.', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `video_conf`
--

CREATE TABLE `video_conf` (
  `ID_video_conf` int(11) NOT NULL,
  `video_conf` text NOT NULL,
  `ID_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video_conf`
--

INSERT INTO `video_conf` (`ID_video_conf`, `video_conf`, `ID_conf`) VALUES
(117, 'Vh1DzC0xayw', 69),
(118, 'uZLpDh1bVHY', 72),
(119, 'LLpcCXzrqEY', 72),
(125, 'dGVfbq_bz3c', 78),
(126, 'TPhnia47gFg', 78),
(127, 'd7p0vsb4DFQ', 78),
(128, 'vJ00uSRHt_U', 78),
(129, 'JfOza1zPncA', 78),
(130, 'WpMX3-PluI0', 78),
(131, 'BmTSXKbAu6I', 78),
(132, 'KdFDnE_IMI0', 78),
(133, 'TV7G69vRfs4', 78),
(134, 'OXct6gco0Eo', 78),
(135, 'lYBK2kanbSM', 78),
(136, 'bNrOeVVcPZ8', 78),
(140, 'EuZmbYnloTA', 78),
(141, 'nQQ1HBNo09A', 78),
(144, 'elOH2HTflAk', 78),
(145, '4TD17UPVdvQ', 80);

-- --------------------------------------------------------

--
-- Структура таблицы `years`
--

CREATE TABLE `years` (
  `ID_year` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `years`
--

INSERT INTO `years` (`ID_year`, `year`) VALUES
(1, 2018),
(2, 2019),
(3, 2020),
(4, 2021),
(5, 2022),
(6, 2023);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`ID_per`);

--
-- Индексы таблицы `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`ID_conf`),
  ADD KEY `ID_year` (`ID_year`);

--
-- Индексы таблицы `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`ID_date`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `el_collection`
--
ALTER TABLE `el_collection`
  ADD PRIMARY KEY (`ID_documents`),
  ADD KEY `documents_ibfk_1` (`ID_conf`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_feedback`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`ID_partner`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `photo_conf`
--
ALTER TABLE `photo_conf`
  ADD PRIMARY KEY (`ID_photo`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `playbill`
--
ALTER TABLE `playbill`
  ADD PRIMARY KEY (`ID_playbill`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`ID_speak`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- Индексы таблицы `video_conf`
--
ALTER TABLE `video_conf`
  ADD PRIMARY KEY (`ID_video_conf`),
  ADD KEY `ID_conf` (`ID_conf`);

--
-- Индексы таблицы `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`ID_year`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `committee`
--
ALTER TABLE `committee`
  MODIFY `ID_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `conferences`
--
ALTER TABLE `conferences`
  MODIFY `ID_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `dates`
--
ALTER TABLE `dates`
  MODIFY `ID_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `el_collection`
--
ALTER TABLE `el_collection`
  MODIFY `ID_documents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `ID_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `photo_conf`
--
ALTER TABLE `photo_conf`
  MODIFY `ID_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT для таблицы `playbill`
--
ALTER TABLE `playbill`
  MODIFY `ID_playbill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `speakers`
--
ALTER TABLE `speakers`
  MODIFY `ID_speak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `video_conf`
--
ALTER TABLE `video_conf`
  MODIFY `ID_video_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT для таблицы `years`
--
ALTER TABLE `years`
  MODIFY `ID_year` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_ibfk_1` FOREIGN KEY (`ID_year`) REFERENCES `years` (`ID_year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dates`
--
ALTER TABLE `dates`
  ADD CONSTRAINT `dates_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `el_collection`
--
ALTER TABLE `el_collection`
  ADD CONSTRAINT `el_collection_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo_conf`
--
ALTER TABLE `photo_conf`
  ADD CONSTRAINT `photo_conf_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `playbill`
--
ALTER TABLE `playbill`
  ADD CONSTRAINT `playbill_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `speakers`
--
ALTER TABLE `speakers`
  ADD CONSTRAINT `speakers_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `video_conf`
--
ALTER TABLE `video_conf`
  ADD CONSTRAINT `video_conf_ibfk_1` FOREIGN KEY (`ID_conf`) REFERENCES `conferences` (`ID_conf`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
