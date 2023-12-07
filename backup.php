<?php
include('includes/header.php');
include('includes/navbar.php');
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

// Backup logic
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Replace these variables with your database details
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'admin-compswitch';

    // Create a unique filename for the backup
    $backupFilename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

    // Build the mysqldump command
    $command = "mysqldump -h$host -u$user -p$password $database > $backupFilename";

    // Execute the command
    exec($command);

    // Include the scripts at the beginning of the file
    include('includes/scripts.php');

    // Add the modal button and modal
?>

    <div class="d-flex justify-content-center mt-5"> <!-- Add this container to center the button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#backupModal">
            Launch Backup Modal
        </button>
    </div>

    <!-- Backup Modal -->
    <div class="modal" id="backupModal" tabindex="-1" role="dialog" aria-labelledby="backupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backupModalLabel">Backup Verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to send the backup to Gmail?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="?confirm_backup=true" class="btn btn-primary" id="confirmBackupBtn">Yes, Send Backup</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Backup Sent Successfully</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Backup sent successfully.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php


    // Process backup and email sending when the user confirms in Gmail
    if (isset($_GET['confirm_backup'])) {
        // Read the content of the backup file
        $backupData = file_get_contents($backupFilename);

        // Send the backup file as an attachment to your Gmail account
        function sendBackupToGmail($backupData, $backupFilename, $recipients)
        {
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'ojt.rms.group.4@gmail.com';
                $mail->Password   = 'hbpezpowjedwoctl';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Sender
                $mail->setFrom('ojt.rms.group.4@gmail.com', 'Database Backup');

                // Add recipients
                foreach ($recipients as $recipient) {
                    $mail->addAddress($recipient['email'], $recipient['name']);
                }

                // Attach the backup file
                $mail->addAttachment($backupFilename, 'DatabaseBackup.sql', 'base64', 'application/sql');

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Database Backup';
                $mail->Body    = 'Backup data is attached.';

                $mail->send();
                echo '<script>
                $(document).ready(function(){
                    $("#successModal").modal("show");
                });
              </script>';
            } catch (Exception $e) {
                echo "Error: {$mail->ErrorInfo}";
            }
        }

        $recipients = [
            ['email' => 'arzeljrz17@gmail.com', 'name' => 'Arzel John Zolina'],
            ['email' => 'ajmixrhyme@gmail.com', 'name' => 'Recipient Name'],
            // Add more recipients as needed
        ];
        sendBackupToGmail($backupData, $backupFilename, $recipients);

        unlink($backupFilename);
    }
}

include('includes/footer.php');
?>