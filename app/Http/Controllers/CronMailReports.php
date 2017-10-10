<?php
/**
 * Created by PhpStorm.
 * User: v-10
 * Date: 5/11/2017
 * Time: 11:49 AM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mark;
use DB;
use App\Student;
use App\Department;
use \Input as Input;
use Illuminate\Http\Request;
class CronMailReportsController extends Controller {

    public function sendMailReports()
    {
        echo "hii..."; die;

        // //////////*****************//////////////****************//////////////****************/////////////
//        include_once 'lib/SendGrid.php';
//        include_once 'lib/SendGrid/Email.php';
//        include_once 'lib/Smtpapi/Header.php';

        $time = date('Y-m-D H:i:s');
        $today_date = date('Y-m-d');
        $yester_day = date('Y-m-d', strtotime("-1 days"));
        $last_week = date('Y-m-d', strtotime("-7 days"));
        return $last_month = date('Y-m-d', strtotime("-30 days"));
        die;

        // // get extra mail addresses of recepients

        $select_reporting_emails = "SELECT tvce.reporting_email FROM tbl_jobmax_client_reporting_emails tvce WHERE tvce.client_user_id = $client_user_id AND tvce.email_type=1";
        $dbCommand = Yii::app()->db->createCommand($select_reporting_emails);
        $reporting_emails = $dbCommand->queryAll();

        $email_list = array();
        $email_list [] = $client_mail;
        if (!empty ($reporting_emails)) {
            foreach ($reporting_emails as $reporting_email) {
                $email_list [] = $reporting_email ['reporting_email'];
            }
        }

        $email_list_w = array();
        $email_list_m = array();
        $email_list_w = $email_list;
        $email_list_m = $email_list;

        $report_type_w = array();
        $report_type_m = array();

        // // get reports type for the client

        $select_report_type = "SELECT report_id FROM tbl_jobmax_client_reports_type WHERE user_id = $client_user_id";
        $dbCommand = Yii::app()->db->createCommand($select_report_type);
        $report_type = $dbCommand->queryAll();

        $report_type_w = $report_type;
        $report_type_m = $report_type;
        $filter_to_date = '';
        $filter_from_date = '';
        // /// get frequency

        $select_query = "SELECT tvcrf.frequency_value_id FROM tbl_jobmax_client_report_frequency tvcrf WHERE tvcrf.client_user_id = $client_user_id";
        $dbCommand = Yii::app()->db->createCommand($select_query);
        $frequency = $dbCommand->queryAll();

        if (($from_date != '') || ($to_date != '')) {

            if ($from_date != '') {
                $filter_from_date = date("Y-m-d", strtotime($from_date));
            } else {
                $filter_from_date = '';
            }
            if ($to_date != '') {
                $filter_to_date = date("Y-m-d", strtotime($to_date));
            } else {
                $filter_to_date = '';
            }

            // // get extra mail addresses of recepients

            $select_reporting_mail = "SELECT tvce.reporting_email FROM tbl_jobmax_client_reporting_emails tvce WHERE tvce.client_user_id = $client_user_id AND tvce.email_type=2";
            $dbCommand = Yii::app()->db->createCommand($select_reporting_mail);
            $email_list_instant = $dbCommand->queryAll();

            $url_c = Yii::app()->getBaseUrl(true) . '/hc_scripts/reports_applications_csv.php?user_id=' . $client_user_id . '&filter_from_date=' . $filter_from_date . '&filter_to_date=' . $filter_to_date;
            $img = getcwd() . '/mailreports/report-' . $client_name . '-' . $client_user_id . '.csv';

            file_put_contents($img, file_get_contents($url_c));

            // ////////// Instant mail ///////////////

            // $to = $email_id;
            $from_mail = $email_default;

            $subject = 'PMG  Report  - JobMAX 360  - ' . $client_company . ' - Instant';
            $message = '';
            $message .= '<table border="0" cellpadding="0" width="100%" style="width:100.0%;margin-top:30px;"><tbody><tr><td style="padding:.75pt .75pt .75pt .75pt"></td><tr><td></td></tr>';
            $message .= '<p style="width:100.0%"></p>';
            $message .= '<tr><td style="padding:.75pt .75pt .75pt .75pt">Hello ' . $client_name . ', <br><br><br> The CSV version of end of day statistics for your account are enclosed.';
            $message .= 'Please click the link below for better view of stats' . "\n\r </td></tr>";
            foreach ($report_type as $report_type) {
                if (in_array("1", $report_type)) {
                    $message .= '<a href="' . Yii::app()->getBaseUrl(true) . '/hc_scripts/dashboard_report.php?filter_from_date=' . $filter_from_date . '&filter_to_date=' . $filter_to_date . '&user_id=' . $client_user_id . '">Dashboard Report</a><br/>';
                }
                if (in_array("2", $report_type)) {
                    $message .= '<a href="' . Yii::app()->getBaseUrl(true) . '/hc_scripts/clicksconversions_report.php?filter_from_date=' . $filter_from_date . '&filter_to_date=' . $filter_to_date . '&user_id=' . $client_user_id . '">Source Report</a><br/>';
                    // $message .= 'http://login.jobmax360.net/hc_scripts/clicksconversions_report.php?filter_from_date='.$filter_from_date.'&filter_to_date='.$filter_to_date.'&user_id=' . $client_user_id."<br/>\n\r";
                }
                if (in_array("3", $report_type)) {
                    $message .= '<a href="' . Yii::app()->getBaseUrl(true) . '/hc_scripts/anonymous_visitors_report.php?filter_from_date=' . $filter_from_date . '&filter_to_date=' . $filter_to_date . '&user_id=' . $client_user_id . '">Anonymous Visitor Report</a><br/>';
                    // $message .= 'http://login.jobmax360.net/hc_scripts/anonymous_visitors_report.php?filter_from_date='.$filter_from_date.'&filter_to_date='.$filter_to_date.'&user_id=' . $client_user_id."<br/>\n\r";
                }
            }
            // $message .= 'You will be able to login after completing the verification process'."\n\r";
            $message .= '<p style="width:100.0%"></p>';
            $message .= '<tr style="width:100.0%"><td style="padding:.75pt .75pt .75pt .75pt">Regards,</td>';
            $message .= '<tr style="width:100.0%"><td style="padding:.75pt .75pt .75pt .75pt">PMG Marketing LLC</td><tr style="width:100.0%"><td></td></tr><tr style="width:100.0%"><td></td></tr><p style="width:100.0%"></p>';
            $message .= '<table border="0" cellpadding="0" width="100%" style="width:100.0%"><tbody><tr><td style="padding:.75pt .75pt .75pt .75pt"><div><table border="0" cellpadding="0" width="100%" style="width:100.0%"><tbody><tr><td style="padding:.75pt .75pt .75pt .75pt"><p class="MsoNormal" style="margin-bottom:7.5pt"><span style="font-size:9.0pt;color:#666666">PMG Marketing, LLC / 2363 Lakeside Drive / Birmingham, AL 35244 / P: 205-783-1089 / <a href=""><span style="color:#999999">www.pmgmarketing.net</span></a><u></u><u></u></span></p></td></tr></tbody></table></div></td><td style="padding:.75pt .75pt .75pt .75pt"></td></tr></tbody></table>';


            $file = getcwd() . '/mailreports/report-' . $client_name . '-' . $client_user_id . '.csv';


            foreach ($email_list_instant as $email_list_instants) {

                $obj = new SendGrid ("mguyther", "Leadmax360!");

                $email = new SendGrid\Email ();

                $email->setFrom($from_mail)->setSubject($subject)->setFromName('JobMAX 360 - ' . $client_company)->setHtml($message)->addTo($email_list_instants ['reporting_email']);

                $email->addAttachment($file);

                // $email->addAttachment($file_p);

                $response = $obj->send($email);

                unset ($obj);
                unset ($email);
            }
        }
    }

}