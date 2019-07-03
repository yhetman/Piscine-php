SELECT datediff(max(`date`), min(`date`)) AS `uptime`
FROM db_yhetman.member_history;
