<template>
	<div>
		<div class="panel panel-default">
			<div class="panel-body">
				<h5>Choose a date in which this register was or is being taken. (Default is today if not chosen)</h5>
				<input type="date" class="form-control" v-model="date">
			</div>
		</div>
	    <div class="panel panel-default">
	        <div class="panel-body">
	            <table class="table table-striped table-hover">
	                <thead>
	                    <tr>
	                        <th width="90%">Names</th>
	                        <th>P</th>
	                        <th>A</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr v-for="resource in resources">
                            <td width="90%">
                                <a :href="'/'+resources_name+'/'+resource.id">
                                    {{ resource.first_name }} {{ resource.middle_name }} {{ resource.last_name }}
                                </a>
                            </td>
                            <td>
                                <input @click="syncAttendance(resource, 1)" type="checkbox" name="is_present">
                            </td>
                            <td>
                                <input @click="syncAttendance(resource, 0)" type="checkbox" name="is_present">
                            </td>
                        </tr>
	                </tbody>
	            </table>
	            <div class="alert alert-info" v-if="resources.length == 0">
	            	<p>There are no {{ resources_name }} in the system. Consider creating from the menus above.</p>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script>
	export default {
		name: 'AttendanceComponent',
		props: {
			resources: {
				type: Array,
				required: true,
			},
			resources_name: {
				type: String,
				required: true,
			},
			baseurl: {
				type: String,
				required: true,
			}
		},
		data() {
			return {
				date: null,
			}
		},
		methods: {
			syncAttendance (resource, is_present) {
				axios.get(this.baseurl+'/'+resource.id, {
				    params: {
				      	is_present: is_present,
				      	date: this.date
				  	}
				})
				.then((response) => {
			    	console.log(response.data)
			    })
			  	.catch((error) => {
			    	console.log(error)
			  	})
			},
		},
	}
</script>
<style scoped>
</style>