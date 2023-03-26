--- products table ---
CREATE TABLE products(
    id INTEGER NOT NULL UNIQUE,
    product_name TEXT NOT NULL,
    product_description TEXT,
    product_price INTEGER NOT NULL,
    product_rating INTEGER NOT NULL,
    jeweler_id INTEGER NOT NULL,
    PRIMARY KEY (id AUTOINCREMENT)
    FOREIGN KEY (jeweler_id) REFERENCES jewelers(id)
);

--- product tags table ---
CREATE TABLE product_tags(
    id INTEGER NOT NULL UNIQUE,
    product_id INTEGER,
    tag_id INTEGER,
    PRIMARY KEY (id AUTOINCREMENT)
    FOREIGN KEY (product_id) REFERENCES products(id)
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

--- tags table ---
CREATE TABLE tags(
    id INTEGER NOT NULL UNIQUE,
    material INTEGER NOT NULL,
    stone TEXT,
    sale INTEGER NOT NULL,
    tag_type INTEGER NOT NULL,
    PRIMARY KEY (id AUTOINCREMENT)
);

--- jewelers table ---
CREATE TABLE jewelers(
    id INTEGER NOT NULL UNIQUE,
    jeweler_name TEXT NOT NULL,
    jeweler_description TEXT,
    PRIMARY KEY (id AUTOINCREMENT)
);

--- users table ---
CREATE TABLE users(
    id INTEGER NOT NULL UNIQUE,
    username TEXT NOT NULL,
    product_id INTEGER,
    PRIMARY KEY (id AUTOINCREMENT)
    FOREIGN KEY (product_id) REFERENCES products(id)
);

--- comments table ---
CREATE TABLE comments(
    id INTEGER NOT NULL UNIQUE,
    comment_rating INTEGER NOT NULL,
    body TEXT,
    product_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY (id AUTOINCREMENT)
    FOREIGN KEY (product_id) REFERENCES products(id)
    FOREIGN KEY (user_id) REFERENCES users(id)
);



-- TODO: initial seed data

-- INSERT INTO `examples` (name) VALUES ('example-1');
-- INSERT INTO `examples` (name) VALUES ('example-2');
