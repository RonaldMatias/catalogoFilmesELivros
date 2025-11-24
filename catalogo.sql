CREATE DATABASE  IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `catalogo`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: catalogo
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `diretor` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `dataLancamentoFilme` int NOT NULL,
  `sinopseFilme` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (3,'Bad Boys: Até o Fim','Chris Bremner, Will Beall','Ação',1720224000,'Bad Boys: Até o Fim é o quarto filme da icônica saga de ação estrelada por Will Smith e Martin Lawrence, iniciada em 1995 com Os Bad Boys, dirigido por Michael Bay. Desta vez, o longa conta com Adil El Arbi e Bilall Fallah na direção e o roteiro fica por conta de Chris Bremnerirá. O quarto filme da franquia vai mostrar como os detetives mais famosos de Miami, Mike Lowrey (Smith) e Marcus Burnett (Lawrence), enfrentam uma reviravolta dramática: agora, eles que são os mais procurados! A caça virou o caçador e com direito a um prêmio pela suas cabeças.'),(4,'Bem-Vindo à Selva','Peter Berg ','Aventura, Comédia',1080864000,'Em Bem-Vindo à Selva, Travis (Seann William Scott) é um jovem rico em busca de uma mina de ouro lendária na Amazônia, conhecida como Helldorado. Para ajudá-lo nessa aventura, sua família contrata Beck (Dwayne Johnson), um caçador de recompensas e aspirante a dono de restaurante. Após alguns desentendimentos iniciais, Travis convence Beck a acompanhá-lo na busca por riqueza e aventura. No entanto, eles não são os únicos atrás de Helldorado. Cornelius Hatcher (Christopher Walken), um poderoso barão da mineração, também está determinado a encontrar a mina, e não hesitará em usar sua força para capturar Travis, a única pessoa que conhece a localização do valioso artefato. '),(2,'Truque de Mestre: O 3º Ato','Ruben Fleischer ','Aventura, Comédia, Suspense',1762992000,'Em Truque de Mestre: O 3º Ato, os quatro cavaleiros, J. Daniel Atlas (Jesse Eisenberg), Merritt McKinney (Woody Harrelson), Dylan Rhodes (Mark Ruffalo) e Lula (Lizzy Caplan) retornam para mais uma aventura alucinante. Dessa vez, os ilusionistas serão desafiados em uma jornada que envolve a joia mais valiosa do mundo. Ao lado de uma nova geração de ilusionistas, o quarteto se envolve numa trama repleta de reviravoltas e mágicas. Diante de uma empresa corrupta, que lava dinheiro para diferentes criminosos, os dois grupos se reúnem para derrubar a família que controla a companhia.');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `dataLancamento` int NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `sinopse` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livros`
--

LOCK TABLES `livros` WRITE;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` VALUES (1,'Introdução a Sistemas de Bancos de Dados',' C.J. Date','GEN LTC',1081900800,'Tecnologia','Introdução a Sistemas de Bancos de Dados, Oitava Edição, oferece uma introdução completa ao vasto campo de sistemas de bancos de dados.O livro apresenta uma base sólida sobre os alicerces da tecnologia de bancos de dados, ao mesmo tempo em que esclarece como o campo deve se desenvolver no futuro.Esta nova edição foi revista e atualizada com as tendências e desenvolvimentos dos sistemas de bancos de dados.'),(2,'Harry Potter e o Cálice de Fogo: 4',' J.K. Rowling',' Rocco',963014400,'fantasia, ficção, aventura','Em Harry Potter e o Cálice de fogo, o ano letivo já começa agitado. Harry volta para a Escola de Magia e Bruxaria de Hogwarts para cursar a quarta série. Acontecimentos inesperados – como, por exemplo, a presença de um novo professor de Defesa contra as Artes das Trevas e um evento extraordinário promovido na escola – alvoroçam os ânimos dos estudantes. Para surpresa de todos não haverá a tradicional Copa Anual de Quadribol entre Casas. Será substituída pelo Torneio Tribuxo.');
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-24 13:11:41
