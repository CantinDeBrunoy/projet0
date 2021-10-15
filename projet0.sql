-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 oct. 2021 à 15:14
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet0`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nomC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nomC`) VALUES
(1, 'Vegan'),
(2, 'Carnivore'),
(3, 'Oriental'),
(4, 'Soupe'),
(5, 'Dessert'),
(6, 'Petit dejeuner'),
(7, 'Patisserie'),
(8, 'Street-food');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idCom` int(11) NOT NULL,
  `auteurId` int(9) NOT NULL,
  `contenu` text NOT NULL,
  `etat` enum('publie','signale') NOT NULL,
  `date` datetime NOT NULL,
  `recetteId` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idCom`, `auteurId`, `contenu`, `etat`, `date`, `recetteId`) VALUES
(1, 2, 'pas bon le steack de soja', 'publie', '2021-09-23 13:56:52', 2),
(2, 1, 'tg encule arrete de mange de la viande', 'publie', '2021-09-23 13:56:52', 2),
(3, 2, 'yo les potos', 'publie', '2021-09-27 20:46:18', 4);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` int(2) NOT NULL,
  `auteurId` int(9) NOT NULL,
  `recetteId` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `auteurId` int(9) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `ingredients` text NOT NULL,
  `description` text NOT NULL,
  `note` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `etat` enum('publie','en attente','signale') NOT NULL,
  `categorieId` int(9) NOT NULL,
  `datePublication` date NOT NULL,
  `nbCom` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `auteurId`, `nom`, `ingredients`, `description`, `note`, `image`, `etat`, `categorieId`, `datePublication`, `nbCom`) VALUES
(1, 1, 'couscous', '15cl huile d\'olive, 1 oignon, 200g de blanc de poulet, gingembre, 30ml d\'harissa, 10 tanches d\'abricot seche, 200g de pois chiche, 200g de semoule, une poignée de coriandre, 200cl de bouillon de poulet', 'Faites chauffer l\'huile d\'olive dans une grande poele et faites cuire l\'oignon pendant 1 a 2 minutes, jusqu\'a ce qu\'il soit tendre. Ajoutez le poulet et faites-le frire pendant 7-10 minutes jusqu\'a ce qu\'il soit bien cuit et que les oignons soient dores. Raper le gingembre, melanger l\'harissa pour enrober le tout et faire cuire pendant 1 minute de plus. Ajoutez les abricots, les pois chiches et le couscous, puis versez le bouillon et remuez une fois.\r\nCouvrez d\'un couvercle ou d\'une feuille d\'aluminium et laissez reposer pendant environ 5 minutes, jusqu\'a ce que le couscous ait absorbe tout le bouillon et soit tendre. Remuez le couscous avec une fourchette et dispersez la coriandre pour servir. Servez avec un supplement d\'harissa, si vous le souhaitez.', 7, '', 'publie', 3, '2021-09-23', NULL),
(2, 1, 'Burek', '1 paquet de pate feuillete, 150g d\'emince de bœuf,  150g d\'oignon, 40cl d\'huile l\'olive, sel, poivre', 'Faites revenir les oignons finement haches et la viande hachee dans l\'huile.\r\nAjoutez le sel et le poivre. Graissez une plaque a patisserie ronde et mettez-y une couche de pate. Couvrez-la d\'une fine couche de garniture et couvrez-la d\'une autre couche de pate filo qui doit etre bien enduite d\'huile.Mettez une autre couche de garniture et couvrez-la de pate.Lorsque vous avez cinq ou six couches, couvrez-les de pate filo, faites-les cuire au four a 200ºC/392ºF pendant une demi-heure et coupez-les en quatre pour les servir.', 4, '', 'publie', 8, '2021-09-23', 2),
(3, 1, 'Goulash croate', '500g de bœuf, 2 oignions, 2 carottes, 2 gousses d\'ail, 2 feuilles de laurier, 200cl de vin rouge, 2 litres d\'eau, 45g de moutarde, 15g de sel, 8g de poivre, 8g de paprika, 30cl d\'huile vegetale ', 'Nettoyez la viande des veines s\'il y en a et coupez-la en petits morceaux de 3 × 3 cm. Faites mariner la viande dans la moutarde et les epices et laissez-la reposer au refrigerateur pendant une heure. Chauffez une cuillere a soupe de graisse de porc ou d\'huile vegetale dans une marmite et faites frire la viande de tous les cotes jusqu\'a ce qu\'elle soit doree. Une fois la viande cuite, transferez-la dans une assiette et ajoutez une autre cuillere a soupe de graisse dans la marmite. Coupez les oignons tres finement, epluchez les carottes et rapez-les a l\'aide d\'une rape. Faites cuire les oignons et les carottes a feu doux pendant 15 minutes.\r\nVous pouvez saler un peu les legumes pour qu\'ils ramollissent plus vite. Une fois que les legumes ont bruni et sont devenus legerement pateux, ajoutez la viande, les feuilles de laurier et l\'ail. Versez dessus le vin et laissez mijoter pendant 10-15 minutes pour permettre a l\'alcool de s\'evaporer.\r\nC\'est le bon moment pour ajouter 2/3 de la quantite de liquide. Couvrir la marmite et laisser cuire a feu doux pendant une heure, en remuant de temps en temps. Apres la premiere heure, versez le reste de l\'eau ou du bouillon et laissez cuire pendant 30 a 45 minutes supplementaires. Laissez le ragout refroidir legerement et servez-le avec un peu de persil hache et quelques tranches de piment frais si vous aimez l\'epicer un peu. Tranchez du pain frais, assaisonnez la salade et profitez simplement de ces merveilleuses saveurs.', 8, '', 'publie', 4, '2021-09-23', NULL),
(4, 1, 'Eton Mess', '500g de fraises, 400cl de creme fraiche epaisse, 3 meringues, 15cl de cordial au gingembre, feuilles de menthe', 'Reduire en puree la moitie des fraises dans un mixeur. Hachez les fraises restantes, en reservant quatre fraises pour la decoration. Fouettez la creme double jusqu\'a ce qu\'elle forme des pics fermes, puis incorporez la puree de fraises et la meringue ecrasee. Incorporez les fraises hachees et le cordial de gingembre, si vous l\'utilisez. Deposez des quantites egales de ce melange dans quatre verres a vin froids.\r\nServez en garnissant avec les fraises restantes et un brin de menthe.', 10, '', 'publie', 5, '2021-09-23', 1),
(5, 1, 'Crème brulée ', '568cl de creme fraiche epaisse, 100g de pepite de chocolat blanc, 1 gousse de vanille, 6 jaune d\'œufs, 30g de sucre en poudre, 30g de sucre en poudre superieur', 'Faites chauffer la creme, le chocolat et la gousse de vanille dans une casserole jusqu\'a ce que le chocolat soit fondu. Retirez du feu et laissez infuser pendant 10 minutes, en raclant les graines de la gousse dans la creme. Si vous utilisez l\'extrait de vanille, ajoutez-le tout de suite. Chauffez le four à 160C/fan 140C/gas 3. Battez les jaunes d\'oeufs et le sucre jusqu\'a ce qu\'ils deviennent pales. Incorporer la creme au chocolat. Filtrer dans une carafe et verser dans des ramequins. Placez-les dans un plat a rotir profond et versez de l\'eau bouillante a mi-hauteur des parois. Faites cuire au four pendant 15 à 20 minutes, jusqu\'a ce que le gateau soit ferme et que son centre soit bancal. Laissez refroidir au refrigerateur pendant au moins 4 heures. Pour servir, saupoudrer un peu de sucre sur les brulees et carameliser au chalumeau ou brievement sous un gril chaud. Laissez le caramel durcir, puis servez.', 9, '', 'publie', 5, '2021-09-23', NULL),
(6, 1, 'Rogaliki', '230g de beurre, 3 jaunes d\'œufs, 23cl de fromage frais, 15g levure chimique, 690g de farine, 1 pot de confiture de fraise', 'Dans un bol moyen, melangez les jaunes d\'oeufs, le fromage philly et la levure chimique à l\'aide d\'un batteur manuel. Commencez a ajouter la farine avec precaution. Lorsque le melange ne sera plus homogene et ressemblera a des copeaux de bois, rangez le mixeur et petrissez la pate avec vos mains. Formez un rouleau, couvrez-le d\'une feuille d\'aluminium et mettez-le au congelateur pendant 15 minutes. A ce moment-la, préchauffez le four a 375. Sortez la pate et separez-la en deux. Roulez et decoupez des trangles de 3 pouces. Faites-en autant que possible et mettez au centre de chacun d\'eux une petite cuillere de confiture. Roulez-les en forme de croissant. Placez les croissants sur une plaque a biscuits graissee et faites-les cuire pendant 10 a 12 minutes ou jusqu\'a ce qu\'ils soient dores. Repetez l\'operation avec le reste de la pate. Lorsque vous les sortez, mettez-les de cote et saupoudrez-les de sucre en poudre. Cela fait environ 3 lots de 20 biscuits chacun. Au total, cela fait environ 60 biscuits.', 7, '', 'publie', 7, '2021-09-23', NULL),
(7, 1, 'Lasagne végan', '200g de lentilles rouges, 1 carotte, 1 oignions, 1 courgette, coriandre, 150g d\'epinard, 10 feuilles de lasagne, 35g de beurre vegane, 4 cuilleres a soupe de farine, 300ml de lait de soja, 1.5 cuillere a soupe de moutarde, 1 cuillere de vinaigre', 'Prechauffer le four à 180 degres Celsius. Faites bouillir les legumes pendant 5 a 7 minutes, jusqu\'a ce qu\'ils soient tendres. Ajoutez les lentilles et portez a un leger fremissement, en ajoutant un cube de bouillon si vous le souhaitez. Continuez a cuire et a remuer jusqu\'a ce que les lentilles soient tendres, ce qui devrait prendre environ 20 minutes. Blanchir les feuilles d\'epinards pendant quelques minutes dans une poele, avant de les retirer et de les mettre de cote. Remplissez la casserole d\'eau et faites cuire les feuilles de lasagnes. Une fois cuites, egouttez-les et mettez-les de cote. Pour preparer la sauce, faites fondre le beurre et ajoutez la farine, puis ajoutez progressivement le lait de soja, la moutarde et le vinaigre. Faites cuire et remuez jusqu\'a ce que la sauce soit homogene, puis montez les lasagnes comme vous le souhaitez dans un plat a four. Faites cuire dans le four prechauffe pendant environ 25 minutes.', 3, '', 'publie', 1, '2021-09-23', NULL),
(8, 1, 'Febras assadas', '2 cotelettes de porc, 200ml de vin blanc, 6g de paprika, 2 citrons, 1/2 litre de jus de citrons, un filet d\'huile d\'olive, mayonnaise (pour l\'assaisonnement), 1kg de pomme de terre, huile végétale (pour la friture)', 'Coupez les filets en 5 morceaux de taille egale en laissant les extremites de la queue un peu plus longues. Prenez un sac en plastique transparent et glissez-y un des morceaux. Formez une escalope de la taille d\'une assiette a l\'aide d\'un rouleau a patisserie et repetez l\'operation avec les autres morceaux. Mettez le vin, le paprika, du sel et du poivre et le jus d\'un ½ citron dans un bol et ajoutez le porc. Laissez mariner pendant 20 a 30 minutes, pendant que vous preparez votre barbecue pour que les charbons soient incandescents mais sans flammes. Pour preparer les frites, remplissez une bassine d\'eau fraiche et coupez les pommes de terre en frites de 3 cm d\'epaisseur. Faites-les tremper dans l\'eau pendant 5 minutes, puis changez l\'eau. Laissez-les encore 5 minutes. Egouttez-les puis sechez-les sur une serviette ou avec du papier absorbant. Faites chauffer l\'huile d\'une friteuse ou d\'une poele profonde à fond epais avec un couvercle a 130 °C et plongez les frites dans l\'huile (par lots). Faites-les blanchir pendant 8 a 10 minutes. Retirez-les de l\'huile et egouttez-les bien. Placez-les sur un plateau pour qu\'elles refroidissent.\r\nRechauffez l\'huile a 180 °C (assurez-vous qu\'elle est chaude, sinon vos frites seront detrempees) et plongez le panier de frites dans l\'huile (encore une fois, faites-le par lots). Laissez cuire pendant 2 minutes, puis secouez-les un peu. Laissez cuire encore une minute environ jusqu\'a ce qu\'elles soient bien colorees et croustillantes au toucher. Egouttez-les bien pendant quelques minutes, mettez-les dans un bol et saupoudrez-les de sel marin. Le porc va cuire rapidement, faites-le donc en deux fois. Retirez les morceaux de la marinade, frottez-les avec de l\'huile et deposez-les sur le barbecue (vous pouvez egalement utiliser un gril). Faites-les cuire pendant 1 minute de chaque cote - ils peuvent s\'enflammer pendant la cuisson. Cela devrait suffire, car elles continueront a cuire. Retirez-les du barbecue et mettez-les dans une assiette. Repetez l\'operation avec l\'autre lot. Servez en empilant des frites dans une assiette, deposez le porc sur chaque pile et versez le jus de l\'assiette pour que les frites en absorbent les saveurs. Garnissez d\'une cuillere de mayonnaise et d\'un quartier de citron.', 6, '', 'publie', 2, '2021-09-23', NULL),
(9, 1, 'Petit déjeuner anglais', '2 saucisses de porc, 3 tranches de bacon, 2 champignons, 2 tomates, 1 tranche de boudin noir, 2 oeufs, 1 tranche de pain de mie', 'Faites chauffer la plaque du gril a feu doux, sur deux anneaux ou flammes si cela convient, et badigeonnez-la d\'une legere couche d\'huile d\'olive. Faites d\'abord cuire les saucisses. Ajoutez les saucisses sur la plaque de gril chaude/la partie la plus froide s\'il y en a une et laissez-les cuire lentement pendant environ 15-20 minutes, en les retournant de temps en temps, jusqu\'a ce qu\'elles soient dorees. Apres les 10 premieres minutes, augmentez le feu a moyen avant de commencer a cuire les autres ingredients. Si vous manquez de place, faites cuire completement les saucisses et gardez-les au chaud sur une assiette dans le four. Faites quelques petites entailles dans le bord gras du bacon. Placez le bacon directement sur la plaque du grill et faites-le frire pendant 2 a 4 minutes de chaque cote ou jusqu\'a ce que vous obteniez le croustillant souhaite. Comme les saucisses, le bacon cuit peut etre conserve au chaud sur une plaque au four. Pour les champignons, enlevez les saletes a l\'aide d\'une brosse à patisserie et coupez le pied au niveau du champignon. Salez, poivrez et arrosez d\'un peu d\'huile d\'olive. Placez les champignons cote pied sur la plaque du gril et faites-les cuire pendant 1 a 2 minutes avant de les retourner et de les faire cuire pendant 3 a 4 minutes supplementaires. Evitez de trop bouger les champignons pendant la cuisson, car cela libere les jus naturels et les rend detrempes. Pour les tomates, coupez les tomates en leur milieu ou en deux dans le sens de la longueur si vous utilisez des tomates prunes, et a l\'aide d\'un petit couteau aiguise, retirez l\'oeil vert. Saler, poivrer et arroser d\'un peu d\'huile d\'olive. Placez le cote coupe vers le bas sur la plaque du gril et faites cuire sans bouger pendant 2 minutes. Retournez-les delicatement et assaisonnez-les a nouveau. Faites cuire pendant 2 a 3 minutes supplementaires jusqu\'a ce qu\'elles soient tendres mais conservent leur forme. Pour le boudin noir, coupez le boudin noir en 3-4 tranches et retirez la peau. Placez-les sur la plaque du grill et faites-les cuire pendant 1½-2 minutes de chaque cote jusqu\'a ce qu\'ils soient legerement croustillants. Pour un pain frit \"correct\", il est preferable de le cuire dans une poele separee. L\'ideal est d\'utiliser du pain vieux de quelques jours. Faites chauffer une poele a feu moyen et couvrez le fond d\'huile. Ajoutez le pain et faites-le cuire pendant 2 a 3 minutes de chaque cote jusqu\'a ce qu\'il soit croustillant et dore. Si la poele devient trop seche, ajoutez un peu d\'huile. Pour une saveur plus riche, ajoutez une noix de beurre apres avoir retourne la tranche. Pour les oeufs au plat, cassez l\'œuf directement dans la poele avec le pain frit et laissez-le pendant 30 secondes. Ajoutez une bonne noix de beurre et eclaboussez legerement l\'oeuf avec le beurre lorsqu\'il est fondu. Faites cuire jusqu\'au stade souhaite, assaisonnez et retirez délicatement l\'oeuf avec une tranche de poisson. Une fois que tous les ingredients sont cuits, servir dans des assiettes chaudes et deguster immediatement avec une bonne dose de ketchup ou de sauce brune.', 6, '', 'publie', 6, '2021-09-23', NULL),
(10, 1, 'Soupe marocaine aux carottes', '6 carottes, 1 oignon, 4 gousse d\'ail, 6g de cumin, 3g de coriandre, 15cl d\'huile d\'olive, 2g de Garam Masala, 6cl de jus de citron', 'Prechauffer le four a 180° C. Combinez les carottes, l\'oignon, l\'ail, les graines de cumin, les graines de coriandre, le sel et l\'huile d\'olive dans un bol et melangez bien. Transferez le tout sur une plaque a patisserie. Mettez la plaque de cuisson dans le four prechauffe et faites-la rotir pendant 10 a 12 minutes ou jusqu\'a ce que les carottes ramollissent. Retirez du feu et laissez refroidir. Broyez le melange de carottes cuites avec un peu d\'eau pour obtenir une pate lisse et filtrez-la dans un bol. Faites chauffer le melange de carottes dans une poele antiadhesive.\r\nAjoutez deux tasses d\'eau et portez a ebullition. Ajoutez la poudre de garam masala et melangez. Ajoutez le sel et melangez bien. Retirez du feu, ajoutez le jus de citron et melangez bien. Servez chaud.', 7, '', 'publie', 3, '2021-09-23', NULL),
(11, 1, 'Viade fumée de Montreal', '1 poitrine de bœuf, 51g de sel, 51g de poivre noir, 17g de coriandre, 17g de sucre, 1 feuille de laurier, 6g de clous de girofle, 17g de paprika, 1 gousse d\'ail, 1 oignon, 17g d\'aneth, 6g de moutarde anglaise, 17g de sel de celeri ', 'Dans un petit bol, melangez le sel, le sel rose, le poivre noir, la coriandre, le sucre, la feuille de laurier et les clous de girofle. Enduisez toute la poitrine de la cure et placez-la dans un tres grand sac en plastique refermable. Placez le sac dans la partie la plus froide du refrigerateur et laissez secher pendant 4 jours, en retournant la poitrine deux fois par jour. Retirez la poitrine du sac et nettoyez-la autant que possible a l\'eau froide courante. Placez la poitrine dans un grand recipient rempli d\'eau et laissez-la tremper pendant 2 heures, en remplaçant l\'eau toutes les 30 minutes.\r\nRetirez-la de l\'eau et sechez-la en la tapotant avec du papier absorbant.\r\nPour preparer la sauce, melangez dans un petit bol le poivre noir, la coriandre, le paprika, la poudre d\'ail, la poudre d\'oignon, l\'aneth, la moutarde, les graines de céleri et le poivre rouge ecrase. Enduisez toute la poitrine de porc avec le melange. Allumer le fumoir ou le gril a 225 degres, en ajoutant des morceaux de bois de fumage lorsqu\'il est a temperature. Lorsque le bois s\'enflamme et produit de la fumee, placez la poitrine, cote gras vers le haut, et fumez jusqu\'a ce qu\'un thermometre a lecture instantanee indique 165 degres lorsqu\'il est insere dans la partie la plus epaisse de la poitrine, soit environ 6 heures. Transferer la poitrine dans une grande rotissoire munie d\'une grille en V.\r\nPlacez la rotissoire sur deux bruleurs de la cuisiniere et remplissez-la d\'un pouce d\'eau. Portez l\'eau a ébullition a feu vif, reduisez le feu a moyen, couvrez la rotissoire de papier d\'aluminium et faites cuire la poitrine a la vapeur jusqu\'a ce qu\'un thermometre a lecture instantanee indique 180 degres lorsqu\'il est insere dans la partie la plus epaisse de la viande, soit 1 a 2 heures, en ajoutant de l\'eau chaude au besoin. Transferez la poitrine sur une planche à decouper et laissez-la refroidir legerement. Trancher et servir, de preference sur du pain de seigle avec de la moutarde.', 8, '', 'publie', 8, '2021-09-23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nomU` varchar(30) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `poste` enum('admin','visiteur') NOT NULL,
  `recetteNoteMoyenne` int(2) DEFAULT NULL,
  `nbRecettePub` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `nomU`, `prenom`, `poste`, `recetteNoteMoyenne`, `nbRecettePub`) VALUES
(1, 'chef', 'chef', 'Roquier', 'Cantin', 'admin', 4, 1),
(2, 'dev', 'devop', 'Chadli', 'Adel', 'visiteur', 0, 0),
(3, 'test2', 'tesst', 'je suis', 'inscrit', 'visiteur', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `auteurId` (`auteurId`),
  ADD KEY `recetteId` (`recetteId`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recetteId` (`recetteId`),
  ADD KEY `auteurId` (`auteurId`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteurId` (`auteurId`),
  ADD KEY `categorieId` (`categorieId`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`auteurId`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`recetteId`) REFERENCES `recettes` (`id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `auteurId` FOREIGN KEY (`auteurId`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `recetteId` FOREIGN KEY (`recetteId`) REFERENCES `recettes` (`id`);

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`auteurId`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `recettes_ibfk_2` FOREIGN KEY (`categorieId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
