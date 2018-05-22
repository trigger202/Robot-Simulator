**TOY ROBOT SIMULATOR**
=====================

Toy Robot Simulator
The application is a simulation of a toy robot moving on a square tabletop, of dimensions 5 units x 5 units. - There are no other obstructions on the table surface. - The robot is free to roam around the surface of the table, but must be prevented from falling to destruction. Any movement that would result in the robot falling from the table must be prevented, however further valid movement commands must still be allowed.



***Design Decisions***
=======================

The only main change is the start point of the robot. 

0,0 is considered North West (top left corner)





***Getting Started***
=====================
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

-- If you want to run the script against your own set of instruction, add them to the commands.txt inside the project directory

 note - each command must start with a new line

***Prerequisites***
======================

We will use the command line to execute the script so you will need:

1) PHP interpreter installed on your machine ideally version 7+ but 5.6+ should be fine. 
 
2) Add PHP to the your PATH Environments, see this link for instructions https://john-dugan.com/add-php-windows-path-variable/

2) Clone this project into your desired location/directory


***Running the tests***
======================

Navigate to your project folder and issue the following command to execute the script.

e.g 

`cd /path/to/project/`

` php main.php` 
