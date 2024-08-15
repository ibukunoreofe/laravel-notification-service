# Laravel Notification System

## Setup Instructions

1. Clone the repository:

```bash
git clone <repository-url>
cd <repository-directory>
```

## Running via Docker Compose

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

## Listening for WS event

Using wscat for Testing WebSocket Connections
You can use wscat, a WebSocket client for the command-line, to test your WebSocket connections.

### Install wscat:
```shell
npm install -g wscat
```

### Connect to Your WebSocket Server:
```shell
wscat -c ws://localhost:6001/app/my-app-key?protocol=7&client=js&version=4.3.1&flash=false
```
Replace my-app-key with your actual Pusher app key.

Once connected, you can subscribe to channels and listen for events.


#### After connecting, you can subscribe to a channel:
```json
{
  "event": "pusher:subscribe",
  "data": {
    "auth": "",
    "channel": "private-notifications.1"
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
