-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoliowebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_subtitle` text NOT NULL,
  `profile_pic` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`user_id`, `id`, `about_title`, `about_subtitle`, `profile_pic`, `about_desc`) VALUES
(1, 1, 'Frontend Designer', 'Web Designer', '1684244996awa.jpg', 'A frontend designer is a creative professional who specializes in designing and implementing the visual and interactive elements of a website or application. They play a crucial role in enhancing the user experience (UX) and ensuring that the frontend of a digital product is aesthetically appealing, user-friendly, and functional.\r\n\r\nFrontend designers possess a strong blend of artistic and technical skills. They have a deep understanding of design principles, typography, color theory, and layout composition. They leverage their creativity to conceptualize and produce visually engaging interfaces that align with the brand\'s identity and target audience.\r\n\r\nIn addition to their artistic abilities, frontend designers are proficient in various frontend technologies, such as HTML, CSS, and JavaScript. They possess a solid understanding of responsive design and are capable of implementing designs that adapt seamlessly to different screen sizes and devices.'),
(12, 2, 'fsdf', 'fsdf', '1689306048295831927_1866260736911623_418230674605878930_n.jpg', 'fsdfas');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_prof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `admin_prof`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', '1689520986download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_about`
--

CREATE TABLE `admin_about` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `about_desc` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `about_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_about`
--

