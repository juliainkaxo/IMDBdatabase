TIETOKANNAN LUONTI
-- mysql -h localhost -u root
-- SOURCE /Users/julia/n0reju00_IMDB/luonti/imdb-create-tables.sql
-- SOURCE /Users/julia/n0reju00_IMDB/luonti/imdb-load-data.sql
-- SOURCE /Users/julia/n0reju00_IMDB/luonti/imdb-add-constraints.sql
-- SOURCE /Users/julia/n0reju00_IMDB/luonti/imdb-index-tables.sql


-- SQLt LAITETTU:


    -- LUO PROCEDURIN REGIONILLE

DELIMITER $$
CREATE PROCEDURE GetAliasesByRegion
( 
    IN regionName VARCHAR(4) 
) 
BEGIN 
SELECT title 
FROM aliases WHERE (region = regionName) 
GROUP BY title_id 
ORDER BY title 
LIMIT 10;
END$$


    -- INDEXIT LUOTU NOPEUTTAMAAN HAKUA:

CREATE INDEX name_id ON had_role (name_id);
CREATE INDEX title_id ON had_role (title_id); 


    -- LUO HAUSSA TARVITTAVAN GETROLES NÄKYMÄN
CREATE VIEW getrolesbyactor
AS
SELECT had_role.title_id, names_.name_id, name_, role_, type
FROM names_ INNER JOIN had_role
ON names_.name_id = had_role.name_id 
INNER JOIN alias_types ON had_role.title_id = alias_types.title_id


    -- LUO GENRE NÄKYMÄN 

CREATE VIEW genret
AS 
SELECT had_role.title_id, genre
FROM had_role INNER JOIN title_genres
ON had_role.title_id = title_genres.title_id;


--  LUOTU HELPOTTAMAAN TOISTA HAKUA

CREATE VIEW getrolesbynayttelija
AS
SELECT names_.name_id, name_, role_ 
FROM names_ INNER JOIN had_role
ON names_.name_id = had_role.name_id