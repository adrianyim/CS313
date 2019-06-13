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
    user_name VARCHAR(225) UNIQUE NOT NULL CONSTRAINT items_fk REFERENCES users(user_name)
);

CREATE TABLE totals (
    id SERIAL NOT NULL CONSTRAINT summary_pk PRIMARY KEY,
    total DECIMAL NOT NULL,
    user_id INT NOT NULL CONSTRAINT summary_fk REFERENCES users(user_id),
    item_id INT NOT NULL CONSTRAINT summary_fk_02 REFERENCES items(item_id)
);

-- Insert section

INSERT INTO users (user_id, user_name, password, gender)
    VALUES  (DEFAULT, 'admin', 'admin', 'M');

INSERT INTO items (item_id, item, item_type, cost, cost_type, remark, date)
    VALUES  (DEFAULT, 'Walmark', 'Food', 20.99, 'Expense', 'shoes', current_timestamp),
            (DEFAULT, 'BBQ', 'Food', 11.02, 'Expense', '', '2019-06-01'),
            (DEFAULT, 'Tester 1 salary', 'Salaries and wages', 504.32, 'Income', 'May', '2019-06-01'),
            (DEFAULT, 'Walmart', 'Food', 30.51, 'Expense', '', '2019-06-03'),
            (DEFAULT, 'phone bill', 'Utility Expenses', 22.39, 'Expense', '', '2019-06-004'),
            (DEFAULT, 'Deseret Book', 'Others', 12.71, 'Expense', 'BOM', current_timestamp),
            (DEFAULT, 'pizza', 'Food', 10.59, 'Expense', 'BYUI crossroad', '2019-06-004'),
            (DEFAULT, 'burger king', 'Food', 13.76, 'Expense', '', '2019-06-08'),
            (DEFAULT, 'gas', 'Utility Expenses', 20.11, 'Expense', '', '2019-06-008'),
            (DEFAULT, 'tithing', 'Others', 23.2, 'Expense', 'May', '2019-06-01'),
            (DEFAULT, 'Rent', 'Utility Expenses', 573, 'Income', '??', current_timestamp);

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