-- MariaDB dump 10.19  Distrib 10.8.4-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: palach
-- ------------------------------------------------------
-- Server version	10.8.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'Анна Сергеевна','+7 (3522) 46-21-24'),
(2,'Михаил Петрович','+7 (3522) 46-21-25'),
(3,'Анна Сергеевна','+7 (3522) 46-21-24'),
(4,'Михаил Петрович','+7 (3522) 46-21-25');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES
(1,'А.П. Чехов'),
(2,'У. Шекспир'),
(3,'Н.В. Гоголь'),
(4,'А.Н. Островский'),
(5,'Жан-Батист Мольер'),
(6,'А.П. Чехов'),
(7,'У. Шекспир'),
(8,'Н.В. Гоголь'),
(9,'А.Н. Островский'),
(10,'Жан-Батист Мольер');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cast_members`
--

DROP TABLE IF EXISTS `cast_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cast_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cast_members`
--

LOCK TABLES `cast_members` WRITE;
/*!40000 ALTER TABLE `cast_members` DISABLE KEYS */;
INSERT INTO `cast_members` VALUES
(1,'Петров С.С.','Актёр'),
(2,'Иванова Н.Н.','Актриса'),
(3,'Сидоров В.В.','Художник-постановщик'),
(4,'Васильева Е.Е.','Балетмейстер'),
(5,'Козлов Д.Д.','Актёр'),
(6,'Морозова Л.Л.','Костюмер'),
(7,'Петров С.С.','Актёр'),
(8,'Иванова Н.Н.','Актриса'),
(9,'Сидоров В.В.','Художник-постановщик'),
(10,'Васильева Е.Е.','Балетмейстер'),
(11,'Козлов Д.Д.','Актёр'),
(12,'Морозова Л.Л.','Костюмер');
/*!40000 ALTER TABLE `cast_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_office_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reception_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reception_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES
(1,'г. Курган, ул. Гоголя, д. 58','Ежедневно с 10:00 до 19:00','Касса театра работает ежедневно с 10:00 до 19:00 без перерывов','+7 (3522) 46-21-23','kurgandrama@kurganobl.ru'),
(2,'г. Курган, ул. Гоголя, д. 58','Ежедневно с 10:00 до 19:00','Касса театра работает ежедневно с 10:00 до 19:00 без перерывов','+7 (3522) 46-21-23','kurgandrama@kurganobl.ru');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES
(1,'Иванов И.И.'),
(2,'Смирнова А.В.'),
(3,'Кузнецов П.Н.'),
(4,'Иванов И.И.'),
(5,'Смирнова А.В.'),
(6,'Кузнецов П.Н.');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES
(1,'Драма'),
(2,'Комедия'),
(3,'Трагедия'),
(4,'Мюзикл'),
(5,'Балет'),
(6,'Опера'),
(7,'Драма'),
(8,'Комедия'),
(9,'Трагедия'),
(10,'Мюзикл'),
(11,'Балет'),
(12,'Опера');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES
(1,'Гастроли в Тюмени','Наш театр выступит в Тюмени 20-25 мая.','С полным составом труппа отправится в гастрольный тур.','2025-05-12 20:34:55'),
(2,'Мастер-класс по сценической речи','Приглашаем студентов и школьников.','Ведёт мастер-класс народный артист Иван Иванов.','2025-05-12 20:34:55'),
(3,'Премьера сезона: \"Гроза\"','Уже в эту пятницу — долгожданная премьера.','Постановка режиссёра Сергея Смирнова. В главной роли — Анна Каренина.','2025-05-12 20:34:55');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performance_cast`
--

DROP TABLE IF EXISTS `performance_cast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performance_cast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `performance_id` int(11) DEFAULT NULL,
  `cast_member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performance_id` (`performance_id`),
  KEY `cast_member_id` (`cast_member_id`),
  CONSTRAINT `performance_cast_ibfk_1` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`),
  CONSTRAINT `performance_cast_ibfk_2` FOREIGN KEY (`cast_member_id`) REFERENCES `cast_members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance_cast`
--

LOCK TABLES `performance_cast` WRITE;
/*!40000 ALTER TABLE `performance_cast` DISABLE KEYS */;
INSERT INTO `performance_cast` VALUES
(65,1,1),
(66,1,2),
(67,2,3),
(68,3,4),
(69,2,5),
(70,2,4),
(71,2,2),
(72,5,3),
(73,3,1);
/*!40000 ALTER TABLE `performance_cast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performance_dates`
--

DROP TABLE IF EXISTS `performance_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performance_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `performance_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performance_id` (`performance_id`),
  CONSTRAINT `performance_dates_ibfk_1` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance_dates`
--

LOCK TABLES `performance_dates` WRITE;
/*!40000 ALTER TABLE `performance_dates` DISABLE KEYS */;
INSERT INTO `performance_dates` VALUES
(1,1,'2025-06-01'),
(2,1,'2025-06-02'),
(3,1,'2025-06-03'),
(4,2,'2025-06-04'),
(5,2,'2025-06-05'),
(6,2,'2025-06-06'),
(7,3,'2025-06-07'),
(8,3,'2025-06-08'),
(9,3,'2025-06-09'),
(10,4,'2025-06-10'),
(11,4,'2025-06-11'),
(12,4,'2025-06-12'),
(13,5,'2025-06-13'),
(14,5,'2025-06-14'),
(15,5,'2025-06-15'),
(16,6,'2025-06-16'),
(17,6,'2025-06-17'),
(18,6,'2025-06-18'),
(19,7,'2025-06-19'),
(20,7,'2025-06-20'),
(21,7,'2025-06-21'),
(22,8,'2025-06-22'),
(23,8,'2025-06-23'),
(24,8,'2025-06-24'),
(25,9,'2025-06-25'),
(26,9,'2025-06-26'),
(27,9,'2025-06-27'),
(28,10,'2025-06-28'),
(29,10,'2025-06-29'),
(30,10,'2025-06-30'),
(31,11,'2025-07-01'),
(32,11,'2025-07-02'),
(33,11,'2025-07-03'),
(34,12,'2025-07-04'),
(35,12,'2025-07-05'),
(36,12,'2025-07-06'),
(37,13,'2025-07-07'),
(38,13,'2025-07-08'),
(39,13,'2025-07-09'),
(40,14,'2025-07-10'),
(41,14,'2025-07-11'),
(42,14,'2025-07-12'),
(43,15,'2025-07-13'),
(44,15,'2025-07-14'),
(45,15,'2025-07-15'),
(46,16,'2025-07-16'),
(47,16,'2025-07-17'),
(48,16,'2025-07-18');
/*!40000 ALTER TABLE `performance_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performance_details`
--

DROP TABLE IF EXISTS `performance_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performance_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `performance_id` int(11) NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermission_duration` int(11) DEFAULT NULL,
  `awards` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performance_id` (`performance_id`),
  CONSTRAINT `performance_details_ibfk_1` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance_details`
--

LOCK TABLES `performance_details` WRITE;
/*!40000 ALTER TABLE `performance_details` DISABLE KEYS */;
INSERT INTO `performance_details` VALUES
(1,1,'Полная история о последнем вздохе аристократии на фоне перемен в России. \"Вишнёвый сад\" Чехова затрагивает темы памяти, утраты и надежды.','И. Иванов, А. Смирнова, К. Тихонов','Сцена оформлена живыми деревьями, световое оформление подчеркивает смену сезонов.',15,'Премия \"Золотая маска\" за лучшую драму'),
(2,2,'Классическая трагедия Шекспира о мести, сомнениях и борьбе за справедливость.','М. Козлов, Е. Никифорова, В. Лебедев','Минималистичные декорации, усиление звукового оформления для усиления драмы.',20,'Фестиваль \"Театральная весна\" — лучшая постановка'),
(3,3,'Интерпретация поэмы Гоголя — яркое зрелище с элементами гротеска и иронии.','А. Сидоров, И. Волкова, Ю. Брагин','Использованы элементы теневого театра, музыкальное сопровождение вживую.',10,NULL),
(4,4,'Проникновенная история о женщине, ищущей счастья в мире предрассудков.','Е. Миронова, П. Шапошников','Исторические костюмы, оригинальный музыкальный мотив XIX века.',10,NULL),
(5,5,'Острая комедия Мольера об обмане и лицемерии. Актуально и сегодня.','О. Дроздова, Р. Ельцов','Использование современной одежды, акценты на сатиру.',15,'Награда зрительских симпатий'),
(6,6,'Хлесткий сатирический рассказ о визите \"ревизора\". Гоголь в современном ключе.','И. Матвеев, Т. Белова','Современные декорации, актеры взаимодействуют со зрителями.',15,NULL),
(7,7,'Отелло — трагедия любви, предательства и разрушительной силы ревности.','С. Яковлев, А. Пирогова','Монохромный свет, плотная пластика в сценах конфликта.',15,NULL),
(8,8,'Пьеса Чехова о сложных человеческих чувствах, творчестве и разочаровании.','Н. Климова, Г. Стрелков','Меланхоличная музыка, туман как сценический эффект.',10,NULL),
(9,9,'Драма о мечтах и реальности, о трёх сёстрах в провинциальной России.','Л. Андреева, С. Мельникова','Глубокое внимание к деталям быта и реквизиту.',10,NULL),
(10,10,'Величайшая трагедия о власти, старении и человеческой гордыне.','П. Юрьев, О. Колесникова','Темные костюмы, приглушённый свет, почти камерная атмосфера.',20,'Лучшая мужская роль'),
(11,11,'Комедия о браке, социальном давлении и страхе перед переменами.','К. Жданова, Н. Гордеев','Множество бутафорских элементов, музыка 30-х годов.',5,NULL),
(12,12,'Дон Жуан — символ соблазна и свободы. Постановка сочетает комедию и трагедию.','Е. Лисина, И. Прохоров','Декорации в стиле барокко, элементы театра масок.',10,NULL),
(13,13,'Балет о любви, волшебстве и борьбе за освобождение. Великолепная музыка Чайковского.','Ансамбль балета','Механизированные декорации, более 80 костюмов.',15,'Золотой балет России'),
(14,14,'Пламенная Кармен завоевывает сердца, но платит высокую цену за свободу.','Н. Савина, О. Гальцев','Испанские мотивы, живой оркестр, сцены фламенко.',15,NULL),
(15,15,'История любви Онегина и Татьяны на фоне русской природы и судьбы.','Д. Платонов, В. Крылова','Поэтическое прочтение с использованием мультиэкранов.',15,NULL),
(16,16,'Сказка о девочке, которая попадает в волшебный мир. Музыка Чайковского.','М. Митина, Ю. Карпов','Куклы и марионетки на сцене, проекционные эффекты.',10,'Лучший детский спектакль');
/*!40000 ALTER TABLE `performance_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performances`
--

DROP TABLE IF EXISTS `performances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL,
  `age_limit` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `genre_id` (`genre_id`),
  KEY `author_id` (`author_id`),
  KEY `director_id` (`director_id`),
  CONSTRAINT `performances_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `performances_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `performances_ibfk_3` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performances`
--

LOCK TABLES `performances` WRITE;
/*!40000 ALTER TABLE `performances` DISABLE KEYS */;
INSERT INTO `performances` VALUES
(1,'Вишнёвый сад','Пьеса о судьбах семьи на переломе эпох.','18:00:00','20:00:00',120,1,1,1,12,'poster1.jpg',500.00),
(2,'Гамлет','Трагедия о борьбе за истину и власть.','18:00:00','20:30:00',150,2,2,2,16,'poster2.jpg',600.00),
(3,'Мёртвые души','Сатирический роман о русской бюрократии.','18:00:00','20:15:00',135,3,3,3,12,'poster3.jpg',550.00),
(4,'Бесприданница','История любви и обмана.','18:00:00','19:40:00',110,4,4,1,14,'poster4.jpg',450.00),
(5,'Тартюф','Комедия о лицемерии и религии.','18:00:00','20:10:00',130,5,5,2,6,'poster5.jpg',500.00),
(6,'Ревизор','Классика о визите «ревизора».','18:00:00','20:00:00',120,6,1,3,12,'poster6.jpg',600.00),
(7,'Отелло','Ревность и трагедия на фоне интриг.','18:00:00','20:20:00',140,2,2,1,16,'poster7.jpg',600.00),
(8,'Чайка','Театральная драма с тонкой психологией.','18:00:00','20:00:00',125,3,3,2,12,'poster8.jpg',520.00),
(9,'Три сестры','Судьбы женщин в провинциальной России.','18:00:00','20:00:00',120,4,4,1,14,'poster9.jpg',580.00),
(10,'Король Лир','О старости, власти и предательстве.','18:00:00','20:10:00',145,5,2,3,16,'poster10.jpg',620.00),
(11,'Женитьба','Комедия о браке и глупостях общества.','18:00:00','19:55:00',115,6,3,1,6,'poster11.jpg',430.00),
(12,'Дон Жуан','Блистательная комедия нравов.','18:00:00','20:00:00',130,1,4,2,12,'poster12.jpg',470.00),
(13,'Лебединое озеро','Классический балет о любви и превращениях.','18:00:00','20:30:00',180,2,1,3,6,'poster13.jpg',700.00),
(14,'Кармен','Страсть и свобода в драме и танце.','18:00:00','20:10:00',170,3,4,1,12,'poster14.jpg',680.00),
(15,'Евгений Онегин','Любовь и судьба в лирической постановке.','18:00:00','20:05:00',165,4,2,2,12,'poster15.jpg',650.00),
(16,'Щелкунчик','Сказка с чудесами и волшебством.','18:00:00','20:00:00',175,5,3,3,6,'poster16.jpg',720.00);
/*!40000 ALTER TABLE `performances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seat_row` int(11) DEFAULT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seats`
--

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;
INSERT INTO `seats` VALUES
(1,1,1,'Партер'),
(2,1,2,'Балкон'),
(3,1,3,'Ложа'),
(4,1,4,'Партер'),
(5,1,5,'Балкон'),
(6,1,6,'Ложа'),
(7,1,7,'Партер'),
(8,1,8,'Балкон'),
(9,1,9,'Ложа'),
(10,1,10,'Партер'),
(11,2,1,'Партер'),
(12,2,2,'Балкон'),
(13,2,3,'Ложа'),
(14,2,4,'Партер'),
(15,2,5,'Балкон'),
(16,2,6,'Ложа'),
(17,2,7,'Партер'),
(18,2,8,'Балкон'),
(19,2,9,'Ложа'),
(20,2,10,'Партер'),
(21,3,1,'Партер'),
(22,3,2,'Балкон'),
(23,3,3,'Ложа'),
(24,3,4,'Партер'),
(25,3,5,'Балкон'),
(26,3,6,'Ложа'),
(27,3,7,'Партер'),
(28,3,8,'Балкон'),
(29,3,9,'Ложа'),
(30,3,10,'Партер'),
(31,4,1,'Партер'),
(32,4,2,'Балкон'),
(33,4,3,'Ложа'),
(34,4,4,'Партер'),
(35,4,5,'Балкон'),
(36,4,6,'Ложа'),
(37,4,7,'Партер'),
(38,4,8,'Балкон'),
(39,4,9,'Ложа'),
(40,4,10,'Партер'),
(41,5,1,'Партер'),
(42,5,2,'Балкон'),
(43,5,3,'Ложа'),
(44,5,4,'Партер'),
(45,5,5,'Балкон'),
(46,5,6,'Ложа'),
(47,5,7,'Партер'),
(48,5,8,'Балкон'),
(49,5,9,'Ложа'),
(50,5,10,'Партер');
/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theatre_info`
--

DROP TABLE IF EXISTS `theatre_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theatre_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theatre_info`
--

LOCK TABLES `theatre_info` WRITE;
/*!40000 ALTER TABLE `theatre_info` DISABLE KEYS */;
INSERT INTO `theatre_info` VALUES
(1,'Государственный драматический театр города Кургана. Основан в 1943 году и является культурным центром региона.'),
(2,'Государственный драматический театр города Кургана. Основан в 1943 году и является культурным центром региона.');
/*!40000 ALTER TABLE `theatre_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `performance_date_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `purchase_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `performance_date_id` (`performance_date_id`),
  KEY `seat_id` (`seat_id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`performance_date_id`) REFERENCES `performance_dates` (`id`),
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES
(18,1,1,1,'2025-05-01 14:00:00',0,0),
(19,1,1,2,'2025-05-01 14:05:00',0,0),
(20,2,2,3,'2025-05-01 14:15:00',0,0),
(21,3,3,4,'2025-05-02 16:00:00',0,0),
(22,4,4,5,'2025-05-02 16:05:00',0,0),
(23,1,5,6,'2025-05-03 17:00:00',0,0),
(24,2,6,7,'2025-05-03 17:10:00',0,0),
(25,3,7,8,'2025-05-04 18:00:00',0,0),
(26,4,8,9,'2025-05-04 18:15:00',0,0),
(27,1,9,10,'2025-05-05 19:00:00',0,0),
(28,2,10,11,'2025-05-06 20:00:00',0,0),
(29,3,11,12,'2025-05-07 21:00:00',0,0),
(30,4,12,13,'2025-05-08 22:00:00',0,0),
(31,1,13,14,'2025-05-09 20:00:00',0,0),
(32,2,14,15,'2025-05-10 19:30:00',0,0),
(33,3,15,16,'2025-05-11 18:45:00',0,0),
(34,4,16,17,'2025-05-12 18:00:00',0,0),
(46,NULL,3,41,'2025-05-18 21:13:35',1,1747592015),
(47,NULL,3,33,'2025-05-18 21:25:20',1,1747592720),
(48,4,3,22,'2025-05-20 17:18:34',1,1747750714),
(49,4,6,37,'2025-05-22 15:51:41',1,1747918301),
(50,4,4,45,'2025-05-22 15:54:34',1,1747918474),
(51,4,4,46,'2025-05-22 15:54:34',1,1747918474),
(52,4,4,19,'2025-05-22 15:57:23',1,1747918644),
(53,4,6,43,'2025-05-23 21:24:28',1,1748024668),
(54,4,3,24,'2025-05-23 21:24:37',1,1748024677),
(55,4,3,34,'2025-05-23 21:24:37',1,1748024677),
(56,4,3,25,'2025-05-23 21:42:03',1,1748025723);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(255) NOT NULL,
  `updated_at` int(255) NOT NULL,
  `access_token` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'killer2004','$2y$13$6vL2u44p5aXtODSeDLunGuyNcjWw9m.KcXXpP75ZM4hwfCUrmIauC','Максименко','Артём',1741080033,1741080033,0,'elewwlec@mail.ru',0),
(2,'enderman_dragon','$2y$13$g5VnRdUraxko2J3IVIA0X.BZzmuokgLtB673QTj7TbL4n2.b6DuHS','Никитина','Валерия',1744905478,1744905478,0,'elewwlec@mail.ru',NULL),
(3,'potroshitel_kishkov_2017','$2y$13$a1ZcM6DYu0w3Hn/klQd.v.JjiSR6.o4K6A79LCF.hKJAhY7ntYX8q','Сенькина','Юлия',1745048398,1745048398,0,'elewwlec@mail.ru',NULL),
(4,'alina','$2y$13$uKqlCJIzcgpNOkF/He4EPukRanCWm8caPlxwdn7NGnHniLXC0V31i','Семенов','Денис',1747068451,1747674226,3,'elewwlec@mail.ru',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-25 21:54:13
