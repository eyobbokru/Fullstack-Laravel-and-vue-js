"# Fullstack-Laravel-and-vue-js"

## backend

```
cd users-departments_backend

composer install

cp .env.example .env

create the database and config user name and password

```

### cont.

```
php artisan migrate
php artisan generate:key
php artisan serve
```

## unit test

```
php artisan test

some tests
UserTest
     * test_can_create_user()
     * test_can_update_user()
     * test_can_delete_user()
     * test_cannot_create_user_without_required_data()
     * test_cannot_create_user_with_invalid_email()
     * test_cannot_create_duplicate_user()
     * test_cannot_update_user_with_invalid_data()
     * test_can_retrieve_list_of_users()
     * test_can_retrieve_single_user()

DepartmentTest
     * test_can_delete_department()
     * test_can_update_department()
     * test_can_create_department()
     * test_cannot_create_department_without_name()
     * test_cannot_create_duplicate_department()
     * test_can_retrieve_list_of_departments()
     * test_can_retrieve_single_department()

UserDepartmentTest
     * test_user_model_has_many_departments()
     * test_department_model_has_many_users()
     * test_user_model_does_not_sync_duplicate_departments()
     * test_department_model_does_not_sync_duplicate_users()
```

## frontend

```
cd users-departments_frontend
```

## Project Setup

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```
