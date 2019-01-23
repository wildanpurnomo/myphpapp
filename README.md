Simple PHP app that contains todolist and online quiz. Integrated with MySQL.

Note :
- In case you want to clone, you have to enter your db credential in 'koneksi.php' file.

*DB description (sry I know I should have written the .sql file (?)) : <br />
DB name = kuisonline <br />
it contains two tables : <br />
--> table 'users' : username (varchar), password(varchar), nilai(int), tes_status(tinyint, to keep track of whether user has done the quiz or not) <br />
--> table 'todolist' : username(varchar), agenda(varchar), jadwal_agenda(datetime) <br /> <br />

note : nilai means grade (quiz grade), agenda means activities (for todolist app) and jadwal_agenda means schedule of the activities.
