---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://books.loc/docs/collection.json)

<!-- END_INFO -->

#Books management


APIs for managing books
<!-- START_c84ecb8d4fd02d9a637dac124b62c629 -->
## Get books

> Example request:

```bash
curl -X GET \
    -G "http://books.loc/api/books" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://books.loc/api/books"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 17,
            "title": "Quia repellendus.",
            "description": "Sunt totam nisi quo vel. Explicabo vitae id officiis dolor quia quia. Quo rerum laudantium illum totam rerum.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 41,
                "name": "Newton Bartoletti",
                "email": "kareem14@example.org",
                "is_author": 1
            }
        },
        {
            "id": 16,
            "title": "Est reiciendis doloremque.",
            "description": "Voluptate veritatis ut doloremque rerum dolores accusantium. Sit dignissimos qui sapiente tempora rerum in. Eum impedit dolorem doloribus est.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 40,
                "name": "Dr. Enrico Bergnaum II",
                "email": "thomas.turcotte@example.net",
                "is_author": 1
            }
        },
        {
            "id": 15,
            "title": "Ullam quidem temporibus.",
            "description": "Iste nobis fugit distinctio nostrum. Ipsum enim nobis ducimus quo quos. Quaerat quidem consequatur reprehenderit.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 37,
                "name": "Uriel Schmitt",
                "email": "hilbert.west@example.net",
                "is_author": 1
            }
        },
        {
            "id": 14,
            "title": "Ipsum quae sed.",
            "description": "Suscipit facere eum maxime nihil delectus. Aliquid id inventore est et quia. Necessitatibus dolorem aut commodi est.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 35,
                "name": "Alexane Ruecker III",
                "email": "reilly.alia@example.org",
                "is_author": 1
            }
        },
        {
            "id": 13,
            "title": "Illo corrupti sint repellat.",
            "description": "Ab harum vero quis aspernatur et. Sint quisquam esse est adipisci et nobis. Natus illo ut qui voluptas ut. Odit eaque aut debitis quis dolore id non qui.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 33,
                "name": "Josianne Hirthe",
                "email": "lindgren.orland@example.net",
                "is_author": 1
            }
        },
        {
            "id": 12,
            "title": "Molestiae qui.",
            "description": "Vel aut porro corporis. Et et vitae debitis nulla. Qui assumenda culpa deleniti odit dolore est earum.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 31,
                "name": "Ms. Flossie McGlynn",
                "email": "bergnaum.lewis@example.net",
                "is_author": 1
            }
        },
        {
            "id": 11,
            "title": "Odit aut qui.",
            "description": "Ex reiciendis qui ut. Nihil non ipsam quos neque fuga. Reiciendis accusantium nulla qui enim dolor voluptatibus.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 28,
                "name": "Dr. Benedict King MD",
                "email": "rkemmer@example.com",
                "is_author": 1
            }
        },
        {
            "id": 10,
            "title": "Qui consequatur ut.",
            "description": "Asperiores cupiditate rem iure molestiae et. Aliquid dolorum est sed rerum aut optio. Sit enim maiores rerum facilis. Odit sed dolor porro quibusdam dolor quisquam.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 26,
                "name": "Kayli Leannon",
                "email": "bayer.rupert@example.net",
                "is_author": 1
            }
        },
        {
            "id": 9,
            "title": "Aut at quisquam.",
            "description": "Et aut vitae sequi. Et aut optio aliquam consequuntur doloremque perferendis. Accusantium enim voluptas at aut corrupti.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 25,
                "name": "Dr. Bettye Adams",
                "email": "bartell.bud@example.com",
                "is_author": 1
            }
        },
        {
            "id": 8,
            "title": "Neque qui.",
            "description": "Ut nulla occaecati nulla autem dolores qui facilis. Voluptatem est aut velit sed est voluptatem maxime.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 18,
                "name": "Bridget Schimmel",
                "email": "judy05@example.net",
                "is_author": 1
            }
        },
        {
            "id": 7,
            "title": "Aperiam magni laboriosam.",
            "description": "Aliquam et veniam quis autem placeat. Sunt aperiam assumenda doloribus at tenetur non vitae. Est et omnis ducimus suscipit consequatur fugit excepturi minima.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 16,
                "name": "Molly Powlowski",
                "email": "isac78@example.org",
                "is_author": 1
            }
        },
        {
            "id": 6,
            "title": "Aliquid voluptatem totam et.",
            "description": "At deleniti maiores laboriosam. Quia non laboriosam fuga velit quibusdam error. Officia excepturi aut voluptatum temporibus neque.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 13,
                "name": "Prof. Immanuel Gottlieb",
                "email": "adele43@example.net",
                "is_author": 1
            }
        },
        {
            "id": 5,
            "title": "Alias inventore voluptatibus.",
            "description": "Similique distinctio quasi a reiciendis facere beatae officia. Consequatur magnam sequi et explicabo quidem. Sit nobis a nihil earum fuga. Animi doloribus dignissimos impedit atque.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 11,
                "name": "Omer Reinger",
                "email": "ohermann@example.net",
                "is_author": 1
            }
        },
        {
            "id": 4,
            "title": "Tempore necessitatibus illo aut.",
            "description": "Aliquid consequatur architecto fugit dolorem modi id eius. Consequatur voluptatem ut hic totam. Ipsa officia occaecati quod aut sint sunt.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 9,
                "name": "Dr. Darian Rath",
                "email": "gulgowski.domingo@example.org",
                "is_author": 1
            }
        },
        {
            "id": 3,
            "title": "Aliquid aliquid nesciunt sed.",
            "description": "Beatae qui laboriosam id consequatur autem qui porro. Harum illum corrupti qui autem. Inventore ut itaque officiis officiis excepturi quidem non.",
            "cover": "",
            "published_at": "24\/01\/2020 20:16",
            "author": {
                "id": 6,
                "name": "Jackie McKenzie PhD",
                "email": "amy83@example.net",
                "is_author": 1
            }
        }
    ],
    "links": {
        "first": "http:\/\/books.loc\/api\/books?page=1",
        "last": "http:\/\/books.loc\/api\/books?page=3",
        "prev": "http:\/\/books.loc\/api\/books?page=1",
        "next": "http:\/\/books.loc\/api\/books?page=3"
    },
    "meta": {
        "current_page": 2,
        "from": 16,
        "last_page": 3,
        "path": "http:\/\/books.loc\/api\/books",
        "per_page": 15,
        "to": 30,
        "total": 31
    }
}
```

