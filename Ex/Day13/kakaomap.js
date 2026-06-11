var container= document.getElementById('map');

// 지도의 위치나 줌 레벨 정도를 옵션으로 미리 지정
var options = { 
    center: new kakao.maps.LatLng(37.4868627684081, 126.929458008463),
    level: 3 // 1~25
}

// 지도객체를 만들고 보여주기
var map= new kakao.maps.Map(container, options);

// -----------------------------------------------------------------------------

// 지도를 클릭했을때 클릭한 위치에 마커를 추가하도록 지도에 클릭이벤트를 등록합니다
kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
    // 클릭한 위치에 마커를 표시합니다 
    addMarker(mouseEvent.latLng);             
});

// 지도에 표시된 마커 객체를 가지고 있을 배열입니다
var markers = [];

var imageSrc = './image/ms21.png', // 마커이미지의 주소입니다    
    imageSize = new kakao.maps.Size(50, 50), // 마커이미지의 크기입니다
    imageOption = {offset: new kakao.maps.Point(27, 35)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.
      
// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

// 마커를 생성하고 지도위에 표시하는 함수입니다
function addMarker(position) {
     // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: position,
        image: markerImage
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);
    
    // 생성된 마커를 배열에 추가합니다
    markers.push(marker);

    // ===== 여기 추가 =====
    kakao.maps.event.addListener(marker, 'click', function(){

        // 지도에서 제거
        marker.setMap(null);

        // 배열에서도 제거
        var index = markers.indexOf(marker);

        if(index !== -1){
            markers.splice(index, 1);
        }

    });
    // ====================
}

// "마커 보이기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에 표시하는 함수입니다
function showMarkers() {
    setMarkers(map)    
}

// "마커 감추기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에서 삭제하는 함수입니다
function hideMarkers() {
    setMarkers(null);    
}