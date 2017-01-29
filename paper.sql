/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `print_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `section_id` int(11) DEFAULT '1',
  `price` float DEFAULT '0',
  `discount` float DEFAULT '0',
  `quantity` int(11) DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `is_new` int(1) DEFAULT NULL,
  `availability` int(1) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_items` DISABLE KEYS */;
INSERT IGNORE INTO `print_items` (`id`, `title`, `section_id`, `price`, `discount`, `quantity`, `description`, `about`, `video`, `is_new`, `availability`, `date`) VALUES
	(2, 'Визитка Евро', 1, 229, 0.05, 1000, 'Данный тип визиток изготавливается на бумаге нового поколения SoftTouch 450 г/м2, и обладают уникальными тактильными ощущениями.', 'Then along come two they got nothin\' but their jeans. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Today still wanted by the government they survive as soldiers of fortune. Boy the way Glen Miller played. Songs that ', 'https://www.youtube.com/embed/Z03Pz_UQ198\r\nhttps://www.youtube.com/embed/Z03Pz_UQ198\r\nhttps://www.youtube.com/embed/Z03Pz_UQ198', 1, 1, '2017-01-10 17:00:26'),
	(3, 'Табличка прямоугольная', 3, 85, 0.02, 1, 'Пластиковые таблички для наружного и внутреннего применения.', 'Then along come two they got nothin\' but their jeans. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Today still wanted by the government they survive as soldiers of fortune. Boy the way Glen Miller played. Songs that ', '', 1, 1, NULL),
	(4, 'Плакат А3', 2, 562, 0.01, 100, 'Среди великого множества способов сообщить или рассказать о товаре или услуге потенциальному покупателю с помощью рекламы особой популярностью пользуются рекламные плакаты. Такая яркая &quot;наружка&quot; зарекомендовала себя, превосходно выполняя функции', 'Then along come two they got nothin\' but their jeans. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Today still wanted by the government they survive as soldiers of fortune. Boy the way Glen Miller played. Songs that ', '', 0, 1, NULL),
	(47, 'aaaaaa', 1, 111111, 0, 23, 'sdsdad', '', '', 0, 0, '2017-01-14 00:05:47'),
	(48, '1', 1, 1, 0.1, 1, '1', '', '', 0, 1, '2017-01-14 00:25:37'),
	(49, 'aaa', 1, 1, 0.1, 1, 'aaa', '', '', 0, 1, '2017-01-14 00:27:53'),
	(50, 'йцуйцуйцу', 1, 123, 0, 23, 'ыаваыва', '', '', 0, 0, '2017-01-19 20:50:35'),
	(51, 'Grass', 4, 97, 0.02, 50, 'asd sad', ' sdas ds s', 'https://www.youtube.com/embed/2yPBekSFVfQ\r\nhttps://www.youtube.com/embed/2yPBekSFVfQ', 1, 1, '2017-01-21 02:56:20'),
	(52, 'cccccccccccc', 1, 999, 0.04, 59, 'aaa', 'aaa', '', 1, 1, '2017-01-21 13:24:29'),
	(53, 'we', 1, 23, 0.02, 23, 'ad', 'sd', '', 0, 0, '2017-01-21 13:28:54'),
	(54, 'sd', 1, 23, 0.23, 23, 'sd', 'sd', '', 0, 0, '2017-01-21 13:30:26'),
	(55, 'sd', 1, 23, 0.23, 23, 'sd', 'sd', '', 0, 0, '2017-01-21 13:30:56'),
	(56, 'чччч', 1, 23, 0, 33, 'ывав', 'ваы', '', 0, 0, '2017-01-21 22:21:48'),
	(57, 'ццц', 1, 2, 0, 4, 'в', 'в', '', 0, 0, '2017-01-21 22:23:18'),
	(58, 'ццц', 1, 2, 0, 4, 'в', 'в', '', 0, 0, '2017-01-21 22:27:48'),
	(59, '222', 1, 22, 0, 22, '22', '', '', 0, 0, '2017-01-21 22:31:46'),
	(60, 'BMW', 5, 500000, 0.03, 1, 'BMW', 'BMW', 'https://www.youtube.com/embed/4UTSf3t90CM', 1, 1, '2017-01-22 15:56:20');
/*!40000 ALTER TABLE `print_items` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_items_cache` (
  `source` varchar(250) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_items_cache` DISABLE KEYS */;
