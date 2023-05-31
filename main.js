const todoButton = document.querySelector('#todoButton');
const todoNameText = document.querySelector('#todoNameText');
const todoName = document.querySelectorAll('.todoName');

todoButton.addEventListener('click', todoInsert);

todoName.forEach((todo) => {
	todo.addEventListener('click', async () => {
		await fetch(`todoCountViews.php?views=${todo.dataset['views']}&id=${todo.dataset['id']}`)
			.then((res) => res.text())
			.then((data) => {
				if (data != false) {
					window.location.reload();
				}
			});
	});
});

async function todoInsert() {
	const todoNameTextValue = todoNameText.value;

	if (todoNameTextValue !== '') {
		await fetch(`todoInsert.php?todoName=${todoNameTextValue}`)
			.then((res) => res.text())
			.then((data) => {
				window.location.reload();
			});
	}
}
