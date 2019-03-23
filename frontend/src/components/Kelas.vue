<template>
	<div id="App">
		<router-view/>
		<div>
			<h2>Data Kelas</h2>
			<router-link to="/kelas/create">Tambah</router-link>
		</div>
		<div>
			<center>
				<table>
					<tr>	
						<th>NO</th>
						<th>NAMA KELAS</th>
						<th>JURUSAN</th>
						<th>ACTION</th>
					</tr>
					<tr v-for="(kelas, i) in data_kelas" :key="i">
						<td>{{ i + 1 }}</td>
						<td>{{ kelas.nama_kelas }}</td>
						<td>{{ kelas.jurusan }}</td>
						<td>
							<router-link :to="'/kelas/' + kelas.id">Edit</router-link>
							<button @click="deleteRow(kelas.id)">Delete</button>
						</td>
					</tr>
				</table>
			</center>
		</div>
	</div>
</template>

<script>
	import { api } from '@/helper/api'

	export default {
		name: 'kelas',
		data() {
			return {
				data_kelas: []
			}
		},
		mounted() {
			this.get()
		},
		methods: {
			get() {
				api.get('kelas').then(res => {
					if (res.data.status === 'success') {
						this.data_kelas = res.data.result
					} else {
						console.log(res.data.message)
					}
				}).catch(err => {
					console.log(err)
				})
			},
			deleteRow(id) {
				api.delete('kelas/' + id).then(res => {
					if (res.data.status === 'success') {
						this.get()
					} else {
						console.log(res.data.message)
					}
				}).catch(err => {
					console.log(err)
				})
			}
		}
	}
</script>

<style scoped>
	table,th {
		width: 720px;
		height: 15px;
		border: 1px solid;
	}
</style>
