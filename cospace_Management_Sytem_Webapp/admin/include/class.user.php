<?php
include "db_config.php";
class user
{
    public $db;
    public function __construct()
    {
        $this->db = oci_connect(DB_USERNAME, DB_PASSWORD, DB_SERVER);
        if (!$this->db) {
            $e = oci_error();
            echo "Error: Could not connect to database. " . $e["message"];
            exit();
        }
    }
    public function reg_user($name, $username, $password, $email)
    {
        //$password=md5($password);
        $sql = "SELECT * FROM manager WHERE uname='$username' OR uemail='$email'";
        $check = oci_parse($this->db, $sql);
        oci_execute($check);
        $count_row = oci_fetch_all($check, $res);
        if ($count_row == 0) {
            $sql1 = "INSERT INTO manager (uname, upass, fullname, uemail) VALUES ('$username', '$password', '$name', '$email')";
            $result = oci_parse($this->db, $sql1);
            oci_execute($result);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function add_room(
        $roomname,
        $room_qnty,
        $no_bed,
        $bedtype,
        $facility,
        $price
    ) {
        $available = $room_qnty;
        $booked = 0;
        $sql = "INSERT INTO room_category (roomname, available, booked, room_qnty, no_bed, bedtype, facility, price) VALUES ('$roomname', '$available', '$booked', '$room_qnty', '$no_bed', '$bedtype', '$facility', '$price')";
        $result = oci_parse($this->db, $sql);
        oci_execute($result);
        if ($result) {
            for ($i = 0; $i < $room_qnty; $i++) {
                $sql2 = "INSERT INTO rooms (room_cat, book) VALUES ('$roomname', 'false')";
                oci_parse($this->db, $sql2);
                oci_execute($sql2);
            }
            return true;
        } else {
            return false;
        }
    }
    public function check_available($checkin, $checkout)
    {
        $sql = "SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin'))";
        $check = oci_parse($this->db, $sql);
        oci_execute($check);
        if ($check) {
            return $check;
        } else {
            return false;
        }
    }

    public function booknow($checkin, $checkout, $name, $phone, $roomname)
    {
        $sql =
            "SELECT * FROM rooms WHERE room_cat=:roomname AND (room_id NOT IN (SELECT DISTINCT room_id FROM rooms WHERE checkin <= :checkin AND checkout >= :checkout))";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ":roomname", $roomname);
        oci_bind_by_name($stmt, ":checkin", $checkin);
        oci_bind_by_name($stmt, ":checkout", $checkout);
        oci_execute($stmt);

        if ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
            $id = $row["ROOM_ID"];

            $sql2 =
                "UPDATE rooms SET checkin=:checkin, checkout=:checkout, name=:name, phone=:phone, book='true' WHERE room_id=:id";
            $stmt2 = oci_parse($this->db, $sql2);
            oci_bind_by_name($stmt2, ":checkin", $checkin);
            oci_bind_by_name($stmt2, ":checkout", $checkout);
            oci_bind_by_name($stmt2, ":name", $name);
            oci_bind_by_name($stmt2, ":phone", $phone);
            oci_bind_by_name($stmt2, ":id", $id);
            $send = oci_execute($stmt2);

            if ($send) {
                $result = "Your Room has been booked!!";
            } else {
                $result = "Sorry, Internal Error";
            }
        } else {
            $result = "No Room Is Available";
        }

        return $result;
    }

    public function edit_all_room($checkin, $checkout, $name, $phone, $id)
    {
        $sql2 =
            "UPDATE rooms SET checkin=:checkin, checkout=:checkout, name=:name, phone=:phone, book='true' WHERE room_id=:id";
        $stmt = oci_parse($this->db, $sql2);
        oci_bind_by_name($stmt, ":checkin", $checkin);
        oci_bind_by_name($stmt, ":checkout", $checkout);
        oci_bind_by_name($stmt, ":name", $name);
        oci_bind_by_name($stmt, ":phone", $phone);
        oci_bind_by_name($stmt, ":id", $id);
        $send = oci_execute($stmt);

        if ($send) {
            $result = "Your Room has been booked!!";
        } else {
            $result = "Sorry, Internal Error";
        }

        return $result;
    }

    public function edit_room_cat(
        $roomname,
        $room_qnty,
        $no_bed,
        $bedtype,
        $facility,
        $price,
        $room_cat
    ) {
        $sql2 = "DELETE FROM rooms WHERE room_cat=:room_cat";
        $stmt2 = oci_parse($this->db, $sql2);
        oci_bind_by_name($stmt2, ":room_cat", $room_cat);
        oci_execute($stmt2);

        for ($i = 0; $i < $room_qnty; $i++) {
            $sql3 =
                "INSERT INTO rooms(room_cat, book) VALUES(:roomname, 'false')";
            $stmt3 = oci_parse($this->db, $sql3);
            oci_bind_by_name($stmt3, ":roomname", $roomname);
            oci_execute($stmt3);
        }

        $available = $room_qnty;
        $booked = 0;

        $sql =
            "UPDATE room_category SET roomname=:roomname, available=:available, booked=:booked, room_qnty=:room_qnty, no_bed=:no_bed, bedtype=:bedtype, facility=:facility, price=:price WHERE roomname=:room_cat";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ":roomname", $roomname);
        oci_bind_by_name($stmt, ":available", $available);
        oci_bind_by_name($stmt, ":booked", $booked);
        oci_bind_by_name($stmt, ":room_qnty", $room_qnty);
        oci_bind_by_name($stmt, ":no_bed", $no_bed);
        oci_bind_by_name($stmt, ":bedtype", $bedtype);
        oci_bind_by_name($stmt, ":facility", $facility);
        oci_bind_by_name($stmt, ":price", $price);
        oci_bind_by_name($stmt, ":room_cat", $room_cat);
        $send = oci_execute($stmt);

        if ($send) {
            $result = "Updated Successfully!!";
        } else {
            $result = "Sorry, Internal Error";
        }

        return $result;
    }

    public function check_login($emailusername, $password)
    {
        //$password=md5($password);
        $sql2 =
            "SELECT uid from manager WHERE uemail=:emailusername OR uname=:emailusername and upass=:password";
        $stmt2 = oci_parse($this->db, $sql2);
        oci_bind_by_name($stmt2, ":emailusername", $emailusername);
        oci_bind_by_name($stmt2, ":password", $password);
        oci_execute($stmt2);
        $user_data = oci_fetch_array($stmt2);
        $count_row = oci_num_rows($stmt2);

        if ($count_row == 1) {
            $_SESSION["login"] = true;
            $_SESSION["uid"] = $user_data["UID"];
            return true;
        } else {
            return false;
        }
    }

    public function get_session()
    {
        return $_SESSION["login"];
    }

    public function user_logout()
    {
        $_SESSION["login"] = false;
        session_destroy();
    }
}

?>
