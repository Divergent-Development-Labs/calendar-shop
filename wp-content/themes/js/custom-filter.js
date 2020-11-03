(function($) {

    /*
    *  new_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */
    
    function new_map( $el ) {
        
        // var
        var $markers = $el.find('.marker');
        
        
        // vars
        var args = {
            zoom		: 14,
            center		: new google.maps.LatLng(0, 0),
            mapTypeId	: google.maps.MapTypeId.ROADMAP
        };
        
        
        // create map	        	
        var map = new google.maps.Map( $el[0], args);
        
        
        // add a markers reference
        map.markers = [];
        
        var infoWindow = new google.maps.InfoWindow();
        
        // add markers
        $markers.each(function(){
            
            add_marker( $(this), map, infoWindow );
            
        });
        
        
        // center map
        center_map( map );
        
        
        // return
        return map;
        
    }
    
    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$marker (jQuery element)
    *  @param	map (Google Map object)
    *  @return	n/a
    */
    
    function add_marker( $marker, map, infowindow ) {
    
        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    
        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map
        });
    
        // add to array
        map.markers.push( marker );
    
        var last_ref = null;
    
        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            /*var infowindow = new google.maps.InfoWindow({
                content		: $marker.html()
            });*/
    
    
            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'mouseover', function() {
                infowindow.close();
                infowindow.setContent($marker.html());
                infowindow.open( map, marker );
                last_ref = marker;
            });
            
            /*marker.addListener('mouseout', function() {
                infowindow.close();
            });*/
            
            marker.addListener('click', function() {
                infowindow.open( map, marker );
            });
        }
    
    }
    
    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	map (Google Map object)
    *  @return	n/a
    */
    
    function center_map( map ) {
    
        // vars
        var bounds = new google.maps.LatLngBounds();
    
        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){
    
            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
    
            bounds.extend( latlng );
    
        });
    
        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }
    
    }
    
    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */
    // global var
    var map = null;
        
            
    jQuery(document).ready(function($) {	
        
        $(document).on('change','.filter-location', function (e) { 
            
            var checked = $(this).val();
            var proj_name = $(this).attr('data-pName');
            var lati = $(this).attr('data-lat');
            lati = parseFloat(lati);
            var lon = $(this).attr('data-long');
            lon = parseFloat(lon);
             //mapd =  document.getElementById('map').style.display = 'none';
             map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(lati,lon),
              zoom: 15
            }); 
            jQuery.ajax({
                url : ajax_object.ajaxurl,
                type : 'post',
                dataType: 'json',
                data : {
                    action : 'ajax_action_filter',
                    lat : lati,
                    lon : lon,
                    search : checked,
                    map : 1,
                }, 
                success : function( response ) {
                    var markersArray = [];
                    var response_new = JSON.parse(response);
                    var bounds = new google.maps.LatLngBounds;
                    var origin1 = {lat: lati, lng: lon};
                    /*Google API's Icons*/
                    var originIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|000000';
                    var destinationIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|000000';
                    /* var originIcon = {
                      url: 'https://www.calendarshop.co.in/wp-content/themes/calendarshop2018/images/10_-_Map_marker-512.png',
                      // This marker is 20 pixels wide by 32 pixels high.
                      size: new google.maps.Size(20, 32),
                      // The origin for this image is (0, 0).
                      origin: new google.maps.Point(0, 0),
                      // The anchor for this image is the base of the flagpole at (0, 32).
                      anchor: new google.maps.Point(0, 32)
                    }; */
                    var destination_data = new Array();
                    var address = new Array();
                    var name = new Array();
                    var icon = new Array();
                    var vicinity = new Array();
                    /* var len;
                    console.log(checked);
                    if(checked == 'train_station'){
                        len = 2;
                    }else{
                        len = 2;
                    } */
                    for (var i=0; i < response_new.results.length; i++) {
                        var latitude = response_new.results[i].geometry.location.lat;
                        var longitude = response_new.results[i].geometry.location.lng;
                        destination_data[i] = {
                            "lat" : latitude,
                            "lng" : longitude
                        };
                        name[i] =  response_new.results[i].name;
                        icon[i] =  response_new.results[i].icon;
                        vicinity[i] =  response_new.results[i].vicinity;
                    }
                                    
                    var geocoder = new google.maps.Geocoder; 
                    var service = new google.maps.DistanceMatrixService;
                    
                    service.getDistanceMatrix({
                          origins: [origin1],
                          destinations: destination_data,
                          travelMode: 'DRIVING',
                          unitSystem: google.maps.UnitSystem.METRIC,
                          avoidHighways: false,
                          avoidTolls: false
                    }, function(response, status) {
                      if (status !== 'OK') {
                            console.log('Something went wrong ' + status);
                      } else {					
                        var originList = response.originAddresses;
                        var destinationList = response.destinationAddresses;
                        var infowindow = new google.maps.InfoWindow();
                        deleteMarkers(markersArray);
                        for (var i = 0; i < originList.length; i++) {
                          var results = response.rows[i].elements;
                          var origin_addr = originList[i];					
                            var marker_o = new google.maps.Marker({
                                position:origin1,
                                map: map,
                                icon: 'https://www.calendarshop.co.in/wp-content/themes/calendarshop2018/images/iconfinder_map-marker_2990871.png',
                                title: proj_name,
                            });
                            google.maps.event.addListener(marker_o, 'click', (function(marker_o, i) {
                                 return function() {
                                     infowindow.setContent('<b>'+proj_name + '</b><br>' + origin_addr);
                                     infowindow.open(map, marker_o);
                                 }
                            })(marker, i));
                            for (var j = 0; j < results.length; j++) {
                              var addr = vicinity[j];	
                                var marker = new google.maps.Marker({
                                    position: destination_data[j],
                                    map: map,
                                    icon: {url:icon[j], scaledSize: new google.maps.Size(40, 40)},
                                    title: name[j]+' '+results[j].distance.text +' '+results[j].duration.text,
                                });
                                 
                                 var directionsService = new google.maps.DirectionsService;
                                 var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
                                 google.maps.event.addListener(marker, 'click', (function(marker,j) {								  
                                     return function() {								 
                                         var start = origin1;
                                          var end = destination_data[j];
                                          var request = {
                                            origin: start,
                                            destination: end,
                                            travelMode: 'DRIVING'
                                          };
                                         directionsService.route(request, function(result, status) {
                                            if (status == 'OK') {
                                            //directionsDisplay.setPanel(null);
                                              directionsDisplay.setDirections(result);
                                            }
                                          });
                                         infowindow.setContent('<b>'+name[j]+'</b><br>'+vicinity[j]+'<br><br> <img src="https://www.calendarshop.co.in/wp-content/themes/calendarshop2018/images/565346-maps-and-transport.png" height="18px" width="19px"> '+results[j].distance.text +'<br><img src="https://www.calendarshop.co.in/wp-content/themes/calendarshop2018/images/41.png" height="20px" width="19px"> '+results[j].duration.text);
                                         infowindow.open(map, marker);
                                     }
                                })(marker, j));
                            }
                        }
                      }
                    });
                    $('#map').css('display','block');
                    $('#map-filte').css('display','none');
                    $('html, body').animate({
                        scrollTop: $("#map").offset().top
                    }, 500);
                    function deleteMarkers(markersArray) {
                    for (var i = 0; i < markersArray.length; i++) {
                      markersArray[i].setMap(null);
                    }
                    markersArray = [];
                  }
                 },
                error : function( response ) {
                    return;			
                }
            });
        });
        /*Demo Map functionality ends*/
        
        
        /*default search on enter key press*/
        $('.search-input').keypress(function (e) {
            var key = e.which;
            if(key == 13){
                $('.search-submit').click();
                return false;  
            }
        });  
         $(document).on('shown.bs.tab', function (e) { 	
            if($('.nav-link.t_map_view').hasClass('t_map_view')){
                $('.acf-map').each(function(){
                    // create map
                    map = new_map( $(this) );
                    
                });
                $('.nav-link.t_map_view').removeClass('t_map_view');
            }
        });
        /* 
        $(document).on('shown.bs.tab', function (e) { 	
            if($('.nav-link.t_map_view').hasClass('t_map_view')){
                $('.acf-map').each(function(){
                    // create map
                    map = new_map( $(this) );
                    
                });
                $('.nav-link.t_map_view').removeClass('t_map_view');
            }
        }); */
        
        jQuery('.search-input').on('input', function() {
            var search_for = $('.search-input').val(); 
            if(search_for.length > 1){
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        search_for : search_for
                    }, 
                    beforeSend: function( xhr ) {
                        $( ".search-result" ).replaceWith( '<div class="search-result">Searching...</div>' );
                    },
                    success : function( response ) {
                        $( ".search-result" ).css( 'display','block' );
                        $( ".search-result" ).replaceWith( ''+response+'' );
                        $( ".search-result" ).css( 'display','block' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
        });
        jQuery('#search-filter').on('click',function(e){
            var city = $('select#location option:selected').val();
            var type = jQuery('#type').val();
            var bedroomconf = jQuery('#bedroomconf').val();
            if(city == 0){
                $('.search-error').css('display','block');
                $('.search-error').text('Please do select Location!');
            }else{			
                var redirect_url = 'search-filter/?city='+city+'&type='+type+'&bedroomconf='+bedroomconf+''; 			
                window.location = redirect_url;			
            }
        });
        jQuery('.filter-project').on('change', function() {
            if($(this).hasClass('city-change')){
                var main_name = $(this).val(); 
                $('.main_name').val(main_name);			
            }else{
                var main_name1 = $('.main_name1').val(); 
                var city_slug = $('.city-change').val();	
                if(city_slug != null){
                    if(city_slug == 0){
                        $('.main_name').val(main_name1);		
                    }else{				
                        $('.main_name').val(city_slug);
                    }
                }
            }
            var main_name = $(".main_name").val(); 
            var main_type = $(".main_type").val(); 
            var filter_type1 = $(".filter_type1").val(); 
            var filter_type2 = $(".filter_type2").val(); 
            var filter_type3 = $(".filter_type3").val(); 
            var project_filter1 = $(".project_filter1").val(); 
            var project_filter2 = $(".project_filter2").val(); 
            var project_filter3 = $(".project_filter3").val(); 
            if(project_filter1 != 0 && project_filter2 != 0 && project_filter3 != 0){
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter1 : project_filter1,
                        filter_type1 : filter_type1,
                        project_filter2 : project_filter2,
                        filter_type2 : filter_type2,
                        project_filter3 : project_filter3,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 != 0 && project_filter2 != 0 && project_filter3 == 0){
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter1 : project_filter1,
                        project_filter2 : project_filter2,
                        project_filter3_null : project_filter3,
                        filter_type1 : filter_type1,
                        filter_type2 : filter_type2,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(  project_filter1 != 0 && project_filter2 == 0 && project_filter3 != 0){
                //alert('project_filter2_only');
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter2_null : project_filter2,
                        project_filter1 : project_filter1,
                        project_filter3 : project_filter3,
                        filter_type1 : filter_type1,
                        filter_type2 : filter_type2,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 == 0 && project_filter2 != 0 && project_filter3 != 0 ){
                //alert('both');
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter1_null : project_filter1,
                        project_filter2 : project_filter2,
                        project_filter3 : project_filter3,
                        filter_type1 : filter_type1,
                        filter_type2 : filter_type2,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 != 0 && project_filter2 == 0  && project_filter3 == 0 ){
                
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter1_only : project_filter1,
                        filter_type1 : filter_type1,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 == 0 && project_filter2 != 0 && project_filter3 == 0){	
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter2_only : project_filter2,
                        filter_type2 : filter_type2,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 == 0 && project_filter2 == 0 && project_filter3 != 0){
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter3_only : project_filter3,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );	
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
            if(project_filter1 == 0 && project_filter2 == 0 && project_filter3 == 0){			
                jQuery.ajax({
                    url : ajax_object.ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ajax_action_filter',
                        project_filter1_null : project_filter1,
                        project_filter2_null : project_filter2,
                        project_filter3_null : project_filter3,
                        filter_type1 : filter_type1,
                        filter_type2 : filter_type2,
                        filter_type3 : filter_type3,
                        project_listing_filter : true,
                        main_type : main_type,
                        main_name : main_name,
                    },
                    success : function( response ) {
                        $( "#result" ).replaceWith( ''+response+'' );
                        return;			
                    },
                    error : function( response ) {
                        return;			
                    }
                });
            }
        });
    });
    
    })(jQuery);
    
    