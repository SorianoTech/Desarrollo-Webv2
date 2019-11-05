<?php
/**
 * @author Michele Andreoli <michi.andreoli@gmail.com>
 * @name index.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package TableGenerator
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="index.css" type="text/css" />
        <title>Table generator</title>
    </head>
    <body>
        <?php
            require_once 'Table.class.php';

            //Set table's headers
            $headers = array("ID", "Name", "E-mail", "Home");
            //Set table's matrix data
            $data[0] = array("1", "Megan", "megan.fox@gmail.com", "<a href=\"#\">index</a>");
            $data[1] = array("2", "John", "john.doe@gmail.com", "<a href=\"#\">index</a>");
            $data[2] = array("3", "Paul", "paul.butter@gmail.com", "<a href=\"#\">index</a>");
            $data[3] = array("4", "Michael", "michael.pop@gmail.com", "<a href=\"#\">index</a>");
            $data[4] = array("5", "George", "dog.g@gmail.com", "<a href=\"#\">index</a>");
            $data[5] = array("6", "Jill", "jj.doc@gmail.com", "<a href=\"#\">index</a>");
            $data[6] = array("7", "Billy", "kill.bill@gmail.com", "<a href=\"#\">index</a>");
            $data[7] = array("8", "Steve", "steve.job@gmail.com", "<a href=\"#\">index</a>");

            echo "<h1 style=\"text-align: center\">Table exemple</h1>";

            /**
             * Create an instance of Table class
             * @param <Boolean> true: zebra rows on, false: zebra rows off
             * [@param] <String> table id
             * [@param] <String> table class
             */
            $t = new Table(true, "tableID");
            
            /**
             * Set a class or id for thead, tbody and tfoot of table
             * @param <String> class name
             * [@param] <String> id name
             */
            $t->setHeaderClass("headClass");
            $t->setBodyClass("bodyClass");
            $t->setFooterClass("footClass");

            /**
             * Specify a width for every columns
             */
            $t->setColumnsWidth(array("20px", "150px", "150px", "80px"));

            /**
             * Show the table
             * @param <Array> headers
             * @param <Array> data
             */
            $t->showTable($headers, $data);
        ?>
    </body>
</html>
