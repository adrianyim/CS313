-- Create section

CREATE TABLE users (
    user_id SERIAL NOT NULL,
    user_name VARCHAR(225) UNIQUE NOT NULL CONSTRAINT users_pk PRIMARY KEY,
    password VARCHAR(255) NOT NULL, 
    gender VARCHAR(1)
);

CREATE TABLE items (
    item_id SERIAL NOT NULL CONSTRAINT items_pk PRIMARY KEY,
    item VARCHAR(45) NOT NULL,
    item_type VARCHAR(45) NOT NULL,
    cost DECIMAL NOT NULL,
    cost_type VARCHAR(45) NOT NULL,
    remark VARCHAR(45),
    date date NOT NULL,
    user_name VARCHAR(225) NOT NULL CONSTRAINT items_fk REFERENCES users(user_name)
);

CREATE TABLE cost (
    cost_id SERIAL NOT NULL CONSTRAINT cost_pk PRIMARY KEY,
    cost DECIMAL NOT NULL,
    cost_type VARCHAR(45) NOT NULL
);

CREATE TABLE date (
    date_id SERIAL NOT NULL CONSTRAINT date_pk PRIMARY KEY,
    date date NOT NULL
);

CREATE TABLE total (
    id SERIAL NOT NULL CONSTRAINT total_pk PRIMARY KEY,
    total DECIMAL NOT NULL
);

-- Insert section

INSERT INTO users (user_id, user_name, password, gender)
    VALUES  (DEFAULT, 'admin', 'admin', 'M');

INSERT INTO items (item_id, item, item_type, cost, cost_type, remark, date, user_name) 
    VALUES  (DEFAULT, 'Walmark', 'Food', 20.99, 'Expense', 'shoes', '2019-05-29', 'adrian'),
            (DEFAULT, 'BBQ', 'Food', 11.02, 'Expense', '', '2019-06-01', 'tester'),
            (DEFAULT, 'Tester 1 salary', 'Salaries and wages', 504.32, 'Income', 'May', '2019-06-01', 'adrian'),
            (DEFAULT, 'Walmart', 'Food', 30.51, 'Expense', '', '2019-06-03', 'adrian'),
            (DEFAULT, 'phone bill', 'Utility Expenses', 22.39, 'Expense', '', '2019-05-29', 'tester'),
            (DEFAULT, 'Deseret Book', 'Others', 12.71, 'Expense', 'BOM', '2019-05-29', 'adrian'),
            (DEFAULT, 'pizza', 'Food', 10.59, 'Expense', 'BYUI crossroad', '2019-06-04', 'tester'),
            (DEFAULT, 'burger king', 'Food', 13.76, 'Expense', '', '2019-06-08', 'adrian'),
            (DEFAULT, 'gas', 'Utility Expenses', 20.11, 'Expense', '', '2019-06-08', 'adrian'),
            (DEFAULT, 'tithing', 'Others', 23.2, 'Expense', 'May', '2019-06-01', 'tester'),
            (DEFAULT, 'Rent', 'Utility Expenses', 573, 'Income', '??', '2019-05-28', 'adrian');

INSERT INTO items (item_id, item, item_type, cost, cost_type, remark, date, user_name) 
    VALUES (DEFAULT, 'Rent', 'Utility Expenses', 573, 'Income', '??', current_timestamp, 'adrian');


INSERT INTO totals (id, total, user_id, item_id)
VALUES (DEFAULT, 10, (SELECT user_id FROM users WHERE user_name='tester'), (SELECT item_id FROM items WHERE item_type='food'));

INSERT INTO users (user_id, user_name, password, gender) VALUES (DEFAULT, 'adrian', '123456', 'M');

-- Command my DB

CREATE USER adrian WITH password 'adrianyim';

GRANT SELECT, INSERT, UPDATE ON users TO adrian;
GRANT USAGE, SELECT ON users_id_seq TO adrian;

SELECT * FROM summary s INNER JOIN users u ON u.user_id = s.user_id INNER JOIN items i ON i.item_id = s.item_id;

DROP TABLE users, items;

UPDATE items 
SET item = 'Update item1', item_type='Changed item type', cost=9090, cost_type='Income', remark='Testing the updates'
WHERE item_id = 16;

ALTER TABLE users
    ALTER COLUMN password NOT NULL;

DELETE FROM users WHERE user_id IN (34-46);

DELETE FROM users WHERE user_name="adrian";

-- Set timezone to mountain standard time
SET TIMEZONE='MST';
SELECT NOW();

SELECT item_id, item, item_type, cost, cost_type, remark, date, i.user_name FROM items i LEFT JOIN users u ON i.user_name=u.user_name WHERE u.user_name='adrian';