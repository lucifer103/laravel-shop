-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- 主机： mysql
-- 生成日期： 2020-02-16 11:48:19
-- 服务器版本： 5.7.29
-- PHP 版本： 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `laravel-shop`
--

--
-- 转存表中的数据 `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '首页', 'fa-bar-chart', '/', NULL, NULL, '2020-02-07 05:38:40'),
(2, 0, 6, '系统管理', 'fa-tasks', NULL, NULL, NULL, '2020-02-14 19:41:46'),
(3, 2, 7, '管理员', 'fa-users', 'auth/users', NULL, NULL, '2020-02-14 19:41:46'),
(4, 2, 8, '角色', 'fa-user', 'auth/roles', NULL, NULL, '2020-02-14 19:41:47'),
(5, 2, 9, '权限', 'fa-ban', 'auth/permissions', NULL, NULL, '2020-02-14 19:41:47'),
(6, 2, 10, '菜单', 'fa-bars', 'auth/menu', NULL, NULL, '2020-02-14 19:41:47'),
(7, 2, 11, '操作日志', 'fa-history', 'auth/logs', NULL, NULL, '2020-02-14 19:41:47'),
(8, 0, 2, '用户管理', 'fa-users', '/users', NULL, '2020-02-07 05:40:28', '2020-02-07 05:40:40'),
(9, 0, 3, '商品管理', 'fa-cubes', '/products', NULL, '2020-02-07 05:51:07', '2020-02-07 05:51:20'),
(10, 0, 4, '订单管理', 'fa-cny', '/orders', NULL, '2020-02-13 03:52:03', '2020-02-13 03:52:16'),
(11, 0, 5, '优惠券管理', 'fa-tags', '/coupon_codes', NULL, '2020-02-14 19:41:04', '2020-02-14 19:41:46');

--
-- 转存表中的数据 `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, '用户管理', 'users', '', '/users*', '2020-02-07 05:43:22', '2020-02-07 05:43:22'),
(7, '商品管理', 'products', '', '/products*', '2020-02-15 21:14:50', '2020-02-15 21:14:50'),
(8, '优惠券管理', 'coupon_codes', '', '/coupon_codes*', '2020-02-15 21:15:33', '2020-02-15 21:15:33'),
(9, '订单管理', 'orders', '', '/orders*', '2020-02-15 21:15:58', '2020-02-15 21:15:58');

--
-- 转存表中的数据 `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2020-02-07 05:34:35', '2020-02-07 05:34:35'),
(2, '运营', 'operation', '2020-02-07 05:45:52', '2020-02-07 05:45:52');

--
-- 转存表中的数据 `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

--
-- 转存表中的数据 `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL);

--
-- 转存表中的数据 `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$pVcfNGeQyv9Yw3pQ/DtjfOxU6dPVZzZJCUnRo3qJSK1/GQHnGjGW6', 'Administrator', NULL, 'HqRr2CaGmzhTNEOW066wSB6sXFopNX8tGuC5l4eZNOU7uOWUZj5qvR7apgWr', '2020-02-07 05:34:35', '2020-02-07 05:34:35'),
(2, 'operator', '$2y$10$BDLNVL3IlHxuU6VQ0/WTPuIixouVfRW2Us8duY18BQgkX6W3MEX2m', '运营', NULL, 'RxpfeLZhffna1Y0UGuwAVDnCfSNze7cLuABgNq6nMC0CZFl5Y3LPBS099EfM', '2020-02-07 05:49:10', '2020-02-07 05:49:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
