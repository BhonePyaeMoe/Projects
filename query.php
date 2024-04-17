<?php

include('connection.php');

$Admin = "Create Table Admin
(
    AdminID int NOT NULL Primary Key Auto_Increment,
    AdminName varchar (30),
    AdminProfile varchar (255),
    Email varchar (30),
    Password varchar (30),
    PhoneNumber varchar (30),
    Age int,
    Address varchar (30)
)";

$check = mysqli_query($connect,$Admin);

if ($check) 
{
    echo "Admin Table is successfully Registered"; 
}
else 
{
    echo "Registration is unsuccessful";  
}





$Customer = "Create Table Customer
(
    CustomerID int NOT NULL Primary Key Auto_Increment,
    FirstName varchar (30),
    LastName varchar (30),
    Profile varchar (255),
    Email varchar (30),
    Password varchar (30),
    PhoneNumber varchar (30),
    Gender varchar (30),
    Viewcount int
)";

$check = mysqli_query($connect,$Customer);

if ($check) 
{
    echo "Customer Table is successfully Registered"; 
}
else 
{
    echo "Registration is unsuccessful";  
}





$Campsite = "Create table Campsite
(
    CampsiteID int NOT NULL Primary Key Auto_Increment,
    Campsitename varchar (30),
    Location varchar (30)
)";

$check = mysqli_query($connect,$Campsite);

if ($check) 
{
    echo "Campsite Table is successfully Registered"; 
}
else 
{
    echo "Registation is unsuccessful";  
}




$PitchType = "Create table PitchType
(
    PitchTypeID int NOT null primary key AUTO_Increment,
    PitchTypeName  varchar (30)
)";

$check = mysqli_query($connect,$PitchType);

if ($check) 
{
    echo "PitchType Table is successfully Registered"; 
}
else 
{
    echo "Registration is unsuccessful";  
}
        



$Review = "Create table Review
(
        ReviewID int NOT NULL Primary Key Auto_Increment,
        CustomerID int,      
        Feedback varchar (50),
        Rating int,
        Foreign Key (CustomerID) references Customer (CustomerID)        
)";

$check = mysqli_query($connect,$Review);

if ($check) 
{
    echo "Review Table is successfully Registered"; 
}
else 
{
    echo "Registration is unsuccessful";  
}



$Pitch="Create Table pitch
(
    PitchID int NOT null primary key AUTO_INCREMENT,
    PitchName Varchar (30),
    PitchImg Varchar(255),
    Map Varchar(255),
    Facilitiesname1 Varchar (50),
    Facilitiesname2 Varchar (50),
    Facilitiesname3 Varchar (50),
    Facilitiesimg1 Varchar (255),
    Facilitiesimg2 Varchar (255),
    Facilitiesimg3 Varchar (255),
    Localname1 Varchar (50),
    Localname2 Varchar (50),
    Localname3 Varchar (50),
    Localimg1 Varchar (255),
    Localimg2 Varchar (255),
    Localimg3 Varchar (255),
    Price int,
    Description Varchar(200),
    Status Varchar (100),
    CampsiteID int,
    PitchtypeID int,
    Viewcount int,
    Foreign Key (CampsiteID)references campsite (CampsiteID),
    Foreign Key (PitchtypeID)references  pitchtype (PitchtypeID)
)"; 

$check =mysqli_query($connect,$Pitch);
if ($check) 
{
    echo "Pitch Table is successfully Registered";
}
else 
{
    echo "Registration is unsuccessful";
}


$Review = "Create Table Review
(
    ReviewID int Not NUll primary key AUTO_INCREMENT,
    Rating int,
    Feedback text,
    CustomerID int,
    Foreign Key (CustomerID) References Customer(CustomerID)

)";

$check =mysqli_query($connect,$Review);
if ($check) 
{
    echo "Review Table is successfully Registered";
}
else 
{
    echo "Registration is unsuccessful";
}

$rssfeed  = "Create Table RSSfeed 
(
    RSSFeedID int NOT NULL primary key Auto_Increment,
    Title varchar(30),
    Description text,
    Url varchar(100)
)";

$query = mysqli_query($connect,$rssfeed);

if ($query) 
{
    echo " RSS Table is successfully Registered";
}



$Booking = "Create Table Booking
(
    BookingID int Not NUll primary key AUTO_INCREMENT,
    Date Date,
    Quantity int,
    Tax int,
    TotalCost int,
    PitchID int,
    CustomerID int,
    Foreign Key (PitchID) References pitch(PitchID),
    Foreign Key (CustomerID) References customer(CustomerID)

)";

$check =mysqli_query($connect,$Booking);
if ($check) 
{
    echo "Booking Table is successfully Registered";
}
else 
{
    echo "Registration is unsuccessful";
}




$Contact = "Create Table contact
(
    ContactID int Not NUll primary key AUTO_INCREMENT,
    CustomerID int,
    Phonenumber varchar (30),
    EmailAddress varchar(30),
    Message varchar(255),
    Foreign Key (CustomerID) References customer(CustomerID)
)";

$check =mysqli_query($connect,$Contact);
if ($check) 
{
    echo "Contact Table is successfully Registered";
}
else 
{
    echo "Registration is unsuccessful";
}




?>


