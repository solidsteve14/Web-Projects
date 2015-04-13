USE _445team6;

#Check if user is in database
SELECT * FROM USER;
#WHERE email ='admin@carquote.com'
#AND password ='password';

#Check if password is correct

#Get all makes in database
SELECT DISTINCT make FROM CAR;

#Get single car info based on car id
SELECT  `year`, make, model, `type`, photoPath FROM CAR c, CAR_PHOTO cp WHERE c.carID = 1 AND cp.CAR_carID = 1;

#Get package info for car.

#Get all models for a make
SELECT DISTINCT model FROM CAR
WHERE make = 'Toyota';

#Get all years for make and model
SELECT DISTINCT `year` FROM CAR
WHERE make = 'Toyota' 
AND model = 'Corolla';

#Get list of all cars
SELECT  `year`, make, model, `type`, photoPath 
FROM CAR c, CAR_PHOTO cp
WHERE c.carID = cp.CAR_carID
AND make = 'Toyota'
AND `year` = 2000;

SELECT  `year`, make, model, `type`, photoPath FROM CAR c, CAR_PHOTO cp WHERE c.carID = 1 AND cp.CAR_carID = 1;

SELECT packageName, mpg, horsepower engineSize, transmission FROM CAR c, PACKAGE p
WHERE c.carID = p.Car_carID
AND c.carID = 1;

SELECT * FROM PACKAGE;

SELECT * FROM DEALERSHIP;

SELECT DISTINCT packageID FROM CAR c, PACKAGE p WHERE c.carID = p.CAR_carID AND c.carID =2;

SELECT * FROM REVIEW;
WHERE PACKAGE_packageID IN (
	SELECT DISTINCT packageID FROM CAR c, PACKAGE p
    WHERE c.carID = p.CAR_carID
    AND c.carID = 1);
    
    
SELECT DISTINCT packageID FROM CAR c, PACKAGE p
    WHERE c.carID = p.CAR_carID
    AND c.carID =1;
    
INSERT INTO REVIEW VALUES (4,'love it. almost....','admin@carquote.com',1);