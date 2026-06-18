console.log(window.kakao);

var img1= document.getElementById('profile_select')
var in1= document.getElementById('in1')

// 이미지 요소 클릭 이벤트 처리
        img1.addEventListener('click', function(){
            in1.click(); //숨겨져있던 input 요소를 강제로 클릭!
        });

        // 파일 탐색기의 이미지 선택이 완료되면..
        in1.addEventListener('change', function(){
            // 선택한 파일 객체 취득
            var file= in1.files[0]; //여러개 선택할 수 있어서 배열임. 그래서 첫번째

            if(file){
                var fr= new FileReader();
                fr.onload=function(){
                    img1.src= fr.result;
                }
                fr.readAsDataURL(file);
            }
        })

        //         // 전송 버튼 클릭 이벤트 처리
        // btn1.addEventListener('click', function(){

        //     // 선택한 파일 정보 받기
        //     var file= in1.files[0];

        //     // 파일이 없으면 전송하지 않도록
        //     if(file){
        //         // 파일과 문자열 데이터를 서버로 동시에 전달하려면.. 특별한 택배상자가 필요하다
        //         var formData= new FormData();
        //         formData.append('img', file) // 택배상자에 파일 넣기            - 식별자와 파일
        //         formData.append('nickname', in2.value) // 문자열도 다르지 않음  - 식별자와 값


        //         // 닉네임 + 프로필사진을 서버로 전송 (ajax)
        //         fetch('./profileUpload.php', {
        //             method: 'POST',
        //             body:formData
        //         })
        //         .then(function(res){return res.text()})
        //         .then(function(text){alert(text)})

        //     }else{
        //         alert('사진 변경이 없어서 전송 안 함!')
        //     }

        // })


var mapContainer = document.getElementById('map');

var mapOption = {
    center: new kakao.maps.LatLng(
        37.566826,
        126.9786567
    ),
    level: 3
};

var map = new kakao.maps.Map(
    mapContainer,
    mapOption
);

var ps = new kakao.maps.services.Places();

document
.getElementById('search_btn')
.addEventListener('click', searchRestaurant);

function searchRestaurant(){

    let keyword =
    document.getElementById('restaurant_name').value;

    ps.keywordSearch(
        keyword,
        placesSearchCB
    );

}

function placesSearchCB(
    data,
    status
){

    if(
        status ===
        kakao.maps.services.Status.OK
    ){

        let place = data[0];

        let moveLatLon =
        new kakao.maps.LatLng(
            place.y,
            place.x
        );

        map.setCenter(moveLatLon);

        let marker =
        new kakao.maps.Marker({
            map: map,
            position: moveLatLon
        });

    }

}


