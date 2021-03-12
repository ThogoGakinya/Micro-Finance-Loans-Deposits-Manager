start transaction;
set foreign_key_checks=0;
drop table users;
-- auto-generated definition
create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255)    null,
    email             varchar(255)    null,
    account_id        bigint unsigned null,
    mobile_number     varchar(255)    null,
    national_id       varchar(255)    null,
    email_verified_at datetime        null,
    password          varchar(255)    null,
    remember_token    varchar(255)    null,
    created_at        timestamp       null,
    updated_at        timestamp       null,
    deleted_at        timestamp       null,
    constraint users_email_unique
        unique (email),
    constraint account_fk_3009051
        foreign key (account_id) references accounts (id)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MATTHEW NDONGU','matthewmugoh@gmail.com',null,'0721904932',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARTHA KARIUKI','kariukimartha80@gmail.com',null,'0720610158',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LUCY KAMAU','lucykamau82@gmail.com',null,'0722697151',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ELOSE MATHENGE','elokayeri@gmail.com',null,'0726862357',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JACKLINE MUTHONI','mjackline52@gmail.com',null,'0720382335',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MORINE MUKAMI NGARARI','morinemukamik@gmail.com',null,'0721553234',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BELINDAH MUTUMI','belindamumo@gmail.com',null,'0721453851',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JAMES IRUNGU','thiongojames@gmail.com',null,'0727671116',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MERCY LUSWETI','mercielusweti@gmail.com',null,'0727408280',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('GEOFFREY GIKONYO','gkgikonyo@gmail.com',null,'0723850309',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SAMUEL KIMANI','kimani.samuel.njuguna@gmail.com',null,'0728091441',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARTIN KUNGU KIBIRO','mkungs@gmail.com',null,'0723482139',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JORAM MURIUKI','joramuriuki@gmail.com',null,'0724494778',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EDWIN SHIVO MAHALE','emshivo@yahoo.co.uk',null,'0725604065',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('FLORENCE ATICHI','atichiflorence@yahoo.com',null,'+971558989826',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ELIAS OGALO','kogaloelias@gmail.com',null,'0725849395',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JONAH KIROGO KINYUA','jkinyua090@gmail.com',null,'0726249788',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PAUL KAMAU','paul@finaltus.co.ke',null,'0721627095',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MOSES NJENGA','singhmose@gmail.com',null,'0720282771',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BELCHA AGESA SABWA','agesabelcha@gmail.com',null,'0721778204',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ALFRED JOEL','ajoel905@gmail.com',null,'0721155871',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JAMES MAINA','mainaj76n@gmail.com',null,'0711285052',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BENSON MAINA','maina.benson9@gmail.com',null,'0724759855',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EVERLINE NYANUMBA','evanyak4@gmail.com',null,'0723734927',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('FLORENCE WAITHAKA','florence.jimmy79@gmail.com',null,'0722283398',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JACKLINE NDERITU','jackiezawadi@gmail.com',null,'0722692595',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BEN KIVUVA','benkivuva@gmail.com',null,'0720532441',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ERIC GITAU','ericgitau2014@gmail.com',null,'0721541124',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PAUL LEMALEE','olemaleepaul@gmail.com',null,'0724391213',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BENSON MULI','muliksn11@gmail.com',null,'0725909574',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('VICTORIA OKUMU','vokumu@gmail.com',null,'0720990703',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('KENNEDY OWINO OGUTU','kennowino@gmail.com',null,'0721387121',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARWA MWIKWABE','marwamwikwabe@gmail.com',null,'0725118730',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('STEPHEN JUMBALE','blessedmbaga@yahoo.com',null,'0726235871',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BETTY KAWIRA','Betikaw@yahoo.com',null,'0729957380',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MONICAH MWANZIA','monicah.mwanzia90@gmail.com',null,'0725604100',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JOSEPH MAINA','joemaina82@gmail.com',null,'0729640845',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PETER MURIGI','peterirungu@yahoo.com',null,'0723436231',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PATRICK OMUKHANGO','patrickomukhango@gmail.com',null,'0728176883',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SAMUEL MBWAYO MBWAYO','mbwayombwayo@gmail.com',null,'0723733130',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('GLORIA BETH MUTHONI','glorybem@gmail.com',null,'0724769106',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MONICA WANJAO','moniwangu78@gmail.com',null,'0721452336',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JEMIMAH NZOLA','jemimahnzola@gmail.com',null,'0722385371',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SAMUEL MUKITI','samkitz2004@yahoo.com',null,'0720148075',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SOLOMON NZULA MUTUA','snzulam@gmail.com',null,'0792786826',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('HILARY','kipronosac@gmail.com',null,'0720344754',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ANTONY WAITATHU','awaitathu@gmail.com',null,'0724378097',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ANGELA JEPKEMBOI','angykemboy@gmail.com',null,'0720253645',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('GEORGE KINGORI','gknjenga2003@gmail.com',null,'0724447593',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DAVIS MUGUIMI','Muguimidavis@gmail.com',null,'0721261365',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JULIA WAMBUI','juliamaina78@gmail.com',null,'0722493297',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BERNARD KIPKEMOI NGENO','bkipkemoi@gmail.com',null,'0721803290',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('HERMAN KIREA','herman.muriira@gmail.com',null,'0725986795',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DORESE NG\'ONYERE AMBANI','rennie.am@gmail.com',null,'0716046440',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('FLORENCE AMUMBWE','famumbwe@gmail.com',null,'0724554437',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BILLY SIMWA','billysimwa@gmail.com',null,'0723164303',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DAVID MURIUKI','wagachiri2@gmail.com',null,'0723139646',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARGARET KURUMBU','maggie.kurumbu@gmail.com',null,'0720926601',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CHRISTOPHER MURITHI KAUME','chriskoome@gmail.com',null,'0716409468',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('NANCY KARUA','nancy.karua84@gmail.com',null,'0724441548',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CAROLINE OWANO OKILA','cokilla09@gmail.com',null,'0726716784',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DIANA NJOGU','diana.muoki@gmail.com',null,'0721173454',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CATHERINE ICHABA MATONDA','kagendomatonda@gmail.com',null,'0723391500',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('IRENE MUGUTHU','irene.muguthu@gmail.com',null,'0720995675',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EDITH WARUGURU','edmuiri@gmail.com',null,'0720796874',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('KENNEDY OUMA','kenohadha@gmail.com',null,'0775992832',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ELIJAH JAPHET','muthee2011@gmail.com',null,'0721750450',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EPHANTUS KANGnullARA','ephantuswaititu@gmail.com',null,'0719277204',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BOAZ LANGAT','boazkip@gmail.com',null,'0718724357',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CALEB DAVID','kageracaleb@gmail.com',null,'0720669081',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('NATHAN WASIMELA','wasimelanathan@yahoo.com',null,'0725739897',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JOHN MACHECHE','machechejohn@gmail.com',null,'0720614355',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LENCER AWUOR OKUMU','lencerawuor@jkuat.ac.ke',null,'0721850869',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BENEDICT MUTUKU','totalbenediction@gmail.com',null,'0724290258',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CHARLES IRUNGU','charlesirungu2013@gmail.com',null,'0721748148',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JARED MAK\'OBONYO','nyapollah@gmail.com',null,'0722566624/0734597770',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BEATRICE NJENGA','beatricenjuhi@gmail.com',null,'0720976633',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LINDA DIODIO','lindiodio@gmail.com',null,'0724154326',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('KANUU MERCY JOHN','mercykanuu@gmail.com',null,'0710649777',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('WINFRED KIUNGA','wkiunga@gmail.com',null,'0705151115',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JIMMY','jimgor2001@gmail.com',null,'0724284404',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PATRICK NG\'ANG\'A','patoh83ke@gmail.com',null,'0720934693',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('GEORGE OWOUCHE','gowuoche@gmail.com',null,'+44 7843335037',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('NDUNGI KYALO','ndungi@gmail.com',null,'0720325579',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARTHA NDERITU','marthaga1980@gmail.com',null,'0721156121',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JOSEPH MWANGI KAMAU','kahingu00@gmail.com',null,'0726237993',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JOSHUA MURIMI WANJOHI','murimijosh@gmail.com',null,'0722639136',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('KIPROTICH NICHOLAS','nikrotich@yahoo.com',null,'0722728839',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARY NZIOKA','nzyokah@gmail.com',null,'0710970507',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('VINCENT KIMOSOP','kimutaivk@gmail.com',null,'0721495381',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('OUMA KAYALO','lameckayalo@gmail.com',null,'0721856099',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LYDIA KARAUKI','lydkarauki@gmail.com',null,'0723386120',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LOICE MURIITHI','loicemuriithi@gmail.com',null,'0725165557',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SHIRLEY NALIFUMA','sherleenal@gmail.com',null,'0722243941',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JAMES MURIITHI','jgmureithi10@gmail.com',null,'0720322284',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SAMUEL KISANG','yegokisang@gmail.com',null,'0722475135',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PETER ACHAR','peterachar@gmail.com',null,'0722446959',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MICHAEL KAMULU','michaelkamulu@gmail.com',null,'0724293591',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DIANA KENDAGOR','dnkendagor@gmail.com',null,'0723800918',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BRIAN MMBUKA','anyira.brian@gmail.com',null,'0711743394',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('HILDA SICHANGI','hildasichangi@gmail.com',null,'0712605557',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PRISCA CHERUIYOT','priscamaiyo@gmail.com',null,'0723268205',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('IRENE','ikimari29@gmail.com',null,'0720912253',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('SIMON KAMAU MUKUNDI','cymonkamau@yahoo.com',null,'0721303759',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CAROLINE MUNGE','mungecaroline@gmail.com',null,'0726140533',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DENNIS KIMEU','denniskimeu2@gmail.com',null,'0727077143',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('FELIX SUMBA','fsumba@gmail.com',null,'0721555026',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EMMAH NJOROGE','emmahnjoroge77@gmail.com',null,'0721560129',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JANE WAMBOI','Wjane8141@gmail.com',null,'0726875138',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JACKSON VUSAKA','jacksonvusaka@gmail.com',null,'0721779922',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('EPHRAIM NJURE GIATHI','ephraimgiathi@gmail.com',null,'0722896669',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('DORCAS KIMANI','wamdok@gmail.com',null,'0704842549',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PATRICK MULINGE','pattlevin80@gmail.com',null,'0720808982',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BARBARA OSIRO','barbaraakelo@gmail.com',null,'0721813148',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ROSE WAMBUA','arrwambua@gmail.com',null,'0728909047',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('TIMOTHY MBAU','tim_mbau@yahoo.com',null,'0722106903',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('NASHON OBOOKA','nashonobooka@gmail.com',null,'0727758816',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('CAROLINE ROTICH','karolleccr@gmail.com',null,'0722455752',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MOSES KARANJA KARIUKI','mkaranjapeace@gmail.com',null,'0721649916',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('LAURYN KITHUKU','laurynm9@gmail.com',null,'0723177808',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JANE MWANGI','jrachewa2012@gmail.com',null,'0723861928',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('PENINA RUNJI','runjipenina@gmail.com',null,'0725701032',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MUTAHE KARUORO','mutahek@yahoo.co.uk',null,'0726877123',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('MARY KINUTHIA','marymelvis71@gmail.com',null,'0704290534',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('JUSTINA MUENI NGUGI','justinamueni@hotmail.com',null,'0723997021',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('BORNACE KIMELI','bornacekimeli@gmail.com',null,'0724335821',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ANNET MBURU','annetmburu@gmail.com',null,'0725904458',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('OKELLO DAVID','okellosimeon@gmail.com',null,'0723939769',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ANGELA YEGO','angelayego50@gmail.com',null,'0703568110',null,null,null,null,null,null,null);
INSERT INTO users(name,email,account_id,mobile_number,national_id,email_verified_at,password,remember_token,created_at,updated_at,deleted_at) VALUES ('ESTHER NDIRANGU','estherwanjiru15@gmail.com',null,'0726955278',null,null,null,null,null,null,null);
commit


update users set password='$2y$10$MUaDn3uIEMk81L1v1l4AD.c7EmXdlaP8fxZ6gn3u8P1Xp38CjyOaa' where password is null ;

start transaction ;
drop table role_user;

start transaction;
create table role_user
(
    user_id bigint unsigned not null,
    role_id bigint unsigned not null,
    constraint role_id_fk_3002440
        foreign key (role_id) references roles (id)
            on delete cascade,
    constraint user_id_fk_3002440
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

start transaction;
INSERT INTO role_user(user_id, role_id) VALUES ('1',4);
INSERT INTO role_user(user_id, role_id) VALUES ('2',4);
INSERT INTO role_user(user_id, role_id) VALUES ('3',4);
INSERT INTO role_user(user_id, role_id) VALUES ('4',4);
INSERT INTO role_user(user_id, role_id) VALUES ('5',4);
INSERT INTO role_user(user_id, role_id) VALUES ('6',4);
INSERT INTO role_user(user_id, role_id) VALUES ('7',4);
INSERT INTO role_user(user_id, role_id) VALUES ('8',4);
INSERT INTO role_user(user_id, role_id) VALUES ('9',4);
INSERT INTO role_user(user_id, role_id) VALUES ('10',4);
INSERT INTO role_user(user_id, role_id) VALUES ('11',4);
INSERT INTO role_user(user_id, role_id) VALUES ('12',4);
INSERT INTO role_user(user_id, role_id) VALUES ('13',4);
INSERT INTO role_user(user_id, role_id) VALUES ('14',4);
INSERT INTO role_user(user_id, role_id) VALUES ('15',4);
INSERT INTO role_user(user_id, role_id) VALUES ('16',4);
INSERT INTO role_user(user_id, role_id) VALUES ('17',4);
INSERT INTO role_user(user_id, role_id) VALUES ('18',4);
INSERT INTO role_user(user_id, role_id) VALUES ('19',4);
INSERT INTO role_user(user_id, role_id) VALUES ('20',4);
INSERT INTO role_user(user_id, role_id) VALUES ('21',4);
INSERT INTO role_user(user_id, role_id) VALUES ('22',4);
INSERT INTO role_user(user_id, role_id) VALUES ('23',4);
INSERT INTO role_user(user_id, role_id) VALUES ('24',4);
INSERT INTO role_user(user_id, role_id) VALUES ('25',4);
INSERT INTO role_user(user_id, role_id) VALUES ('26',4);
INSERT INTO role_user(user_id, role_id) VALUES ('27',4);
INSERT INTO role_user(user_id, role_id) VALUES ('28',4);
INSERT INTO role_user(user_id, role_id) VALUES ('29',4);
INSERT INTO role_user(user_id, role_id) VALUES ('30',4);
INSERT INTO role_user(user_id, role_id) VALUES ('31',4);
INSERT INTO role_user(user_id, role_id) VALUES ('32',4);
INSERT INTO role_user(user_id, role_id) VALUES ('33',4);
INSERT INTO role_user(user_id, role_id) VALUES ('34',4);
INSERT INTO role_user(user_id, role_id) VALUES ('35',4);
INSERT INTO role_user(user_id, role_id) VALUES ('36',4);
INSERT INTO role_user(user_id, role_id) VALUES ('37',4);
INSERT INTO role_user(user_id, role_id) VALUES ('38',4);
INSERT INTO role_user(user_id, role_id) VALUES ('39',4);
INSERT INTO role_user(user_id, role_id) VALUES ('40',4);
INSERT INTO role_user(user_id, role_id) VALUES ('41',4);
INSERT INTO role_user(user_id, role_id) VALUES ('42',4);
INSERT INTO role_user(user_id, role_id) VALUES ('43',4);
INSERT INTO role_user(user_id, role_id) VALUES ('44',4);
INSERT INTO role_user(user_id, role_id) VALUES ('45',4);
INSERT INTO role_user(user_id, role_id) VALUES ('46',4);
INSERT INTO role_user(user_id, role_id) VALUES ('47',4);
INSERT INTO role_user(user_id, role_id) VALUES ('48',4);
INSERT INTO role_user(user_id, role_id) VALUES ('49',4);
INSERT INTO role_user(user_id, role_id) VALUES ('50',4);
INSERT INTO role_user(user_id, role_id) VALUES ('51',4);
INSERT INTO role_user(user_id, role_id) VALUES ('52',4);
INSERT INTO role_user(user_id, role_id) VALUES ('53',4);
INSERT INTO role_user(user_id, role_id) VALUES ('54',4);
INSERT INTO role_user(user_id, role_id) VALUES ('55',4);
INSERT INTO role_user(user_id, role_id) VALUES ('56',4);
INSERT INTO role_user(user_id, role_id) VALUES ('57',4);
INSERT INTO role_user(user_id, role_id) VALUES ('58',4);
INSERT INTO role_user(user_id, role_id) VALUES ('59',4);
INSERT INTO role_user(user_id, role_id) VALUES ('60',4);
INSERT INTO role_user(user_id, role_id) VALUES ('61',4);
INSERT INTO role_user(user_id, role_id) VALUES ('62',4);
INSERT INTO role_user(user_id, role_id) VALUES ('63',4);
INSERT INTO role_user(user_id, role_id) VALUES ('64',4);
INSERT INTO role_user(user_id, role_id) VALUES ('65',4);
INSERT INTO role_user(user_id, role_id) VALUES ('66',4);
INSERT INTO role_user(user_id, role_id) VALUES ('67',4);
INSERT INTO role_user(user_id, role_id) VALUES ('68',4);
INSERT INTO role_user(user_id, role_id) VALUES ('69',4);
INSERT INTO role_user(user_id, role_id) VALUES ('70',4);
INSERT INTO role_user(user_id, role_id) VALUES ('71',4);
INSERT INTO role_user(user_id, role_id) VALUES ('72',4);
INSERT INTO role_user(user_id, role_id) VALUES ('73',4);
INSERT INTO role_user(user_id, role_id) VALUES ('74',4);
INSERT INTO role_user(user_id, role_id) VALUES ('75',4);
INSERT INTO role_user(user_id, role_id) VALUES ('76',4);
INSERT INTO role_user(user_id, role_id) VALUES ('77',4);
INSERT INTO role_user(user_id, role_id) VALUES ('78',4);
INSERT INTO role_user(user_id, role_id) VALUES ('79',4);
INSERT INTO role_user(user_id, role_id) VALUES ('80',4);
INSERT INTO role_user(user_id, role_id) VALUES ('81',4);
INSERT INTO role_user(user_id, role_id) VALUES ('82',4);
INSERT INTO role_user(user_id, role_id) VALUES ('83',4);
INSERT INTO role_user(user_id, role_id) VALUES ('84',4);
INSERT INTO role_user(user_id, role_id) VALUES ('85',4);
INSERT INTO role_user(user_id, role_id) VALUES ('86',4);
INSERT INTO role_user(user_id, role_id) VALUES ('87',4);
INSERT INTO role_user(user_id, role_id) VALUES ('88',4);
INSERT INTO role_user(user_id, role_id) VALUES ('89',4);
INSERT INTO role_user(user_id, role_id) VALUES ('90',4);
INSERT INTO role_user(user_id, role_id) VALUES ('91',4);
INSERT INTO role_user(user_id, role_id) VALUES ('92',4);
INSERT INTO role_user(user_id, role_id) VALUES ('93',4);
INSERT INTO role_user(user_id, role_id) VALUES ('94',4);
INSERT INTO role_user(user_id, role_id) VALUES ('95',4);
INSERT INTO role_user(user_id, role_id) VALUES ('96',4);
INSERT INTO role_user(user_id, role_id) VALUES ('97',4);
INSERT INTO role_user(user_id, role_id) VALUES ('98',4);
INSERT INTO role_user(user_id, role_id) VALUES ('99',4);
INSERT INTO role_user(user_id, role_id) VALUES ('100',4);
INSERT INTO role_user(user_id, role_id) VALUES ('101',4);
INSERT INTO role_user(user_id, role_id) VALUES ('102',4);
INSERT INTO role_user(user_id, role_id) VALUES ('103',4);
INSERT INTO role_user(user_id, role_id) VALUES ('104',4);
INSERT INTO role_user(user_id, role_id) VALUES ('105',4);
INSERT INTO role_user(user_id, role_id) VALUES ('106',4);
INSERT INTO role_user(user_id, role_id) VALUES ('107',4);
INSERT INTO role_user(user_id, role_id) VALUES ('108',4);
INSERT INTO role_user(user_id, role_id) VALUES ('109',4);
INSERT INTO role_user(user_id, role_id) VALUES ('110',4);
INSERT INTO role_user(user_id, role_id) VALUES ('111',4);
INSERT INTO role_user(user_id, role_id) VALUES ('112',4);
INSERT INTO role_user(user_id, role_id) VALUES ('113',4);
INSERT INTO role_user(user_id, role_id) VALUES ('114',4);
INSERT INTO role_user(user_id, role_id) VALUES ('115',4);
INSERT INTO role_user(user_id, role_id) VALUES ('116',4);
INSERT INTO role_user(user_id, role_id) VALUES ('117',4);
INSERT INTO role_user(user_id, role_id) VALUES ('118',4);
INSERT INTO role_user(user_id, role_id) VALUES ('119',4);
INSERT INTO role_user(user_id, role_id) VALUES ('120',4);
INSERT INTO role_user(user_id, role_id) VALUES ('121',4);
INSERT INTO role_user(user_id, role_id) VALUES ('122',4);
INSERT INTO role_user(user_id, role_id) VALUES ('123',4);
INSERT INTO role_user(user_id, role_id) VALUES ('124',4);
INSERT INTO role_user(user_id, role_id) VALUES ('125',4);
INSERT INTO role_user(user_id, role_id) VALUES ('126',4);
INSERT INTO role_user(user_id, role_id) VALUES ('127',4);
INSERT INTO role_user(user_id, role_id) VALUES ('128',4);
INSERT INTO role_user(user_id, role_id) VALUES ('129',4);
INSERT INTO role_user(user_id, role_id) VALUES ('130',4);
set foreign_key_checks =1;
commit;
