<?php

class Point
{
    public $product_id;

    public function __construct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function setPoint($point, $user_id)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT point FROM points WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $this->product_id]);
        if ($stmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO points (product_id, user_id, point) VALUES (?, ?, ?)");
            $stmt->execute([$this->product_id, $user_id, $point]);
            $stmt = $conn->prepare("UPDATE products SET point = point + ? WHERE id = ?");
            $stmt->execute([$point, $this->product_id]);
        } else {
            $currentPoint = $stmt->fetch(PDO::FETCH_ASSOC)['point'];
            if ($point > $currentPoint) {
                $difference = $point - $currentPoint;
                $stmt = $conn->prepare("UPDATE points SET point = point + ? WHERE user_id = ? AND product_id = ?");
                $stmt->execute([$difference, $user_id, $this->product_id]);
                $stmt = $conn->prepare("UPDATE products SET point = point + ? WHERE id = ?");
                $stmt->execute([$difference, $this->product_id]);
            } else {
                $difference = $currentPoint - $point;
                $stmt = $conn->prepare("UPDATE points SET point = point - ? WHERE user_id = ? AND product_id = ?");
                $stmt->execute([$difference, $user_id, $this->product_id]);
                $stmt = $conn->prepare("UPDATE products SET point = point - ? WHERE id = ?");
                $stmt->execute([$difference, $this->product_id]);
            }
        }
    }

    public function getPoint()
    {
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM points WHERE product_id = ?");
        $stmt->execute([$this->product_id]);
        $userCount = $stmt->rowCount();
        $stmt = $conn->prepare("SELECT point FROM products WHERE id = ?");
        $stmt->execute([$this->product_id]);
        $point = $stmt->fetch(PDO::FETCH_ASSOC)['point'];
    
        if ($userCount > 0) {
            $average = round($point / $userCount);
        } else {
            $average = 0; 
        }
    
        $star = [];
        for ($i = 0; $i < $average; $i++) {
            $star[] = "<i class='bi bi-star-fill text-warning'></i>";
        }
        for ($i = 0; $i < 5 - $average; $i++) {
            $star[] = "<i class='bi bi-star-fill text-secondary'></i>";
        }
        
        return implode('', $star) . ' (' . $average . ')';
    }    
}
