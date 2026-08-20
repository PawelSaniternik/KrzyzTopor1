-- Tworzenie bazy produkcyjnej/deweloperskiej (jeśli nie istnieje)
CREATE DATABASE IF NOT EXISTS `app_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Tworzenie dedykowanej bazy testowej dla Symfony (przydatne do testów PHPUnit)
CREATE DATABASE IF NOT EXISTS `app_db_test` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utworzenie użytkownika aplikacji, jeśli jeszcze nie istnieje
CREATE USER IF NOT EXISTS 'app_user'@'%' IDENTIFIED BY '6=Pgb|^*r9Z1^Y!w|B2o';

-- Upewnienie się, że użytkownik ma pełne uprawnienia do obu baz
GRANT ALL PRIVILEGES ON `app_db`.* TO 'app_user'@'%';
GRANT ALL PRIVILEGES ON `app_db_test`.* TO 'app_user'@'%';

-- Odświeżenie uprawnień
FLUSH PRIVILEGES;