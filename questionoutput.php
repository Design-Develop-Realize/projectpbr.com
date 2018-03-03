<?php
/**
 * Question Page
 *
 * Output of the questions endpoint
 *
 * @package		API
 * @author		Marc Towler <marc.towler@designdeveloprealize.com>
 * @copyright	Copyright (c) 2017 Marc Towler
 * @license		https://github.com/Design-Develop-Realize/api/blob/master/LICENSE.md
 * @link		https://api.itslit.uk
 * @since		Version 0.1
 * @filesource
 */
error_reporting(E_ALL);
if(isset($_GET['channel']))
{
    $chan = $_GET['channel'];

    $json = file_get_contents('https://api.itslit.uk/Questions/showlist/' . $chan . '/false/json');
    $data = json_decode($json);

    ?>
    <html>
    <head>
        <meta http-equiv="refresh"
              content="30; URL=https://projectpbr.com/questionoutput.php?channel=<?php echo $chan; ?>">
    </head>
    <body>
    <?php

    if(is_array($data))
    {
        echo "<table>";

        foreach ($data as $output) {
            echo "<tr>";
            echo '<td><a href="https://twitch.tv/' . $output->user . '" target="_blank">' . $output->user . '</a> asked "<b>' . urldecode($output->question) . '</b>" at ' . substr($output->date, -8) . '</td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        ?>
        <table>
            <tr>
                <td><b>Aww, it looks like no-one wants to ask you a question</b></td>
            </tr>
        </table>
        <?php
    }
} else {
?>
<html>
    <head>
        <title>ItsLit Q&A System</title>
    </head>
    <body>
        Please enter the name of the twitch channel that is hosting the Q&A:
        <br />
        <form action="" method="get">
            <input type="text" name="channel" />
            <br />
            <input type="submit" name="submit" value="Load up the Questions!" />
        </form>
    </body>
</html>
<?php
}