INSERT IGNORE INTO `print_items_cache` (`source`, `content`) VALUES
	('http://www.bbk.ru/upload/xml/tv_video/dvd_theatres.xml', '<?xml version="1.0" encoding="utf-8"?><sections><section id="156" title="ТВ и Видео" code="tv_video"><items id="170" title="DVD - театры" code="dvd_theatres"><item_block ID="6578" title="DK1007SI" code="dk1007si"><id>6578</id><name>DK1007SI</name><code>dk1007si</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F2f9%2Fdk1007si_4707.jpg</img><text>DK1007SI – компактный вариант домашнего кинотеатра серии In`Ergo с акустикой 2.1CH. Мультиформатный DVD-проигрыватель способен воспроизводить популярные форматы файлов, включая MPEG-4. Модель оснащена встроенным высокоскоростным USB-портом, благодаря которому удалось реализовать функцию КАРАОКЕ STAR. С помощью нее можно записать собственное пение под караоке на внешний USB-носитель &amp;#40;флеш-брелок или жесткий диск&amp;#41;: нажмите кнопку «STAR» на ПДУ и пойте в микрофон. Запись осуществляется в сжатом MP3 формате. В DK1007SI предусмотрена система КАРАОКЕ&amp;#43;&amp;#43;, позволяющая получать баллы за исполнение композиции с любого DVD караоке-диска. За качественное звучание домашнего DVD-театра отвечают встроенные декодеры многоканального звука. Среди прочих особенностей модели функции Q-Play и Memory.</text></item_block><item_block ID="6579" title="DK1014SI" code="dk1014si"><id>6579</id><name>DK1014SI</name><code>dk1014si</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2Fc3f%2Fdk1014si_4708.jpg</img><text>Домашний DVD-театр DK1014SI – универсальная система для ценителей видео- и аудиоразвлечений. Особенность модели – функция КАRAOКЕ STAR, которая позволяет записывать исполнение караоке на внешний USB-носитель &amp;#40;DK1014SI оснащен USB-портом&amp;#41;. Запись осуществляется в MP3, и прослушать трек можно на любом плеере с поддержкой данного формата. DVD-театр оснащен системой КАРАОКЕ&amp;#43;&amp;#43; для балльной оценки пения с любого DVD-диска и комплектуется диском на 500 песен. Качественное аудиозвучание системы обеспечивается за счет встроенных декодеров DD/Dolby Pro Logic II и многоканального аудиовыхода 5.1CH. DVD-театр DK1014SI поддерживает воспроизведение популярных видеоформатов &amp;#40;в том числе MPEG-4&amp;#41; и оснащен функцией Q-Play для пропуска рекламы на диске.</text></item_block><item_block ID="6580" title="DK2703HD" code="dk2703hd"><id>6580</id><name>DK2703HD</name><code>dk2703hd</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F6f4%2Fdk2703hd_4709.jpg</img><text>DK2703HD – компактная модель с акустикой 2.1, которая относится к домашним DVD-театрам высокого разрешения. Специальная технология «апскейл» преобразует сигнал до качества, сравнимого с HD. Это означает, что при подключении DVD-театра к ЖК-телевизору по HDMI-кабелю картинка на экране формируется в максимально высоком качестве. USB-порт, расположенный на передней панели, удобен для подсоединения к плееру внешних устройств, таких как жесткий диск, фотоаппарат или флеш-брелок. В списке поддерживаемых форматов файлов MPEG-4. DVD-театр оснащен системой КАРАОКЕ&amp;#43;&amp;#43; и микрофонным входом: получать баллы за исполнение караоке-композиции можно с любого караоке-диска.</text></item_block><item_block ID="6581" title="DK2714HD" code="dk2714hd"><id>6581</id><name>DK2714HD</name><code>dk2714hd</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F549%2Fdk2714hd_4710.jpg</img><text>DK2714HD сделает ваш досуг насыщенным и ярким. Комплект домашнего DVD-театра включает мультиформатный плеер с поддержкой стандарта MPEG-4 и акустику, выполненную по варианту 5.1. Основная особенность DVD-театра заключается в возможности масштабирования изображения от качества обычного DVD-диска до качества, сравнимого с HDTV &amp;#40;«апскейл»&amp;#41;. Для того чтобы картинка на экране была максимально высокой четкости, необходимо подсоединить плеер к ЖК-телевизору посредством HDMI-интерфейса. Встроенные декодеры Dolby Digital, Dolby Pro Logic II позволяют добиться объемного звучания. Модель DK2714HD оснащена высокоскоростным USB2.0-портом для удобного проигрывания файлов с внешних устройств и специальной системой КАРАОКЕ&amp;#43;&amp;#43;. В комплекте поставляются микрофон и диск на 500 песен.</text></item_block><item_block ID="6582" title="DK2715HD" code="dk2715hd"><id>6582</id><name>DK2715HD</name><code>dk2715hd</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F367%2Fdk2715hd_3995.jpg</img><text>DVD-театр DK2715HD превратит вашу гостиную в домашний центр развлечений. Комплект состоит из мультиформатного DVD-ресивера, сабвуфера и пяти громкоговорителей. DVD-ресивер способен преобразовать сигнал стандартного разрешения до качества, близкого к HDTV. Видеоконтент может быть записан на оптические DVD-диски или на внешние устройства, подключаемые к DVD-театру через USB-интерфейс. В числе поддерживаемых форматов – MPEG-4 и DVD-Audio. Для получения оптимального качества изображения в DK2715HD предусмотрен интерфейс HDMI. Встроенные цифровые декодеры Dolby Digital и Dolby Pro Logic II отвечают за обеспечение объемного звучания. Среди прочих особенностей – наличие цифрового FM-тюнера, считывателя карт памяти SD/MS/MMC и функции Караоке. Для любителей петь дуэтом предусмотрено два микрофонных входа. Максимальная мощность громкоговорителей составляет 5х40 Вт, а сабвуфера - 60 Вт.</text></item_block><item_block ID="6583" title="DKM2512HD" code="dkm2512hd"><id>6583</id><name>DKM2512HD</name><code>dkm2512hd</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F175%2Fdkm2512hd_4007.jpg</img><text>DKM2512HD – домашний MKV DVD-театр высокого разрешения, способный воспроизводить видео в полноценном HD-качестве &amp;#40;до 1080р&amp;#41;. Видеофайлы, упакованные в популярном контейнере Matroska &amp;#40;MKV&amp;#41; и сжатые кодеком H.264, могут быть записаны как на распространенных оптических носителях, DVD-дисках, так и в памяти внешних USB-устройств. Благодаря тому, что DVD-театр оснащен файловой системой NTFS, объем воспроизводимого контента с внешних носителей, подсоединяемых через USB-порт, не ограничен. Помимо MKV DVD-плеера, комплект домашнего MKV DVD-театра DKM2512HD включает многоканальную акустику, выполненную в варианте 5.1 CH &amp;#40;5 громкоговорителей и сабвуфер&amp;#41;. Встроенные декодеры Dolby Digital и DTS отвечают за преобразование стереофонического сигнала в многоканальный. Модель оснащена HDMI-интерфейсом, выходом для подключения наушников и микрофонным входом для реализации функции караоке. Среди других особенностей DKM2512HD режим слайд-шоу для просмотра фотографий и предустановленные игры.</text></item_block><item_block ID="6584" title="DK2716HD" code="dk2716hd"><id>6584</id><name>DK2716HD</name><code>dk2716hd</code><img>http%3A%2F%2Fwww.bbk.ru%2Fupload%2Fiblock%2F74c%2Fdk2716hd_4011.jpg</img><text>Домашний кинотеатр высокого разрешения DK2716HD превратит гостиную в семейный центр развлечений и подарит множество положительных эмоций. В комплект входит универсальный DVD-ресивер, поддерживающий распространенные форматы видео, в т.ч. MPEG-4, и акустическая система 5.1СН с сабвуфером, удивительно реалистично воспроизводящая звуковые спецэффекты. Декодеры Dolby Digital и Dolby Pro Logic II позволяют проигрывать многоканальные аудиодорожки кинофильмов. Модель оснащена цифровым интерфейсом HDMI, который обеспечивает передачу сигнала высокой четкости на устройство отображения без потерь. Пропустить надоедливую рекламу перед фильмом поможет функция Q-Plaу. Благодаря наличию системы KARAOKE&amp;#43;&amp;#43; можно получать баллы за исполнение с любого караоке-диска, а для любителей петь дуэтом в DK2716HD предусмотрены два микрофонных входа. Встроенный цифровой FM-тюнер и высокоскоростной USB-порт расширяют возможности кинотеатра. Также стоит отметить, что к устройству прилагается FM-антенна, пульт ДУ и диск на 500 песен. Максимальная выходная мощность каждого из пяти громкоговорителей составляет 60 Вт, сабвуфера – 85 Вт.</text></item_block></items></section></sections>');
