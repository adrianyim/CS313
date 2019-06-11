-- Create section

CREATE TABLE users (
    user_id SERIAL NOT NULL CONSTRAINT users_pk PRIMARY KEY,
    user_name VARCHAR(225) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    gender VARCHAR(1) NOT NULL
);

CREATE TABLE items (
    item_id SERIAL NOT NULL CONSTRAINT items_pk PRIMARY KEY,
    item VARCHAR(45) NOT NULL,
    item_type VARCHAR(45) NOT NULL,
    cost DECIMAL NOT NULL,
    cost_type VARCHAR(45) NOT NULL,
    remark VARCHAR(45)
);

CREATE TABLE summary (
    id SERIAL NOT NULL CONSTRAINT summary_pk PRIMARY Key,
    total DECIMAL NOT NULL,
    date_ date NOT NULL,
    date_type VARCHAR(45) NOT NULL,
    user_id INT NOT NULL CONSTRAINT summary_fk REFERENCES users(user_id),
    item_id INT NOT NULL CONSTRAINT summary_fk_02 REFERENCES items(item_id)
);

-- Insert section

INSERT INTO users (user_id, user_name, password, gender)
    VALUES  (DEFAULT, 'Tester 1', '1', 'M'),
            (DEFAULT, 'Tester 2', '2', 'F'),
            (DEFAULT, 'Adrian', '3', 'M'),
            (DEFAULT, 'Olivia', '4', 'F'),
            (DEFAULT, 'Quinton', '5', 'M'),
            (DEFAULT, 'Angus', '6', 'M'),
            (DEFAULT, 'Travis', '7', 'M'),
            (DEFAULT, 'Eva', '8', 'F'),
            (DEFAULT, 'Abigail', '9', 'F'),
            (DEFAULT, 'Hazel', '10''F'),
            (DEFAULT, 'Adrianna', '11', 'F'),
            (DEFAULT, 'Ariana', '12', 'F');

INSERT INTO items (item_id, item, item_type, cost, cost_type, remark)
    VALUES  (DEFAULT, 'Walmark', 'Food', 20.99, 'expense', 'shoes'),
            (DEFAULT, 'BBQ', 'Food', 11.02, 'expense', ''),
            (DEFAULT, 'Tester 1 salary', 'Salaries and wages', 504.32, 'income', 'May'),
            (DEFAULT, 'Walmart', 'Food', 30.51, 'expense', ''),
            (DEFAULT, 'phone bill', 'Utility expenses', 22.39, 'expense', ''),
            (DEFAULT, 'Deseret Book', 'Others', 12.71, 'expense', 'BOM'),
            (DEFAULT, 'pizza', 'Food', 10.59, 'expense', 'BYUI crossroad'),
            (DEFAULT, 'burger king', 'Food', 13.76, 'expense', ''),
            (DEFAULT, 'gas', 'Utility expenses', 20.11, 'expense', ''),
            (DEFAULT, 'tithing', 'Others', 23.2, 'expense', 'May'),
            (DEFAULT, 'Rent', 'Utility expenses', 573, 'income', '??');

INSERT INTO summary (id, total, date_, date_type, user_id, item_id)
VALUES (DEFAULT, );

INSERT INTO users (user_id, user_name, password, gender) VALUES (DEFAULT, 'adrian', '123456', 'M');

-- Command my DB

CREATE USER adrian_user WITH PASSWORD 'adrianyim';

GRANT SELECT, INSERT, UPDATE ON users TO adrian_user;
GRANT USAGE, SELECT ON users_id_seq TO adrian_user;

SELECT * FROM users;

DROP TABLE users;

UPDATE items 
SET item = 'Update item1', item_type='Changed item type', cost=9090, cost_type='income', remark='Testing the updates'
WHERE item_id = 16;

ALTER TABLE users
    ALTER COLUMN password NOT NULL;

DELETE FROM users WHERE user_id IN (34-46);