<?php
session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $account_img = $_SESSION["account-img"];
    $logged =  true;
} else {
    $logged = false;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <meta name="description" content="Calendar">
    <meta name="author" content="Ayoub Amer">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Font Awseome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- csss -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style-cours.css">

</head>
<style>
    /* Overall body and content */
    body {
        height: 100%;
        width: 100%;
        margin: 0;
        background: #005C97;
        background: -webkit-linear-gradient(left, #363795, #005C97);
        background: -moz-linear-gradient(left, #363795, #005C97);
        background: -o-linear-gradient(left, #363795, #005C97);
        background: linear-gradient(to right, #363795, #005C97);
        font-family: Helvetica;
    }

    .content {
        overflow: none;
        max-width: 790px;
        padding: 0px 0;
        height: 500px;
        position: relative;
        margin: 20px auto;
        background: #52A0FD;
        background: -moz-linear-gradient(right, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: -webkit-linear-gradient(right, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: linear-gradient(to left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        border-radius: 3px;
        box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -webkit-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    /*  Events display */
    .events-container {
        overflow-y: scroll;
        height: 100%;
        float: right;
        margin: 0px auto;
        font: 13px Helvetica, Arial, sans-serif;
        display: inline-block;
        padding: 0 10px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
    }

    .events-container:after {
        clear: both;
    }

    .event-card {
        line-height: 3rem;
        padding: 20px 0;
        width: 25rem;
        margin: 0.5rem auto;
        display: block;
        background: #fff;
        /* border-left: 10px solid #52A0FD; */
        border-left: 10px solid rgb(255, 23, 68);
        border-radius: 3px;
        box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -webkit-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

  

    .event-description {
        color: #52A0FD;
        text-align: left;
        font-size: 1.3rem;
        font-weight: 400;
        padding-left: 0.8rem;
    }

    .event-name {
        padding-right: 0;
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .event-cancelled {
        color: #FF1744;
        text-align: right;
    }

    /*  Calendar wrapper */
    .calendar-container {
        float: left;
        position: relative;
        margin: 0px auto;
        height: 100%;
        background: #fff;
        font: 13px Helvetica, Arial, san-serif;
        display: inline-block;
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
    }

    .calendar-container:after {
        clear: both;
    }

    .calendar {
        display: table;
    }

    /* Calendar Header */
    .year-header {
        background: #52A0FD;
        background: -moz-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: -webkit-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: linear-gradient(to right, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        font-family: Helvetica;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        height: 40px;
        text-align: center;
        position: relative;
        color: #fff;
        border-top-left-radius: 3px;
    }

    .year-header span {
        display: inline-block;
        font-size: 20px;
        line-height: 40px;
    }

    .left-button,
    .right-button {
        cursor: pointer;
        width: 28px;
        text-align: center;
        position: absolute;
    }

    .left-button {
        left: 0;
        -webkit-border-top-left-radius: 5px;
        -moz-border-radius-topleft: 5px;
        border-top-left-radius: 5px;
    }

    .right-button {
        right: 0;
        top: 0;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topright: 5px;
        border-top-right-radius: 5px;
    }

    .left-button:hover {
        background: #3FADFF;
    }

    .right-button:hover {
        background: #00C1FF;
    }

    /* Buttons */
    .button {
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        font-size: 1rem;
        border-radius: 25px;
        padding: 0.65rem 1.9rem;
        transition: .2s ease all;
        color: white;
        border: none;
        box-shadow: -1px 10px 20px #9BC6FD;
        background: #52A0FD;
        background: -moz-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: -webkit-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: linear-gradient(to right, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    }

    #cancel-button {
        box-shadow: -1px 10px 20px #FF7DAE;
        background: #FF1744;
        background: -moz-linear-gradient(left, #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
        background: -webkit-linear-gradient(left, #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
        background: linear-gradient(to right, #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
    }

    #add-button {
        display: block;
        position: absolute;
        right: 20px;
        bottom: 20px;
    }

    #add-button:hover,
    #ok-button:hover,
    #cancel-button:hover {
        transform: scale(1.03);
    }

    #add-button:active,
    #ok-button:active,
    #cancel-button:active {
        transform: translateY(3px) scale(.97);
    }

    /* Days/months tables */
    .days-table,
    .dates-table,
    .months-table {
        border-collapse: separate;
        text-align: center;
    }

    .day {
        height: 26px;
        width: 26px;
        padding: 0 10px;
        line-height: 26px;
        border: 2px solid transparent;
        text-transform: uppercase;
        font-size: 90%;
        color: #9e9e9e;
    }

    .month {
        cursor: default;
        height: 26px;
        width: 26px;
        padding: 0 2px;
        padding-top: 10px;
        line-height: 26px;
        text-transform: uppercase;
        font-size: 11px;
        color: #9e9e9e;
        transition: all 250ms;
    }

    .active-month {
        font-weight: bold;
        font-size: 14px;
        color: #FF1744;
        text-shadow: 0 1px 4px RGBA(255, 50, 120, .8);
    }

    .month:hover {
        color: #FF1744;
        text-shadow: 0 1px 4px RGBA(255, 50, 120, .8);
    }

    /*  Dates table */
    .table-date {
        cursor: default;
        color: #2b2b2b;
        height: 2rem;
        width: 3rem;
        font-size: 15px;
        padding: 10px;
        line-height: 26px;
        text-align: center;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: all 250ms;
    }

    .table-date:not(.nil):hover {
        border-color: #FF1744;
        box-shadow: 0 2px 6px RGBA(255, 50, 120, .9);
    }

    .event-date {
        border-color: #52A0FD;
        box-shadow: 0 2px 8px RGBA(130, 180, 255, .9);
    }

    .active-date {
        background: #FF1744;
        box-shadow: 0 2px 8px RGBA(255, 50, 120, .9);
        color: #fff;
    }

    .event-date.active-date {
        background: #52A0FD;
        box-shadow: 0 2px 8px RGBA(130, 180, 255, .9);
    }

    /* input dialog */
    .dialog {
        z-index: 5;
        background: #fff;
        position: absolute;
        width: 415px;
        height: 500px;
        left: 387px;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        display: none;
        border-left: 1px #aaa solid;
    }

    .dialog-header {
        margin: 20px;
        color: #333;
        text-align: center;
    }

    .form-container {
        margin-top: 25%;
    }

    .form-label {
        color: #333;
    }

    .input {
        border: none;
        background: none;
        border-bottom: 1px #aaa solid;
        display: block;
        margin-bottom: 50px;
        width: 200px;
        height: 20px;
        text-align: center;
        transition: border-color 250ms;
    }

    .input:focus {
        outline: none;
        border-color: #00C9FB;
    }

    .error-input {
        border-color: #FF1744;
    }

    /* Tablets and smaller */
    @media only screen and (max-width: 780px) {
        .content {
            overflow: visible;
            position: relative;
            max-width: 100%;
            width: 370px;
            height: 100%;
            background: #52A0FD;
            background: -moz-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
            background: -webkit-linear-gradient(left, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
            background: linear-gradient(to right, #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        }

        .dialog {
            width: 370px;
            height: 450px;
            border-radius: 3px;
            top: 0;
            left: 0;
        }

        .events-container {
            float: none;
            overflow: visible;
            margin: 0 auto;
            padding: 0;
            display: block;
            left: 0;
            border-radius: 3px;
        }

        .calendar-container {
            float: none;
            padding: 0;
            margin: 0 auto;
            margin-right: 0;
            display: block;
            left: 0;
            border-radius: 3px;
            box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            -moz-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            -webkit-box-shadow: 3px 8px 16px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        }
    }

    /* Small phone screens */
    @media only screen and (max-width: 400px) {

        .content,
        .events-container,
        .year-header,
        .calendar-container {
            width: 320px;
        }

        .dialog {
            width: 320px;
        }

        .months-table {
            display: block;
            margin: 0 auto;
            width: 320px;
        }

        .event-card {
            width: 300px;
        }

        .day {
            padding: 0 7px;
        }

        .month {
            display: inline-block;
            padding: 10px 10px;
            font-size: .8rem;
        }

        .table-date {
            width: 20px;
            height: 20px;
            line-height: 20px;
        }

        .event-name,
        .event-count,
        .event-cancelled {
            font-size: .8rem;
        }

        .add-button {
            bottom: 10px;
            right: 10px;
            padding: 0.5rem 1.5rem;
        }
    }
</style>

<body onload="load();">
    <script>
        function load() {
            // Load the PHP script that outputs the session variables as a JSON object
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_session_infos.php');
            xhr.onload = function() {
                // Parse the JSON response
                var sessionData = JSON.parse(xhr.responseText);
                console.log(sessionData);
            };
            xhr.send();

            // check if logged n 
            var header = document.getElementById("header");
            var logged = <?php echo $logged ? 'true' : 'false'; ?>;
            var account = document.getElementById("account");
            var noAccount = document.getElementById("no-account");
            if (logged) {
                header.classList.add('logged');
                noAccount.classList.toggle("hidden");
            } else {
                account.classList.toggle("hidden");
            }
        }
    </script>

    <!-- Header Section -->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <?php
                require_once("functions.php");
                headerLinks();
                ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="no-account">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="login.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="join.php">Join</a><br>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
                    <div class="dropdown-account">
                        <button class="drop-btn" type="button">
                            <img src="<?php echo $account_img ?>" class="account-img" alt="">
                        </button>
                        <div class="dropdown-account-content">
                            <a href="index.php">Home</a> <br>
                            <a href="logout.php">Log out</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <div class="content" style="margin-top: 11rem;">
        <div class="calendar-container">
            <div class="calendar">
                <div class="year-header">
                    <span class="left-button" id="prev"> &lang; </span>
                    <span class="year" id="label"></span>
                    <span class="right-button" id="next"> &rang; </span>
                </div>
                <table class="months-table">
                    <tbody>
                        <tr class="months-row">
                            <td class="month">Jan</td>
                            <td class="month">Feb</td>
                            <td class="month">Mar</td>
                            <td class="month">Apr</td>
                            <td class="month">May</td>
                            <td class="month">Jun</td>
                            <td class="month">Jul</td>
                            <td class="month">Aug</td>
                            <td class="month">Sep</td>
                            <td class="month">Oct</td>
                            <td class="month">Nov</td>
                            <td class="month">Dec</td>
                        </tr>
                    </tbody>
                </table>

                <table class="days-table">
                    <td class="day">Sun</td>
                    <td class="day">Mon</td>
                    <td class="day">Tue</td>
                    <td class="day">Wed</td>
                    <td class="day">Thu</td>
                    <td class="day">Fri</td>
                    <td class="day">Sat</td>
                </table>
                <div class="frame">
                    <table class="dates-table">
                        <tbody class="tbody">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="events-container">
        </div>
        <div class="dialog" id="dialog">
            <h2 class="dialog-header"> Add New Event </h2>
            <form class="form" id="form">
                <div class="form-container" align="center">
                    <label class="form-label" id="valueFromMyButton" for="name">Event name</label>
                    <input class="input" type="text" id="name" maxlength="36">
                    <label class="form-label" id="valueFromMyButton" for="descrp">Event Description</label>
                    <input class="input" type="text" id="descrp">
                    <input type="button" value="Cancel" class="button" id="cancel-button">
                    <input type="button" value="OK" class="button" id="ok-button">
                </div>
            </form>
        </div>
    </div>
    <!-- Dialog Box-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>
    <script>
        // Setup the calendar with the current date
        $(document).ready(function() {
            var date = new Date();
            var today = date.getDate();
            // Set click handlers for DOM elements
            $(".right-button").click({
                date: date
            }, next_year);
            $(".left-button").click({
                date: date
            }, prev_year);
            $(".month").click({
                date: date
            }, month_click);
            // $("#add-button").click({
            //     date: date
            // }, new_event);
            // Set current month as active
            $(".months-row").children().eq(date.getMonth()).addClass("active-month");
            init_calendar(date);
            var events = check_events(today, date.getMonth() + 1, date.getFullYear());
            show_events(events, months[date.getMonth()], today);
        });

        // Initialize the calendar by appending the HTML dates
        function init_calendar(date) {
            $(".tbody").empty();
            $(".events-container").empty();
            var calendar_days = $(".tbody");
            var month = date.getMonth();
            var year = date.getFullYear();
            var day_count = days_in_month(month, year);
            var row = $("<tr class='table-row'></tr>");
            var today = date.getDate();
            // Set date to 1 to find the first day of the month
            date.setDate(1);
            var first_day = date.getDay();
            // 35+firstDay is the number of date elements to be added to the dates table
            // 35 is from (7 days in a week) * (up to 5 rows of dates in a month)
            for (var i = 0; i < 35 + first_day; i++) {
                // Since some of the elements will be blank, 
                // need to calculate actual date from index
                var day = i - first_day + 1;
                // If it is a sunday, make a new row
                if (i % 7 === 0) {
                    calendar_days.append(row);
                    row = $("<tr class='table-row'></tr>");
                }
                // if current index isn't a day in this month, make it blank
                if (i < first_day || day > day_count) {
                    var curr_date = $("<td class='table-date nil'>" + "</td>");
                    row.append(curr_date);
                } else {
                    var curr_date = $("<td class='table-date'>" + day + "</td>");
                    var events = check_events(day, month + 1, year);
                    if (today === day && $(".active-date").length === 0) {
                        curr_date.addClass("active-date");
                        show_events(events, months[month], day);
                    }
                    // If this date has any events, style it with .event-date
                    if (events.length !== 0) {
                        curr_date.addClass("event-date");
                    }
                    // Set onClick handler for clicking a date
                    curr_date.click({
                        events: events,
                        month: months[month],
                        day: day
                    }, date_click);
                    row.append(curr_date);
                }
            }
            // Append the last row and set the current year
            calendar_days.append(row);
            $(".year").text(year);
        }

        // Get the number of days in a given month/year
        function days_in_month(month, year) {
            var monthStart = new Date(year, month, 1);
            var monthEnd = new Date(year, month + 1, 1);
            return (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
        }

        // Event handler for when a date is clicked
        function date_click(event) {
            $(".events-container").show(250);
            $("#dialog").hide(250);
            $(".active-date").removeClass("active-date");
            $(this).addClass("active-date");
            show_events(event.data.events, event.data.month, event.data.day);
        };

        // Event handler for when a month is clicked
        function month_click(event) {
            $(".events-container").show(250);
            $("#dialog").hide(250);
            var date = event.data.date;
            $(".active-month").removeClass("active-month");
            $(this).addClass("active-month");
            var new_month = $(".month").index(this);
            date.setMonth(new_month);
            init_calendar(date);
        }

        // Event handler for when the year right-button is clicked
        function next_year(event) {
            $("#dialog").hide(250);
            var date = event.data.date;
            var new_year = date.getFullYear() + 1;
            $("year").html(new_year);
            date.setFullYear(new_year);
            init_calendar(date);
        }

        // Event handler for when the year left-button is clicked
        function prev_year(event) {
            $("#dialog").hide(250);
            var date = event.data.date;
            var new_year = date.getFullYear() - 1;
            $("year").html(new_year);
            date.setFullYear(new_year);
            init_calendar(date);
        }

        // Event handler for clicking the new event button
        function new_event(event) {
            // if a date isn't selected then do nothing
            if ($(".active-date").length === 0)
                return;
            // remove red error input on click
            $("input").click(function() {
                $(this).removeClass("error-input");
            })
            // empty inputs and hide events
            $("#dialog input[type=text]").val('');

            $(".events-container").hide(250);
            $("#dialog").show(250);
            // Event handler for cancel button
            $("#cancel-button").click(function() {
                $("#name").removeClass("error-input");
                $("#descrp").removeClass("error-input");
                $("#dialog").hide(250);
                $(".events-container").show(250);
            });
            // Event handler for ok button
            $("#ok-button").unbind().click({
                date: event.data.date
            }, function() {
                var date = event.data.date;
                var name = $("#name").val().trim();
                var description = $("#descrp").val();
                var day = parseInt($(".active-date").html());
                // Basic form validation
                if (name.length === 0) {
                    $("#name").addClass("error-input");
                } else if (description.length === 0) {
                    $("#descrp").addClass("error-input");
                } else {
                    $("#dialog").hide(250);
                    console.log("new event");
                    new_event_json(name, description, date, day);
                    date.setDate(day);
                    init_calendar(date);
                }
            });
        }

        // Adds a json event to event_data
        function new_event_json(name, description, day, month, year) {
            var event = {
                "name": name,
                "description": description,
                "day": day,
                "month": month,
                "year": year
            };
            event_data["events"].push(event);
        }

        // Display all events of the selected date in card views
        function show_events(events, month, day) {
            // Clear the dates container
            $(".events-container").empty();
            $(".events-container").show(250);
            console.log(event_data["events"]);
            console.log(events);
            // If there are no events for this date, notify the user
            if (events.length === 0) {
                var event_card = $("<div class='event-card'></div>");
                var event_name = $("<div class='event-name'>There are no events planned for " + month + " " + day + ".</div>");
                $(event_card).css({
                    "border-left": "border-left: 10px solid rgb(255, 23, 68);"
                });
                $(event_card).append(event_name);
                $(".events-container").append(event_card);
            } else {
                // Go through and add each event as a card to the events container
                for (var i = 0; i < events.length; i++) {
                    var event_card = $("<div class='event-card'></div>");
                    var event_name = $("<div class='event-name'>" + events[i]["name"] + ":</div>");
                    var event_description = $("<div class='event-description'>" + events[i]["description"] + "</div>");
                    $(event_card).append(event_name).append(event_description);
                    $(".events-container").append(event_card);
                }
            }
        }

        // Checks if a specific date has any events
        function check_events(day, month, year) {
            var events = [];
            for (var i = 0; i < event_data["events"].length; i++) {
                var event = event_data["events"][i];
                if (event["day"] == day &&
                    event["month"] == month &&
                    event["year"] == year) {
                    events.push(event);
                }
            }
            return events;
        }

        // Given data for events in JSON format
        var event_data = {
            "events": []
        };
        // Get the event data from a PHP script
        $.ajax({
            url: "get_events.php",
            dataType: "json",
            success: function(data) {
                // Use the retrieved data to update the event_data variable
                event_data = data;
                // Initialize the calendar with the updated event_data variable
                init_calendar(new Date());
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
    </script>
</body>

</html>