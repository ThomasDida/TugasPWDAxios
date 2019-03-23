import Vue from 'vue'
import Router from 'vue-router'
import KelasForm from '@/components/KelasForm'
import Kelas from '@/components/Kelas'
import Siswa from '@/components/Siswa'
import SiswaForm from '@/components/SiswaForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/kelas',
      name: 'Kelas',
      component: Kelas
    },
    {
    	path: '/kelas/create',
    	name: 'KelasCreate',
    	component: KelasForm
    },
    {
    	path: '/kelas/:id',
    	name: 'KelasEdit',
    	component: KelasForm
    },
    {
      path: '/siswa',
      name: 'Siswa',
      component: Siswa
    },
    {
      path: '/siswa/create',
      name: 'SiswaCreate',
      component: SiswaForm
    },
    {
      path: '/siswa/:id',
      name: 'SiswaEdit',
      component: SiswaForm
    }
  ]
})
