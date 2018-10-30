<?php
// app/Helpers/EAFF.php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class EAFF {

    public static function txn_data() {

        $data = file_get_contents(public_path('data\txn_data.txt'));
        return $data;
    }

    public static function getScore() {

        $data = json_decode(self::txn_data(), true);

        $score = 0;

        foreach ($data as $key => $value) {
            $score += self::transaction_points($value['description']);
        }

        return $score;
    }

    public static function transaction_points($description) {

        $match = [
            'Merchant Payment' => 2,
            'Customer Withdrawal' => -5,
            'Customer Transfer to' => 0,
            'Pay Bill to' => 2,
            'Airtime Purchase' => -1,
            'Business Payment' => 10
        ];

        $points = 0;

        foreach ($match as $key => $value) {

            /*if (strpos($description, $key) !== false) {
                $points += $value;
            } else {
                $points += 0;
            }*/

            if (preg_match('[' . $key . ']', $description) == true) {
                $points += $value;
            } else {
                $points += 0;
            }

            /*if (substr_count($description, $key) > 0) {
                $points += $value;
            } else {
                $points += 0;
            }*/
        }

        return $points;

    }

    /*public static function credit_account($data) {
        return dd($data);
    }

    public static function debit_account($data) {
        return dd($data);
    }

    public static function debit_paybill($data) {
        return dd($data);
    }

    public static function debit_airtime($data) {
        return dd($data);
    }*/

}