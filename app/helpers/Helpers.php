<?php

Trait Helpers
{

    /**
     * Test User Data Inputs
     * @param $data
     * @return string
     */
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    public function email($student_email,$quiz_title,$result,$status)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(HOST, PORT))
            ->setUsername(USER_NAME)
            ->setPassword(PASS)
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Student Make A Test '))
            ->setFrom(['server@quiz-system.com' => 'quiz-system'])
            ->setTo(['hananmohammed2468@gmail.com', 'info@quiz-system.com' => 'Student Do Quiz'])
            ->setContentType("text/html")
            ->setBody("
            <html>
                <head>
                    <style>
                        table {
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }
                
                        td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }
                        th{
                            background-color: grey;
                            color: white;
                        }
                        tr:nth-child(even) {
                            background-color: #dddddd;
                        }
                    </style>
                </head>
                <body>
                <table>
                    <thead>
                    <th>name</th>
                    <th>message</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Student Email</td>
                        <td>$student_email</td>
                    </tr>
                   <tr>
                        <td>Quiz Title</td>
                        <td>$quiz_title</td>
                    </tr>
                   <tr>
                        <td>Student Result</td>
                        <td>$result</td>
                    </tr>
                   <tr>
                        <td>Status</td>
                        <td>$status</td>
                    </tr>
                    </tbody>
                </table>
                </body>
                </html>

            
            ")
        ;

        // Send the message
        $result = $mailer->send($message);
        if ($result){
            echo "Mail Send";
        }else{
            echo "mail Fail";
        }

    }
}