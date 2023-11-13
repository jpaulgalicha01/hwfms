<?php
class insert extends controller{
    public function pre_reg($pre_name,$pre_reg_post){
        $stmt = $this->preReg($pre_name,$pre_reg_post);
        return $stmt;
    }
}
?>