### HTTP Request
`GET api/books`


<!-- END_c84ecb8d4fd02d9a637dac124b62c629 -->

<!-- START_33c6d64a451af167032c5c54df96db5c -->
## Store book

> Example request:

```bash
curl -X POST \
    "http://books.loc/api/books" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"sint","description":"consectetur","author_id":12}'

```

```javascript
const url = new URL(
    "http://books.loc/api/books"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "sint",
    "description": "consectetur",
    "author_id": 12
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "title": "Deserunt qui quaerat.",
            "description": "Et pariatur ipsum deserunt illum. Distinctio quibusdam ex reprehenderit assumenda quidem. Nesciunt est quasi aut recusandae.",
            "cover": "",
            "published_at": "",
            "author": null
        },
        {
            "id": null,
            "title": "Sed sequi.",
            "description": "Molestiae error at doloribus. Est totam quia vel libero sint. Voluptate cum molestias aut nihil labore mollitia et est. Fugit velit hic aut deserunt quis dolorem.",
            "cover": "",
            "published_at": "",
            "author": null
        }
    ]
}
```

### HTTP Request
`POST api/books`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | The title of the book.
        `description` | string |  required  | The description of the book.
        `author_id` | integer |  required  | The id of the author.
    
<!-- END_33c6d64a451af167032c5c54df96db5c -->

