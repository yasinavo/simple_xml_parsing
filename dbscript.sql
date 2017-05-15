
--
-- Table structure for table `meeting_data`
--

CREATE TABLE `meeting_data` (
  `id` int(11) NOT NULL,
  `file_id` int(20) NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `file_path` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `meeting_data`
--
ALTER TABLE `meeting_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_id` (`file_id`);


--
-- AUTO_INCREMENT for table `meeting_data`
--
ALTER TABLE `meeting_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



--
-- Dumping data for table `meeting_data`
--

INSERT INTO `meeting_data` (`file_id`, `file_name`, `file_path`, `type`, `active`) VALUES
(1580, 'XML_1580.xml', 'res/xml/XML_1580.xml', 'text/xml', 1),
(1582, 'XML_1582.xml', 'res/xml/XML_1582.xml', 'text/xml', 1);
