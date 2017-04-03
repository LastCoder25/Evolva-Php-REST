DROP DATABASE IF EXISTS evolva;
CREATE DATABASE IF NOT EXISTS evolva;
USE evolva;

#------------------------------------------------------------
# Table: Articles
#------------------------------------------------------------

CREATE TABLE Articles(
        idArticle   int (11) Auto_increment  NOT NULL ,
        description Varchar (100) ,
        type        Varchar (10) NOT NULL ,
        PRIMARY KEY (idArticle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Exchange
#------------------------------------------------------------

CREATE TABLE Exchange(
        idExchange         int (11) Auto_increment  NOT NULL ,
        depositeFromDate   Date ,
        depositeByDate     Date ,
        sellFromDate       Date ,
        sellByDate         Date NOT NULL ,
        withdrawalFromDate Date ,
        withdrawalByDate   Date ,
        type               Varchar (10) NOT NULL ,
        PRIMARY KEY (idExchange )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Clothes
#------------------------------------------------------------

CREATE TABLE Clothes(
        size          Varchar (10) ,
        color         Varchar (50) ,
        brand         Varchar (50) ,
        idArticle     Int NOT NULL ,
        typeOfClothes Varchar (100) NOT NULL ,
        category      Varchar (15) NOT NULL ,
        PRIMARY KEY (idArticle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Toy
#------------------------------------------------------------

CREATE TABLE Toy(
        idArticle Int NOT NULL ,
        typeOfToy Varchar (25) NOT NULL ,
        PRIMARY KEY (idArticle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        idUser              int (11) Auto_increment  NOT NULL ,
        identifiant         Varchar (20) NOT NULL ,
        password            Varchar (20) NOT NULL ,
        PRIMARY KEY (idUser ) ,
        UNIQUE (identifiant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TypeOfClothes
#------------------------------------------------------------

CREATE TABLE TypeOfClothes(
        typeOfClothes Varchar (100) NOT NULL ,
        PRIMARY KEY (typeOfClothes )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TypeOfToy
#------------------------------------------------------------

CREATE TABLE TypeOfToy(
        typeOfToy Varchar (25) NOT NULL ,
        PRIMARY KEY (typeOfToy )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        category Varchar (15) NOT NULL ,
        PRIMARY KEY (category )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Type
#------------------------------------------------------------

CREATE TABLE Type(
        type Varchar (10) NOT NULL ,
        PRIMARY KEY (type )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Status
#------------------------------------------------------------

CREATE TABLE Status(
        idStatus           int (11) Auto_increment  NOT NULL ,
        status             Varchar (25) NOT NULL ,
        depositeCommission DECIMAL (15,3)  NOT NULL ,
        finalCommission    DECIMAL (15,3)  NOT NULL ,
        PRIMARY KEY (idStatus ) ,
        UNIQUE (status )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        idUser Int NOT NULL ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participant
#------------------------------------------------------------

CREATE TABLE Participant(
        firstname           Varchar (50) NOT NULL ,
        lastname            Varchar (50) NOT NULL ,
        birthday            Date ,
        mail                Varchar (100) ,
        address             Varchar (100) ,
        city                Varchar (100) ,
        sexe                Varchar (25) ,
        accountCreationDate Datetime NOT NULL ,
        idUser              Int NOT NULL ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: deposite
#------------------------------------------------------------

CREATE TABLE deposite(
        price              DECIMAL (15,3)  ,
        registrationStatus Varchar (25) ,
        registrationDate   Datetime ,
        finalStatus        Varchar (25) ,
        depositeDate       Datetime NOT NULL ,
        idExchange         Int NOT NULL ,
        idArticle          Int NOT NULL ,
        idUser             Int NOT NULL ,
        PRIMARY KEY (idExchange ,idArticle ,idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fromStatus
#------------------------------------------------------------

CREATE TABLE fromStatus(
        idStatus   Int NOT NULL ,
        idExchange Int NOT NULL ,
        idUser     Int NOT NULL ,
        PRIMARY KEY (idStatus ,idExchange ,idUser )
)ENGINE=InnoDB;

ALTER TABLE Articles ADD CONSTRAINT FK_Articles_type FOREIGN KEY (type) REFERENCES Type(type);
ALTER TABLE Exchange ADD CONSTRAINT FK_Exchange_type FOREIGN KEY (type) REFERENCES Type(type);
ALTER TABLE Clothes ADD CONSTRAINT FK_Clothes_idArticle FOREIGN KEY (idArticle) REFERENCES Articles(idArticle);
ALTER TABLE Clothes ADD CONSTRAINT FK_Clothes_typeOfClothes FOREIGN KEY (typeOfClothes) REFERENCES TypeOfClothes(typeOfClothes);
ALTER TABLE Clothes ADD CONSTRAINT FK_Clothes_category FOREIGN KEY (category) REFERENCES Category(category);
ALTER TABLE Toy ADD CONSTRAINT FK_Toy_idArticle FOREIGN KEY (idArticle) REFERENCES Articles(idArticle);
ALTER TABLE Toy ADD CONSTRAINT FK_Toy_typeOfToy FOREIGN KEY (typeOfToy) REFERENCES TypeOfToy(typeOfToy);
ALTER TABLE Admin ADD CONSTRAINT FK_Admin_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE Participant ADD CONSTRAINT FK_Participant_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE deposite ADD CONSTRAINT FK_deposite_idExchange FOREIGN KEY (idExchange) REFERENCES Exchange(idExchange);
ALTER TABLE deposite ADD CONSTRAINT FK_deposite_idArticle FOREIGN KEY (idArticle) REFERENCES Articles(idArticle);
ALTER TABLE deposite ADD CONSTRAINT FK_deposite_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE fromStatus ADD CONSTRAINT FK_fromStatus_idStatus FOREIGN KEY (idStatus) REFERENCES Status(idStatus);
ALTER TABLE fromStatus ADD CONSTRAINT FK_fromStatus_idExchange FOREIGN KEY (idExchange) REFERENCES Exchange(idExchange);
ALTER TABLE fromStatus ADD CONSTRAINT FK_fromStatus_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);


/* PROCEDURES STOCKEES */

/* GET all exchanges */
DELIMITER |
CREATE PROCEDURE getAllExchanges()
BEGIN
	SELECT * FROM exchange;
END |

/* GET all exchanges */
DELIMITER |
CREATE PROCEDURE getAllExchangesOfVolunteer(IN id INT)
BEGIN
	SELECT * FROM exchange
  WHERE idExchange IN (SELECT idExchange
                       FROM fromStatus
                       WHERE fromStatus.idUser = id);
END |

/* GET all volunteers */
DELIMITER |
CREATE PROCEDURE getVolunteersOfExchange(IN id INT)
BEGIN
	SELECT *
  FROM fromStatus
  INNER JOIN participant ON participant.idUser = fromStatus.idUser
  WHERE fromStatus.idExchange = id
  AND fromStatus.idStatus = 2;
END |

/* GET all users free to be volunteers */
DELIMITER |
CREATE PROCEDURE getUsersFreeToBeVolunteers(IN id INT)
BEGIN
	SELECT *
  FROM participant
  WHERE participant.idUser NOT IN (SELECT idUser
                            FROM fromStatus
                            WHERE fromStatus.idExchange = id);
END |

/* Remove volunteer from Exchange */
DELIMITER |
CREATE PROCEDURE removeVolunteerOfExchange(IN idUser INT, IN idExchange INT)
BEGIN
	DELETE FROM fromStatus WHERE fromStatus.idUser = idUser AND fromStatus.idExchange = idExchange;
END |

/* GetAccount of user */
DELIMITER |
CREATE PROCEDURE getAccount(IN ident VARCHAR(20), IN pass VARCHAR(20))
BEGIN
	SELECT idUser, identifiant, firstname, lastname, mail, sexe, address, city, birthday
  	FROM user
  	INNER JOIN participant ON participant.idUser = user.idUser
  	WHERE user.identifiant = ident AND user.password = pass;
END |
