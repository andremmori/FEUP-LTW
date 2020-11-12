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
    id   INT  PRIMARY KEY,
    name CHAR
);


-- Table: Breed
DROP TABLE IF EXISTS Breed;

CREATE TABLE Breed (
    id        INT  PRIMARY KEY,
    speciesID      REFERENCES Species (id),
    name      CHAR
);


-- Table: Collaborator
DROP TABLE IF EXISTS Collaborator;

CREATE TABLE Collaborator (
    userID    INT     REFERENCES User (id),
    shelterID INT     REFERENCES Shelter (id),
    admin     BOOLEAN,
    PRIMARY KEY (
        userID,
        shelterID
    )
);


-- Table: Comment
DROP TABLE IF EXISTS Comment;

CREATE TABLE Comment (
    id        INT  PRIMARY KEY,
    petID     INT  REFERENCES Pet (id),
    accountID INT  REFERENCES Account (id),
    text      CHAR,
    date      DATE
);


-- Table: Favourite
DROP TABLE IF EXISTS Favourite;

CREATE TABLE Favourite (
    accountID INT REFERENCES Account (id),
    petID     INT REFERENCES IndividualPet (petID),
    PRIMARY KEY (
        accountID,
        petID
    )
);


-- Table: GroupPet
DROP TABLE IF EXISTS GroupPet;

CREATE TABLE GroupPet (
    petID  INT PRIMARY KEY
               REFERENCES Pet (id),
    number INT
);


-- Table: IndividualPet
DROP TABLE IF EXISTS IndividualPet;

CREATE TABLE IndividualPet (
    petID   INT  PRIMARY KEY
                 REFERENCES Pet (id),
    breedID INT  REFERENCES Breed (id),
    name    CHAR,
    size    CHAR,
    colour  CHAR
);


-- Table: Inquiry
DROP TABLE IF EXISTS Inquiry;

CREATE TABLE Inquiry (
    id     INT PRIMARY KEY,
    petID  INT REFERENCES Pet (id),
    userID INT REFERENCES User (id) 
);


-- Table: Message
DROP TABLE IF EXISTS Message;

CREATE TABLE Message (
    id        INT     PRIMARY KEY,
    inquiryID INT     REFERENCES Inquiry (id),
    petOwner  BOOLEAN,
    text      CHAR,
    date      DATE
);


-- Table: Pet
DROP TABLE IF EXISTS Pet;

CREATE TABLE Pet (
    id           INT  PRIMARY KEY,
    ownerID      INT  REFERENCES Account (id),
    bio          CHAR,
    description  CHAR,
    requirements CHAR
);


-- Table: PetGroupBreed
DROP TABLE IF EXISTS PetGroupBreed;

CREATE TABLE PetGroupBreed (
    petID        REFERENCES Pet (id),
    breedID  INT REFERENCES Breed (id),
    quantity INT,
    PRIMARY KEY (
        petID,
        breedID
    )
);


-- Table: Post
DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    id          INT  PRIMARY KEY,
    petID       INT  REFERENCES Pet (id),
    description CHAR,
    photo       CHAR,
    date        DATE,
    likes       INT
);


-- Table: PostComment
DROP TABLE IF EXISTS PostComment;

CREATE TABLE PostComment (
    id     INT  PRIMARY KEY,
    postID INT  REFERENCES Post (id),
    text   CHAR,
    date   DATE
);


-- Table: Proposal
DROP TABLE IF EXISTS Proposal;

CREATE TABLE Proposal (
    id        INT  PRIMARY KEY,
    petID     INT  REFERENCES Pet (id),
    accountID INT  REFERENCES Account (id),
    date      DATE,
    state     CHAR
);


-- Table: Shelter
DROP TABLE IF EXISTS Shelter;

CREATE TABLE Shelter (
    id       INT  PRIMARY KEY
                  REFERENCES Account (id),
    location CHAR
);


-- Table: Species
DROP TABLE IF EXISTS Species;

CREATE TABLE Species (
    id   INT  PRIMARY KEY,
    name CHAR
);


-- Table: User
DROP TABLE IF EXISTS User;

CREATE TABLE User (
    id           INT  REFERENCES Account (id) 
                      PRIMARY KEY,
    email        CHAR,
    passwordhash INT
);


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
