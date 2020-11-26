--
-- File generated with SQLiteStudio v3.2.1 on Thu Nov 12 19:38:01 2020
--
-- Text encoding used: TIS-620
--
PRAGMA foreign_keys = on;
BEGIN TRANSACTION;

-- Table: Account
DROP TABLE IF EXISTS Account;

CREATE TABLE Account (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name CHAR
);


-- Table: Breed
DROP TABLE IF EXISTS Breed;

CREATE TABLE Breed (
    id        INTEGER  PRIMARY KEY AUTOINCREMENT,
    speciesID      REFERENCES Species (id),
    name      CHAR
);


-- Table: Collaborator
DROP TABLE IF EXISTS Collaborator;

CREATE TABLE Collaborator (
    userID    INTEGER     REFERENCES User (id),
    shelterID INTEGER     REFERENCES Shelter (id),
    admin     BOOLEAN,
    PRIMARY KEY (
        userID,
        shelterID
    )
);


-- Table: Comment
DROP TABLE IF EXISTS Comment;

CREATE TABLE Comment (
    id        INTEGER  PRIMARY KEY AUTOINCREMENT,
    petID     INTEGER  REFERENCES Pet (id),
    accountID INTEGER  REFERENCES Account (id),
    text      CHAR,
    date      DATE
);


-- Table: Favourite
DROP TABLE IF EXISTS Favourite;

CREATE TABLE Favourite (
    accountID INTEGER REFERENCES Account (id),
    petID     INTEGER REFERENCES IndividualPet (petID),
    PRIMARY KEY (
        accountID,
        petID
    )
);


-- Table: GroupPet
DROP TABLE IF EXISTS GroupPet;

CREATE TABLE GroupPet (
    petID  INTEGER PRIMARY KEY
               REFERENCES Pet (id),
    number INTEGER
);


-- Table: IndividualPet
DROP TABLE IF EXISTS IndividualPet;

CREATE TABLE IndividualPet (
    petID   INTEGER  PRIMARY KEY
                 REFERENCES Pet (id),
    breedID INTEGER  REFERENCES Breed (id),
    name    CHAR,
    size    CHAR,
    colour  CHAR
);


-- Table: Inquiry
DROP TABLE IF EXISTS Inquiry;

CREATE TABLE Inquiry (
    id     INTEGER PRIMARY KEY AUTOINCREMENT,
    petID  INTEGER REFERENCES Pet (id),
    userID INTEGER REFERENCES User (id)
);


-- Table: Message
DROP TABLE IF EXISTS Message;

CREATE TABLE Message (
    id        INTEGER     PRIMARY KEY AUTOINCREMENT,
    inquiryID INTEGER     REFERENCES Inquiry (id),
    petOwner  BOOLEAN,
    text      CHAR,
    date      DATE
);


-- Table: Pet
DROP TABLE IF EXISTS Pet;

CREATE TABLE Pet (
    id           INTEGER  PRIMARY KEY AUTOINCREMENT,
    ownerID      INTEGER  REFERENCES Account (id),
    bio          CHAR,
    description  CHAR,
    requirements CHAR
);


-- Table: PetGroupBreed
DROP TABLE IF EXISTS PetGroupBreed;

CREATE TABLE PetGroupBreed (
    petID        REFERENCES Pet (id),
    breedID  INTEGER REFERENCES Breed (id),
    quantity INTEGER,
    PRIMARY KEY (
        petID,
        breedID
    )
);


-- Table: Post
DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    id          INTEGER  PRIMARY KEY AUTOINCREMENT,
    petID       INTEGER  REFERENCES Pet (id),
    description CHAR,
    photo       CHAR,
    date        DATE,
    likes       INTEGER
);


-- Table: PostComment
DROP TABLE IF EXISTS PostComment;

CREATE TABLE PostComment (
    id     INTEGER  PRIMARY KEY AUTOINCREMENT,
    postID INTEGER  REFERENCES Post (id),
    text   CHAR,
    date   DATE
);


-- Table: Proposal
DROP TABLE IF EXISTS Proposal;

CREATE TABLE Proposal (
    id        INTEGER  PRIMARY KEY AUTOINCREMENT,
    petID     INTEGER  REFERENCES Pet (id),
    accountID INTEGER  REFERENCES Account (id),
    date      DATE,
    state     CHAR
);


-- Table: Shelter
DROP TABLE IF EXISTS Shelter;

CREATE TABLE Shelter (
    id       INTEGER  PRIMARY KEY
                  REFERENCES Account (id),
    location CHAR
);


-- Table: Species
DROP TABLE IF EXISTS Species;

CREATE TABLE Species (
    id   INTEGER  PRIMARY KEY AUTOINCREMENT,
    name CHAR
);


-- Table: User
DROP TABLE IF EXISTS User;

CREATE TABLE User (
    id           INTEGER  REFERENCES Account (id)
                      PRIMARY KEY,
    email        CHAR,
    passwordhash INTEGER
);


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
