<template>
	<div>
		<form @submit.prevent="submitForm">
			<center>
				<h2>Tambah Data Siswa</h2>
				<table>
					<tr>
						<th>NIS</th>
						<td></td>
						<td><input type="text" v-model="siswa.nis"></td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<td></td>
						<td><input type="text" v-model="siswa.nama_lengkap"></td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td></td>
						<td>
							<select v-model="siswa.jenis_kelamin">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td></td>
						<td><textarea v-model="siswa.alamat"></textarea></td>
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
		name: 'SiswaForm',
		data() {
			return {
				siswa: {
					id: null,
					nis: '',
					nama_lengkap: '',
					jenis_kelamin: '',
					alamat: ''
				}
			}
		},
		mounted() {
			let id = this.$route.params.id

			if (id) {
				api.get('/siswa/' + id).then(res =>{
					this.siswa = res.data.result
				})
			}
		},
		methods: {
			submitForm() {
				let data = this.siswa
				let url = 'siswa'

				if (this.siswa.id) {
					url += '/' + this.siswa.id
				}

				api.post(url, data).then(res => {
					if (res.data.status === 'success') {
						this.$router.push('/siswa')
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