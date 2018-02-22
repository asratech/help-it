<script>

<?php $lokasi= base_url(); $nama = $this->session->userdata('nama_user');?>
var base_url= "<?php echo $lokasi ?>"; // Here i define the base_url
var nama= "<?php echo $nama ?>";

$('#external-events .external-event').each(function() {

 // store data so the calendar knows to render an event upon drop
 $(this).data('event', {
   title: nama, // use the element's text as the event title
   description: $.trim($(this).text()), // use the element's text as the event title
   stick: true, // maintain when user navigates (see docs on the renderEvent method)
   backgroundColor: $(this).data('color'),
   borderColor: $(this).data('color'),

 });

 // make the event draggable using jQuery UI
 $(this).draggable({
   zIndex: 999,
   revert: true,      // will cause the event to go back to its
   revertDuration: 0  //  original position after the drag
 });

});



// page is now ready, initialize the calendar...

$('#calendar').fullCalendar({
 // put your options and callbacks here
 header: {
   left: 'prev,next,today',
   center: 'title',
   right: ','
 },

 events: base_url+'jadwal/getEvents',
 allDay: true,
 displayEventTime : false,
 navLinks: true, // can click day/week names to navigate views
 editable: true,
 droppable: true, // this allows things to be dropped onto the calendar
 eventLimit: true, // allow "more" link when too many events

 selectable: true,
 selectHelper: true,

    eventReceive: function(event){
         start = event.start.format('YYYY-MM-DD HH:mm:ss');
         end = start;
         $.post(base_url+'jadwal/addEvent', {
             title: event.title,
             description: '',
             color: event.backgroundColor,
             start: start,
             end: end
         }, function(result){
               swal('Jadwal sudah ditambah', {icon: "success", button:false, timer:1500});
            });
    },
    // Handle Existing Event Click
    eventClick: function(calEvent, jsEvent, view) {
        // Set currentEvent variable according to the event clicked in the calendar
        currentEvent = calEvent;
        // Open modal to edit or delete event
        modal({
            // Available buttons when editing
            buttons: {
                delete: {
                    id: 'delete-event',
                    css: 'btn-danger',
                    label: 'Hapus'
                },
                update: {
                    id: 'update-event',
                    css: 'btn-success',
                    label: 'Ubah'
                }
            },
            title: 'Ubah Jadwal "' + calEvent.title + '"',
            event: calEvent
        });
    },

    // Handle draggable
    eventResize: function(event,dayDelta,minuteDelta,revertFunc) {

                start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }

               $.post(base_url+'jadwal/dragUpdateEvent',{
                id:event.id,
                start : start,
                end :end
            }, function(result){
                swal('Jadwal sudah diupdate', {icon: "success", button:false, timer:1500});

            });
            },
    eventDrop: function(event, delta, revertFunc,start,end) {

           start = event.start.format('YYYY-MM-DD HH:mm:ss');
           if(event.end){
               end = event.end.format('YYYY-MM-DD HH:mm:ss');
           }else{
               end = start;
           }

              $.post(base_url+'jadwal/dragUpdateEvent',{
               id:event.id,
               start : start,
               end :end
           }, function(result){
               swal('Jadwal sudah diupdate', {icon: "success", button:false, timer:1500});


           });



         },


}); //fullCalendar


// Prepares the modal window according to data passed
   function modal(data) {
       // Set modal title
       $('.modal-title').html(data.title);
       // Clear buttons except Cancel
       $('.modal-footer button:not(".btn-default")').remove();
       // Set input values
       $('#title').val(data.event ? data.event.title : '');
       $('#description').val(data.event ? data.event.description : '');
       $('#color').val(data.event ? data.event.color : '#3a87ad');
       // Create Butttons
       $.each(data.buttons, function(index, button){
           $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
       })
       //Show Modal
       $('.modal').modal('show');
   }

   // Handle Click on Add Button
   $('.modal').on('click', '#add-event',  function(e){
       if(validator(['title', 'description'])) {
           $.post(base_url+'jadwal/addEvent', {
               title: $('#title').val(),
               description: $('#description').val(),
               color: $('#color').val(),
               start: $('#start').val(),
               end: $('#end').val()
           }, function(result){
               $('.alert').addClass('alert-success').text('Event added successfuly');
               $('.modal').modal('hide');
               $('#calendar').fullCalendar("refetchEvents");
               hide_notify();
           });
       }
   });


   // Handle click on Update Button
   $('.modal').on('click', '#update-event',  function(e){
       if(validator(['title', 'description'])) {
           $.post(base_url+'jadwal/updateEvent', {
               id: currentEvent.id,
               title: $('#title').val(),
               description: $('#description').val(),
               color: $('#color').val()
           }, function(result){
             $('.modal').modal('hide');
             $('#calendar').fullCalendar("refetchEvents");
             swal('Jadwal sudah diubah', {icon: "success", button:false, timer:1500});

           });
       }
   });



   // Handle Click on Delete Button
   $('.modal').on('click', '#delete-event',  function(e){
      //alert(currentEvent.id);
       $.get(base_url+'jadwal/deleteEvent?id=' + currentEvent.id,
       function(result){
          $('.modal').modal('hide');
          $('#calendar').fullCalendar("refetchEvents");
          swal('Jadwal sudah dihapus', {icon: "success", button:false, timer:1500});
       });
   });


   // Dead Basic Validation For Inputs
   function validator(elements) {
       var errors = 0;
       $.each(elements, function(index, element){
           if($.trim($('#' + element).val()) == '') errors++;
       });
       if(errors) {
           $('.error').html('Please insert title and description');
           return false;
       }
       return true;
   }


</script>
