$(function(){

	let links = document.querySelectorAll('#link')
	links.forEach(link => {
		link.addEventListener('click', function(e){
			e.preventDefault()
			e.target.classList.toggle('collapsed')
			let id = e.target.getAttribute('data-id')
			let bodId = document.querySelector('#'+id)
			bodId.classList.toggle('in')
		})
	})

	let banner = document.querySelector('.banner')

	function sizeBanner(){
		let a = window.innerHeight
		banner.style.height = a - 220 + 'px'
		console.log(a - 220)
	}

	sizeBanner()

	window.addEventListener('resize', function(){
		sizeBanner()
	})

	$('.banner__flag').on('click', function(){
		var sc = $(this).attr("href"),
	        dn = $(sc).offset().top;
	    /*
	    * sc - в переменную заносим информацию о том, к какому блоку надо перейти
	    * dn - определяем положение блока на странице
	    */
	    
	    $('html, body').animate({scrollTop: dn}, 1000);
	})

	$('.quest').on('click', function(e){
		e.preventDefault()
		e.target.classList.toggle('question__title-rotate')
		let answer = e.target.parentNode.parentNode.querySelector('.question__answer')
		$(answer).slideToggle()
	})

})