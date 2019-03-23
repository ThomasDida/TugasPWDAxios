<template>
	<div>
		<form @submit.prevent="submitForm">
			<center>
				<h2>Tambah Data Kelas</h2>
				<table>
					<tr>
						<th>Nama Kelas</th>
						<th></th>
						<th><input type="text" v-model="kelas.nama_kelas"></th>
					</tr>
					<tr>
						<th>Jurusan</th>
						<th></th>
						<th><input type="text" v-model="kelas.jurusan"></th>
					</tr>
				</table>
				<button type="submit">Save</button>
			</center>
		</form>
	</div>
</template>

<script>
	import { api } from '@/helper/api'

	export default {
		name: 'kelasForm',
		data() {
			return {
				kelas: {
					id: null,
					nama_kelas: '',
					jurusan: ''
				}
			}
		},
		mounted() {
			let id = this.$route.params.id

			if (id) {
				api.get('/kelas/' + id).then(res =>{
					this.kelas = res.data.result
				})
			}
		},
		methods: {
			submitForm() {
				let data = this.kelas
				let url = 'kelas'

				if (this.kelas.id) {
					url += '/' + this.kelas.id
				}

				api.post(url, data).then(res => {
					if (res.data.status === 'success') {
						this.$router.push('/kelas')
					} else {
						console.log(res.data.message)
					}
				}).catch(err =>{
					console.log(err)
				})
			}
		}
	}
</script>