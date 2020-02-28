
CREATE TABLE `medico` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `endereco_consultorio` varchar(255) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT NULL,
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `medico` (`id`, `email`, `nome`, `senha`, `endereco_consultorio`, `data_criacao`, `data_alteracao`) VALUES
(1, 'Marcos@gmail.com', 'Antonio Carlos da Silva', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'Rua 25 julho 323 Centro', '2020-02-27 20:47:53', '2020-02-28 00:26:57'),
(2, 'caio@teste.com', 'Caio coimbra', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', 'Rua Fernando Osorio 2344', '2020-02-27 22:22:15', '2020-02-28 01:18:44'),
(3, 'marcio@gmail.com', 'Marcio Antunes', 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', 'Rua general neto 124', '2020-02-28 01:16:15', '2020-02-28 01:16:22'),
(4, 'felipe@gmail.com', 'Felipe Ferreira', 'ed377ed2cf9d476eba5d6785ffaa65bc42e56eb5', 'Rua Carlos Andradas 324', '2020-02-28 01:16:59', NULL),
(5, 'flavio@gmail.com', 'Flavio Teixiera', 'bd602e4152f943c35648b2d9d74dc736abf61fb2', 'Rua Almirante Bezzerra 3245', '2020-02-28 01:18:05', NULL),
(6, 'jose@gmail.com', 'Carlos Macedo ', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'Rua Julho de castilhos 483', '2020-02-28 01:19:29', NULL),
(7, 'otavio@gmail.com', 'Otavio Costa Junior', '609ce8a2e2faae8845d3be484394f2cdf51e4cbd', 'Rua Alfredo Simon 887', '2020-02-28 01:20:43', NULL);
