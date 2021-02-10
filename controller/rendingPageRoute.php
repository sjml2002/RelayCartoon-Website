<?php
    //단순 view디렉토리의 pageRoute 요청
    //view폴더의 페이지 이름 GET요청으로 받아서 이름 검사 후 페이지 반환
    //ex) GET['pageURL'] == "signupMain.html"
        // => header?('Location: view/signupMain.html')
    //페이지 이름이 일치하는 것이 없는 경우 예외 처리

    function requestValidation() {
        if(!isset($_GET['pageURL'])) {
            return false;
        }
        else if(empty($_GET['pageURL'])){
            return false;
        }
        else{
            return true;
        }
    }

    try{
        if(requestValidation() === false){
            throw new exception("400");
        }
        else if($_GET['pageURL'] === "loginMain"){ //연결 요청 적기 (else if문)
            header('Location: /view/loginMain.html');
        }
        else{
            throw new exception("404");
        }
    } catch(exception $e){
        if($e->getMessage() === "400"){
            header('Location: /view/errorPage/400BadRequest.html');
        }
        else if($e->getMessage() === "404"){
            header('Location: /view/errorPage/404NotFound.html');
        }
        else if($e->getMessage() === "500"){
            header('Location: /view/errorPage/500InternalServerError.html');
            //header location으로 500error페이지 만들어서 랜딩
        }
    }
?>