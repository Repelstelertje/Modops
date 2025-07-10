/*!
* Start Bootstrap - Creative v7.0.6 (https://startbootstrap.com/theme/creative)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarNavDropdown .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: '#portfolio a.portfolio-box'
    });

    // Call earnings calculator once the page has been parsed
    computeLoon();
});

// Calculator
function computeLoon() {
var berichten     = document.getElementById('berichten').value;
var werkDagen     = document.getElementById('werkDagen').value;
// var avondBonus    = document.getElementById('avondBonus').value;
var weekendBonus  = document.getElementById('weekendBonus').value;
var weekTotaal    = berichten * werkDagen;

var tarief      = 0.10;
  if (weekTotaal >= 201) tarief = 0.11;
  if (weekTotaal >= 401) tarief = 0.12;
  if (weekTotaal >= 601) tarief = 0.13;
  if (weekTotaal >= 801) tarief = 0.14;
  if (weekTotaal >= 1001) tarief = 0.15;

// var bonusAvond = ((avondBonus / 100) * weekTotaal) * 0.02;
var bonusWeekend = ((weekendBonus / 100) * weekTotaal) * 0.01;
var totaalWeek = weekTotaal * tarief;

//var bonus = (avondBonus + weekendBonus) / 100;
//var bonusTarief = bonus * 0.01;

//tarief += bonusTarief;

console.log('totaalWeek: ' + totaalWeek);

var minuten = berichten * 0.75;
var totaalUren = Math.floor(minuten/60);
var remainingMinutes = minuten - (totaalUren * 60);

var werkUren = remainingMinutes + 'm';
  if (totaalUren > 0) {
    werkUren = totaalUren + 'u' + werkUren;
  }

var weekVerdiensten = parseFloat(totaalWeek + bonusWeekend).toFixed(2);
var maandVerdiensten = parseFloat(((totaalWeek + bonusWeekend) * 52) / 12).toFixed(2);

document.getElementById('werkUren').innerHTML = werkUren;
document.getElementById('weekVerdiensten').innerHTML = weekVerdiensten;
document.getElementById('maandVerdiensten').innerHTML = maandVerdiensten;
};