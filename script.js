var addCarModal = document.getElementById('add_car_modal')
var addCar = document.getElementById('add_car_btn')
var editCar = document.getElementsByClassName('edit_car_btn')
var deleteCar = document.getElementsByClassName('delete_car_btn')
var crossBtn=document.getElementById('btn-close')
var addEditCarForm=document.getElementById('add-edit-car')

var vehicle_model=document.getElementById('vehicle_model')
var vehicle_number=document.getElementById('vehicle_number')
var no_of_seats=document.getElementById('no_of_seats')
var rent_per_day=document.getElementById('rent_per_day')
function clear_fields(){
    vehicle_model.value="";
    vehicle_number.value="";
    no_of_seats.value="";
    rent_per_day.value="";
}
if(addCar)
addCar.addEventListener("click",function(e){
    e.preventDefault();
    document.getElementById("add_car_title").innerHTML="Add Car";
    clear_fields();
    addEditCarForm.action="/backend/agency/add_car.php";
    document.querySelector('#add-edit-car #car_id').value="";
    addCarModal.style.display="block";

})
crossBtn.addEventListener("click",function(){
    addCarModal.style.display="none";
})
function show_modal(){
    addCarModal.style.display="block";
}
for(var i=0;i<editCar.length;i++){
    editCar[i].addEventListener("click",function(e){
        e.preventDefault();
        document.getElementById("add_car_title").innerHTML="Edit Car";
        clear_fields();
        vehicle_model.value=(this).getAttribute('data-model');
        vehicle_number.value=(this).getAttribute('data-number');
        no_of_seats.value=(this).getAttribute('data-seats');
        rent_per_day.value=(this).getAttribute('data-rent');
        document.querySelector('#add-edit-car #car_id').value=(this).getAttribute('data-carId');
        addEditCarForm.action="/backend/agency/update_car.php";
        show_modal();
    })
}
