CREATE TABLE Scripture (
    id INT NOT NULL,
    book VARCHAR(225) NOT NULL,
    chapter INT NOT NULL,
    verse INT NOT NULL,
    content TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE topic (
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(225) NOT NULL
);

CREATE TABLE scripture_topic (
    id SERIAL CONSTRAINT scripture_topic_pk NOT NULL PRIMARY KEY,
    scripture_id INT CONSTRAINT scripture_topic_fk REFERENCES scripture (id),
    topic_id INT CONSTRAINT scripture_topic_fk_02 REFERENCES topic(id)
);

ALTER TABLE topic
    DROP id;

ALTER TABLE scripture_topic
    ADD topic_id INT CONSTRAINT scripture_topic_fk_02 REFERENCES topic(id);

INSERT INTO topic 
VALUES  (DEFAULT, 'Faith'),
        (DEFAULT, 'Sacrifice'),
        (DEFAULT, 'Charity');

INSERT INTO Scripture
VALUES (001, 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'), 
(002, 'Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
(003, 'Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
(004, 'Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

SELECT * FROM scripture;