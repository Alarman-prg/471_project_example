<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
class Attendee
{
    public static function add($email_address, $first_name, $last_name)
    {
        $params = [
            $email_address,
            $first_name,
            $last_name
        ];
        $sql = "INSERT INTO attendee(email_address, first_name, last_name)
                VALUES(?, ?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }
    public static function get($email_address)
    {
        $params = [
            $email_address
        ];
        $sql = "SELECT *
                FROM attendee
                WHERE email_address = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
