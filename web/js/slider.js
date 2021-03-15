let slides = document.querySelectorAll('.slide_main')

let a_slide = 1

function slider(){
	slides.forEach(slide => {
		if (slide.classList.contains('active__slide')){
			slide.classList.remove('active__slide')
		}
	})

	slides[a_slide].classList.add('active__slide')
	a_slide++

	if (a_slide >= slides.length) a_slide = 0
}

if (slides.length > 0){

	let t = setInterval(slider, 5000)

}

$('.send_comment').on('click', function(e){
	e.preventDefault()
	if ($('.comment').val() ===  ''){
		return false
	}
	else {
		$.ajax({
			url: '/comment/comment',
			method: "POST",
			data: {
				comment: $('.comment').val(),
				comment_id: $('#comment-id').val(),
			},
			success: function(res){
				Swal.fire({
				  position: 'top-end',
				  icon: 'success',
				  title: 'Комментарий добавлен',
				  showConfirmButton: false,
				  timer: 1500
				})
				$('.comments__inner').html(res)
				$('.comment').val('')
			}
		})
	}
})

// $('#patient_login').on('click', function(e){

// 	e.preventDefault()

// 	$.ajax({
// 		url: '/patient/auto',
// 		method: "POST",
// 		data: {
// 			email: $("#patient-email").val(),
// 			pas: $("#patient-password").val()
// 		},
// 		success: function(res){
// 			console.log(res)
// 		}
// 	})

// })