import $ from 'jquery'
import MultiSelect from './components/multi-select'

var ms = new MultiSelect('.multi-select')
ms.initSelector()
// ms.setSelector(875, 889, 893)

var ms2 = new MultiSelect('.multi-select2')
// ms2.initSelector()
ms2.setSelector(875, 889, 893)

