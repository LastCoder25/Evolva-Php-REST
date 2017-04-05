/* TABLE Status */
INSERT INTO status (status, depositeCommission, finalCommission) VALUES ("Bénévole", 0, 5);
INSERT INTO status (status, depositeCommission, finalCommission) VALUES ("Client", 2, 20);

/* TABLE User */
INSERT INTO user (identifiant, password)
VALUES("mjc", "1234");
INSERT INTO user (identifiant, password)
VALUES("mag", "1478");
INSERT INTO user (identifiant, password)
VALUES("cloclo", "1111");
INSERT INTO user (identifiant, password)
VALUES("mel", "2222");
INSERT INTO user (identifiant, password)
VALUES("al", "3333");

/* TABLE Admin */
INSERT INTO admin (idUser)
VALUES(1);

/* TABLE participant */
INSERT INTO participant (idUser, firstname, lastname, sexe, accountCreationDate)
VALUES(2, "Maguy", "Bachere", "Femme", now());
INSERT INTO participant (idUser, firstname, lastname, sexe, accountCreationDate)
VALUES(3, "Claude", "Bachere", "Homme", now());
INSERT INTO participant (idUser, firstname, lastname, sexe, accountCreationDate)
VALUES(4, "Mélanie", "Bachere", "Femme", now());
INSERT INTO participant (idUser, firstname, lastname, sexe, accountCreationDate)
VALUES(5, "Alban", "Martinez", "Homme", now());

/* TABLE Type */
INSERT INTO type (type) VALUES ("Vêtements");
INSERT INTO type (type) VALUES ("Jouets");

/* TABLE Category */
INSERT INTO category (category) VALUES ("Homme");
INSERT INTO category (category) VALUES ("Femme");
INSERT INTO category (category) VALUES ("Enfants");

/* TABLE TypeOfClothes */
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Jean");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Pantalon");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Pantacourt");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Tshirt manches longues");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Tshirt manches courtes");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Tshirt manches trois quart");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chemise manches longues");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chemise manches courtes");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chemisier");
INSERT INTO typeOfClothes (typeOfClothes) VALUES ("Chaussures");

/* TABLE TypeOfToy */
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu de société");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Puzzle");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu vidéo");
INSERT INTO typeOfToy (typeOfToy) VALUES ("Jeu de cartes");

/* TABLE Exchange */
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-02-02", "2017-02-05", "2017-02-06", "2017-02-08", "2017-02-09", "2017-02-15", "Vêtements");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-07-02", "2017-07-05", "2017-07-06", "2017-07-08", "2017-07-09", "2017-07-15", "Vêtements");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-07-02", "2017-07-05", "2017-07-06", "2017-07-08", "2017-07-09", "2017-07-15", "Jouets");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-04-04", "2017-04-06", "2017-04-07", "2017-04-09", "2017-04-010", "2017-04-13", "Vêtements");
INSERT INTO exchange (depositeFromDate, depositeByDate, sellFromDate, sellByDate, withdrawalFromDate, withdrawalByDate, type)
VALUES ("2017-11-02", "2017-11-05", "2017-11-06", "2017-11-08", "2017-11-09", "2017-11-15", "Jouets");

/* TABLE fromStatus */
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (2, 1, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (2, 2, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (2, 3, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (4, 1, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (3, 2, 2);
INSERT INTO fromStatus (idUser, idExchange, idStatus) VALUES (3, 3, 2);

/* TABLE Article & Clothes */
INSERT INTO articles (description, type) VALUES ("Bon état", "Vêtements");
INSERT INTO clothes (idArticle, size, color, brand, typeOfClothes, category) VALUES (1, "XXL", "Bleu tacheté", null, "Jean", "Homme");
INSERT INTO articles (description, type) VALUES ("Bon état", "Vêtements");
INSERT INTO clothes (idArticle, size, color, brand, typeOfClothes, category) VALUES (2, "42", "Rouge", "Lacoste", "Tshirt manches courtes", "Homme");
INSERT INTO articles (description, type) VALUES ("Excellent état", "Vêtements");
INSERT INTO clothes (idArticle, size, color, brand, typeOfClothes, category) VALUES (3, null, "Blanc motif étoiles", "Kiabi", "Chemise manches longues", "Femme");
INSERT INTO articles (description, type) VALUES ("Bon état général", "Vêtements");
INSERT INTO clothes (idArticle, size, color, brand, typeOfClothes, category) VALUES (4, "36", "Rouge et blanche", "Adidas", "Chaussures", "Enfants");

/* TABLE Article & Toys */
INSERT INTO articles (description, type) VALUES ("Bon état", "Jouets");
INSERT INTO toy (idArticle, typeOfToy) VALUES (5, "Jeu de société");
INSERT INTO articles (description, type) VALUES ("Bon état", "Jouets");
INSERT INTO toy (idArticle, typeOfToy) VALUES (6, "Jeu vidéo");

/* TABLE deposite */
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (2, 1, 1, 15, NOW());
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (2, 2, 1, 5, NOW());
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (2, 3, 1, 10, NOW());
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (3, 4, 1, 12, NOW());
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (4, 5, 2, 20, NOW());
INSERT INTO deposite (idUser, idArticle, idExchange, price, depositeDate) VALUES (4, 6, 2, 18, NOW());
