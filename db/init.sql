--- products table ---
CREATE TABLE products(
    id INTEGER NOT NULL UNIQUE,
    product_name TEXT,
    product_description TEXT,
    product_price INTEGER,
    product_rating INTEGER,
    jeweler_id INTEGER,
    image_name TEXT,
    image_extension TEXT,
    image_path TEXT,
    PRIMARY KEY (id AUTOINCREMENT)
    FOREIGN KEY (jeweler_id) REFERENCES jewelers(id)
);

-- tag materials
-- 1 - silver
-- 2 - gold
-- 3 - other

-- tag sale
-- 1 - no discount
-- 2 - discounted

-- tag type
-- 1 - ring
-- 2 - necklace
-- 3 - bracelet
-- 4 - belt
-- 5 - earing
-- 6 - brooch

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
    material INTEGER,
    stone TEXT,
    sale INTEGER,
    tag_type INTEGER NOT NULL,
    PRIMARY KEY (id AUTOINCREMENT)
);

--- jewelers table ---
CREATE TABLE jewelers(
    id INTEGER NOT NULL UNIQUE,
    jeweler_name TEXT NOT NULL,
    jeweler_password TEXT NOT NULL,
    jeweler_description TEXT,
    PRIMARY KEY (id AUTOINCREMENT)
);

