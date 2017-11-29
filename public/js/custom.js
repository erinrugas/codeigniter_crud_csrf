function getData() 
{
    $("#users-info").dataTable({
        "ajax": base_url + 'information',
        "deferRender": true,
        "stateSave": true,
        "ordering": false
    });
}

$(document).ready(function() {
  getData();
})