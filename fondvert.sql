-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 août 2026 à 16:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fondvert`
--

-- --------------------------------------------------------

--
-- Structure de la table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Un commentateur ou commentatrice WordPress', 'wapuu@wordpress.example', 'https://fr.wordpress.org/', '', '2026-07-22 12:28:23', '2026-07-22 10:28:23', 'Bonjour, ceci est un commentaire.\nPour débuter avec la modération, la modification et la suppression de commentaires, veuillez visiter l’écran des Commentaires dans le Tableau de bord.\nLes avatars des personnes qui commentent arrivent depuis <a href=\"https://fr.gravatar.com/\">Gravatar</a>.', 0, 'post-trashed', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'cron', 'a:12:{i:1786361302;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1786361304;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1786363102;a:1:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1786364902;a:1:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1786400944;a:1:{s:21:\"wp_update_user_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1786412577;a:1:{s:27:\"acf_update_site_health_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1786444104;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1786444144;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1786444169;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1786532096;a:1:{s:30:\"wp_delete_temp_updater_backups\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1786616904;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'on'),
(2, 'siteurl', 'http://localhost/fondvert', 'on'),
(3, 'home', 'http://localhost/fondvert', 'on'),
(4, 'blogname', 'Togo Green Fund', 'on'),
(5, 'blogdescription', '', 'on'),
(6, 'users_can_register', '0', 'on'),
(7, 'admin_email', 'aboukadani@gmail.com', 'on'),
(8, 'start_of_week', '1', 'on'),
(9, 'use_balanceTags', '0', 'on'),
(10, 'use_smilies', '1', 'on'),
(11, 'require_name_email', '1', 'on'),
(12, 'comments_notify', '1', 'on'),
(13, 'posts_per_rss', '10', 'on'),
(14, 'rss_use_excerpt', '0', 'on'),
(15, 'mailserver_url', 'mail.example.com', 'on'),
(16, 'mailserver_login', 'login@example.com', 'on'),
(17, 'mailserver_pass', '', 'on'),
(18, 'mailserver_port', '110', 'on'),
(19, 'default_category', '1', 'on'),
(20, 'default_comment_status', 'open', 'on'),
(21, 'default_ping_status', 'open', 'on'),
(22, 'default_pingback_flag', '1', 'on'),
(23, 'posts_per_page', '10', 'on'),
(24, 'date_format', 'j F Y', 'on'),
(25, 'time_format', 'G\\hi', 'on'),
(26, 'links_updated_date_format', 'd F Y G\\hi', 'on'),
(27, 'comment_moderation', '0', 'on'),
(28, 'moderation_notify', '1', 'on'),
(29, 'permalink_structure', '/%category%/%postname%/', 'on'),
(30, 'rewrite_rules', 'a:205:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:10:\"projets/?$\";s:26:\"index.php?post_type=projet\";s:40:\"projets/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=projet&feed=$matches[1]\";s:35:\"projets/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=projet&feed=$matches[1]\";s:27:\"projets/page/([0-9]{1,})/?$\";s:44:\"index.php?post_type=projet&paged=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:36:\"rapports/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"rapports/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"rapports/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"rapports/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"rapports/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"rapports/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:25:\"rapports/([^/]+)/embed/?$\";s:41:\"index.php?rapports=$matches[1]&embed=true\";s:29:\"rapports/([^/]+)/trackback/?$\";s:35:\"index.php?rapports=$matches[1]&tb=1\";s:37:\"rapports/([^/]+)/page/?([0-9]{1,})/?$\";s:48:\"index.php?rapports=$matches[1]&paged=$matches[2]\";s:44:\"rapports/([^/]+)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?rapports=$matches[1]&cpage=$matches[2]\";s:33:\"rapports/([^/]+)(?:/([0-9]+))?/?$\";s:47:\"index.php?rapports=$matches[1]&page=$matches[2]\";s:25:\"rapports/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:35:\"rapports/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:55:\"rapports/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"rapports/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"rapports/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:31:\"rapports/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:35:\"membres/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"membres/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"membres/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"membres/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"membres/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"membres/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"membres/([^/]+)/embed/?$\";s:40:\"index.php?membres=$matches[1]&embed=true\";s:28:\"membres/([^/]+)/trackback/?$\";s:34:\"index.php?membres=$matches[1]&tb=1\";s:36:\"membres/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?membres=$matches[1]&paged=$matches[2]\";s:43:\"membres/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?membres=$matches[1]&cpage=$matches[2]\";s:32:\"membres/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?membres=$matches[1]&page=$matches[2]\";s:24:\"membres/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"membres/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"membres/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"membres/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"membres/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"membres/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:34:\"appels/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:44:\"appels/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:64:\"appels/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"appels/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"appels/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:40:\"appels/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:23:\"appels/([^/]+)/embed/?$\";s:39:\"index.php?appels=$matches[1]&embed=true\";s:27:\"appels/([^/]+)/trackback/?$\";s:33:\"index.php?appels=$matches[1]&tb=1\";s:35:\"appels/([^/]+)/page/?([0-9]{1,})/?$\";s:46:\"index.php?appels=$matches[1]&paged=$matches[2]\";s:42:\"appels/([^/]+)/comment-page-([0-9]{1,})/?$\";s:46:\"index.php?appels=$matches[1]&cpage=$matches[2]\";s:31:\"appels/([^/]+)(?:/([0-9]+))?/?$\";s:45:\"index.php?appels=$matches[1]&page=$matches[2]\";s:23:\"appels/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:33:\"appels/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:53:\"appels/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"appels/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"appels/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:29:\"appels/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:34:\"projet/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:44:\"projet/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:64:\"projet/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"projet/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"projet/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:40:\"projet/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:23:\"projet/([^/]+)/embed/?$\";s:39:\"index.php?projet=$matches[1]&embed=true\";s:27:\"projet/([^/]+)/trackback/?$\";s:33:\"index.php?projet=$matches[1]&tb=1\";s:47:\"projet/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?projet=$matches[1]&feed=$matches[2]\";s:42:\"projet/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?projet=$matches[1]&feed=$matches[2]\";s:35:\"projet/([^/]+)/page/?([0-9]{1,})/?$\";s:46:\"index.php?projet=$matches[1]&paged=$matches[2]\";s:42:\"projet/([^/]+)/comment-page-([0-9]{1,})/?$\";s:46:\"index.php?projet=$matches[1]&cpage=$matches[2]\";s:31:\"projet/([^/]+)(?:/([0-9]+))?/?$\";s:45:\"index.php?projet=$matches[1]&page=$matches[2]\";s:23:\"projet/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:33:\"projet/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:53:\"projet/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"projet/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"projet/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:29:\"projet/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:31:\"faq/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\"faq/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\"faq/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"faq/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"faq/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\"faq/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:20:\"faq/([^/]+)/embed/?$\";s:36:\"index.php?faq=$matches[1]&embed=true\";s:24:\"faq/([^/]+)/trackback/?$\";s:30:\"index.php?faq=$matches[1]&tb=1\";s:32:\"faq/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?faq=$matches[1]&paged=$matches[2]\";s:39:\"faq/([^/]+)/comment-page-([0-9]{1,})/?$\";s:43:\"index.php?faq=$matches[1]&cpage=$matches[2]\";s:28:\"faq/([^/]+)(?:/([0-9]+))?/?$\";s:42:\"index.php?faq=$matches[1]&page=$matches[2]\";s:20:\"faq/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:30:\"faq/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:50:\"faq/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\"faq/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\"faq/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:26:\"faq/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:38:\"partenaire/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:48:\"partenaire/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:68:\"partenaire/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"partenaire/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"partenaire/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:44:\"partenaire/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:27:\"partenaire/([^/]+)/embed/?$\";s:43:\"index.php?partenaire=$matches[1]&embed=true\";s:31:\"partenaire/([^/]+)/trackback/?$\";s:37:\"index.php?partenaire=$matches[1]&tb=1\";s:39:\"partenaire/([^/]+)/page/?([0-9]{1,})/?$\";s:50:\"index.php?partenaire=$matches[1]&paged=$matches[2]\";s:46:\"partenaire/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?partenaire=$matches[1]&cpage=$matches[2]\";s:35:\"partenaire/([^/]+)(?:/([0-9]+))?/?$\";s:49:\"index.php?partenaire=$matches[1]&page=$matches[2]\";s:27:\"partenaire/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"partenaire/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"partenaire/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"partenaire/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"partenaire/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"partenaire/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:31:\".+?/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\".+?/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\".+?/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:22:\"(.+?)/([^/]+)/embed/?$\";s:63:\"index.php?category_name=$matches[1]&name=$matches[2]&embed=true\";s:26:\"(.+?)/([^/]+)/trackback/?$\";s:57:\"index.php?category_name=$matches[1]&name=$matches[2]&tb=1\";s:46:\"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]\";s:41:\"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]\";s:34:\"(.+?)/([^/]+)/page/?([0-9]{1,})/?$\";s:70:\"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]\";s:41:\"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$\";s:70:\"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]\";s:30:\"(.+?)/([^/]+)(?:/([0-9]+))?/?$\";s:69:\"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]\";s:20:\".+?/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:30:\".+?/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:50:\".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:26:\".+?/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:38:\"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:33:\"(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:14:\"(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:26:\"(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:33:\"(.+?)/comment-page-([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&cpage=$matches[2]\";s:8:\"(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";}', 'on'),
(31, 'hack_file', '0', 'on'),
(32, 'blog_charset', 'UTF-8', 'on'),
(33, 'moderation_keys', '', 'off'),
(34, 'active_plugins', 'a:3:{i:0;s:30:\"advanced-custom-fields/acf.php\";i:1;s:33:\"classic-editor/classic-editor.php\";i:2;s:43:\"custom-post-type-ui/custom-post-type-ui.php\";}', 'on'),
(35, 'category_base', '', 'on'),
(36, 'ping_sites', 'https://rpc.pingomatic.com/', 'on'),
(37, 'comment_max_links', '2', 'on'),
(38, 'gmt_offset', '0', 'on'),
(39, 'default_email_category', '1', 'on'),
(40, 'recently_edited', '', 'off'),
(41, 'template', 'theme', 'on'),
(42, 'stylesheet', 'theme', 'on'),
(43, 'comment_registration', '0', 'on'),
(44, 'html_type', 'text/html', 'on'),
(45, 'use_trackback', '0', 'on'),
(46, 'default_role', 'subscriber', 'on'),
(47, 'db_version', '61833', 'on'),
(48, 'uploads_use_yearmonth_folders', '1', 'on'),
(49, 'upload_path', '', 'on'),
(50, 'blog_public', '1', 'on'),
(51, 'default_link_category', '2', 'on'),
(52, 'show_on_front', 'posts', 'on'),
(53, 'tag_base', '', 'on'),
(54, 'show_avatars', '1', 'on'),
(55, 'avatar_rating', 'G', 'on'),
(56, 'upload_url_path', '', 'on'),
(57, 'thumbnail_size_w', '150', 'on'),
(58, 'thumbnail_size_h', '150', 'on'),
(59, 'thumbnail_crop', '1', 'on'),
(60, 'medium_size_w', '300', 'on'),
(61, 'medium_size_h', '300', 'on'),
(62, 'avatar_default', 'mystery', 'on'),
(63, 'large_size_w', '1024', 'on'),
(64, 'large_size_h', '1024', 'on'),
(65, 'image_default_link_type', 'none', 'on'),
(66, 'image_default_size', '', 'on'),
(67, 'image_default_align', '', 'on'),
(68, 'close_comments_for_old_posts', '0', 'on'),
(69, 'close_comments_days_old', '14', 'on'),
(70, 'thread_comments', '1', 'on'),
(71, 'thread_comments_depth', '5', 'on'),
(72, 'page_comments', '0', 'on'),
(73, 'comments_per_page', '50', 'on'),
(74, 'default_comments_page', 'newest', 'on'),
(75, 'comment_order', 'asc', 'on'),
(76, 'sticky_posts', 'a:0:{}', 'on'),
(77, 'widget_categories', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'auto'),
(78, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'auto'),
(79, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'auto'),
(80, 'uninstall_plugins', 'a:0:{}', 'off'),
(81, 'timezone_string', 'Europe/Paris', 'on'),
(82, 'page_for_posts', '0', 'on'),
(83, 'page_on_front', '0', 'on'),
(84, 'default_post_format', '0', 'on'),
(85, 'link_manager_enabled', '0', 'on'),
(86, 'finished_splitting_shared_terms', '1', 'on'),
(87, 'site_icon', '0', 'on'),
(88, 'medium_large_size_w', '768', 'on'),
(89, 'medium_large_size_h', '0', 'on'),
(90, 'wp_page_for_privacy_policy', '3', 'on'),
(91, 'show_comments_cookies_opt_in', '1', 'on'),
(92, 'admin_email_lifespan', '1800268102', 'on'),
(93, 'disallowed_keys', '', 'off'),
(94, 'comment_previously_approved', '1', 'on'),
(95, 'auto_plugin_theme_update_emails', 'a:0:{}', 'off'),
(96, 'auto_update_core_dev', 'enabled', 'on'),
(97, 'auto_update_core_minor', 'enabled', 'on'),
(98, 'auto_update_core_major', 'enabled', 'on'),
(99, 'wp_force_deactivated_plugins', 'a:0:{}', 'on'),
(100, 'wp_attachment_pages_enabled', '0', 'on'),
(101, 'wp_notes_notify', '1', 'on'),
(102, 'initial_db_version', '61833', 'on'),
(103, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'on'),
(104, 'fresh_site', '0', 'off'),
(105, 'WPLANG', 'fr_FR', 'auto'),
(106, 'user_count', '2', 'off'),
(107, 'widget_block', 'a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:159:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Articles récents</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:233:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Commentaires récents</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:151:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Catégories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}', 'auto'),
(108, 'sidebars_widgets', 'a:2:{s:19:\"wp_inactive_widgets\";a:5:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";i:3;s:7:\"block-5\";i:4;s:7:\"block-6\";}s:13:\"array_version\";i:3;}', 'auto'),
(109, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(110, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(111, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(112, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(113, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(114, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(115, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(116, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(117, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(118, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(119, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(120, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(121, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto'),
(122, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'auto');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(123, '_transient_wp_core_block_css_files', 'a:2:{s:7:\"version\";s:5:\"7.0.2\";s:5:\"files\";a:596:{i:0;s:31:\"accordion-heading/style-rtl.css\";i:1;s:35:\"accordion-heading/style-rtl.min.css\";i:2;s:27:\"accordion-heading/style.css\";i:3;s:31:\"accordion-heading/style.min.css\";i:4;s:28:\"accordion-item/style-rtl.css\";i:5;s:32:\"accordion-item/style-rtl.min.css\";i:6;s:24:\"accordion-item/style.css\";i:7;s:28:\"accordion-item/style.min.css\";i:8;s:29:\"accordion-panel/style-rtl.css\";i:9;s:33:\"accordion-panel/style-rtl.min.css\";i:10;s:25:\"accordion-panel/style.css\";i:11;s:29:\"accordion-panel/style.min.css\";i:12;s:23:\"accordion/style-rtl.css\";i:13;s:27:\"accordion/style-rtl.min.css\";i:14;s:19:\"accordion/style.css\";i:15;s:23:\"accordion/style.min.css\";i:16;s:22:\"archives/style-rtl.css\";i:17;s:26:\"archives/style-rtl.min.css\";i:18;s:18:\"archives/style.css\";i:19;s:22:\"archives/style.min.css\";i:20;s:20:\"audio/editor-rtl.css\";i:21;s:24:\"audio/editor-rtl.min.css\";i:22;s:16:\"audio/editor.css\";i:23;s:20:\"audio/editor.min.css\";i:24;s:19:\"audio/style-rtl.css\";i:25;s:23:\"audio/style-rtl.min.css\";i:26;s:15:\"audio/style.css\";i:27;s:19:\"audio/style.min.css\";i:28;s:19:\"audio/theme-rtl.css\";i:29;s:23:\"audio/theme-rtl.min.css\";i:30;s:15:\"audio/theme.css\";i:31;s:19:\"audio/theme.min.css\";i:32;s:21:\"avatar/editor-rtl.css\";i:33;s:25:\"avatar/editor-rtl.min.css\";i:34;s:17:\"avatar/editor.css\";i:35;s:21:\"avatar/editor.min.css\";i:36;s:20:\"avatar/style-rtl.css\";i:37;s:24:\"avatar/style-rtl.min.css\";i:38;s:16:\"avatar/style.css\";i:39;s:20:\"avatar/style.min.css\";i:40;s:25:\"breadcrumbs/style-rtl.css\";i:41;s:29:\"breadcrumbs/style-rtl.min.css\";i:42;s:21:\"breadcrumbs/style.css\";i:43;s:25:\"breadcrumbs/style.min.css\";i:44;s:21:\"button/editor-rtl.css\";i:45;s:25:\"button/editor-rtl.min.css\";i:46;s:17:\"button/editor.css\";i:47;s:21:\"button/editor.min.css\";i:48;s:20:\"button/style-rtl.css\";i:49;s:24:\"button/style-rtl.min.css\";i:50;s:16:\"button/style.css\";i:51;s:20:\"button/style.min.css\";i:52;s:22:\"buttons/editor-rtl.css\";i:53;s:26:\"buttons/editor-rtl.min.css\";i:54;s:18:\"buttons/editor.css\";i:55;s:22:\"buttons/editor.min.css\";i:56;s:21:\"buttons/style-rtl.css\";i:57;s:25:\"buttons/style-rtl.min.css\";i:58;s:17:\"buttons/style.css\";i:59;s:21:\"buttons/style.min.css\";i:60;s:22:\"calendar/style-rtl.css\";i:61;s:26:\"calendar/style-rtl.min.css\";i:62;s:18:\"calendar/style.css\";i:63;s:22:\"calendar/style.min.css\";i:64;s:25:\"categories/editor-rtl.css\";i:65;s:29:\"categories/editor-rtl.min.css\";i:66;s:21:\"categories/editor.css\";i:67;s:25:\"categories/editor.min.css\";i:68;s:24:\"categories/style-rtl.css\";i:69;s:28:\"categories/style-rtl.min.css\";i:70;s:20:\"categories/style.css\";i:71;s:24:\"categories/style.min.css\";i:72;s:19:\"code/editor-rtl.css\";i:73;s:23:\"code/editor-rtl.min.css\";i:74;s:15:\"code/editor.css\";i:75;s:19:\"code/editor.min.css\";i:76;s:18:\"code/style-rtl.css\";i:77;s:22:\"code/style-rtl.min.css\";i:78;s:14:\"code/style.css\";i:79;s:18:\"code/style.min.css\";i:80;s:18:\"code/theme-rtl.css\";i:81;s:22:\"code/theme-rtl.min.css\";i:82;s:14:\"code/theme.css\";i:83;s:18:\"code/theme.min.css\";i:84;s:22:\"columns/editor-rtl.css\";i:85;s:26:\"columns/editor-rtl.min.css\";i:86;s:18:\"columns/editor.css\";i:87;s:22:\"columns/editor.min.css\";i:88;s:21:\"columns/style-rtl.css\";i:89;s:25:\"columns/style-rtl.min.css\";i:90;s:17:\"columns/style.css\";i:91;s:21:\"columns/style.min.css\";i:92;s:33:\"comment-author-name/style-rtl.css\";i:93;s:37:\"comment-author-name/style-rtl.min.css\";i:94;s:29:\"comment-author-name/style.css\";i:95;s:33:\"comment-author-name/style.min.css\";i:96;s:29:\"comment-content/style-rtl.css\";i:97;s:33:\"comment-content/style-rtl.min.css\";i:98;s:25:\"comment-content/style.css\";i:99;s:29:\"comment-content/style.min.css\";i:100;s:26:\"comment-date/style-rtl.css\";i:101;s:30:\"comment-date/style-rtl.min.css\";i:102;s:22:\"comment-date/style.css\";i:103;s:26:\"comment-date/style.min.css\";i:104;s:31:\"comment-edit-link/style-rtl.css\";i:105;s:35:\"comment-edit-link/style-rtl.min.css\";i:106;s:27:\"comment-edit-link/style.css\";i:107;s:31:\"comment-edit-link/style.min.css\";i:108;s:32:\"comment-reply-link/style-rtl.css\";i:109;s:36:\"comment-reply-link/style-rtl.min.css\";i:110;s:28:\"comment-reply-link/style.css\";i:111;s:32:\"comment-reply-link/style.min.css\";i:112;s:30:\"comment-template/style-rtl.css\";i:113;s:34:\"comment-template/style-rtl.min.css\";i:114;s:26:\"comment-template/style.css\";i:115;s:30:\"comment-template/style.min.css\";i:116;s:42:\"comments-pagination-numbers/editor-rtl.css\";i:117;s:46:\"comments-pagination-numbers/editor-rtl.min.css\";i:118;s:38:\"comments-pagination-numbers/editor.css\";i:119;s:42:\"comments-pagination-numbers/editor.min.css\";i:120;s:34:\"comments-pagination/editor-rtl.css\";i:121;s:38:\"comments-pagination/editor-rtl.min.css\";i:122;s:30:\"comments-pagination/editor.css\";i:123;s:34:\"comments-pagination/editor.min.css\";i:124;s:33:\"comments-pagination/style-rtl.css\";i:125;s:37:\"comments-pagination/style-rtl.min.css\";i:126;s:29:\"comments-pagination/style.css\";i:127;s:33:\"comments-pagination/style.min.css\";i:128;s:29:\"comments-title/editor-rtl.css\";i:129;s:33:\"comments-title/editor-rtl.min.css\";i:130;s:25:\"comments-title/editor.css\";i:131;s:29:\"comments-title/editor.min.css\";i:132;s:23:\"comments/editor-rtl.css\";i:133;s:27:\"comments/editor-rtl.min.css\";i:134;s:19:\"comments/editor.css\";i:135;s:23:\"comments/editor.min.css\";i:136;s:22:\"comments/style-rtl.css\";i:137;s:26:\"comments/style-rtl.min.css\";i:138;s:18:\"comments/style.css\";i:139;s:22:\"comments/style.min.css\";i:140;s:20:\"cover/editor-rtl.css\";i:141;s:24:\"cover/editor-rtl.min.css\";i:142;s:16:\"cover/editor.css\";i:143;s:20:\"cover/editor.min.css\";i:144;s:19:\"cover/style-rtl.css\";i:145;s:23:\"cover/style-rtl.min.css\";i:146;s:15:\"cover/style.css\";i:147;s:19:\"cover/style.min.css\";i:148;s:22:\"details/editor-rtl.css\";i:149;s:26:\"details/editor-rtl.min.css\";i:150;s:18:\"details/editor.css\";i:151;s:22:\"details/editor.min.css\";i:152;s:21:\"details/style-rtl.css\";i:153;s:25:\"details/style-rtl.min.css\";i:154;s:17:\"details/style.css\";i:155;s:21:\"details/style.min.css\";i:156;s:20:\"embed/editor-rtl.css\";i:157;s:24:\"embed/editor-rtl.min.css\";i:158;s:16:\"embed/editor.css\";i:159;s:20:\"embed/editor.min.css\";i:160;s:19:\"embed/style-rtl.css\";i:161;s:23:\"embed/style-rtl.min.css\";i:162;s:15:\"embed/style.css\";i:163;s:19:\"embed/style.min.css\";i:164;s:19:\"embed/theme-rtl.css\";i:165;s:23:\"embed/theme-rtl.min.css\";i:166;s:15:\"embed/theme.css\";i:167;s:19:\"embed/theme.min.css\";i:168;s:19:\"file/editor-rtl.css\";i:169;s:23:\"file/editor-rtl.min.css\";i:170;s:15:\"file/editor.css\";i:171;s:19:\"file/editor.min.css\";i:172;s:18:\"file/style-rtl.css\";i:173;s:22:\"file/style-rtl.min.css\";i:174;s:14:\"file/style.css\";i:175;s:18:\"file/style.min.css\";i:176;s:23:\"footnotes/style-rtl.css\";i:177;s:27:\"footnotes/style-rtl.min.css\";i:178;s:19:\"footnotes/style.css\";i:179;s:23:\"footnotes/style.min.css\";i:180;s:23:\"freeform/editor-rtl.css\";i:181;s:27:\"freeform/editor-rtl.min.css\";i:182;s:19:\"freeform/editor.css\";i:183;s:23:\"freeform/editor.min.css\";i:184;s:22:\"gallery/editor-rtl.css\";i:185;s:26:\"gallery/editor-rtl.min.css\";i:186;s:18:\"gallery/editor.css\";i:187;s:22:\"gallery/editor.min.css\";i:188;s:21:\"gallery/style-rtl.css\";i:189;s:25:\"gallery/style-rtl.min.css\";i:190;s:17:\"gallery/style.css\";i:191;s:21:\"gallery/style.min.css\";i:192;s:21:\"gallery/theme-rtl.css\";i:193;s:25:\"gallery/theme-rtl.min.css\";i:194;s:17:\"gallery/theme.css\";i:195;s:21:\"gallery/theme.min.css\";i:196;s:20:\"group/editor-rtl.css\";i:197;s:24:\"group/editor-rtl.min.css\";i:198;s:16:\"group/editor.css\";i:199;s:20:\"group/editor.min.css\";i:200;s:19:\"group/style-rtl.css\";i:201;s:23:\"group/style-rtl.min.css\";i:202;s:15:\"group/style.css\";i:203;s:19:\"group/style.min.css\";i:204;s:19:\"group/theme-rtl.css\";i:205;s:23:\"group/theme-rtl.min.css\";i:206;s:15:\"group/theme.css\";i:207;s:19:\"group/theme.min.css\";i:208;s:21:\"heading/style-rtl.css\";i:209;s:25:\"heading/style-rtl.min.css\";i:210;s:17:\"heading/style.css\";i:211;s:21:\"heading/style.min.css\";i:212;s:19:\"html/editor-rtl.css\";i:213;s:23:\"html/editor-rtl.min.css\";i:214;s:15:\"html/editor.css\";i:215;s:19:\"html/editor.min.css\";i:216;s:19:\"icon/editor-rtl.css\";i:217;s:23:\"icon/editor-rtl.min.css\";i:218;s:15:\"icon/editor.css\";i:219;s:19:\"icon/editor.min.css\";i:220;s:18:\"icon/style-rtl.css\";i:221;s:22:\"icon/style-rtl.min.css\";i:222;s:14:\"icon/style.css\";i:223;s:18:\"icon/style.min.css\";i:224;s:20:\"image/editor-rtl.css\";i:225;s:24:\"image/editor-rtl.min.css\";i:226;s:16:\"image/editor.css\";i:227;s:20:\"image/editor.min.css\";i:228;s:19:\"image/style-rtl.css\";i:229;s:23:\"image/style-rtl.min.css\";i:230;s:15:\"image/style.css\";i:231;s:19:\"image/style.min.css\";i:232;s:19:\"image/theme-rtl.css\";i:233;s:23:\"image/theme-rtl.min.css\";i:234;s:15:\"image/theme.css\";i:235;s:19:\"image/theme.min.css\";i:236;s:29:\"latest-comments/style-rtl.css\";i:237;s:33:\"latest-comments/style-rtl.min.css\";i:238;s:25:\"latest-comments/style.css\";i:239;s:29:\"latest-comments/style.min.css\";i:240;s:27:\"latest-posts/editor-rtl.css\";i:241;s:31:\"latest-posts/editor-rtl.min.css\";i:242;s:23:\"latest-posts/editor.css\";i:243;s:27:\"latest-posts/editor.min.css\";i:244;s:26:\"latest-posts/style-rtl.css\";i:245;s:30:\"latest-posts/style-rtl.min.css\";i:246;s:22:\"latest-posts/style.css\";i:247;s:26:\"latest-posts/style.min.css\";i:248;s:18:\"list/style-rtl.css\";i:249;s:22:\"list/style-rtl.min.css\";i:250;s:14:\"list/style.css\";i:251;s:18:\"list/style.min.css\";i:252;s:22:\"loginout/style-rtl.css\";i:253;s:26:\"loginout/style-rtl.min.css\";i:254;s:18:\"loginout/style.css\";i:255;s:22:\"loginout/style.min.css\";i:256;s:19:\"math/editor-rtl.css\";i:257;s:23:\"math/editor-rtl.min.css\";i:258;s:15:\"math/editor.css\";i:259;s:19:\"math/editor.min.css\";i:260;s:18:\"math/style-rtl.css\";i:261;s:22:\"math/style-rtl.min.css\";i:262;s:14:\"math/style.css\";i:263;s:18:\"math/style.min.css\";i:264;s:25:\"media-text/editor-rtl.css\";i:265;s:29:\"media-text/editor-rtl.min.css\";i:266;s:21:\"media-text/editor.css\";i:267;s:25:\"media-text/editor.min.css\";i:268;s:24:\"media-text/style-rtl.css\";i:269;s:28:\"media-text/style-rtl.min.css\";i:270;s:20:\"media-text/style.css\";i:271;s:24:\"media-text/style.min.css\";i:272;s:19:\"more/editor-rtl.css\";i:273;s:23:\"more/editor-rtl.min.css\";i:274;s:15:\"more/editor.css\";i:275;s:19:\"more/editor.min.css\";i:276;s:30:\"navigation-link/editor-rtl.css\";i:277;s:34:\"navigation-link/editor-rtl.min.css\";i:278;s:26:\"navigation-link/editor.css\";i:279;s:30:\"navigation-link/editor.min.css\";i:280;s:29:\"navigation-link/style-rtl.css\";i:281;s:33:\"navigation-link/style-rtl.min.css\";i:282;s:25:\"navigation-link/style.css\";i:283;s:29:\"navigation-link/style.min.css\";i:284;s:38:\"navigation-overlay-close/style-rtl.css\";i:285;s:42:\"navigation-overlay-close/style-rtl.min.css\";i:286;s:34:\"navigation-overlay-close/style.css\";i:287;s:38:\"navigation-overlay-close/style.min.css\";i:288;s:33:\"navigation-submenu/editor-rtl.css\";i:289;s:37:\"navigation-submenu/editor-rtl.min.css\";i:290;s:29:\"navigation-submenu/editor.css\";i:291;s:33:\"navigation-submenu/editor.min.css\";i:292;s:25:\"navigation/editor-rtl.css\";i:293;s:29:\"navigation/editor-rtl.min.css\";i:294;s:21:\"navigation/editor.css\";i:295;s:25:\"navigation/editor.min.css\";i:296;s:24:\"navigation/style-rtl.css\";i:297;s:28:\"navigation/style-rtl.min.css\";i:298;s:20:\"navigation/style.css\";i:299;s:24:\"navigation/style.min.css\";i:300;s:23:\"nextpage/editor-rtl.css\";i:301;s:27:\"nextpage/editor-rtl.min.css\";i:302;s:19:\"nextpage/editor.css\";i:303;s:23:\"nextpage/editor.min.css\";i:304;s:24:\"page-list/editor-rtl.css\";i:305;s:28:\"page-list/editor-rtl.min.css\";i:306;s:20:\"page-list/editor.css\";i:307;s:24:\"page-list/editor.min.css\";i:308;s:23:\"page-list/style-rtl.css\";i:309;s:27:\"page-list/style-rtl.min.css\";i:310;s:19:\"page-list/style.css\";i:311;s:23:\"page-list/style.min.css\";i:312;s:24:\"paragraph/editor-rtl.css\";i:313;s:28:\"paragraph/editor-rtl.min.css\";i:314;s:20:\"paragraph/editor.css\";i:315;s:24:\"paragraph/editor.min.css\";i:316;s:23:\"paragraph/style-rtl.css\";i:317;s:27:\"paragraph/style-rtl.min.css\";i:318;s:19:\"paragraph/style.css\";i:319;s:23:\"paragraph/style.min.css\";i:320;s:35:\"post-author-biography/style-rtl.css\";i:321;s:39:\"post-author-biography/style-rtl.min.css\";i:322;s:31:\"post-author-biography/style.css\";i:323;s:35:\"post-author-biography/style.min.css\";i:324;s:30:\"post-author-name/style-rtl.css\";i:325;s:34:\"post-author-name/style-rtl.min.css\";i:326;s:26:\"post-author-name/style.css\";i:327;s:30:\"post-author-name/style.min.css\";i:328;s:26:\"post-author/editor-rtl.css\";i:329;s:30:\"post-author/editor-rtl.min.css\";i:330;s:22:\"post-author/editor.css\";i:331;s:26:\"post-author/editor.min.css\";i:332;s:25:\"post-author/style-rtl.css\";i:333;s:29:\"post-author/style-rtl.min.css\";i:334;s:21:\"post-author/style.css\";i:335;s:25:\"post-author/style.min.css\";i:336;s:33:\"post-comments-count/style-rtl.css\";i:337;s:37:\"post-comments-count/style-rtl.min.css\";i:338;s:29:\"post-comments-count/style.css\";i:339;s:33:\"post-comments-count/style.min.css\";i:340;s:33:\"post-comments-form/editor-rtl.css\";i:341;s:37:\"post-comments-form/editor-rtl.min.css\";i:342;s:29:\"post-comments-form/editor.css\";i:343;s:33:\"post-comments-form/editor.min.css\";i:344;s:32:\"post-comments-form/style-rtl.css\";i:345;s:36:\"post-comments-form/style-rtl.min.css\";i:346;s:28:\"post-comments-form/style.css\";i:347;s:32:\"post-comments-form/style.min.css\";i:348;s:32:\"post-comments-link/style-rtl.css\";i:349;s:36:\"post-comments-link/style-rtl.min.css\";i:350;s:28:\"post-comments-link/style.css\";i:351;s:32:\"post-comments-link/style.min.css\";i:352;s:26:\"post-content/style-rtl.css\";i:353;s:30:\"post-content/style-rtl.min.css\";i:354;s:22:\"post-content/style.css\";i:355;s:26:\"post-content/style.min.css\";i:356;s:23:\"post-date/style-rtl.css\";i:357;s:27:\"post-date/style-rtl.min.css\";i:358;s:19:\"post-date/style.css\";i:359;s:23:\"post-date/style.min.css\";i:360;s:27:\"post-excerpt/editor-rtl.css\";i:361;s:31:\"post-excerpt/editor-rtl.min.css\";i:362;s:23:\"post-excerpt/editor.css\";i:363;s:27:\"post-excerpt/editor.min.css\";i:364;s:26:\"post-excerpt/style-rtl.css\";i:365;s:30:\"post-excerpt/style-rtl.min.css\";i:366;s:22:\"post-excerpt/style.css\";i:367;s:26:\"post-excerpt/style.min.css\";i:368;s:34:\"post-featured-image/editor-rtl.css\";i:369;s:38:\"post-featured-image/editor-rtl.min.css\";i:370;s:30:\"post-featured-image/editor.css\";i:371;s:34:\"post-featured-image/editor.min.css\";i:372;s:33:\"post-featured-image/style-rtl.css\";i:373;s:37:\"post-featured-image/style-rtl.min.css\";i:374;s:29:\"post-featured-image/style.css\";i:375;s:33:\"post-featured-image/style.min.css\";i:376;s:34:\"post-navigation-link/style-rtl.css\";i:377;s:38:\"post-navigation-link/style-rtl.min.css\";i:378;s:30:\"post-navigation-link/style.css\";i:379;s:34:\"post-navigation-link/style.min.css\";i:380;s:27:\"post-template/style-rtl.css\";i:381;s:31:\"post-template/style-rtl.min.css\";i:382;s:23:\"post-template/style.css\";i:383;s:27:\"post-template/style.min.css\";i:384;s:24:\"post-terms/style-rtl.css\";i:385;s:28:\"post-terms/style-rtl.min.css\";i:386;s:20:\"post-terms/style.css\";i:387;s:24:\"post-terms/style.min.css\";i:388;s:31:\"post-time-to-read/style-rtl.css\";i:389;s:35:\"post-time-to-read/style-rtl.min.css\";i:390;s:27:\"post-time-to-read/style.css\";i:391;s:31:\"post-time-to-read/style.min.css\";i:392;s:24:\"post-title/style-rtl.css\";i:393;s:28:\"post-title/style-rtl.min.css\";i:394;s:20:\"post-title/style.css\";i:395;s:24:\"post-title/style.min.css\";i:396;s:26:\"preformatted/style-rtl.css\";i:397;s:30:\"preformatted/style-rtl.min.css\";i:398;s:22:\"preformatted/style.css\";i:399;s:26:\"preformatted/style.min.css\";i:400;s:24:\"pullquote/editor-rtl.css\";i:401;s:28:\"pullquote/editor-rtl.min.css\";i:402;s:20:\"pullquote/editor.css\";i:403;s:24:\"pullquote/editor.min.css\";i:404;s:23:\"pullquote/style-rtl.css\";i:405;s:27:\"pullquote/style-rtl.min.css\";i:406;s:19:\"pullquote/style.css\";i:407;s:23:\"pullquote/style.min.css\";i:408;s:23:\"pullquote/theme-rtl.css\";i:409;s:27:\"pullquote/theme-rtl.min.css\";i:410;s:19:\"pullquote/theme.css\";i:411;s:23:\"pullquote/theme.min.css\";i:412;s:39:\"query-pagination-numbers/editor-rtl.css\";i:413;s:43:\"query-pagination-numbers/editor-rtl.min.css\";i:414;s:35:\"query-pagination-numbers/editor.css\";i:415;s:39:\"query-pagination-numbers/editor.min.css\";i:416;s:31:\"query-pagination/editor-rtl.css\";i:417;s:35:\"query-pagination/editor-rtl.min.css\";i:418;s:27:\"query-pagination/editor.css\";i:419;s:31:\"query-pagination/editor.min.css\";i:420;s:30:\"query-pagination/style-rtl.css\";i:421;s:34:\"query-pagination/style-rtl.min.css\";i:422;s:26:\"query-pagination/style.css\";i:423;s:30:\"query-pagination/style.min.css\";i:424;s:25:\"query-title/style-rtl.css\";i:425;s:29:\"query-title/style-rtl.min.css\";i:426;s:21:\"query-title/style.css\";i:427;s:25:\"query-title/style.min.css\";i:428;s:25:\"query-total/style-rtl.css\";i:429;s:29:\"query-total/style-rtl.min.css\";i:430;s:21:\"query-total/style.css\";i:431;s:25:\"query-total/style.min.css\";i:432;s:20:\"query/editor-rtl.css\";i:433;s:24:\"query/editor-rtl.min.css\";i:434;s:16:\"query/editor.css\";i:435;s:20:\"query/editor.min.css\";i:436;s:19:\"quote/style-rtl.css\";i:437;s:23:\"quote/style-rtl.min.css\";i:438;s:15:\"quote/style.css\";i:439;s:19:\"quote/style.min.css\";i:440;s:19:\"quote/theme-rtl.css\";i:441;s:23:\"quote/theme-rtl.min.css\";i:442;s:15:\"quote/theme.css\";i:443;s:19:\"quote/theme.min.css\";i:444;s:23:\"read-more/style-rtl.css\";i:445;s:27:\"read-more/style-rtl.min.css\";i:446;s:19:\"read-more/style.css\";i:447;s:23:\"read-more/style.min.css\";i:448;s:18:\"rss/editor-rtl.css\";i:449;s:22:\"rss/editor-rtl.min.css\";i:450;s:14:\"rss/editor.css\";i:451;s:18:\"rss/editor.min.css\";i:452;s:17:\"rss/style-rtl.css\";i:453;s:21:\"rss/style-rtl.min.css\";i:454;s:13:\"rss/style.css\";i:455;s:17:\"rss/style.min.css\";i:456;s:21:\"search/editor-rtl.css\";i:457;s:25:\"search/editor-rtl.min.css\";i:458;s:17:\"search/editor.css\";i:459;s:21:\"search/editor.min.css\";i:460;s:20:\"search/style-rtl.css\";i:461;s:24:\"search/style-rtl.min.css\";i:462;s:16:\"search/style.css\";i:463;s:20:\"search/style.min.css\";i:464;s:20:\"search/theme-rtl.css\";i:465;s:24:\"search/theme-rtl.min.css\";i:466;s:16:\"search/theme.css\";i:467;s:20:\"search/theme.min.css\";i:468;s:24:\"separator/editor-rtl.css\";i:469;s:28:\"separator/editor-rtl.min.css\";i:470;s:20:\"separator/editor.css\";i:471;s:24:\"separator/editor.min.css\";i:472;s:23:\"separator/style-rtl.css\";i:473;s:27:\"separator/style-rtl.min.css\";i:474;s:19:\"separator/style.css\";i:475;s:23:\"separator/style.min.css\";i:476;s:23:\"separator/theme-rtl.css\";i:477;s:27:\"separator/theme-rtl.min.css\";i:478;s:19:\"separator/theme.css\";i:479;s:23:\"separator/theme.min.css\";i:480;s:24:\"shortcode/editor-rtl.css\";i:481;s:28:\"shortcode/editor-rtl.min.css\";i:482;s:20:\"shortcode/editor.css\";i:483;s:24:\"shortcode/editor.min.css\";i:484;s:24:\"site-logo/editor-rtl.css\";i:485;s:28:\"site-logo/editor-rtl.min.css\";i:486;s:20:\"site-logo/editor.css\";i:487;s:24:\"site-logo/editor.min.css\";i:488;s:23:\"site-logo/style-rtl.css\";i:489;s:27:\"site-logo/style-rtl.min.css\";i:490;s:19:\"site-logo/style.css\";i:491;s:23:\"site-logo/style.min.css\";i:492;s:27:\"site-tagline/editor-rtl.css\";i:493;s:31:\"site-tagline/editor-rtl.min.css\";i:494;s:23:\"site-tagline/editor.css\";i:495;s:27:\"site-tagline/editor.min.css\";i:496;s:26:\"site-tagline/style-rtl.css\";i:497;s:30:\"site-tagline/style-rtl.min.css\";i:498;s:22:\"site-tagline/style.css\";i:499;s:26:\"site-tagline/style.min.css\";i:500;s:25:\"site-title/editor-rtl.css\";i:501;s:29:\"site-title/editor-rtl.min.css\";i:502;s:21:\"site-title/editor.css\";i:503;s:25:\"site-title/editor.min.css\";i:504;s:24:\"site-title/style-rtl.css\";i:505;s:28:\"site-title/style-rtl.min.css\";i:506;s:20:\"site-title/style.css\";i:507;s:24:\"site-title/style.min.css\";i:508;s:26:\"social-link/editor-rtl.css\";i:509;s:30:\"social-link/editor-rtl.min.css\";i:510;s:22:\"social-link/editor.css\";i:511;s:26:\"social-link/editor.min.css\";i:512;s:27:\"social-links/editor-rtl.css\";i:513;s:31:\"social-links/editor-rtl.min.css\";i:514;s:23:\"social-links/editor.css\";i:515;s:27:\"social-links/editor.min.css\";i:516;s:26:\"social-links/style-rtl.css\";i:517;s:30:\"social-links/style-rtl.min.css\";i:518;s:22:\"social-links/style.css\";i:519;s:26:\"social-links/style.min.css\";i:520;s:21:\"spacer/editor-rtl.css\";i:521;s:25:\"spacer/editor-rtl.min.css\";i:522;s:17:\"spacer/editor.css\";i:523;s:21:\"spacer/editor.min.css\";i:524;s:20:\"spacer/style-rtl.css\";i:525;s:24:\"spacer/style-rtl.min.css\";i:526;s:16:\"spacer/style.css\";i:527;s:20:\"spacer/style.min.css\";i:528;s:20:\"table/editor-rtl.css\";i:529;s:24:\"table/editor-rtl.min.css\";i:530;s:16:\"table/editor.css\";i:531;s:20:\"table/editor.min.css\";i:532;s:19:\"table/style-rtl.css\";i:533;s:23:\"table/style-rtl.min.css\";i:534;s:15:\"table/style.css\";i:535;s:19:\"table/style.min.css\";i:536;s:19:\"table/theme-rtl.css\";i:537;s:23:\"table/theme-rtl.min.css\";i:538;s:15:\"table/theme.css\";i:539;s:19:\"table/theme.min.css\";i:540;s:23:\"tag-cloud/style-rtl.css\";i:541;s:27:\"tag-cloud/style-rtl.min.css\";i:542;s:19:\"tag-cloud/style.css\";i:543;s:23:\"tag-cloud/style.min.css\";i:544;s:28:\"template-part/editor-rtl.css\";i:545;s:32:\"template-part/editor-rtl.min.css\";i:546;s:24:\"template-part/editor.css\";i:547;s:28:\"template-part/editor.min.css\";i:548;s:27:\"template-part/theme-rtl.css\";i:549;s:31:\"template-part/theme-rtl.min.css\";i:550;s:23:\"template-part/theme.css\";i:551;s:27:\"template-part/theme.min.css\";i:552;s:24:\"term-count/style-rtl.css\";i:553;s:28:\"term-count/style-rtl.min.css\";i:554;s:20:\"term-count/style.css\";i:555;s:24:\"term-count/style.min.css\";i:556;s:30:\"term-description/style-rtl.css\";i:557;s:34:\"term-description/style-rtl.min.css\";i:558;s:26:\"term-description/style.css\";i:559;s:30:\"term-description/style.min.css\";i:560;s:23:\"term-name/style-rtl.css\";i:561;s:27:\"term-name/style-rtl.min.css\";i:562;s:19:\"term-name/style.css\";i:563;s:23:\"term-name/style.min.css\";i:564;s:28:\"term-template/editor-rtl.css\";i:565;s:32:\"term-template/editor-rtl.min.css\";i:566;s:24:\"term-template/editor.css\";i:567;s:28:\"term-template/editor.min.css\";i:568;s:27:\"term-template/style-rtl.css\";i:569;s:31:\"term-template/style-rtl.min.css\";i:570;s:23:\"term-template/style.css\";i:571;s:27:\"term-template/style.min.css\";i:572;s:27:\"text-columns/editor-rtl.css\";i:573;s:31:\"text-columns/editor-rtl.min.css\";i:574;s:23:\"text-columns/editor.css\";i:575;s:27:\"text-columns/editor.min.css\";i:576;s:26:\"text-columns/style-rtl.css\";i:577;s:30:\"text-columns/style-rtl.min.css\";i:578;s:22:\"text-columns/style.css\";i:579;s:26:\"text-columns/style.min.css\";i:580;s:19:\"verse/style-rtl.css\";i:581;s:23:\"verse/style-rtl.min.css\";i:582;s:15:\"verse/style.css\";i:583;s:19:\"verse/style.min.css\";i:584;s:20:\"video/editor-rtl.css\";i:585;s:24:\"video/editor-rtl.min.css\";i:586;s:16:\"video/editor.css\";i:587;s:20:\"video/editor.min.css\";i:588;s:19:\"video/style-rtl.css\";i:589;s:23:\"video/style-rtl.min.css\";i:590;s:15:\"video/style.css\";i:591;s:19:\"video/style.min.css\";i:592;s:19:\"video/theme-rtl.css\";i:593;s:23:\"video/theme-rtl.min.css\";i:594;s:15:\"video/theme.css\";i:595;s:19:\"video/theme.min.css\";}}', 'on'),
(131, 'theme_mods_twentytwentyfive', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1784730739;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'off'),
(132, '_transient_wp_styles_for_blocks', 'a:2:{s:4:\"hash\";s:32:\"4e7caa39132bba085505763d32f51778\";s:6:\"blocks\";a:7:{s:32:\"0368537a03d4b05ed11f802c802c5153\";s:0:\"\";s:32:\"500888137eafa12a508de2c588d9ffdd\";s:46:\":root :where(.wp-block-icon svg){width: 24px;}\";s:32:\"a6036e6eb2ad2df7ed8860b807868647\";s:0:\"\";s:32:\"3b46efc0a10c1dae38f584ad199c3544\";s:120:\":where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}\";s:32:\"ab4df16c9e454bfed8a404309545590d\";s:120:\":where(.wp-block-term-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-term-template.is-layout-grid){gap: 1.25em;}\";s:32:\"68ec5cad52d993402775a7503ba9efb7\";s:102:\":where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}\";s:32:\"b8b4aa19e69b9b2de0f5c27097467bd6\";s:69:\":root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}\";}}', 'on'),
(136, 'recovery_keys', 'a:0:{}', 'off'),
(151, 'can_compress_scripts', '1', 'on'),
(164, 'finished_updating_comment_type', '1', 'auto'),
(165, '_site_transient_wp_plugin_dependencies_plugin_data', 'a:0:{}', 'off'),
(177, 'recently_activated', 'a:0:{}', 'off'),
(180, 'cptui_new_install', 'false', 'auto'),
(193, 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:20:\"aboukadani@gmail.com\";s:7:\"version\";s:5:\"7.0.2\";s:9:\"timestamp\";i:1784720006;}', 'off'),
(201, 'cptui_post_types', 'a:3:{s:8:\"rapports\";a:34:{s:4:\"name\";s:8:\"rapports\";s:5:\"label\";s:8:\"Rapports\";s:14:\"singular_label\";s:7:\"Rapport\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:7:\"show_ui\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:16:\"delete_with_user\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:14:\"rest_namespace\";s:0:\"\";s:11:\"has_archive\";s:5:\"false\";s:18:\"has_archive_string\";s:0:\"\";s:19:\"exclude_from_search\";s:5:\"false\";s:15:\"capability_type\";s:4:\"post\";s:12:\"hierarchical\";s:5:\"false\";s:10:\"can_export\";s:5:\"false\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:13:\"menu_position\";s:0:\"\";s:12:\"show_in_menu\";s:4:\"true\";s:19:\"show_in_menu_string\";s:0:\"\";s:9:\"menu_icon\";N;s:20:\"register_meta_box_cb\";N;s:8:\"supports\";a:3:{i:0;s:5:\"title\";i:1;s:6:\"editor\";i:2;s:9:\"thumbnail\";}s:10:\"taxonomies\";a:0:{}s:6:\"labels\";a:32:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:7:\"add_new\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:10:\"view_items\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:18:\"not_found_in_trash\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:14:\"featured_image\";s:0:\"\";s:18:\"set_featured_image\";s:0:\"\";s:21:\"remove_featured_image\";s:0:\"\";s:18:\"use_featured_image\";s:0:\"\";s:8:\"archives\";s:0:\"\";s:16:\"insert_into_item\";s:0:\"\";s:21:\"uploaded_to_this_item\";s:0:\"\";s:17:\"filter_items_list\";s:0:\"\";s:14:\"filter_by_date\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:10:\"attributes\";s:0:\"\";s:14:\"name_admin_bar\";s:0:\"\";s:14:\"item_published\";s:0:\"\";s:24:\"item_published_privately\";s:0:\"\";s:22:\"item_reverted_to_draft\";s:0:\"\";s:12:\"item_trashed\";s:0:\"\";s:14:\"item_scheduled\";s:0:\"\";s:12:\"item_updated\";s:0:\"\";s:13:\"template_name\";s:0:\"\";}s:15:\"custom_supports\";s:0:\"\";s:16:\"enter_title_here\";s:0:\"\";}s:7:\"membres\";a:34:{s:4:\"name\";s:7:\"membres\";s:5:\"label\";s:7:\"Membres\";s:14:\"singular_label\";s:6:\"Membre\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:7:\"show_ui\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:16:\"delete_with_user\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:14:\"rest_namespace\";s:0:\"\";s:11:\"has_archive\";s:5:\"false\";s:18:\"has_archive_string\";s:0:\"\";s:19:\"exclude_from_search\";s:5:\"false\";s:15:\"capability_type\";s:4:\"post\";s:12:\"hierarchical\";s:5:\"false\";s:10:\"can_export\";s:5:\"false\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:13:\"menu_position\";s:0:\"\";s:12:\"show_in_menu\";s:4:\"true\";s:19:\"show_in_menu_string\";s:0:\"\";s:9:\"menu_icon\";N;s:20:\"register_meta_box_cb\";N;s:8:\"supports\";a:3:{i:0;s:5:\"title\";i:1;s:6:\"editor\";i:2;s:9:\"thumbnail\";}s:10:\"taxonomies\";a:0:{}s:6:\"labels\";a:32:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:7:\"add_new\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:10:\"view_items\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:18:\"not_found_in_trash\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:14:\"featured_image\";s:0:\"\";s:18:\"set_featured_image\";s:0:\"\";s:21:\"remove_featured_image\";s:0:\"\";s:18:\"use_featured_image\";s:0:\"\";s:8:\"archives\";s:0:\"\";s:16:\"insert_into_item\";s:0:\"\";s:21:\"uploaded_to_this_item\";s:0:\"\";s:17:\"filter_items_list\";s:0:\"\";s:14:\"filter_by_date\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:10:\"attributes\";s:0:\"\";s:14:\"name_admin_bar\";s:0:\"\";s:14:\"item_published\";s:0:\"\";s:24:\"item_published_privately\";s:0:\"\";s:22:\"item_reverted_to_draft\";s:0:\"\";s:12:\"item_trashed\";s:0:\"\";s:14:\"item_scheduled\";s:0:\"\";s:12:\"item_updated\";s:0:\"\";s:13:\"template_name\";s:0:\"\";}s:15:\"custom_supports\";s:0:\"\";s:16:\"enter_title_here\";s:0:\"\";}s:6:\"appels\";a:34:{s:4:\"name\";s:6:\"appels\";s:5:\"label\";s:6:\"Appels\";s:14:\"singular_label\";s:5:\"Appel\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:7:\"show_ui\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:16:\"delete_with_user\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:14:\"rest_namespace\";s:0:\"\";s:11:\"has_archive\";s:5:\"false\";s:18:\"has_archive_string\";s:0:\"\";s:19:\"exclude_from_search\";s:5:\"false\";s:15:\"capability_type\";s:4:\"post\";s:12:\"hierarchical\";s:5:\"false\";s:10:\"can_export\";s:5:\"false\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:13:\"menu_position\";s:0:\"\";s:12:\"show_in_menu\";s:4:\"true\";s:19:\"show_in_menu_string\";s:0:\"\";s:9:\"menu_icon\";N;s:20:\"register_meta_box_cb\";N;s:8:\"supports\";a:3:{i:0;s:5:\"title\";i:1;s:6:\"editor\";i:2;s:9:\"thumbnail\";}s:10:\"taxonomies\";a:0:{}s:6:\"labels\";a:32:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:7:\"add_new\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:10:\"view_items\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:18:\"not_found_in_trash\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:14:\"featured_image\";s:0:\"\";s:18:\"set_featured_image\";s:0:\"\";s:21:\"remove_featured_image\";s:0:\"\";s:18:\"use_featured_image\";s:0:\"\";s:8:\"archives\";s:0:\"\";s:16:\"insert_into_item\";s:0:\"\";s:21:\"uploaded_to_this_item\";s:0:\"\";s:17:\"filter_items_list\";s:0:\"\";s:14:\"filter_by_date\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:10:\"attributes\";s:0:\"\";s:14:\"name_admin_bar\";s:0:\"\";s:14:\"item_published\";s:0:\"\";s:24:\"item_published_privately\";s:0:\"\";s:22:\"item_reverted_to_draft\";s:0:\"\";s:12:\"item_trashed\";s:0:\"\";s:14:\"item_scheduled\";s:0:\"\";s:12:\"item_updated\";s:0:\"\";s:13:\"template_name\";s:0:\"\";}s:15:\"custom_supports\";s:0:\"\";s:16:\"enter_title_here\";s:0:\"\";}}', 'auto'),
(213, 'current_theme', 'Theme de Fond Vert', 'auto'),
(214, 'theme_mods_twentytwentytwo', 'a:4:{i:0;b:0;s:19:\"wp_classic_sidebars\";a:0:{}s:18:\"nav_menu_locations\";a:0:{}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1784730779;s:4:\"data\";a:1:{s:19:\"wp_inactive_widgets\";a:5:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";i:3;s:7:\"block-5\";i:4;s:7:\"block-6\";}}}}', 'off'),
(215, 'theme_switched', '', 'auto'),
(219, 'theme_mods_theme', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'on'),
(227, 'recovery_mode_email_last_sent', '1784735434', 'auto'),
(280, '_transient_health-check-site-status-result', '{\"good\":17,\"recommended\":7,\"critical\":2}', 'on'),
(478, 'acf_first_activated_version', '6.8.6', 'on'),
(479, 'acf_site_health', '{\"version\":\"6.8.6\",\"plugin_type\":\"Free\",\"update_source\":\"WordPress.org\",\"wp_version\":\"7.0.2\",\"mysql_version\":\"10.4.32-MariaDB\",\"is_multisite\":false,\"active_theme\":{\"name\":\"Theme de Fond Vert\",\"version\":\"1.9\",\"theme_uri\":\"\",\"stylesheet\":false},\"active_plugins\":{\"advanced-custom-fields\\/acf.php\":{\"name\":\"Advanced Custom Fields\",\"version\":\"6.8.6\",\"plugin_uri\":\"https:\\/\\/www.advancedcustomfields.com\"},\"classic-editor\\/classic-editor.php\":{\"name\":\"Classic Editor\",\"version\":\"1.7.0\",\"plugin_uri\":\"https:\\/\\/wordpress.org\\/plugins\\/classic-editor\\/\"},\"custom-post-type-ui\\/custom-post-type-ui.php\":{\"name\":\"Custom Post Type UI\",\"version\":\"1.19.2\",\"plugin_uri\":\"https:\\/\\/github.com\\/WebDevStudios\\/custom-post-type-ui\\/\"}},\"ui_field_groups\":\"1\",\"php_field_groups\":\"0\",\"json_field_groups\":\"0\",\"rest_field_groups\":\"0\",\"all_location_rules\":[\"page==67\"],\"number_of_fields_by_type\":{\"image\":1,\"text\":5},\"number_of_third_party_fields_by_type\":[],\"post_types_enabled\":true,\"ui_post_types\":\"0\",\"json_post_types\":\"0\",\"ui_taxonomies\":\"0\",\"json_taxonomies\":\"0\",\"rest_api_format\":\"light\",\"admin_ui_enabled\":true,\"field_type-modal_enabled\":true,\"field_settings_tabs_enabled\":false,\"shortcode_enabled\":false,\"registered_acf_forms\":\"0\",\"json_save_paths\":1,\"json_load_paths\":1,\"ai_enabled\":false,\"schema_support\":false,\"schema_ready_objects\":{\"blocks\":0,\"post_types\":0},\"event_first_activated\":1785807777,\"event_first_created_field_group\":1785807966,\"last_updated\":1786360678}', 'off'),
(481, 'acf_version', '6.8.6', 'auto'),
(490, 'wp_calendar_block_has_published_posts', '1', 'auto'),
(547, '_site_transient_timeout_browser_73c2e21c0fc47f8841aa6000af1e64c7', '1786475143', 'off'),
(548, '_site_transient_browser_73c2e21c0fc47f8841aa6000af1e64c7', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:9:\"150.0.0.0\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'off'),
(557, 'category_children', 'a:0:{}', 'auto'),
(586, '_site_transient_timeout_php_check_da775d00ae55849f14f81cf79fc50d46', '1786641507', 'off'),
(587, '_site_transient_php_check_da775d00ae55849f14f81cf79fc50d46', 'a:5:{s:19:\"recommended_version\";s:3:\"8.3\";s:15:\"minimum_version\";s:3:\"7.4\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'off'),
(595, '_site_transient_timeout_browser_98289dd1c8427f7ac9bc8f4d0003f2e0', '1786642352', 'off'),
(596, '_site_transient_browser_98289dd1c8427f7ac9bc8f4d0003f2e0', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:9:\"151.0.0.0\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'off'),
(697, '_site_transient_timeout_theme_roots', '1786362460', 'off'),
(698, '_site_transient_theme_roots', 'a:3:{s:8:\"template\";s:7:\"/themes\";s:5:\"theme\";s:7:\"/themes\";s:15:\"twentytwentytwo\";s:7:\"/themes\";}', 'off'),
(700, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:3:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/fr_FR/wordpress-7.0.3.zip\";s:6:\"locale\";s:5:\"fr_FR\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/fr_FR/wordpress-7.0.3.zip\";s:10:\"no_content\";s:0:\"\";s:11:\"new_bundled\";s:0:\"\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"7.0.3\";s:7:\"version\";s:5:\"7.0.3\";s:11:\"php_version\";s:3:\"7.4\";s:13:\"mysql_version\";s:5:\"5.5.5\";s:11:\"new_bundled\";s:3:\"6.7\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-7.0.3.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-7.0.3.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-7.0.3-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-7.0.3-new-bundled.zip\";s:7:\"partial\";s:69:\"https://downloads.wordpress.org/release/wordpress-7.0.3-partial-2.zip\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"7.0.3\";s:7:\"version\";s:5:\"7.0.3\";s:11:\"php_version\";s:3:\"7.4\";s:13:\"mysql_version\";s:5:\"5.5.5\";s:11:\"new_bundled\";s:3:\"6.7\";s:15:\"partial_version\";s:5:\"7.0.2\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/fr_FR/wordpress-7.0.3.zip\";s:6:\"locale\";s:5:\"fr_FR\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/fr_FR/wordpress-7.0.3.zip\";s:10:\"no_content\";s:0:\"\";s:11:\"new_bundled\";s:0:\"\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"7.0.3\";s:7:\"version\";s:5:\"7.0.3\";s:11:\"php_version\";s:3:\"7.4\";s:13:\"mysql_version\";s:5:\"5.5.5\";s:11:\"new_bundled\";s:3:\"6.7\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}}s:12:\"last_checked\";i:1786360673;s:15:\"version_checked\";s:5:\"7.0.2\";s:12:\"translations\";a:1:{i:0;a:7:{s:4:\"type\";s:4:\"core\";s:4:\"slug\";s:7:\"default\";s:8:\"language\";s:5:\"fr_FR\";s:7:\"version\";s:5:\"7.0.2\";s:7:\"updated\";s:19:\"2026-07-24 05:25:22\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/7.0.2/fr_FR.zip\";s:10:\"autoupdate\";b:1;}}}', 'off'),
(701, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1786360675;s:7:\"checked\";a:3:{s:8:\"template\";s:3:\"1.9\";s:5:\"theme\";s:3:\"1.9\";s:15:\"twentytwentytwo\";s:3:\"2.1\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:1:{s:15:\"twentytwentytwo\";a:6:{s:5:\"theme\";s:15:\"twentytwentytwo\";s:11:\"new_version\";s:3:\"2.1\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentytwo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentytwo.2.1.zip\";s:8:\"requires\";s:3:\"5.9\";s:12:\"requires_php\";s:3:\"5.6\";}}s:12:\"translations\";a:0:{}}', 'off'),
(702, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1786360678;s:8:\"response\";a:2:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":13:{s:2:\"id\";s:36:\"w.org/plugins/advanced-custom-fields\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:5:\"6.8.7\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.6.8.7.zip\";s:5:\"icons\";a:2:{s:2:\"1x\";s:67:\"https://ps.w.org/advanced-custom-fields/assets/icon.svg?rev=3207824\";s:3:\"svg\";s:67:\"https://ps.w.org/advanced-custom-fields/assets/icon.svg?rev=3207824\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=3374528\";s:2:\"1x\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=3374528\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"6.2\";s:6:\"tested\";s:5:\"7.0.3\";s:12:\"requires_php\";s:3:\"7.4\";s:16:\"requires_plugins\";a:0:{}}s:43:\"custom-post-type-ui/custom-post-type-ui.php\";O:8:\"stdClass\":13:{s:2:\"id\";s:33:\"w.org/plugins/custom-post-type-ui\";s:4:\"slug\";s:19:\"custom-post-type-ui\";s:6:\"plugin\";s:43:\"custom-post-type-ui/custom-post-type-ui.php\";s:11:\"new_version\";s:6:\"1.19.3\";s:3:\"url\";s:50:\"https://wordpress.org/plugins/custom-post-type-ui/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/custom-post-type-ui.1.19.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:72:\"https://ps.w.org/custom-post-type-ui/assets/icon-256x256.png?rev=2744389\";s:2:\"1x\";s:72:\"https://ps.w.org/custom-post-type-ui/assets/icon-128x128.png?rev=2744389\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/custom-post-type-ui/assets/banner-1544x500.png?rev=2744389\";s:2:\"1x\";s:74:\"https://ps.w.org/custom-post-type-ui/assets/banner-772x250.png?rev=2744389\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"6.6\";s:6:\"tested\";s:5:\"7.0.3\";s:12:\"requires_php\";s:3:\"7.4\";s:16:\"requires_plugins\";a:0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:3:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:3:\"5.7\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/akismet.5.7.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:60:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=2818463\";s:2:\"1x\";s:60:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=2818463\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/akismet/assets/banner-1544x500.png?rev=2900731\";s:2:\"1x\";s:62:\"https://ps.w.org/akismet/assets/banner-772x250.png?rev=2900731\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.8\";}s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:5:\"1.7.0\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/classic-editor.1.7.0.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";}s:9:\"hello.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/hello-dolly/assets/banner-1544x500.jpg?rev=2645582\";s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";}}s:7:\"checked\";a:5:{s:30:\"advanced-custom-fields/acf.php\";s:5:\"6.8.6\";s:19:\"akismet/akismet.php\";s:3:\"5.7\";s:33:\"classic-editor/classic-editor.php\";s:5:\"1.7.0\";s:43:\"custom-post-type-ui/custom-post-type-ui.php\";s:6:\"1.19.2\";s:9:\"hello.php\";s:5:\"1.7.2\";}}', 'off');

-- --------------------------------------------------------

--
-- Structure de la table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_edit_lock', '1786103198:2'),
(6, 9, '_edit_last', '2'),
(7, 9, '_wp_page_template', 'default'),
(8, 9, '_edit_lock', '1786103579:2'),
(9, 11, '_edit_last', '1'),
(10, 11, '_wp_page_template', 'default'),
(11, 11, '_edit_lock', '1784718945:1'),
(12, 13, '_edit_last', '1'),
(13, 13, '_wp_page_template', 'default'),
(14, 13, '_edit_lock', '1785872678:2'),
(15, 15, '_edit_last', '1'),
(16, 15, '_wp_page_template', 'default'),
(17, 15, '_edit_lock', '1784719306:1'),
(18, 17, '_edit_last', '2'),
(19, 17, '_wp_page_template', 'default'),
(20, 17, '_edit_lock', '1786104021:2'),
(21, 19, '_edit_last', '1'),
(22, 19, '_wp_page_template', 'default'),
(23, 19, '_edit_lock', '1784719378:1'),
(24, 2, '_wp_trash_meta_status', 'publish'),
(25, 2, '_wp_trash_meta_time', '1784719541'),
(26, 2, '_wp_desired_post_slug', 'page-d-exemple'),
(27, 3, '_wp_trash_meta_status', 'draft'),
(28, 3, '_wp_trash_meta_time', '1784719542'),
(29, 3, '_wp_desired_post_slug', 'politique-de-confidentialite'),
(30, 23, '_edit_last', '1'),
(31, 23, '_wp_page_template', 'default'),
(32, 23, '_edit_lock', '1785870883:2'),
(33, 25, '_edit_last', '1'),
(34, 25, '_edit_lock', '1784720574:1'),
(35, 25, '_wp_page_template', 'default'),
(36, 31, '_edit_last', '1'),
(37, 31, '_edit_lock', '1784808249:1'),
(38, 36, '_edit_last', '1'),
(39, 36, '_edit_lock', '1784809509:1'),
(40, 38, '_edit_last', '1'),
(41, 38, '_edit_lock', '1784810978:1'),
(42, 40, '_edit_last', '1'),
(43, 40, '_edit_lock', '1785871065:2'),
(44, 42, '_edit_last', '1'),
(45, 42, '_edit_lock', '1784813388:1'),
(46, 45, '_edit_last', '1'),
(47, 45, '_edit_lock', '1785388799:1'),
(48, 47, '_edit_last', '1'),
(49, 47, '_edit_lock', '1785388876:1'),
(50, 49, '_edit_last', '1'),
(51, 49, '_edit_lock', '1785406664:1'),
(52, 51, '_edit_last', '1'),
(53, 51, '_edit_lock', '1785407400:1'),
(54, 53, '_edit_last', '1'),
(55, 53, '_edit_lock', '1785409399:1'),
(56, 55, '_edit_last', '1'),
(57, 55, '_edit_lock', '1785409912:1'),
(58, 57, '_edit_last', '2'),
(59, 57, '_edit_lock', '1786038290:2'),
(60, 59, '_edit_last', '2'),
(61, 59, '_edit_lock', '1786101610:2'),
(62, 61, '_edit_last', '1'),
(63, 61, '_edit_lock', '1785808067:1'),
(64, 67, '_edit_last', '1'),
(65, 67, '_edit_lock', '1785870871:2'),
(66, 71, '_wp_attached_file', '2026/08/about-4-1.jpg'),
(67, 71, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:800;s:6:\"height\";i:1000;s:4:\"file\";s:21:\"2026/08/about-4-1.jpg\";s:8:\"filesize\";i:95368;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(68, 67, 'director_image', ''),
(69, 67, '_director_image', 'field_6a7143c99da3e'),
(70, 67, 'director_title', 'Direction Générale'),
(71, 67, '_director_title', 'field_6a7143fb9da3f'),
(72, 67, 'director_message', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.'),
(73, 67, '_director_message', 'field_6a71441b9da41'),
(74, 67, 'director_quote', '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés.'),
(75, 67, '_director_quote', 'field_6a7144219da42'),
(76, 67, 'director_name', 'Adanlete Manivelle '),
(77, 67, '_director_name', 'field_6a7144edf7326'),
(78, 67, 'director_role', 'Directeur général'),
(79, 67, '_director_role', 'field_6a71451c1196c'),
(80, 72, 'director_image', '71'),
(81, 72, '_director_image', 'field_6a7143c99da3e'),
(82, 72, 'director_title', 'Direction Générale'),
(83, 72, '_director_title', 'field_6a7143fb9da3f'),
(84, 72, 'director_message', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.'),
(85, 72, '_director_message', 'field_6a71441b9da41'),
(86, 72, 'director_quote', '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés.'),
(87, 72, '_director_quote', 'field_6a7144219da42'),
(88, 72, 'director_name', 'Adanlete Manivelle '),
(89, 72, '_director_name', 'field_6a7144edf7326'),
(90, 72, 'director_role', 'Directeur général'),
(91, 72, '_director_role', 'field_6a71451c1196c'),
(92, 67, '_thumbnail_id', '71'),
(93, 73, 'director_image', ''),
(94, 73, '_director_image', 'field_6a7143c99da3e'),
(95, 73, 'director_title', 'Direction gbongblooo'),
(96, 73, '_director_title', 'field_6a7143fb9da3f'),
(97, 73, 'director_message', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.'),
(98, 73, '_director_message', 'field_6a71441b9da41'),
(99, 73, 'director_quote', '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés.'),
(100, 73, '_director_quote', 'field_6a7144219da42'),
(101, 73, 'director_name', 'Adanlete Manivelle '),
(102, 73, '_director_name', 'field_6a7144edf7326'),
(103, 73, 'director_role', 'Directeur général'),
(104, 73, '_director_role', 'field_6a71451c1196c'),
(105, 74, 'director_image', ''),
(106, 74, '_director_image', 'field_6a7143c99da3e'),
(107, 74, 'director_title', 'Direction Générale'),
(108, 74, '_director_title', 'field_6a7143fb9da3f'),
(109, 74, 'director_message', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.'),
(110, 74, '_director_message', 'field_6a71441b9da41'),
(111, 74, 'director_quote', '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés.'),
(112, 74, '_director_quote', 'field_6a7144219da42'),
(113, 74, 'director_name', 'Adanlete Manivelle '),
(114, 74, '_director_name', 'field_6a7144edf7326'),
(115, 74, 'director_role', 'Directeur général'),
(116, 74, '_director_role', 'field_6a71451c1196c'),
(117, 1, '_wp_trash_meta_status', 'publish'),
(118, 1, '_wp_trash_meta_time', '1785810010'),
(119, 1, '_wp_desired_post_slug', 'bonjour-tout-le-monde'),
(120, 1, '_wp_trash_meta_comments_status', 'a:1:{i:1;s:1:\"1\";}'),
(121, 76, '_edit_last', '1'),
(122, 76, '_edit_lock', '1785810039:1'),
(123, 77, '_wp_attached_file', '2026/08/article1.jpg'),
(124, 77, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1600;s:6:\"height\";i:720;s:4:\"file\";s:20:\"2026/08/article1.jpg\";s:8:\"filesize\";i:545959;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(125, 76, '_thumbnail_id', '77'),
(130, 76, '_wp_old_date', '2026-08-04'),
(131, 79, '_edit_last', '1'),
(132, 79, '_edit_lock', '1785871131:2'),
(133, 80, '_wp_attached_file', '2026/08/article2.jpeg'),
(134, 80, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1280;s:6:\"height\";i:852;s:4:\"file\";s:21:\"2026/08/article2.jpeg\";s:8:\"filesize\";i:198417;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(135, 79, '_thumbnail_id', '80'),
(138, 82, '_edit_last', '1'),
(139, 82, '_edit_lock', '1785872621:2'),
(140, 83, '_wp_attached_file', '2026/08/article3.jpg'),
(141, 83, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1167;s:6:\"height\";i:774;s:4:\"file\";s:20:\"2026/08/article3.jpg\";s:8:\"filesize\";i:289417;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(142, 82, '_thumbnail_id', '83'),
(145, 82, '_wp_old_date', '2026-08-04'),
(150, 79, '_wp_old_date', '2026-08-04'),
(151, 86, '_edit_last', '1'),
(152, 86, '_edit_lock', '1785811676:1'),
(153, 87, '_wp_attached_file', '2026/08/projet1.jpeg'),
(154, 87, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:600;s:6:\"height\";i:400;s:4:\"file\";s:20:\"2026/08/projet1.jpeg\";s:8:\"filesize\";i:135420;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(155, 86, '_thumbnail_id', '87'),
(156, 88, '_edit_last', '1'),
(157, 88, '_edit_lock', '1785811563:1'),
(158, 89, '_wp_attached_file', '2026/08/projet2.jpeg'),
(159, 89, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:600;s:6:\"height\";i:400;s:4:\"file\";s:20:\"2026/08/projet2.jpeg\";s:8:\"filesize\";i:55033;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(160, 88, '_thumbnail_id', '89'),
(161, 90, '_edit_last', '1'),
(162, 90, '_edit_lock', '1785811457:1'),
(163, 91, '_wp_attached_file', '2026/08/projet3.jpeg'),
(164, 91, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:600;s:6:\"height\";i:400;s:4:\"file\";s:20:\"2026/08/projet3.jpeg\";s:8:\"filesize\";i:126424;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(165, 90, '_thumbnail_id', '91'),
(166, 93, '_edit_last', '1'),
(167, 93, '_edit_lock', '1785811449:1'),
(168, 94, '_wp_attached_file', '2026/08/projet1-1.jpeg'),
(169, 94, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:600;s:6:\"height\";i:400;s:4:\"file\";s:22:\"2026/08/projet1-1.jpeg\";s:8:\"filesize\";i:135420;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(170, 93, '_thumbnail_id', '94'),
(171, 93, '_projet_statut', 'en-cours'),
(172, 93, '_projet_location', 'Région des savanes'),
(173, 95, '_edit_last', '1'),
(174, 95, '_edit_lock', '1785811517:1'),
(175, 95, '_thumbnail_id', '89'),
(176, 95, '_projet_statut', 'en-cours'),
(177, 95, '_projet_location', 'Région des plateaux'),
(178, 96, '_edit_last', '1'),
(179, 96, '_edit_lock', '1785870842:2'),
(180, 96, '_thumbnail_id', '91'),
(181, 96, '_projet_statut', 'en-cours'),
(182, 96, '_projet_location', 'Région des savanes'),
(183, 97, '_edit_last', '1'),
(184, 97, '_edit_lock', '1785812081:1'),
(185, 98, '_edit_last', '1'),
(186, 98, '_edit_lock', '1785812128:1'),
(187, 99, '_edit_last', '1'),
(188, 99, '_edit_lock', '1785812153:1'),
(189, 100, '_edit_last', '1'),
(190, 100, '_edit_lock', '1785812224:1'),
(191, 101, '_edit_last', '1'),
(192, 101, '_edit_lock', '1785872631:2'),
(193, 103, '_edit_last', '1'),
(194, 103, '_edit_lock', '1786050716:2'),
(195, 104, '_wp_attached_file', '2026/08/partenaire2.jpeg'),
(196, 104, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:289;s:6:\"height\";i:202;s:4:\"file\";s:24:\"2026/08/partenaire2.jpeg\";s:8:\"filesize\";i:11100;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(197, 103, '_thumbnail_id', '104'),
(198, 106, '_wp_attached_file', '2026/08/partenaire1.jpeg'),
(199, 106, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:289;s:6:\"height\";i:217;s:4:\"file\";s:24:\"2026/08/partenaire1.jpeg\";s:8:\"filesize\";i:14960;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(200, 105, '_edit_last', '1'),
(201, 105, '_thumbnail_id', '106'),
(202, 105, '_edit_lock', '1785812750:1'),
(203, 108, '_wp_attached_file', '2026/08/partenaire3.jpg'),
(204, 108, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:426;s:6:\"height\";i:266;s:4:\"file\";s:23:\"2026/08/partenaire3.jpg\";s:8:\"filesize\";i:15690;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(205, 107, '_edit_last', '1'),
(206, 107, '_thumbnail_id', '108'),
(207, 107, '_edit_lock', '1785812949:1'),
(208, 111, '_wp_attached_file', '2026/08/Reglement-Interieur-du-Personnel-TGF.pdf'),
(209, 111, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:300167;}'),
(210, 112, '_wp_attached_file', '2026/08/Charte-éthique-et-déontologique-TGF-06072026.pdf'),
(211, 112, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:216931;}'),
(212, 113, '_wp_attached_file', '2026/08/decret-n°-2026-086-PC-du-6-mai-fixant-les-attributions-le-fonctionnement-de-TOGO-GREEN-FUND.pdf'),
(213, 113, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:3248031;}'),
(214, 114, '_wp_attached_file', '2026/08/Note_Strategique_FVT.pdf'),
(215, 114, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:693265;}'),
(216, 115, '_wp_attached_file', '2026/08/ORGANIGRAMME_TGF_VF.pdf'),
(217, 115, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:104906;}'),
(218, 116, '_wp_attached_file', '2026/08/Projet-darrêté-portant-attributions-et-structures-de-la-gouvernance-du-TGF-06072026.pdf'),
(219, 116, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:278755;}'),
(220, 117, '_wp_attached_file', '2026/08/Projet-de-Manuel-de-politique-et-de-procédure-de-vérification-de-conformite-TGF-06072026.pdf'),
(221, 117, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:588005;}'),
(222, 118, '_wp_attached_file', '2026/08/Projet-de-manuel-de-procedures-et-comptables-TGF-06072026.pdf'),
(223, 118, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:739446;}'),
(224, 119, '_wp_attached_file', '2026/08/Projet-de-politique-générale-du-TGF-06072026.pdf'),
(225, 119, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:415365;}'),
(226, 120, '_wp_attached_file', '2026/08/Projet-de-règlement-intérieur-06072026.pdf'),
(227, 120, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:313498;}'),
(228, 121, '_wp_attached_file', '2026/08/Projet-de-statuts-revisé-TGF-06072026.pdf'),
(229, 121, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:557947;}'),
(230, 122, '_wp_attached_file', '2026/08/Projet-de-strategie-de-financement-TGF-06072026.pdf'),
(231, 122, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:557299;}'),
(232, 123, '_wp_attached_file', '2026/08/Reglement-Interieur-du-Personnel-TGF-1.pdf'),
(233, 123, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:300167;}'),
(247, 130, '_wp_attached_file', '2026/08/Manuel-Politique-Administrative-et-ComptableTGF.pdf'),
(248, 130, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:396192;}'),
(249, 131, '_wp_attached_file', '2026/08/Politique-Enquete-et-SanctionTGF.pdf'),
(250, 131, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:366773;}'),
(251, 132, '_wp_attached_file', '2026/08/Politique-Denonciation-et-ProtectionTGF.pdf'),
(252, 132, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:368018;}'),
(253, 133, '_wp_attached_file', '2026/08/Politique-Lutte-Fraude-CorruptionTGF.pdf'),
(254, 133, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:384940;}'),
(255, 134, '_wp_attached_file', '2026/08/Politique-de-GouvernanceTGF.pdf'),
(256, 134, '_wp_attachment_metadata', 'a:1:{s:8:\"filesize\";i:378944;}'),
(257, 135, '_edit_lock', '1786102904:2'),
(258, 135, '_edit_last', '2'),
(259, 135, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(260, 137, '_edit_lock', '1786102394:2'),
(261, 137, '_edit_last', '2'),
(262, 137, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(263, 139, '_edit_lock', '1785884879:2'),
(264, 139, '_edit_last', '2'),
(265, 139, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(266, 141, '_edit_lock', '1785884759:2'),
(267, 139, '_wp_trash_meta_status', 'publish'),
(268, 139, '_wp_trash_meta_time', '1785885020'),
(269, 139, '_wp_desired_post_slug', 'energie-et-infrastructure'),
(270, 143, '_edit_lock', '1786102438:2'),
(271, 143, '_edit_last', '2'),
(272, 143, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(273, 57, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(274, 146, '_edit_lock', '1786057419:2'),
(275, 146, '_edit_last', '2'),
(276, 146, '_fvt_doc_categorie', 'politique'),
(277, 146, '_fvt_doc_type', ''),
(278, 146, '_fvt_doc_format', 'PDF'),
(279, 146, '_fvt_doc_taille', '1 Mo'),
(280, 146, '_fvt_doc_date', '06 août 2026'),
(281, 146, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-de-GouvernanceTGF.pdf'),
(282, 146, '_fvt_doc_description', ''),
(283, 147, '_edit_lock', '1786038659:2'),
(284, 148, '_edit_lock', '1786051509:2'),
(285, 149, '_edit_lock', '1786053339:2'),
(286, 150, '_wp_attached_file', '2026/08/slider-4-1.jpg'),
(287, 150, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:22:\"2026/08/slider-4-1.jpg\";s:8:\"filesize\";i:476444;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(288, 151, '_edit_lock', '1786057572:2'),
(289, 151, '_edit_last', '2'),
(290, 151, '_fvt_doc_categorie', 'politique'),
(291, 151, '_fvt_doc_type', ''),
(292, 151, '_fvt_doc_format', 'PDF'),
(293, 151, '_fvt_doc_taille', '1 Mo'),
(294, 151, '_fvt_doc_date', '05 août 2026'),
(295, 151, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Lutte-Fraude-CorruptionTGF.pdf'),
(296, 151, '_fvt_doc_description', ''),
(297, 153, '_edit_lock', '1786056098:2'),
(298, 153, '_edit_last', '2'),
(299, 153, '_fvt_doc_categorie', 'politique'),
(300, 153, '_fvt_doc_type', 'rapport'),
(301, 153, '_fvt_doc_format', 'PDF'),
(302, 153, '_fvt_doc_taille', '1 Mo'),
(303, 153, '_fvt_doc_date', '05 août 2026'),
(304, 153, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Denonciation-et-ProtectionTGF.pdf'),
(305, 153, '_fvt_doc_description', ''),
(306, 154, '_edit_lock', '1786056391:2'),
(307, 154, '_edit_last', '2'),
(308, 154, '_fvt_doc_categorie', 'politique'),
(309, 154, '_fvt_doc_type', ''),
(310, 154, '_fvt_doc_format', 'PDF'),
(311, 154, '_fvt_doc_taille', '3 Mo'),
(312, 154, '_fvt_doc_date', '05 août 2026'),
(313, 154, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Enquete-et-SanctionTGF.pdf'),
(314, 154, '_fvt_doc_description', ''),
(315, 155, '_edit_lock', '1786056734:2'),
(316, 155, '_edit_last', '2'),
(317, 155, '_fvt_doc_categorie', 'decret'),
(318, 155, '_fvt_doc_type', 'publication'),
(319, 155, '_fvt_doc_format', 'PDF'),
(320, 155, '_fvt_doc_taille', '2 Mo'),
(321, 155, '_fvt_doc_date', '05 août 2026'),
(322, 155, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/decret-n°-2026-086-PC-du-6-mai-fixant-les-attributions-le-fonctionnement-de-TOGO-GREEN-FUND.pdf'),
(323, 155, '_fvt_doc_description', ''),
(324, 156, '_edit_lock', '1786057277:2'),
(325, 156, '_edit_last', '2'),
(326, 156, '_fvt_doc_categorie', 'arreté'),
(327, 156, '_fvt_doc_type', ''),
(328, 156, '_fvt_doc_format', 'PDF'),
(329, 156, '_fvt_doc_taille', '2 Mo'),
(330, 156, '_fvt_doc_date', '06 août 2026'),
(331, 156, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-darrêté-portant-attributions-et-structures-de-la-gouvernance-du-TGF-06072026.pdf'),
(332, 156, '_fvt_doc_description', ''),
(333, 157, '_edit_lock', '1786057387:2'),
(334, 158, '_edit_lock', '1786057400:2'),
(335, 159, '_edit_lock', '1786057347:2'),
(336, 159, '_edit_last', '2'),
(337, 159, '_fvt_doc_categorie', 'charte'),
(338, 159, '_fvt_doc_type', ''),
(339, 159, '_fvt_doc_format', 'PDF'),
(340, 159, '_fvt_doc_taille', '3 Mo'),
(341, 159, '_fvt_doc_date', '06 août 2026'),
(342, 159, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Charte-éthique-et-déontologique-TGF-06072026.pdf'),
(343, 159, '_fvt_doc_description', ''),
(344, 160, '_edit_lock', '1786059881:2'),
(345, 160, '_edit_last', '2'),
(346, 160, '_fvt_doc_categorie', 'organigramme'),
(347, 160, '_fvt_doc_type', ''),
(348, 160, '_fvt_doc_format', 'PDF'),
(349, 160, '_fvt_doc_taille', '1 Mo'),
(350, 160, '_fvt_doc_date', '05 août 2026'),
(351, 160, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/ORGANIGRAMME_TGF_VF.pdf'),
(352, 160, '_fvt_doc_description', ''),
(353, 161, '_edit_lock', '1786060008:2'),
(354, 161, '_edit_last', '2'),
(355, 161, '_fvt_doc_categorie', 'note'),
(356, 161, '_fvt_doc_type', ''),
(357, 161, '_fvt_doc_format', 'PDF'),
(358, 161, '_fvt_doc_taille', '1 Mo'),
(359, 161, '_fvt_doc_date', '06 août 2026'),
(360, 161, '_fvt_doc_url', 'http://localhost/fondvert/wp-content/uploads/2026/08/Note_Strategique_FVT.pdf'),
(361, 161, '_fvt_doc_description', ''),
(362, 162, '_edit_lock', '1786060800:2'),
(363, 59, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(364, 163, '_edit_lock', '1786061443:2'),
(365, 163, '_edit_last', '2'),
(366, 163, '_fvt_communique_date', '07 août 2026'),
(367, 163, '_fvt_communique_resume', 'ML.IK?JNYHBTVRomliku-,jyhtbgrve'),
(368, 163, '_fvt_communique_document', ''),
(369, 165, '_edit_lock', '1786101928:2'),
(370, 165, '_edit_last', '2'),
(371, 165, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(372, 137, '_fvt_eau_chiffres', 'a:1:{s:6:\"12 000\";s:15:\"Bénéficiaires\";}'),
(373, 137, '_fvt_eau_projets', 'a:0:{}'),
(374, 7, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(375, 9, '_fvt_domaines', 'a:3:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}i:1;a:4:{s:4:\"icon\";s:0:\"\";s:5:\"title\";s:27:\"Gestion durable des forêts\";s:4:\"desc\";s:27:\"Gestion durable des forêts\";s:4:\"link\";s:1:\"#\";}i:2;a:4:{s:4:\"icon\";s:0:\"\";s:5:\"title\";s:32:\"Conservation de la biodiversité\";s:4:\"desc\";s:68:\"Protection des aires protégées Conservation des espèces menacées\";s:4:\"link\";s:1:\"#\";}}'),
(376, 171, '_edit_lock', '1786103675:2'),
(377, 171, '_edit_last', '2'),
(378, 171, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(379, 171, '_wp_trash_meta_status', 'publish'),
(380, 171, '_wp_trash_meta_time', '1786103951'),
(381, 171, '_wp_desired_post_slug', 'projet'),
(382, 17, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(383, 173, '_edit_lock', '1786104249:2'),
(384, 173, '_edit_last', '2'),
(385, 173, '_fvt_domaines', 'a:1:{i:0;a:4:{s:4:\"icon\";s:11:\"fa-seedling\";s:5:\"title\";s:19:\"Agriculture durable\";s:4:\"desc\";s:46:\"Promotion de pratiques agricoles résilientes.\";s:4:\"link\";s:1:\"#\";}}'),
(386, 176, '_edit_lock', '1786107334:2'),
(387, 176, '_edit_last', '2'),
(388, 177, '_wp_attached_file', '2026/08/bad.png'),
(389, 177, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:598;s:6:\"height\";i:161;s:4:\"file\";s:15:\"2026/08/bad.png\";s:8:\"filesize\";i:72634;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(390, 178, '_wp_attached_file', '2026/08/banque-mondiale.png'),
(391, 178, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1536;s:6:\"height\";i:864;s:4:\"file\";s:27:\"2026/08/banque-mondiale.png\";s:8:\"filesize\";i:79954;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(392, 179, '_wp_attached_file', '2026/08/boad.jpg'),
(393, 179, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:400;s:6:\"height\";i:400;s:4:\"file\";s:16:\"2026/08/boad.jpg\";s:8:\"filesize\";i:18510;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(394, 180, '_wp_attached_file', '2026/08/gef.jpg'),
(395, 180, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1200;s:6:\"height\";i:675;s:4:\"file\";s:15:\"2026/08/gef.jpg\";s:8:\"filesize\";i:17627;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(396, 181, '_wp_attached_file', '2026/08/GGGITG.jpg'),
(397, 181, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:18:\"2026/08/GGGITG.jpg\";s:8:\"filesize\";i:84320;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(398, 182, '_wp_attached_file', '2026/08/giz.jpg'),
(399, 182, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:450;s:6:\"height\";i:253;s:4:\"file\";s:15:\"2026/08/giz.jpg\";s:8:\"filesize\";i:13693;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(400, 183, '_wp_attached_file', '2026/08/logomerf.png'),
(401, 183, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:521;s:6:\"height\";i:561;s:4:\"file\";s:20:\"2026/08/logomerf.png\";s:8:\"filesize\";i:70894;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(402, 184, '_wp_attached_file', '2026/08/pnud.jpg'),
(403, 184, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:750;s:6:\"height\";i:430;s:4:\"file\";s:16:\"2026/08/pnud.jpg\";s:8:\"filesize\";i:35134;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(404, 105, '_wp_trash_meta_status', 'publish'),
(405, 105, '_wp_trash_meta_time', '1786107444'),
(406, 105, '_wp_desired_post_slug', 'pnud'),
(407, 176, '_thumbnail_id', '183'),
(408, 185, '_edit_lock', '1786107353:2'),
(409, 185, '_edit_last', '2'),
(410, 185, '_thumbnail_id', '182'),
(411, 186, '_edit_lock', '1786107372:2'),
(412, 186, '_edit_last', '2'),
(413, 186, '_thumbnail_id', '184'),
(414, 187, '_edit_lock', '1786107391:2'),
(415, 187, '_edit_last', '2'),
(416, 187, '_thumbnail_id', '181'),
(417, 188, '_edit_lock', '1786107408:2'),
(418, 188, '_edit_last', '2'),
(419, 188, '_thumbnail_id', '178'),
(420, 189, '_edit_lock', '1786107428:2'),
(421, 189, '_edit_last', '2'),
(422, 189, '_thumbnail_id', '179'),
(423, 190, '_edit_lock', '1786107464:2'),
(424, 190, '_edit_last', '2'),
(425, 190, '_thumbnail_id', '177'),
(426, 192, '_edit_last', '2'),
(427, 192, '_edit_lock', '1786107800:2'),
(428, 192, '_thumbnail_id', '180'),
(429, 193, '_edit_lock', '1786108080:2'),
(430, 193, '_edit_last', '2'),
(431, 194, '_wp_attached_file', '2026/08/Finance.jpg'),
(432, 194, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:474;s:6:\"height\";i:369;s:4:\"file\";s:19:\"2026/08/Finance.jpg\";s:8:\"filesize\";i:16573;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(433, 195, '_wp_attached_file', '2026/08/giz2.jpg'),
(434, 195, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:474;s:6:\"height\";i:248;s:4:\"file\";s:16:\"2026/08/giz2.jpg\";s:8:\"filesize\";i:13921;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(435, 196, '_wp_attached_file', '2026/08/luxdev.jpeg'),
(436, 196, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:648;s:6:\"height\";i:400;s:4:\"file\";s:19:\"2026/08/luxdev.jpeg\";s:8:\"filesize\";i:14554;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(437, 197, '_wp_attached_file', '2026/08/UE.jpg'),
(438, 197, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:474;s:6:\"height\";i:316;s:4:\"file\";s:14:\"2026/08/UE.jpg\";s:8:\"filesize\";i:11134;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}'),
(439, 198, '_edit_lock', '1786108027:2'),
(440, 198, '_edit_last', '2'),
(441, 198, '_thumbnail_id', '194'),
(442, 199, '_edit_lock', '1786108049:2'),
(443, 199, '_edit_last', '2'),
(444, 199, '_thumbnail_id', '197'),
(445, 193, '_thumbnail_id', '195'),
(446, 200, '_edit_lock', '1786108114:2'),
(447, 200, '_edit_last', '2'),
(448, 200, '_thumbnail_id', '196'),
(449, 201, '_wp_trash_meta_status', 'publish'),
(450, 201, '_wp_trash_meta_time', '1786114875');

-- --------------------------------------------------------

--
-- Structure de la table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2026-07-22 12:28:23', '2026-07-22 10:28:23', '<!-- wp:paragraph -->\n<p>Bienvenue sur WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis commencez à écrire !</p>\n<!-- /wp:paragraph -->', 'Bonjour tout le monde !', '', 'trash', 'open', 'open', '', 'bonjour-tout-le-monde__trashed', '', '', '2026-08-04 04:20:10', '2026-08-04 02:20:10', '', 0, 'http://localhost/fondvert/?p=1', 0, 'post', '', 1),
(2, 1, '2026-07-22 12:28:23', '2026-07-22 10:28:23', '<!-- wp:paragraph -->\n<p>Ceci est une page d’exemple. C’est différent d’un article de blog parce qu’elle restera au même endroit et apparaîtra dans la navigation de votre site (dans la plupart des thèmes). La plupart des gens commencent par une page « À propos » qui les présente aux personnes visitant le site. Cela pourrait ressembler à quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>Bonjour ! Je suis un mécanicien qui aspire à devenir acteur, et voici mon site. J’habite à Bordeaux, j’ai un super chien baptisé Russell, et j’aime la vodka (ainsi qu’être surpris par la pluie soudaine lors de longues balades sur la plage au coucher du soleil).</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>…ou quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>La société 123 Machin Truc a été créée en 1971, et n’a cessé de proposer au public des machins-trucs de qualité depuis lors. Située à Saint-Remy-en-Bouzemont-Saint-Genest-et-Isson, 123 Machin Truc emploie 2 000 personnes, et fabrique toutes sortes de bidules supers pour la communauté bouzemontoise.</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>En tant que nouvel utilisateur ou utilisatrice de WordPress, vous devriez vous rendre sur <a href=\"http://localhost/fondvert/wp-admin/\">votre tableau de bord</a> pour supprimer cette page et créer de nouvelles pages pour votre contenu. Amusez-vous bien !</p>\n<!-- /wp:paragraph -->', 'Page d’exemple', '', 'trash', 'closed', 'open', '', 'page-d-exemple__trashed', '', '', '2026-07-22 13:25:41', '2026-07-22 11:25:41', '', 0, 'http://localhost/fondvert/?page_id=2', 0, 'page', '', 0),
(3, 1, '2026-07-22 12:28:23', '2026-07-22 10:28:23', '<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Qui sommes-nous ?</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>L’adresse de notre site est : http://localhost/fondvert.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Commentaires</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Quand vous laissez un commentaire sur notre site, les données inscrites dans le formulaire de commentaire, ainsi que votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Une chaîne anonymisée créée à partir de votre adresse e-mail (également appelée hash) peut être envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du service Gravatar sont disponibles ici : https://automattic.com/privacy/. Après validation de votre commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Médias</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous téléversez des images sur le site, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de coordonnées GPS. Les personnes visitant votre site peuvent télécharger et extraire des données de localisation depuis ces images.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Cookies</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous déposez un commentaire sur notre site, il vous sera proposé d’enregistrer votre nom, adresse e-mail et site dans des cookies. C’est uniquement pour votre confort afin de ne pas avoir à saisir ces informations si vous déposez un autre commentaire plus tard. Ces cookies expirent au bout d’un an.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Si vous vous rendez sur la page de connexion, un cookie temporaire sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et sera supprimé automatiquement à la fermeture de votre navigateur.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations de connexion et vos préférences d’écran. La durée de vie d’un cookie de connexion est de deux jours, celle d’un cookie d’option d’écran est d’un an. Si vous cochez « Se souvenir de moi », votre cookie de connexion sera conservé pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>En modifiant ou en publiant une publication, un cookie supplémentaire sera enregistré dans votre navigateur. Ce cookie ne comprend aucune donnée personnelle. Il indique simplement l’ID de la publication que vous venez de modifier. Il expire au bout d’un jour.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Contenu embarqué depuis d’autres sites</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les articles de ce site peuvent inclure des contenus intégrés (par exemple des vidéos, images, articles…). Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur leur site web.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Utilisation et transmission de vos données personnelles</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous demandez une réinitialisation de votre mot de passe, votre adresse IP sera incluse dans l’e-mail de réinitialisation.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Durées de stockage de vos données</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver automatiquement les commentaires suivants au lieu de les laisser dans la file de modération.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Pour les comptes qui s’inscrivent sur notre site (le cas échéant), nous stockons également les données personnelles indiquées dans leur profil. Tous les comptes peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment (à l’exception de leur identifiant). Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Les droits que vous avez sur vos données</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de sécurité.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Où vos données sont envoyées</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les commentaires des visiteurs peuvent être vérifiés à l’aide d’un service automatisé de détection des commentaires indésirables.</p>\n<!-- /wp:paragraph -->\n', 'Politique de confidentialité', '', 'trash', 'closed', 'open', '', 'politique-de-confidentialite__trashed', '', '', '2026-07-22 13:25:42', '2026-07-22 11:25:42', '', 0, 'http://localhost/fondvert/?page_id=3', 0, 'page', '', 0),
(4, 0, '2026-07-22 12:28:38', '2026-07-22 10:28:38', '<!-- wp:page-list /-->', 'Navigation', '', 'publish', 'closed', 'closed', '', 'navigation', '', '', '2026-07-22 12:28:38', '2026-07-22 10:28:38', '', 0, 'http://localhost/fondvert/index.php/2026/07/22/navigation/', 0, 'wp_navigation', '', 0),
(5, 0, '2026-07-22 12:28:38', '2026-07-22 10:28:38', '<!-- wp:page-list /-->', 'Navigation', '', 'publish', 'closed', 'closed', '', 'navigation', '', '', '2026-07-22 12:28:38', '2026-07-22 10:28:38', '', 0, 'http://localhost/fondvert/2026/07/22/navigation/', 0, 'wp_navigation', '', 0),
(7, 1, '2026-07-22 13:09:06', '2026-07-22 11:09:06', '<p class=\"PDq2pG_selectionAnchorContainer\" data-start=\"97\" data-end=\"341\">Le TGF constitue un guichet unique national de mobilisation, de centralisation, de gestion et d’allocation des ressources destinées notamment au financement des actions en faveur de la protection de l’environnement et du climat.</p>\r\n<p class=\"\" data-start=\"346\" data-end=\"391\"><strong data-start=\"346\" data-end=\"391\">A ce titre, il est chargé notamment, de :</strong></p>\r\n\r\n<ul data-start=\"396\" data-end=\"2513\" data-is-last-node=\"\">\r\n 	<li data-section-id=\"15hm68w\" data-start=\"396\" data-end=\"602\">Développer de façon participative les instruments juridiques et stratégiques de mobilisation de ressources et de financement optimal des activités et/ou projets en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1jwcwmp\" data-start=\"607\" data-end=\"683\">Soutenir le processus de réduction des émissions de gaz à effet de serre ;</li>\r\n 	<li data-section-id=\"4j826g\" data-start=\"688\" data-end=\"842\">Prospecter, mobiliser et gérer les ressources financières nationales et internationales destinées à la gestion durable de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1tjln4p\" data-start=\"847\" data-end=\"1165\">Appuyer la mise en œuvre des programmes et projets relatifs à la protection de l’environnement, à la protection côtière, à la gestion durable des forêts et des ressources naturelles, à la lutte contre les effets néfastes des changements climatiques, à l’amélioration du cadre de vie et du bien-être des populations ;</li>\r\n 	<li data-section-id=\"un9rlh\" data-start=\"1170\" data-end=\"1425\">Soutenir la mise en œuvre des politiques publiques nationales, ainsi que les initiatives des collectivités territoriales, du secteur privé, de la société civile et des établissements de recherche, en matière d’environnement et de changement climatique ;</li>\r\n 	<li data-section-id=\"13wrk74\" data-start=\"1430\" data-end=\"1529\">Contribuer à la promotion des transports durables et à l’utilisation des énergies renouvelables ;</li>\r\n 	<li data-section-id=\"oegsi1\" data-start=\"1534\" data-end=\"1695\">Suivre et évaluer l’utilisation des ressources mises à disposition, leurs impacts sur l’environnement et les populations, en vue de renforcer leur résilience ;</li>\r\n 	<li data-section-id=\"fn8te4\" data-start=\"1700\" data-end=\"1903\">Mettre en place un cadre de concertation continue avec les partenaires nationaux et internationaux du développement impliqués dans le financement des mesures en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1oh4c3z\" data-start=\"1908\" data-end=\"2255\">Renforcer et développer les capacités institutionnelles et opérationnelles des partenaires nationaux en matière de l’environnement, des ressources naturelles, de la protection du littoral, de lutte contre les changements climatiques ainsi qu’en matière de prospection et de mobilisation des ressources financières nationales et internationales ;</li>\r\n 	<li data-section-id=\"1q34ofz\" data-start=\"2260\" data-end=\"2399\">Promouvoir les partenariats publics-privés en faveur de la protection de l’environnement et de la lutte contre le changement climatique ;</li>\r\n 	<li data-section-id=\"1ep2rzf\" data-start=\"2404\" data-end=\"2513\" data-is-last-node=\"\">Faciliter l’accès aux mécanismes de financement du marché du carbone.</li>\r\n</ul>', 'Mission', '', 'publish', 'closed', 'closed', '', 'mission', '', '', '2026-08-07 13:48:31', '2026-08-07 11:48:31', '', 0, 'http://localhost/fondvert/?page_id=7', 0, 'page', '', 0),
(8, 1, '2026-07-22 13:09:06', '2026-07-22 11:09:06', '', 'Présentation', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-07-22 13:09:06', '2026-07-22 11:09:06', '', 7, 'http://localhost/fondvert/?p=8', 0, 'revision', '', 0),
(9, 1, '2026-07-22 13:09:25', '2026-07-22 11:09:25', 'Le Togo Green Fund intervient dans des domaines stratégiques visant à promouvoir un développement durable, résilient et inclusif. À travers le financement de projets innovants et à fort impact, le Fonds soutient les initiatives contribuant à la protection de l’environnement, à la lutte contre les changements climatiques, à la préservation des ressources naturelles et à l’amélioration des conditions de vie des populations. Ses interventions couvrent notamment la gestion durable des écosystèmes, les énergies renouvelables, l’agriculture résiliente, la gestion des déchets, la protection des ressources en eau, la conservation de la biodiversité ainsi que le renforcement des capacités des acteurs nationaux et locaux.', 'Champs d\' actions', '', 'publish', 'closed', 'closed', '', 'champs', '', '', '2026-08-07 13:54:15', '2026-08-07 11:54:15', '', 0, 'http://localhost/fondvert/?page_id=9', 0, 'page', '', 0),
(10, 1, '2026-07-22 13:09:25', '2026-07-22 11:09:25', '', 'Gouvernance', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2026-07-22 13:09:25', '2026-07-22 11:09:25', '', 9, 'http://localhost/fondvert/?p=10', 0, 'revision', '', 0),
(11, 1, '2026-07-22 13:18:02', '2026-07-22 11:18:02', '', 'Textes juridiques', '', 'publish', 'closed', 'closed', '', 'textes-juridiques', '', '', '2026-07-22 13:18:02', '2026-07-22 11:18:02', '', 0, 'http://localhost/fondvert/?page_id=11', 0, 'page', '', 0),
(12, 1, '2026-07-22 13:18:02', '2026-07-22 11:18:02', '', 'Textes juridiques', '', 'inherit', 'closed', 'closed', '', '11-revision-v1', '', '', '2026-07-22 13:18:02', '2026-07-22 11:18:02', '', 11, 'http://localhost/fondvert/?p=12', 0, 'revision', '', 0),
(13, 1, '2026-07-22 13:18:22', '2026-07-22 11:18:22', '', 'Equipe', '', 'publish', 'closed', 'closed', '', 'equipe', '', '', '2026-07-23 14:07:04', '2026-07-23 12:07:04', '', 0, 'http://localhost/fondvert/?page_id=13', 0, 'page', '', 0),
(14, 1, '2026-07-22 13:18:22', '2026-07-22 11:18:22', '', 'Mécanismes de financement', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2026-07-22 13:18:22', '2026-07-22 11:18:22', '', 13, 'http://localhost/fondvert/?p=14', 0, 'revision', '', 0),
(15, 1, '2026-07-22 13:23:40', '2026-07-22 11:23:40', '', 'Procédure d\'approbation', '', 'publish', 'closed', 'closed', '', 'procedure-dapprobation', '', '', '2026-07-22 13:23:40', '2026-07-22 11:23:40', '', 0, 'http://localhost/fondvert/?page_id=15', 0, 'page', '', 0),
(16, 1, '2026-07-22 13:23:40', '2026-07-22 11:23:40', '', 'Procédure d\'approbation', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2026-07-22 13:23:40', '2026-07-22 11:23:40', '', 15, 'http://localhost/fondvert/?p=16', 0, 'revision', '', 0),
(17, 1, '2026-07-22 13:24:23', '2026-07-22 11:24:23', '', 'Projets', '', 'publish', 'closed', 'closed', '', 'projets', '', '', '2026-08-07 14:00:34', '2026-08-07 12:00:34', '', 0, 'http://localhost/fondvert/?page_id=17', 0, 'page', '', 0),
(18, 1, '2026-07-22 13:24:23', '2026-07-22 11:24:23', '', 'Appels à projets', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2026-07-22 13:24:23', '2026-07-22 11:24:23', '', 17, 'http://localhost/fondvert/?p=18', 0, 'revision', '', 0),
(19, 1, '2026-07-22 13:24:42', '2026-07-22 11:24:42', '', 'Publications', '', 'publish', 'closed', 'closed', '', 'publications', '', '', '2026-07-22 13:24:42', '2026-07-22 11:24:42', '', 0, 'http://localhost/fondvert/?page_id=19', 0, 'page', '', 0),
(20, 1, '2026-07-22 13:24:42', '2026-07-22 11:24:42', '', 'Publications', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2026-07-22 13:24:42', '2026-07-22 11:24:42', '', 19, 'http://localhost/fondvert/?p=20', 0, 'revision', '', 0),
(21, 1, '2026-07-22 13:25:41', '2026-07-22 11:25:41', '<!-- wp:paragraph -->\n<p>Ceci est une page d’exemple. C’est différent d’un article de blog parce qu’elle restera au même endroit et apparaîtra dans la navigation de votre site (dans la plupart des thèmes). La plupart des gens commencent par une page « À propos » qui les présente aux personnes visitant le site. Cela pourrait ressembler à quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>Bonjour ! Je suis un mécanicien qui aspire à devenir acteur, et voici mon site. J’habite à Bordeaux, j’ai un super chien baptisé Russell, et j’aime la vodka (ainsi qu’être surpris par la pluie soudaine lors de longues balades sur la plage au coucher du soleil).</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>…ou quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\">\n<!-- wp:paragraph -->\n<p>La société 123 Machin Truc a été créée en 1971, et n’a cessé de proposer au public des machins-trucs de qualité depuis lors. Située à Saint-Remy-en-Bouzemont-Saint-Genest-et-Isson, 123 Machin Truc emploie 2 000 personnes, et fabrique toutes sortes de bidules supers pour la communauté bouzemontoise.</p>\n<!-- /wp:paragraph -->\n</blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>En tant que nouvel utilisateur ou utilisatrice de WordPress, vous devriez vous rendre sur <a href=\"http://localhost/fondvert/wp-admin/\">votre tableau de bord</a> pour supprimer cette page et créer de nouvelles pages pour votre contenu. Amusez-vous bien !</p>\n<!-- /wp:paragraph -->', 'Page d’exemple', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2026-07-22 13:25:41', '2026-07-22 11:25:41', '', 2, 'http://localhost/fondvert/?p=21', 0, 'revision', '', 0),
(22, 1, '2026-07-22 13:25:42', '2026-07-22 11:25:42', '<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Qui sommes-nous ?</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>L’adresse de notre site est : http://localhost/fondvert.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Commentaires</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Quand vous laissez un commentaire sur notre site, les données inscrites dans le formulaire de commentaire, ainsi que votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Une chaîne anonymisée créée à partir de votre adresse e-mail (également appelée hash) peut être envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du service Gravatar sont disponibles ici : https://automattic.com/privacy/. Après validation de votre commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Médias</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous téléversez des images sur le site, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de coordonnées GPS. Les personnes visitant votre site peuvent télécharger et extraire des données de localisation depuis ces images.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Cookies</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous déposez un commentaire sur notre site, il vous sera proposé d’enregistrer votre nom, adresse e-mail et site dans des cookies. C’est uniquement pour votre confort afin de ne pas avoir à saisir ces informations si vous déposez un autre commentaire plus tard. Ces cookies expirent au bout d’un an.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Si vous vous rendez sur la page de connexion, un cookie temporaire sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et sera supprimé automatiquement à la fermeture de votre navigateur.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations de connexion et vos préférences d’écran. La durée de vie d’un cookie de connexion est de deux jours, celle d’un cookie d’option d’écran est d’un an. Si vous cochez « Se souvenir de moi », votre cookie de connexion sera conservé pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>En modifiant ou en publiant une publication, un cookie supplémentaire sera enregistré dans votre navigateur. Ce cookie ne comprend aucune donnée personnelle. Il indique simplement l’ID de la publication que vous venez de modifier. Il expire au bout d’un jour.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Contenu embarqué depuis d’autres sites</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les articles de ce site peuvent inclure des contenus intégrés (par exemple des vidéos, images, articles…). Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur leur site web.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Utilisation et transmission de vos données personnelles</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous demandez une réinitialisation de votre mot de passe, votre adresse IP sera incluse dans l’e-mail de réinitialisation.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Durées de stockage de vos données</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver automatiquement les commentaires suivants au lieu de les laisser dans la file de modération.</p>\n<!-- /wp:paragraph -->\n<!-- wp:paragraph -->\n<p>Pour les comptes qui s’inscrivent sur notre site (le cas échéant), nous stockons également les données personnelles indiquées dans leur profil. Tous les comptes peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment (à l’exception de leur identifiant). Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Les droits que vous avez sur vos données</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de sécurité.</p>\n<!-- /wp:paragraph -->\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Où vos données sont envoyées</h2>\n<!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les commentaires des visiteurs peuvent être vérifiés à l’aide d’un service automatisé de détection des commentaires indésirables.</p>\n<!-- /wp:paragraph -->\n', 'Politique de confidentialité', '', 'inherit', 'closed', 'closed', '', '3-revision-v1', '', '', '2026-07-22 13:25:42', '2026-07-22 11:25:42', '', 3, 'http://localhost/fondvert/?p=22', 0, 'revision', '', 0),
(23, 1, '2026-07-22 13:36:00', '2026-07-22 11:36:00', '', 'Actualités', '', 'publish', 'closed', 'closed', '', 'actualites', '', '', '2026-07-22 13:36:00', '2026-07-22 11:36:00', '', 0, 'http://localhost/fondvert/?page_id=23', 0, 'page', '', 0),
(24, 1, '2026-07-22 13:36:00', '2026-07-22 11:36:00', '', 'Actualités', '', 'inherit', 'closed', 'closed', '', '23-revision-v1', '', '', '2026-07-22 13:36:00', '2026-07-22 11:36:00', '', 23, 'http://localhost/fondvert/?p=24', 0, 'revision', '', 0),
(25, 1, '2026-07-22 13:42:36', '2026-07-22 11:42:36', '', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2026-07-22 13:42:36', '2026-07-22 11:42:36', '', 0, 'http://localhost/fondvert/?page_id=25', 0, 'page', '', 0),
(26, 1, '2026-07-22 13:42:36', '2026-07-22 11:42:36', '', 'Contact', '', 'inherit', 'closed', 'closed', '', '25-revision-v1', '', '', '2026-07-22 13:42:36', '2026-07-22 11:42:36', '', 25, 'http://localhost/fondvert/?p=26', 0, 'revision', '', 0),
(27, 1, '2026-07-23 09:07:05', '2026-07-23 07:07:05', '', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-07-23 09:07:05', '2026-07-23 07:07:05', '', 7, 'http://localhost/fondvert/?p=27', 0, 'revision', '', 0),
(28, 1, '2026-07-23 09:15:28', '2026-07-23 07:15:28', 'dolor sit amet, consectetur adipiscing elit. Etiam dapibus nulla nec ante finibus elementum. Vivamus nibh dui, luctus consectetur varius at, finibus ut nisi. Donec auctor, odio sed cursus rutrum, mi nulla consequat nisi, a facilisis leo dui at neque. Vestibulum ac viverra magna. Morbi venenatis non ipsum in sollicitudin. Nulla vel risus interdum, pretium magna quis, placerat velit. Curabitur elementum euismod velit vel luctus. Phasellus elit quam, convallis a pulvinar non, dictum in velit. Nam a sapien nulla. Nam iaculis, risus at ornare mattis, lectus risus hendrerit mauris, nec dignissim orci turpis at ante. Ut arcu ex, maximus vel consequat faucibus, maximus eget lacus. Donec maximus dolor ac nulla viverra, non molestie ipsum vestibulum. Integer lacus massa, egestas ut ex ullamcorper, luctus luctus neque. Nam in quam leo. Donec porta vel ipsum non feugiat. Nulla scelerisque est non lorem efficitur bibendum.\r\n\r\nDonec maximus sapien finibus est scelerisque, suscipit fermentum neque eleifend. Nam blandit sagittis magna, tempor tristique elit bibendum dapibus. Suspendisse non lorem non arcu euismod venenatis sed quis diam. Suspendisse mattis enim ac ante dignissim faucibus. Vestibulum et varius lorem, a suscipit ipsum. Pellentesque rhoncus vitae massa nec dapibus. Aenean sit amet finibus lectus, eu ultrices felis. Donec interdum massa id nisl tristique, id gravida sem aliquet. Aliquam tincidunt ante in tincidunt mattis. Maecenas quis placerat ante. Donec sagittis dignissim posuere. Maecenas et nulla ex. Aliquam eu convallis erat. Sed convallis eros ut nulla placerat tincidunt.\r\n\r\nVivamus interdum ex eu mollis elementum. Vivamus ut vehicula odio. Integer sit amet lacus elementum, tempor leo ut, aliquet quam. Pellentesque condimentum erat eu diam imperdiet, pharetra facilisis nunc maximus. Integer magna eros, mollis at eros ut, blandit aliquam metus. Quisque auctor lectus et diam placerat, eget hendrerit lorem vehicula. Aliquam ut interdum eros. Cras at turpis odio. Mauris tempor eu tortor in feugiat. Sed suscipit maximus sem, porttitor scelerisque augue tincidunt eu. In velit ex, semper sit amet metus in, rutrum porta metus. Fusce orci metus, hendrerit non elementum ut, tincidunt a mauris. Etiam tincidunt, risus ac dignissim vulputate, enim dui egestas arcu, vel fermentum neque odio sit amet velit. Pellentesque lacinia mi quis diam faucibus tincidunt nec sit amet magna. Aenean tempor magna diam, sit amet maximus dui lacinia eu. Donec sed ornare leo.', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-07-23 09:15:28', '2026-07-23 07:15:28', '', 7, 'http://localhost/fondvert/?p=28', 0, 'revision', '', 0),
(29, 1, '2026-07-23 09:18:29', '2026-07-23 07:18:29', '', 'Champs d\' actions', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2026-07-23 09:18:29', '2026-07-23 07:18:29', '', 9, 'http://localhost/fondvert/?p=29', 0, 'revision', '', 0),
(30, 1, '2026-07-23 09:29:32', '2026-07-23 07:29:32', 'Etiam dapibus nulla nec ante finibus elementum. Vivamus nibh dui, luctus consectetur varius at, finibus ut nisi. Donec auctor, odio sed cursus rutrum, mi nulla consequat nisi, a facilisis leo dui at neque. Vestibulum ac viverra magna. Morbi venenatis non ipsum in sollicitudin. Nulla vel risus interdum, pretium magna quis, placerat velit. Curabitur elementum euismod velit vel luctus. Phasellus elit quam, convallis a pulvinar non,', 'Champs d\' actions', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2026-07-23 09:29:32', '2026-07-23 07:29:32', '', 9, 'http://localhost/fondvert/?p=30', 0, 'revision', '', 0),
(31, 1, '2026-07-23 14:00:07', '2026-07-23 12:00:07', '', 'Organigramme', '', 'publish', 'closed', 'closed', '', 'organigramme', '', '', '2026-07-23 14:00:07', '2026-07-23 12:00:07', '', 0, 'http://localhost/fondvert/?page_id=31', 0, 'page', '', 0),
(32, 1, '2026-07-23 14:00:07', '2026-07-23 12:00:07', '', 'Organigramme', '', 'inherit', 'closed', 'closed', '', '31-revision-v1', '', '', '2026-07-23 14:00:07', '2026-07-23 12:00:07', '', 31, 'http://localhost/fondvert/?p=32', 0, 'revision', '', 0),
(33, 1, '2026-07-23 14:07:04', '2026-07-23 12:07:04', '', 'Equipe', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2026-07-23 14:07:04', '2026-07-23 12:07:04', '', 13, 'http://localhost/fondvert/?p=33', 0, 'revision', '', 0),
(34, 1, '2026-07-23 14:13:26', '2026-07-23 12:13:26', '', 'Projets', '', 'inherit', 'closed', 'closed', '', '17-autosave-v1', '', '', '2026-07-23 14:13:26', '2026-07-23 12:13:26', '', 17, 'http://localhost/fondvert/?p=34', 0, 'revision', '', 0),
(35, 1, '2026-07-23 14:18:11', '2026-07-23 12:18:11', '', 'Projets', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2026-07-23 14:18:11', '2026-07-23 12:18:11', '', 17, 'http://localhost/fondvert/?p=35', 0, 'revision', '', 0),
(36, 1, '2026-07-23 14:23:41', '2026-07-23 12:23:41', '', 'Soumettre un projet', '', 'publish', 'closed', 'closed', '', 'soumettre', '', '', '2026-07-23 14:25:09', '2026-07-23 12:25:09', '', 0, 'http://localhost/fondvert/?page_id=36', 0, 'page', '', 0),
(37, 1, '2026-07-23 14:23:41', '2026-07-23 12:23:41', '', 'Soumettre un projet', '', 'inherit', 'closed', 'closed', '', '36-revision-v1', '', '', '2026-07-23 14:23:41', '2026-07-23 12:23:41', '', 36, 'http://localhost/fondvert/?p=37', 0, 'revision', '', 0),
(38, 1, '2026-07-23 14:51:04', '2026-07-23 12:51:04', '', 'Manifester', '', 'publish', 'closed', 'closed', '', 'manifester', '', '', '2026-07-23 14:51:04', '2026-07-23 12:51:04', '', 0, 'http://localhost/fondvert/?page_id=38', 0, 'page', '', 0),
(39, 1, '2026-07-23 14:51:04', '2026-07-23 12:51:04', '', 'Manifester', '', 'inherit', 'closed', 'closed', '', '38-revision-v1', '', '', '2026-07-23 14:51:04', '2026-07-23 12:51:04', '', 38, 'http://localhost/fondvert/?p=39', 0, 'revision', '', 0),
(40, 1, '2026-07-23 15:09:26', '2026-07-23 13:09:26', '', 'Documents', '', 'publish', 'closed', 'closed', '', 'documents', '', '', '2026-07-23 15:09:26', '2026-07-23 13:09:26', '', 0, 'http://localhost/fondvert/?page_id=40', 0, 'page', '', 0),
(41, 1, '2026-07-23 15:09:26', '2026-07-23 13:09:26', '', 'Documents', '', 'inherit', 'closed', 'closed', '', '40-revision-v1', '', '', '2026-07-23 15:09:26', '2026-07-23 13:09:26', '', 40, 'http://localhost/fondvert/?p=41', 0, 'revision', '', 0),
(42, 1, '2026-07-23 15:16:26', '2026-07-23 13:16:26', '', 'Médiathèque', '', 'publish', 'closed', 'closed', '', 'mediatheque', '', '', '2026-07-23 15:16:26', '2026-07-23 13:16:26', '', 0, 'http://localhost/fondvert/?page_id=42', 0, 'page', '', 0),
(43, 1, '2026-07-23 15:16:26', '2026-07-23 13:16:26', '', 'Médiathèque', '', 'inherit', 'closed', 'closed', '', '42-revision-v1', '', '', '2026-07-23 15:16:26', '2026-07-23 13:16:26', '', 42, 'http://localhost/fondvert/?p=43', 0, 'revision', '', 0),
(45, 1, '2026-07-30 07:21:19', '2026-07-30 05:21:19', '', 'Griefs projets', '', 'publish', 'closed', 'closed', '', 'griefs-projets', '', '', '2026-07-30 07:21:19', '2026-07-30 05:21:19', '', 0, 'http://localhost/fondvert/?page_id=45', 0, 'page', '', 0),
(46, 1, '2026-07-30 07:21:19', '2026-07-30 05:21:19', '', 'Griefs projets', '', 'inherit', 'closed', 'closed', '', '45-revision-v1', '', '', '2026-07-30 07:21:19', '2026-07-30 05:21:19', '', 45, 'http://localhost/fondvert/?p=46', 0, 'revision', '', 0),
(47, 1, '2026-07-30 07:23:33', '2026-07-30 05:23:33', '', 'Plaintes', '', 'publish', 'closed', 'closed', '', 'plaintes', '', '', '2026-07-30 07:23:33', '2026-07-30 05:23:33', '', 0, 'http://localhost/fondvert/?page_id=47', 0, 'page', '', 0),
(48, 1, '2026-07-30 07:23:33', '2026-07-30 05:23:33', '', 'Plaintes', '', 'inherit', 'closed', 'closed', '', '47-revision-v1', '', '', '2026-07-30 07:23:33', '2026-07-30 05:23:33', '', 47, 'http://localhost/fondvert/?p=48', 0, 'revision', '', 0),
(49, 1, '2026-07-30 12:18:51', '2026-07-30 10:18:51', '', 'Ministère', '', 'publish', 'closed', 'closed', '', 'ministere', '', '', '2026-07-30 12:18:51', '2026-07-30 10:18:51', '', 0, 'http://localhost/fondvert/?page_id=49', 0, 'page', '', 0),
(50, 1, '2026-07-30 12:18:51', '2026-07-30 10:18:51', '', 'Ministère', '', 'inherit', 'closed', 'closed', '', '49-revision-v1', '', '', '2026-07-30 12:18:51', '2026-07-30 10:18:51', '', 49, 'http://localhost/fondvert/?p=50', 0, 'revision', '', 0),
(51, 1, '2026-07-30 12:32:18', '2026-07-30 10:32:18', '', 'Suivre', '', 'publish', 'closed', 'closed', '', 'suivre', '', '', '2026-07-30 12:32:18', '2026-07-30 10:32:18', '', 0, 'http://localhost/fondvert/?page_id=51', 0, 'page', '', 0),
(52, 1, '2026-07-30 12:32:18', '2026-07-30 10:32:18', '', 'Suivre', '', 'inherit', 'closed', 'closed', '', '51-revision-v1', '', '', '2026-07-30 12:32:18', '2026-07-30 10:32:18', '', 51, 'http://localhost/fondvert/?p=52', 0, 'revision', '', 0),
(53, 1, '2026-07-30 13:05:37', '2026-07-30 11:05:37', '', 'Grands projets', '', 'publish', 'closed', 'closed', '', 'grands-projets', '', '', '2026-07-30 13:05:37', '2026-07-30 11:05:37', '', 0, 'http://localhost/fondvert/?page_id=53', 0, 'page', '', 0),
(54, 1, '2026-07-30 12:58:26', '2026-07-30 10:58:26', '', 'Grands projets', '', 'inherit', 'closed', 'closed', '', '53-revision-v1', '', '', '2026-07-30 12:58:26', '2026-07-30 10:58:26', '', 53, 'http://localhost/fondvert/?p=54', 0, 'revision', '', 0),
(55, 1, '2026-07-30 13:09:44', '2026-07-30 11:09:44', '', 'Réalisations', '', 'publish', 'closed', 'closed', '', 'realisations', '', '', '2026-07-30 13:14:09', '2026-07-30 11:14:09', '', 0, 'http://localhost/fondvert/?page_id=55', 0, 'page', '', 0),
(56, 1, '2026-07-30 13:09:44', '2026-07-30 11:09:44', '', 'Réalisations', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2026-07-30 13:09:44', '2026-07-30 11:09:44', '', 55, 'http://localhost/fondvert/?p=56', 0, 'revision', '', 0),
(57, 1, '2026-07-30 13:42:59', '2026-07-30 11:42:59', 'hi', 'Politique', '', 'publish', 'closed', 'closed', '', 'politique', '', '', '2026-08-06 19:39:54', '2026-08-06 17:39:54', '', 0, 'http://localhost/fondvert/?page_id=57', 0, 'page', '', 0),
(58, 1, '2026-07-30 13:42:59', '2026-07-30 11:42:59', '', 'Politique', '', 'inherit', 'closed', 'closed', '', '57-revision-v1', '', '', '2026-07-30 13:42:59', '2026-07-30 11:42:59', '', 57, 'http://localhost/fondvert/?p=58', 0, 'revision', '', 0),
(59, 1, '2026-07-30 14:12:47', '2026-07-30 12:12:47', '', 'Agriculture durable', '', 'publish', 'closed', 'closed', '', 'guichet-agriculture', '', '', '2026-08-07 13:20:10', '2026-08-07 11:20:10', '', 0, 'http://localhost/fondvert/?page_id=59', 0, 'page', '', 0),
(60, 1, '2026-07-30 14:12:47', '2026-07-30 12:12:47', '', 'Agriculture durable', '', 'inherit', 'closed', 'closed', '', '59-revision-v1', '', '', '2026-07-30 14:12:47', '2026-07-30 12:12:47', '', 59, 'http://localhost/fondvert/?p=60', 0, 'revision', '', 0),
(61, 1, '2026-08-04 03:46:06', '2026-08-04 01:46:06', 'a:11:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:2:\"67\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;s:13:\"display_title\";s:0:\"\";s:15:\"allow_ai_access\";b:0;s:14:\"ai_description\";s:0:\"\";}', 'Mot du directeur', 'mot-du-directeur', 'publish', 'closed', 'closed', '', 'group_6a7143c8d9905', '', '', '2026-08-04 03:50:04', '2026-08-04 01:50:04', '', 0, 'http://localhost/fondvert/?post_type=acf-field-group&#038;p=61', 0, 'acf-field-group', '', 0),
(62, 1, '2026-08-04 03:46:06', '2026-08-04 01:46:06', 'a:17:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:5:\"array\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:12:\"preview_size\";s:6:\"medium\";}', 'director_image', 'director_image', 'publish', 'closed', 'closed', '', 'field_6a7143c99da3e', '', '', '2026-08-04 03:46:06', '2026-08-04 01:46:06', '', 61, 'http://localhost/fondvert/?post_type=acf-field&p=62', 0, 'acf-field', '', 0),
(63, 1, '2026-08-04 03:46:06', '2026-08-04 01:46:06', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'director_title', 'director_title', 'publish', 'closed', 'closed', '', 'field_6a7143fb9da3f', '', '', '2026-08-04 03:46:06', '2026-08-04 01:46:06', '', 61, 'http://localhost/fondvert/?post_type=acf-field&p=63', 1, 'acf-field', '', 0),
(65, 1, '2026-08-04 03:46:06', '2026-08-04 01:46:06', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'director_message', 'director_message', 'publish', 'closed', 'closed', '', 'field_6a71441b9da41', '', '', '2026-08-04 03:48:59', '2026-08-04 01:48:59', '', 61, 'http://localhost/fondvert/?post_type=acf-field&#038;p=65', 2, 'acf-field', '', 0),
(66, 1, '2026-08-04 03:46:06', '2026-08-04 01:46:06', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'director_quote', 'director_quote', 'publish', 'closed', 'closed', '', 'field_6a7144219da42', '', '', '2026-08-04 03:48:59', '2026-08-04 01:48:59', '', 61, 'http://localhost/fondvert/?post_type=acf-field&#038;p=66', 3, 'acf-field', '', 0),
(67, 1, '2026-08-04 03:46:54', '2026-08-04 01:46:54', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'Mot du directeur', '', 'publish', 'closed', 'closed', '', 'mot-du-directeur', '', '', '2026-08-04 04:04:05', '2026-08-04 02:04:05', '', 0, 'http://localhost/fondvert/?page_id=67', 0, 'page', '', 0),
(68, 1, '2026-08-04 03:46:54', '2026-08-04 01:46:54', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'Mot du directeur', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2026-08-04 03:46:54', '2026-08-04 01:46:54', '', 67, 'http://localhost/fondvert/?p=68', 0, 'revision', '', 0),
(69, 1, '2026-08-04 03:48:59', '2026-08-04 01:48:59', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'Directeur Nom', 'director_name', 'publish', 'closed', 'closed', '', 'field_6a7144edf7326', '', '', '2026-08-04 03:48:59', '2026-08-04 01:48:59', '', 61, 'http://localhost/fondvert/?post_type=acf-field&p=69', 4, 'acf-field', '', 0),
(70, 1, '2026-08-04 03:49:26', '2026-08-04 01:49:26', 'a:12:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:17:\"allow_in_bindings\";i:0;s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";}', 'director_role', 'director_role', 'publish', 'closed', 'closed', '', 'field_6a71451c1196c', '', '', '2026-08-04 03:49:26', '2026-08-04 01:49:26', '', 61, 'http://localhost/fondvert/?post_type=acf-field&p=70', 5, 'acf-field', '', 0),
(71, 1, '2026-08-04 03:50:56', '2026-08-04 01:50:56', '', 'about-4-1', '', 'inherit', 'open', 'closed', '', 'about-4-1', '', '', '2026-08-04 03:50:56', '2026-08-04 01:50:56', '', 67, 'http://localhost/fondvert/wp-content/uploads/2026/08/about-4-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(72, 1, '2026-08-04 03:52:47', '2026-08-04 01:52:47', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'Mot du directeur', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2026-08-04 03:52:47', '2026-08-04 01:52:47', '', 67, 'http://localhost/fondvert/?p=72', 0, 'revision', '', 0),
(73, 1, '2026-08-04 04:03:19', '2026-08-04 02:03:19', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'Mot du directeur', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2026-08-04 04:03:19', '2026-08-04 02:03:19', '', 67, 'http://localhost/fondvert/?p=73', 0, 'revision', '', 0),
(74, 1, '2026-08-04 04:04:05', '2026-08-04 02:04:05', 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'Mot du directeur', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2026-08-04 04:04:05', '2026-08-04 02:04:05', '', 67, 'http://localhost/fondvert/?p=74', 0, 'revision', '', 0),
(75, 1, '2026-08-04 04:20:10', '2026-08-04 02:20:10', '<!-- wp:paragraph -->\n<p>Bienvenue sur WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis commencez à écrire !</p>\n<!-- /wp:paragraph -->', 'Bonjour tout le monde !', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2026-08-04 04:20:10', '2026-08-04 02:20:10', '', 1, 'http://localhost/fondvert/?p=75', 0, 'revision', '', 0),
(76, 1, '2025-06-16 04:22:25', '2025-06-16 02:22:25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce massa turpis, mollis nec lacus id, porta egestas risus. Integer vitae dictum enim, at faucibus dui. Phasellus placerat turpis nec massa tincidunt fermentum. Proin vulputate mi ipsum, eu feugiat turpis eleifend at. Etiam ac leo sem. Ut maximus tristique erat, id imperdiet metus dapibus ac. Aliquam ac urna justo. Proin ultricies elit rhoncus elit finibus, sed elementum risus bibendum. Donec odio purus, finibus vel nibh sit amet, vehicula viverra nibh. Nullam vel ipsum ut eros interdum interdum. Nunc dictum turpis lorem, quis egestas ante ornare in. Sed cursus, lacus a sollicitudin cursus, purus tellus faucibus mauris, quis rhoncus lacus risus non tortor. Donec rutrum efficitur odio, vel fermentum lacus finibus nec. Sed ultricies, tortor ac luctus rhoncus, purus orci sollicitudin ipsum, et aliquet mi arcu imperdiet urna.\r\n\r\nCras suscipit accumsan leo at venenatis. Sed non ligula quam. Vestibulum efficitur est sapien, id consequat nibh bibendum scelerisque. Sed iaculis sodales pretium. Phasellus id quam in augue pharetra elementum. Sed congue nulla a sagittis interdum. Duis in ex nec lorem facilisis ornare convallis vel libero.', 'Lancement du Togo Green Fund', '', 'publish', 'open', 'open', '', 'lancement-du-togo-green-fund', '', '', '2026-08-04 04:22:53', '2026-08-04 02:22:53', '', 0, 'http://localhost/fondvert/?p=76', 0, 'post', '', 0),
(77, 1, '2026-08-04 04:21:53', '2026-08-04 02:21:53', '', 'article1', '', 'inherit', 'open', 'closed', '', 'article1', '', '', '2026-08-04 04:21:53', '2026-08-04 02:21:53', '', 76, 'http://localhost/fondvert/wp-content/uploads/2026/08/article1.jpg', 0, 'attachment', 'image/jpeg', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(78, 1, '2026-08-04 04:22:25', '2026-08-04 02:22:25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce massa turpis, mollis nec lacus id, porta egestas risus. Integer vitae dictum enim, at faucibus dui. Phasellus placerat turpis nec massa tincidunt fermentum. Proin vulputate mi ipsum, eu feugiat turpis eleifend at. Etiam ac leo sem. Ut maximus tristique erat, id imperdiet metus dapibus ac. Aliquam ac urna justo. Proin ultricies elit rhoncus elit finibus, sed elementum risus bibendum. Donec odio purus, finibus vel nibh sit amet, vehicula viverra nibh. Nullam vel ipsum ut eros interdum interdum. Nunc dictum turpis lorem, quis egestas ante ornare in. Sed cursus, lacus a sollicitudin cursus, purus tellus faucibus mauris, quis rhoncus lacus risus non tortor. Donec rutrum efficitur odio, vel fermentum lacus finibus nec. Sed ultricies, tortor ac luctus rhoncus, purus orci sollicitudin ipsum, et aliquet mi arcu imperdiet urna.\r\n\r\nCras suscipit accumsan leo at venenatis. Sed non ligula quam. Vestibulum efficitur est sapien, id consequat nibh bibendum scelerisque. Sed iaculis sodales pretium. Phasellus id quam in augue pharetra elementum. Sed congue nulla a sagittis interdum. Duis in ex nec lorem facilisis ornare convallis vel libero.', 'Lancement du Togo Green Fund', '', 'inherit', 'closed', 'closed', '', '76-revision-v1', '', '', '2026-08-04 04:22:25', '2026-08-04 02:22:25', '', 76, 'http://localhost/fondvert/?p=78', 0, 'revision', '', 0),
(79, 1, '2025-08-04 04:23:57', '2025-08-04 02:23:57', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce massa turpis, mollis nec lacus id, porta egestas risus. Integer vitae dictum enim, at faucibus dui. Phasellus placerat turpis nec massa tincidunt fermentum. Proin vulputate mi ipsum, eu feugiat turpis eleifend at. Etiam ac leo sem. Ut maximus tristique erat, id imperdiet metus dapibus ac. Aliquam ac urna justo. Proin ultricies elit rhoncus elit finibus, sed elementum risus bibendum. Donec odio purus, finibus vel nibh sit amet, vehicula viverra nibh. Nullam vel ipsum ut eros interdum interdum. Nunc dictum turpis lorem, quis egestas ante ornare in. Sed cursus, lacus a sollicitudin cursus, purus tellus faucibus mauris, quis rhoncus lacus risus non tortor. Donec rutrum efficitur odio, vel fermentum lacus finibus nec. Sed ultricies, tortor ac luctus rhoncus, purus orci sollicitudin ipsum, et aliquet mi arcu imperdiet urna.\r\n\r\nCras suscipit accumsan leo at venenatis. Sed non ligula quam. Vestibulum efficitur est sapien, id consequat nibh bibendum scelerisque. Sed iaculis sodales pretium. Phasellus id quam in augue pharetra elementum. Sed congue nulla a sagittis interdum. Duis in ex nec lorem facilisis ornare convallis vel libero.', 'Atelier de formation sur la gouvernance climatique', '', 'publish', 'open', 'open', '', 'atelier-de-formation-sur-la-gouvernance-climatique', '', '', '2026-08-04 04:26:52', '2026-08-04 02:26:52', '', 0, 'http://localhost/fondvert/?p=79', 0, 'post', '', 0),
(80, 1, '2026-08-04 04:23:49', '2026-08-04 02:23:49', '', 'article2', '', 'inherit', 'open', 'closed', '', 'article2', '', '', '2026-08-04 04:23:49', '2026-08-04 02:23:49', '', 79, 'http://localhost/fondvert/wp-content/uploads/2026/08/article2.jpeg', 0, 'attachment', 'image/jpeg', 0),
(81, 1, '2026-08-04 04:23:57', '2026-08-04 02:23:57', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce massa turpis, mollis nec lacus id, porta egestas risus. Integer vitae dictum enim, at faucibus dui. Phasellus placerat turpis nec massa tincidunt fermentum. Proin vulputate mi ipsum, eu feugiat turpis eleifend at. Etiam ac leo sem. Ut maximus tristique erat, id imperdiet metus dapibus ac. Aliquam ac urna justo. Proin ultricies elit rhoncus elit finibus, sed elementum risus bibendum. Donec odio purus, finibus vel nibh sit amet, vehicula viverra nibh. Nullam vel ipsum ut eros interdum interdum. Nunc dictum turpis lorem, quis egestas ante ornare in. Sed cursus, lacus a sollicitudin cursus, purus tellus faucibus mauris, quis rhoncus lacus risus non tortor. Donec rutrum efficitur odio, vel fermentum lacus finibus nec. Sed ultricies, tortor ac luctus rhoncus, purus orci sollicitudin ipsum, et aliquet mi arcu imperdiet urna.\r\n\r\nCras suscipit accumsan leo at venenatis. Sed non ligula quam. Vestibulum efficitur est sapien, id consequat nibh bibendum scelerisque. Sed iaculis sodales pretium. Phasellus id quam in augue pharetra elementum. Sed congue nulla a sagittis interdum. Duis in ex nec lorem facilisis ornare convallis vel libero.', 'Atelier de formation sur la gouvernance climatique', '', 'inherit', 'closed', 'closed', '', '79-revision-v1', '', '', '2026-08-04 04:23:57', '2026-08-04 02:23:57', '', 79, 'http://localhost/fondvert/?p=81', 0, 'revision', '', 0),
(82, 1, '2025-03-22 04:24:06', '2025-03-22 03:24:06', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Projet de reboisement communautaire', '', 'publish', 'open', 'open', '', 'projet-de-reboisement-communautaire', '', '', '2026-08-04 04:25:59', '2026-08-04 02:25:59', '', 0, 'http://localhost/fondvert/?p=82', 0, 'post', '', 0),
(83, 1, '2026-08-04 04:25:24', '2026-08-04 02:25:24', '', 'article3', '', 'inherit', 'open', 'closed', '', 'article3', '', '', '2026-08-04 04:25:24', '2026-08-04 02:25:24', '', 82, 'http://localhost/fondvert/wp-content/uploads/2026/08/article3.jpg', 0, 'attachment', 'image/jpeg', 0),
(84, 1, '2026-08-04 04:25:43', '2026-08-04 02:25:43', '', 'Projet de reboisement communautaire', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2026-08-04 04:25:43', '2026-08-04 02:25:43', '', 82, 'http://localhost/fondvert/?p=84', 0, 'revision', '', 0),
(85, 1, '2026-08-04 04:25:59', '2026-08-04 02:25:59', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Projet de reboisement communautaire', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2026-08-04 04:25:59', '2026-08-04 02:25:59', '', 82, 'http://localhost/fondvert/?p=85', 0, 'revision', '', 0),
(86, 1, '2026-08-04 04:36:44', '2026-08-04 02:36:44', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Agriculture résiliente au climat', '', 'publish', 'closed', 'closed', '', 'agriculture-resiliente-au-climat', '', '', '2026-08-04 04:36:44', '2026-08-04 02:36:44', '', 0, 'http://localhost/fondvert/?post_type=projets&#038;p=86', 0, 'projets', '', 0),
(87, 1, '2026-08-04 04:36:33', '2026-08-04 02:36:33', '', 'projet1', '', 'inherit', 'open', 'closed', '', 'projet1', '', '', '2026-08-04 04:36:33', '2026-08-04 02:36:33', '', 86, 'http://localhost/fondvert/wp-content/uploads/2026/08/projet1.jpeg', 0, 'attachment', 'image/jpeg', 0),
(88, 1, '2026-08-04 04:38:05', '2026-08-04 02:38:05', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Energie soliare pour les communautés rurales', '', 'publish', 'closed', 'closed', '', 'energie-soliare-pour-les-communautes-rurales', '', '', '2026-08-04 04:38:05', '2026-08-04 02:38:05', '', 0, 'http://localhost/fondvert/?post_type=projets&#038;p=88', 0, 'projets', '', 0),
(89, 1, '2026-08-04 04:37:55', '2026-08-04 02:37:55', '', 'projet2', '', 'inherit', 'open', 'closed', '', 'projet2', '', '', '2026-08-04 04:37:55', '2026-08-04 02:37:55', '', 88, 'http://localhost/fondvert/wp-content/uploads/2026/08/projet2.jpeg', 0, 'attachment', 'image/jpeg', 0),
(90, 1, '2026-08-04 04:38:41', '2026-08-04 02:38:41', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Gestion durable des forets', '', 'publish', 'closed', 'closed', '', 'gestion-durable-des-forets', '', '', '2026-08-04 04:38:41', '2026-08-04 02:38:41', '', 0, 'http://localhost/fondvert/?post_type=projets&#038;p=90', 0, 'projets', '', 0),
(91, 1, '2026-08-04 04:38:37', '2026-08-04 02:38:37', '', 'projet3', '', 'inherit', 'open', 'closed', '', 'projet3', '', '', '2026-08-04 04:38:37', '2026-08-04 02:38:37', '', 90, 'http://localhost/fondvert/wp-content/uploads/2026/08/projet3.jpeg', 0, 'attachment', 'image/jpeg', 0),
(92, 1, '2026-08-04 04:44:34', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-04 04:44:34', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=projet&p=92', 0, 'projet', '', 0),
(93, 1, '2026-08-04 04:46:28', '2026-08-04 02:46:28', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Gestion durable des forets', 'Cras suscipit accumsan leo at venenatis. Sed non ligula quam. Vestibulum efficitur est sapien, id consequat nibh bibendum scelerisque. Sed iaculis sodales pretium.', 'publish', 'closed', 'closed', '', 'gestion-durable-des-forets', '', '', '2026-08-04 04:46:28', '2026-08-04 02:46:28', '', 0, 'http://localhost/fondvert/?post_type=projet&#038;p=93', 0, 'projet', '', 0),
(94, 1, '2026-08-04 04:46:23', '2026-08-04 02:46:23', '', 'projet1', '', 'inherit', 'open', 'closed', '', 'projet1-2', '', '', '2026-08-04 04:46:23', '2026-08-04 02:46:23', '', 93, 'http://localhost/fondvert/wp-content/uploads/2026/08/projet1-1.jpeg', 0, 'attachment', 'image/jpeg', 0),
(95, 1, '2026-08-04 04:47:36', '2026-08-04 02:47:36', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum. Mauris nisl purus, rhoncus non varius sit amet, tempor a quam. Curabitur vel tortor ornare, tempor nibh ut, pretium ipsum. Etiam vestibulum, mauris sit amet vestibulum finibus, purus orci mattis ante, nec fringilla enim ligula vel quam. In hac habitasse platea dictumst. Praesent facilisis justo vitae dignissim fermentum. Vestibulum est eros, auctor vitae gravida at, semper a risus. Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'Energie soliare pour les communautés rurales', 'Curabitur lobortis aliquam arcu, non vulputate lorem molestie in. Quisque orci mi, posuere at bibendum quis, maximus eu metus. Mauris suscipit ornare libero at ultrices.', 'publish', 'closed', 'closed', '', 'energie-soliare-pour-les-communautes-rurales', '', '', '2026-08-04 04:47:36', '2026-08-04 02:47:36', '', 0, 'http://localhost/fondvert/?post_type=projet&#038;p=95', 0, 'projet', '', 0),
(96, 1, '2026-08-04 04:49:18', '2026-08-04 02:49:18', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque sed metus ac lectus semper dignissim. Nulla varius, tortor sed congue rhoncus, nibh ipsum venenatis dolor, et feugiat dui neque quis sapien. Mauris dignissim feugiat ligula, id tempus arcu elementum quis. Suspendisse pellentesque augue non sem hendrerit, vel tristique sapien blandit. Curabitur faucibus augue in malesuada volutpat. Ut ut purus sit amet quam tincidunt feugiat ac id lorem. Donec nisl nulla, sodales nec gravida nec, tristique sed diam. Sed sollicitudin risus sed semper mollis. Fusce diam massa, tincidunt id purus eget, gravida condimentum ipsum. Praesent hendrerit pharetra lorem vel viverra.\r\n\r\nQuisque at placerat est, nec pretium arcu. Nullam finibus tincidunt sapien, eu consectetur orci convallis in. Vestibulum vitae varius nibh, ac volutpat tortor. Nunc at ipsum vitae tortor placerat fringilla. Ut bibendum nisi ac ipsum varius elementum.', 'Agriculture résiliente au climat', 'Vestibulum ac cursus massa. Nulla iaculis quam in odio pharetra laoreet. Nulla varius est mi, nec mattis libero maximus vel. Quisque ', 'publish', 'closed', 'closed', '', 'agriculture-resiliente-au-climat', '', '', '2026-08-04 04:49:18', '2026-08-04 02:49:18', '', 0, 'http://localhost/fondvert/?post_type=projet&#038;p=96', 0, 'projet', '', 0),
(97, 1, '2026-08-04 04:57:00', '2026-08-04 02:57:00', 'Le Togo Green Fund du Togo est un mécanisme national de financement climatique qui mobilise des ressources pour soutenir des projets d\'adaptation et d\'atténuation des effets du changement climatique au Togo.', 'Qu \'est ce que le Togo Green Fund ?', '', 'publish', 'closed', 'closed', '', 'qu-est-ce-que-le-togo-green-fund', '', '', '2026-08-04 04:57:00', '2026-08-04 02:57:00', '', 0, 'http://localhost/fondvert/?post_type=faq&#038;p=97', 1, 'faq', '', 0),
(98, 1, '2026-08-04 04:57:39', '2026-08-04 02:57:39', 'Nous finançons des projets dans les domaines de l\'agriculture résiliente, des énergies renouvelables, de la gestion durable des forêts, de l\'adaptation des zones côtières, et de l\'économie circulaire.2', 'Quels type de projets sont financés ?', '', 'publish', 'closed', 'closed', '', 'quels-type-de-projets-sont-finances', '', '', '2026-08-04 04:57:39', '2026-08-04 02:57:39', '', 0, 'http://localhost/fondvert/?post_type=faq&#038;p=98', 0, 'faq', '', 0),
(99, 1, '2026-08-04 04:58:13', '2026-08-04 02:58:13', 'Les appels à projets sont publiés régulièrement sur notre site. Vous pouvez consulter la page \"Appels à projets\" pour connaître les critères d\'éligibilité et la procédure de soumission.', 'Comment soumettre un projet ?', '', 'publish', 'closed', 'closed', '', 'comment-soumettre-un-projet', '', '', '2026-08-04 04:58:13', '2026-08-04 02:58:13', '', 0, 'http://localhost/fondvert/?post_type=faq&#038;p=99', 3, 'faq', '', 0),
(100, 1, '2026-08-04 04:59:05', '2026-08-04 02:59:05', '4Les collectivités locales, les organisations de la société civile, les entreprises privées et les institutions publiques peuvent soumettre des projets, sous réserve de remplir les critères d\'éligibilité.4', 'Qui peut bénéficier des financements ?', '', 'publish', 'closed', 'closed', '', 'qui-peut-beneficier-des-financements', '', '', '2026-08-04 04:59:15', '2026-08-04 02:59:15', '', 0, 'http://localhost/fondvert/?post_type=faq&#038;p=100', 4, 'faq', '', 0),
(101, 1, '2026-08-04 05:00:00', '2026-08-04 03:00:00', 'Les projets sont évalués selon des critères de pertinence climatique, d\'impact environnemental et social, de viabilité financière et de durabilité. Un comité technique indépendant assure la sélection.5', 'Comment sont évalués les projets ?', '', 'publish', 'closed', 'closed', '', 'comment-sont-evalues-les-projets', '', '', '2026-08-04 05:01:11', '2026-08-04 03:01:11', '', 0, 'http://localhost/fondvert/?post_type=faq&#038;p=101', 5, 'faq', '', 0),
(102, 1, '2026-08-04 05:04:20', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-04 05:04:20', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=partenaires&p=102', 0, 'partenaires', '', 0),
(103, 1, '2026-08-04 05:07:35', '2026-08-04 03:07:35', '', 'BIDC', '', 'publish', 'closed', 'closed', '', 'bidc', '', '', '2026-08-04 05:07:35', '2026-08-04 03:07:35', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=103', 0, 'partenaire', '', 0),
(104, 1, '2026-08-04 05:07:31', '2026-08-04 03:07:31', '', 'partenaire2', '', 'inherit', 'open', 'closed', '', 'partenaire2', '', '', '2026-08-04 05:07:31', '2026-08-04 03:07:31', '', 103, 'http://localhost/fondvert/wp-content/uploads/2026/08/partenaire2.jpeg', 0, 'attachment', 'image/jpeg', 0),
(105, 1, '2026-08-04 05:08:11', '2026-08-04 03:08:11', '', 'PNUD', '', 'trash', 'closed', 'closed', '', 'pnud__trashed', '', '', '2026-08-07 14:57:24', '2026-08-07 12:57:24', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=105', 0, 'partenaire', '', 0),
(106, 1, '2026-08-04 05:08:02', '2026-08-04 03:08:02', '', 'partenaire1', '', 'inherit', 'open', 'closed', '', 'partenaire1', '', '', '2026-08-04 05:08:02', '2026-08-04 03:08:02', '', 105, 'http://localhost/fondvert/wp-content/uploads/2026/08/partenaire1.jpeg', 0, 'attachment', 'image/jpeg', 0),
(107, 1, '2026-08-04 05:09:27', '2026-08-04 03:09:27', '', 'Green Climate Fund', '', 'publish', 'closed', 'closed', '', 'green-climate-fund', '', '', '2026-08-04 05:09:27', '2026-08-04 03:09:27', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=107', 0, 'partenaire', '', 0),
(108, 1, '2026-08-04 05:09:10', '2026-08-04 03:09:10', '', 'partenaire3', '', 'inherit', 'open', 'closed', '', 'partenaire3', '', '', '2026-08-04 05:09:10', '2026-08-04 03:09:10', '', 107, 'http://localhost/fondvert/wp-content/uploads/2026/08/partenaire3.jpg', 0, 'attachment', 'image/jpeg', 0),
(109, 1, '2026-08-04 05:44:26', '2026-08-04 03:44:26', 'test sit amet, consectetur adipiscing elit. Etiam dapibus nulla nec ante finibus elementum. Vivamus nibh dui, luctus consectetur varius at, finibus ut nisi. Donec auctor, odio sed cursus rutrum, mi nulla consequat nisi, a facilisis leo dui at neque. Vestibulum ac viverra magna. Morbi venenatis non ipsum in sollicitudin. Nulla vel risus interdum, pretium magna quis, placerat velit. Curabitur elementum euismod velit vel luctus. Phasellus elit quam, convallis a pulvinar non, dictum in velit. Nam a sapien nulla. Nam iaculis, risus at ornare mattis, lectus risus hendrerit mauris, nec dignissim orci turpis at ante. Ut arcu ex, maximus vel consequat faucibus, maximus eget lacus. Donec maximus dolor ac nulla viverra, non molestie ipsum vestibulum. Integer lacus massa, egestas ut ex ullamcorper, luctus luctus neque. Nam in quam leo. Donec porta vel ipsum non feugiat. Nulla scelerisque est non lorem efficitur bibendum.\r\n\r\nDonec maximus sapien finibus est scelerisque, suscipit fermentum neque eleifend. Nam blandit sagittis magna, tempor tristique elit bibendum dapibus. Suspendisse non lorem non arcu euismod venenatis sed quis diam. Suspendisse mattis enim ac ante dignissim faucibus. Vestibulum et varius lorem, a suscipit ipsum. Pellentesque rhoncus vitae massa nec dapibus. Aenean sit amet finibus lectus, eu ultrices felis. Donec interdum massa id nisl tristique, id gravida sem aliquet. Aliquam tincidunt ante in tincidunt mattis. Maecenas quis placerat ante. Donec sagittis dignissim posuere. Maecenas et nulla ex. Aliquam eu convallis erat. Sed convallis eros ut nulla placerat tincidunt.\r\n\r\nVivamus interdum ex eu mollis elementum. Vivamus ut vehicula odio. Integer sit amet lacus elementum, tempor leo ut, aliquet quam. Pellentesque condimentum erat eu diam imperdiet, pharetra facilisis nunc maximus. Integer magna eros, mollis at eros ut, blandit aliquam metus. Quisque auctor lectus et diam placerat, eget hendrerit lorem vehicula. Aliquam ut interdum eros. Cras at turpis odio. Mauris tempor eu tortor in feugiat. Sed suscipit maximus sem, porttitor scelerisque augue tincidunt eu. In velit ex, semper sit amet metus in, rutrum porta metus. Fusce orci metus, hendrerit non elementum ut, tincidunt a mauris. Etiam tincidunt, risus ac dignissim vulputate, enim dui egestas arcu, vel fermentum neque odio sit amet velit. Pellentesque lacinia mi quis diam faucibus tincidunt nec sit amet magna. Aenean tempor magna diam, sit amet maximus dui lacinia eu. Donec sed ornare leo.', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-08-04 05:44:26', '2026-08-04 03:44:26', '', 7, 'http://localhost/fondvert/?p=109', 0, 'revision', '', 0),
(110, 2, '2026-08-04 21:05:43', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'open', 'open', '', '', '', '', '2026-08-04 21:05:43', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?p=110', 0, 'post', '', 0),
(111, 2, '2026-08-05 00:00:40', '2026-08-04 22:00:40', '', 'Reglement Interieur du Personnel TGF', '', 'inherit', 'open', 'closed', '', 'reglement-interieur-du-personnel-tgf', '', '', '2026-08-05 00:00:40', '2026-08-04 22:00:40', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Reglement-Interieur-du-Personnel-TGF.pdf', 0, 'attachment', 'application/pdf', 0),
(112, 2, '2026-08-05 00:18:10', '2026-08-04 22:18:10', '', 'Charte éthique et déontologique TGF 06072026', '', 'inherit', 'open', 'closed', '', 'charte-ethique-et-deontologique-tgf-06072026', '', '', '2026-08-05 00:18:10', '2026-08-04 22:18:10', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Charte-éthique-et-déontologique-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(113, 2, '2026-08-05 00:18:12', '2026-08-04 22:18:12', '', 'decret n° 2026 086 PC du 6 mai fixant les attributions le fonctionnement de TOGO GREEN FUND,', '', 'inherit', 'open', 'closed', '', 'decret-n-2026-086-pc-du-6-mai-fixant-les-attributions-le-fonctionnement-de-togo-green-fund', '', '', '2026-08-05 00:18:12', '2026-08-04 22:18:12', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/decret-n°-2026-086-PC-du-6-mai-fixant-les-attributions-le-fonctionnement-de-TOGO-GREEN-FUND.pdf', 0, 'attachment', 'application/pdf', 0),
(114, 2, '2026-08-05 00:18:15', '2026-08-04 22:18:15', '', 'Note_Strategique_FVT', '', 'inherit', 'open', 'closed', '', 'note_strategique_fvt', '', '', '2026-08-05 00:18:15', '2026-08-04 22:18:15', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Note_Strategique_FVT.pdf', 0, 'attachment', 'application/pdf', 0),
(115, 2, '2026-08-05 00:18:17', '2026-08-04 22:18:17', '', 'ORGANIGRAMME_TGF_VF', '', 'inherit', 'open', 'closed', '', 'organigramme_tgf_vf', '', '', '2026-08-05 00:18:17', '2026-08-04 22:18:17', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/ORGANIGRAMME_TGF_VF.pdf', 0, 'attachment', 'application/pdf', 0),
(116, 2, '2026-08-05 00:18:19', '2026-08-04 22:18:19', '', 'Projet d\'arrêté portant attributions et structures de la gouvernance du TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-darre%cc%82te-portant-attributions-et-structures-de-la-gouvernance-du-tgf-06072026', '', '', '2026-08-05 00:18:19', '2026-08-04 22:18:19', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-darrêté-portant-attributions-et-structures-de-la-gouvernance-du-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(117, 2, '2026-08-05 00:18:20', '2026-08-04 22:18:20', '', 'Projet de Manuel de politique et de procédure de vérification de conformite TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-manuel-de-politique-et-de-procedure-de-verification-de-conformite-tgf-06072026', '', '', '2026-08-05 00:18:20', '2026-08-04 22:18:20', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-Manuel-de-politique-et-de-procédure-de-vérification-de-conformite-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(118, 2, '2026-08-05 00:18:21', '2026-08-04 22:18:21', '', 'Projet de manuel de procedures et comptables TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-manuel-de-procedures-et-comptables-tgf-06072026', '', '', '2026-08-05 00:18:21', '2026-08-04 22:18:21', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-manuel-de-procedures-et-comptables-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(119, 2, '2026-08-05 00:18:23', '2026-08-04 22:18:23', '', 'Projet de politique générale du TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-politique-generale-du-tgf-06072026', '', '', '2026-08-05 00:18:23', '2026-08-04 22:18:23', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-politique-générale-du-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(120, 2, '2026-08-05 00:18:24', '2026-08-04 22:18:24', '', 'Projet de règlement intérieur 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-reglement-interieur-06072026', '', '', '2026-08-05 00:18:24', '2026-08-04 22:18:24', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-règlement-intérieur-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(121, 2, '2026-08-05 00:18:25', '2026-08-04 22:18:25', '', 'Projet de statuts revisé TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-statuts-revise-tgf-06072026', '', '', '2026-08-05 00:18:25', '2026-08-04 22:18:25', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-statuts-revisé-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(122, 2, '2026-08-05 00:18:28', '2026-08-04 22:18:28', '', 'Projet de strategie de financement TGF 06072026', '', 'inherit', 'open', 'closed', '', 'projet-de-strategie-de-financement-tgf-06072026', '', '', '2026-08-05 00:18:28', '2026-08-04 22:18:28', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Projet-de-strategie-de-financement-TGF-06072026.pdf', 0, 'attachment', 'application/pdf', 0),
(123, 2, '2026-08-05 00:18:30', '2026-08-04 22:18:30', '', 'Reglement Interieur du Personnel TGF', '', 'inherit', 'open', 'closed', '', 'reglement-interieur-du-personnel-tgf-2', '', '', '2026-08-05 00:18:30', '2026-08-04 22:18:30', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Reglement-Interieur-du-Personnel-TGF-1.pdf', 0, 'attachment', 'application/pdf', 0),
(130, 2, '2026-08-05 00:25:20', '2026-08-04 22:25:20', '', 'Manuel Politique Administrative et ComptableTGF', '', 'inherit', 'open', 'closed', '', 'manuel-politique-administrative-et-comptabletgf', '', '', '2026-08-05 00:25:20', '2026-08-04 22:25:20', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Manuel-Politique-Administrative-et-ComptableTGF.pdf', 0, 'attachment', 'application/pdf', 0),
(131, 2, '2026-08-05 00:25:22', '2026-08-04 22:25:22', '', 'Politique Enquete et SanctionTGF', '', 'inherit', 'open', 'closed', '', 'politique-enquete-et-sanctiontgf', '', '', '2026-08-05 00:25:22', '2026-08-04 22:25:22', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Enquete-et-SanctionTGF.pdf', 0, 'attachment', 'application/pdf', 0),
(132, 2, '2026-08-05 00:25:23', '2026-08-04 22:25:23', '', 'Politique Denonciation et ProtectionTGF', '', 'inherit', 'open', 'closed', '', 'politique-denonciation-et-protectiontgf', '', '', '2026-08-05 00:25:23', '2026-08-04 22:25:23', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Denonciation-et-ProtectionTGF.pdf', 0, 'attachment', 'application/pdf', 0),
(133, 2, '2026-08-05 00:25:24', '2026-08-04 22:25:24', '', 'Politique Lutte Fraude CorruptionTGF', '', 'inherit', 'open', 'closed', '', 'politique-lutte-fraude-corruptiontgf', '', '', '2026-08-05 00:25:24', '2026-08-04 22:25:24', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-Lutte-Fraude-CorruptionTGF.pdf', 0, 'attachment', 'application/pdf', 0),
(134, 2, '2026-08-05 00:26:28', '2026-08-04 22:26:28', '', 'Politique de GouvernanceTGF', '', 'inherit', 'open', 'closed', '', 'politique-de-gouvernancetgf', '', '', '2026-08-05 00:26:28', '2026-08-04 22:26:28', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Politique-de-GouvernanceTGF.pdf', 0, 'attachment', 'application/pdf', 0),
(135, 2, '2026-08-05 01:00:32', '2026-08-04 23:00:32', '', 'Forêt et Biodiversité', '', 'publish', 'closed', 'closed', '', 'guichet-foret', '', '', '2026-08-07 13:38:48', '2026-08-07 11:38:48', '', 0, 'http://localhost/fondvert/?page_id=135', 0, 'page', '', 0),
(136, 2, '2026-08-05 01:00:32', '2026-08-04 23:00:32', '', 'Forêt et Biodiversité', '', 'inherit', 'closed', 'closed', '', '135-revision-v1', '', '', '2026-08-05 01:00:32', '2026-08-04 23:00:32', '', 135, 'http://localhost/fondvert/?p=136', 0, 'revision', '', 0),
(137, 2, '2026-08-05 01:02:29', '2026-08-04 23:02:29', '', 'Eau et assainissement', '', 'publish', 'closed', 'closed', '', 'guichet-eau', '', '', '2026-08-07 13:35:32', '2026-08-07 11:35:32', '', 0, 'http://localhost/fondvert/?page_id=137', 0, 'page', '', 0),
(138, 2, '2026-08-05 01:02:29', '2026-08-04 23:02:29', '', 'Eau et assainissement', '', 'inherit', 'closed', 'closed', '', '137-revision-v1', '', '', '2026-08-05 01:02:29', '2026-08-04 23:02:29', '', 137, 'http://localhost/fondvert/?p=138', 0, 'revision', '', 0),
(139, 2, '2026-08-05 01:03:02', '2026-08-04 23:03:02', '', 'Energie et Infrastructure Durable', '', 'trash', 'closed', 'closed', '', 'energie-et-infrastructure__trashed', '', '', '2026-08-05 01:10:20', '2026-08-04 23:10:20', '', 0, 'http://localhost/fondvert/?page_id=139', 0, 'page', '', 0),
(140, 2, '2026-08-05 01:03:02', '2026-08-04 23:03:02', '', 'Energie et Infrastructure', '', 'inherit', 'closed', 'closed', '', '139-revision-v1', '', '', '2026-08-05 01:03:02', '2026-08-04 23:03:02', '', 139, 'http://localhost/fondvert/?p=140', 0, 'revision', '', 0),
(141, 2, '2026-08-05 01:04:04', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-05 01:04:04', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?page_id=141', 0, 'page', '', 0),
(142, 2, '2026-08-05 01:06:20', '2026-08-04 23:06:20', '', 'Energie et Infrastructure Durable', '', 'inherit', 'closed', 'closed', '', '139-revision-v1', '', '', '2026-08-05 01:06:20', '2026-08-04 23:06:20', '', 139, 'http://localhost/fondvert/?p=142', 0, 'revision', '', 0),
(143, 2, '2026-08-05 01:10:58', '2026-08-04 23:10:58', '', 'Energie et Infrastructure Durable', '', 'publish', 'closed', 'closed', '', 'guichet-energie', '', '', '2026-08-07 13:36:14', '2026-08-07 11:36:14', '', 0, 'http://localhost/fondvert/?page_id=143', 0, 'page', '', 0),
(144, 2, '2026-08-05 01:10:58', '2026-08-04 23:10:58', '', 'Energie et Infrastructure Durable', '', 'inherit', 'closed', 'closed', '', '143-revision-v1', '', '', '2026-08-05 01:10:58', '2026-08-04 23:10:58', '', 143, 'http://localhost/fondvert/?p=144', 0, 'revision', '', 0),
(145, 2, '2026-08-06 19:39:54', '2026-08-06 17:39:54', 'hi', 'Politique', '', 'inherit', 'closed', 'closed', '', '57-revision-v1', '', '', '2026-08-06 19:39:54', '2026-08-06 17:39:54', '', 57, 'http://localhost/fondvert/?p=145', 0, 'revision', '', 0),
(146, 2, '2026-08-06 19:49:45', '2026-08-06 17:49:45', '', 'Politique de Gouvernance du TGF', '', 'publish', 'closed', 'closed', '', 'politique-de-gouvernance-du-tgf', '', '', '2026-08-07 01:05:27', '2026-08-06 23:05:27', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=146', 0, 'document', '', 0),
(147, 2, '2026-08-06 19:50:47', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-06 19:50:47', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=partenaire&p=147', 0, 'partenaire', '', 0),
(148, 2, '2026-08-06 23:14:25', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-06 23:14:25', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=148', 0, 'document', '', 0),
(149, 2, '2026-08-06 23:25:10', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-06 23:25:10', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=149', 0, 'document', '', 0),
(150, 2, '2026-08-06 23:57:47', '2026-08-06 21:57:47', '', 'slider-4-1', '', 'inherit', 'open', 'closed', '', 'slider-4-1', '', '', '2026-08-06 23:57:47', '2026-08-06 21:57:47', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/slider-4-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(151, 2, '2026-08-07 00:42:39', '2026-08-06 22:42:39', '', 'Politique Lutte Fraude Corruption duTGF', '', 'publish', 'closed', 'closed', '', 'politique-lutte-fraude-corruption-dutgf', '', '', '2026-08-07 01:06:15', '2026-08-06 23:06:15', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=151', 0, 'document', '', 0),
(152, 2, '2026-08-07 00:41:28', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 00:41:28', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=152', 0, 'document', '', 0),
(153, 2, '2026-08-07 00:43:58', '2026-08-06 22:43:58', '', 'Politique Dénonciation et Protection du TGF', '', 'publish', 'closed', 'closed', '', 'politique-denonciation-et-protection-du-tgf', '', '', '2026-08-07 00:43:58', '2026-08-06 22:43:58', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=153', 0, 'document', '', 0),
(154, 2, '2026-08-07 00:47:59', '2026-08-06 22:47:59', '', 'Politique Enquête et Sanction du TGF', '', 'publish', 'closed', 'closed', '', 'politique-enquete-et-sanction-du-tgf', '', '', '2026-08-07 00:47:59', '2026-08-06 22:47:59', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=154', 0, 'document', '', 0),
(155, 2, '2026-08-07 00:54:33', '2026-08-06 22:54:33', '', 'Décret fixant les attributions le fonctionnement de TOGO GREEN FUND', '', 'publish', 'closed', 'closed', '', 'decret-fixant-les-attributions-le-fonctionnement-de-togo-green-fund', '', '', '2026-08-07 00:54:33', '2026-08-06 22:54:33', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=155', 0, 'document', '', 0),
(156, 2, '2026-08-07 00:58:36', '2026-08-06 22:58:36', '', 'Arrête portant attributions et structures de la gouvernance du TGF', '', 'publish', 'closed', 'closed', '', 'arrete-portant-attributions-et-structures-de-la-gouvernance-du-tgf', '', '', '2026-08-07 00:58:36', '2026-08-06 22:58:36', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=156', 0, 'document', '', 0),
(157, 2, '2026-08-07 01:02:22', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 01:02:22', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=157', 0, 'document', '', 0),
(158, 2, '2026-08-07 01:03:08', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 01:03:08', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=158', 0, 'document', '', 0),
(159, 2, '2026-08-07 01:04:47', '2026-08-06 23:04:47', '', 'Charte éthique et déontologique du TGF', '', 'publish', 'closed', 'closed', '', 'charte-ethique-et-deontologique-du-tgf', '', '', '2026-08-07 01:04:47', '2026-08-06 23:04:47', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=159', 0, 'document', '', 0),
(160, 2, '2026-08-07 01:09:51', '2026-08-06 23:09:51', '', 'ORGANIGRAMME TGF VF', '', 'publish', 'closed', 'closed', '', 'organigramme-tgf-vf', '', '', '2026-08-07 01:09:51', '2026-08-06 23:09:51', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=160', 0, 'document', '', 0),
(161, 2, '2026-08-07 01:49:03', '2026-08-06 23:49:03', '', 'Note Stratégique TGV', '', 'publish', 'closed', 'closed', '', 'note-strategique-tgv', '', '', '2026-08-07 01:49:03', '2026-08-06 23:49:03', '', 0, 'http://localhost/fondvert/?post_type=document&#038;p=161', 0, 'document', '', 0),
(162, 2, '2026-08-07 01:53:25', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 01:53:25', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=document&p=162', 0, 'document', '', 0),
(163, 2, '2026-08-07 02:06:07', '2026-08-07 00:06:07', 'LANCEMENT DU CONCOURS DE RECRUTEMENT DES EAUX ET FORETS', 'LANCEMENT DU CONCOURS', '', 'publish', 'closed', 'closed', '', '163', '', '', '2026-08-07 02:11:22', '2026-08-07 00:11:22', '', 0, 'http://localhost/fondvert/?post_type=communique&#038;p=163', 0, 'communique', '', 0),
(164, 2, '2026-08-07 02:13:07', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 02:13:07', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=communique&p=164', 0, 'communique', '', 0),
(165, 2, '2026-08-07 13:27:41', '2026-08-07 11:27:41', '<div>\r\n<div>communiques-officiels</div>\r\n</div>', 'communiqués officiels', '', 'publish', 'closed', 'closed', '', 'communiques-officiels', '', '', '2026-08-07 13:27:41', '2026-08-07 11:27:41', '', 0, 'http://localhost/fondvert/?page_id=165', 0, 'page', '', 0),
(166, 2, '2026-08-07 13:27:41', '2026-08-07 11:27:41', '<div>\r\n<div>communiques-officiels</div>\r\n</div>', 'communiqués officiels', '', 'inherit', 'closed', 'closed', '', '165-revision-v1', '', '', '2026-08-07 13:27:41', '2026-08-07 11:27:41', '', 165, 'http://localhost/fondvert/?p=166', 0, 'revision', '', 0),
(167, 2, '2026-08-07 13:45:13', '2026-08-07 11:45:13', '<p class=\"PDq2pG_selectionAnchorContainer\" data-start=\"97\" data-end=\"341\">Le TGF constitue un guichet unique national de mobilisation, de centralisation, de gestion et d’allocation des ressources destinées notamment au financement des actions en faveur de la protection de l’environnement et du climat.</p>\r\n<p class=\"\" data-start=\"346\" data-end=\"391\"><strong data-start=\"346\" data-end=\"391\">A ce titre, il est chargé notamment, de :</strong></p>\r\n\r\n<ul data-start=\"396\" data-end=\"2513\" data-is-last-node=\"\">\r\n 	<li data-section-id=\"15hm68w\" data-start=\"396\" data-end=\"602\">développer de façon participative les instruments juridiques et stratégiques de mobilisation de ressources et de financement optimal des activités et/ou projets en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1jwcwmp\" data-start=\"607\" data-end=\"683\">soutenir le processus de réduction des émissions de gaz à effet de serre ;</li>\r\n 	<li data-section-id=\"4j826g\" data-start=\"688\" data-end=\"842\">prospecter, mobiliser et gérer les ressources financières nationales et internationales destinées à la gestion durable de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1tjln4p\" data-start=\"847\" data-end=\"1165\">appuyer la mise en œuvre des programmes et projets relatifs à la protection de l’environnement, à la protection côtière, à la gestion durable des forêts et des ressources naturelles, à la lutte contre les effets néfastes des changements climatiques, à l’amélioration du cadre de vie et du bien-être des populations ;</li>\r\n 	<li data-section-id=\"un9rlh\" data-start=\"1170\" data-end=\"1425\">soutenir la mise en œuvre des politiques publiques nationales, ainsi que les initiatives des collectivités territoriales, du secteur privé, de la société civile et des établissements de recherche, en matière d’environnement et de changement climatique ;</li>\r\n 	<li data-section-id=\"13wrk74\" data-start=\"1430\" data-end=\"1529\">contribuer à la promotion des transports durables et à l’utilisation des énergies renouvelables ;</li>\r\n 	<li data-section-id=\"oegsi1\" data-start=\"1534\" data-end=\"1695\">suivre et évaluer l’utilisation des ressources mises à disposition, leurs impacts sur l’environnement et les populations, en vue de renforcer leur résilience ;</li>\r\n 	<li data-section-id=\"fn8te4\" data-start=\"1700\" data-end=\"1903\">mettre en place un cadre de concertation continue avec les partenaires nationaux et internationaux du développement impliqués dans le financement des mesures en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1oh4c3z\" data-start=\"1908\" data-end=\"2255\">renforcer et développer les capacités institutionnelles et opérationnelles des partenaires nationaux en matière de l’environnement, des ressources naturelles, de la protection du littoral, de lutte contre les changements climatiques ainsi qu’en matière de prospection et de mobilisation des ressources financières nationales et internationales ;</li>\r\n 	<li data-section-id=\"1q34ofz\" data-start=\"2260\" data-end=\"2399\">promouvoir les partenariats publics-privés en faveur de la protection de l’environnement et de la lutte contre le changement climatique ;</li>\r\n 	<li data-section-id=\"1ep2rzf\" data-start=\"2404\" data-end=\"2513\" data-is-last-node=\"\">faciliter l’accès aux mécanismes de financement du marché du carbone.</li>\r\n</ul>', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-08-07 13:45:13', '2026-08-07 11:45:13', '', 7, 'http://localhost/fondvert/?p=167', 0, 'revision', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(168, 2, '2026-08-07 13:47:59', '2026-08-07 11:47:59', '<p class=\"PDq2pG_selectionAnchorContainer\" data-start=\"97\" data-end=\"341\">Le TGF constitue un guichet unique national de mobilisation, de centralisation, de gestion et d’allocation des ressources destinées notamment au financement des actions en faveur de la protection de l’environnement et du climat.</p>\n<p class=\"\" data-start=\"346\" data-end=\"391\"><strong data-start=\"346\" data-end=\"391\">A ce titre, il est chargé notamment, de :</strong></p>\n\n<ul data-start=\"396\" data-end=\"2513\" data-is-last-node=\"\">\n 	<li data-section-id=\"15hm68w\" data-start=\"396\" data-end=\"602\">Développer de façon participative les instruments juridiques et stratégiques de mobilisation de ressources et de financement optimal des activités et/ou projets en faveur de l’environnement et du climat ;</li>\n 	<li data-section-id=\"1jwcwmp\" data-start=\"607\" data-end=\"683\">Soutenir le processus de réduction des émissions de gaz à effet de serre ;</li>\n 	<li data-section-id=\"4j826g\" data-start=\"688\" data-end=\"842\">prospecter, mobiliser et gérer les ressources financières nationales et internationales destinées à la gestion durable de l’environnement et du climat ;</li>\n 	<li data-section-id=\"1tjln4p\" data-start=\"847\" data-end=\"1165\">appuyer la mise en œuvre des programmes et projets relatifs à la protection de l’environnement, à la protection côtière, à la gestion durable des forêts et des ressources naturelles, à la lutte contre les effets néfastes des changements climatiques, à l’amélioration du cadre de vie et du bien-être des populations ;</li>\n 	<li data-section-id=\"un9rlh\" data-start=\"1170\" data-end=\"1425\">soutenir la mise en œuvre des politiques publiques nationales, ainsi que les initiatives des collectivités territoriales, du secteur privé, de la société civile et des établissements de recherche, en matière d’environnement et de changement climatique ;</li>\n 	<li data-section-id=\"13wrk74\" data-start=\"1430\" data-end=\"1529\">contribuer à la promotion des transports durables et à l’utilisation des énergies renouvelables ;</li>\n 	<li data-section-id=\"oegsi1\" data-start=\"1534\" data-end=\"1695\">suivre et évaluer l’utilisation des ressources mises à disposition, leurs impacts sur l’environnement et les populations, en vue de renforcer leur résilience ;</li>\n 	<li data-section-id=\"fn8te4\" data-start=\"1700\" data-end=\"1903\">mettre en place un cadre de concertation continue avec les partenaires nationaux et internationaux du développement impliqués dans le financement des mesures en faveur de l’environnement et du climat ;</li>\n 	<li data-section-id=\"1oh4c3z\" data-start=\"1908\" data-end=\"2255\">renforcer et développer les capacités institutionnelles et opérationnelles des partenaires nationaux en matière de l’environnement, des ressources naturelles, de la protection du littoral, de lutte contre les changements climatiques ainsi qu’en matière de prospection et de mobilisation des ressources financières nationales et internationales ;</li>\n 	<li data-section-id=\"1q34ofz\" data-start=\"2260\" data-end=\"2399\">promouvoir les partenariats publics-privés en faveur de la protection de l’environnement et de la lutte contre le changement climatique ;</li>\n 	<li data-section-id=\"1ep2rzf\" data-start=\"2404\" data-end=\"2513\" data-is-last-node=\"\">faciliter l’accès aux mécanismes de financement du marché du carbone.</li>\n</ul>', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-autosave-v1', '', '', '2026-08-07 13:47:59', '2026-08-07 11:47:59', '', 7, 'http://localhost/fondvert/?p=168', 0, 'revision', '', 0),
(169, 2, '2026-08-07 13:48:31', '2026-08-07 11:48:31', '<p class=\"PDq2pG_selectionAnchorContainer\" data-start=\"97\" data-end=\"341\">Le TGF constitue un guichet unique national de mobilisation, de centralisation, de gestion et d’allocation des ressources destinées notamment au financement des actions en faveur de la protection de l’environnement et du climat.</p>\r\n<p class=\"\" data-start=\"346\" data-end=\"391\"><strong data-start=\"346\" data-end=\"391\">A ce titre, il est chargé notamment, de :</strong></p>\r\n\r\n<ul data-start=\"396\" data-end=\"2513\" data-is-last-node=\"\">\r\n 	<li data-section-id=\"15hm68w\" data-start=\"396\" data-end=\"602\">Développer de façon participative les instruments juridiques et stratégiques de mobilisation de ressources et de financement optimal des activités et/ou projets en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1jwcwmp\" data-start=\"607\" data-end=\"683\">Soutenir le processus de réduction des émissions de gaz à effet de serre ;</li>\r\n 	<li data-section-id=\"4j826g\" data-start=\"688\" data-end=\"842\">Prospecter, mobiliser et gérer les ressources financières nationales et internationales destinées à la gestion durable de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1tjln4p\" data-start=\"847\" data-end=\"1165\">Appuyer la mise en œuvre des programmes et projets relatifs à la protection de l’environnement, à la protection côtière, à la gestion durable des forêts et des ressources naturelles, à la lutte contre les effets néfastes des changements climatiques, à l’amélioration du cadre de vie et du bien-être des populations ;</li>\r\n 	<li data-section-id=\"un9rlh\" data-start=\"1170\" data-end=\"1425\">Soutenir la mise en œuvre des politiques publiques nationales, ainsi que les initiatives des collectivités territoriales, du secteur privé, de la société civile et des établissements de recherche, en matière d’environnement et de changement climatique ;</li>\r\n 	<li data-section-id=\"13wrk74\" data-start=\"1430\" data-end=\"1529\">Contribuer à la promotion des transports durables et à l’utilisation des énergies renouvelables ;</li>\r\n 	<li data-section-id=\"oegsi1\" data-start=\"1534\" data-end=\"1695\">Suivre et évaluer l’utilisation des ressources mises à disposition, leurs impacts sur l’environnement et les populations, en vue de renforcer leur résilience ;</li>\r\n 	<li data-section-id=\"fn8te4\" data-start=\"1700\" data-end=\"1903\">Mettre en place un cadre de concertation continue avec les partenaires nationaux et internationaux du développement impliqués dans le financement des mesures en faveur de l’environnement et du climat ;</li>\r\n 	<li data-section-id=\"1oh4c3z\" data-start=\"1908\" data-end=\"2255\">Renforcer et développer les capacités institutionnelles et opérationnelles des partenaires nationaux en matière de l’environnement, des ressources naturelles, de la protection du littoral, de lutte contre les changements climatiques ainsi qu’en matière de prospection et de mobilisation des ressources financières nationales et internationales ;</li>\r\n 	<li data-section-id=\"1q34ofz\" data-start=\"2260\" data-end=\"2399\">Promouvoir les partenariats publics-privés en faveur de la protection de l’environnement et de la lutte contre le changement climatique ;</li>\r\n 	<li data-section-id=\"1ep2rzf\" data-start=\"2404\" data-end=\"2513\" data-is-last-node=\"\">Faciliter l’accès aux mécanismes de financement du marché du carbone.</li>\r\n</ul>', 'Mission', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2026-08-07 13:48:31', '2026-08-07 11:48:31', '', 7, 'http://localhost/fondvert/?p=169', 0, 'revision', '', 0),
(170, 2, '2026-08-07 13:49:40', '2026-08-07 11:49:40', 'Le Togo Green Fund intervient dans des domaines stratégiques visant à promouvoir un développement durable, résilient et inclusif. À travers le financement de projets innovants et à fort impact, le Fonds soutient les initiatives contribuant à la protection de l’environnement, à la lutte contre les changements climatiques, à la préservation des ressources naturelles et à l’amélioration des conditions de vie des populations. Ses interventions couvrent notamment la gestion durable des écosystèmes, les énergies renouvelables, l’agriculture résiliente, la gestion des déchets, la protection des ressources en eau, la conservation de la biodiversité ainsi que le renforcement des capacités des acteurs nationaux et locaux.', 'Champs d\' actions', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2026-08-07 13:49:40', '2026-08-07 11:49:40', '', 9, 'http://localhost/fondvert/?p=170', 0, 'revision', '', 0),
(171, 2, '2026-08-07 13:56:03', '2026-08-07 11:56:03', '', 'Projet', '', 'trash', 'closed', 'closed', '', 'projet__trashed', '', '', '2026-08-07 13:59:11', '2026-08-07 11:59:11', '', 0, 'http://localhost/fondvert/?page_id=171', 0, 'page', '', 0),
(172, 2, '2026-08-07 13:56:03', '2026-08-07 11:56:03', '', 'Projet', '', 'inherit', 'closed', 'closed', '', '171-revision-v1', '', '', '2026-08-07 13:56:03', '2026-08-07 11:56:03', '', 171, 'http://localhost/fondvert/?p=172', 0, 'revision', '', 0),
(173, 2, '2026-08-07 14:03:07', '2026-08-07 12:03:07', 'PROJET DE REDUCTION CARBONNE', 'Projet', '', 'publish', 'closed', 'closed', '', 'projet2', '', '', '2026-08-07 14:04:08', '2026-08-07 12:04:08', '', 0, 'http://localhost/fondvert/?page_id=173', 0, 'page', '', 0),
(174, 2, '2026-08-07 14:03:07', '2026-08-07 12:03:07', '', 'Projet', '', 'inherit', 'closed', 'closed', '', '173-revision-v1', '', '', '2026-08-07 14:03:07', '2026-08-07 12:03:07', '', 173, 'http://localhost/fondvert/?p=174', 0, 'revision', '', 0),
(175, 2, '2026-08-07 14:04:08', '2026-08-07 12:04:08', 'PROJET DE REDUCTION CARBONNE', 'Projet', '', 'inherit', 'closed', 'closed', '', '173-revision-v1', '', '', '2026-08-07 14:04:08', '2026-08-07 12:04:08', '', 173, 'http://localhost/fondvert/?p=175', 0, 'revision', '', 0),
(176, 2, '2026-08-07 14:57:45', '2026-08-07 12:57:45', '', 'MERFPCCC', '', 'publish', 'closed', 'closed', '', 'merfpcc', '', '', '2026-08-07 14:57:51', '2026-08-07 12:57:51', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=176', 0, 'partenaire', '', 0),
(177, 2, '2026-08-07 14:55:28', '2026-08-07 12:55:28', '', 'bad', '', 'inherit', 'open', 'closed', '', 'bad', '', '', '2026-08-07 14:55:28', '2026-08-07 12:55:28', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/bad.png', 0, 'attachment', 'image/png', 0),
(178, 2, '2026-08-07 14:55:29', '2026-08-07 12:55:29', '', 'banque-mondiale', '', 'inherit', 'open', 'closed', '', 'banque-mondiale', '', '', '2026-08-07 14:55:29', '2026-08-07 12:55:29', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/banque-mondiale.png', 0, 'attachment', 'image/png', 0),
(179, 2, '2026-08-07 14:55:30', '2026-08-07 12:55:30', '', 'boad', '', 'inherit', 'open', 'closed', '', 'boad', '', '', '2026-08-07 14:55:30', '2026-08-07 12:55:30', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/boad.jpg', 0, 'attachment', 'image/jpeg', 0),
(180, 2, '2026-08-07 14:55:31', '2026-08-07 12:55:31', '', 'gef', '', 'inherit', 'open', 'closed', '', 'gef', '', '', '2026-08-07 14:55:31', '2026-08-07 12:55:31', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/gef.jpg', 0, 'attachment', 'image/jpeg', 0),
(181, 2, '2026-08-07 14:55:32', '2026-08-07 12:55:32', '', 'GGGITG', '', 'inherit', 'open', 'closed', '', 'gggitg', '', '', '2026-08-07 14:55:32', '2026-08-07 12:55:32', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/GGGITG.jpg', 0, 'attachment', 'image/jpeg', 0),
(182, 2, '2026-08-07 14:55:32', '2026-08-07 12:55:32', '', 'giz', '', 'inherit', 'open', 'closed', '', 'giz', '', '', '2026-08-07 14:55:32', '2026-08-07 12:55:32', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/giz.jpg', 0, 'attachment', 'image/jpeg', 0),
(183, 2, '2026-08-07 14:55:33', '2026-08-07 12:55:33', '', 'logomerf', '', 'inherit', 'open', 'closed', '', 'logomerf', '', '', '2026-08-07 14:55:33', '2026-08-07 12:55:33', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/logomerf.png', 0, 'attachment', 'image/png', 0),
(184, 2, '2026-08-07 14:55:34', '2026-08-07 12:55:34', '', 'pnud', '', 'inherit', 'open', 'closed', '', 'pnud-2', '', '', '2026-08-07 14:55:34', '2026-08-07 12:55:34', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/pnud.jpg', 0, 'attachment', 'image/jpeg', 0),
(185, 2, '2026-08-07 14:58:12', '2026-08-07 12:58:12', '', 'GIZ', '', 'publish', 'closed', 'closed', '', 'giz', '', '', '2026-08-07 14:58:12', '2026-08-07 12:58:12', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=185', 0, 'partenaire', '', 0),
(186, 2, '2026-08-07 14:58:32', '2026-08-07 12:58:32', '', 'PNUD', '', 'publish', 'closed', 'closed', '', 'pnud', '', '', '2026-08-07 14:58:32', '2026-08-07 12:58:32', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=186', 0, 'partenaire', '', 0),
(187, 2, '2026-08-07 14:58:51', '2026-08-07 12:58:51', '', 'GGGI', '', 'publish', 'closed', 'closed', '', 'gggi', '', '', '2026-08-07 14:58:51', '2026-08-07 12:58:51', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=187', 0, 'partenaire', '', 0),
(188, 2, '2026-08-07 14:59:08', '2026-08-07 12:59:08', '', 'BM', '', 'publish', 'closed', 'closed', '', 'bm', '', '', '2026-08-07 14:59:08', '2026-08-07 12:59:08', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=188', 0, 'partenaire', '', 0),
(189, 2, '2026-08-07 14:59:27', '2026-08-07 12:59:27', '', 'BOAD', '', 'publish', 'closed', 'closed', '', 'boad', '', '', '2026-08-07 14:59:27', '2026-08-07 12:59:27', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=189', 0, 'partenaire', '', 0),
(190, 2, '2026-08-07 15:00:04', '2026-08-07 13:00:04', '', 'BAD', '', 'publish', 'closed', 'closed', '', 'bad', '', '', '2026-08-07 15:00:04', '2026-08-07 13:00:04', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=190', 0, 'partenaire', '', 0),
(191, 2, '2026-08-07 15:00:07', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2026-08-07 15:00:07', '0000-00-00 00:00:00', '', 0, 'http://localhost/fondvert/?post_type=partenaire&p=191', 0, 'partenaire', '', 0),
(192, 2, '2026-08-07 15:00:33', '2026-08-07 13:00:33', '', 'GEF', '', 'publish', 'closed', 'closed', '', 'gef', '', '', '2026-08-07 15:00:42', '2026-08-07 13:00:42', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=192', 0, 'partenaire', '', 0),
(193, 2, '2026-08-07 15:05:59', '2026-08-07 13:05:59', '', 'giz2', '', 'publish', 'closed', 'closed', '', 'giz2', '', '', '2026-08-07 15:10:06', '2026-08-07 13:10:06', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=193', 0, 'partenaire', '', 0),
(194, 2, '2026-08-07 15:07:57', '2026-08-07 13:07:57', '', 'Finance', '', 'inherit', 'open', 'closed', '', 'finance', '', '', '2026-08-07 15:07:57', '2026-08-07 13:07:57', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/Finance.jpg', 0, 'attachment', 'image/jpeg', 0),
(195, 2, '2026-08-07 15:07:58', '2026-08-07 13:07:58', '', 'giz2', '', 'inherit', 'open', 'closed', '', 'giz2-2', '', '', '2026-08-07 15:07:58', '2026-08-07 13:07:58', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/giz2.jpg', 0, 'attachment', 'image/jpeg', 0),
(196, 2, '2026-08-07 15:07:59', '2026-08-07 13:07:59', '', 'luxdev', '', 'inherit', 'open', 'closed', '', 'luxdev', '', '', '2026-08-07 15:07:59', '2026-08-07 13:07:59', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/luxdev.jpeg', 0, 'attachment', 'image/jpeg', 0),
(197, 2, '2026-08-07 15:08:01', '2026-08-07 13:08:01', '', 'UE', '', 'inherit', 'open', 'closed', '', 'ue', '', '', '2026-08-07 15:08:01', '2026-08-07 13:08:01', '', 0, 'http://localhost/fondvert/wp-content/uploads/2026/08/UE.jpg', 0, 'attachment', 'image/jpeg', 0),
(198, 2, '2026-08-07 15:09:26', '2026-08-07 13:09:26', '', 'MEF', '', 'publish', 'closed', 'closed', '', 'mef', '', '', '2026-08-07 15:09:26', '2026-08-07 13:09:26', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=198', 0, 'partenaire', '', 0),
(199, 2, '2026-08-07 15:09:44', '2026-08-07 13:09:44', '', 'UE', '', 'publish', 'closed', 'closed', '', 'ue', '', '', '2026-08-07 15:09:44', '2026-08-07 13:09:44', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=199', 0, 'partenaire', '', 0),
(200, 2, '2026-08-07 15:10:37', '2026-08-07 13:10:37', '', 'Luxdev', '', 'publish', 'closed', 'closed', '', 'luxdev', '', '', '2026-08-07 15:10:37', '2026-08-07 13:10:37', '', 0, 'http://localhost/fondvert/?post_type=partenaire&#038;p=200', 0, 'partenaire', '', 0),
(201, 2, '2026-08-07 17:01:15', '2026-08-07 15:01:15', '{\n    \"blogname\": {\n        \"value\": \"Togo Green Fund\",\n        \"type\": \"option\",\n        \"user_id\": 2,\n        \"date_modified_gmt\": \"2026-08-07 15:01:15\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'bfc2e987-33fb-46b5-acb9-bcd3c84cb241', '', '', '2026-08-07 17:01:15', '2026-08-07 15:01:15', '', 0, 'http://localhost/fondvert/non-classe/bfc2e987-33fb-46b5-acb9-bcd3c84cb241/', 0, 'customize_changeset', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Non classé', 'non-classe', 0);

-- --------------------------------------------------------

--
-- Structure de la table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(76, 1, 0),
(79, 1, 0),
(82, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin_abou'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'modern'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:2:{s:64:\"7d1f8244938ceabbf24b7003a8f7728e7ae78d05937185aaee76d0948f58aa39\";a:4:{s:10:\"expiration\";i:1785980454;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36\";s:5:\"login\";i:1785807654;}s:64:\"acc6319e07925c31eb5fcdaf1fa56687c9f1c07719d9b648f51559812fb694bb\";a:4:{s:10:\"expiration\";i:1786033216;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36\";s:5:\"login\";i:1785860416;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '44'),
(18, 1, 'wp_user-settings', 'libraryContent=browse'),
(19, 1, 'wp_user-settings-time', '1785808362'),
(20, 2, 'nickname', 'admin_rebecca'),
(21, 2, 'first_name', 'Rebecca'),
(22, 2, 'last_name', 'Menv'),
(23, 2, 'description', ''),
(24, 2, 'rich_editing', 'true'),
(25, 2, 'syntax_highlighting', 'true'),
(26, 2, 'comment_shortcuts', 'false'),
(27, 2, 'admin_color', 'modern'),
(28, 2, 'use_ssl', '0'),
(29, 2, 'show_admin_bar_front', 'true'),
(30, 2, 'locale', ''),
(31, 2, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(32, 2, 'wp_user_level', '10'),
(33, 2, 'dismissed_wp_pointers', ''),
(35, 2, 'wp_dashboard_quick_press_last_post_id', '110'),
(36, 2, 'session_tokens', 'a:6:{s:64:\"adfc498bf7f5c5cb0d1e089afad8777ced43a11006527cfd342f332938cecfd2\";a:4:{s:10:\"expiration\";i:1786210350;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786037550;}s:64:\"66ef99d814d00a655d2b9dcc03b1e1833f7773d9daaac561c640b061a95b36d6\";a:4:{s:10:\"expiration\";i:1786228141;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786055341;}s:64:\"ce6a41e94426c75995b260bf93de84a4a74d8c99be6bc17ba30aa4f29defda4c\";a:4:{s:10:\"expiration\";i:1786274346;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786101546;}s:64:\"4c1e7b9d15690b8028f7651f7f0585ab4b7a6858d901a777fd9b32d1341686cb\";a:4:{s:10:\"expiration\";i:1786279907;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786107107;}s:64:\"63e7d5a40134e5cbd81a331c0680d19e4377aafca91a8b3632486c035ef2450a\";a:4:{s:10:\"expiration\";i:1786287651;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786114851;}s:64:\"5aa13a3aae5f5b9b3d7df6dc842bb2a0793747d59acdc7b88d24be3d3c3043d4\";a:4:{s:10:\"expiration\";i:1786296929;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:125:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0\";s:5:\"login\";i:1786124129;}}'),
(37, 2, 'wp_user-settings', 'mfold=o&libraryContent=browse'),
(38, 2, 'wp_user-settings-time', '1786050854'),
(39, 2, 'closedpostboxes_document', 'a:0:{}'),
(40, 2, 'metaboxhidden_document', 'a:1:{i:0;s:7:\"slugdiv\";}'),
(41, 2, 'meta-box-order_document', 'a:4:{s:15:\"acf_after_title\";s:0:\"\";s:4:\"side\";s:23:\"submitdiv,pageparentdiv\";s:6:\"normal\";s:27:\"slugdiv,fvt_document_fields\";s:8:\"advanced\";s:0:\"\";}'),
(42, 2, 'screen_layout_document', '2');

-- --------------------------------------------------------

--
-- Structure de la table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin_abou', '$wp$2y$10$EBkUHieNLDoPfgUpKgPNlep8U11M3tW96TCHf0b9uWu1oYkYarpMa', 'admin_abou', 'aboukadani@gmail.com', 'http://localhost/fondvert', '2026-07-22 10:28:23', '', 0, 'admin_abou'),
(2, 'admin_rebecca', '$wp$2y$10$i5ZuLOH8Ow9laD25fVZcG.OOxY28CEVYS0kEpCZDqrfTQOel6eG5y', 'admin_rebecca', 'abouyggg63@gmail.com', '', '2026-08-04 16:39:58', '', 0, 'Rebecca Menv');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Index pour la table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Index pour la table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Index pour la table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `type_status_author` (`post_type`,`post_status`,`post_author`);

--
-- Index pour la table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Index pour la table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Index pour la table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Index pour la table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT pour la table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT pour la table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT pour la table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
