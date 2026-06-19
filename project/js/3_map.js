const searchBar = document.getElementById('search_bar');
const keywordInput = document.getElementById('keyword');
const resultList = document.getElementById('search_result');

const container = document.getElementById('map');

const startLat = restaurantLat || 37.484170;
const startLng = restaurantLng || 126.929720;

const options = {
    center: new kakao.maps.LatLng(startLat, startLng),
    level: 2
};

const map = new kakao.maps.Map(container, options);

const ps = new kakao.maps.services.Places();

let marker = null;

if(restaurantLat && restaurantLng){
    const position = new kakao.maps.LatLng(restaurantLat, restaurantLng);

    marker = new kakao.maps.Marker({
        map: map,
        position: position
    });

    const infoWindow = new kakao.maps.InfoWindow({
        content: `
            <div style="padding:10px;font-size:14px;line-height:1.5;">
                <strong>${restaurantName}</strong><br>
                ${restaurantAddress}
            </div>
        `
    });

    infoWindow.open(map, marker);

    keywordInput.value = restaurantName;
}

searchBar.addEventListener('submit', function(e){
    e.preventDefault();

    const keyword = keywordInput.value.trim();

    if(keyword === ''){
        alert('검색어를 입력해주세요.');
        return;
    }

    ps.keywordSearch(keyword, placesSearchCB);
});

function placesSearchCB(data, status){
    resultList.innerHTML = '';

    if(status === kakao.maps.services.Status.OK){
        searchBar.classList.add('active');

        data.forEach(function(place){
            const li = document.createElement('li');

            li.innerHTML = `
                <div class="place-name">${place.place_name}</div>
                <div class="place-address">${place.road_address_name || place.address_name}</div>
            `;

            li.addEventListener('click', function(){
                selectPlace(place);
            });

            resultList.appendChild(li);
        });
    }else{
        searchBar.classList.remove('active');
        alert('검색 결과가 없습니다.');
    }
}

function selectPlace(place){
    const position = new kakao.maps.LatLng(place.y, place.x);

    map.setCenter(position);

    if(marker){
        marker.setMap(null);
    }

    marker = new kakao.maps.Marker({
        map: map,
        position: position
    });

    keywordInput.value = place.place_name;

    searchBar.classList.remove('active');
}