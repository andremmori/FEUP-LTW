-- Account
INSERT INTO account (name) VALUES ('John Doe'); -- id 1
INSERT INTO account (name) VALUES ('Jane Doe'); -- id 2
INSERT INTO account (name) VALUES ('John Wick'); -- id 3
INSERT INTO account (name) VALUES ('Sultan Rowland'); -- id 4
INSERT INTO account (name) VALUES ('Erik Howells'); -- id 5
INSERT INTO account (name) VALUES ('Happy Shelter'); -- id 6
INSERT INTO account (name) VALUES ('Cool Shelter'); -- id 7
INSERT INTO account (name) VALUES ('Sad Shelter'); -- id 8
INSERT INTO account (name) VALUES ('Dogs Only Shelter'); -- id 9
INSERT INTO account (name) VALUES ('Cats only Shelter'); -- id 10

-- User
INSERT INTO user (id, email, passwordhash) VALUES (1, 'johndoe@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'); -- id 1
INSERT INTO user (id, email, passwordhash) VALUES (2, 'janedoe@gmail.com', 'e4ad93ca07acb8d908a3aa41e920ea4f4ef4f26e7f86cf8291c5db289780a5ae'); -- id 2
INSERT INTO user (id, email, passwordhash) VALUES (3, 'johnwick@gmail.com', '6382deaf1f5dc6e792b76db4a4a7bf2ba468884e000b25e7928e621e27fb23cb'); -- id 3
INSERT INTO user (id, email, passwordhash) VALUES (4, 'sultanrowland@gmail.com', '280d44ab1e9f79b5cce2dd4f58f5fe91f0fbacdac9f7447dffc318ceb79f2d02'); -- id 4
INSERT INTO user (id, email, passwordhash) VALUES (5, 'erikhowells@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'); -- id 5

-- Shelter
INSERT INTO shelter (id, location) VALUES (6, 'Porto');
INSERT INTO shelter (id, location) VALUES (7, 'Coimbra');
INSERT INTO shelter (id, location) VALUES (8, 'Lisbon');
INSERT INTO shelter (id, location) VALUES (9, 'Faro');
INSERT INTO shelter (id, location) VALUES (10, 'Braga');

-- Collaborator
INSERT INTO collaborator (userID, shelterID, admin) VALUES (1, 6, 1);
INSERT INTO collaborator (userID, shelterID, admin) VALUES (2, 7, 1);
INSERT INTO collaborator (userID, shelterID, admin) VALUES (3, 8, 1);
INSERT INTO collaborator (userID, shelterID, admin) VALUES (4, 9, 1);
INSERT INTO collaborator (userID, shelterID, admin) VALUES (5, 10, 1);


-- Species
INSERT INTO species (name) VALUES ('DOG'); -- id 1
INSERT INTO species (name) VALUES ('CAT'); -- id 2
INSERT INTO species (name) VALUES ('TIGER'); -- id 3
INSERT INTO species (name) VALUES ('LION'); -- id 4
INSERT INTO species (name) VALUES ('FISH'); -- id 5

-- Breed
INSERT INTO breed (speciesID, name) VALUES (1, 'PUG'); -- id 1
INSERT INTO breed (speciesID, name) VALUES (1, 'BEAGLE'); -- id 2
INSERT INTO breed (speciesID, name) VALUES (1, 'GOLDEN RETRIEVER'); -- id 3
INSERT INTO breed (speciesID, name) VALUES (1, 'POODLE'); -- id 4
INSERT INTO breed (speciesID, name) VALUES (1, 'GERMAN SHEPHERD'); -- id 5

-- Pet
INSERT INTO pet (ownerID, name, bio, description, requirements) VALUES (1, 'Agent 47', 'Good boy', 'Great dog', 'Have a house'); -- id 1
INSERT INTO pet (ownerID, name, bio, description, requirements) VALUES (2, 'Abby', 'Good girl', 'Great dog', 'Have a house'); -- id 2
INSERT INTO pet (ownerID, name, bio, description, requirements) VALUES (3, 'Ajax', 'Bad boy', 'Bad dog', 'Have a house'); -- id 3
INSERT INTO pet (ownerID, name, bio, description, requirements) VALUES (4, 'Abigail', 'Bad girl', 'Bad dog', 'Have a house'); -- id 4
INSERT INTO pet (ownerID, name, bio, description, requirements) VALUES (5, 'Bunch of dogs', 'Ok boys', 'Ok dogs', 'Have a house'); -- id 5

-- IndividualPet
INSERT INTO individualpet (petID, breedID, size, colour) VALUES (1, 2, 'SMALL', 'WHITE'); -- id 1
INSERT INTO individualpet (petID, breedID, size, colour) VALUES (2, 2, 'SMALL', 'WHITE'); -- id 2
INSERT INTO individualpet (petID, breedID, size, colour) VALUES (3, 5, 'BIG', 'MIXED'); -- id 3
INSERT INTO individualpet (petID, breedID, size, colour) VALUES (4, 2, 'MEDIUM', 'MIXED'); -- id 4

