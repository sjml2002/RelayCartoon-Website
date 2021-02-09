<?php
    //대부분 model 디렉토리와 연관있는 요청
    //model폴더 페이지 이름과 데이터(JSON으로 받기) 각종 http method로 받기
    //데이터가 없거나(일부 요청만) 페이지 이름 일치하는 것이 없는 경우 예외처리
    //페이지 이동의 이름은 pageURL로
    //데이터는 웬만하면 아래 4가지 이름으로 하기
    //1.추가시킬 데이터: createData
    //2.수정시킬 데이터: updateData
    //3.삭제시킬 데이터: deleteData
    //4.조회할 데이터: searchData
    //5.그 외 데이터: 각자 기능을 알 수 있을만한 이름

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
        else if($_GET['pageURL'] === "~~~~~~"){ //연결 요청 적기
            //연결 요청에 따라 데이터 받고 보내기
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