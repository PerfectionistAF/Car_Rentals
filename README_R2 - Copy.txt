Laravel Wave Cafe Project:README
______________________________________

1) AUTHENTICATON MODULE:
-Registration-----------------------------------------------------------------DONE
-Login------------------------------------------------------------------------DONE
-Email verification with MailTrack.io sandbox / Gmail SMTP upon register------NOT WORKING
-Logout-----------------------------------------------------------------------DONE
-Middlewares for auth, admin--------------------------------------------------DONE
-Save session variable, logged in username------------------------------------DONE
----NOTES----
EMAIL VERIFICATION IN SANDBOX DOESN'T WORK, TRY GMAIL SMTP
LOGOUT DOESN'T CLEAR SESSION, DELETE CURRENT SESSION TO FORCE LOGOUT
TRY TO CLEAR SESSIONS IN LOGOUT FUNCTION IN LOGIN CONTROLLER
LOGOUT FUNCTION LOGS OUT BUT GETS LOGIN FORM ONLY, YOU CAN'T RELOGIN(WITH PATHS)
CAN'T REGISTER IF PREVIOUS SESSION HASN'T ENDED
****
BETTER WAY:
USE DEFAULT LARAVEL IMPLEMENTATION OF BOOTSTRAP AUTHENTICATION SCAFFOLDING
AND SUBSTITUTE VIEWS IN VIEWS/AUTH WITH YOUR REQUIRED REGISTER AND LOGIN VIEWS
DON'T TRY IT FROM SCRATCH
****
______________________________________

2) USERS MODULE:
-View users-------------------------------------------------------------------DONE
-Add users--------------------------------------------------------------------DONE
-Delete users-----------------------------------------------------------------DONE
-Edit users-------------------------------------------------------------------DONE
----NOTES----
IF YOU TRY TO EDIT/ADD/DELETE USER WHEN YOUR USERNAME ISN'T ADMIN, REDIRECT TO LIST OF USERS
ACTIVE CHECKBOX REMOVED FROM USER FORMS
FRONTEND VALIDATION REMOVED
IMPROVEMENT: CONTROLLER AND FIELD VALIDATION TO NEW USERS
______________________________________

3) CATEGORIES MODULE:
-View categories--------------------------------------------------------------DONE
-Add categories---------------------------------------------------------------DONE
-Delete categories------------------------------------------------------------DONE
-Edit categories--------------------------------------------------------------DONE
-Delete category only if it contains no beverages-----------------------------DONE
----NOTES----
ANY AUTHENTICATED PERSON CAN ADD, DELETE, EDIT CATEGORIES
FRONTEND VALIDATION REMOVED
IMPROVEMENT: CONTROLLER AND FIELD VALIDATION + DUPLICATE ERROR VALIDATION
ADD CATEGORY_ID COLUMN AS FOREIGN KEY TO BE ABLE TO RETREIVE IT FOR BETTER DELETION
______________________________________

4) BEVERAGES MODULE:
**special or not?
**published or not?
-View beverages---------------------------------------------------------------DONE
-Add beverages----------------------------------------------------------------DONE
-Delete beverages-------------------------------------------------------------DONE
-Edit beverages---------------------------------------------------------------DONE
----NOTES----
USED LOCAL STORAGE FOR IMAGE UPLOAD, PATH: PUBLIC/IMAGES
CHECK INPUT ARRAY AND TOKEN AND INVALID VALUES
UPDATE CALLED PRACTICALLY TWICE DUE TO INVALID COLUMN VALUES
****
BETTER WAY:
USE RESOURCE CONTROLLERS, SO YOU CAN MANIPULATE HTTP REQUESTS EASILY WITH CRUD
THIS IS IMPORTANT FOR IMAGE UPLOAD 
****
______________________________________

5) MESSAGES MODULE:
-View messages----------------------------------------------------------------DONE
-Read messages----------------------------------------------------------------DONE
-Delete messages--------------------------------------------------------------DONE
-Count of unread messages-----------------------------------------------------NOT DONE
-Email me when a new message is submitted-------------------------------------IMPROVEMENT
______________________________________

6) MAINPAGE DISPLAY:
-View last 3 categories-------------------------------------------------------NOT WORKING
-View special items-----------------------------------------------------------DONE
-Submit messages--------------------------------------------------------------DONE
----NOTES----
TO FIX 3 CATEGORIES, PUT THEM IN THE SAME FUNCTION AS THE SPECIAL ITEMS
SO EITHER THE ITEMS ARE DISPLAYED OR THE CONTACT FORM IS FILLED
****
BETTER WAY:
DIVIDE INTO MULTIPLE VIEWS--INCOMPLETE IN THIS PROJECT
****
______________________________________
