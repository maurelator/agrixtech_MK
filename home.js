function showProjects() {
	let proj = document.querySelector('#Projects');
	let farm = document.querySelector('#Farmers');
	let plant = document.querySelector('#Plants');
	proj.className = 'tab-pane fade show active';
	farm.className = 'tab-pane fade';
	plant.className = 'tab-pane fade';
}
function showFarmers() {
	let proj = document.querySelector('#Projects');
	let farm = document.querySelector('#Farmers');
	let plant = document.querySelector('#Plants');
	proj.className = 'tab-pane fade';
	farm.className = 'tab-pane fade show active';
	plant.className = 'tab-pane fade';
}
function showPlants() {
	let proj = document.querySelector('#Projects');
	let farm = document.querySelector('#Farmers');
	let plant = document.querySelector('#Plants');
	proj.className = 'tab-pane fade';
	farm.className = 'tab-pane fade';
	plant.className = 'tab-pane fade show active';
}