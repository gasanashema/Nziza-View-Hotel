<?php

use Carbon\Carbon;


/**
 * Checks the status of a reservation based on check-in and check-out dates.
 *
 * @param string $checkIn Date when the reservation starts.
 * @param string $checkOut Date when the reservation ends.
 * @return string Status of the reservation.
 */
function check_reservation_status($checkIn, $checkOut)
{
    $today = Carbon::today();
    $checkInDate = Carbon::parse($checkIn);
    $checkOutDate = Carbon::parse($checkOut);

    // Check if the check-in date has not been reached yet
    if ($today->lessThan($checkInDate)) {
        return "Pending";
    }

    // Check if today is between the check-in and check-out dates
    if ($today->greaterThanOrEqualTo($checkInDate) && $today->lessThanOrEqualTo($checkOutDate)) {
        return "Ongoing";
    }

    // If today is after the check-out date
    if ($today->greaterThan($checkOutDate)) {
        return "Ended";
    }
}
/**
 * Calculates the remaining days until the end of the reservation.
 *
 * @param string $checkOut Date when the reservation ends.
 * @return int Number of days remaining until the end of the reservation.
 */
function calculate_remaining_days($checkOut)
{
    $checkOutDate = Carbon::parse($checkOut);
    $today = Carbon::today();

    // Calculate the difference in days between today and the checkOut date
    $remainingDays = $today->diffInDays($checkOutDate, false);
    if ($remainingDays < 0) {
        return "-";
    }
    return $remainingDays;
}


