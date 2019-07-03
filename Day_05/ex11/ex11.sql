SELECT upper(`last_name`) AS `NAME`,
       `first_name`,
       db_yhetman.subscription.price
FROM db_yhetman.user_card
INNER JOIN db_yhetman.member
    ON db_yhetman.member.id_user_card = db_yhetman.user_card.id_user
INNER JOIN db_yhetman.subscription
    ON db_yhetman.subscription.id_sub = db_yhetman.member.id_sub
WHERE db_yhetman.subscription.price > 42
ORDER BY  db_yhetman.user_card.last_name ASC, db_yhetman.user_card.first_name ASC;