
	// // Select/Deselect checkboxe
	// var checkbox = $('table tbody input[type="checkbox"]');
	// $("#selectAll").click(function(){
	// 	if(this.checked){
	// 		checkbox.each(function(){
	// 			this.checked = true;                        
	// 		});
	// 	} else{
	// 		checkbox.each(function(){
	// 			this.checked = false;                        
	// 		});
	// 	} 
	// });
	// checkbox.click(function(){
	// 	if(!this.checked){
	// 		$("#selectAll").prop("checked", false);
	// 	}
	// });

	// // Filter table rows based on searched term
    // $(document).ready(function(){
    //     // Activate tooltips
    //     $('[data-toggle="tooltip"]').tooltip();
        
    //     // Filter table rows based on searched term
    //     $("#search").on("keyup", function() {
    //         var term = $(this).val().toLowerCase();
    //         $("table tbody tr").each(function(){
    //             $row = $(this);
    //             var name = $row.find("td:nth-child(2)").text().toLowerCase();
    //             console.log(name);
    //             if(name.search(term) < 0){                
    //                 $row.hide();
    //             } else{
    //                 $row.show();
    //             }
    //         });
    //     });
    // });


    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('householdForm');
      const editBtn = document.getElementById('editBtn');
      const saveBtn = document.getElementById('saveBtn');
      const formElements = form.querySelectorAll('input, select, textarea');
      const modal = document.getElementById('showMemberModal');

      const showButton = document.getElementById('showButton');

    // Get close button element
      const closeButton = document.getElementById('closeModal');


      showButton.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default anchor behavior
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
      modal.style.display = 'none';
  });

  // Close modal if user clicks outside the modal content
  window.addEventListener('click', (e) => {
      if (e.target === modal) {
          modal.style.display = 'none';
      }
  });

    

      editBtn.addEventListener('click', function() {
          formElements.forEach(element => element.disabled = false);
          editBtn.style.display = 'none';
          saveBtn.style.display = 'inline-block';
      });

    //   saveBtn.addEventListener('click', function() {
    //     form.submit(); // Submit the form
    //     formElements.forEach(element => element.disabled = true); // Disable fields after submission
    // });
    
  });


	// switch panel 
	$(document).ready(function() {
		// When the view icon is clicked
		$('.view').click(function() {
			$('.table-responsive').hide();
			$('.viewInformation').show();
		});
	  
		// When the back button is clicked
		$('#back').click(function() {
			$('.table-responsive').show();
			$('.viewInformation').hide();
		});
	  });


	function selectBarangay(barangay) {
		document.getElementById('selected-barangay').value = barangay;
		document.getElementById('barangay-form').submit();
	}


	'use strict';

const Tabs = {
  init() {
    this.$tabs = $('ul.nav-tabs');
    this.bindEvents();
    this.checkHash();
  },

  bindEvents() {
    // When clicking a tab, show the respective content
    this.$tabs.on('click', 'a', this.tabClicked.bind(this));

    // Handle animation end to reset animation states
    $('.content-pane').on('transitionend webkitTransitionEnd', this.animationEnd.bind(this));
  },

  tabClicked(e) {
    e.preventDefault();
    const tab = $(e.target).attr('href');
    this.toggleTab(tab);
  },

  checkHash() {
    if (window.location.hash) {
      this.toggleTab(window.location.hash);
    }
  },

  toggleTab(tab) {
    const $paneToShow = $(tab);
    const $paneToHide = $(tab).closest('.container').find('.content-pane.is-active');

    // Hide the currently active pane
    $paneToHide.removeClass('is-active');

    // Show the new pane
    $paneToShow.addClass('is-active');

    // Activate the clicked tab
    this.$tabs.find('li.active').removeClass('active');
    this.$tabs.find(`a[href="${tab}"]`).closest('li').addClass('active');
  },

  animationEnd(e) {
    $(e.target).removeClass('is-animating is-exiting');
  }
};

$(document).ready(() => {
  Tabs.init();
});

	

	  
	  
	  