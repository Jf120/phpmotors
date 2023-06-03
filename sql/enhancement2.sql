/* Insert into clients table */

INSERT INTO clients 
(clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment) 
VALUES ("Tony", "Stark", "tony@starkent.com", "IamIronM@n", "I am the real Ironman");

/* Update client level */

UPDATE clients
SET clientLevel = 3
WHERE clientEmail = "tony@starkent.com";

/* Modify invDescription of GM Hummer*/

UPDATE inventory
SET invDescription = REPLACE(invDescription, "small interiors", "spacious interior")
WHERE invMake = "GM" and invModel = "Hummer";

/* Select invModel and classificationName that belongs to SUV */

SELECT i.invModel, c.classificationName
FROM inventory i
JOIN carclassification c
ON i.classificationId = c.classificationId
WHERE classificationName = "SUV";

/* Delete Jeep Wrangler from database */

DELETE FROM inventory 
WHERE invMake = "Jeep" and invModel = "Wrangler";


/* Update record to add "/phpmotors" to file path */

UPDATE inventory
SET invImage = CONCAT("/phpmotors", invImage), invThumbnail = CONCAT("/phpmotors", invThumbnail);