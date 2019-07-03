SELECT `title` AS `Title`,
       `summary` AS `Summary`,
       `prod_year`
FROM db_yhetman.film
INNER JOIN db_yhetman.genre
    ON db_yhetman.film.id_genre = db_yhetman.genre.id_genre
WHERE db_yhetman.genre.name = 'erotic'
ORDER BY  `prod_year` DESC;
