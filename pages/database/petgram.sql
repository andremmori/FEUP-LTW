--
-- File generated with SQLiteStudio v3.2.1 on Thu Nov 12 19:38:01 2020
--
-- Text encoding used: TIS-620
--
PRAGMA foreign_keys = on;
BEGIN TRANSACTION;



DROP TABLE IF EXISTS Collaborator;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Favourite;
DROP TABLE IF EXISTS GroupPet;
DROP TABLE IF EXISTS IndividualPet;
DROP TABLE IF EXISTS Inquiry;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS Pet;
DROP TABLE IF EXISTS PetGroupBreed;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS PetImage;
DROP TABLE IF EXISTS AccountImage;
DROP TABLE IF EXISTS PostComment;
DROP TABLE IF EXISTS Proposal;
DROP TABLE IF EXISTS Shelter;
DROP TABLE IF EXISTS Species;
DROP TABLE IF EXISTS User;

-- Table: Account
DROP TABLE IF EXISTS Account;
CREATE TABLE Account (
    id INTEGER PRIMARY KEY,
    profilePic   INTEGER  REFERENCES AccountImage (id) ON DELETE CASCADE,
    name CHAR
);


-- Table: Breed
DROP TABLE IF EXISTS Breed;
CREATE TABLE Breed (
    id        INTEGER  PRIMARY KEY,
    speciesID      REFERENCES Species (id) ON DELETE CASCADE,
    name      CHAR
);


-- Table: Collaborator
CREATE TABLE Collaborator (
    userID    INTEGER     REFERENCES User (id) ON DELETE CASCADE,
    shelterID INTEGER     REFERENCES Shelter (id) ON DELETE CASCADE,
    admin     BOOLEAN,
    PRIMARY KEY (
        userID,
        shelterID
    )
);


-- Table: Comment
CREATE TABLE Comment (
    id        INTEGER  PRIMARY KEY,
    petID     INTEGER  REFERENCES Pet (id) ON DELETE CASCADE,
    accountID INTEGER  REFERENCES Account (id) ON DELETE CASCADE,
    text      CHAR,
    date      DATE
);


-- Table: Favourite
CREATE TABLE Favourite (
    accountID INTEGER REFERENCES Account (id) ON DELETE CASCADE,
    petID     INTEGER REFERENCES IndividualPet (petID) ON DELETE CASCADE,
    PRIMARY KEY (
        accountID,
        petID
    )
);


-- Table: GroupPet
CREATE TABLE GroupPet (
    petID  INTEGER PRIMARY KEY
               REFERENCES Pet (id) ON DELETE CASCADE,
    number INTEGER
);


-- Table: IndividualPet
CREATE TABLE IndividualPet (
    petID   INTEGER  PRIMARY KEY
                 REFERENCES Pet (id) ON DELETE CASCADE,
    breedID INTEGER  REFERENCES Breed (id) ON DELETE CASCADE,
    size    CHAR,
    colour  CHAR
);


-- Table: Inquiry
CREATE TABLE Inquiry (
    id     INTEGER PRIMARY KEY,
    petID  INTEGER REFERENCES Pet (id) ON DELETE CASCADE,
    userID INTEGER REFERENCES User (id) ON DELETE CASCADE
);


-- Table: Message
CREATE TABLE Message (
    id        INTEGER     PRIMARY KEY,
    inquiryID INTEGER     REFERENCES Inquiry (id) ON DELETE CASCADE,
    petOwner  BOOLEAN,
    text      CHAR,
    date      DATE
);


-- Table: Pet
CREATE TABLE Pet (
    id           INTEGER  PRIMARY KEY,
    ownerID      INTEGER  REFERENCES Account (id) ON DELETE CASCADE,
    profilePic   INTEGER  REFERENCES PetImage (id) ON DELETE CASCADE,
    name         CHAR,
    bio          CHAR,
    description  CHAR,
    requirements CHAR
);


-- Table: PetGroupBreed
CREATE TABLE PetGroupBreed (
    petID        REFERENCES Pet (id) ON DELETE CASCADE,
    breedID  INTEGER REFERENCES Breed (id) ON DELETE CASCADE,
    quantity INTEGER,
    PRIMARY KEY (
        petID,
        breedID
    )
);


-- Table: Post
CREATE TABLE Post (
    id          INTEGER  PRIMARY KEY,
    petID       INTEGER  REFERENCES Pet (id) ON DELETE CASCADE,
    photo       INTEGER  REFERENCES PetImage (id) ON DELETE CASCADE,
    description CHAR,
    date        DATE
);

-- Table: PostLike
CREATE TABLE PostLike (
    accountID INTEGER REFERENCES Account (id) ON DELETE CASCADE,
    postID    INTEGER REFERENCES Post (id) ON DELETE CASCADE,
    PRIMARY KEY (accountID, postID)
);

-- Table: AccountImage
CREATE TABLE AccountImage (
    id          INTEGER  PRIMARY KEY,
    accountID       INTEGER  REFERENCES Account (id) ON DELETE CASCADE
);

-- Table: PetImage
CREATE TABLE PetImage (
    id          INTEGER  PRIMARY KEY,
    petID       INTEGER  REFERENCES Pet (id) ON DELETE CASCADE
);


-- Table: PostComment
CREATE TABLE PostComment (
    id     INTEGER  PRIMARY KEY,
    postID INTEGER  REFERENCES Post (id) ON DELETE CASCADE,
    accountID INTEGER  REFERENCES Account (id) ON DELETE CASCADE,
    text   CHAR,
    date   DATE
);


-- Table: Proposal
CREATE TABLE Proposal (
    id        INTEGER  PRIMARY KEY,
    petID     INTEGER  REFERENCES Pet (id) ON DELETE CASCADE,
    accountID INTEGER  REFERENCES Account (id) ON DELETE CASCADE,
    date      DATE,
    text      CHAR,
    state     CHAR
);


-- Table: Shelter
CREATE TABLE Shelter (
    id       INTEGER  PRIMARY KEY
                  REFERENCES Account (id) ON DELETE CASCADE,
    location CHAR
);


-- Table: Species
CREATE TABLE Species (
    id   INTEGER  PRIMARY KEY,
    name CHAR
);


-- Table: User
CREATE TABLE User (
    id           INTEGER  REFERENCES Account (id)  ON DELETE CASCADE
                      PRIMARY KEY,
    email        CHAR UNIQUE,
    passwordhash TEXT
);


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
