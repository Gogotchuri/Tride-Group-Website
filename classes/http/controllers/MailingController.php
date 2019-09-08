<?php


namespace controller;


use http\Request;

class MailingController
{
    //TODO validation and throttling
    const TO_EMAIL = "hacker.coopera@gmail.com";
    const FROM_EMAIL = "no-reply@tridegroup.ge";
    public static function requestCall(Request $request){
        $data = $request->getData();
        $name = $data["name"];
        $phone_number = $data["phone_number"];
        $message_body = "სახელი : " . $name ."; მობილური: " . $phone_number;
        return self::sendMail(self::TO_EMAIL, "შემოვიდა ახალი ზარის მოთხოვნა!", $message_body);
    }

    public static function scheduleMeeting(Request $request){
        $data = $request->getData();
        $name = $data["name"];
        $phone_number = $data["phone_number"];
        $date_time = $data["date"]; //TODO might require formatting
        $message_body = "სახელი : " . $name ."; მობილური: " . $phone_number ."; თარიღი: " .$date_time;
        return self::sendMail(self::TO_EMAIL, "შემოვიდა შოურუმის დაჯავნის მოთხოვნა!", $message_body);

    }

    public static function contactMessage(Request $request){
        $data = $request->getData();
        $name = $data["name"];
        $email = $data["email"];
        $text = $data["text"];
        return self::sendMail(self::TO_EMAIL,
            "შემოვიდა ახალი წერილი (მომხმარებლის სახელი: ".$name .").", $text, $email);

    }

    private static function sendMail(string $to, string $subject, string $message_body,
                                     string $from=self::FROM_EMAIL) :string {
        $sent_successfully = mail($to, $subject, $message_body, ["From" => $from]);
        $status = $sent_successfully ? "success" : "failed";
        return '{"status" : "'.$status.'"}';
    }


}