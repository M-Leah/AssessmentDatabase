-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2015 at 03:54 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assessmentdatabase`
--


--
-- IMPORTANT NOTE: EXAMPLE DATA HAS BEEN INCLUDED IN THIS INSTALL
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
`assessment_id` int(11) NOT NULL,
  `student_name` varchar(128) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `strand_id` varchar(10) NOT NULL,
  `trafficlight` varchar(16) DEFAULT NULL,
  `comment` text,
  `identifier` varchar(16) NOT NULL,
  `teacher_name` varchar(32) NOT NULL,
  `class_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessment_id`, `student_name`, `unit_id`, `strand_id`, `trafficlight`, `comment`, `identifier`, `teacher_name`, `class_name`) VALUES
(91, 'Joe Bloggs', 4, 'CS1.1', 'Red', 'Failed to understand properly.', 'Test', 'Michael', '8R-IT4'),
(92, 'Joe Bloggs', 4, 'IT1.2', 'Red', 'Failed to understand properly.', 'Test', 'Michael', '8R-IT4'),
(93, 'Joe Bloggs', 4, 'DL1.1', 'Red', 'Failed to understand properly.', 'Test', 'Michael', '8R-IT4'),
(94, 'Alice Example', 4, 'CS1.1', 'Green', 'Performed Well.', 'Test', 'Michael', '8R-IT4'),
(95, 'Alice Example', 4, 'IT1.2', 'Green', 'Performed beyond her target', 'Test', 'Michael', '8R-IT4'),
(96, 'Alice Example', 4, 'DL1.1', 'Green', 'Performed extremely well throughout', 'Test', 'Michael', '8R-IT4'),
(97, 'Bob Example', 4, 'CS1.1', 'Red', 'Struggled to understand properly.', 'Test', 'Michael', '8R-IT4'),
(98, 'Bob Example', 4, 'IT1.2', 'Green', 'Worked beyond the strand''s target', 'Test', 'Michael', '8R-IT4'),
(99, 'Bob Example', 4, 'DL1.1', 'Amber', 'Understood to an extent', 'Test', 'Michael', '8R-IT4'),
(100, 'Joe Harvery', 4, 'CS1.1', 'Amber', 'Understood the concept of algorithms', 'Test', 'Michael', '8R-IT4'),
(101, 'Joe Harvery', 4, 'IT1.2', 'Red', 'Struggles to understand the difference in data types.', 'Test', 'Michael', '8R-IT4'),
(102, 'Joe Harvery', 4, 'DL1.1', 'Amber', 'Understood the concept of internet security.', 'Test', 'Michael', '8R-IT4'),
(103, 'Matthew Wells', 4, 'CS1.1', 'Amber', 'Struggles to grasp the concept of algorithmic thinking', 'Test', 'Michael', '8R-IT4'),
(104, 'Matthew Wells', 4, 'IT1.2', 'Green', 'Understood data types to a high level.', 'Test', 'Michael', '8R-IT4'),
(105, 'Matthew Wells', 4, 'DL1.1', 'Green', 'Understood internet security to a high level', 'Test', 'Michael', '8R-IT4'),
(106, 'James Andrew', 4, 'CS1.1', 'Red', 'Failed to perform to a good standard', 'Test', 'Michael', '8R-IT4'),
(107, 'James Andrew', 4, 'IT1.2', 'Red', 'Failed to perform to a good standard', 'Test', 'Michael', '8R-IT4'),
(108, 'James Andrew', 4, 'DL1.1', 'Red', 'Failed to perform to a good standard', 'Test', 'Michael', '8R-IT4'),
(109, 'Natasha Eagles', 4, 'CS1.1', 'Red', 'Did not understand algorithmic thinking.', 'Test', 'Michael', '8R-IT4'),
(110, 'Natasha Eagles', 4, 'IT1.2', 'Amber', 'Understood different types of data storage.', 'Test', 'Michael', '8R-IT4'),
(111, 'Natasha Eagles', 4, 'DL1.1', 'Green', 'Was very aware of keeping a safety conscious mind online.', 'Test', 'Michael', '8R-IT4'),
(112, 'Andrew Walker', 4, 'CS1.1', 'Red', 'Did not understand the concept of an algorithm.', 'Test', 'Michael', '8R-IT4'),
(113, 'Andrew Walker', 4, 'IT1.2', 'Amber', 'Understood the concept of data types.', 'Test', 'Michael', '8R-IT4'),
(114, 'Andrew Walker', 4, 'DL1.1', 'Amber', 'Understood the importance of online safety.', 'Test', 'Michael', '8R-IT4'),
(115, 'Megan Greenwood', 4, 'CS1.1', 'Red', 'Failed to understand or demonstrate algorithmic thinking', 'Test', 'Michael', '8R-IT4'),
(116, 'Megan Greenwood', 4, 'IT1.2', 'Amber', 'Understood the different forms data can take', 'Test', 'Michael', '8R-IT4'),
(117, 'Megan Greenwood', 4, 'DL1.1', 'Amber', 'Understood online security requirements', 'Test', 'Michael', '8R-IT4'),
(118, 'Kirsty France', 4, 'CS1.1', 'Red', 'Failed to understand', 'Test', 'Michael', '8R-IT4'),
(119, 'Kirsty France', 4, 'IT1.2', 'Red', 'Failed to understand', 'Test', 'Michael', '8R-IT4'),
(120, 'Kirsty France', 4, 'DL1.1', 'Red', 'Failed to understand', 'Test', 'Michael', '8R-IT4'),
(121, 'Joe Bloggs', 5, 'IT1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(122, 'Joe Bloggs', 5, 'IT2.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(123, 'Joe Bloggs', 5, 'IT3.7', 'Red', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(124, 'Joe Bloggs', 5, 'CS1.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(125, 'Joe Bloggs', 5, 'DL1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(126, 'Alice Example', 5, 'IT1.1', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(127, 'Alice Example', 5, 'IT2.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(128, 'Alice Example', 5, 'IT3.7', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(129, 'Alice Example', 5, 'CS1.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(130, 'Alice Example', 5, 'DL1.1', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(131, 'Bob Example', 5, 'IT1.1', 'Red', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(132, 'Bob Example', 5, 'IT2.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(133, 'Bob Example', 5, 'IT3.7', 'Red', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(134, 'Bob Example', 5, 'CS1.2', 'Red', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(135, 'Bob Example', 5, 'DL1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(136, 'Joe Harvery', 5, 'IT1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(137, 'Joe Harvery', 5, 'IT2.2', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(138, 'Joe Harvery', 5, 'IT3.7', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(139, 'Joe Harvery', 5, 'CS1.2', 'Red', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(140, 'Joe Harvery', 5, 'DL1.1', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(141, 'Matthew Wells', 5, 'IT1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(142, 'Matthew Wells', 5, 'IT2.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(143, 'Matthew Wells', 5, 'IT3.7', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(144, 'Matthew Wells', 5, 'CS1.2', 'Green', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(145, 'Matthew Wells', 5, 'DL1.1', 'Amber', 'Test Comment', 'ISS', 'Michael', '8R-IT4'),
(146, 'James Andrew', 5, 'IT1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(147, 'James Andrew', 5, 'IT2.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(148, 'James Andrew', 5, 'IT3.7', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(149, 'James Andrew', 5, 'CS1.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(150, 'James Andrew', 5, 'DL1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(151, 'Natasha Eagles', 5, 'IT1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(152, 'Natasha Eagles', 5, 'IT2.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(153, 'Natasha Eagles', 5, 'IT3.7', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(154, 'Natasha Eagles', 5, 'CS1.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(155, 'Natasha Eagles', 5, 'DL1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(156, 'Andrew Walker', 5, 'IT1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(157, 'Andrew Walker', 5, 'IT2.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(158, 'Andrew Walker', 5, 'IT3.7', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(159, 'Andrew Walker', 5, 'CS1.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(160, 'Andrew Walker', 5, 'DL1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(161, 'Megan Greenwood', 5, 'IT1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(162, 'Megan Greenwood', 5, 'IT2.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(163, 'Megan Greenwood', 5, 'IT3.7', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(164, 'Megan Greenwood', 5, 'CS1.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(165, 'Megan Greenwood', 5, 'DL1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(166, 'Kirsty France', 5, 'IT1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(167, 'Kirsty France', 5, 'IT2.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(168, 'Kirsty France', 5, 'IT3.7', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(169, 'Kirsty France', 5, 'CS1.2', NULL, NULL, 'ISS', 'Michael', '8R-IT4'),
(170, 'Kirsty France', 5, 'DL1.1', NULL, NULL, 'ISS', 'Michael', '8R-IT4');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE IF NOT EXISTS `criteria` (
`crieria_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `strand_id` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`crieria_id`, `unit_id`, `strand_id`) VALUES
(13, 4, 'CS1.1'),
(14, 4, 'IT1.2'),
(15, 4, 'DL1.1'),
(16, 5, 'IT1.1'),
(17, 5, 'IT2.2'),
(18, 5, 'IT3.7'),
(19, 5, 'CS1.2'),
(20, 5, 'DL1.1'),
(21, 6, 'CS1.1'),
(22, 6, 'IT1.2'),
(31, 4, 'CS1.2'),
(32, 7, 'CS1.1'),
(33, 7, 'DL1.1'),
(34, 7, 'IT1.1');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE IF NOT EXISTS `recovery` (
`recover_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`recover_id`, `user_id`, `hash`) VALUES
(1, 1, 'a1decb29e44fc59d33660dab67ba8b25');

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE IF NOT EXISTS `strand` (
  `strand_id` varchar(10) NOT NULL,
  `strand_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`strand_id`, `strand_description`) VALUES
