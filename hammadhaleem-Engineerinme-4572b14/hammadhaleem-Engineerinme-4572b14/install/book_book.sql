CREATE TABLE book_books(
			book_id int not null auto_increment,
			username varchar(15) not null default None,
			bookname varchar(30) not null,
			authorsname varchar(50),
			edition int default 0,
			cond varchar(30),
			price int not null,
			type_id int not null,
			subject varchar(30),
			rec_year varchar(30)
) default charset=utf8;
