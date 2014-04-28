-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 04:54 PM
-- Server version: 5.1.71-rel14.9-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `godweiff_dweling`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created`, `updated`) VALUES
(2, 2, 'Education & Development', 'education---development', '2013-12-01 21:43:11', '2013-12-01 21:51:38'),
(3, 3, 'Product & Services', 'product---services', '2013-12-01 21:43:27', '2013-12-01 21:51:27'),
(4, 4, 'Sports', 'sports', '2013-12-01 21:43:40', '2013-12-01 21:51:14'),
(5, 5, 'Health & Beauty', 'health---beauty', '2013-12-01 21:43:52', '2013-12-01 21:51:02'),
(6, 6, 'Travel & Tourism', 'travel---tourism', '2013-12-01 21:44:02', '2013-12-01 21:50:39'),
(7, 7, 'Fitness & Style', 'fitness---style', '2013-12-01 21:44:14', '2013-12-01 21:50:47'),
(8, 8, 'Society & Culture', 'society---culture', '2013-12-01 21:44:26', '2013-12-01 21:49:05'),
(9, 9, 'Pets', 'pets', '2013-12-01 21:44:40', '2013-12-01 21:48:53'),
(10, 10, 'News & Events', 'news---events', '2013-12-01 21:44:51', '2013-12-01 21:48:40'),
(11, 11, 'Finance & Economy', 'finance---economy', '2013-12-01 21:45:08', '2013-12-01 21:48:31'),
(12, 12, 'Food & Beverage', 'food---beverage', '2013-12-01 21:45:21', '2013-12-01 21:48:22'),
(13, 13, 'Technology & Gadgets', 'technology---gadgets', '2013-12-01 21:45:32', '2013-12-01 21:48:08'),
(14, 14, 'Entertainment', 'entertainment', '2013-12-01 21:45:44', '2013-12-01 21:48:01'),
(15, 15, 'Law & Rules', 'law---rules', '2013-12-01 21:45:54', '2013-12-01 21:47:53'),
(16, 16, 'Politics & Government', 'politics---government', '2013-12-01 21:46:03', '2013-12-01 21:47:42'),
(17, 17, 'Relationship and Psychology', 'relationship-and-psychology', '2013-12-01 21:46:13', '2013-12-01 21:47:34'),
(18, 18, 'Research & Entrepreneurship', 'discovery---entrepreneurship', '2013-12-01 21:46:25', '2014-02-02 07:31:16'),
(19, 19, 'Others', 'others', '2013-12-01 21:46:37', '2013-12-01 21:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories_metadata`
--

CREATE TABLE IF NOT EXISTS `categories_metadata` (
  `category_id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `category_id_2` (`category_id`,`key`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `content_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `parent_id` int(15) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0',
  `approved` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `parent_id`, `comment`, `like_count`, `dislike_count`, `approved`, `created`, `updated`) VALUES
