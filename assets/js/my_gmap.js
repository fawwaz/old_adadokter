        var map = new GMaps({
        el: '#gmap',
        lat: <?=$where_works['latitude'];?>,
        lng: <?=$where_works['longitude'];?>,
        zoom: 12,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        panControl : true,
      });

     map.addMarker({
      lat: <?=$where_works['latitude'];?>,
      lng: <?=$where_works['longitude'];?>,
      title: 'Lokasi Dokter'
     });

     // $(document).ready(function(){
      var gmap_wrap   = $('#gmap_wrapper');
      var gmap        = $('#gmap');
      var gmap_wrap_h = gmap_wrap.height();
      var gmap_h      = gmap.height();
      // $('#on_map_button').click(function(){
      //   gmap_wrap.animate({height:gmap_wrap_h+400},200);
      //   gmap.animate({height:gmap_h+400},200);
      // });

     $('#on_map_button').click(function(){
        if(gmap.hasClass('large_height')){
          gmap_wrap.animate({height:gmap_wrap_h+300},200,function(){
            gmap_wrap.removeClass('large_height');
          });
          gmap.animate({height:gmap_h+350},200,function(){
            gmap.removeClass('large_height');
            map.refresh();
          });
        }else{
          gmap_wrap.animate({height:gmap_wrap_h},200,function(){
            gmap_wrap.addClass('large_height');
          });
          gmap.animate({height:gmap_h},200,function(){
            gmap.addClass('large_height');
            map.refresh();
          });
        }
      });