/* TABLE Status */
INSERT INTO status (status, depositeCommission, finalCommission) VALUES ("MJC", 0, 0);
INSERT INTO status (status, depositeCommission, finalCommission) VALUES ("Bénévole", 0, 5);
INSERT INTO status (status, depositeCommission, finalCommission) VALUES ("Client", 2, 20);

/* TABLE User */
INSERT INTO user (identifiant, password, firstname, lastname, sexe, accountCreationDate)
VALUES("Maguy", "mag", "Maguy", "Bachere", "Femme", now());
INSERT INTO user (identifiant, password, firstname, lastname, sexe, accountCreationDate)
VALUES("Béatrice", "bea", "Béatrice", "Machin", "Femme", now());
INSERT INTO user (identifiant, password, firstname, lastname, sexe, accountCreationDate)
VALUES("Maxime", "max", "Maxime", "Bidule", "Homme", now());

/* TABLE Type */
INSERT INTO type (type) VALUES ("Vêtements");
INSERT INTO type (type) VALUES ("Jouets");

/* TABLE Category */
INSERT INTO category (category) VALUES ("Homme");
INSERT INTO category (category) VALUES ("Femme");
INSERT INTO category (category) VALUES ("Enfants");

/* TABLE Brand */
INSERT INTO brand (brand) VALUES ("Nike");
INSERT INTO brand (brand) VALUES ("Adidas");
INSERT INTO brand (brand) VALUES ("Lacoste");
INSERT INTO brand (brand) VALUES ("Auchan");
INSERT INTO brand (brand) VALUES ("Kiabi");

/* TABLE Color */
INSERT INTO brand (brand) VALUES ("Rouge");
INSERT INTO brand (brand) VALUES ("Blanc");
INSERT INTO brand (brand) VALUES ("Vert");
INSERT INTO brand (brand) VALUES ("Bleu");
INSERT INTO brand (brand) VALUES ("Jaune");
INSERT INTO brand (brand) VALUES ("Multicolore");

/* TABLE TypeOfClothes */
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Jean");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Pantalon");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chemise");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chemisier");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chaussures");

/* TABLE TypeOfToy */
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu de société");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Puzzle");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu vidéo");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu de cartes");

/* TABLE Exchange */
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-07-02", "2017-07-05", "2017-07-06", "2017-07-08", "2017-07-09", "2017-07-15", "Vêtements");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-07-02", "2017-07-05", "2017-07-06", "2017-07-08", "2017-07-09", "2017-07-15", "Jouets");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-04-04", "2017-04-06", "2017-04-07", "2017-04-09", "2017-04-010", "2017-04-13", "Vêtements");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-11-02", "2017-11-05", "2017-11-06", "2017-11-08", "2017-11-09", "2017-11-15", "Jouets");

/* TABLE fromStatus */
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (1, 1, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (2, 1, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (1, 2, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (3, 2, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (3, 3, 2);
