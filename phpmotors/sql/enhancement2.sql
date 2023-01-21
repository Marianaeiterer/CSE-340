-- Query 1
INSERT into clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment)
VALUES ("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n", "I am the real Ironman");

-- Query 2
UPDATE clients
SET clientLevel = 3
WHERE clientID = 1;

-- Query 3
UPDATE inventory
SET invDescription = replace(invDescription, 'small interior', 'spacious interior')
WHERE invID = 12;

-- Query 4
SELECT invModel, classificationName
FROM inventory AS i
INNER JOIN carclassification AS c
ON i.classificationId = c.classificationId
WHERE classificationName = "SUV";

-- Query 5
DELETE FROM inventory WHERE invId = 1;

-- Query 6
UPDATE inventory
SET invImage = concat("/phpmotors", invImage) , invThumbnail = concat("/phpmotors", invThumbnail);
