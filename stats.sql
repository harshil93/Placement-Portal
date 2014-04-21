DEPT WISE :-

registered

select count(*), dept from student group by dept

total offers

select count(*), s.dept from offers as o, student as s where o.st_id = s.st_id 
	group by s.dept

actual no. of students placed

select count(*), s.dept from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s 
	where o.st_id = s.st_id 
	group by s.dept

%age placed

select count(*) from student as s1 group by dept
select count(*), s.dept from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s 
	where o.st_id = s.st_id 
	group by s.dept


average salary

select s.dept, avg(j.ctc) from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id group by s.dept
############

company wise no. of offers

select temp.cnt, c.name from (select count(*) as cnt, o.c_id from offers as o group by o.c_id) as temp, company as c
where c.c_id = temp.c_id
