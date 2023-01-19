require('./bootstrap');
import { Toast, Modal, Alert, Popover } from 'bootstrap';
import { format } from 'date-fns/fp'
window.dateformat = format;
/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new Popover(popoverTriggerEl)
})

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll('.alert')
alertList.forEach(function (alert) {
    new Alert(alert)
});

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler');
const sidePanel = document.getElementById('app-sidepanel');
const sidePanelDrop = document.getElementById('sidepanel-drop');
const sidePanelClose = document.getElementById('sidepanel-close');

window.addEventListener('load', function () {
    responsiveSidePanel();
});

window.addEventListener('resize', function () {
    responsiveSidePanel();
});


function responsiveSidePanel() {
    let w = window.innerWidth;
    if (w >= 1200) {
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');

    } else {
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');
    }
};

sidePanelToggler.addEventListener('click', () => {
    if (sidePanel.classList.contains('sidepanel-visible')) {
        sidePanel.classList.remove('sidepanel-visible');
        sidePanel.classList.add('sidepanel-hidden');

    } else {
        sidePanel.classList.remove('sidepanel-hidden');
        sidePanel.classList.add('sidepanel-visible');
    }
});

sidePanelClose.addEventListener('click', (e) => {
    e.preventDefault();
    sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
    sidePanelToggler.click();
});