<!-- START_12c1c577fc002b5da2d75267229f7bb3 -->
## Get book by id

> Example request:

```bash
curl -X GET \
    -G "http://books.loc/api/books/tempora" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://books.loc/api/books/tempora"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "title": "Sed repellat eligendi laboriosam.",
            "description": "Et est quis suscipit tempora quia ut. Perspiciatis recusandae ullam earum illum. Tempora minima molestias nesciunt aut odit eos.",
            "cover": "",
            "published_at": "",
            "author": null
        },
        {
            "id": null,
            "title": "Quae nam at.",
            "description": "Eum ut pariatur similique beatae aut error vel et. Vero repellat et omnis ex totam ut.",
            "cover": "",
            "published_at": "",
            "author": null
        }
    ]
}
```

### HTTP Request
`GET api/books/{book}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `book` |  required  | The ID of the book.

<!-- END_12c1c577fc002b5da2d75267229f7bb3 -->

<!-- START_d75ecf1315f29c879b459ea9788d1c21 -->
## Delete book

> Example request:

```bash
curl -X DELETE \
    "http://books.loc/api/books/ea" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://books.loc/api/books/ea"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```
> Example response (404):

```json
{
    "status": false,
    "message": "No query results for model [App\\Book] {book}"
}
```

### HTTP Request
`DELETE api/books/{book}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `book` |  required  | The ID of the book.

<!-- END_d75ecf1315f29c879b459ea9788d1c21 -->

<!-- START_58c4db42d1c289e1c1cef47d740831e9 -->
## Publish book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allowed only for authors

> Example request:

```bash
curl -X POST \
    "http://books.loc/api/book/publish" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"title":"est","description":"voluptatibus","cover":"dicta"}'

```

```javascript
const url = new URL(
    "http://books.loc/api/book/publish"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "est",
    "description": "voluptatibus",
    "cover": "dicta"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Successful book publish"
}
```
> Example response (400):

```json
{
    "title": [
        "The title field is required."
    ]
}
```
> Example response (403):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`POST api/book/publish`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | The title of the book.
        `description` | string |  required  | The description of the book.
        `cover` | file |  optional  | nullable image mimes:jpeg,png The cover of the book.
    
<!-- END_58c4db42d1c289e1c1cef47d740831e9 -->

#User authentication


APIs for user authentication
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login User

> Example request:

```bash
curl -X POST \
    "http://books.loc/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"similique","password":"molestiae"}'

```

```javascript
const url = new URL(
    "http://books.loc/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "similique",
    "password": "molestiae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "access_token": "{token}"
}
```
> Example response (401):

```json
{
    "message": "Your credentials are incorrect. Please try again"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | email |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register User

> Example request:

```bash
curl -X POST \
    "http://books.loc/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"quisquam","email":"a","password":"delectus","is_subscribed":true,"is_author":false}'

```

```javascript
const url = new URL(
    "http://books.loc/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "quisquam",
    "email": "a",
    "password": "delectus",
    "is_subscribed": true,
    "is_author": false
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Successful registration"
}
```
> Example response (400):

```json
{
    "password": [
        "The password confirmation does not match."
    ]
}
```
> Example response (500):

```json
{
    "message": "Something went wrong on the server."
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the user.
        `email` | email |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
        `is_subscribed` | boolean |  optional  | If user is subscribed.
        `is_author` | boolean |  optional  | If user is author.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://books.loc/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://books.loc/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Logged out successfully"
}
```
> Example response (500):

```json
{
    "message": "Something went wrong on the server."
}
```

### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## Get User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://books.loc/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://books.loc/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "name": "Bret Yundt",
            "email": "danny97@example.net",
            "is_author": true
        },
        {
            "id": null,
            "name": "Pauline Beahan",
            "email": "pfannerstill.liliane@example.com",
            "is_author": true
        }
    ]
}
```

### HTTP Request
`GET api/user`


<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->