/*!40000 ALTER TABLE `print_items_cache` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_item_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_item_comments` DISABLE KEYS */;
INSERT IGNORE INTO `print_item_comments` (`id`, `item_id`, `author`, `content`, `date`) VALUES
	(38, 11161898, 'e', 'asd', '2017-01-13 23:15:13'),
	(39, 11161898, 'e', 'asdzxcxczxc', '2017-01-13 23:15:19'),
	(40, 11161898, 'e', 'qwewadssd', '2017-01-13 23:15:27'),
	(42, 3, 'как ыва ', 'выава в в', '2017-01-21 00:19:43'),
	(45, 3, 'e', 'Нормально!', '2017-01-21 03:45:53'),
	(46, 48, 'e', 'ыв', '2017-01-21 22:19:29'),
	(47, 51, 'ап', 'ап', '2017-01-21 23:15:45'),
	(48, 51, 'ап', 'ап', '2017-01-21 23:18:35'),
	(49, 60, 'e', 'Suoper!', '2017-01-22 15:57:50');
/*!40000 ALTER TABLE `print_item_comments` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `status` int(1) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_messages` DISABLE KEYS */;
INSERT IGNORE INTO `print_messages` (`id`, `name`, `phone`, `email`, `subject`, `message`, `status`, `date`) VALUES
	(1, 'sd', '1111111111', 'e@i.ua', 'sdf sdf ', ' dsf', 1, '2017-01-20 13:16:44'),
	(2, 'e', '123123123', 'e@i.ua', 's', 's', 0, '2017-01-21 03:43:50');
