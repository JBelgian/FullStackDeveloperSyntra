import  _  from  'lodash'
import  './style.css'

const  numbers:  number[] = [34, 12, 78, 3, 45, 21]
const  output:  HTMLElement  =  document.getElementById('output')!

// Sort ascending _.sortBy only sort ascending
const  ascending:  number[] =  _.sortBy(numbers)
output.innerHTML  +=  `<p>Ascending: ${ascending.join(', ')}</p>`

// Sort descending
const  descending:  number[] =  _.orderBy(numbers, [], ['desc'])
output.innerHTML  +=  `<p>Descending: ${descending.join(', ')}</p>`
