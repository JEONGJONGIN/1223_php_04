$(document).ready(function(){
  let API_KEY = "AIzaSyBuBYZzrHUkFr85hH0yAM5u88fvhnUtVsU";
  let nextPageToken = '';
  let isLoading = false; // API 요청 중인지 여부를 나타내는 플래그

  $("#search-btn").click(function() {
    // "Search" 버튼을 클릭했을 때 추가적인 동작을 수행할 수 있음  
    $("form").submit(function (e) { 
    e.preventDefault(); 

    let search = $("#search").val() 

    nextPageToken = '';

    videoSearch(API_KEY,search,10, nextPageToken);
    
  });

  $(window).scroll(function () {
    // 스크롤이 페이지 하단에 도달하고 API 요청 중이 아니면 추가 동영상 검색
    if (!isLoading && $(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
      let search = $("#search").val();
      videoSearch(API_KEY, search, 10, nextPageToken);
    }
  });

  function videoSearch(key, search, maxResults, pageToken){

    isLoading = true; // API 요청 시작
 
    $.get("https://www.googleapis.com/youtube/v3/search?key=" + key
    + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + search + "&pageToken=" + pageToken,function(data){
      console.log(data)

      data.items.forEach(item => {
        let video = `
        
        <iframe width="420" height="315" src="http://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>

        `
        $("#videos").append(video);
      });

      nextPageToken = data.nextPageToken || '';

      // YouTube 동영상이 로드된 후에 추가적인 작업 수행
      onVideoLoadComplete();

      isLoading = false; // API 요청 완료

    })

  }

  function onVideoLoadComplete() {
    $(".ytp-right-controls").append("Additional controls or actions");
  }
});

});