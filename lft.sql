-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2025 г., 23:08
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `game_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id_game`, `name`, `game_img`) VALUES
(1, 'VALORANT', '../navbar_img/icons8-valorant-500.png'),
(2, 'ROCKET LEAGUE', '../navbar_img/icons8-rocket-league-500.png'),
(3, 'CS 2', '../navbar_img/icons8-counter-strike-500.png'),
(4, 'APEX LEGENDS', '../navbar_img/icons8-apex-512.png'),
(5, 'DOTA 2', '../navbar_img/icons8-dota-500.png'),
(6, 'PUBG', '../navbar_img/icons8-pubg-96.png'),
(7, 'FORTNITE', '../navbar_img/icons8-fortnite-500.png'),
(8, 'OVERWATCH 2', '../navbar_img/icons8-overwatch-480.png');

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `id_player` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id_player`, `id_user`, `id_game`, `player_name`, `age`, `nickname`, `rank`, `description`) VALUES
(1, 1, 1, 'Артём', 24, 'DarkReek', 'Immortal 3', 'Ищу команду для турнирных игр на регулярной основе'),
(20, 2, 2, 'Денис', 20, 'BullingBass', 'Diamond 3', 'В поисках приятной компании для игры по вечерам'),
(21, 8, 1, 'Егор', 18, 'Hirako_2', 'Platina 2', 'Ищу напарника для рейтинговых матчей, платина и выше'),
(22, 3, 1, 'Максим', 16, 'Mak.7', 'Ascendant 1', 'Ищу адекватных союзников для комфортной игры без токсичности'),
(23, 4, 1, 'Настя', 22, 'SadoviyGnom', 'Gold 3', 'Ищу кайфовых друзей для чилловой катки по вечерам'),
(24, 15, 2, 'Антон', 26, 'Neckich12', 'Silver 2', 'Пишите кто хочет покатать вместе'),
(25, 12, 2, 'Даниил', 19, 'Grachildo', 'Champion 1', 'Ищу тиммейта для апа ssl\'а в этом сезоне'),
(26, 1, 4, 'Артём', 24, 'SoulReaper', 'Predator', 'Нужен стак для ALSG, миксы не интересуют, только сыгранные тимы, могу сесть на запаску'),
(27, 1, 3, 'Тёма', 24, 'WhoCares', '2400 elo', 'В последнее время играю редко, ищу микс для фасика'),
(28, 7, 3, 'Максон', 23, 'MaxPushkin', 'почти десятка на faceit', 'Нужны задры для апа ело'),
(29, 12, 4, 'Игорь', 15, 'HolaAmigas', 'Даймонд', 'Напарник нужен'),
(30, 16, 5, 'Боря', 20, 'RashanTOP', 'анрейт', 'Чисто по кайфу поиграть пишите не стесняйтесь'),
(31, 12, 5, 'Никита', 17, 'steel_legenda12', '3к птс', 'нужна пачка не лс\'ов'),
(32, 9, 6, 'Вадим', 23, 'ElelKoa-F', 'Платка', 'Поиграть, иногда постримить'),
(33, 10, 6, 'Даня', 18, 'Krotyara228', 'алмаз', 'Пишите кто хочет залететь на турик от Река'),
(34, 14, 7, 'Александр', 17, 'Plate11Sto', 'не играю рейтинг', 'короче нужны кенты просто поиграть'),
(35, 4, 7, 'Настя', 22, 'AnastyaYa', 'platina', 'будем стримить вместе'),
(36, 15, 8, 'Коля', 29, 'Hettach2l', 'мастер', 'играю ещё с выхода первой части, играю часто'),
(37, 10, 8, 'Айрат', 18, 'BEstSup0rt', 'Бриллиант', 'Мейню ток трейсер, играю онли рейт');

-- --------------------------------------------------------

--
-- Структура таблицы `responds`
--

CREATE TABLE `responds` (
  `id_respond` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_recipient` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `responds`
--

INSERT INTO `responds` (`id_respond`, `id_sender`, `id_recipient`, `id_game`, `message`) VALUES
(28, 2, 1, 1, 'Привет! Добавь меня в телеграмме @D_bulli12, обговорим подробности'),
(48, 12, 1, 2, 'Готов присоединиться к команде, отправь свои контактные данные для связи'),
(49, 1, 2, 1, 'Хорошо, завтра ближе к вечеру напишу'),
(50, 1, 12, 2, 'Мой tg @peccanta, жду сообщения!');

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `id_team` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `number_of_players` int(11) NOT NULL,
  `min_rank` varchar(50) NOT NULL,
  `min_age` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`id_team`, `id_user`, `id_game`, `team_name`, `number_of_players`, `min_rank`, `min_age`, `description`) VALUES
