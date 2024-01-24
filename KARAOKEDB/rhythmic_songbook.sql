-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: rhythmic
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `songbook`
--

DROP TABLE IF EXISTS `songbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `songbook` (
  `songid` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) DEFAULT NULL,
  `Artist` varchar(500) DEFAULT NULL,
  `ytid` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`songid`),
  UNIQUE KEY `songid_UNIQUE` (`songid`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songbook`
--

LOCK TABLES `songbook` WRITE;
/*!40000 ALTER TABLE `songbook` DISABLE KEYS */;
INSERT INTO `songbook` VALUES (1,'Through The Years','Kenny Rogers','Uvjjz-z2dGo'),(2,'Here I Am','Air Supply','-yT5PYFkRLM'),(3,'Parting Time','Rockstar','lVb0zlKyWjE'),(4,'Ocean Deep','Cliff Richard','iXk_8t8n6tE'),(5,'Zombie','The Cranberies','37cKEVu-Z-Y'),(6,'BREATHLESS','The Corrs','pEW3KcJ0m-0'),(10,'Sweet Caroline','Victor Wood','fxTy-AUskiA'),(11,'Take Me Home, Country Roads','John Denver','ps8vopZaouw'),(12,'Leader of the Band','Dan Fogelberg','LEJ-duQejeA'),(13,'When She Cries','Restless Heart','6Ns3Y7whX68'),(14,'25 Minutes','Michael Learns To Rock','fMlyH-A4wzg'),(15,'HAVING YOU NEAR ME','Air Supply','gRj18Tk0j_Q'),(16,'ARAW GABI','Regine Velasquez','4sbzBg2NNBg'),(17,'SAYANG NA SAYANG','Aegis','g-iC_4LMcqI'),(18,'I HAVE A DREAM','ABBA','tmLgYhxfExk'),(19,'TOP OF THE WORLD','Carpenters','tY8o1TD_frk'),(20,'SKYLINE PIGEON','Elton John','r2Z3FJT8teg'),(21,'HERO','Mariah Carey','1nNdPl6O5Sc'),(22,'FROM THIS MOMENT ON','Shania Twain','WmJv-I0RF2o'),(23,'BALIW NA PUSO','Jessa Zaragoza','K2R4b0gP2mw'),(24,'TRUE COLORS','Cyndi Lauper','9A_eefDCbPA'),(25,'TOTAL ECLIPSE OF THE HEART','Bonnie Tyler','Ul0qKMU1Jpo'),(26,'TILL MY HEARTACHES END','Ella Mae Saison','274oIUNfFGc'),(27,'PUSONG BATO','Alon Band','w2Kz25t0JI8'),(28,'NAMUMURO KA NA','Lukas','pWTTUugASJ8'),(29,'MULING IBALIK','First Cousins','eOGZvmEIymg'),(30,'BAKIT PA','Jessa Zaragoza','71Nu2m_zA_U'),(31,'AKAP','Imago','xuGZr7WWpkM'),(32,'SALAMAT','Yeng Constantino','tYE_NHrqU8o'),(33,'MAPA','SB19','2rjZsgEVYNM'),(34,'HOW DO I LIVE','Leann Rimes','UJzU_Q8xo_U'),(35,'I LOVE YOU GOODBYE','Celine Dion','zmogyh_t_II'),(36,'AT ANG HIRAP','Angeline Quinto','s2pTc51DHSc'),(37,'CLOSER YOU AND I','Gino Padilla','pvgScUhloHM'),(38,'THATS WHAT FRIENDS ARE FOR','Dionne Warwick','YX6y9tGG_BU'),(39,'NOTHING\'S GONNA STOP US NOW','Starship','fpf7Pzb_kiE'),(40,'COOL OFF','Session Road','3gvv2UU2tgo'),(41,'NOBELA','Join The Club','DuqjG3vWiUo'),(42,'UHAW','Dilaw','ZDgyfqricXs'),(43,'NOSI BA LASI','Sampaguita','8846-5w-MlA'),(44,'BANYO QUEEN','Andrew E','3N5pMZOsxb8'),(45,'JOPAY','Mayonnaise','sxMsnOTfM_w'),(46,'214','Rivermaya','hNmgGtSTqb8'),(47,'BEER','Itchyworms','QBSYnWqRNGo'),(48,'PASILYO','SunKissed Lola','05TCevz9MTY'),(49,'BACK TO ME','Cueshe','_BfKBvY9bMs'),(50,'MULING BINUHAY MO','Ciamara Morales','ze7weWW7dRE'),(51,'TADHANA','Up Dharma Down','LHQ9rBDE7QA'),(52,'MAYBE','Neocolours','CHMEBotLjas'),(53,'LAKAS TAMA','Siakol','OO74kqi5PGE'),(54,'AKIN KA NA LANG','Morissette Amon','hrN0jz16aBw'),(55,'DJ NG AKING RADYO','April Boy Regino','zm4ylBloB8c'),(56,'BUKAS NA LANG KITA MAMAHALIN','Lani Misalucha','oE6JwOqvscc'),(57,'ALWAYS REMEMBER US THIS WAY','Lady Gaga','jf3FaRGJdR4'),(58,'PANGARAP KO ANG IBIGIN KA','Morissette Amon','Z1inoxJlIHU'),(59,'LASON MONG HALIK','Katrina Velarde','P_dEU80pPQo'),(60,'BAKIT NGA BA MAHAL KITA','Roselle Nava','GwPgYdRcWUQ'),(61,'GUSTO KO NANG BUMITAW','Morissette Amon','iGfC7oWfnsg'),(62,'HINDI TAYO PWEDE','Janine Teñoso','uGeQcGwQryk'),(64,'Natatawa Ako','Gabriella','XHdUtlgymkI'),(65,'SHE\'S GONE','Steelheart','EdGwI4J5pDw'),(66,'KUMPAS','Moira Dela Torre','1-iOGZ762kY'),(67,'Paubaya','Moira Dela Torre','Rz9x2mnN8DM'),(68,'Tagpuan','Moira Dela Torre','zOhZVj4EDko'),(69,'MALAYA','Moira Dela Torre','FG6RXG-K8N0'),(70,'DI NA MULI','Janine Teñoso','JCBvIsOPdiM'),(71,'DITO KA LANG','Moira Dela Torre','nJEdf5DBAOY'),(72,'SABIHIN MO NA','Top Suzara','7bJV6JDv8KM'),(73,'KAHIT AYAW MO NA','This Band','mbKOHjak9Xo'),(74,'BAKIT KUNG SINO PA','Lloyd Umali','7lBSDaXj750'),(75,'HULING EL BIMBO','Eraserheads','G9AC2EMxVXw'),(76,'BAKIT BA IKAW','Michael Pangilinan','I3iMhz_mIy4'),(77,'IKAW AT AKO','Moira & Jason','QmsP9Gyms'),(78,'MAGBALIK','Callalily','r9vfbca_Xuc'),(79,'DI LANG IKAW','Juris','_mFi2XaxmGQ'),(80,'TORETE','Moira Dela Torre','fPEWDeq3R_4'),(81,'TITIBO TIBO','Moira Dela Torre','gpOZRs4wKSs'),(82,'STAY','Daryl Ong','U4tssXMe-9I'),(83,'YOU ARE MY SONG','Regine Velasquez','B0-YGuskyLU'),(84,'MAYBE THIS TIME','Sarah Geronimo','eeQIFrjZGEQ'),(85,'THE GIFT','Jim Brickman','bdCEIyR76Mw'),(86,'WILL OF THE WIND','Jim Photoglo','AblkQUPopNI'),(87,'DANCING QUEEN','ABBA','qjMSGIfB1j8'),(88,'HOW CAN I TELL HER','Lobo','x0SMymUchOM'),(89,'STAY','Cueshe','moDJiGgIt-I'),(90,'PERFECT','Simple Plan','HUsiUwHv71M'),(91,'PASSENGER SEAT','Stephen Speaks','eOlM0yAwwjc'),(92,'THE DAY YOU SAID GOODNIGHT','Hale','zfEaYbWoxko'),(93,'SIGE','6 Cyclemind','MC16yYL0qrw'),(94,'HIMALA','Rivermaya','yi1jwM6WIPk'),(95,'PRINSESA','The Teeth','WBOGNGP4row'),(96,'HALAGA','Parokya ni Edgar','DaDWBKABYmU'),(97,'LOVE MOVES IN MYSTERIOUS WAYS','Nina','Q2sgL3Oi_9Q'),(98,'I JUST FALL IN LOVE AGAIN','Anne Murray','5sVOFufOw1I'),(99,'With A Smile','Eraserheads','tmNyqMGcQJo'),(100,'ONE MOMENT IN TIME','Whitney Houston','3GrPSMWhJOI'),(101,'HANGGANG NGAYON','Regine Velasquez & Ogie Alcasid','PUDPncv1bLI'),(102,'KUNG SAKALI','Michael Pangilinan','xysJeyiN5U8'),(103,'IKAW SANA','Ogie Alcasid','Su8Q_K7npE8'),(104,'MY HEART WILL GO ON','Celine Dion','oUQDM_j51Z4'),(105,'THE FLAME','Cheap Trick','J9JIHwuLOis'),(106,'BAKIT','RACHELLE ANN GO','y3HACvbaMpY'),(107,'Material Girl','Madonna','UN22knotn-8'),(108,'WALA NA BANG PAG IBIG','Jaya','0BZOrtPsRJc'),(109,'KAHIT KUNTING AWA','Nora Aunor','8TRZGuarXVc'),(110,'iisa Pa Lamang','Joey Albert','l4xWNKqSDqg'),(111,'YOU RAISE ME UP','Josh Groban','nVe0FnEZCTY'),(112,'JUST ONCE','James Ingram','vYYxov5T-VQ'),(113,'If I Sing You a Love Song','Bonnie Tyler','a3fckaE66mw'),(116,'Kulang Ako Kung Wala Ka','Erik Santos','81lmfV0fmro'),(117,'Kulang Ako Kung Wala Ka','Erik Santos','81lmfV0fmro'),(118,'KUNG MAIBABALIK KO LANG','Regine Velasquez','rjAJ1VDCO6E'),(119,'KILLING ME SOFTLY WITH HIS SONG','Roberta Flack','Ky96EO_hixs'),(120,'SANA NGAYONG PASKO','Ariel Rivera','KoZ9Q0RYn5E'),(121,'Halo','Beyoncé','xs-hqTHMjJY'),(122,'SANDALAN','6 CYCLEMIND','_MJFroJX6jA'),(123,'MAHAL PA RIN KITA','Rockstar','CJhy0Vv45gw'),(124,'Halik','Kamikazee','s7oCP1pqPWg'),(125,'Kahit Pa','Hale','bMXdXEbasR8'),(126,'WAG MO NA SANA','Parokya Ni Edgar','aZrHWYFHhuo'),(127,'Silvertoes','Parokya Ni Edgar','o-OZU5RnYcU'),(128,'BITIW','Sponge Cola','7orv522zszE'),(129,'Pangako','CUESHE','N0l7F-PtTwU'),(130,'Spolarium','ERASERHEADS','Rk9t4o3NqhU'),(131,'ALAPAAP','Eraserheads','nci9aK4fboU'),(132,'NARDA','Kamikazee','uJV0avAF_FU'),(133,'LAKLAK','The Teeth','5jZ_o03npqI'),(134,'ALL THIS TIME','Tiffany','EWoj6AeYGe4'),(135,'UPSIDE DOWN','6cyclemind','H1TAEeO5YlE'),(136,'Sorry Na Pwede Ba','Brownman Revival','k_1uHeyHXVA'),(137,'MIGRAINE','Moonstar88','KS2IJmFpokM'),(138,'YAKAP SA DILIM','Orange & Lemons','smLHXy5Bph8'),(139,'Hiling','Jay-R Siaboc','1FFlzAkA6CQ'),(140,'NGAYOY NARIRITO','Jay R','5pRHJM9zHnE'),(141,'Upuan','Gloc-9','oEGjtmJTj3A'),(142,'Tatsulok','Bamboo','411Xib2D6k0'),(143,'Hallelujah','BAMBOO','azIz5xyYrdY'),(144,'Umaaraw, Umuulan','RIVERMAYA','wvHa6dS9130'),(145,'ELESI','Rivermaya','5DojxsfqkHg'),(146,'IF','Rivermaya','vM3jTjZ20Wo'),(147,'PARALUMAN','Adie','CmNugklEvyM'),(148,'HAHAHAHasula','Kurt Fick','DI2svVReemg'),(149,'ENGLISERA','Missing Felimon','owwEYrAIZFY'),(150,'PRINSIPAL','MISSING FELIMON','i_Wx_6MySUE'),(151,'SINE SINE','MISSING FELIMON','tHuwfefYprE'),(152,'PALAGOT SA KONTRA','PHYLUM','UiRnvqAqkXA'),(153,'JEEPNEY','SPONGE COLA','nwKuEG27nCU'),(154,'ILL BE','Edwin McCain','i8tG8AriwVM'),(155,'PEKSMAN','Siakol','ydwNXkmni1A'),(156,'Antukin','Rico Blanco','Y9YPmGhBaoQ'),(157,'NAKAPAGTATAKA ','Sponge Cola','gfzb3lcZjRg'),(158,'8 Pa','Grin Department','DXRVdj5weso'),(159,'Tell Me','Side A','RUtsTRZflSM');
/*!40000 ALTER TABLE `songbook` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-24 11:10:04
