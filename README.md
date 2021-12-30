# Maxibuy Assessment

## Instructions

### Setting up

1. Clone the project in this repository into your local machine -- `git clone https://github.com/Wande-cole/maxibuy.git`

2. Open the project directory, run -- `cd maxibuy`

3. In the directory on your local machine, via the terminal, run -- `php artisan migrate`

4. Still in the terminal, run -- `php artisan serve`

### Using the application

5. Using a REST client like Postman, create a TOPIC by making a POST request to the route `{{BASE_URL}}/topic`

6. Make as many SUBSCRIPTIONS to that topic by making POST requests to the route `{{BASE_URL}}/subscribe/{topic}`

7. Create a MESSAGE to a topic by making a POST request to the route `{{BASE_URL}}/publish/{topic}`

8. {{BASE_URL}} is the link generated after running step 4.

9. You can see example requests here: [POSTMAN Collection](https://documenter.getpostman.com/view/15369982/UVRGF4hV)