(1, 2, 1, 'Team Spirit', 4, 'Radiant', 18, 'Необходим пятый игрок на ближайшие турниры'),
(3, 1, 2, 'NRG', 2, 'SSL', 20, 'Ищем третьего игрока на постоянную основу, сидим на контракте'),
(4, 5, 1, 'Obsidian', 2, 'Immortal 1', 17, 'Собираем стак с другом, убедительная просьба не писать ниже первого имма'),
(5, 6, 1, 'Xdeniat', 3, 'Gold 1', 16, 'Играем часто весёлой компанией, хотим попробовать поиграть праки, нужно ещё 2 чела'),
(6, 7, 2, 'Sigma', 2, 'Champion 2', 20, 'Ищем кентика гриндить ранкед'),
(7, 11, 3, 'нету', 2, '8лвл фейсит', 16, 'собираем стак для фейсита'),
(9, 14, 3, 'Allor1', 4, 'от десятки', 18, 'ищем пятого для праков'),
(10, 3, 5, 'ANARTH', 3, '4-5к птс', 17, 'два кента нужны гриндить каждый день пачкой'),
(11, 10, 5, 'russian-power', 2, 'Archon', 20, 'адекватные только пишите, поиграем'),
(12, 8, 6, 'RYBINSKOE OPG', 3, 'любой', 16, 'играем весёлой компанией, нужен ещё один приятный чел'),
(13, 11, 6, 'Optic', 2, 'Алмаз', 18, 'Не хватает двух адекватных игроков, будем траить турики если сыграемся'),
(14, 13, 4, 'Hereticks', 3, 'неважно', 18, 'ищем стабильную запаску в стак'),
(15, 7, 4, 'unlicky', 2, 'Diamond', 20, 'Нужен адекватный не байтящий чел чтобы апнуть мастера'),
(16, 5, 7, 'omg_kdis', 2, 'gold', 16, 'нужен +1 игрок для рейтинга'),
(17, 6, 7, 'Seprantin', 3, 'любой', 21, 'часто играем, нужен взрослый адекватный +1'),
(18, 2, 8, 'Sentinels', 2, '5000+ pts', 18, 'Собираем новый стак, пробуем пробиться в киберспорт'),
(19, 12, 8, 'Kirta', 3, 'Платина', 20, 'Пишите только адекватные, играем для души');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `email`, `password`) VALUES
(1, 'Peccanta', 'darkreek@mail.ru', '$2y$10$kCSQAaN4m7IB.W30aYMGMeFbOYaK2lLREkIt6byXeHwpfcC7FzVDK'),
(2, 'Bullibasa', 'd.danilov@mail.ru', '$2y$10$.2CVLmvSnhgs6YptZzc7Ou.dG/YuidrIf34raKsrvnE2H0yJWVSC2'),
(3, 'BigMax', 'mak.7@yandex.ru', '$2y$10$G7Cz7qlrg9dY1SKcsoEfS.Uu99tC8gUoY71crY1D/nSTbTKZwnxLW'),
(4, 'Nastos', 'netakysick@gmail.com', '$2y$10$QKYTKzx3gem8tyKOY2itNe4U1e96Slu1FnPZfcip9kkjDDcCwF07i'),
(5, 'Yaroslav16', 'yariklol@mail.ru', '$2y$10$ToQEFyqQw6H3RNa2PhzwUO71n5JdyoBX8HtbBRylzy9CK.1m4il7.'),
(6, 'Lineyss', 'lineyss2005@gmail.com', '$2y$10$Hq5fgWm6eEIWW53Vivru8eSH21ZKLncqAsDJHJt5oEXle9BFsc9hG'),
(7, 'maxpushkin', 'makingbeatsihope@yandex.ru', '$2y$10$WCyffA2yk8mdbN9.wLJ5POtEbDoT2uA5vLudcZ0j7G5g5rX2qdxce'),
(8, 'ribinskguy', 'egorchick_notselo@mail.ru', '$2y$10$7icau2HDft1BlBMMIshzjux2fepDg1g.Y4NRL4A91NSLmyU4qsHFa'),
(9, 'Solomom', 'ketkic1342@yandex.ru', '$2y$10$t4lpoArfdDDTgAQrbivjOOslLrqIP0mUO/vJGhAN4UdkppPVRSiYq'),
(10, 'pepega23', 'kuramustmy2@gmail.com', '$2y$10$EClXHcvnrNR8Pz7Bv1NTs.hRO/SSOrF5rtoA6Y9dga5Ys/IG1YMwC'),
(11, 'lenskiyIgor', 'dubgaerui@mail.ru', '$2y$10$9bk4XOkcVK4l1OUf7lGwN.ksKSobgbThRKMdicn.6kDYIBAjbIC4S'),
(12, 'serik1n', 'hzyanezanu@mail.ru', '$2y$10$RQEq5eXm1.XsaB.y3DMjFO8rX9ZSoG/nnwv2paYaj9pBMx9Qhi/Me'),
(13, 'reaper', 'redolfaaafe45@mail.ru', '$2y$10$zSw8N3p4grRWzS5r5UXXGenOrLoE9unjFOKRzIdwFocvT9OYmVaYy'),
(14, 'lack1ch', 'terrolaining23@gmail.com', '$2y$10$4BGeV8JJqox/Feb1Y8eereqVNz5w53O69bNiGh8K3pnmMah.GDSHy'),
(15, 'HokkaKim0', 'lolwhatwasthis2@mail.ru', '$2y$10$SrU98mxqYInuyBavdmjhwOLkJSTSDN/8DsEXNWDbUwWaxEE/6bhdm'),
(16, 'kog3l0rd', 'jefalimber35oe@yandex.ru', '$2y$10$lVSRdnk4dd5/ttnhFxT.UOSGyVLwNzrEdAzFaGYGofkO5z/10Fw9u');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_game` (`id_game`);

--
-- Индексы таблицы `responds`
--
ALTER TABLE `responds`
  ADD PRIMARY KEY (`id_respond`),
  ADD KEY `id_sender` (`id_sender`),
  ADD KEY `id_recipient` (`id_recipient`),
  ADD KEY `id_game` (`id_game`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_game` (`id_game`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `responds`
--
ALTER TABLE `responds`
  MODIFY `id_respond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `responds`
--
ALTER TABLE `responds`
  ADD CONSTRAINT `responds_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responds_ibfk_2` FOREIGN KEY (`id_recipient`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responds_ibfk_3` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
