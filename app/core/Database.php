<?php

/**
 * @author      Hi-Teak Digital Solution Ltd
 * @copyright   Copyright (c), 2023 Hi-Teak Digital Solution Ltd
 * @license     MIT public license
 */

 namespace App\Core;

//  Class DB.

class Database
{
    // Database Connection
    private static $connect;
    private static $data = array();
    public static $errors = [];

    public function __construct()
    {
        // Database Connection
        self::$connect = self::connect();
    }

    public static function connect()
    {
        
        // connect to the database
        $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($mysqli->connect_error) {
            self::$errors['Error'] = "Error Connecting to Database";
        } else {
            // charset Data UTF-8
            $mysqli->set_charset('utf8mb4');
        }
        return $mysqli;
    }


    /**
     * Insert Data Into Database
     * @param string $table_name
     * @param array $data
     */
    public static function insert($table_name, $data)
    {
        $sql = "INSERT INTO " . $table_name . " (";
        $sql .= implode(",", array_keys($data)) . ') VALUES (';
        $sql .= "'" . implode("','", array_values($data)) . "')";
        if (mysqli_query(self::connect(), $sql)) {
            return true;
        } else {
            self::$errors['insert'] = mysqli_error(self::connect());
        }
    }


    /**
     * Get Select Data From Database
     * @param string  $table_name
     * @param string  $order_by
     * @param array   $where_condition
     * @param integer $limit
     */

    public static function select($table_name, $where_condition = '', $order_by = '', $limet = 0)
    {
        $data = array();
        // Create the query string
        $sql = "SELECT * FROM $table_name ";

        // get Where condition
        if (!empty($where_condition)) {
            $sql .= " WHERE $where_condition ";
        }

        // get order by data
        if (!empty($order_by)) {
            $sql .= " ORDER BY $order_by ";
        }

        // set limit data from database
        if ($limet > 0) {
            $sql .= " LIMIT $limet";
        }
        $result = self::connect()->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        } else {
            self::$errors['select'] = 'No data available in table';
        }
    }


    /**
     * Get query Data From Database
     * @param string $sql
     */
    public static function query($sql)
    {
        $result = self::connect()->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                self::$data[] = $row;
            }
            return self::$data;
        } else {
            self::$errors['query'] = 'No data available in table';
        }
    }


    /**
     * Get Select Data From Database Number Rows
     * @param string $table_name
     * @param array $where_condition
     */
    public static function number($table_name, $where_condition = '', $order_by = '', $limet = 0)
    {
        $data = array();
        // Create the query string
        $sql = "SELECT * FROM $table_name ";

        // get Where condition
        if (!empty($where_condition)) {
            $sql .= " WHERE $where_condition ";
        }

        // get order by data
        if (!empty($order_by)) {
            $sql .= " ORDER BY $order_by ";
        }

        // set limit data from database
        if ($limet > 0) {
            $sql .= " LIMIT $limet";
        }
        $result = self::connect()->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_num_rows($result);
        } else {
            return 0;
        }
    }

     /**
     * Get Select Data From Database Number Rows
     * @param string $table_name
     * @param array $where_condition
     */
    public static function sumNumber($table_name, $colloum, $where_condition = '', $order_by = '', $limet = 0)
    {
        $data = 0;
        // Create the query string
        $sql = "SELECT * FROM $table_name ";

        // get Where condition
        if (!empty($where_condition)) {
            $sql .= " WHERE $where_condition ";
        }

        // get order by data
        if (!empty($order_by)) {
            $sql .= " ORDER BY $order_by ";
        }

        // set limit data from database
        if ($limet > 0) {
            $sql .= " LIMIT $limet";
        }
        $result = self::connect()->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data += $row[$colloum];
            }
            return $data;
        } else {
            self::$errors['select'] = 'No data available in table';
        }
    }


    /**
     * Update Data Into Database
     * @param string $table_name
     * @param array $data
     * @param array $where_condition
     */
    public static function update($table_name, $data, $where_condition)
    {
        $query = '';
        $condition = '';
        foreach ($data as $key => $value) {
            $query .= $key . "='" . $value . "', ";
        }
        $query = substr($query, 0, -2);
        /*This code will convert array to string like this-  
           input - array(  
                'key1'     =>     'value1',  
                'key2'     =>     'value2'  
           )  
           output = key1 = 'value1', key2 = 'value2'*/
        foreach ($where_condition as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        /*This code will convert array to string like this-  
           input - array(  
                'id'     =>     '5'  
           )  
           output = id = '5'*/
        $sql = "UPDATE $table_name SET $query WHERE $condition";

        $result = self::connect()->query($sql);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Data From Database Where ID
     * @param string $table_name
     * @param array $where_condition
     */
    public static function delete($table_name, $where_condition)
    {
        $condition = '';
        foreach ($where_condition as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
            /*This code will convert array to string like this-  
                input - array(  
                     'id'     =>     '5'  
                )  
                output = id = '5'*/
            $condition = substr($condition, 0, -5);
            $sql = "DELETE FROM $table_name WHERE $condition";
            $result = self::connect()->query($sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        }
    }
}
