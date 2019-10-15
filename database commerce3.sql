/* this is the sql script used to create the database on the commerce3 server.*/
USE st100385188;
/*create the user table*/
CREATE TABLE user_table (
    UserID  INT(6) NOT NULL,
    DisplayName TEXT NOT NULL,
    PasswordHash    TEXT NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (UserID)
);

/*create the event table*/
CREATE TABLE event_table (
    EventID INT(6) NOT NULL,
    UserID  INT(6) NOT NULL,
    Title   TEXT NOT NULL,
    Description TEXT NOT NULL,
    Location TEXT NOT NULL,
    Start   DATETIME NOT NULL,
    End     DATETIME NOT NULL,
    CONSTRAINT event_pk PRIMARY KEY (EventID)
);
