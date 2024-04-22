DROP DATABASE mess_management;

CREATE
OR REPLACE DATABASE mess_management;

CREATE TABLE IF NOT EXISTS stu_info (
    student_id varchar(30) PRIMARY KEY,
    student_name varchar(30) NOT NULL,
    PASSWORD varchar(30),
    date_of_birth date,
    room_no varchar(30),
);

CREATE TABLE IF NOT EXISTS emp_details (
    emp_id varchar(30) PRIMARY KEY,
    first_name varchar(30),
    last_name varchar(30),
    date_of_birth date,
    email_id varchar(30),
    city varchar(30),
    `state` varchar(30),
    pincode varchar(30),
);

CREATE TABLE IF NOT EXISTS messmenu (
    meal_courses_offered varchar(200) PRIMARY KEY,
    cost int (11) NOT NULL,
    monday varchar(200),
    tuesday varchar(200),
    wednesday varchar(200),
    thursday varchar(200),
    friday varchar(200),
    saturday varchar(200),
    sunday varchar(200)
);


CREATE TABLE IF NOT EXISTS new_stock_details (
    item_name varchar(30),
    cost_per_unit decimal(10, 5),
    unit varchar(30),
    quantity_bought int(11),
    date date,
    PRIMARY KEY(item_name, date)
);

CREATE TABLE IF NOT EXISTS used_stock_details (
    item_name varchar(30),
    unit varchar(30),
    quantity_used int(11),
    quantity_left int (11),
    date date DEFAULT,
    PRIMARY KEY(item_name, date)
);

CREATE TABLE IF NOT EXISTS Feedback (
    
);


INSERT INTO
    stu_info
VALUES
    (
        '170001013',
        'ATCHE SRAVYA',
        '1234',
        '2000-03-03',
        '606',
        'APJ',
        100
    ),
    (
        '170001014',
        'RUSHYA',
        '123',
        '2000-06-10',
        '604',
        'studio',
        25
    ),
    (
        '170002013',
        'SHIRIDI',
        '234',
        '1999-07-17',
        '302',
        'studio',
        30
    ),
    (
        '170001015',
        'SAMHIT',
        '657',
        '1999-11-12',
        '235',
        'studio',
        35
    ),
    (
        '170001017',
        'DINESH',
        '286',
        '2000-04-3',
        '245',
        'studio',
        60
    );

INSERT INTO
    emp_details (
        emp_id,
        first_name,
        last_name,
        date_of_birth,
        email_id,
        city,
        state,
        pincode
    )
VALUES
    (
        '100',
        'karthik',
        'gurram',
        '108',
        '2000-03-06',
        'karthik@gmail.com',
        '2016-04-05',
        2,
        '230',
        '4',
        'sarwata',
        'hyderabad',
        'telangana',
        '500013'
    );

(
    '106',
    'praveen',
    'sbhg',
    '109',
    '2000-04-06',
    'praveen@gmail.com',
    '2016-04-05',
    2,
    '230',
    '4',
    'sarwata',
    'hyderabad',
    'telangana',
    '500013'
);

INSERT INTO
    admin_details
VALUES
    ('100', '123');

INSERT INTO
    used_stock_details
VALUES
    ('eggs', 'dozen', 10, 2, '2018-11-14'),
    ('bananas', 'dozen', 15, 6, '2018-11-15');

INSERT INTO
    new_stock_details
VALUES
    ('eggs', 'dozen', 10, 2, '2018-11-14'),
    ('bananas', 'dozen', 15, 6, '2018-11-15');

INSERT INTO
    messmenu
VALUES
    (
        'breakfast',
        40,
        'poha,milk,bread,jalebi',
        'vada,sambar,milk,bread',
        'utappam,chutney,milk,bread',
        'idli,sambar,milk,bread',
        'upma,chutney,milk,bread',
        'dosa,chutney,sambar,milk,bread',
        'parata,dahi,milk,bread'
    ),
    (
        'lunch',
        50,
        'rice,roti,rajma,',
        'rice,roti,sev tamatar',
        'rice,roti,paneer masala',
        'rice,roti,aloo gobhi',
        'rice,roti,bindi fry',
        'rice,roti,chilli panner',
        'rice,roti,dal'
    ),
    (
        'high_tea',
        30,
        'samosa,coffee,tea,bread',
        'maggie,coffee,tea,bread',
        'pakoda,coffee,tea,bread',
        'kachori,coffee,tea,bread',
        'noodles,coffee,tea,bread',
        'french fries,coffee,tea,bread',
        'veg fingers,coffee,tea,bread'
    ),
    (
        'dinner',
        60,
        'rice,roti,rajma,',
        'rice,roti,sev tamatar',
        'rice,roti,paneer masala',
        'rice,roti,aloo gobhi',
        'rice,roti,bindi fry',
        'rice,roti,chilli panner',
        'rice,roti,dal'
    );