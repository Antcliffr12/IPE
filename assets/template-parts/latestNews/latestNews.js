jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    var jsonFlag = true;
    var numberperload = 2;
    var lastload = 0;
    var eventList = null;

    function callJSON(){

      var jsonData = null;

      $.ajax({
        type: 'GET',
        url: 'https://ipe.iu.edu/wp-json/wp/v2/posts?&_embed&page=1',
        data: { id: "id"},
        dataType: 'json',
        async: false,
        success: function(data){
          jsonData = data;
        
        }
      });


      return (jsonData) ? jsonData : [];

    }

    showAllEvents();

    function showAllEvents(){
      eventList = callJSON();

      eventList = eventList.slice(4);

      var countEvents = 0;
      $.each(eventList, function(i, val){
        showEvent(eventList[i]);
        countEvents++;
      });

      if(countEvents === 0){
        $('.button-wrap ').hide();
      }

      hideEvents();
      hideButton();
    }


    function showEvent(eventObject){

      var title = eventObject['title']['rendered'];
      var permalink = eventObject['link'];
      var author = eventObject['_embedded']['author'][0]['name'];
      var image = eventObject['_embedded']['wp:featuredmedia'][0]['source_url'];
      var excerpt = eventObject['excerpt']['rendered'];
      var trimmed = excerpt.substr(0,100);
      var date = eventObject['date'];
      var d = new Date(date);
      const month = d.toLocaleString('default', { month: 'long' });
      var day = date.substr(8,2);
      var year = date.substr(0,4);



      var html = '<div class="col-md-6">'+
              '<article class="card">'+
              '<div class="card_holder">'+
                  '<a href='+permalink+' title='+title+'>'+
                    ' <div class="image-wrap">'+
                    '<img src='+image+' class="card-img-top">'+
                      '</div>'+
                      '<div class="card-body">'+
                          '<h4 class="card-title">'+title+'</h4>'+
                        '<p class="card-text">'+author+ ' | ' + month + ' ' + day + ' ' + ' ' + year + '</p>'+
                          '<p class="card-excerpt">'+trimmed+ '</p>'+
                    '</div>'+
                '</a>'+
              '</div>'+
          '</article>';

      $('.card-row').append(html);

    }


    function hideEvents(){
      var list = $('.col-md-6');
      var total = list.length;

      if(total > numberperload){
        lastload = numberperload;
        for(var i = numberperload; i < total; i++){
          $(list[i]).hide();
        }
      }
    }

    $('#load-more').click(function(){
        var FullList = $('.col-md-6');

        var upToLoad = lastload + numberperload;

        for(var i = lastload; i < upToLoad; i++){
          $(FullList[i]).show();
          hideButton();
        }
        lastload = upToLoad;

    });

    function hideButton(){
      if($('.col-md-6').length == $('.col-md-6:visible').length){
        $('.button-wrap').hide();
      }
    }

       
    });


    
   
