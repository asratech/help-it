
<footer class="main-footer hidden-print">
  <div class="pull-right hidden-xs">
    <b>Version</b> v1.1.9 - build 3124 (master)
    <a target="_blank" class="btn btn-default btn-xs" href="http://zdienos.com" rel="noopener">User's Manual</a>
    <a target="_blank" class="btn btn-default btn-xs" href="https://zdienos.com/support" rel="noopener">Report a Bug</a>
  </div>
  <a target="_blank" href="https://zdienos.com" rel="noopener">Help-IT</a> is a personal
    project, made with <i class="fa fa-heart" style="color: #a94442; font-size: 10px"></i> by <a href="https://twitter.com/zdienos" rel="noopener">@zdienos</a>.
</footer>
</div> <!-- wrapper -->

<!-- all js scripts
khusus buat fullcalendar, karena versi ini bisa resize, kalo versi baru ndak support jquery 1.11
-->
<script src="<?php echo base_url();?>assets/zed/js/jquery.min.js"></script>

<script src='<?php echo base_url();?>assets/zed/js/moment.min.js'></script>
<script src="<?php echo base_url();?>assets/zed/js/fullcalendar.min.js"></script>
<script src='<?php echo base_url();?>assets/zed/js/bootstrap-colorpicker.min.js'></script>

<script src="<?php echo base_url();?>assets/zed/js/bootstrapValidator.min.js"></script>

<!-- all scripts -->


<!-- script adminLTE bawaan -->



<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>

<!-- sweetalert -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- end of scripts -->


<!-- fullcalendar -->
<script>
$(document).ready(function(){

    <?php $lokasi= base_url(); $nama = $this->session->userdata('nama_user');?>
    var base_url= "<?php echo $lokasi ?>"; // Here i define the base_url
    var nama= "<?php echo $nama ?>";

    <?php $disable_edit = base_url('jadwal');?>
    <?php $enable_edit = base_url('jadwal/edit');?>
    var enable_edit = "<?php echo $enable_edit ?>";
    var disable_edit = "<?php echo $disable_edit ?>";

    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event


    $('#external-events .external-event').each(function() {

      var vtext=$.trim($(this).text());

      if (vtext!='Off'){
        if (vtext!='PH/Cuti'){
          nama=vtext;
        }
      }


       // store data so the calendar knows to render an event upon drop
       $(this).data('event', {
         title: nama, // use the element's text as the event title
         description: vtext, // use the element's text as the event title
         stick: true, // maintain when user navigates (see docs on the renderEvent method)
         backgroundColor: $(this).data('color'),
         borderColor: $(this).data('color'),
         color: $(this).data('color'),

       });

       // make the event draggable using jQuery UI
       $(this).draggable({
         zIndex: 999,
         revert: true,      // will cause the event to go back to its
         revertDuration: 0  //  original position after the drag
       });

      });

    //$('#color').colorpicker(); // Colopicker


    // Fullcalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
             right: 'today'
        },
        // Get all events stored in database
        eventLimit: true, // allow "more" link when too many events
        events: base_url+'jadwal/getEvents',
        droppable: true, // this allows things to be dropped onto the calendar

        fixedWeekCount: false,
        selectable: true,
        selectHelper: true,
        editable: true, // Make the event resizable true
            select: function(start, end) {

                $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                 // Open modal to add event
            modal({
                // Available buttons when adding
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-success', // Buttons class
                        label: 'Tambah' // Buttons label
                    }
                },
                title: 'Tambah Item' // Modal title
            });
            },

            eventReceive: function(event){

                 start = event.start.format('YYYY-MM-DD HH:mm:ss');
                 $.post(base_url+'jadwal/addEvent', {
                     title: event.title,
                     description: event.description,
                     color: event.backgroundColor,
                     start: start,

                 }, function(result){
                       //swal('Jadwal sudah ditambah', {icon: "success", button:false, timer:1500});
                       location.reload();
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
                swal('Jadwal sudah diubah', {icon: "success", button:false, timer:1500});


            });



          },
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
                swal('Jadwal sudah diubah', {icon: "success", button:false, timer:1500});

            });
            },

        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){

            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
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
                title: 'Ubah Item "' + calEvent.title + '"',
                event: calEvent
            });
        }

    });

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

                //end: $('#end').val()
            }, function(result){
                  $('.modal').modal('hide');

                  $('#calendar').fullCalendar("refetchEvents");
                  swal('Jadwal sudah ditambah', {icon: "success", button:false, timer:1500});
            });
        }
    });


    // Handle click on Update Button
    $('.modal').on('click', '#update-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post(base_url+'jadwal/updateEvent', {
                id: currentEvent._id,
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
      swal({
          title: "Anda yakin ingin menghapus data?",
          icon: "warning",
          buttons: ["Tidak", "Ya"],
          dangerMode: true,
      })
      .then((hapus) => {
        if (hapus) {
          $.get(base_url+'jadwal/deleteEvent?id=' + currentEvent._id,
          function(result){
              $('.modal').modal('hide');

              $('#calendar').fullCalendar("refetchEvents");
                swal('Jadwal sudah dihapus', {icon: "success", button:false, timer:1500});
          });
        }
      });

    });


    function hide_notify()
    {
        setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                }, 2000);
    }


    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            swal('Judul dan deskripsi harus terisi', {icon: "warning", button:false, timer:1500});
            return false;
        }
        return true;
    }



    var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

    //Function to convert rgb color to hex format
    function rgb2hex(rgb) {
     rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
     return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    function hex(x) {
      return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
     }

    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    //var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#color').css({ 'background-color': currColor, 'border-color': currColor })
      $('#color').val(rgb2hex(currColor))
    });

    $('#drop-remove')[0].checked= true;
    $('#drop-remove').change(function() {
        if(this.checked) {
           window.location.href= enable_edit
          }
        else {

           window.location.href=disable_edit
         } //else
     }); //drop-remove function


});



</script>
