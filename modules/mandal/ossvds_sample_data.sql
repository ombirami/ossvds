-- 🔹 केंद्र
INSERT INTO centers (name) VALUES 
('राष्ट्रीय केंद्र');

-- 🔹 राज्य
INSERT INTO states (name, center_id) VALUES 
('राजस्थान', 1),
('उत्तर प्रदेश', 1);

-- 🔹 ज़िला
INSERT INTO districts (name, state_id) VALUES 
('पाली', 1),
('जयपुर', 1),
('लखनऊ', 2);

-- 🔹 तहसील
INSERT INTO tehsils (name, district_id) VALUES 
('सुमेरपुर', 1),
('जयपुर सिटी', 2),
('मोहनलालगंज', 3);

-- 🔹 गाँव
INSERT INTO villages (name, tehsil_id) VALUES 
('बिरामी', 1),
('मालवीय नगर', 2),
('अमराई गाँव', 3);

-- 🔹 मंडल
INSERT INTO mandals (name, tehsil_id) VALUES 
('सुमेरपुर मंडल', 1),
('जयपुर मंडल', 2),
('मोहनलालगंज मंडल', 3);

-- 🔹 सदस्य
INSERT INTO members (name, mobile, email, gender, dob, village_id, mandal_id) VALUES 
('ओमप्रकाश वैष्णव', '9783987737', 'ossvds@gmail.com', 'Male', '1985-01-01', 1, 1),
('रामलाल शर्मा', '9876543210', 'ramlal@example.com', 'Male', '1990-05-12', 2, 2),
('सीमा देवी', '9123456789', 'seema@example.com', 'Female', '1992-07-20', 3, 3);
