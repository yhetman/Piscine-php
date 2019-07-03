SELECT db_yhetman.film.id_genre,
       db_yhetman.genre.name AS `name_genre`,
       db_yhetman.film.id_distrib,
       db_yhetman.distrib.name AS `name_distrib`,
       `title` AS `title_film`
FROM db_yhetman.film
LEFT JOIN db_yhetman.genre
    ON db_yhetman.genre.id_genre = db_yhetman.film.id_genre
LEFT JOIN db_yhetman.distrib
    ON db_yhetman.distrib.id_distrib = db_yhetman.film.id_distrib
WHERE db_yhetman.film.id_genre
    BETWEEN 4
        AND 8;
