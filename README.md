# todo
A small php mvc website


## 1 Clone this repository


## 2 Connect to Database: 

- Create BD 'todo'
- Create table:
>`
CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
`
- Change your DB infomation at `cores/DB`


## 3 Run app

![home](https://i.imgur.com/x9ac36l.png)

![add](https://i.imgur.com/b7OSGj3.png)
