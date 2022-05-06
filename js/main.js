(function ($){
$(document).ready(function (){
	$('#itemForm').submit(function (event) {
		event.preventDefault()
		var title = $('#title').val()
		var categoryId = $('#category_id').val()
		var form = document.getElementById('itemForm')
		var data = new FormData(form)
		fetch("/main/add", {
			method: 'POST',
			body: data,
		}).then(function (res){
			return res.json()
		}).then(function (data){
			var html = data.map(function (item) {
				return `
			<div class="row">
<div class="col mb-5">
<h4>${item.title}</h4>
</div>
<div class="col">
<h4>${item.status}</h4>
</div>
<div class="col">
<h4>${item.category_id}</h4>
</div>
<div class="col">
<h4>${item.time}</h4>
</div>
${item.status != 'bought' ? '<div class="col">\n<button type="button" class="btn btn-success">✔</button>\n</div>' : ''}
<div class="col">
<button type="button" class="btn btn-danger">x</button>
</div>
</div>
			`
			})
			$('#items').html(html)
		}).catch(console.error)
	})
})
}(jQuery))
