# Todo Documentation

### Installation 

```bash
    composer install
```

```bash
    npm install
```

```bash
    npm run build
    or
    npm run dev
```

```bash
    php artisan migrate
````

```bash
    php artisan serve
```

# Todo API documentation

This document provides an overview of the API endpoints and usage.

## Authentication

#### Registers a new user.

```http
    POST /api/register
```

```json
    {
        "name": "John Doe",
        "email": "john.doe@example.com",
        "password": "password",
        "password_confirmation": "password"
    }
```
#### Logs in an existing user.

```http
    POST /api/login
```

```json
    {
        "email": "john.doe@example.com",
        "password": "password"
    }
```

#### Logout User

```http
    POST /api/logout
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |


#### Get User Details

Retrieves details of the currently authenticated user.

```http
    GET /api/user
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |


## Task Management

#### List Tasks

Fetches all tasks associated with the authenticated user.

```http
    GET /api/tasks
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |


#### Create Task

Creates a new task for the authenticated user.

```http
    POST /api/tasks
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |

```json
    {
        "title": "New Task",
        "description": "Task description (optional)",
        "status": true
    }
```

#### Update Task

Updates an existing task owned by the authenticated user.

```http
    PUT /api/tasks/{task}
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |

```json
    {
        "title": "Updated Task",
        "description": "Updated task description (optional)",
        "status": true
    }
```

#### Delete Task

Deletes a task owned by the authenticated user.

```http
    DELETE /api/tasks/{task}
```

| Headers          | Type              |
| :--------------- | :---------------- |
| `Authorization`  | `Bearer <token>`  |
