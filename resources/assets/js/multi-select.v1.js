import $ from 'jquery'

$('.multi-select>select').change(function() {
	var dataId = $(this).val()
	// 清空所有下级选项
	$(this).nextAll().each((i, elem) => {
		clearSelector($(elem)).show()
	})
	// 更新子级列表
	var nextField = $(this).next().attr('name')
	initSelector(nextField, dataId)
})

initSelector()
// setSelector(875, 889, 893)




function initSelector(field = 'province', parentDataId = 1, selectedDataId) {
	requestData(field, parentDataId, function(data) {
		if(data.length == 0) {
			$(`select[name="${field}"]`).hide()
				.nextAll().hide()
			return
		}
		renderSelector(data, field).val(selectedDataId)
	})
}

function setSelector(provinceId, cityId, districtId, streetId) {
	initSelector('province', 1, provinceId)

	if(!cityId) { return }
	initSelector('city', provinceId, cityId)

	if(!districtId) { return }
	initSelector('district', cityId, districtId)

	streetId ? initSelector('street', districtId, streetId) : initSelector('street', districtId)
}

function requestData(dataField, parentDataId, renderWith) {
	$.get('/nation', { parent: parentDataId }, response => {
		var data = response.map(item => {
			return { val: item.id, txt: item[dataField] }
		})
		console.log(data)
		if(typeof(renderWith) === 'function') {
			renderWith(data)	
		}
	}, 'json')
}

function renderSelector(data, fieldName) {
	var $select = $(`select[name="${fieldName}"]`)
	clearSelector($select)
	data.forEach(({val, txt}) => {
		$select.append($('<option>').val(val).text(txt))
	})
	return $select
}

function clearSelector($select) {
	$select.find(`option:not([placeholder])`).remove()
	return $select
}