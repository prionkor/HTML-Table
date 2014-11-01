<?php

namespace Sisir\TwitterBootstrap;

class Table{
    public $columns = array();

    public function __construct(){

    }

    public function table_start($attr = array()){
        echo $this->get_table_start($attr);
    }

    public  function get_table_start($attr){
        $attr = $this->get_attr($attr);
        return "<table $attr>";
    }

    public function thead(){
        echo $this->get_thead();
    }

    public function get_thead(){
        $columns = $this->columns;

        $thead = "
        <thead>
            <tr>";

        foreach($columns as $col){
            $thead .= "<th>$col</th>";
        }

        $thead .= "
            </tr>
        </thead>";

        return $thead;
    }

    public function tbody_start(){
        echo $this->get_tbody_start();
    }

    public function get_tbody_start(){
        return '<tbody>';
    }

    public function tr($rowData, $attr = array()){
        echo $this->get_tr($rowData, $attr);
    }

    public function get_tr($rowData, $attr = array()){

        $tr_attr = $this->get_attr($attr);

        $tr = "
            <tr $tr_attr>";

        foreach($rowData as $td){

            if(!is_array($td)){
                $tr .= "<td>$td</td>";
            }else{

                if(!isset($td['attr'])){
                    $attr = '';
                }else{
                    $attr = $this->get_attr($td['attr']);
                }

                if(!isset($td['value'])){
                    $value = '';
                }else{
                    $value = $td['value'];
                }

                $tr .= "<td $attr>$value</td>";
            }
        }

        $tr .= "
            </tr>";

        return $tr;

    }

    public function tbody_end(){
        echo $this->get_tbody_end();
    }

    public function get_tbody_end(){
        return '</tbody>';
    }

    public function tfoot($col_data){
        echo $this->get_tfoot($col_data);
    }

    public function get_tfoot($col_data){

        $tfoot = "
        <tfoot>
            <tr>";

        foreach($col_data as $col){
            if(!is_array($col)){
                $tfoot .= "<th>$col</th>";
            }else{
                $attr = $col['attr'];
                $attr = $this->get_attr($attr);
                $tfoot .= "<th $attr>{$col['value']}</th>";
            }
        }

        $tfoot .= "
            </tr>
        </tfoot>";

        return $tfoot;

    }

    protected function get_attr($attr){

        if(empty($attr) || !is_array($attr))
            return '';

        $attribute = '';
        foreach($attr as $attr_name => $attr_value){
            $attribute .= "$attr_name=\"$attr_value\" ";
        }

        return trim($attribute);
    }

    public function table_end(){
        echo $this->get_table_end();
    }

    public  function get_table_end(){
        return "</table>";
    }
}