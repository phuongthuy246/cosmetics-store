const tintuc__ngay = document.querySelectorAll(".tintuc__ngay")
tintuc__ngay.forEach((element) => {
	const date = new Date(element.innerHTML)
	element.innerHTML = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`
})