(69, 123, 1, 0, 'BJP', 0, 0, 1, '2014-03-06 05:33:04', '2014-03-06 05:33:04'),
(70, 123, 1, 69, 'test reply', 0, 0, 1, '2014-04-15 12:32:38', '2014-04-15 12:32:38'),
(71, 123, 1, 69, 'test2 reply', 0, 0, 1, '2014-04-15 12:33:33', '2014-04-15 12:33:33'),
(72, 123, 1, 69, 'test reply3', 0, 0, 1, '2014-04-15 12:33:59', '2014-04-15 12:33:59'),
(73, 123, 1, 0, 'test', 0, 0, 1, '2014-04-15 15:10:12', '2014-04-15 15:10:12'),
(74, 123, 1, 0, 'Great post! I would say that if you''ve neglected your blog for an \nextended period(2 months +), why not rally new and existing readers \naround a re-launch.', 0, 0, 1, '2014-04-15 15:10:45', '2014-04-15 15:10:45'),
(75, 123, 1, 0, 'test', 0, 0, 1, '2014-04-15 15:17:25', '2014-04-15 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `comment_metadata`
--

CREATE TABLE IF NOT EXISTS `comment_metadata` (
  `comment_id` int(15) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `comment_id_2` (`comment_id`,`key`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`key`, `value`, `created`, `updated`) VALUES
('preferMarkdown', '1', '2013-11-19 11:54:03', '2013-11-19 11:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `vid` int(15) NOT NULL,
  `author_id` int(15) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `extract` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `commentable` int(15) NOT NULL,
  `parent_id` int(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  `type_id` int(15) NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(15) NOT NULL DEFAULT '0',
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`,`vid`),
  KEY `author_id` (`author_id`),
  KEY `parent_id` (`parent_id`),
  KEY `category_id` (`category_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `vid`, `author_id`, `title`, `content`, `extract`, `status`, `commentable`, `parent_id`, `category_id`, `type_id`, `password`, `comment_count`, `like_count`, `dislike_count`, `slug`, `created`, `updated`) VALUES
(123, 1, 1, 'Travel & Tourism', 'Who is Win in the coming election in India', 'Who is Win in the coming election in India', 1, 1, 1, 6, 2, '', 14, 0, 0, 'travel---tourism1', '2014-03-06 05:31:11', '2014-04-15 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `content_metadata`
--

CREATE TABLE IF NOT EXISTS `content_metadata` (
  `content_id` int(15) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `content_id_2` (`content_id`,`key`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ha_logins`
--

CREATE TABLE IF NOT EXISTS `ha_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `loginProvider` varchar(50) NOT NULL,
  `loginProviderIdentifier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  KEY `loginProvider` (`loginProvider`),
  KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  KEY `userId` (`userId`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `tag` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1384842242),
('m120101_000000_base', 1384842243),
('m121017_233353_cascade_user', 1384842243),
('m130207_175450_keywords', 1384842243),
('m130207_232511_prefermarkdown', 1384842243),
('m130219_183531_content_like', 1384842243),
('m130421_192044_add_about_user', 1384842243),
('m130516_183717_migrate_uploads', 1384842243),
('m130701_225047_userdetails', 1384842243);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` int(15) NOT NULL,
  `status` int(15) NOT NULL,
  `activation_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_role` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `displayName`, `about`, `user_role`, `status`, `activation_key`, `created`, `updated`) VALUES
(1, 'godweiff@godwelling.com', '$2y$13$bmQX6OF8noOy1a74JSmem.7USuEY30uOaHiSReoKF2008KZ0QmKAu', 'godwelling', '', 'godwelling', NULL, 5, 1, NULL, '2014-01-30 05:40:19', '2014-04-15 12:27:59'),
(86, 'chetan.bangre18@gmail.com', '$2y$13$bpVteCQnwbew6HFO16r19.EU.tsWYSWU/fWmoi9uSmKpdvLmvVNRG', NULL, NULL, 'Chetan Bangre', NULL, 1, 1, NULL, '2014-02-24 03:46:10', '2014-02-26 06:55:41'),
(95, 'eby.jane@gmail.com', '$2y$13$yuZnnuKSafe9vJrBugPb0O1maChzUX1.z/vDOZ.xFDz7LLtSfYa/e', NULL, NULL, 'ebyjane', NULL, 1, 0, NULL, '2014-03-01 07:51:05', '2014-03-01 07:51:05'),
(96, 'yourmailmktm@gmail.com', '$2y$13$0CFuZc3NCLzuPhNg7n8z8OLMyJ6lztk79qLBQ9n4HFcF7BH8gOklu', NULL, NULL, 'Mariaeobateq', NULL, 1, 0, NULL, '2014-03-06 06:31:12', '2014-03-06 06:31:12'),
(97, 'chetan.kadur@gmail.com', '$2y$13$SpIb4OB1EZkiZ40ywUkEU.wQanX/jS57FXXgbMnpU/ZiZ0MSmsik.', NULL, NULL, 'Chetan Kadur', NULL, 1, 0, NULL, '2014-03-28 06:57:50', '2014-03-28 06:57:50'),
(98, 'mailhostingserver@gmail.com', '$2y$13$dp43.J0MU0aP1720pI1uMObW71FFgAVOGwuykA5v1Qbp6p2qnb32u', NULL, NULL, 'tester', NULL, 1, 0, NULL, '2014-03-28 07:03:02', '2014-03-28 07:03:02'),
(100, 'chetan_cool143@yahoo.com', '$2y$13$JTjOUizJTv.IYCvbkSvxdOpsLcAAx.f3YvXwfr13yxbpp2HHvDGXO', NULL, NULL, 'chetan', NULL, 1, 0, NULL, '2014-04-15 06:25:31', '2014-04-15 06:25:31'),
(101, 'ashok.a@bigrock.com', '$2y$13$XoRDCZ4PKrDZup2aZ0niVesUQGcDfsIlbxY71O09kxhF15esLUl9y', NULL, NULL, 'ashok', NULL, 1, 0, NULL, '2014-04-15 06:27:06', '2014-04-15 06:27:06'),
(102, '111@123.com', '$2y$13$caJWIY5t67ZLq/82PciuPut6yPNqgbY.6mUxhCMS16nXjeygJBvKG', NULL, NULL, '123', NULL, 1, 0, NULL, '2014-04-17 10:09:32', '2014-04-17 10:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `group_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_metadata`
--

CREATE TABLE IF NOT EXISTS `user_metadata` (
  `user_id` int(15) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `user_id_2` (`user_id`,`key`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_metadata`
--

INSERT INTO `user_metadata` (`user_id`, `key`, `value`, `created`, `updated`) VALUES
(1, 'blog-image', 'upload-dc0945a57cb219c782069b9f0095acf0.png', '2013-12-17 22:29:27', '2014-01-29 14:52:06'),
(1, 'Dislike', '["62","63"]', '2013-12-17 01:49:19', '2014-01-30 18:32:49'),
(1, 'likes', '{"1":"59","3":"49","4":"51","5":"55","6":"50"}', '2013-12-17 01:07:43', '2014-02-01 08:17:30'),
(1, 'upload-6a992d5529f459a44fee58c733255e86.jpg', 'upload-6a992d5529f459a44fee58c733255e86.jpg', '2013-12-14 20:50:02', '2013-12-14 20:50:02'),
(1, 'upload-6a992d5529f459a44fee58c733255e8647.jpg', 'upload-6a992d5529f459a44fee58c733255e8647.jpg', '2013-12-14 21:27:41', '2013-12-14 21:27:41'),
(1, 'upload-8df17c77af23061ef4322d47d6c431fa.jpg', 'upload-8df17c77af23061ef4322d47d6c431fa.jpg', '2013-12-14 20:50:17', '2013-12-14 20:50:17'),
(1, 'upload-8df17c77af23061ef4322d47d6c431fa94.jpg', 'upload-8df17c77af23061ef4322d47d6c431fa94.jpg', '2013-12-14 21:28:02', '2013-12-14 21:28:02'),
(1, 'upload-dc0945a57cb219c782069b9f0095acf0.png', 'upload-dc0945a57cb219c782069b9f0095acf0.png', '2014-01-29 14:47:11', '2014-01-29 14:47:11'),
(86, 'activationKey', '579f2365425de9b8', '2014-02-24 03:46:10', '2014-02-24 03:46:10'),
(95, 'activationKey', '9a950d2deb7a0ce7', '2014-03-01 07:51:05', '2014-03-01 07:51:05'),
(95, 'passwordAttempts', '2', '2014-04-13 11:33:44', '2014-04-13 19:04:16'),
(96, 'activationKey', '29dc447f6626a299', '2014-03-06 06:31:12', '2014-03-06 06:31:12'),
(97, 'activationKey', '6def5002e73dd043', '2014-03-28 06:57:50', '2014-03-28 06:57:50'),
(98, 'activationKey', '7f6842236d78f9d4', '2014-03-28 07:03:02', '2014-03-28 07:03:02'),
(100, 'activationKey', 'd070e1fdeaa93966', '2014-04-15 06:25:31', '2014-04-15 06:25:31'),
(101, 'activationKey', '38ffb0aa6bfb915e', '2014-04-15 06:27:06', '2014-04-15 06:27:06'),
(102, 'activationKey', '1a06e05aaaada0f6', '2014-04-17 10:09:33', '2014-04-17 10:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created`, `updated`) VALUES
(1, 'User', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(2, 'Pending', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(3, 'Suspended', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(4, 'Moderator', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(5, 'Administrator', '2013-11-19 11:54:03', '2013-11-19 11:54:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categories_metadata`
--
ALTER TABLE `categories_metadata`
  ADD CONSTRAINT `categories_metadata_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comment_metadata`
--
ALTER TABLE `comment_metadata`
  ADD CONSTRAINT `comment_metadata_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `content_metadata`
--
ALTER TABLE `content_metadata`
  ADD CONSTRAINT `content_metadata_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_metadata`
--
ALTER TABLE `user_metadata`
  ADD CONSTRAINT `user_metadata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_metadata_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