('CS1.1', 'Understands what an algorithm is and is able to express simple linear (non-branching) algorithms symbolically. Understands that computers need precise instructions. Demonstrates care and precision to avoid errors. '),
('CS1.2', 'Understand that algorithms are made on digital devices as programs. Designs simple algorithms using loops, and selection for example an if statements. Checks for and corrects errors i.e. debugging, in algorithms. (AL)\r\n'),
('CS1.3', 'Designs solutions (algorithms) that use repetition and two-way selection i.e. if, then and else. (AL) Uses flow charts to show solutions. (AB) Is able to predict outputs, showing an awareness of inputs. (AL)\r\n'),
('CS1.4', 'Shows an understanding of tasks best completed by humans or computers.  Designs solutions by breaking down a problem and creates a sub-solution for each of these parts. Understands that different solutions exist for the same problem. \r\n'),
('CS1.5', 'Understands that iteration is the repetition of a process such as a loop.  Recognises that different algorithms exist for the same problem. Can identify similarities and differences in situations and can use these to solve problems \r\n'),
('CS1.6', 'Evaluates the effectiveness of algorithms. Is able to explain how an algorithm works. Represents algorithms using pseudo code. \r\n'),
('CS1.7', 'Understands that some problems cannot be solved computationally.\r\n'),
('CS2.1', 'Know that users can make their own programs, and can show this by creating a simple program in Flowall. Run, checks and changes programs. Understands that programs run by following specific instructions. (AL)\r\n'),
('CS2.2', 'Uses arithmetic operators, if statements, and loops, within programs. Is able to predict the behaviour of programs. Checks and corrects simple semantic errors i.e. debugging, in programs. (AL)\r\n'),
('CS2.3', 'Creates programs that run algorithms to achieve given goals. (AL) Declares and assigns variables. (AB) Uses loops e.g. ‘until’, and a sequence of selection statements in programs, including an if, then and else statement. (AL)\r\n'),
('CS2.4', 'Understands the difference between, and uses if and if, then and else statements. Uses a variable within a loop.  Designs, writes and debugs programs using procedures.\r\n'),
('CS2.5', 'Understands that programming bridges the gap between planned solutions and computers.  Has practical experience of a high-level textual language.  Uses a range of operators and expressions e.g. Boolean, and applies them in the context of program.  Selects the appropriate data types.\r\n'),
('CS2.6', 'Knows the difference between, and uses appropriately, procedures and functions.  Detects and corrects syntactical errors.\r\n'),
('CS2.7', 'Understands the difference between, and uses, both pre-tested e.g. ‘while’, and post-tested e.g. ‘until’ loops. (AL)\r\n'),
('CS3.1', 'Understand that computers have no intelligence and that computers can do nothing unless a program is run (AL) Know that all software run on digital devices is programmed. (AL) (AB) (GE)\r\n'),
('CS3.2', 'Understand that a range of digital devices can be considered a computer. (AB) (GE) Recognises and can use a range of input and output devices.\r\n'),
('CS3.3', 'Knows that computers collect data from various input devices, including sensors and application software. (AB) Understands the difference between hardware and application software, and their roles within a computer system. (AB)\r\n'),
('CS3.4', 'Understands why and when computers are used. (EV) Understands the main functions of the operating system. (DE) (AB)\r\n'),
('CS3.5', 'Recognises and understands the function of the main internal parts of basic computer system.  Understands the fetch-execute cycle.\r\n'),
('CS3.6', 'Understands the fetch-execute cycle, including how data is stored in memory. (AB) (GE)\r\n'),
('CS4.1', 'Understands the difference between the internet and the world wide web. (AB)\r\n'),
('CS4.2', 'Understands how to effectively use search engines, and knows how search results are selected, including that search engines use ‘web crawler programs’. \r\n'),
('CS4.3', 'Understands how search engines rank search results. Understands how to construct static web pages using HTML and CSS. Understands data transmission between digital computers over networks, including the internet i.e. IP addresses\r\n'),
('CS5.1', 'Understands data types: real numbers and Boolean. Knows that digital computers use binary to represent all data. Understands how bit patterns represent numbers and images.  Knows that computers transfer data in binary. Understands the relationship between binary and file size\r\n'),
('CS5.2', 'Understands how numbers, images, sounds and character sets use binary. Performs simple operations using binary e.g. binary addition. (AB) (GE) Understands the relationship between resolution and colour depth, including the effect on file size. (AB)\r\n'),
('CS5.3', 'Understands the relationship between binary and electrical circuits, including Boolean logic.\r\n'),
('DL1.1', 'Understands the importance of communicating safely and respectfully online, and the need for keeping personal information private. Knows what to do when concerned about content or being contacted.\r\n'),
('DL1.2', 'Uses computers safely and responsibly, knowing a range of ways to report unacceptable content and contact when online.\r\n'),
('DL1.3', 'Knows what is acceptable and unacceptable behaviour when using technologies and online services.\r\n'),
('DL1.4', 'Uses technologies and online services securely, and knows how to identify and report inappropriate conduct.\r\n'),
('DL2.1', 'Knows common uses of information technology beyond the classroom.\r\n'),
('DL2.2', 'Understands the potential of information technology for collaboration.\r\n'),
('DL2.3', 'Knows ethical issues surrounding the use of information technology outside of school.\r\n'),
('DL2.4', 'Understands and explains how the use of technology can impact on society.\r\n'),
('DL2.5', 'Explains and justifies how the use of technology impacts on society, from the perspective of social, economical, political, legal, ethical and moral issues. (EV)\r\n'),
('DL2.6', 'Understands the ethical issues surrounding the application of information technology, and the existence of laws governing its use e.g. Data Protection Act, Computer Misuse Act, Copyright etc.\r\n'),
('DL3.1', 'Shows an awareness for the quality of digital content collected.\r\n'),
('DL3.2', 'Makes decisions about digital content when evaluating and changing it for a given audience. \r\n'),
('DL3.3', 'Makes decisions about digital content in relation to bias and trustworthiness and is able to select appropriate content for a given purpose\r\n'),
('IT1.1', 'Recognises that digital content can be represented in many forms. Knows the difference between some of these forms and can explain the different ways that they communicate information.\r\n'),
('IT1.2', 'Knows the different types of data: text, number. (AB) (GE) Understands that programs can work with different types of data. Recognises that data can be structured in tables to make it useful.\r\n'),
('IT1.3', 'Understands the difference between data and information.\r\n'),
('IT1.4', 'Performs  complex searches for information e.g. using Boolean. Checks the quality of information, and understands that poor quality data leads to unreliable results\r\n'),
('IT2.1', 'Finds content from the world wide web using a web browser. (AL)\r\n'),
('IT2.2', 'Navigates the web and can carry out simple web searches to collect digital content. (AL) (EV)\r\n'),
('IT2.3', 'Shows an awareness of, and can use a range of internet services e.g. VOIP, e-mail\r\n'),
('IT3.1', 'Uses software to create, store and edit digital content using appropriate file and folder names.  \r\n'),
('IT3.2', 'Uses a variety of software to change and present digital content: data and information. Shares experiences of technology in school and beyond the classroom. (GE) (EV) \r\n'),
('IT3.3', 'Collects, organises and presents data and information in digital content.  Creates digital content to achieve a given goal through combining software\r\n'),
('IT3.4', 'Know the audience when designing and creating digital content.  Evaluates the trustworthiness of digital content and considers the usability when designing and creating digital products for a known audience. (EV)\r\n'),
('IT3.5', 'Evaluates the appropriateness of digital devices, internet services and application software to achieve given goals. (EV)\r\n'),
('IT3.6', 'Justifies the choice of and combines and uses multiple digital devices, internet services and application software to achieve given goals. (EV)\r\n'),
('IT3.7', 'Undertakes creative projects that collect, analyse, and evaluate data to meet the needs of a known user group. Designs and creates highly professional digital products for a wider audience.\r\n'),
('IT4.1', 'Talk about your work and make changes to improve it. \r\n'),
('IT4.2', 'Talk about your work and make improvements to solutions based on feedback received. (EV)\r\n'),
('IT4.3', 'Makes  improvements to solutions based on feedback received, and can comment on the success of the solution. (EV)\r\n'),
('IT4.4', 'Uses criteria to evaluate the quality of solutions, can identify improvements making some changes to the solution, and future solutions. (EV)\r\n'),
('IT4.5', 'Designs criteria to critically evaluate the quality of solutions, uses the criteria to identify improvements and can make appropriate changes to the solution. \r\n'),
('IT4.6', 'Designs criteria for users to evaluate the quality of solutions, uses the feedback from the users to identify improvements and can make appropriate changes to the solution. (EV)\r\n'),
('IT5.1', 'Understand that a range of digital devices can be considered a computer.\r\n'),
('IT5.2', 'Knows the difference between physical, wireless and mobile networks.\r\n'),
('IT5.3', 'Knows that there is a range of operating systems and application software for the same hardware. \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(11) NOT NULL,
  `student_name` varchar(128) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `teacher_name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `class_name`, `teacher_name`) VALUES
(154, 'Joe Bloggs', '8R-IT4', 'Michael'),
(155, 'Alice Example', '8R-IT4', 'Michael'),
(156, 'Bob Example', '8R-IT4', 'Michael'),
(157, 'Joe Harvery', '8R-IT4', 'Michael'),
(158, 'Matthew Wells', '8R-IT4', 'Michael'),
(159, 'James Andrew', '8R-IT4', 'Michael'),
(160, 'Natasha Eagles', '8R-IT4', 'Michael'),
(161, 'Andrew Walker', '8R-IT4', 'Michael'),
(162, 'Megan Greenwood', '8R-IT4', 'Michael'),
(163, 'Kirsty France', '8R-IT4', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `teacherclass`
--

CREATE TABLE IF NOT EXISTS `teacherclass` (
`class_id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `teacher_name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `teacherclass`
--

INSERT INTO `teacherclass` (`class_id`, `class_name`, `teacher_name`) VALUES
(26, '8R-IT4', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `trafficlight`
--

CREATE TABLE IF NOT EXISTS `trafficlight` (
`id` int(11) NOT NULL,
  `light` varchar(16) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trafficlight`
--

INSERT INTO `trafficlight` (`id`, `light`) VALUES
(2, 'Amber'),
(3, 'Green'),
(1, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`unit_id` int(11) NOT NULL,
  `unit_name` varchar(64) NOT NULL,
  `teacher_name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `teacher_name`) VALUES
(4, 'Python Programming', 'Michael'),
(5, 'Information System Security', 'Michael'),
(6, 'Video Game Technology', 'Michael'),
(7, 'Software Development', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `unitcomments`
--

CREATE TABLE IF NOT EXISTS `unitcomments` (
`id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `student_name` varchar(128) NOT NULL,
  `comment` text,
  `teacher_name` varchar(32) NOT NULL,
  `identifier` varchar(16) NOT NULL,
  `class_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `unitcomments`
--

INSERT INTO `unitcomments` (`id`, `unit_id`, `student_name`, `comment`, `teacher_name`, `identifier`, `class_name`) VALUES
(21, 4, 'Joe Bloggs', NULL, 'Michael', 'Python', '9P-IT3'),
(22, 4, 'Alice Example', NULL, 'Michael', 'Python', '9P-IT3'),
(23, 4, 'Bob Example', NULL, 'Michael', 'Python', '9P-IT3'),
(24, 4, 'Joe Harvery', NULL, 'Michael', 'Python', '9P-IT3'),
(25, 4, 'Matthew Wells', NULL, 'Michael', 'Python', '9P-IT3'),
(26, 4, 'James Andrew', NULL, 'Michael', 'Python', '9P-IT3'),
(27, 4, 'Natasha Eagles', NULL, 'Michael', 'Python', '9P-IT3'),
(28, 4, 'Andrew Walker', NULL, 'Michael', 'Python', '9P-IT3'),
(29, 4, 'Megan Greenwood', NULL, 'Michael', 'Python', '9P-IT3'),
(30, 4, 'Kirsty France', NULL, 'Michael', 'Python', '9P-IT3'),
(31, 4, 'Joe Bloggs', 'Overall failed to perform well in this Unit.', 'Michael', 'Test', '8R-IT4'),
(32, 4, 'Alice Example', 'Performed above her predicted target', 'Michael', 'Test', '8R-IT4'),
(33, 4, 'Bob Example', 'Performed well over the course of the unit', 'Michael', 'Test', '8R-IT4'),
(34, 4, 'Joe Harvery', 'Performed as expected over the course of the unit', 'Michael', 'Test', '8R-IT4'),
(35, 4, 'Matthew Wells', 'Performed well during the units progression', 'Michael', 'Test', '8R-IT4'),
(36, 4, 'James Andrew', 'Performed badly over the course of the unit', 'Michael', 'Test', '8R-IT4'),
(37, 4, 'Natasha Eagles', 'Performed to a good standard throughout the unit', 'Michael', 'Test', '8R-IT4'),
(38, 4, 'Andrew Walker', 'Performed to his target throughout the unit.', 'Michael', 'Test', '8R-IT4'),
(39, 4, 'Megan Greenwood', 'Performed to a low level throughout the unit.', 'Michael', 'Test', '8R-IT4'),
(40, 4, 'Kirsty France', 'Failed to understand the unit', 'Michael', 'Test', '8R-IT4'),
(41, 5, 'Joe Bloggs', 'Test Comment', 'Michael', 'ISS', '8R-IT4'),
(42, 5, 'Alice Example', 'Test Comment', 'Michael', 'ISS', '8R-IT4'),
(43, 5, 'Bob Example', 'Test Comment', 'Michael', 'ISS', '8R-IT4'),
(44, 5, 'Joe Harvery', 'Test Comment', 'Michael', 'ISS', '8R-IT4'),
(45, 5, 'Matthew Wells', 'Test Comment', 'Michael', 'ISS', '8R-IT4'),
(46, 5, 'James Andrew', '', 'Michael', 'ISS', '8R-IT4'),
(47, 5, 'Natasha Eagles', '', 'Michael', 'ISS', '8R-IT4'),
(48, 5, 'Andrew Walker', '', 'Michael', 'ISS', '8R-IT4'),
(49, 5, 'Megan Greenwood', '', 'Michael', 'ISS', '8R-IT4'),
(50, 5, 'Kirsty France', '', 'Michael', 'ISS', '8R-IT4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(1024) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'Michael', '$2y$10$iEgGJxYCVLhjKG1cuVThAO1E/a3uSAK0BjOxNK8M.d3fVS867PCL.', 'michael@email.com'),
(2, 'Rudolph', 'abc123', 'rudolph@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
 ADD PRIMARY KEY (`assessment_id`), ADD KEY `student_id` (`student_name`,`unit_id`,`strand_id`,`trafficlight`), ADD KEY `unit_id` (`unit_id`), ADD KEY `strand_id` (`strand_id`), ADD KEY `trafficlight` (`trafficlight`), ADD KEY `teacher_name` (`teacher_name`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
 ADD PRIMARY KEY (`crieria_id`), ADD KEY `unit_id` (`unit_id`), ADD KEY `strand_id` (`strand_id`), ADD KEY `strand_id_2` (`strand_id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
 ADD PRIMARY KEY (`recover_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
 ADD PRIMARY KEY (`strand_id`), ADD UNIQUE KEY `strand_id` (`strand_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD KEY `class_name` (`class_name`), ADD KEY `teacher_name` (`teacher_name`), ADD KEY `teacher_name_2` (`teacher_name`);

--
-- Indexes for table `teacherclass`
--
ALTER TABLE `teacherclass`
 ADD PRIMARY KEY (`class_id`), ADD KEY `teacher_name` (`teacher_name`), ADD KEY `class_name` (`class_name`);

--
-- Indexes for table `trafficlight`
--
ALTER TABLE `trafficlight`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `light` (`light`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`unit_id`), ADD KEY `TeacherName` (`teacher_name`);

--
-- Indexes for table `unitcomments`
--
ALTER TABLE `unitcomments`
 ADD PRIMARY KEY (`id`), ADD KEY `unit_id` (`unit_id`), ADD KEY `teacher_name` (`teacher_name`), ADD KEY `identifier` (`identifier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
MODIFY `crieria_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
MODIFY `recover_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `teacherclass`
--
ALTER TABLE `teacherclass`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `trafficlight`
--
ALTER TABLE `trafficlight`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `unitcomments`
--
ALTER TABLE `unitcomments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
ADD CONSTRAINT `assessment_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
ADD CONSTRAINT `assessment_ibfk_3` FOREIGN KEY (`strand_id`) REFERENCES `strand` (`strand_id`),
ADD CONSTRAINT `assessment_ibfk_4` FOREIGN KEY (`trafficlight`) REFERENCES `trafficlight` (`light`),
ADD CONSTRAINT `assessment_ibfk_5` FOREIGN KEY (`teacher_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
ADD CONSTRAINT `criteria_ibfk_2` FOREIGN KEY (`strand_id`) REFERENCES `strand` (`strand_id`);

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
ADD CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`teacher_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `teacherclass`
--
ALTER TABLE `teacherclass`
ADD CONSTRAINT `teacherclass_ibfk_1` FOREIGN KEY (`teacher_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`teacher_name`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `unitcomments`
--
ALTER TABLE `unitcomments`
ADD CONSTRAINT `unitcomments_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
ADD CONSTRAINT `unitcomments_ibfk_2` FOREIGN KEY (`teacher_name`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
