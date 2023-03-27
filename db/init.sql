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

--- seed data for products ---

--- insert berd ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (1, 'Berd', 'The Armenian Berd Dance is a beautiful and captivating folk dance that has been a part of Armenian culture for centuries. This traditional dance is named after the ancient Armenian city of Berd, and it is known for its high energy, dynamic movements, and powerful rhythms. The Berd Dance is typically performed by a group of dancers, who move in a circular formation, with the lead dancer leading the way. The dancers move their feet quickly and gracefully, with the music driving their movements. The dance is accompanied by traditional Armenian music, featuring instruments like the duduk, dhol, and zurna.', 20, 0, 0);

--- insert Armenian girl bracelet ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (2, 'Armenian Girl Bracelet', 'Armenian national dress is a beautiful and intricate representation of the countrys rich cultural heritage. This traditional attire is a stunning blend of vivid colors, intricate patterns, and exquisite craftsmanship. And now, you can showcase your love for this captivating style with our stunning jewelry piece that features the Armenian national dress. So, whether youre Armenian or simply admire the countrys rich cultural history, our jewelry piece is a must-have addition to your collection.', 45, 0, 0);

--- insert Ararat bracelet ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (3, 'The Mount Ararat', 'Mount Ararat holds a special place in the hearts and minds of Armenians around the world. This majestic mountain is not just a physical landmark; it is a powerful symbol of Armenian culture, identity, and resilience. For centuries, Armenians have lived in the shadow of Ararat, considering it a sacred mountain and a symbol of their homeland. The mountain has played a significant role in Armenian mythology and history, and it is even believed to be the resting place of Noahs Ark. Today, despite the fact that Mount Ararat is located outside the borders of modern-day Armenia, it remains a powerful symbol of Armenian identity and heritage, inspiring Armenians all over the world to honor their history, culture, and traditions.', 30, 0, 1);

--- insert Armenian Girl Earing ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (4, 'Nazeni', 'The word "nazeni" in Armenian means "bride" or "young woman who is about to get married". It is a commonly used word in Armenian culture, particularly in the context of weddings and marriage celebrations.', 15, 0, 0);

--- Insert Armenian Girl Necklace ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (5, 'Nakhshun', 'Armenian national dress is not just a form of attire; it is a symbol of Armenian identity and pride. Wearing national dress is a way for Armenians to connect with their heritage, to celebrate their culture, and to honor their ancestors who have passed down their traditions through generations. Whether you are an Armenian or simply a lover of culture, Armenian national dress is a stunning and fascinating aspect of Armenian culture that is sure to capture your imagination.', 25, 0, 0);

--- Insert Crave Paintings Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (6, 'Crave Paintings', 'Crave paintings are not just beautiful to look at; they also have deep cultural and historical significance. Many of the designs used in Armenian crave paintings have been passed down through generations, and they reflect the deep spiritual and cultural traditions of the Armenian people.', 20, 0, 0);

--- Insert Infinity Sign ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (7, 'Infinity', 'The Armenian sign of infinity is a symbol known as the "Arevakhach," which translates to "eternal." It consists of two interlocking, clockwise-facing infinity symbols that resemble the number 8. The Arevakhach is a symbol of eternity, unity, and the eternal nature of God, and it has been used in Armenian art and architecture for centuries. It is often found in Armenian churches, khachkars (Armenian cross-stones), and other religious and cultural monuments. The Arevakhach is a powerful symbol of Armenian identity and pride, and it is revered by Armenians around the world as a symbol of their cultural and spiritual heritage.', 30, 0, 0);

--- Insert Infinity Sign ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (8, 'Alphabet', 'The Armenian alphabet is a unique and beautiful script that was created in the early 5th century AD by the Armenian scholar and monk, Mesrop Mashtots. The alphabet consists of 38 letters, each with its own distinct shape and sound. Mashtots created the Armenian alphabet in order to provide a written form for the Armenian language, which until then had only been spoken. Mashtots is said to have been inspired by a vision from God, who showed him the letters of the new alphabet in a dream.', 20, 0, 0);

--- Insert Surb Gevorg Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (9, 'Surb Gevorg', 'Surb Gevorg (Saint George) is a revered saint in Armenian culture and religion. He is considered one of the most popular and venerated saints among Armenians and is known for his bravery and courage. According to legend, Surb Gevorg was a Roman soldier who lived during the 3rd century AD. He was known for his unwavering faith and his ability to perform miracles. He is said to have been martyred for his faith when he refused to renounce Christianity, and he is remembered for his bravery and steadfastness in the face of persecution.', 25, 0, 1);

--- Insert Syuniq Belt ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (10, 'Syuniq Belt', 'The Syunik (also spelled Syunik or Zangezur) region is a historic province located in southeastern Armenia. The Syunik Belt, also known as the Zangezur Belt, is a distinctive belt that is traditionally worn by Armenian men from the Syunik region. The Syunik Belt has a deep cultural and historical significance in Armenian history. It is believed to have originated in the 19th century, when the Syunik region was a center of Armenian resistance against foreign occupation. The belt was worn by Armenian soldiers and guerrilla fighters as a symbol of their courage and resilience in the face of adversity.', 55, 0, 0);

--- Insert Yarkhushta Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (11, 'Yarkhushta', 'Yarkhushta is a traditional Armenian dance that originated in the Lori province of Armenia. The name "Yarkhushta" means "fast-moving" or "quick-step", and it is an energetic and lively dance that is performed by both men and women. Yarkhushta is typically performed at weddings, festivals, and other celebrations, and it is known for its fast-paced tempo and intricate footwork. The dance is typically performed in pairs, with dancers facing each other and holding hands. The music for Yarkhushta is typically played on traditional Armenian instruments such as the duduk (a woodwind instrument), the zurna (a type of oboe), and the dhol (a type of drum). The music is upbeat and lively, with a distinctive rhythm that sets the pace for the dance. ', 25, 0, 0);

--- Insert Necklace Yerevan ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (12, 'My Yerevan', 'Yerevan is a city that is rich in history and culture. It is home to many ancient landmarks and monuments, including the ruins of the Erebuni Fortress, which date back to the 8th century BC. Yerevan is also home to many museums and cultural institutions, including the National Museum of Armenian History and the Matenadaran Institute of Ancient Manuscripts. erevan is known for its distinctive architecture, which combines elements of traditional Armenian design with modern styles. The city is home to many beautiful buildings and landmarks, including the Opera House, the Cascade Complex, and the Republic Square.', 35, 0, 1);

--- Insert Yerevan Ring ---
INSERT INTO
    products (id, product_name, product_description, product_price, product_rating, jeweler_id)
VALUES
    (13, 'Yerevan Ring', 'Yerevan, the capital of Armenia, is a city that is steeped in history and culture. It is one of the oldest continuously inhabited cities in the world, with a history that dates back to the 8th century BC. Armenians are known for their warm hospitality, and the people of Yerevan are no exception. Visitors to the city are often struck by the friendly and welcoming nature of the locals, who are always happy to share their culture and traditions with others.', 35, 0, 0);
