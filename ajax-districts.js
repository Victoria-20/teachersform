 $(document).ready(function() {
     var districtId, countyId, subCountyId, parishId, villageId;

     // $('#countySelect,#subCountySelect,#parishSelect,#villageSelect').prop('disabled',true);
     // DISTRICTS FILTER
     $('#districtSelect').on('change', function() {
         Id = $(this).val();
         $('#countySelect,#subCountySelect,#parishSelect,#villageSelect').html('');
         $('#countySelect,#subCountySelect,#parishSelect,#villageSelect').trigger("chosen:updated");
         rePopulateSelectedItem("counties", Id);
     });
     // COUNTIES FILTER
     $('#countySelect').on('change', function() {
         Id = $(this).val();
         rePopulateSelectedItem("subcounties", Id);
     });
     // PARISH FILTER
     $('#subCountySelect').on('change', function() {
         Id = $(this).val();
         rePopulateSelectedItem("parishes", Id);
     });
     // VILLAGE FILTER
     $('#parishSelect').on('change', function() {
         Id = $(this).val();
         rePopulateSelectedItem("villages", Id);
     });
     //
     /*
      * function : RE-PopulateSelectedItem(@param1,@param2)
      */
     function rePopulateSelectedItem(fetchType, fetchId) {
         //console.log(fetchType+' - '+fetchId);
         if (fetchType == "counties") {
             $.get("ajax-districts.php?id=" + fetchId + "&type=counties", function(data, status) {
                 $('#countySelect').html(data);
                 $("#countySelect").trigger("chosen:updated");
             });
         } else if (fetchType == "subcounties") {
             $.get("ajax-districts.php?id=" + fetchId + "&type=subcounties", function(data, status) {
                 $('#subCountySelect').html(data);
                 $("#subCountySelect").trigger("chosen:updated");
             });
         } else if (fetchType == "parishes") {

             $.get("ajax-districts.php?id=" + fetchId + "&type=parishes", function(data, status) {
                 $('#parishSelect').html(data);
                 $("#parishSelect").trigger("chosen:updated");

             });
         } else if (fetchType == "villages") {

             $.get("ajax-districts.php?id=" + fetchId + "&type=villages", function(data, status) {
                 $('#villageSelect').html(data);
                 $("#villageSelect").trigger("chosen:updated");
             });
         }
     }

 });