/*!40000 ALTER TABLE `print_messages` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_ordered_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `items` text,
  `total_sum` float DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_ordered_items` DISABLE KEYS */;
INSERT IGNORE INTO `print_ordered_items` (`id`, `user_id`, `items`, `total_sum`, `name`, `phone`, `email`, `status`, `date`) VALUES
	(8, 8, '{"4":"100","3":"1","2":"200","1":"1"}', 99449, 'alex', '1234567890', 'a@i.uA', 1, '2017-01-08 20:55:51'),
	(9, 0, '{"3":1}', 83, 'fthtfgh', '7777777777', 'jh@i.ua', 1, '2017-01-11 21:21:19'),
	(10, 0, '{"41":1}', 1, 'asd', '1231231231', 'q@u.ua', 0, '2017-01-11 21:23:45'),
	(11, 0, '{"4":1}', 556, 'asd', '1231231321', 'a@u.ua', 0, '2017-01-11 21:27:24'),
	(12, 0, '{"4":1}', 556, 'zxv', '1231231231', 'a@u.ua', 0, '2017-01-11 21:28:25'),
	(13, 0, '{"3":1,"37":1}', 206, 'zxc', '1231231231', 'a@u.ua', 0, '2017-01-11 21:29:39'),
	(15, 8, '{"3":1,"4":1,"2":1}', 857, 'e', '1234567890', 'e@i.ua', 0, '2017-01-11 21:41:45'),
	(16, 8, '{"37":1}', 123, 'e', '1234567890', 'e@i.ua', 0, '2017-01-11 21:42:37'),
	(17, 8, '{"4":"1000"}', 556400, 'e', '1231231231', 'e@i.ua', 1, '2017-01-11 21:45:36'),
	(18, 8, '{"37":2}', 246, 'e', '1231231231', 'e@i.ua', 0, '2017-01-11 21:51:07'),
	(19, 8, '{"3":1}', 83, 'e', '1231231231', 'e@i.ua', 0, '2017-01-11 22:04:36'),
	(20, 0, '{"10001":1,"4":1}', 556, 'qwe', '1234567890', 'q@u.ia', 0, '2017-01-12 18:13:24'),
	(21, 8, '{"4":2}', 1112, 'asd', '1234567890', 'e@i.ua', 0, '2017-01-12 18:32:04'),
	(22, 8, '{"4":2}', 1112, 'asd', '1234567890', 'e@i.ua', 0, '2017-01-12 18:32:37'),
	(23, 8, '{"3":1}', 83, 'e', '1231231231', 'e@i.ua', 0, '2017-01-13 20:57:40'),
	(24, 8, '{"49":"2"}', 1, 'e', '0981234567', 'e@i.ua', 0, '2017-01-14 00:30:11'),
	(25, 8, '{"48":1,"47":1}', 111111, 'e', '1231231231', 'e@i.ua', 0, '2017-01-21 01:47:33'),
	(26, 8, '{"51":"251"}', 23870, 'e', '12312312312', 'e@i.ua', 0, '2017-01-21 03:13:01'),
	(27, 8, '{"60":1}', 485000, 'e', '1231231231', 'e@i.ua', 1, '2017-01-22 16:01:44'),
	(28, 8, '{"49":1}', 0, 'e', '123123123123', 'e@i.ua', 0, '2017-01-22 16:02:16');
