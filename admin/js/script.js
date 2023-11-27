
const handleCollapse = () => {
	const main = document.querySelector("#main")
	const admincp_menu = document.querySelector(".admincp_menu")
	if (admincp_menu.style.left === "0px") {
		admincp_menu.style.left = "-100%"
		main.style.width = "100%"
		main.style.marginLeft = "16px"
	} else {
		admincp_menu.style.left = "0px"
		main.style.width = "80%"
		main.style.marginLeft = "0px"
	}
}