INSERT INTO `admin_about` (`admin_id`, `id`, `about_desc`, `mission`, `vision`, `about_img`) VALUES
(1, 1, 'GreenBin is a groundbreaking software aimed at reducing food waste in food establishments worldwide. It offers an intuitive interface for tracking inventory, identifying waste points, and making informed decisions to cut excess food. With customizable features, it adapts to the unique needs of each business. GreenBin also fosters a community of sustainability advocates, offering a platform for sharing ideas and best practices. The team is dedicated to innovation, continuously improving the software to provide the best solutions. Join GreenBin to work towards a more sustainable future where food waste is minimized.', 'Our mission is simple yet profound: to empower food establishments to minimize their environmental footprint and contribute to a sustainable future. We understand that the food industry plays a significant role in the wastage of edible goods, and we aim to change that through cutting-edge technology and effective strategies.', 'Our vision is to create a world where restaurants, cafes, and other food-related businesses can significantly reduce their food waste, making a positive impact on both the environment and their bottom line.', '1706422942zero-waste-illustration-of-eco-friendly-with-recyclable-and-reusable-products-for-save-the-planet-and-go-green-in-flat-cartoon-background-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_developers`
--

CREATE TABLE `admin_developers` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `deve_profile` varchar(255) NOT NULL,
  `social` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_developers`
--

INSERT INTO `admin_developers` (`admin_id`, `id`, `Name`, `Description`, `deve_profile`, `social`) VALUES
(1, 8, 'Mark Angelo Advincula', 'Mark Angelo, a skilled web developer, utilized his expertise in coding and programming to bring the art portfolio maker website to life. His knowledge of HTML, CSS, and JavaScript allowed him to create a seamless and interactive user interface, enabling artists to effortlessly showcase their work and customize their portfolios according to their preferences.', '1689431077260719452_1699100533627645_4732290881262139586_n.jpg', 'gelo.Yamamoto.17'),
(1, 12, 'Charles Denzel Lim', 'Charles, a talented graphic designer, played a crucial role in the art portfolio maker website by designing visually stunning templates and layouts that showcased the artwork in a captivating manner. Her keen eye for aesthetics and understanding of user experience ensured that the website was visually appealing and easy to navigate for artists and visitors alike.', '1689431342pabebe.jpg', 'charlesdenzel.lim');

-- --------------------------------------------------------

--
-- Table structure for table `admin_home`
--

CREATE TABLE `admin_home` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `home_title` varchar(255) NOT NULL,
  `home_title2` varchar(255) NOT NULL,
  `home_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_home`
--

INSERT INTO `admin_home` (`admin_id`, `id`, `home_title`, `home_title2`, `home_desc`) VALUES
(1, 1, 'Green', 'Bin', 'GreenBin is an innovative application software designed to tackle the pressing issue of food waste reduction within food establishments, such as restaurants, cafes, hotels, and other commercial kitchens.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_homebg`
--

CREATE TABLE `admin_homebg` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `background_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_homebg`
--

INSERT INTO `admin_homebg` (`admin_id`, `id`, `background_img`) VALUES
(1, 1, '1706422521greenbin.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_services`
--

CREATE TABLE `admin_services` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_des` varchar(255) NOT NULL,
  `service_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_services`
--

INSERT INTO `admin_services` (`admin_id`, `id`, `service_title`, `service_des`, `service_link`) VALUES
(1, 7, 'Web Design and Development', 'Offer website design and development services to create visually appealing, functional, and user-friendly websites.', 'https://www.scnsoft.com/services/web-development'),
(1, 8, 'Photography and Videography', 'Provide professional photography and videography services for events, product shoots, or promotional content.', 'https://www.manilaphotography.ph/'),
(1, 10, 'Graphic and UI/UX Design', 'Offer user interface (UI) and user experience (UX),  graphic design services for creating logos, branding materials, illustrations, infographics, and other visual assets. ', 'https://www.designcrowd.com/design-services');

-- --------------------------------------------------------

--
-- Table structure for table `admin_social`
--

CREATE TABLE `admin_social` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_social`
--

INSERT INTO `admin_social` (`admin_id`, `id`, `twitter`, `facebook`, `instagram`, `skype`, `youtube`, `linkedin`) VALUES
(1, 1, 'Artabode24970', '100094881008312', 'artabode617', 'invite/pibmwWd2Fm0s', 'channel/UC72UHW3URiB-ZX_46Dbd75w', 'in/art-abode-902a15283');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`user_id`, `id`, `address`, `email`, `mobile`) VALUES
(1, 1, 'Quezon City, Metro Manila, Philippines, 1116', 'cedricvico@gmail.com', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `happy_clients` int(11) NOT NULL,
  `projects` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `awards` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`user_id`, `id`, `happy_clients`, `projects`, `hours`, `awards`) VALUES
(1, 1, 254, 24, 1543, 10),
(12, 2, 23213, 23, 31312, 3213);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `showicons` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`user_id`, `id`, `title`, `subtitle`, `showicons`) VALUES
(1, 1, 'Cedric Noah Vico', 'I am a Frontend Developer from Rizal, Philippines', 'on'),
(2, 2, 'Mark Angeloi Advincula', 'Yiee', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `inter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`user_id`, `id`, `inter_name`) VALUES
(1, 1, 'Painting'),
(1, 2, 'Line Art'),
(1, 4, 'Sculpture'),
(1, 5, 'Digital Arts');

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE `orgs` (
  `admin_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `orgs_profile` text NOT NULL,
  `website_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`admin_id`, `id`, `name`, `number`, `email`, `location`, `orgs_profile`, `website_link`) VALUES
(1, 1, 'Philippine Food Bank Foundation Inc.', 'N/A', 'foodbankph@email.com', 'Quezon City, Philippines', 'kisspng-building-business-biurowiec-organization-scalable-buildings-office-icons-1-875-free-vector-icons-5b682bf9d70ff3.4680321115335536578809.jpg', 'https://foodbank.org.ph/'),
(1, 2, 'Avilon Zoo', 'N/A', 'avilonzoo@gmail.com', '9003 GP Sitio Gulod, San Isidro, 1860 Rodriguez, Rizal, Philippines', '', ''),
(1, 3, 'Global Seed Savers PH', 'N/A', 'programs@globalseedsavers.org', 'Benguet, Cebu', '', ''),
(1, 4, 'All Waste Services, Inc.', '0917 255 9278', 'sales@aws.ph', 'One Park Drive, Unit 1208,\r\n9th Avenue corner, 11th Drive,\r\nBonifacio Global City 1630,\r\nPhilippines', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`user_id`, `id`, `label`, `value`) VALUES
(1, 1, 'Name', 'Cedric Vico'),
(1, 2, 'Email', 'cedricvico@gmail.com'),
(1, 3, 'Birthday', 'December 25, 1999'),
(1, 4, 'Website', 'www.portfoliowebsite.com'),
(1, 5, 'Contact #', '09991234561'),
(1, 6, 'Freelance', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `project_pic` text NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`user_id`, `id`, `project_pic`, `project_type`, `project_name`, `project_link`) VALUES
(1, 2, 'about.png', 'Painting', 'Sample', 'Sample.com'),
(1, 3, 'about.png', 'LINE ART', 'Sample', 'Sample.com');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `about_exp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`user_id`, `id`, `type`, `title`, `time`, `org`, `about_exp`) VALUES
(1, 1, 'e', 'Bachelor of Science in Computer Science', '2020 - 2023', 'CCIS', 'Frontend developers typically have experience in creating and implementing user interfaces for websites or applications using frontend technologies such as HTML, CSS, and JavaScript. They have a solid understanding of responsive design principles and can adapt designs to different screen sizes and devices.'),
(1, 6, 'p', 'Full Stack Feveloper', '2020-2023', 'Polytechnic University of the Philippines', 'As a full stack developer, I have gained extensive experience working with both frontend and backend technologies, allowing me to effectively contribute to the entire software development process. Over the years, I have successfully completed various projects, honing my skills in multiple programming languages, frameworks, and databases. ');

-- --------------------------------------------------------

--
-- Table structure for table `section_control`
--

CREATE TABLE `section_control` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `home_section` varchar(255) NOT NULL,
  `about_section` varchar(255) NOT NULL,
  `resume_section` varchar(255) NOT NULL,
  `services_section` varchar(255) NOT NULL,
  `portfolio_section` varchar(255) NOT NULL,
  `contact_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_control`
--

