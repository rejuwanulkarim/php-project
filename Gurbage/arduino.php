<?php
// Open the serial port connection to Arduino
echo "work";
$serial = fopen("COM3", "w+"); // Replace "COM3" with the appropriate port

if ($serial) {
  // Send a command to Arduino
  fwrite($serial, "1"); // Send "1" as an example command

  // Read response from Arduino
  $response = '';
  while (!feof($serial)) {
    $response .= fread($serial, 1024);
  }

  // Close the serial port connection
  fclose($serial);

  // Send the response back to the Arduino
  echo $response;
} else {
  echo "Failed to open the serial port.";
}
?>