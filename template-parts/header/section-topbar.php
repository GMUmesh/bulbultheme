<div class="ct-topbar">
    <div class="container">
        <div class="ct-header-left">
            <span id="ct-datetime">
                <?php
                require get_theme_file_path('/inc/nepali_calendar.php');

                // for nepali date
                $cal = new Nepali_Calendar();
                $day = date("d");
                $month = date("m");
                $year = date("Y");

                $today = $cal->eng_to_nep($year, $month, $day);

                function engDayToNep($dt)
                {
                    switch ($dt) {
                        case 1:
                            $dt = "१";
                            break;
                        case 2:
                            $dt = "२";
                            break;
                        case 3:
                            $dt = "३";
                            break;
                        case 4:
                            $dt = "४";
                            break;
                        case 5:
                            $dt = "५";
                            break;
                        case 6:
                            $dt = "६";
                            break;
                        case 7:
                            $dt = "७";
                            break;
                        case 8:
                            $dt = "८";
                            break;
                        case 9:
                            $dt = "९";
                            break;
                        case 10:
                            $dt = "१०";
                            break;
                        case 11:
                            $dt = "११";
                            break;
                        case 12:
                            $dt = "१२";
                            break;
                        case 13:
                            $dt = "१३";
                            break;
                        case 14:
                            $dt = "१४";
                            break;
                        case 15:
                            $dt = "१५";
                            break;
                        case 16:
                            $dt = "१६";
                            break;
                        case 17:
                            $dt = "१७";
                            break;
                        case 18:
                            $dt = "१८";
                            break;
                        case 19:
                            $dt = "१९";
                            break;
                        case 20:
                            $dt = "२०";
                            break;
                        case 21:
                            $dt = "२१";
                            break;
                        case 22:
                            $dt = "२२";
                            break;
                        case 23:
                            $dt = "२३";
                            break;
                        case 24:
                            $dt = "२४";
                            break;
                        case 25:
                            $dt = "२५";
                            break;
                        case 26:
                            $dt = "२६";
                            break;
                        case 27:
                            $dt = "२७";
                            break;
                        case 28:
                            $dt = "२८";
                            break;
                        case 29:
                            $dt = "२९";
                            break;
                        case 30:
                            $dt = "३०";
                            break;
                        case 31:
                            $dt = "३१";
                            break;
                        case 32:
                            $dt = "३२";
                            break;
                    }
                    return $dt;
                }

                function engYearToNep($y)
                {
                    switch ($y) {
                        case 2077:
                            $y = "२०७७";
                            break;
                        case 2078:
                            $y = "२०७८";
                            break;
                        case 2079:
                            $y = "२०७९";
                            break;
                        case 2080:
                            $y = "२०८०";
                            break;
                        case 2081:
                            $y = "२०८१";
                            break;
                        case 2082:
                            $y = "२०८२";
                            break;
                        case 2083:
                            $y = "२०८३";
                            break;
                        case 2084:
                            $y = "२०८४";
                            break;
                        case 2085:
                            $y = "२०८५";
                            break;
                        case 2086:
                            $y = "२०८६";
                            break;
                        case 2087:
                            $y = "२०८७";
                            break;
                        case 2088:
                            $y = "२०८८";
                            break;
                        case 2089:
                            $y = "२०८९";
                            break;
                        case 2090:
                            $y = "२०९०";
                            break;
                        default:
                            $y = "";
                            break;
                    }
                    return $y;
                }

                $today_dt = $today['date'];
                $np_year = $today['year'];

                $today_dt = engDayToNep($today_dt);
                $np_year = engYearToNep($np_year);

                echo $today_dt . ' ' . $today['nmonth'] . ' ' . $np_year . ', ' . $today['day'];
                ?>
            </span>
        </div><!-- /.ct-header-left -->

        <div class="ct-header-right">
            <?php
            if (has_nav_menu('topbar_menu')) :

                wp_nav_menu(array(
                    'theme_location' => 'topbar_menu',
                    'container' => 'ul',
                    'depth'     => 1,
                ));

            endif; ?>
        </div><!-- /.ct-header-right -->
    </div><!-- /.ct-topbar -->
</div>