-- GroupPet
INSERT INTO grouppet (petID, number) VALUES (5, 3); -- id 5

-- PetGroupBreed
INSERT INTO petgroupbreed (petID, breedID, quantity) VALUES (5, 3, 2); -- id 5
INSERT INTO petgroupbreed (petID, breedID, quantity) VALUES (5, 5, 1); -- id 5

-- Inquiry
INSERT INTO inquiry (petID, userID) values (1, 5); -- id 1
INSERT INTO inquiry (petID, userID) values (2, 3); -- id 2
INSERT INTO inquiry (petID, userID) values (3, 4); -- id 3
INSERT INTO inquiry (petID, userID) values (4, 2); -- id 4
INSERT INTO inquiry (petID, userID) values (5, 1); -- id 5

-- Message
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (1, 0, 'Is this available??', date('now')); -- id 1
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (1, 1, 'yes', date('now')); -- id 2
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (2, 0, 'Is this available??', date('now')); -- id 3
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (2, 1, 'yes', date('now')); -- id 4
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (3, 0, 'Is this available??', date('now')); -- id 5
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (3, 1, 'yes', date('now')); -- id 6
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (4, 0, 'Is this available??', date('now')); -- id 7
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (4, 1, 'yes', date('now')); -- id 8
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (5, 0, 'Is this available??', date('now')); -- id 9
INSERT INTO message (inquiryID, petOwner, text, date) VALUES (5, 1, 'yes', date('now')); -- id 10

-- Proposal
INSERT INTO proposal (petID, accountID, date, text, state) VALUES (1, 5, date('now'), 'I want him!', 'PENDING'); -- id 1
INSERT INTO proposal (petID, accountID, date, text, state) VALUES (2, 3, date('now'), 'I want him!', 'PENDING'); -- id 2
INSERT INTO proposal (petID, accountID, date, text, state) VALUES (3, 4, date('now'), 'I want him!', 'PENDING'); -- id 3
INSERT INTO proposal (petID, accountID, date, text, state) VALUES (4, 2, date('now'), 'I want him!', 'PENDING'); -- id 4
INSERT INTO proposal (petID, accountID, date, text, state) VALUES (5, 1, date('now'), 'I want him!', 'PENDING'); -- id 5

-- Post
INSERT INTO post (petID, description, photo, date, likes) VALUES (1, 'Adopt me', '1.jpg', date('now'), 111); -- id 1
INSERT INTO post (petID, description, photo, date, likes) VALUES (2, 'Take me home', '2.jpg', date('now'), 43); -- id 2
INSERT INTO post (petID, description, photo, date, likes) VALUES (3, 'help me', '3.jpg', date('now'), 69); -- id 3
INSERT INTO post (petID, description, photo, date, likes) VALUES (4, 'I want someone', '4.jpg', date('now'), 6); -- id 4
INSERT INTO post (petID, description, photo, date, likes) VALUES (5, 'help us', '5.jpg', date('now'), 4); -- id 5

-- PostComment
INSERT INTO postcomment (postID, accountID, text, date) VALUES (1, 1, 'cuteee', date('now')); -- id 1
INSERT INTO postcomment (postID, accountID, text, date) VALUES (2, 2, 'lovely', date('now')); -- id 2
INSERT INTO postcomment (postID, accountID, text, date) VALUES (3, 3, 'nice', date('now')); -- id 3
INSERT INTO postcomment (postID, accountID, text, date) VALUES (4, 4, 'wow', date('now')); -- id 4
INSERT INTO postcomment (postID, accountID, text, date) VALUES (5, 5, 'omg', date('now')); -- id 5

-- Favourite
INSERT INTO favourite (accountID, petID) VALUES (1,3);
INSERT INTO favourite (accountID, petID) VALUES (2,3);
INSERT INTO favourite (accountID, petID) VALUES (3,4);
INSERT INTO favourite (accountID, petID) VALUES (4,2);
INSERT INTO favourite (accountID, petID) VALUES (5,1);

-- Comment
INSERT INTO comment (petID, accountID, text, date) VALUES (1,5, 'I like this pet', date('now')); -- id 1
INSERT INTO comment (petID, accountID, text, date) VALUES (2,3, 'I love this pet', date('now')); -- id 2
INSERT INTO comment (petID, accountID, text, date) VALUES (3,4, 'I want it', date('now')); -- id 3
INSERT INTO comment (petID, accountID, text, date) VALUES (4,2, 'Wow so cool', date('now')); -- id 4
INSERT INTO comment (petID, accountID, text, date) VALUES (5,1, 'I like them', date('now')); -- id 5