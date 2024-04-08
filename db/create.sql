CREATE TABLE Library (
    Library_ID INT(16) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    PRIMARY KEY (LIbrary_ID),
    UNIQUE (Address)
) CREATE TABLE Librarian (
    Employee_ID INT(32) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Role VARCHAR(255) NOT NULL DEFAULT 'Librarian',
    PRIMARY KEY (Employee_ID)
) CREATE TABLE Checkout (
    Checkout_ID INT(32) UNSIGNED NOT NULL AUTO_INCREMENT,
    Checkout_Date DATE NOT NULL,
    Return_Date DATE NOT NULL,
    User_ID INT NOT NULL,
    Book_ID INT NOT NULL,
    PRIMARY KEY (Checkout_ID) CONSTRAINT fk_User_ID FOREIGN KEY (User_ID) REFERENCES User(User_ID) ON DELETE
    SET DEFAULT ON UPDATE CASCADE,
        CONSTRAINT fk_Book_ID FOREIGN KEY (Book_ID) REFERENCES Book(Book_ID) ON DELETE
    SET DEFAULT ON UPDATE CASCADE
)
CREATE TABLE Books (
    Book_ID INT(32) NOT NULL,
    Title VARCHAR(255) NOT NULL,
    Author VARCHAR(255) NOT NULL,
    Genre VARCHAR(255) NOT NULL,
    Description VARCHAR(255) NOT NULL,
    Availability BOOLEAN NOT NULL DEFAULT TRUE,
    PRIMARY KEY (Book_ID)
)
CREATE TABLE User (
    User_ID INT(32) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Membership_Type VARCHAR(255) NOT NULL,
    Registration_Date DATE NOT NULL,
    PRIMARY KEY (User_ID)
)