INSERT INTO `section_control` (`user_id`, `id`, `home_section`, `about_section`, `resume_section`, `services_section`, `portfolio_section`, `contact_section`) VALUES
(2, 2, 'on', 'on', 'on', 'on', 'on', 'on'),
(12, 3, 'on', 'on', 'on', 'on', 'on', 'on'),
(1, 5, 'on', 'on', 'on', 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `siteicon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`user_id`, `id`, `page_title`, `keywords`, `description`, `siteicon`) VALUES
(1, 2, 'Portfolio Website', 'portfolio', 'Portfolio for Visual Artists', '1689330729logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_desc` varchar(255) NOT NULL,
  `service_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`user_id`, `id`, `service_name`, `service_desc`, `service_link`) VALUES
(1, 1, 'Digitally Art', 'Utilizing digital tools, software, and techniques to create artwork, including digital painting, graphic\r\n              design, and illustration.', 'https://en.wikipedia.org/wiki/Digital_art'),
(1, 3, 'Graphic and UI/UX Design', 'Offer user interface (UI) and user experience (UX), graphic design services for creating logos, branding materials, illustrations, infographics, and other visual assets.', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `site_background`
--

CREATE TABLE `site_background` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `background_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_background`
--

INSERT INTO `site_background` (`user_id`, `id`, `background_img`) VALUES
(1, 1, '16896919880_5De77iUQrILdDp0X.jpg'),
(12, 2, '1689305606e07d228a9c1ce2f48caae0cd3c953574.png');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`user_id`, `id`, `skill_name`, `skill_level`) VALUES
(1, 1, 'HTML', 95),
(1, 2, 'CSS', 100),
(1, 3, 'Python', 90),
(1, 4, 'Javascript', 100),
(1, 7, 'Java', 100),
(1, 10, 'CSSS', 51);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`user_id`, `id`, `twitter`, `facebook`, `instagram`, `skype`, `youtube`, `linkedin`) VALUES
(1, 1, 'twitter.com', 'gelo.Yamamoto.17', 'instagram.com', 'skype.com', 'youtube.com', 'linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `testimonial` text NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`user_id`, `id`, `testimonial`, `test_name`, `position`, `profile`) VALUES
(1, 1, 'Working with Cedric was an absolute pleasure. Their attention to detail and design skills are exceptional. They took our vision and transformed it into a stunning and user-friendly website. The frontend code they delivered was clean, well-structured, and ', 'Faye Pabulayan', 'Manager', '1684244875awa.jpg'),
(1, 2, 'A frontend designer is a creative professional who specializes in designing and implementing the visual and interactive elements of a website or application. They play a crucial role in enhancing the user experience (UX) and ensuring that the frontend of a digital product is aesthetically appealing, user-friendly, and functional. ', 'Gelo', 'Assistant', '1684244898awa.jpg'),
(1, 3, 'rewqrvfcerthrfdhgdgdhgfd', 'Nica', 'Secretary', '1684244898awa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `user_profile` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `user_profile`, `email`, `password`, `code`) VALUES
(1, 'User1', '17064249641689498637download.jpg', 'user@gmail.com', 'user123', 'a173273456d32f5ade4b2467794d31a1');

-- --------------------------------------------------------

--
-- Table structure for table `waste`
--

CREATE TABLE `waste` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `weight` int(65) NOT NULL,
  `wasteType` enum('Rinds, Peels, and Shells','Meat and Bones','Seeds and Nuts','Stems, Leaves, and Plant Scraps','Spoiled and Unusable') NOT NULL,
  `xdate` date NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste`
--

INSERT INTO `waste` (`id`, `item`, `weight`, `wasteType`, `xdate`, `contact`) VALUES
(9, 'cabbage', 3, 'Stems, Leaves, and Plant Scraps', '2023-07-29', ''),
(10, 'somehtinh', 4, 'Meat and Bones', '2023-07-28', ''),
(16, 'potato', 5, 'Rinds, Peels, and Shells', '2023-08-04', 'Philippine Food Bank Foundation Inc.'),
(17, 'orange', 2, 'Spoiled and Unusable', '2023-07-27', 'Green Space');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_about`
--
ALTER TABLE `admin_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_developers`
--
ALTER TABLE `admin_developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_home`
--
ALTER TABLE `admin_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_homebg`
--
ALTER TABLE `admin_homebg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_services`
--
ALTER TABLE `admin_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_social`
--
ALTER TABLE `admin_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_control`
--
ALTER TABLE `section_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_background`
--
ALTER TABLE `site_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `waste`
--
ALTER TABLE `waste`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_about`
--
ALTER TABLE `admin_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_developers`
--
ALTER TABLE `admin_developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_home`
--
ALTER TABLE `admin_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_homebg`
--
ALTER TABLE `admin_homebg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_services`
--
ALTER TABLE `admin_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_social`
--
ALTER TABLE `admin_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orgs`
--
ALTER TABLE `orgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section_control`
--
ALTER TABLE `section_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_background`
--
ALTER TABLE `site_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `waste`
--
ALTER TABLE `waste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
