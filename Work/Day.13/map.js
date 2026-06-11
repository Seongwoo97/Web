// 지도 객체를 담을 변수
var map = null;

// 생성된 마커들을 저장할 배열
var markers = [];

// 마커 이미지 설정
var imageSrc = './image/ms21.png',
    imageSize = new kakao.maps.Size(50, 50),
    imageOption = {
        offset: new kakao.maps.Point(27, 35)
    };

var markerImage = new kakao.maps.MarkerImage(
    imageSrc,
    imageSize,
    imageOption
);

// 현재 위치로 지도 이동 및 생성
function moveToMyLocation(lat, lng){

    var container = document.getElementById('map');

    // 숨겨진 지도 보이기
    container.style.display = "block";

    var position = new kakao.maps.LatLng(lat, lng);

    // 최초 1회만 지도 생성
    if(map == null){

        var options = {
            center: position,
            level: 2
        };

        map = new kakao.maps.Map(container, options);

        // 지도 클릭 시 마커 추가
        kakao.maps.event.addListener(map, 'click', function(mouseEvent){

            addMarker(mouseEvent.latLng);

        });

    }else{

        // 이미 지도가 있으면 중심만 이동
        map.setCenter(position);

    }

    // 현재 위치 표시
    addMarker(position);
}

// 마커 생성 함수
function addMarker(position){

    var marker = new kakao.maps.Marker({
        position: position,
        image: markerImage
    });

    marker.setMap(map);

    markers.push(marker);

    // 마커 클릭 시 삭제
    kakao.maps.event.addListener(marker, 'click', function(){

        marker.setMap(null);

        var index = markers.indexOf(marker);

        if(index !== -1){
            markers.splice(index, 1);
        }

    });

}

// 마커 전체 표시
function showMarkers(){

    for(var i=0; i<markers.length; i++){

        markers[i].setMap(map);

    }

}

// 마커 전체 숨김
function hideMarkers(){

    for(var i=0; i<markers.length; i++){

        markers[i].setMap(null);

    }

}