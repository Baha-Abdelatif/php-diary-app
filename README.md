# Simple-Diary-App

## Simple Diary Application made with PHP

Fictitious diary application displaying and storing diary entries, the goal here is to apply and practice database connection with PHP.
Created with PHP as part of my preparation for the "Fullstack Web & Mobile Application Developer" professional qualification.

## Setup

This site uses PHP and Sass.
It is therefore necessary to compile the SCSS code by running:

```bash

sass ./styles/custom.scss ./styles/custom.css

```

In the root project folder, in order to obtain CSS code that can be understood by the browser.

---

You also need a .env file in the root folder to store your database credentials.
You can use ".env.template" and fill it with your actual data (don't forget to rename it by removing '.template' in the filename)
Or you can use this model to see credentials needed and create your own file:

```bash

DIARY_APP_HOST=your.database.url
DIARY_APP_PORT=1234
DIARY_APP_DB=your_database_name
DIARY_APP_DBUSER=your_database_username
DIARY_APP_DBPASS=your_database_password

```

Replace all the values with your own to connect with your db.

---

You may need some dummies data to create your table, you can use the "entries.sql" file and import it with PhpMyAdmin or another SQL DBMS.

---

## Usage

Alternatively, you can view a demo at the following address:

[https://php-diary-app-ff4aec42cc4e.herokuapp.com/](https://php-diary-app-ff4aec42cc4e.herokuapp.com/)

## Contributions

This site was created under the supervision of Jannis Seemann, a former Software Engineer at Google.
As part of his Masterclass "Modern PHP: The Complete Guide".

## License

2024

[MIT](https://choosealicense.com/licenses/mit/)

Made with ☕ & ❤️ By Abdelatif BAHA - [AbDevWeb](https://AbDevWeb.com)
