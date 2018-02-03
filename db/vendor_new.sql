-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 05:28 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm`
--

CREATE TABLE IF NOT EXISTS `crm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `crm`
--

INSERT INTO `crm` (`id`, `name`, `status`) VALUES
(1, 'aswin', 1),
(2, 'akhil', 1),
(3, 'nithin', 1),
(4, 'gta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `primary_contact_no` varchar(255) NOT NULL,
  `secondary_contact_no` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `category_type` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `f_name`, `m_name`, `l_name`, `email`, `primary_contact_no`, `secondary_contact_no`, `profile_pic`, `category_type`, `category_id`) VALUES
(1, 1, 'Nithin', '', 'Benny', 'superadmin', '9632587415', '7845121245', '', 0, 0),
(2, 2, 'Aswin', '', 'B', 'aswin@endor.com', '9632587415', '9874563210', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE IF NOT EXISTS `functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) NOT NULL,
  `admin_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`id`, `function_name`, `admin_flag`) VALUES
(1, 'Add Category', 1),
(2, 'Edit Category', 1),
(3, 'View Category', 0),
(4, 'Add Role', 1),
(5, 'Edit Role', 1),
(6, 'View Role', 0),
(7, 'Add Department', 0),
(8, 'Edit Department', 0),
(9, 'View Department', 0),
(10, 'Add Function Role Mapping', 1),
(11, 'Edit Function Role Mapping', 1),
(12, 'View Function Role Mapping', 1),
(13, 'Add Employee', 1),
(14, 'Edit Employee', 1),
(15, 'View Employee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guest_enquiry`
--

CREATE TABLE IF NOT EXISTS `guest_enquiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(200) NOT NULL,
  `guest_email` varchar(200) NOT NULL,
  `guest_address1` varchar(200) NOT NULL,
  `guest_city` varchar(200) NOT NULL,
  `guest_mobile` varchar(200) NOT NULL,
  `guest_alt_email` varchar(200) NOT NULL,
  `guest_address2` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `guest_alt_mobile` varchar(200) NOT NULL,
  `input_user` varchar(200) NOT NULL,
  `guest_country` varchar(200) NOT NULL,
  `guest_details_ref` varchar(200) NOT NULL,
  `guest_enquiry_ref` varchar(200) NOT NULL,
  `enquiry_date` varchar(200) NOT NULL,
  `enquiry_reference` varchar(200) NOT NULL,
  `enquiry_ext_rfn_no` varchar(200) NOT NULL,
  `enquiry_status` varchar(200) NOT NULL,
  `enquiry_crm` varchar(200) NOT NULL,
  `enquiry_input_by` varchar(200) NOT NULL,
  `enquiry_remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guest_details_ref` (`guest_details_ref`),
  UNIQUE KEY `guest_enquiry_ref` (`guest_enquiry_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `guest_enquiry`
--

INSERT INTO `guest_enquiry` (`id`, `guest_name`, `guest_email`, `guest_address1`, `guest_city`, `guest_mobile`, `guest_alt_email`, `guest_address2`, `state`, `guest_alt_mobile`, `input_user`, `guest_country`, `guest_details_ref`, `guest_enquiry_ref`, `enquiry_date`, `enquiry_reference`, `enquiry_ext_rfn_no`, `enquiry_status`, `enquiry_crm`, `enquiry_input_by`, `enquiry_remarks`) VALUES
(2, 'Amal GTA', 'amal@gta.in', 'Home1', 'Koothuparambu', '9874563210', 'gta@amal.com', 'Home', 'Kerala', '', 'Nithin Benny', '1', '5a15c74c743e9', '5a15c74c743ed', '23-Nov-2017', '1', 'ASWW2', 'Active', '3', 'Nithin Benny', 'kndknkln klnkla   fmad zknkn  d'),
(3, 'Thomas', 'thomas@gmail.com', 'Home1', 'Kannur', '9874563210', '', 'Home2', 'Kerala', '9874563215', 'Nithin Benny', '1', '5a185b766f1a2', '5a185b766f1a7', '24-Nov-2017', '1', 'GSHJ4566', 'Active', '2', 'Nithin Benny', 'There is something wrong with the proxy server, or the address is incorrect.');

-- --------------------------------------------------------

--
-- Table structure for table `guest_enquiry_master`
--

CREATE TABLE IF NOT EXISTS `guest_enquiry_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_enquiry_id` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `add_extra_bed` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `small_children` int(11) NOT NULL,
  `extra_children` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `guest_enquiry_master`
--

INSERT INTO `guest_enquiry_master` (`id`, `guest_enquiry_id`, `adults`, `rooms`, `add_extra_bed`, `children`, `extra_bed`, `transport`, `small_children`, `extra_children`) VALUES
(1, 3, 4, 2, 2, 1, 2, 1, 1, 5),
(2, 2, 4, 2, 2, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `normal_user`
--

CREATE TABLE IF NOT EXISTS `normal_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `concat_number` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `category_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `normal_user`
--

INSERT INTO `normal_user` (`id`, `user_id`, `f_name`, `m_name`, `l_name`, `email`, `concat_number`, `profile_pic`, `category_type_id`, `category_id`, `status`) VALUES
(1, 25, 'Nithin', '', 'Benny', 'nithin@gmail.com', '9048405074', '', 2, 1, 0),
(2, 26, 'Navas', '', 'S', 'navas@gmail.com', '9856231245', '', 2, 2, 0),
(3, 27, 'Avinash', '', 'Bala', 'avnish@gmail.com', '8956231245', '', 2, 1, 0),
(4, 0, 'Jojo', '', 'George', 'nithin719@gmail.com', '9845742512', '', 2, 6, 0),
(5, 32, 'Jojo', '', 'George', 'nithin719@gmail.com', '9845742512', '', 2, 6, 0),
(6, 33, 'Winston', '', 'R', 'winston@gmail.com', '8523697410', '', 2, 5, 0),
(7, 39, 'Ramjith', '', 'R', 'ram@gmail.com', '8523697410', '', 2, 7, 0),
(8, 0, 'AAA', '', 'aaa', 'aaa@gmail.com', '9656863623', '', 2, 7, 0),
(9, 0, 'AAA', '', 'aaa', 'aaa@gmail.com', '9656863623', '', 2, 7, 0),
(10, 41, 'AAA', '', 'aaa', 'aaa@gmail.com', '9656863623', '', 2, 7, 0),
(11, 42, 'ABBB', '', 'dfgsa', 'ann@gmail.com', '9048405074', '', 2, 7, 0),
(12, 43, 'QQQ', '', 'QQ', 'qqqq@gmail.com', '8523697410', '', 2, 7, 0),
(13, 44, 'QQQ', '', 'QQ', 'qqqq@gmail.com', '8523697410', '', 2, 7, 0),
(14, 45, 'QQQ', '', 'QQ', 'qqqq@gmail.com', '8523697410', '', 2, 7, 0),
(15, 46, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(16, 0, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(17, 0, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(18, 48, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(19, 49, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(20, 50, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(21, 51, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(22, 52, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(23, 53, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(24, 54, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(25, 55, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(26, 56, 'Ramjith', '', 'BB', 'ttt@gmail.com', '8875239877', '', 2, 7, 0),
(27, 58, 'baker', '', 'www', 'baker@normal.com', '9048405074', '', 0, 0, 0),
(28, 59, 'Dino', '', 'Benny', 'dd@gg.ffgg', '9048405074', '', 0, 1, 0),
(29, 60, '', '', '', 'gfraeg', '', '', 0, 1, 0),
(30, 61, '', '', '', 'bfgsh@b.fuj', '', '', 0, 2, 0),
(31, 62, '', '', '', 'fgds', '', '', 0, 2, 0),
(32, 63, '', '', '', 'nithin@gmail.co', '', '', 0, 1, 0),
(33, 64, 'QQQ', '', 'Benny', 'gfv@kj.jh', '9048405074', '', 0, 2, 0),
(34, 65, 'Jahsheer', '', 'dsf', 'ghvgv@hjb.dfj', 'dsfv', '', 0, 1, 0),
(35, 66, 'eeeeeeee', '', 'ffffffffff', 'eeee@ff.com', '9656863623', '', 0, 1, 0),
(36, 67, 'Ashin', '', 'ffffffffff', 'ds@ds.ff', '9656863602', '', 0, 1, 0),
(37, 68, 'eeeeeeee', '', 'Benny', 'dfs@sgfg.jh', '7894561239', '', 0, 1, 0),
(38, 69, 'uuuu', '', 'rrr', 'dfsghuig@hjbg.ghh', '9656238956', '', 0, 1, 0),
(39, 70, 'dcsa', '', 'fdsbgv', 'vdd@bgd.fghj', '8956235689', '', 0, 2, 0),
(40, 71, 'eeeeeeee', '', 'ffffffffff', 'yyy@gg.dh', '7894561239', '', 0, 2, 0),
(41, 72, 'Ashin', '', 'R', 'fgvs@hj.gg', '7894561239', '', 0, 2, 0),
(42, 73, 'Nihtin', '', 'Benny', 'www@ff.hh', '7894561239', '', 0, 1, 0),
(43, 74, 'Nihtin', '', 'dsf', 'fff@dd.gg', '7894561239', '', 0, 1, 0),
(44, 75, 'eeeeeeee', '', 'ffffffffff', 'ggg@dee.hh', '8956235689', '', 0, 1, 0),
(45, 76, 'Ashin', '', 'Benny', 'eeee@dfg.gh', '7894561239', '', 0, 1, 0),
(46, 77, '', '', '', 'dsfgds', '', '', 0, 1, 0),
(47, 78, 'Nithin', '', 'Benny', 'dsf@gfhd.dhfg', '9048405074', '', 0, 1, 0),
(48, 79, 'dsf', '', 'dsf', 'jhgdfs@kh.hjg', '9656863602', '', 0, 1, 0),
(49, 80, 'Ashin', '', 'Benny', 'fvdg@dfgh.dfgh', '7894561239', '', 0, 2, 0),
(50, 81, 'dcsa', '', 'ffffffffff', 'fdg@fgh.fghj', '9656863602', '', 0, 1, 0),
(51, 82, 'fg', '', 'fg', 'bdf@df.ghj', '8956235689', '', 0, 1, 0),
(52, 83, 'avinas', '', 'sad', 'qw@q.com', '8956235689', '', 0, 1, 0),
(53, 84, 'asd', '', '', 'q@q.com', '', '', 0, 1, 0),
(54, 85, '', '', '', 'f@f.com', '', '', 0, 1, 0),
(55, 86, 'aa', '', 'aa', 'q@v.com', '8956235689', '', 0, 2, 0),
(56, 87, '', '', '', 'a@v.com', '', '', 0, 1, 0),
(57, 88, 'asdsd', '', 'fdf', 'ff@gg.com', '8956235689', '', 0, 1, 0),
(58, 89, 'Ashin', '', 'dsf', 'fff@ffk.jj', '7894561239', '', 0, 1, 0),
(59, 90, 'Nihtin', '', 'aa', 'bb@ff.hjj', '8956235689', '', 0, 1, 0),
(60, 91, 'Nihtin', '', 'dsf', 'gfsg@fdef.fhj', '7894561239', '', 0, 1, 0),
(61, 122, 'YYYY', '', 'Y', 'yyy@yy.yy', '9656863602', '', 0, 1, 0),
(62, 135, 'ggh', '', 'ggg', 'ggg@gg.com', '8956235689', '', 0, 1, 0),
(63, 151, 'Mahi', '', 'K', 'mahi@wet.com', '7894561239', '', 0, 21, 0),
(64, 152, 'www', '', 'wet', 'www@ww.ww', '8956235689', '3df9c55cdab04863709f062cb9e55eaa1500189385.jpg', 0, 21, 0),
(65, 153, 'QQ', '', 'QQ', 'qqq@qq.qq', '8956235689', '', 0, 21, 0),
(66, 154, 'QQ', '', 'QQ', 'qqq@qq.qq', '8956235689', '', 0, 21, 0),
(67, 155, 'QQ', '', 'QQ', 'qqq@qq.qq', '8956235689', '', 0, 21, 0),
(68, 156, 'RR', '', 'R', 'rr@rr.rr', '8956235689', '', 0, 21, 0),
(69, 157, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(70, 158, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(71, 159, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(72, 160, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(73, 161, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(74, 162, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(75, 163, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(76, 164, 'AAA', '', 'dsf', 'aaa@aa.aa', '8956235689', '', 0, 21, 0),
(77, 165, 'AAA', '', 'AHB', 'aa@aa.aa', '8956235689', '', 0, 21, 0),
(78, 166, 'dcsa', '', 'fdsbgv', 'dsf@fd.ffg', '8956235689', '', 0, 21, 0),
(79, 167, 'dcsa', '', 'fdsbgv', 'dsf@fd.ffg', '8956235689', '', 0, 21, 0),
(80, 168, 'gf', '', 'nfh', 'gd@dfgh.hdft', '8956235689', '', 0, 21, 0),
(81, 169, 'gf', '', 'nfh', 'gd@dfgh.hdft', '8956235689', '', 0, 21, 0),
(82, 170, 'bd', '', 'fdsbgv', 'vfds@gd.ghd', '8956235689', '', 0, 21, 0),
(83, 171, 'bd', '', 'fdsbgv', 'vfds@gd.ghd', '8956235689', '', 0, 21, 0),
(84, 172, 'SS', '', 'SS', 'sss@ss.ss', '8956235689', '', 0, 21, 0),
(85, 173, 'vfds', '', 'vdf', 'ddd@ff.fkj', '8956235689', '', 0, 21, 0),
(86, 174, 'vfds', '', 'vdf', 'ddd@ff.fkj', '8956235689', '', 0, 21, 0),
(87, 175, 'nhg', '', 'ngh', 'vfds@dfg.dfgh', '8956235689', '', 0, 21, 0),
(88, 176, 'bfg', '', 'bgf', 'fd@df.dfg', '8956235689', '', 0, 21, 0),
(89, 177, 'fds', '', 'ffffffffff', 'bujuj@jj.dshj', '8956235689', '', 0, 21, 0),
(90, 178, 'fds', '', 'ffffffffff', 'bujuj@jj.dshj', '8956235689', '', 0, 21, 0),
(91, 179, 'fds', '', 'ffffffffff', 'bujuj@jj.dshj', '8956235689', '', 0, 21, 0),
(92, 180, 'dcsa', '', 'ffffffffff', 'bhh@hh.dj', '8956235689', '', 0, 21, 0),
(93, 181, 'vdsz', '', 'dfvz', 'ghgh@hjvg.dsvc', '8956235689', '', 0, 21, 0),
(94, 182, 'vfds', '', 'fvds', 'df@dfgs.df', '7894561239', '', 0, 21, 0),
(95, 183, 'zzz', '', 'zzz', 'zz@zz.zz', '8956235689', '', 0, 21, 0),
(96, 184, 'bfg', '', 'ngf', 'asd@ff.gg', '8956235689', '', 0, 21, 0),
(97, 185, 'gf', '', 'fbg', 'fgnj@bd.bd', '8956235689', '', 0, 21, 0),
(98, 186, 'gf', '', 'fbg', 'fgnj@bd.bd', '8956235689', '', 0, 21, 0),
(99, 187, 'vf', '', 'vfd', 'bdfsg@dr.tyj', '7894561239', '', 0, 21, 0),
(100, 188, 'bhgtdf', '', 'bhgdr', 'gbfs@hr.hth', '8956235689', '', 0, 21, 0),
(101, 189, 'vfds', '', 'vbfds', 'vdsa@stg.hgf', '8956235689', '', 0, 21, 0),
(102, 190, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(103, 191, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(104, 192, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(105, 193, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(106, 194, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(107, 195, 'vsz', '', 'vfs', 'vcds@ghj.tyhj', '8956235689', '', 0, 21, 0),
(108, 196, 'bgd', '', 'bgd', 'fdg@fdh.gh', '8956235689', '', 0, 21, 0),
(109, 197, 'vf', '', 'vfdsv', 'vdf@fdf.hg', '8956235689', '', 0, 21, 0),
(110, 198, 'ds', '', 'vdfs', 'df@bg.hv', '7894561239', '', 0, 21, 0),
(111, 199, 'cds', '', 'dsvc', 'vfd@fdf.nfg', '8956235689', '', 0, 21, 0),
(112, 200, 'dfbs', '', 'dfsbg', 'dfb@bg.ndfgh', '8956235689', '', 0, 21, 0),
(113, 201, 'dvc', '', 'vdfs', 'vfs@bg.nfg', '8956235689', '', 0, 21, 0),
(114, 202, 'dvc', '', 'vdfs', 'vfs@bg.nfg', '8956235689', '', 0, 21, 0),
(115, 203, 'dvc', '', 'vdfs', 'vfs@bg.nfg', '8956235689', '', 0, 21, 0),
(116, 204, 'dvc', '', 'vdfs', 'vfs@bg.nfg', '8956235689', '', 0, 21, 0),
(117, 205, 'dvf', '', 'vfd', 'dsw@fv.vdr', '9656863602', '', 0, 21, 0),
(118, 206, 'nhg', '', 'fgh', 'dsv@dfgs.fhj', '7894561239', '', 0, 21, 0),
(119, 207, 'vdfs', '', 'ds', 'fdsw@fvd.hg', '8956235689', '', 0, 21, 0),
(120, 208, 'eeeeeeee', '', 'vfd', 'dvc@ssd.dd', '7894561239', '', 0, 21, 0),
(121, 209, 'vds', '', 'vdfs', 'adsf@hftd.htg', '9048405074', '', 0, 21, 0),
(122, 210, 'fhg', '', 'fg', 'bgdf@dfg.fgh', '8956235689', '', 0, 21, 0),
(123, 211, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(124, 212, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(125, 213, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(126, 214, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(127, 215, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(128, 216, 'hfg', '', 'dfgh', 'efs@gdhf.ff', '9656863602', '', 0, 21, 0),
(129, 217, 'dfsg', '', 'dfs', 'ds@vfsv.df', '8956235689', '', 0, 21, 0),
(130, 218, 'fdg', '', 'fdg', 'vhj@hgf.fgrd', '8956235689', '', 0, 21, 0),
(131, 219, 'fdg', '', 'fdg', 'vhj@hgf.fgrd', '8956235689', '', 0, 21, 0),
(132, 220, 'fdg', '', 'fdg', 'vhj@hgf.fgrd', '8956235689', '', 0, 21, 0),
(133, 221, 'fdg', '', 'fdg', 'vhj@hgf.fgrd', '8956235689', '', 0, 21, 0),
(134, 222, 'fdg', '', 'fdg', 'vhj@hgf.fgrd', '8956235689', '', 0, 21, 0),
(135, 223, 'Q', '', 'Q', 'a@gmail.com', '1234567890', '', 0, 20, 0),
(136, 224, 'C', '', 'G', 'c@gmail.com', '8956235689', '', 0, 16, 0),
(137, 225, 'B', '', 'G', 'b@gmail.com', '8956235689', '', 0, 16, 0),
(138, 237, 'Normal', '', 'User', 'normal@normal.com', '8956235689', '', 0, 21, 0),
(139, 265, 'Normal', '', 'User', 'normal@ghs.com', '7894561239', '', 0, 25, 0),
(140, 266, 'New', '', 'Normal', 'new@normal.com', '8956235689', '', 0, 25, 0),
(141, 267, 'New', '', 'Normal', 'new@normal.com', '8956235689', '', 0, 25, 0),
(142, 268, 'Normal', '', '1', 'normal1@normal.com', '8956235689', '', 0, 25, 0),
(143, 269, 'Normal', '', '1', 'normal1@normal.com', '8956235689', '', 0, 25, 0),
(144, 270, 'bgf', '', 'fg', 'dfg@gdfh.yhj', '8956235689', '', 0, 25, 0),
(145, 271, 'bgf', '', 'fg', 'dfg@gdfh.yhj', '8956235689', '', 0, 25, 0),
(146, 272, 'dgh', '', 'df', 'nfdvgkjn@klnj.dd', '8956235689', '', 0, 25, 0),
(147, 290, 'First', '', 'Normal', 'html@normal.com', '8956235689', '', 0, 28, 0),
(148, 291, 'H1', '', 'Benny', 'h1@normal.com', '8956235689', '', 0, 28, 0),
(149, 292, 'H2', '', 'fdsbgv', 'h2@normal.com', '8956235689', '', 0, 28, 0),
(150, 354, 'Athul', '', 'Mohan', 'athulg@cmi.com', '8956235689', '', 0, 28, 0),
(151, 355, 'vfds', '', 'dfsvg', 'bdfg@mugh.hgft', '8956235689', '', 0, 28, 0),
(152, 356, 'frew', '', 'vds', 'qqqkhj@mnd.nhh', '7894561239', '', 0, 28, 0),
(153, 391, 'Ramjith', '', 'K', 'ramjith@kmct.com', '7894561239', '', 0, 40, 0),
(154, 398, 'User', '', 'Has No Name', 'noname@kmct.com', '8956235689', '', 0, 40, 0),
(155, 399, 'User', 'has', 'no name', 'bfdb@gnbhf.gdd', '8956235689', 'avatharbyjaj540d4tmnq11505047519.jpg', 0, 40, 0),
(156, 400, 'QRS', '', 'KMCT', 'qrs@kmct.com', '8956235689', '', 0, 40, 0),
(157, 413, 'Noraml User', '', 'KFC', 'normal@kfc.com', '9656863602', '', 0, 42, 0),
(158, 414, 'sdcx', '', 'cda', 'hhh@jh.khj', '9845742512', '', 0, 42, 0),
(159, 415, 'vfds', '', 'fcdsa', 'tyty@kfc.com', '7894561239', '', 0, 42, 0),
(160, 424, 'KFC Normal', '', 'KFC', 'kfc@kfc.com', '8956235689', '', 0, 42, 0),
(161, 425, 'Normal User', '', 'KMCT', 'normal@kmct.com', '9656863602', '', 0, 40, 0),
(162, 426, 'Normal User', '', 'KMCT', 'normal@kmct.com', '9656863602', '', 0, 40, 0),
(163, 427, 'QW', '', 'KMCT', 'qw@kmct.com', '8956235689', '', 0, 40, 0),
(164, 428, 'AAA', '', 'kjh', 'aaa@kmct.com', '8956235689', '', 0, 40, 0),
(165, 429, 'Krish', '', 'User KMCT', 'krish@kmct.com', '9048405074', '', 0, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `reference`) VALUES
(1, 'hotel sopanam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_type` int(11) NOT NULL,
  `employee_code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_role_type`, `employee_code`, `username`, `password`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'S-Admin', 'superadmin', '4cff8d3b777a1a3024f93ab366ecf409', 1, '2017-02-21 00:00:00', '2017-06-09 08:53:02'),
(2, 2, 'EMP-01', 'aswin@vendor.com', '4cff8d3b777a1a3024f93ab366ecf409', 1, '0000-00-00 00:00:00', '2017-11-20 03:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resort_contact` varchar(255) NOT NULL,
  `resort_phone` varchar(255) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `secondary_email` varchar(255) NOT NULL,
  `reservation_contact` varchar(255) NOT NULL,
  `reservation_phone` varchar(255) NOT NULL,
  `reservation_email` varchar(255) NOT NULL,
  `visited` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `trip_link` varchar(255) NOT NULL,
  `number_rooms` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `input_user` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `resort_contact`, `resort_phone`, `primary_email`, `secondary_email`, `reservation_contact`, `reservation_phone`, `reservation_email`, `visited`, `website`, `trip_link`, `number_rooms`, `rating`, `input_user`, `remarks`) VALUES
(1, 'Nithin Benny', '9048405074', 'nithin719@gmail.com', 'nithin719@gmail.com', 'Ashwin', '9048405074', 'nithin719@gmail.com', '', 'www.google.com', 'www.google.com', '4', 7, '', 'hjgjhg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_category`
--

CREATE TABLE IF NOT EXISTS `vendor_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vendor_category`
--

INSERT INTO `vendor_category` (`id`, `category_name`, `status`) VALUES
(1, 'Deluxe', 1),
(2, 'Budget', 1),
(3, 'Economy', 1),
(4, 'Super Dulexe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE IF NOT EXISTS `vendor_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sub_location` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `priority` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `vendor_name`, `location`, `sub_location`, `type`, `category`, `priority`) VALUES
(1, 'Ashwin', 'Kannur', 'Mambaram', 1, 4, '1'),
(2, 'hello', 'kozhikode', 'westhill', 1, 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_type`
--

CREATE TABLE IF NOT EXISTS `vendor_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_type`
--

INSERT INTO `vendor_type` (`id`, `type_name`, `status`) VALUES
(1, 'Resort', 1),
(2, 'Hotel', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
