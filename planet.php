<?
namespace Planet;

class Planet {
    private int $current_day;

    // Month starts from 1
    public int $month_length;
    // Year starts from 1
    public int $year_length;

    function __construct(int $month_length, int $year_length, int $initial_day = 0) {
        $this->month_length = $month_length;
        $this->year_length = $year_length;

        $this->current_day = $initial_day;
    }

    function get_planet_day() {
        return $this->current_day;
    }

    static function format_date(int $year, int $month, int $date) {
        return ($year + 1).'-'.($month + 1).'-'.($date + 1); 
    }

    function add($full_date) {

    }

    static function convert_date(int $day, int $month_length, int $year_length) {
        $full_year = intdiv($day, ($year_length * $month_length));
        $rest_without_years = $day - $full_year * $year_length * $month_length;
        $full_month = intdiv($rest_without_years, $month_length);
        $date = $rest_without_years - $full_month * $month_length;

        return self::format_date($full_year, $full_month, $date);
    }

    function get_UTC_date() {
        return self::convert_date($this->current_day, 31, 12);
    }

    function get_date() {
        return self::convert_date($this->current_day, $this->month_length, $this->year_length);
    }

    function convert_us_to_them(Planet $p) {
        return self::convert_date($this->current_day, $p->month_length, $p->year_length);
    }

    function convert_them_to_us(Planet $p) {
        return self::convert_date($p->get_planet_day(), $this->month_length, $this->year_length);
    }
}