--- users table ---
CREATE TABLE users(
    id INTEGER NOT NULL UNIQUE,
    username TEXT NOT NULL,
    user_password TEXT NOT NULL,
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

--- seed data for products ---

--- insert berd ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (1, 'Berd', 'The Armenian Berd Dance is a beautiful and captivating folk dance that has been a part of Armenian culture for centuries. This traditional dance is named after the ancient Armenian city of Berd, and it is known for its high energy, dynamic movements, and powerful rhythms. The Berd Dance is typically performed by a group of dancers, who move in a circular formation, with the lead dancer leading the way. The dancers move their feet quickly and gracefully, with the music driving their movements. The dance is accompanied by traditional Armenian music, featuring instruments like the duduk, dhol, and zurna.', 20, 0, 1, '1', 'jpg', 'public/uploads/products/1.jpg');

--- insert Armenian girl bracelet ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (2, 'Armenian Girl Bracelet', 'Armenian national dress is a beautiful and intricate representation of the countrys rich cultural heritage. This traditional attire is a stunning blend of vivid colors, intricate patterns, and exquisite craftsmanship. And now, you can showcase your love for this captivating style with our stunning jewelry piece that features the Armenian national dress. So, whether youre Armenian or simply admire the countrys rich cultural history, our jewelry piece is a must-have addition to your collection.', 45, 0, 1, '2', 'jpg', 'public/uploads/products/2.jpg');

--- insert Ararat bracelet ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (3, 'The Mount Ararat', 'Mount Ararat holds a special place in the hearts and minds of Armenians around the world. This majestic mountain is not just a physical landmark; it is a powerful symbol of Armenian culture, identity, and resilience. For centuries, Armenians have lived in the shadow of Ararat, considering it a sacred mountain and a symbol of their homeland. The mountain has played a significant role in Armenian mythology and history, and it is even believed to be the resting place of Noahs Ark. Today, despite the fact that Mount Ararat is located outside the borders of modern-day Armenia, it remains a powerful symbol of Armenian identity and heritage, inspiring Armenians all over the world to honor their history, culture, and traditions.', 30, 0, 2, '3', 'jpg', 'public/uploads/products/3.jpg');

--- insert Armenian Girl Earing ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (4, 'Nazeni', 'The word "nazeni" in Armenian means "bride" or "young woman who is about to get married". It is a commonly used word in Armenian culture, particularly in the context of weddings and marriage celebrations.', 15, 0, 1, '4', 'jpg', 'public/uploads/products/4.jpg');

--- Insert Armenian Girl Necklace ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (5, 'Nakhshun', 'Armenian national dress is not just a form of attire; it is a symbol of Armenian identity and pride. Wearing national dress is a way for Armenians to connect with their heritage, to celebrate their culture, and to honor their ancestors who have passed down their traditions through generations. Whether you are an Armenian or simply a lover of culture, Armenian national dress is a stunning and fascinating aspect of Armenian culture that is sure to capture your imagination.', 25, 0, 1, '5', 'jpg', 'public/uploads/products/5.jpg');

--- Insert Crave Paintings Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (6, 'Crave Paintings', 'Crave paintings are not just beautiful to look at; they also have deep cultural and historical significance. Many of the designs used in Armenian crave paintings have been passed down through generations, and they reflect the deep spiritual and cultural traditions of the Armenian people.', 20, 0, 1, '6', 'jpg', 'public/uploads/products/6.jpg');

--- Insert Infinity Sign ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (7, 'Infinity', 'The Armenian sign of infinity is a symbol known as the "Arevakhach," which translates to "eternal." It consists of two interlocking, clockwise-facing infinity symbols that resemble the number 8. The Arevakhach is a symbol of eternity, unity, and the eternal nature of God, and it has been used in Armenian art and architecture for centuries. It is often found in Armenian churches, khachkars (Armenian cross-stones), and other religious and cultural monuments. The Arevakhach is a powerful symbol of Armenian identity and pride, and it is revered by Armenians around the world as a symbol of their cultural and spiritual heritage.', 30, 0, 1, '7', 'jpg', 'public/uploads/products/7.jpg');

--- Insert Infinity Sign ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (8, 'Alphabet', 'The Armenian alphabet is a unique and beautiful script that was created in the early 5th century AD by the Armenian scholar and monk, Mesrop Mashtots. The alphabet consists of 38 letters, each with its own distinct shape and sound. Mashtots created the Armenian alphabet in order to provide a written form for the Armenian language, which until then had only been spoken. Mashtots is said to have been inspired by a vision from God, who showed him the letters of the new alphabet in a dream.', 20, 0, 1, '8', 'jpg', 'public/uploads/products/8.jpg');

--- Insert Surb Gevorg Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (9, 'Surb Gevorg', 'Surb Gevorg (Saint George) is a revered saint in Armenian culture and religion. He is considered one of the most popular and venerated saints among Armenians and is known for his bravery and courage. According to legend, Surb Gevorg was a Roman soldier who lived during the 3rd century AD. He was known for his unwavering faith and his ability to perform miracles. He is said to have been martyred for his faith when he refused to renounce Christianity, and he is remembered for his bravery and steadfastness in the face of persecution.', 25, 0, 2, '9', 'jpg', 'public/uploads/products/9.jpg');

--- Insert Syuniq Belt ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (10, 'Syuniq Belt', 'The Syunik (also spelled Syunik or Zangezur) region is a historic province located in southeastern Armenia. The Syunik Belt, also known as the Zangezur Belt, is a distinctive belt that is traditionally worn by Armenian men from the Syunik region. The Syunik Belt has a deep cultural and historical significance in Armenian history. It is believed to have originated in the 19th century, when the Syunik region was a center of Armenian resistance against foreign occupation. The belt was worn by Armenian soldiers and guerrilla fighters as a symbol of their courage and resilience in the face of adversity.', 55, 0, 1, '10', 'jpg', 'public/uploads/products/10.jpg');

--- Insert Yarkhushta Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (11, 'Yarkhushta', 'Yarkhushta is a traditional Armenian dance that originated in the Lori province of Armenia. The name "Yarkhushta" means "fast-moving" or "quick-step", and it is an energetic and lively dance that is performed by both men and women. Yarkhushta is typically performed at weddings, festivals, and other celebrations, and it is known for its fast-paced tempo and intricate footwork. The dance is typically performed in pairs, with dancers facing each other and holding hands. The music for Yarkhushta is typically played on traditional Armenian instruments such as the duduk (a woodwind instrument), the zurna (a type of oboe), and the dhol (a type of drum). The music is upbeat and lively, with a distinctive rhythm that sets the pace for the dance. ', 25, 0, 1, '11', 'jpg', 'public/uploads/products/11.jpg');

--- Insert Necklace Yerevan ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (12, 'My Yerevan', 'Yerevan is a city that is rich in history and culture. It is home to many ancient landmarks and monuments, including the ruins of the Erebuni Fortress, which date back to the 8th century BC. Yerevan is also home to many museums and cultural institutions, including the National Museum of Armenian History and the Matenadaran Institute of Ancient Manuscripts. erevan is known for its distinctive architecture, which combines elements of traditional Armenian design with modern styles. The city is home to many beautiful buildings and landmarks, including the Opera House, the Cascade Complex, and the Republic Square.', 35, 0, 2, '12', 'jpg', 'public/uploads/products/12.jpg');

--- Insert Yerevan Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id, image_name, image_extension, image_path)
VALUES
    (13, 'Yerevan Ring', 'Yerevan, the capital of Armenia, is a city that is steeped in history and culture. It is one of the oldest continuously inhabited cities in the world, with a history that dates back to the 8th century BC. Armenians are known for their warm hospitality, and the people of Yerevan are no exception. Visitors to the city are often struck by the friendly and welcoming nature of the locals, who are always happy to share their culture and traditions with others.', 35, 0, 1, '13', 'jpg', 'public/uploads/products/13.jpg');


