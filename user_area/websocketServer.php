<?php
require __DIR__ . '/../vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class OrderTrackingServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection
        $this->clients->attach($conn);
        echo "New connection: ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Message received: {$msg}\n";

        // Optionally, process incoming messages and respond
        $data = json_decode($msg, true);

        if (isset($data['orderId']) && isset($data['status'])) {
            // Broadcast to all connected clients
            foreach ($this->clients as $client) {
                $client->send(json_encode([
                    'orderId' => $data['orderId'],
                    'status' => $data['status']
                ]));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Remove the connection
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Create a new WebSocket app instance
$server = new \Ratchet\App('localhost', 8080, '0.0.0.0');

// Define the WebSocket route
$server->route('/order-tracking', new OrderTrackingServer(), ['*']);

// Run the WebSocket server
$server->run();
