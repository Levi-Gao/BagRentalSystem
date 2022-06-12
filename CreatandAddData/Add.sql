use ll;

# insert into `bags`
# (`b_id`, `designer`, `color`, `manufacturer`, `price`)
# values
# (101,   "Claudia", "White",	"Louis Vuitton",	8.75),
# (107,	"Messenger", "Black",	"Prada",	9.50),
# (102,	"Cabas Piano",	"Multi",	"Louis Vuitton"	,8.75),
# (104,	"Satchel",	"Camel",	"Coach",	9.00),
# (105,	"Hippie Flap",	"Green",	"Coach",	9.00),
# (110,	"Haymarket Woven Warrier",	"Gold"	,"Burberry",	10.00),
# (106,	"Bleeker Bucket",	"Blue",	"Coach"	,9.00),
# (108,	"Fairy",	"Multi"	,"Prada",	9.50),
# (103,	"Monogram Pochette"	,"Multi",	"Louis Vuitton",	8.75),
# (109,	"Glove Soft Pebble",	"Mauve",	"Prada",	9.50),
# (111,	"Knight"	,"Plaid",	"Burberry"	,10.00);

insert into `bags`
(`包包编号`, `设计师`, `颜色`, `品牌`, `价格（天）`,`状态`)
values
(101,   "Claudia", "White",	"Louis Vuitton",	8.75, false),
(107,	"Messenger", "Black",	"Prada",	9.50,true),
(102,	"Cabas Piano",	"Multi",	"Louis Vuitton"	,8.75,true),
(104,	"Satchel",	"Camel",	"Coach",	9.00,true),
(105,	"Hippie Flap",	"Green",	"Coach",	9.00,true),
(110,	"Haymarket Woven Warrier",	"Gold"	,"Burberry",	10.00,true),
(106,	"Bleeker Bucket",	"Blue",	"Coach"	,9.00,true),
(108,	"Fairy",	"Multi"	,"Prada",	9.50,true),
(103,	"Monogram Pochette"	,"Multi",	"Louis Vuitton",	8.75,true),
(109,	"Glove Soft Pebble",	"Mauve",	"Prada",	9.50,true),
(111,	"Knight"	,"Plaid",	"Burberry"	,10.00,true);

insert into `customers`
(`顾客编号`, `password`, `firstName`,`lastName`, `address`, `TelePhone`, `cellPhone`, `email`, `card`)
values
("M-62","123456",	"Murray",	"Annabelle"	,"59 W. Central Ave",	"404-998-3928",	"404-887-3829",	"belle@comcast.net"	,"443355463212"),
("F-59","123456",	"Franco",	"Gina"	,"1012 Peachtree St",	"404-887-2342",	"404-765-1263",	"gf59@gmail.com"	,"443398764532"),
("Q-13","123456",	"Quinn",	"Sally"	,"54 Oak Ave",	"404-987-3427",	"569-984-3894",	"quinn45@gmail.com"	,"443398765439"),
("L-29","123456",	"Lopato",	"Maria"	,"5490 West 5th",	"404-234-8876",	"569-001-0989",	"mrl@hotmail.com"	,"443352635423"),
("Z-30","123456",	"Zern",	"Joan",	"58 W. Central Ave",	"404-675-0091",	"404-776-4536",	"zern@comcast.net",	"443357643254"),
("S-63","123456",	"Smith",	"Patricia",	"1700 E. Lincoln Ave",	"404-765-3342",	"404-121-4736"	,"patti1@gmail.com"	,"443398762534"),
("P-91","123456",	"Pao",	"Jill",	"89 Orchard",	"404-887-9238",	"404-342-9087",	"pao@comcast.net",	"443367256543"),
("B-17","123456",	"Berry",	"Anna",	"9 Pleasant Way"	,"404-887-4673",	"404-876-3376",	"aberry@hotmail.com",	"443376562837");

insert into `logs`
(`订单编号`,`顾客编号`,	`包包编号`,	`租出日期`,	`归还日期`,	`保险状态`)
values
("3N7F8N35W4AB",      "M-62",	101,	"2011/4/12",	"2011/4/30",  	TRUE	),
("3N7F9B47X4KV",      "M-62",	107,	"2011/1/19",	"2011/2/1",  	TRUE	),
("3N7F9G8VWFWP",      "F-59",	102,	"2011/2/11",	"2011/2/19",  	TRUE	),
("3N7F9KLHK2TU",      "F-59",	104,	"2011/3/9",	"2011/3/11	  ",    TRUE	),
("3N7F9POUFGAG",      "F-59",	105,	"2011/5/21",	"2011/5/25",  	TRUE	),
("3N7FA1LCM5H4",      "Q-13",	110,	"2011/3/16",	"2011/3/17",  	FALSE	),
("3N7FA6COZFLY",      "L-29",	106,	"2011/5/18",	"2011/5/25",  	FALSE	),
("3N7FABN3FRNJ",      "Z-30",	108,	"2011/1/1",	"2011/2/1	  ",    TRUE	),
("3N7FAGN71MFY",      "Z-30",	101,	"2011/6/2",	"2011/6/8	  ",    TRUE	),
("3N7FAJRRI44W",      "Z-30",	103,	"2011/5/6",	"2011/5/9	  ",     TRUE	),
("3N7FAOAJTJT5",      "S-63",	109,	"2011/6/2",	"2011/6/30	  ",      FALSE	),
("3N7FASIT3V5Z",      "P-91",	111,	"2011/2/19",	"2011/3/1",  	TRUE	),
("3N7FAVCS04EI",      "P-91",	111,	"2011/3/30",	"2011/4/2",  	TRUE	),
("3N7FAZS4CPUA",      "B-17",	101,	"2011/3/5",	"2011/3/9	  ",     FALSE	),
("3N7FB3NLR7G1",      "B-17",	103,	"2011/4/1",	"2011/4/21	  ",   FALSE	),
("3N7FB7A5KWDX",      "B-17",	106,	"2011/5/5",	"2011/5/9	  ",    FALSE);