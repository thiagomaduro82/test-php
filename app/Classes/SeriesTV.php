<?php

namespace App\Classes;

use App\Database\Database;

class SeriesTV
{
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function nextView()
    {
        $connection = $this->database->setConnection();
        $daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $nowDate = date("Y-m-d");
        $nowTime = date("H:i:s");
        $nowDayOfWeek = date("w", strtotime($nowDate));
        $sql = "select s.title, s.channel, s.gender, i.week_day, i.show_time 
                from tv_series as s, tv_series_intervals as i 
                where (i.id_tv_series = s.id) and (i.week_day like '%$daysOfWeek[$nowDayOfWeek]%') and (i.show_time > '$nowTime')";
        $statement = $connection->query($sql);
        $results = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($results == null) {
            for ($i = 0; $i <= 6; $i++) {
                $nowDayOfWeek += 1;
                if ($nowDayOfWeek <= 6) {
                    $sql = "select s.title, s.channel, s.gender, i.week_day, i.show_time 
                            from tv_series as s, tv_series_intervals as i 
                            where (i.id_tv_series = s.id) and (i.week_day like '%$daysOfWeek[$nowDayOfWeek]%')";
                    $statement = $connection->query($sql);
                    $results = $statement->fetch(\PDO::FETCH_ASSOC);
                    if ($results) {
                        return $results;
                    }
                } else {
                    $nowDayOfWeek = -1;
                }
            }
            return $results;
        } else {
            return $results;
        }
    }

    public function searchSeries($time, $title)
    {
        $connection = $this->database->setConnection();
        $sql = "select s.title, s.channel, s.gender, i.week_day, i.show_time 
                from tv_series as s, tv_series_intervals as i 
                where (i.id_tv_series = s.id) ";
        if ($title) {
            $sql = $sql . " and (s.title like '%$title%') ";
        }
        if ($time) {
            $sql = $sql . " and (i.show_time >= '$time') ";
        }
        $sql = $sql . " order by s.title";
        $statement = $connection->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
