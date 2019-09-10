SET SQL_SAFE_UPDATES=0;

ALTER TABLE appartments ADD area FLOAT4 DEFAULT 1;
ALTER TABLE appartments ADD bedrooms FLOAT4 DEFAULT 1;
ALTER TABLE appartments ADD available FLOAT4 DEFAULT 0;

UPDATE appartments set available=1 where projectID = 9;

UPDATE appartments a SET a.`area` = 39.2, a.`bedrooms` = 2 where a.`number` = 1 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 36.6, a.`bedrooms` = 2 where a.`number` = 2 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 82.2, a.`bedrooms` = 2 where a.`number` = 3 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 100.5, a.`bedrooms` = 1 where a.`number` = 4 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 50, a.`bedrooms` = 3 where a.`number` = 5 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 79.2, a.`bedrooms` = 1 where a.`number` = 6 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 122.6, a.`bedrooms` = 1 where a.`number` = 7 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 41, a.`bedrooms` = 1 where a.`number` = 8 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 77.7, a.`bedrooms` = 2 where a.`number` = 9 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 92.8, a.`bedrooms` = 3 where a.`number` = 10 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 135.5, a.`bedrooms` = 3 where a.`number` = 11 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 134.4, a.`bedrooms` = 3 where a.`number` = 12 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 114.3, a.`bedrooms` = 3 where a.`number` = 13 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 88.8, a.`bedrooms` = 3 where a.`number` = 14 AND a.`projectID`=9;
UPDATE appartments a SET a.`area` = 47.4, a.`bedrooms` = 1 where a.`number` = 15 AND a.`projectID`=9;