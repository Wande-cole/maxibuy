# Maxibuy Assessment

## Instructions

### Setting up

1. Clone the project in this repository into your local machine -- `$ git clone https://github.com/Wande-cole/maxibuy.git`

2. Open the project directory, run -- `$ cd maxibuy`

3. Create a MySQL database with any name of choice, and set the environment variable `DB_DATABASE` to the database name

4. In the directory on your local machine, via the terminal, run -- `$ php artisan migrate`

5. Optionally, run -- `$ php artisan db:seed --class=DemoSeeder` to insert the following demonstration content into the database.  
**NB**: *If you perform this step, you can skip to*  `Using the application: Step 3`

```php
    Topics: [
        ['name' => 'maths'],
        ['name' => 'english'],
        ['name' => 'chemistry']
    ]

    Subscriber: [
        ['endpoint' => 'http://127.0.0.1:9000/api/subscriber/test']
    ]

    Subscriber_topic: [
        ['subscriber_id' => 1, 'topic_id' => 1]
    ]
```

6. Still in the terminal, run -- `$ php artisan serve --port=8000` and `$ php artisan serve --port=9000`

### Using the application

1. Using a REST client like Postman, create a TOPIC by making a POST request to the route `{{BASE_URL}}/topic`

2. Make as many SUBSCRIPTIONS to that topic by making POST requests to the route `{{BASE_URL}}/subscribe/{topic}`

3.  Create a MESSAGE to a topic by making a POST request to the route `{{BASE_URL}}/publish/{topic}`

`{{BASE_URL}}` is the link generated after running step 4.

You can see example requests here: [POSTMAN Collection](https://documenter.getpostman.com/view/15369982/UVRGF4hV)