SELECT `last_name`,
       `first_name`
FROM db_yhetman.user_card
WHERE db_yhetman.user_card.last_name LIKE '%-%'
      OR db_yhetman.user_card.first_name LIKE '%-%'
ORDER BY  db_yhetman.user_card.last_name ASC, db_yhetman.user_card.first_name ASC;
