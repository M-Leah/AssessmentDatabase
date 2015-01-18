AssessmentDatabase
==================

Final Year Project.

The goal of this project is to develop a database that will help teachers in assessing the process that students have made now that the ICT curriculum has been altered to include more Computing aspects. The database will allow a teacher to log in and create their classes through uploading a CSV file, from there they will be able to mark their classes based against the new computing criteria supplied by the government. These marks will then be used to generate a variety of reports so the teachers can assess student development (High/Low Achievers, Problem Areas, criteria with the best scores, etc.) 

Note: I plan to refactor quite a few elements of the code shortly namely to fix the below issues:
- Singleton Database class creating static instances rather than utilising dependacy injection.
- No use of autoloader leading to unecessary require statements.
