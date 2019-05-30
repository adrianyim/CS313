-- Create section

CREATE TABLE users (
    user_id INT NOT NULL,
    user_name VARCHAR(45) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE item (
    item_id INT NOT NULL,
    item VARCHAR(45) NOT NULL,
    item_type VARCHAR(45) NOT NULL,
    cost DECIMAL NOT NULL,
    cost_type VARCHAR(45) NOT NULL,
    remark VARCHAR(45),
    PRIMARY KEY (item_id)
);

CREATE TABLE summary (
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    total DECIMAL NOT NULL,
    date_ date NOT NULL,
    date_type VARCHAR(45) NOT NULL,
    PRIMARY KEY (user_id, item_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (item_id) REFERENCES item(item_id)
);

-- Insert section

INSERT INTO users (user_id, user_name, gender)
    VALUES  (101, 'Tester 1', 'M'),
            (102, 'Tester 2', 'F'),
            (103, 'Adrian', 'M'),
            (104, 'Olivia', 'F'),
            (105, 'Quinton', 'M'),
            (106, 'Angus', 'M'),
            (107, 'Travis', 'M'),
            (108, 'Eva', 'F'),
            (109, 'Abigail', 'F'),
            (110, 'Hazel', 'F'),
            (111, 'Adrianna', 'F'),
            (112, 'Ariana', 'F');

INSERT INTO item (item_id, item, item_type, cost, cost_type, remark)
    VALUES  (1001, 'Walmark', 'Food', 20.99, 'expense', 'shoes'),
            (1002, 'BBQ', 'Food', 11.02, 'expense', ''),
            (1003, 'Tester 1 salary', 'Salaries and wages', 504.32, 'income', 'May'),
            (1004, 'Walmart', 'Food', 30.51, 'expense', ''),
            (1005, 'phone bill', 'Utility expenses', 22.39, 'expense', ''),
            (1006, 'Deseret Book', 'Others', 12.71, 'expense', 'BOM'),
            (1007, 'pizza', 'Food', 10.59, 'expense', 'BYUI crossroad'),
            (1008, 'burger king', 'Food', 13.76, 'expense', ''),
            (1009, 'gas', 'Utility expenses', 20.11, 'expense', ''),
            (1010, 'tithing', 'Others', 23.2, 'expense', 'May'),
            (1011, 'Rent', 'Utility expenses', 573, 'income', '??');


-- Command my DB

SELECT * FROM  users;

DROP TABLE item;

UPDATE users 
SET user_id = 101
WHERE user_name = "Tester 1";