--- Insert seed data to jewelers table ---

--- Insert Im Zardy to jewelers table ---
INSERT INTO
    jewelers (id, jeweler_name, jeweler_password, jeweler_description)
VALUES
    (1, "Im Zardy", 'ImZardy123' , "'Im Zardy' is Armenian for My Jewelery. We are a group of talented and dedicated jewelers making unique jewelery that is rich with the juxdoposition of Armenian traditional and modern styles and references to Armenian culture and history.");

--- Insert Protest Handmade into jewelers table ---
INSERT INTO
    jewelers (id, jeweler_name, jeweler_password , jeweler_description)
VALUES
    (2, "Protest Handmade", 'Protest888' , "SILVER and LEATHER cool accessories with the best quality! Cause In such ugly times, the only true protest is beauty.");


--- Insert data into tags table ---

--- Insert tags for Berd ---
--- id 1, silver, no sale, ring ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (1, 1, 1, 1);

--- Insert tags for Armenian Girl Bracelet ---
--- id 2, silver, no sale, bracelet ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (2, 1, 1, 3);

--- Insert tags for The Mount Ararat ---
--- id 3, silver, no sale, necklace ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (3, 1, 0, 2);

--- Insert tags for Nazeni (Armenian girl earing) ---
--- id 4, silver, no sale, earing ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (4, 1, 0, 5);

--- Insert tags for Nakhshun (Armenian girl necklace) ---
--- id 5, silver, no sale, necklace ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (5, 1, 1, 2);

--- Insert tags for crave paintings ---
--- id 6, silver, no sale, ring ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (6, 1, 0, 1);

--- Insert tags for infinity brooch ---
--- id 7, silver, no sale, brooch ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (7, 1, 0, 6);

--- Insert tags for alphabet earing---
--- id 8, silver, no sale, earing ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (8, 1, 1, 5);

--- Insert tags for Surb Gevord ring---
--- id 9, silver, no sale, ring ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (9, 1, 1, 1);

--- Insert tags for Syuniq Belt---
--- id 10, silver, no sale, belt ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (10, 1, 0, 4);

--- Insert tags for Yarkhushta Ring---
--- id 11, silver, no sale, ring ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (11, 1, 1, 1);

--- Insert tags for My Yerevan necklace protest---
--- id 12, silver, no sale, necklace ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (12, 1, 1, 2);

--- Insert tags for Yerevan ring---
--- id 13, silver, no sale, ring ---
INSERT INTO
    tags (id, material, sale, tag_type)
VALUES
    (13, 1, 0, 1);


--- Insert seed data into product_tags ---

--- Insert seed data for All the tags for Berd ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (1, 1, 1);

--- Insert seed data for All the tags for Armenian girl bracelet ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (2, 2, 2);

--- Insert seed data for All the tags for The Mount Ararat ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (3, 3, 3);

--- Insert seed data for All the tags for Nazeni ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (4, 4, 4);

--- Insert seed data for All the tags for Nakhshun ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (5, 5, 5);

--- Insert seed data for All the tags for Crave Paintings ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (6, 6, 6);

--- Insert seed data for All the tags for Infinity Brooch ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (7, 7, 7);

--- Insert seed data for All the tags for Alphabet earing ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (8, 8, 8);

--- Insert seed data for All the tags for Surb Gevord ring ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (9, 9, 9);

--- Insert seed data for All the tags for Syuniq belt ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (10, 10, 10);

--- Insert seed data for All the tags for Yarkhushta ring ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (11, 11, 11);

--- Insert seed data for All the tags for My Yerevan necklace ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (12, 12, 12);

--- Insert seed data for All the tags for Yerevan ring ---
INSERT INTO
    product_tags (id, product_id, tag_id)
VALUES
    (13, 13, 13);

--- Insert seed data to users ---
INSERT INTO
    users (id, username, user_password, product_id)
VALUES
    (1, 'lilymkrtchyan', 'lm688' , 10);

--- Insert seed data into comments ---
--- lilymkrtchyan comment to Syuniq Belt ---
INSERT INTO
    comments (id, comment_rating, body, product_id, user_id)
VALUES
    (1, 5, "My favorite Armenian accessory!", 10, 1);
