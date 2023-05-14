--
CREATE DATABASE escola;
-- --------------------------------------------------------
USE escola;
--
--



CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `usuario` varchar(127) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `primeiro_nome` varchar(127) NOT NULL,
  `ultimo_nome` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--
-- usuario: gerente, senha: senha-gerente
INSERT INTO `admin` (`admin_id`, `usuario`, `senha`, `primeiro_nome`, `ultimo_nome`) VALUES
(1, 'gerente', '$2y$10$TM8WJINbajhO8OzWYr7FUuKNJs5rOYS3o2cQtSVlnzWmXnzPC0AWa', 'Joao', 'Silva');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `nota_id` int(11) NOT NULL,
  `nota` varchar(31) NOT NULL,
  `nota_codigo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`nota_id`, `nota`, `nota_codigo`) VALUES
(1, '1', 'G'),
(2, '2', 'G'),
(3, '1', 'KG'),
(4, '2', 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

CREATE TABLE `alunos` (
  `aluno_id` int(11) NOT NULL,
  `usuario` varchar(127) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `primeiro_nome` varchar(127) NOT NULL,
  `ultimo_nome` varchar(255) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alunos`
--
-- jose senha: senha-jose
-- maria senha: senha-maria
INSERT INTO `alunos` (`aluno_id`, `usuario`, `senha`, `primeiro_nome`, `ultimo_nome`, `nota`) VALUES
(1, 'jose', '$2y$10$OlLt.Z3Gjt6x/.Tzi1QboelLexrvX1gvdo0iGOvk5WaNd3YEWiwYm', 'Jose', 'Silva', 2),
(3, 'maria', '$2y$10$7Erb99F4QdOUCbavZeTWWupIVwFzDyCz2b/hNZuzfwnWz3rcff8a2', 'Maria', 'Santos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinas`
--

CREATE TABLE `disciplinas` (
  `disciplina_id` int(11) NOT NULL,
  `disciplina` varchar(31) NOT NULL,
  `disciplina_codigo` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplinas`
--

INSERT INTO `disciplinas` (`disciplina_id`, `disciplina`, `disciplina_codigo`) VALUES
(1, 'Ingles', 'In'),
(2, 'Física', 'Fi');

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `professor_id` int(11) NOT NULL,
  `usuario` varchar(127) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `primeiro_nome` varchar(127) NOT NULL,
  `ultimo_nome` varchar(127) NOT NULL,
  `disciplinas` varchar(31) NOT NULL,
  `notas` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professores`
--
-- prof1 senha: senha-prof1
-- prof2 senha: senha-prof2
INSERT INTO `professores` (`professor_id`, `usuario`, `senha`, `primeiro_nome`, `ultimo_nome`, `disciplinas`, `notas`) VALUES
(1, 'prof1', '$2y$10$abX9qJC4X3W52jQ/4X6E9uEnJcnlfKcJGlWWuNtcCniHiXpnixy/y', 'Julio', 'Oliveira', '12', '12'),
(3, 'prof2', '$2y$10$NV754N8veWDKYG9k/ruHQ.Nl64a.v/ZwVd0XFTcL1ceEqaeatay7u', 'Julia', 'Bastos', '12', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nota_id`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`aluno_id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`disciplina_id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`professor_id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `aluno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `disciplina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

