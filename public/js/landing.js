const btnSidebar = document.getElementById('btnSidebar');
const sidebar = document.querySelector('aside');
const menus = document.querySelectorAll('aside a');
console.log('script js terpanggil')
AOS.init({
	// Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
	  offset: 120, // offset (in px) from the original trigger point
	  delay: 0, // values from 0 to 3000, with step 50ms
	  duration: 1000, // values from 0 to 3000, with step 50ms
	  easing: 'ease-out-back', // default easing for AOS animations
});

const handleSidebar = () => {
	if(!btnSidebar.classList.contains('active')) {
		btnSidebar.innerHTML = `<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
		</svg>`;

		btnSidebar.classList.add('active');
		sidebar.classList.add('appear');
	} else {
		btnSidebar.innerHTML = `<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		</svg>`;

		btnSidebar.classList.remove('active');
		sidebar.classList.remove('appear');
	}
} 

btnSidebar.addEventListener('click' , (e) => {
	handleSidebar();
})

menus.forEach(btn => {
	btn.addEventListener('click' , () => {
		handleSidebar();
	})
})

window.addEventListener('scroll' , () => {
	if(window.pageYOffset > 150 ) {
		document.querySelector('nav').classList.add('active');
		btnSidebar.classList.add('show')
	} else {
		document.querySelector('nav').classList.remove('active');
		btnSidebar.classList.remove('show')
	}
})




const faq = document.querySelectorAll('#accordion-faq .accordion-item');
faq.forEach(item => {
	let head = item.firstElementChild;
	let body = item.lastElementChild;
	head.addEventListener('click' , () => {
		body.classList.toggle('hidden');
	})
})