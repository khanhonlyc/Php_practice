<?php
// Subject Interface
interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}

// Concrete Subject
class EventManager implements Subject {
    private $observers = [];
    private $eventData;

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        $this->observers = array_filter($this->observers, function ($o) use ($observer) {
            return $o !== $observer;
        });
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this->eventData);
        }
    }

    public function createEvent($data): void {
        // Lưu trữ dữ liệu sự kiện và thông báo cho các observers
        $this->eventData = $data;
        $this->notify();
    }
}

// Observer Interface
interface Observer {
    public function update($eventData): void;
}

// Concrete Observer 1
class Logger implements Observer {
    public function update($eventData): void {
        echo "Logger: Ghi log sự kiện - " . $eventData . "\n";
    }
}

// Concrete Observer 2
class EmailNotifier implements Observer {
    public function update($eventData): void {
        echo "EmailNotifier: Gửi email thông báo sự kiện - " . $eventData . "\n";
    }
}

// Concrete Observer 3
class DatabaseUpdater implements Observer {
    public function update($eventData): void {
        echo "DatabaseUpdater: Cập nhật cơ sở dữ liệu với dữ liệu sự kiện - " . $eventData . "\n";
    }
}

// Sử dụng Observer Pattern
$eventManager = new EventManager();

$logger = new Logger();
$emailNotifier = new EmailNotifier();
$databaseUpdater = new DatabaseUpdater();

// Đăng ký observers
$eventManager->attach($logger);
$eventManager->attach($emailNotifier);
$eventManager->attach($databaseUpdater);

// Tạo sự kiện mới
$eventManager->createEvent("Sự kiện A đã được tạo!");
