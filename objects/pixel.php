<?php
class Pixel
{

    private $conn;
    private $table_name = "Pixels";

    public $id;
    public $spriteId;
    public $position;
    public $color;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * from " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readForSprite()
    {
        $query = "SELECT * from " . $this->table_name . " WHERE SpriteID=:spriteId";
        $stmt = $this->conn->prepare($query);

        $this->spriteId = htmlspecialchars(strip_tags($this->spriteId));
        $stmt->bindParam(":spriteId", $this->spriteId);

        $stmt->execute();

        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET SpriteID=:spriteId, Position=:position, Color=:color";
        $stmt = $this->conn->prepare($query);

        $this->spriteId = htmlspecialchars(strip_tags($this->spriteId));
        $this->position = htmlspecialchars(strip_tags($this->position));
        $this->color = htmlspecialchars(strip_tags($this->color));

        $stmt->bindParam(":spriteId", $this->spriteId);
        $stmt->bindParam(":position", $this->position);
        $stmt->bindParam(":color", $this->color);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET SpriteID=:spriteId, Position=:position, Color=:color WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->spriteId = htmlspecialchars(strip_tags($this->spriteId));
        $this->position = htmlspecialchars(strip_tags($this->position));
        $this->color = htmlspecialchars(strip_tags($this->color));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":spriteId", $this->spriteId);
        $stmt->bindParam(":position", $this->position);
        $stmt->bindParam(":color", $this->color);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
