<?php

class fetch extends controller{
    public function fetchNotice(){
        $stmt = $this->fetch_notice();
        return $stmt;
    }
    public function fetchService(){
        $stmt = $this->fetch_service();
        return $stmt;
    }

    public function fetchServiceBrgy(){
        $stmt = $this->fetch_service_brgy();
        return $stmt;
    }

    public function viewNotice($value){
        $stmt = $this->view_notice($value);
        if($stmt){
            return $stmt;
        }
        else{
            header("Location: index.php");
        }
    }
        public function viewService($value){
        $stmt = $this->view_service($value);
        if($stmt){
            return $stmt;
        }
        else{
            header("Location: index.php");
        }
    }

    public function fetchNoticeBrgy(){
        $stmt = $this->fetch_notice_brgy();
        return $stmt;
    }

    public function checkPreElect(){
        $stmt = $this->check_pre_elect();

        return $stmt;
    }

    public function checkingAlready(){
        $stmt = $this->checking_already();
        return $stmt;
    }

}
?>