(function ($) {
	$(document).ready(function () {
		$('#itemForm').submit(function (event) {
			event.preventDefault()
			var form = document.getElementById('itemForm')
			var data = new FormData(form)
			fetch("/main/add", {
				method: 'POST',
				body: data,
			}).then(function (res) {
				return res.json()
			}).then(function (data) {
				var html = data.map(function (item) {
					return `
			<div class="row" id="js-item">
			<input id="js-itemId" type="hidden" value="${item.id}"/>
<div class="col mb-5">
<h4>${item.title}</h4>
</div>
<div class="col" id="js-status-label">
<h4>${item.status}</h4>
</div>
<div class="col">
<h4>${item.category_id}</h4>
</div>
<div class="col">
<h4>${item.time}</h4>
</div>
${item.status != 'bought' ? '<div class="col">\n<button id="js-status" type="button" class="btn btn-success">✔</button>\n</div>' : ''}
<div class="col">
<button id="js-delete" type="button" class="btn btn-danger">x</button>
</div>
</div>
			`
				})
				$('#items').html(html)
			}).catch(console.error)
		})
	})
	$(document).on('click', '#js-status', function () {
		var item = $(this).closest('.row')
		var itemId = item.find('#js-itemId').val();
		fetch("/main/update/" + itemId).then(function (res) {
			return res.json()
		}).then(function (data) {
			item.find("#js-status-label > h4").text(data.status)
			item.find("#js-status").parent('.col').remove()
		}).catch(console.error)
	});

	$(document).on('click', '#js-delete', function () {
		var item = $(this).closest('.row')
		var itemId = item.find('#js-itemId').val();
		fetch("/main/delete/" + itemId).then(function (res) {
			return res.json()
		}).then(function () {
			item.remove()
		}).catch(console.error)
	});

	$(document).on('click', '#js-status-category', function () {
		var category = $(this).closest('.row')
		var categoryId = category.find('#js-categoryId').val();
		fetch("/category/update/" + categoryId).then(function (res) {
			return res.json()
		}).then(function (data) {
			category.find("#js-status-label > h4").text(data.status)
			category.find("#js-status-category").parent('.col').remove()
		}).catch(console.error)
	});

	$(document).on('click', '#js-delete-category', function () {
		var category = $(this).closest('.row')
		var categoryId = category.find('#js-categoryId').val();
		fetch("/category/delete/" + categoryId).then(function (res) {
			return res.json()
		}).then(function () {
			category.remove()
		}).catch(console.error)
	});

	window.onload = function () {
		const filterItem = document.querySelectorAll('#js-item');
		document.querySelector('#js-category-filter').addEventListener('change', event => {
			if (event.target.tagName !== 'SELECT') return false;

			let filterClass = event.target.value;
			filterItem.forEach(elem => {
				if (filterClass === 'all') {
					elem.classList.remove('hide');
				} else {
					elem.classList.remove('hide');
					if (!elem.classList.contains(filterClass)) {
						elem.classList.add('hide');
					}
				}
			})
		});
		document.querySelector('#js-status-filter').addEventListener('change', event => {
			if (event.target.tagName !== 'SELECT') return false;

			let filterClass = event.target.value;
			filterItem.forEach(elem => {
				if (filterClass === 'all') {
					elem.classList.remove('hide');
				} else {
					elem.classList.remove('hide');
					if (!elem.classList.contains(filterClass)) {
						elem.classList.add('hide');
					}
				}
			})
		});
	}
}(jQuery))