/*!40000 ALTER TABLE `print_ordered_items` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_ordered_partners_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `total_sum` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_ordered_partners_items` DISABLE KEYS */;
INSERT IGNORE INTO `print_ordered_partners_items` (`id`, `user_id`, `item_id`, `price`, `quantity`, `total_sum`, `name`, `phone`, `email`, `status`, `date`) VALUES
	(8, 8, 61905, 231, 15, 3465, 'Саша', '1231231231', 'e@i.ua', 1, '2017-01-12 22:24:31'),
	(9, 8, 6579, 243, 12, 2916, 'dsfdf', '123132123123', 'e@i.ua', 1, '2017-01-21 00:37:59');
/*!40000 ALTER TABLE `print_ordered_partners_items` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `bgcolor` varchar(50) NOT NULL DEFAULT 'default',
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_posts` DISABLE KEYS */;
INSERT IGNORE INTO `print_posts` (`id`, `title`, `bgcolor`, `description`, `content`, `date`) VALUES
	(2, 'Цифровая печать', 'green', 'Цифровая печать — изготовление тиражной печатной продукции с помощью «цифрового» оборудования...', 'Цифровая печать — изготовление тиражной печатной продукции с помощью «цифрового» оборудования — устройств, печатающих непосредственно из электронных файлов и использующих не офсетную технологию, а технологию прямого нанесения красок (как в принтерах и ризографах). Правильнее было бы назвать этот способ печати «печать без применения постоянных печатных форм». Однако в ризографах, например, используется постоянная форма, но из-за быстрого изготовления печатных форм непосредственно в них перед печатью их, обычно, относят к цифровым печатным машинам.\r\nУсловно цифровую печать можно подразделить на несколько подвидов:\r\nлистовая цифровая печать применяется для производства большого количества рекламных материалов типа буклеты, визитки, листовки и пр. Используются цифровые лазерные печатные машины в основном производства компаний Xerox, Konica Minolta, HP Indigo, Canon и другие. Печать может быть как цветная, так и в 1 краску (только чёрный тонер, например, в цифровых печатающих машинах в Xerox либо в 1 любую краску (например, в машинах HP Indigo)).\r\nширокоформатная цифровая печать применяется для производства наружной и интерьерной рекламы, ширина печати таких машин может достигать 5 м, а длина — десятков метров, в машинах используется принцип струйной печати. Материал, используемый для печати — бумага, баннерная ткань, сетка, специальные текстильные материалы. Спектр производителей оборудования весьма широк.\r\nПреимущества:\r\nДля устройства подобного производства достаточно относительно небольших площадей и бытовой электросети\r\nВозможность печати коротких тиражей без больших затрат на предпечатную подготовку.\r\nВысокая скорость печати позволяет практически сразу получить готовый тираж.\r\nСтойкость краски ниже, чем у офсетной печати', '2017-01-06'),
	(6, '123', 'default', '123', ' 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 adasda sd asdsd 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 adasda sd asdsd 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 1234567890 adasda sd asdsd', '2017-01-11'),
	(7, 'adsasdsadsd', 'default', 'asdasdasdasdasdasdasdas  dassd', 'asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd  asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd  asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd  asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd  asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd  asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd ', '2017-01-10'),
	(8, 'zzczxc', 'default', 'asdasdasdasdasdasdasdas  dasd', 'asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd asdasdasdasdasdasdasdas  dasdasdasdasdasdasda  sdasdasdasdasdasdasdsdasd  asda d asd sd asd ', '2017-01-10'),
	(9, 'adsfasdfsa', 'green', 'dsfadsfasdf', 'asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd aasdasdasdasd asd asd asd asd asd a  asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd a asdasdasdasd asd asd asd asd asd a', '2017-01-10'),
	(11, 'asdas', 'default', 'asdasdasdasdasdasdsad', 'asdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsadasdasdasdasdasdasdsadasdasd asdasdasdas dsadasdasdasdasdasdasdsad', '2017-01-10'),
	(12, 'aaazzzz', 'green', 'zazasdasdsdf zazasdasdsdf zazasdasdsdf', 'zazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdfzazasdasdsdf zazasdasdsdf zazasdasdsdf', '2017-01-11'),
	(13, 'asd', 'default', 'asdasdasdasdasd', 'asdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasdasdasdasdasdasdasdasdas dasdasdasdasdasdas dasdasdasdasdasdasd', '2017-01-11'),
	(14, 'er', 'default', 'qeqeweq', '  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq  clearCache() clearCache() clearCache() clearCache()  qeqeweq qeqeweq qeqeweq', '2017-01-13'),
	(15, 'zzzzz', 'default', 'asdsadasdasdasd asd asd s', 'asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s  asdsadasdasdasd asd asd sasdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd sasdsadasdasdasd asd asd sasdsadasdasdasd asd asd sv asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s  asdsadasdasdasd asd asd sasdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd s asdsadasdasdasd asd asd sasdsadasdasdasd asd asd sasdsadasdasdasd asd asd sv', '2017-01-19');
