<?php

class insert extends controller{
    public function addAppointment($type_appointment,$subject_appointment,$date_appointment,$time_appointment,$message_appointment){
        $stmt= $this->add_appointment($type_appointment,$subject_appointment,$date_appointment,$time_appointment,$message_appointment);
        return $stmt;
    }

    public function votingBrgy($elect_year,$name_candidate){
        $stmt = $this->voting_brgy($elect_year,$name_candidate);
        return $stmt;
    }

    public function votingOrg($elect_year,$pres,$vpres,$sec,$tre,$pio,$bm,$audi,$rep){
        $stmt = $this->voting_org($elect_year,$pres,$vpres,$sec,$tre,$pio,$bm,$audi,$rep);
        return $stmt;
    }
}

?>