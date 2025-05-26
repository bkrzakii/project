# project BOOKINGDZ

Steps to Run PHP Project on Your PC

## ✅ Step 1: Install XAMPP

1. Go to the official XAMPP website: https://www.apachefriends.org/index.html
2. Download the version suitable for your system (Windows/Linux/Mac).
3. Install XAMPP like any regular software.

## ✅ Step 2: Place Project Inside XAMPP

1. Extract the `BookingDZ.zip` file:

   - Right-click on the file > 'Extract Here' or 'Extract to Project0'.
   - You will get a folder named `BookingDZ`.
2. Move the extracted project folder to the `htdocs` directory:

   - Open your XAMPP installation directory, usually:
     `C:\xampp\htdocs` (on Windows) or `/opt/lampp/htdocs` (on Linux).
   - Copy and paste the `BookingDZ` folder into `htdocs`.

Your path should look like this:
`C:\xampp\htdocs\BookingDZ`

## ✅ Step 3: Start XAMPP

1. Open the XAMPP Control Panel.
2. Click **Start** next to **Apache** (this starts your server).
   - If your project uses a database, also start **MySQL**.

## ✅ Step 4: Launch the Website

1. Open your web browser (Chrome, Firefox, etc.).
2. Go to this link:
   `http://localhost/BookingDZ/SignUp_LogIn_Form.php`

## ✅ Step 5: Import Database

The project includes a file like `hotel_db.sql`:

1. Open your browser and go to:
   `http://localhost/phpmyadmin`
2. Create a new database with name "hotel_db".
3. Import the `hotel_db.sql` file into this new database.
4. Add a User via Database Privileges:

* In phpMyAdmin, click on the `hotel_db` database in the left sidebar.
* Then click on the **"Privileges"** tab at the top.
* Click on  **"Add user account"** .
* Fill in the following details:

  * **User name:** `zakii`
  * **Host name:** `localhost`
  * **Password:** `bkrbkrbkr` (repeat it below)
* Scroll down to  **Database for user account** :

  * Select **Grant all privileges on database "hotel_db"**
* Leave the rest as default and click **Go** to create the user.

## ✅ Quick Notes

- If you face any errors, double-check the steps or ask for help.
