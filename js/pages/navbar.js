//Manually opening dropdown menu
function changeDropdownState() {
    const dropdown = document.getElementById("dropdownMenuButton");
    const dropdown_wrap = document.getElementById("dropdown_wrap");
    if(dropdown.getAttribute("aria-expanded") === "true"){
        dropdown.setAttribute("aria-expanded", "false");
        dropdown_wrap.setAttribute("class", "dropdown");
    }
    else {
        dropdown.setAttribute("aria-expanded", "true");
        dropdown_wrap.setAttribute("class", "dropdown open");
    }
}
function setLanguage(lang){
    document.cookie = "lang="+lang;
    location.reload();
}
// Toggle Navigation menu
function toggleNav() {
    document.getElementById("mainMenu").classList.toggle("openMenu");
    document.getElementById("burger").classList.toggle("openMenu");
}
// Get modals
const showroom = document.getElementById("showRoomModal");
const plancall = document.getElementById("planCallModal");

// Buttons for modal
const showRoomBtn1 = document.getElementById("showModalD");
const showRoomBtn2 = document.getElementById("showModalM");
const planCallBtn1 = document.getElementById("planModalD");
const planCallBtn2 = document.getElementById("planModalM");

// Close Btns
const spanShowRoom = document.getElementsByClassName("closeRoom")[0];
const spanPlanCall = document.getElementsByClassName("closePlan")[0];

// Booleans
var showIsOpen = false;
var callIsOpen = false;

function closeModal(modal){
    const modalIsCall = modal === plancall;
    if(modalIsCall)
        callIsOpen = false;
    else
        showIsOpen = false;
    modal.style.display = "none";
}

function openModal(modal){
    const modalIsCall = modal === plancall;
    closeModal(modalIsCall ? showroom : plancall);
    if(modalIsCall)
        callIsOpen = true;
    else
        showIsOpen = true;
    modal.style.display = "block";
}

// Close
spanShowRoom.onclick = () => closeModal(showroom);
spanPlanCall.onclick = () => closeModal(plancall);

// Open
showRoomBtn1.onclick = showRoomBtn2.onclick = () => openModal(showroom);
planCallBtn1.onclick = planCallBtn2.onclick = () => openModal(plancall);

var myDate = document.getElementById("showroom_date");
myDate.valueAsDate = new Date();

// When the user clicks anywhere outside of the modal, close it
window.onclick = event =>{
    if (event.target === showroom || event.target === plancall) {
        closeModal(showroom);
        closeModal(plancall);
    }
};

