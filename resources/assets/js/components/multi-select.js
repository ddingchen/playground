import $ from 'jquery'

export default class MultiSelect {
	constructor(elem) {
		this.$container = $(elem)
		this.addListener()
	}
	addListener() {
		let that = this
		this.$container.find('select').change(function() {
			var dataId = $(this).val()
			// 清空所有下级选项
			$(this).nextAll().each((i, elem) => {
				that.clearSelector($(elem)).show()
			})
			// 更新子级列表
			var nextField = $(this).next().attr('name')
			that.initSelector(nextField, dataId)
		})
	}

	initSelector(field = 'province', parentDataId = 1, selectedDataId) {
		this.requestData(field, parentDataId, data => {
			if(data.length == 0) {
				this.$container.find(`select[name="${field}"]`).hide()
					.nextAll().hide()
				return
			}
			this.renderSelector(data, field).val(selectedDataId)
		})
	}

	setSelector(provinceId, cityId, districtId, streetId) {
		this.initSelector('province', 1, provinceId)

		if(!cityId) { return }
		this.initSelector('city', provinceId, cityId)

		if(!districtId) { return }
		this.initSelector('district', cityId, districtId)

		streetId ? this.initSelector('street', districtId, streetId) : this.initSelector('street', districtId)
	}

	requestData(dataField, parentDataId, renderWith) {
		$.get('/nation', { parent: parentDataId }, response => {
			var data = response.map(item => {
				return { val: item.id, txt: item[dataField] }
			})
			if(typeof(renderWith) === 'function') {
				renderWith(data)	
			}
		}, 'json')
	}

	renderSelector(data, fieldName) {
		var $select = this.$container.find(`select[name="${fieldName}"]`)
		this.clearSelector($select)
		data.forEach(({val, txt}) => {
			$select.append($('<option>').val(val).text(txt))
		})
		return $select
	}

	clearSelector($select) {
		$select.find(`option:not([placeholder])`).remove()
		return $select
	}
}