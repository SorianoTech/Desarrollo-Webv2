<?php
/**
 * @author Michele Andreoli <michi.andreoli@gmail.com>
 * @name Table.class.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package TableGenerator
 */

class Table {
    private $zebra;
    private $tableId;
    private $tableClass;
    private $headerId;
    private $headerClass;
    private $bodyId;
    private $bodyClass;
    private $footerId;
    private $footerClass;
    private $zebraClass;
    private $tableWidth;
    private $columnsWidth;

    /**
     * Constructor for table class
     * @param <Boolean> $zebra set on/off the zebra mode
     * @param <String> $id id name for this table
     * @param <String> $class class name for this table
     */
    public function __construct($zebra=null, $id=null, $class=null) {
        if ($id != null)
            $this->tableId = "id=\"$id\"";
        if ($class != null)
            $this->tableClass = "class=\"$class\"";
        if ($zebra != null)
            $this->zebra = true;
        else
            $this->zebra = false;
    }

    /**
     * Setter for zebra mode
     * @param <type> $zebra set on/off the zebra mode
     */
    public function setZebra($zebra) {
        $this->zebra = $zebra;
    }

    /**
     * Setter for table width
     * @param <String> $string width of table for example '600px' or '100%'
     */
    public function setTableWidth($string) {
        $this->tableWidth = "style=\"width:$string\"";
    }

    /**
     * Setter for columns width
     * @param <Array> $array array with the width for every column
     */
    public function setColumnsWidth($array) {        
        foreach ($array as $elem) {
            if ($elem != "")
                $this->columnsWidth[] = "style=\"width:$elem\"";
            else
                $this->columnsWidth[] = "";
        }
    }

    /**
     * Setter for table class name
     * @param <String> $class class name
     */
    public function setTableClass($class) {
        $this->tableClass = "class=\"$class\"";
    }

    /**
     * Setter for table id name
     * @param <String> $id id name
     */
    public function setTableId($id) {
        $this->tableId = "id=\"$id\"";
    }

    /**
     * Setter for thead class name
     * @param <String> $class class name
     */
    public function setHeaderClass($class) {
        $this->headerClass = "class=\"$class\"";
    }

    /**
     * Setter for thead id name
     * @param <String> $id id name
     */
    public function setHeaderId($id) {
        $this->headerId = "id=\"$id\"";
    }

    /**
     * Setter for tbody class name
     * @param <String> $class class name
     */
    public function setBodyClass($class) {
        $this->bodyClass = "class=\"$class\"";
    }

    /**
     * Setter for tbody id name
     * @param <String> $id id name
     */
    public function setBodyId($id) {
        $this->bodyId = "id=\"$id\"";
    }

    /**
     * Setter for tfoot class name
     * @param <String> $class class name
     */
    public function setFooterClass($class) {
        $this->footerClass = "class=\"$class\"";
    }

    /**
     * Setter for tfoot id name
     * @param <String> $id id name
     */
    public function setFooterId($id) {
        $this->footerId = "id=\"$id\"";
    }

    /**
     * Print the table
     * @param <Array> $headers header for every column
     * @param <Array> $data data matrix
     */
    public function showTable($headers, $data) {
        $count = 0;
        $table = "<table $this->tableWidth $this->tableId $this->tableClass>";

        //HEADER
        $table .= "<thead $this->headerId $this->headerClass><tr>";
        foreach($headers as $h) {
            $style = $this->columnsWidth[$count];
            $table .= "<td $style>$h</td>";
            $count++;
        }
        $table .= "</tr></thead>";

        //FOOTER
        $table .= "<tfoot $this->footerId $this->footerClass><tr>";
        foreach($headers as $h)
            $table .= "<td></td>";
        $table .= "</tr></tfoot><tbody $this->bodyId $this->bodyClass>";

        //BODY
        $count = 0;
        foreach ($data as $row) {
            if ($this->zebra) {
                $count++;
                if ($count%2 == 1)
                    $this->zebraClass = "class=\"zebraOn\"";
                else
                    $this->zebraClass = "class=\"zebraOff\"";
            }

            $table .= "<tr $this->zebraClass>";
            foreach ($row as $col)
                $table .= "<td>$col</td>";
            $table .= "</tr>";
        }        

        $table .= "</tbody></table>";

        echo $table;
    }
}

?>
