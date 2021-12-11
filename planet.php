<?

namespace Planet;

class Planet
{
    private int $current_day;

    // Month starts from 1
    public int $month_length;
    // Year starts from 1
    public int $year_length;

    function __construct(int $month_length, int $year_length, int $initial_day = 0)
    {
        $this->month_length = $month_length;
        $this->year_length = $year_length;

        $this->current_day = $initial_day;
    }

    function getPlanetDay()
    {
        return $this->current_day;
    }

    static function formatDate(int $year, int $month, int $date)
    {
        return ($year + 1) . '-' . ($month + 1) . '-' . ($date + 1);
    }

    function addDays($days)
    {
        $this->current_day += $days;
    }

    function addMonths($months)
    {
        $this->addDays($months * $this->month_length);
    }

    function addYears($years)
    {
        $this->addMonths($years * $this->year_length);
    }

    function addDate($date)
    {
        // Let's trust that date is in format y-m-d
        [$years, $months, $days] = explode('-', $date);

        $this->addYears($years);
        $this->addMonths($months);
        $this->addDays($days);
    }

    static function convertDate(int $day, int $month_length, int $year_length)
    {
        $full_year = intdiv($day, ($year_length * $month_length));
        $rest_without_years = $day - $full_year * $year_length * $month_length;
        $full_month = intdiv($rest_without_years, $month_length);
        $date = $rest_without_years - $full_month * $month_length;

        return self::formatDate($full_year, $full_month, $date);
    }

    function getUTCDate()
    {
        return self::convertDate($this->current_day, 31, 12);
    }

    function getDate()
    {
        return self::convertDate($this->current_day, $this->month_length, $this->year_length);
    }

    function convertUsToThem(Planet $p)
    {
        return self::convertDate($this->current_day, $p->month_length, $p->year_length);
    }

    function convertThemToUs(Planet $p)
    {
        return self::convertDate($p->getPlanetDay(), $this->month_length, $this->year_length);
    }
}
