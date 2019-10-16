$('#button-a').on('click',function(e){ 
	e.preventDefault(); 
	swal({
  title: "Good job!",
  text: "You can order the item now!",
  icon: "success",
  timer:5000,
});
});