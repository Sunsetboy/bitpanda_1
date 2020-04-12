## PHP Technical test

### 1.

* [ ] Create a new Laravel project using composer

Attached you will find a DB dump. Create a DB connection in laravel using the .env file. 
In this DB there are 3 tables: `users`, `countries` and `user_details`.

```
* users: id, email, active
* countries: id, name, iso2, iso3 
* user_details: id, user_id, citizenship_country_id, first_name, last_name, phone_number
```

* [ ] Create a call which will return all the users which are `active` (users table) and have an Austrian citizenship.

```GET http://127.0.0.1:8000/austrians```

* [ ] Create a call which will allow you to edit user details just if the user details are there already.

```PUT /users/{id}/details```

* [ ] Create a call which will allow you to delete a user just if no user details exist yet.
