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
    remark VARCHAR(45),
    PRIMARY KEY (item_id),
    FOREIGN KEY (item_id, item) REFERENCES cost(cost_id)
);

CREATE TABLE cost (
    item_id INT NOT NULL,
    cost_id INT NOT NULL,
    cost DECIMAL NOT NULL,
    cost_type VARCHAR(45) NOT NULL,
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

INSERT INTO users (user_id, user_name, gender)
    VALUES  (001, 'Tester 1', 'M'),
            (002, 'Tester 2', 'F');

INSERT INTO item (item_id, item, item_type, remark)
    VALUES  (0001, 'Walmark', 'expense', 'shoes'),
            (0002, 'BBQ', 'expense', ''),
            (0003, 'himhim salary', 'income', 'May');

INSERT INTO cost (item_id, cost_id, cost, cost_type)
    VALUES  (0001, 1, 20.99, 'expense'),
            (0002, 2, 11.02, 'expense'),
            (0003, 3, 500, 'income');

SELECT * FROM  cost;

DROP TABLE cost;

UPDATE cost SET cost = 498.9 WHERE item_id = 0003;