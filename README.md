## access
Demo of how to manipulate a Microsoft Access database using PHP.

Database File: [**database.accdb**](database.accdb)

### Configuration
To use this demo, you need to enable the `odbc` and `pdo_odbc` extensions in your **PHP configuration file `(php.ini)`**.

To do this, open your `php.ini` file and remove the semicolon `;` in front of the following lines:
```ini
extension=odbc
```
```ini
extension=pdo_odbc
```

After making these changes, save the `php.ini` file and restart the **Apache** web server to apply the changes.

### Installation
To install and run this demo, follow these steps:

1. Clone or download this repository to your htdocs folder.
   For example, you can clone it to `~/xampp/htdocs/access`.

2. Navigate to <http://localhost/access> in your web browser to access the demo.