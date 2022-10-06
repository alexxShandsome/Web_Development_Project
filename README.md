# Web Development Project
You can edit or optimize the code, Just follow the Rules

__This is the Web Development Project Repository for Finals__ 

__Contributing Members:__
* Gomez (alexxShandsome)
* Arganda (earlylalo)
* Encabo (orly20)

__Dependencies:__
* Bootstrap Version 5
* XAMPP
* XAMPP for Linux

__Rules for Maintaining This Project__
* Use TABS for indention for uniformity in all editors that uses TABS, do not convert tabs to spaces.
* Follow Proper indention formatting.
* Code readability is priority, "It's okay to be buggy as long as readable".
* Push changes in the ```testing``` branch because ```main``` is for production only, which means it should be stable and has little bugs.

__Database Name:__ article_site
__Table/s:__
```
Registered_Users
	* FIRST_NAME      varchar(30)
	* LAST_NAME       varchar(30)
	* USER_NAME       varchar(30)
	* EMAIL           varchar(30) (PK)
	* PASSWORD        text
	* GENDER          varchar(30)
	* BIRTHDAY        date
	* ADDRESS         text
	* PROFILE_PIC     text
	* BIO             text

Written_Article
	* HEADLINE        varchar(200) (PK)
	* CONTENT         text
	* AUTHOR          varchar(30)
	* THUMBNAIL       text
	* CATEGORY        varchar(30)
	* PUBLISH_DATE    date
```

