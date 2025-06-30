const menuAside = document.querySelectorAll('#menu-aside a');
const dirname = 'http://localhost/AyamPenyet/';
const jadwalOperasi = document.querySelector('.jadwal-operasi');
const jamDigital = document.querySelector('.jam-digital');

const btnProfile = document.getElementById('btn-profile');
btnProfile.addEventListener('click', function(e) {
	e.preventDefault();

	let sidebarProfile = this.nextElementSibling;
	sidebarProfile.classList.toggle('d-none');
});

const aside = document.querySelector('aside');
const section = document.querySelector('section');
const main = document.querySelector('main');
const toggleMenu = document.querySelector('#toggle-menu');
toggleMenu.addEventListener('click', function() {
	if (aside.classList.contains('col-2') && section.classList.contains('col-10')) {
		aside.classList.replace('col-2','col-4');
		section.classList.replace('col-10','col-8');
		this.querySelector('i').classList.replace('bx-chevrons-right','bx-chevrons-left');
		menuAside.forEach((el) => {
			el.querySelector('p').classList.remove('d-none');
			el.classList.remove('justify-content-center');
			el.querySelector('i').classList.replace('fs-3','fs-5');	
		});
	} else {
		aside.classList.replace('col-4','col-2');
		section.classList.replace('col-8','col-10');
		this.querySelector('i').classList.replace('bx-chevrons-left','bx-chevrons-right');
		menuAside.forEach((el) => {
			el.querySelector('p').classList.add('d-none');
			el.classList.add('justify-content-center');
			el.querySelector('i').classList.replace('fs-5','fs-3');	
		});
	}
	
});


window.addEventListener('click', function(e) {
	let element = e.target.parentElement;
	if (element.classList.contains('hideSidebar') || e.target.parentElement.id == 'btn-profile' || e.target.classList.contains('hideSidebar')) {

	} else {
		btnProfile.nextElementSibling.classList.add('d-none');
	}

});

window.addEventListener('load', function() {
	resize();
});

window.addEventListener('resize', function() {
	resize();
})




function jam() {
	let date = new Date();
	let jam = formatDate(date.getHours());
	let menit = formatDate(date.getMinutes());
	let detik = formatDate(date.getSeconds());

	if (`${jam}${menit}` >= 1829) {
		jadwalOperasi.innerHTML = 'Tutup';
		jadwalOperasi.classList.replace('bg-success','bg-danger');
	} else {
		jadwalOperasi.innerHTML = 'Buka';
		jadwalOperasi.classList.replace('bg-danger','bg-success');
	}

	
	// jamDigital.innerHTML = `${jam}:${menit}:${detik}`;


}

function formatDate(date) {
	return (date > 9) ? date : `0${date}`;
}


function resize() {
	const headerAside = document.querySelector('#header-aside');

	if (window.innerWidth > 992) {
		menuAside.forEach((el) => {
			el.querySelector('p').classList.remove('d-none');
			el.classList.remove('justify-content-center');
			el.querySelector('i').classList.replace('fs-3','fs-5');	
			toggleMenu.classList.add('d-none');
		});
	} else if(window.innerWidth <= 992) {
		menuAside.forEach((el) => {
			el.querySelector('p').classList.add('d-none');
			el.classList.add('justify-content-center');
			el.querySelector('i').classList.replace('fs-5','fs-3');
			toggleMenu.classList.remove('d-none');
		});
	}
	
}
