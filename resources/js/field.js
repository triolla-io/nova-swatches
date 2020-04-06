import Clipboard from 'v-clipboard'
import "vue-swatches/dist/vue-swatches.min.css";
import Swatches from "vue-swatches";

Nova.booting((Vue, router, store) => {
  Vue.use(Clipboard)

  Vue.component('index-nova-swatches', require('./components/IndexField'))
  Vue.component('detail-nova-swatches', require('./components/DetailField'))
  Vue.component('form-nova-swatches', require('./components/FormField'))
  Vue.component('swatches', Swatches)
})
