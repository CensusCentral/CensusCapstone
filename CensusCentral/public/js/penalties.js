const ctx1 = document.getElementById('populationChart');

new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
    datasets: [{
      label: '# of Informal Settlers Families',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    reponsive: true
  }
});

// hiding 
$(document).ready(function() {
  // When the view icon is clicked
  $('.view').click(function() {
      $('.table-responsive').hide();
      $('.contentPenaltiesView').show();
  });

  // When the back button is clicked
  $('#backBtn').click(function() {
      $('.table-responsive').show();
      $('.contentPenaltiesView').hide();
  });
});

// Select/Deselect checkboxe
var checkbox = $('table tbody input[type="checkbox"]');
$("#selectAll").click(function(){
  if(this.checked){
    checkbox.each(function(){
      this.checked = true;                        
    });
  } else{
    checkbox.each(function(){
      this.checked = false;                        
    });
  } 
});
checkbox.click(function(){
  if(!this.checked){
    $("#selectAll").prop("checked", false);
  }
});