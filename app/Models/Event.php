<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Event
{
    public static function list($show_deleted = false)
    {
        $sql = "SELECT e.event_id,e.event_name,e.event_desc,e.event_date,SUM(s.num_attending) AS attendance_total
                FROM event e
                    LEFT JOIN event_signup s ON s.event_id=e.event_id";
        if ($show_deleted == false) {
            $sql .= " WHERE deleted = false";
        }
        $sql .= " GROUP BY e.event_id,e.event_name,e.event_desc,e.event_date";


        try {
            $rs = DB::select($sql);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }

        return $rs;
    }

    public static function get($event_id)
    {
        $params = [
            $event_id
        ];

        $sql = "SELECT *
                FROM event
                WHERE event_id = ?";

        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }

        return $rs;
    }

    public static function add($event_name, $event_desc, $event_date)
    {
        $params = [
            $event_name,
            $event_desc,
            $event_date
        ];

        $sql = "INSERT INTO event(event_name, event_desc, event_date)
                VALUES(?, ?, ?)";

        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }

        return $rs;
    }
    public static function update($event_id, $event_name, $event_desc, $event_date)
    {
        $params = [
            $event_name,
            $event_desc,
            $event_date,
            $event_id
        ];

        $sql = "UPDATE event
                SET event_name = ?,
                    event_desc = ?,
                    event_date = ?
                WHERE event_id = ?";

        try {
            DB::update($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }

        return $rs;
    }

    public static function delete($event_id)
    {
        $params = [
            $event_id
        ];

        $sql = "UPDATE event
                SET deleted = true
                WHERE event_id = ?";

        try {
            DB::update($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }

        return $rs;
    }

    public static function attendee_add($event_id, $email_address, $num_attending, $comments)
    {
        $params = [
            $event_id,
            $email_address,
            $num_attending,
            $comments
        ];

        $sql = "INSERT INTO event_signup(event_id, email_address, num_attending, comments)
                VALUES(?, ?, ?, ?)";

        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }

        return $rs;
    }

    public static function attendee_list($event_id)
    {
        $params = [
            $event_id
        ];

        $sql = "SELECT es.event_id,es.email_address,es.num_attending,es.comments,
                        a.first_name, a.last_name
                FROM event_signup es
                    INNER JOIN attendee a ON a.email_address=es.email_address
                WHERE es.event_id = ?";

        try {
            $rs = DB::select($sql ,$params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }

        return $rs;
    }
}
