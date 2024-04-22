DROP DATABASE mess_management;
CREATE OR REPLACE DATABASE mess_management ;



CREATE TABLE IF NOT EXISTS stu_info
(
student_id varchar(30) PRIMARY KEY,
student_name varchar(30) not null ,
PASSWORD varchar(30),
date_of_birth date,
room_no varchar(30),
block_name varchar(30),
wallet_money int(11) default 0
);

CREATE TABLE  IF NOT EXISTS  designation_details
(
designation_id varchar(30) PRIMARY KEY,
job varchar(30) not null,
working_days int(11),   
salary int(11) 
);

CREATE TABLE IF NOT EXISTS emp_details
(
emp_id varchar(30) PRIMARY KEY,
first_name varchar(30),
last_name varchar(30),
designation_id varchar(30),
date_of_birth date,
email_id varchar(30),
hire_date date,
no_of_leaves int(11),
house_no varchar(30),
street_no varchar(30),
street_name varchar(30),
city varchar(30),
state varchar(30),
pincode varchar(30),
gross_salary int (11),
FOREIGN KEY (designation_id)
REFERENCES designation_details (designation_id)
ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS admin_details
(
admin_id varchar(30) not null,
admin_password varchar(30) not null,
FOREIGN KEY (admin_id)
REFERENCES emp_details (emp_id)
ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS messmenu
(
meal_courses_offered varchar(200) PRIMARY KEY,
cost int (11) not null,
monday varchar(200),
tuesday varchar(200),
wednesday varchar(200),
thursday varchar(200),
friday varchar(200),
saturday varchar(200),
sunday varchar(200)
);


CREATE TABLE IF NOT EXISTS coupons_registered 
(
student_id  varchar(30),
date date,
breakfast bool,
used_breakfast bool,
b_used_time datetime,
lunch bool,
used_lunch bool,
l_used_time datetime,
high_tea bool,
used_high_tea bool,
h_used_time datetime,
dinner bool,
used_dinner bool,
d_used_time datetime,
PRIMARY KEY(student_id,date)
);


CREATE TABLE IF NOT EXISTS new_stock_details
(
item_name varchar(30),
cost_per_unit decimal(10,5),
unit varchar(30),
quantity_bought int(11),
date date,
PRIMARY KEY(item_name,date)
);

CREATE TABLE IF NOT EXISTS  used_stock_details
(
item_name varchar(30) ,
unit varchar(30),
quantity_used int(11),
quantity_left int (11),
date date ,
PRIMARY KEY(item_name,date)
);

#INSERT INTO stu_info VALUES
#('170001013','ATCHE SRAVYA','1234','2000-03-03','606','APJ',100),
#('170001014','RUSHYA','123','2000-06-10','604','studio',25),
#('170002013','SHIRIDI','234','1999-07-17','302','studio',30),
#('170001015','SAMHIT','657','1999-11-12','235','studio',35),
#('170001017','DINESH','286','2000-04-3','245','studio',60);


#INSERT INTO designation_details VALUES
#('107','cleaner','30','10000'),
#('109','chef','30','20000'),
#('108','admin','30','15000');

#INSERT INTO emp_details (emp_id,first_name,last_name,designation_id,date_of_birth,email_id,hire_date,no_of_leaves,house_no,street_no,street_name,city,state,pincode)
#values('100','karthik','gurram','108','2000-03-06','karthik@gmail.com','2016-04-05',2,'230','4','sarwata','hyderabad','telangana','500013');
#('106','praveen','sbhg','109','2000-04-06','praveen@gmail.com','2016-04-05',2,'230','4','sarwata','hyderabad','telangana','500013');

#INSERT INTO admin_details VALUES
#('100','123');

#INSERT INTO used_stock_details VALUES
#('eggs','dozen',10,2,'2018-11-14'),
#('bananas','dozen',15,6,'2018-11-15');

#INSERT INTO  new_stock_details VALUES
#('eggs','dozen',10,2,'2018-11-14'),
#('bananas','dozen',15,6,'2018-11-15');

#INSERT INTO messmenu values 
#('breakfast',40,'poha,milk,bread,jalebi','vada,sambar,milk,bread','utappam,chutney,milk,bread','idli,sambar,milk,bread','upma,chutney,milk,bread','dosa,chutney,sambar,milk,bread','parata,dahi,milk,bread' ),
#('lunch',50,'rice,roti,rajma,','rice,roti,sev tamatar','rice,roti,paneer masala','rice,roti,aloo gobhi','rice,roti,bindi fry','rice,roti,chilli panner','rice,roti,dal'),
#('high_tea',30,'samosa,coffee,tea,bread','maggie,coffee,tea,bread','pakoda,coffee,tea,bread','kachori,coffee,tea,bread','noodles,coffee,tea,bread','french fries,coffee,tea,bread','veg fingers,coffee,tea,bread'),
#('dinner',60,'rice,roti,rajma,','rice,roti,sev tamatar','rice,roti,paneer masala','rice,roti,aloo gobhi','rice,roti,bindi fry','rice,roti,chilli panner','rice,roti,dal');



SELECT * FROM messmenu;



