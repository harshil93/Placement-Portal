-- views for job Profiles for each dept.
create view cseJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "CSE";

create view eceJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "ECE";

create view eeeJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "EEE";

create view mncJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "MNC";

create view meJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "ME";

create view cstJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "CST";

create view clJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "CL";

create view ceJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "CE";

create view hssJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "HSS";

create view dodJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "DOD";

create view epJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "EP";

create view btJobProfiles as select j.c_id, j.j_id from job_profile as j, job_profile_branches as jb where j.j_id = jb.j_id and j.c_id = jb.c_id and jb.dept = "BT";




-- views for Offers of each dept.
create view cseOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "CSE";

create view eceOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "ECE";

create view eeeOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "EEE";

create view mncOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "MNC";

create view meOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "ME";

create view cstOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "CST";

create view clOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "CL";

create view ceOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "CE";

create view hssOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "HSS";

create view dodOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "DOD";

create view epOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "EP";

create view btOffers as select o.c_id, o.j_id, o.st_id from offers as o, student as s where o.st_id = s.st_id and s.dept = "BT";