/*!40000 ALTER TABLE `print_posts` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(50) DEFAULT NULL,
  `content` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_post_comments` DISABLE KEYS */;
INSERT IGNORE INTO `print_post_comments` (`id`, `post_id`, `author`, `content`, `date`) VALUES
	(6, 3, 'я', 'я', '2017-01-08 02:13:27'),
	(7, 3, 'ч', 'ч', '2017-01-08 02:13:46'),
	(8, 2, '', 'zxc', '2017-01-08 14:29:23'),
	(9, 2, 'e', 'г', '2017-01-08 15:18:58');
/*!40000 ALTER TABLE `print_post_comments` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_sections` DISABLE KEYS */;
INSERT IGNORE INTO `print_sections` (`id`, `section`, `category`) VALUES
	(1, 'Визитки', 'Деловая полиграфия'),
	(2, 'Плакаты', 'Рекламная полиграфия'),
	(3, 'Таблички', 'Сувенирная полиграфия'),
	(4, 'qwe', 'Деловая полиграфия'),
	(5, 'Машины', 'Технология'),
	(6, 'Мото', 'Технология');
/*!40000 ALTER TABLE `print_sections` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_subscribes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_subscribes` DISABLE KEYS */;
INSERT IGNORE INTO `print_subscribes` (`id`, `email`) VALUES
	(12, 'w@i.ua'),
	(13, 'dsdsa@sad.ia'),
	(14, 'e@i.ua'),
	(15, 'sdf@i.ua'),
	(16, 'e@i.ua'),
	(17, ''),
	(18, 'sd@i.ua'),
	(19, 'xc@u.ua');
/*!40000 ALTER TABLE `print_subscribes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `print_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `print_users` DISABLE KEYS */;
INSERT IGNORE INTO `print_users` (`id`, `name`, `email`, `password`, `role`, `date`) VALUES
	(8, 'e', 'e@i.ua', 'de9e89a865d9cb4445f50c89fbb4e44c', 'admin', '2017-01-09 17:18:20'),
	(9, 'q', 'q@i.ua', '5600e17fdcbddd5027bc49d5b09b59ae', 'user', '2017-01-10 17:50:22'),
	(11, 'r', 'r@iua', '287dbd7d116fa0883be32a19080ac454', 'user', '2017-01-21 04:01:58'),
	(12, 'x', 'x@i.ua', 'ff8660fb01541958ee2159ae84db53c4', 'user', '2017-01-21 04:06:08'),
	(13, 'v', 'v@i.ua', '8ffe660647f0c941fee6598e87fd239e', 'user', '2017-01-21 04:08:31'),
	(14, 'sd', 'ssda@asds', 'ff8660fb01541958ee2159ae84db53c4', 'user', '2017-01-21 04:16:48');
/*!40000 ALTER TABLE `print_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
