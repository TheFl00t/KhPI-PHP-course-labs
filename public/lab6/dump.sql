-- Adminer 4.8.1 MySQL 9.5.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `users_db`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(76,	'ivan_ivanov',	'ivan.ivanov@example.com',	'$2y$10$lh.bQCA7GEcRO2s/SiDMiuJ8wAZDjK/Dw3KbF2mmS.YLbjoC4KiLe'),
(77,	'anna_smirnova',	'anna.smirnova@test.com',	'$2y$10$bD1pSrLSed11GlXQL4Qjae.6sy5sAweswFgM05d4S0Yv/Xtn9bD36'),
(78,	'sergey_petrov',	'sergey.p@outlook.com',	'$2y$10$FfdVklx900ic15th2OlDrehLoDU5OLW4hikYlHz2T2WH0Q4JUkCpa'),
(79,	'olga_kuznetsova',	'olga.kuz@gmail.com',	'$2y$10$sjC5UAS/rSsoUZc2ZC7sKuJ3noLMkIInHaryoCafqlaZMNNOURpmq'),
(80,	'dmitry_sokolov',	'd.sokolov@yahoo.com',	'$2y$10$0xcg7hNQayPF.kfyAC5faeN1pOOZE9IcMHkUrAltHvhcdMz5EiOy6'),
(81,	'elena_popova',	'elena.popova@work.net',	'$2y$10$Z23KR4Yhm34xivCyy5oecO2wswP0b95I7cKaullOQQ1iq8OXVMyHy'),
(82,	'maxim_lebedev',	'max.lebedev@site.org',	'$2y$10$sT90teh2BWexd1ZBhhbQROYp4ypuzBmd6NzYdSSOfjLm6bUj1iPK6'),
(83,	'maria_kozlova',	'maria.k@live.com',	'$2y$10$w.JGkcZkz5RuRZhQCninROdvBD0Q7J97Wjk9JFRGEsYVDZvVG15MS'),
(84,	'andrey_novikov',	'andrey.nov@example.com',	'$2y$10$mZFyu8u3RuqdiaOnzdgUCuoe5wGSyaxdptSfwl5S2dAQrTffZ.Ng6'),
(85,	'julia_morozova',	'julia.m@test.com',	'$2y$10$sAsk5XH3CdfxeJmCb0ki2elwK08RuJagty6PLSBL6t0u9g1LM5xR6'),
(86,	'alex_volkov',	'alex.volkov@hotmail.com',	'$2y$10$AipVB0EXcFhOrXbAESS3eeVaHgycFOJoMiOj3tREjAj9KqRspTopi'),
(87,	'tatiana_solovyova',	'tanya.sol@gmail.com',	'$2y$10$jqjAtz1E72V4p0KEC8iWduXTyeQdzERpOydULjhuUmrAiThmPJbIu'),
(88,	'roman_vasiliev',	'roman.v@proton.me',	'$2y$10$cxv2y4mjUPswMQFkh6da2u0oBh9fnfPpt6d.mQCTOe.2rpfYk/5Ga'),
(89,	'natalia_zaytseva',	'nata.zaya@work.net',	'$2y$10$4s/3QTlHtQeyfveq2YnIzeTbXR4HAYvISLyay/nvJP4/Y2KyuoQ2y'),
(90,	'igor_pavlov',	'igor.pavlov@site.org',	'$2y$10$MgpDMpKVEYxiL55dTObdg.Th.PFMu.4F8qYRf.lbHAh5RHPuMbrQ2'),
(91,	'svetlana_sem',	'svetlana.s@live.com',	'$2y$10$rTbkj48i/dwe5m8W28vFYewBNjApnxJaH4ympWh/vgnd9OA5qVR4e'),
(92,	'victor_golubev',	'victor.g@example.com',	'$2y$10$koSWjsVCp18Bk1PR0Lj48.szddHnCwzoY7QgOsmzyITuEbMCLZ4XS'),
(93,	'daria_vin',	'daria.vin@test.com',	'$2y$10$hH7xcJYurP248z/X6e.FgeOvRkWp7jbsxil9RnNCMAuXEidTapH0u'),
(94,	'denis_bogdanov',	'denis.b@ukr.net',	'$2y$10$hivACW8T5Rj3KP6D5/4VeOslGgKO5y0wKW3nox0q0OBmK7EnusEsS'),
(95,	'polina_vorob',	'polina.v@gmail.com',	'$2y$10$Rz2GyhcUc.ZIZtj.0TmAH.wGOB0llUq5ua30pN/YON5IWjYxiFoBK'),
(96,	'egor_fedorov',	'egor.fed@icloud.com',	'$2y$10$/Vdji1uK4a0wIGde5xYqa.kENX1FbXS27ALY1ZXFlcYkdJREdK4j2'),
(97,	'marina_mikh',	'marina.m@work.net',	'$2y$10$11CcuIuRbAYuS10AlWdDYuIO2JpzIdhmCf4idO/T6zQspbjzVU52m'),
(98,	'nikolay_belov',	'kolya.belov@site.org',	'$2y$10$SR67MGtUL6gFHABQxUGFVOg4peLBjhJ.peBTh8hgdG7njHriMb51a'),
(99,	'victoria_taras',	'vika.t@live.com',	'$2y$10$QVQsrGCbLkoLd0.kKzYPU.e8luiVt8.HF4X32lz69G.QRHg8ktNfO'),
(100,	'artem_orlov',	'artem.orlov@example.com',	'$2y$10$.zzobIOBbiapaq.ULb2FGeTdjZzzF1HVQArcX9peI0tZqLUXHhUom'),
(101,	'alisa_kiselev',	'alisa.kis@test.com',	'$2y$10$s5wnl..So9msw6g9i5Xr/eWMtr1NYqePHY8E0useV3AHX39skkZ9.'),
(102,	'anton_makarov',	'anton.m@outlook.com',	'$2y$10$UHDhQmaT9WbkgLfsRBMEMOpJgKz/pxEKgGCMupeQtviU4lX9Ht1CS'),
(103,	'vera_andreeva',	'vera.a@gmail.com',	'$2y$10$BJzY/9yGd8B3PqvQ0h.22OnhG/9WjmCEWX21B0MUag/bSEDcELKH6'),
(104,	'pavel_ilyin',	'pavel.i@yahoo.com',	'$2y$10$y8vXJdBlatZBqVxDcFCJLug43ogDLRHTFD/nc7BXNRwmuAKgNrvwm'),
(105,	'oksana_guseva',	'oksana.g@work.net',	'$2y$10$pyshkcW5LeCtBuMIuFSyqOZ8OyOqzAl/bd47Zym4GtxtK1Mg7lI2O');

-- 2026-01-08 10:12:23
