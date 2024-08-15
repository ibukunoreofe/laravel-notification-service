# Laravel Notification Service

This project implements a notification service using Laravel that allows users to subscribe to various notification types and receive notifications via email and WebSocket.

## Prerequisites

*   **PHP**: Ensure PHP 8.2 is installed and properly configured.
*   **Composer**: Required for managing PHP dependencies.
*   **Laravel**: This project is built using Laravel framework version 11.9.
*   **Pusher PHP Server**: Version 7.2 is used for handling WebSocket communication.

## Setup Instructions

### 1\. Clone the Repository

Clone the repository to your local machine:

```

git clone https://github.com/ibukunoreofe/laravel-notification-service.git
cd laravel-notification-service
```

### 2\. Configure Environment Variables

Copy the example `.env` file and update the environment variables with your specific configuration:

```

cp .env.example .env
```

Ensure that your database connection and mail settings are correctly configured, and add the following for WebSocket setup:

```

BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=app-id
PUSHER_APP_KEY=app-key
PUSHER_APP_SECRET=app-secret
PUSHER_APP_CLUSTER=mt1
PUSHER_SCHEME=http
PUSHER_HOST=echo-server
PUSHER_PORT=6001
PUSHER_ENCRYPTED=false
```

### Running via Docker Compose

```
docker-compose up --build --detach --remove-orphans
```

### Enter running container

```
docker compose exec -it laravel.test bash
```

### Stop running container

```
docker compose exec -it laravel.test bash
```


## API Endpoints

### 1\. Subscribe a User to a Notification Type

**Endpoint:**

```

POST /api/notifications/subscribe
```

**Request Body:**

```

{
  "user_id": 1,
  "notification_type": "news"
}
```

**Description:** This endpoint allows a user to subscribe to a specific notification type (e.g., news, alerts, updates).

### 2\. Unsubscribe a User from a Notification Type

**Endpoint:**

```

POST /api/notifications/unsubscribe
```

**Request Body:**

```

{
  "user_id": 1,
  "notification_type": "news"
}
```

**Description:** This endpoint allows a user to unsubscribe from a specific notification type.

### 3\. Send Notification to All Subscribed Users

**Endpoint:**

```

POST /api/notifications/send
```

**Request Body:**

```

{
  "notification_type": "alert",
  "title": "System Alert",
  "message": "An important system alert has been triggered."
}
```

**Description:** This endpoint sends a notification to all users who are subscribed to the specified notification type.

### 4\. View User's Notifications

**Endpoint:**

```

GET /api/notifications/{user_id}
```

**Request Parameters:**

*   `user_id`: The ID of the user whose notifications you want to view.

**Description:** This endpoint retrieves all notifications sent to a specific user.

## WebSocket Subscription with Postman

You can also test the WebSocket functionality using Postman. Here’s how:

### 1\. Connect to WebSocket

1.  Open Postman and select the **WebSocket Request**.
2.  Connect to the WebSocket using the URL:

    ```
    
    ws://localhost:6001/app/my-app-key?protocol=7&client=js&version=4.3.1&flash=false
            
    ```

3.  Replace `my-app-key` with the key you've set in the `.env` file.

### 2\. Subscribe to a Channel

Once connected, you can subscribe to a specific channel by sending the following JSON:

```

{
  "event": "pusher:subscribe",
  "data": {
    "auth": "",
    "channel": "notifications.alert"
  }
}
```

### 3\. Test Notification Sending

After subscribing, use the **Send Notification** API endpoint to trigger a notification. The notification should be received in real-time in the Postman WebSocket client.




## Listening for WS event

Using wscat for Testing WebSocket Connections
You can use wscat, a WebSocket client for the command-line, to test your WebSocket connections.

### Install wscat:
```shell
npm install -g wscat
```

### Connect to Your WebSocket Server:
```shell
wscat -c ws://localhost:6001/app/app-key?protocol=7&client=js&version=4.3.1&flash=false
```
Replace app-key with your actual Pusher app key.

Once connected, you can subscribe to channels and listen for events.


#### After connecting, you can subscribe to a channel:
```json
{
  "event": "pusher:subscribe",
  "data": {
    "auth": "",
    "channel": "<channel>"
  }
}
```

Replace my-app-key with your actual Pusher app key.

Once connected, you can subscribe to channels and listen for events.

Listen for Events:

After subscribing, any event broadcasted on the channel will be received by wscat.


## Using Postman for WebSocket Testing

Open Postman and go to the WebSocket testing feature.  

### Connect to the WebSocket using the URL:
```shell
ws://localhost:6001/app/my-app-key?protocol=7&client=js&version=4.3.1&flash=false
```

#### Subscribe to a Channel by sending the JSON payload:
```json
{
  "event": "pusher:subscribe",
  "data": {
    "auth": "",
    "channel": "notifications.alert"
  }
}
```

## License

The Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
