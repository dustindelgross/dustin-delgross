const cursorHex = document.querySelector('.hex');
const moveCursor = (e) => {
	
	const mouseY = e.clientY;
	const mouseX = e.clientX;

	cursorHex.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0)`;
	
	
}

window.addEventListener('mousemove', moveCursor);