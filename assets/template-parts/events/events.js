(function() {
    var numberperload = 5;
    var lastload = 0;
    var countEvents = 0;
var ipeEvents = "https://events.iu.edu/live/json/events/group_id/330";
$.getJSON(ipeEvents, function(data){
    $.each(data, function(index, field){
        var day = data[index].date.substr(6,8);
        var month = data[index].date.substr(0,3);
        if(day < 10){
            day = "0" + day;
        }

        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
        var fullMonth = new Date(data[index].date_utc);

        var fullDay = data[index].date_utc.substr(8,2);
        var fullYear = data[index].date_utc.substr(0,4);
        var dateTime = data[index].date_time;
    
        var dayOfWeek = new Date(data[index].date_utc).toLocaleDateString('en', {weekday:'long'});
        var title = data[index].title;
        var location = data[index].location_title;

        if(location === null){
            location = "";
        }
        var url = data[index].url;
        var lat = data[index].location_latitude;
        var long = data[index].location_longitude;

        var d = new Date();
        var todayMonth = d.getMonth()+1;
        var todayDay = d.getDate();

        var output = d.getFullYear() + '-' +
                    ((''+todayMonth).length<2 ? '0' : '') + todayMonth + '-' +
                    ((''+todayDay).length<2 ? '0' : '') + todayDay;

        var start = new Date(data[index].date_utc);
        var startMonth = start.getMonth()+1;
        if(startMonth < 10){
            startMonth = "0" + startMonth;
        }
        var startDay = start.getDate();
        if(startDay < 10){
            startDay = "0" + startDay;
        }
        var startDate = start.getFullYear() + '-' + startMonth + '-' + startDay;
   

        var eventBody = '<div class="card-media">'+
                            '<div class="card-media-body">'+
                                '<div class="date">'+ 
                                    '<span class="day">'+day +'</span>'+
                                    '<span class="month">'+ month +'</span>'+
                                '</div>'+
                                '<div class="card-media-main">'+
                                    '<div class="card-media-top">'+
                                        '<span class="subtitle">'+ dayOfWeek + ', ' + monthNames[fullMonth.getMonth()] + " " +  fullDay + " " + fullYear + " " + dateTime +'</span>'+
                                    '</div>'+
                                    '<span class="card-media-heading"><a href='+ url +' target="_blank" ><h5>'+ title +'</h5></a></span>'+
                                    '<span class="card-media-bottom"><a href="https://www.google.com/maps/search/?api=1&query='+lat+','+long+'" target="_blank">'+ location +'</a></span>'+
                                '</div>'+                                
                            '</div></div>';
        
            if(startDate >= output){                
                $(".events").append(eventBody);
                countEvents++;
            }
        
    }); //each 

    if(countEvents == 0){
        $('.card-media').append("<h2>Sorry, No Events</h2>");
    }

    hideEvents();
    hideButton();
    
    $('#btn-load-more').click(function(){
        var categoryList = $('.card-media');
        var upToLoad = lastload + numberperload;

        for(var i = lastload; i < upToLoad; i++){
            $(categoryList[i]).show();
            hideButton();
        }
    });

    function hideButton(){
        if($('.card-media').length == $('.card-media:visible').length){
            $('#btn-load-more').hide();
        }
    }


    function hideEvents(){
        var categoryList = $('.card-media');
        var totalCat = categoryList.length;

        if(totalCat > numberperload){
            lastload = numberperload;
            for(var i = numberperload; i < totalCat; i++){
                $(categoryList[i]).hide();
            }
        }
    }
    
})

})();

